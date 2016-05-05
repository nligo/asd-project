<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * @author  gf
 * 商家任务中心
 * Class Task
 */
class Task extends CI_Controller
{
	public static $data = array();
	public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->model('admin/User_model', 'user');
		$this->load->model('Public_model', 'publicmodel');
		$this->load->model('shopadmin/Task_model','tasking');
		$this->load->model('jieshouadmin/Jieshoutask_model', 'jiehsoumodel');
		self::$data['header'] = $this->publicmodel->header();
		$this->check();
	}

	/**
	 * @author  gf
	 * 验证
	 */
	public function check()
	{
		$session = $_SESSION;
		if((isset($session['userType'])) && $session['userType'] != 1)
		{
			redirect('Login/index');
		}
	}

	/**
	 * 添加页面
	 */
	public function index()
	{
		self::$data['sessioninfo'] = $_SESSION;
		$this->load->view('shopadmin/task/taskadd',self::$data);
	}

	/**
	 * 任务列表
	 */
	public function tasklist($type = false)
	{
		$condition = $param = array();
		$uId = $this->session->userdata('uId');
		$condition['uId'] = $uId;
		$type = intval($type);
		if($type != 4)
		{
			$condition['isend'] = $type;
		}
		$start = $this->uri->segment(5);
		$start = isset($start) ? intval($start) : 0;
		$limit = 10;
		$count = $this->tasking->getCount($condition);
		$parampage = $this->publicmodel->dealparam($condition);
		$this->publicmodel->create_page('shopadmin/Task/tasklist/'.$type.'/'.$start, $count, $limit ,5);
		$tasklist = $this->tasking->getList($condition,$limit,$start);
		foreach($tasklist as $k=>$v)
		{
			$newparam['tId'] = $v['tId'];
			$newparam['isend'] = 0;
			$tasklist[$k]['jieshoulist'] = $this->jiehsoumodel->getList($newparam);
			if(!empty($tasklist[$k]['jieshoulist'])) foreach($tasklist[$k]['jieshoulist'] as $k2=>$v2)
			{
				$userparam['uId'] = $v2['juId'];
				$tasklist[$k]['jieshoulist'][$k2]['userinfo'] = $this->user->getInfo($userparam);
			}

		}

		//var_dump($tasklist);exit;
		self::$data['count'] = $count;
		self::$data['tasklist'] = $tasklist;
		$backurl = '/shopadmin/Task/tasklist/'.$type.'/'.$start.'?'.$parampage;
		self::$data['backurl'] = base64_encode($backurl);
		self::$data['pageparam'] = $parampage;
		$this->load->view('shopadmin/task/tasklist',self::$data);
	}

	/**
	 * 执行添加任务
	 */
	public function taskdoadd()
	{
		$tasktitle = trim($this->input->post('tasktitle'));
		$uId = $this->session->userdata('uId');
		$startNum = trim($this->input->post('startNum'));
		$endNum = trim($this->input->post('endNum'));
		$taskmoney = trim($this->input->post('taskmoney'));
		$taskNum = intval($this->input->post('taskNum'));
		$payway = intval($this->input->post('payway'));
		$is7days = intval($this->input->post('is7days'));
		$optype = intval($this->input->post('optype'));
		$fanTime = intval($this->input->post('fanTime'));
		$principal = intval($this->input->post('principal'));
		$addArr = array(
			'tasktitle' => $tasktitle,
			'uId' => $uId,
			'startNum' => $startNum,
			'endNum' => $endNum,
			'taskmoney' => $taskmoney,
			'taskNum' => $taskNum,
			'fanTime' => $fanTime,
			'principal' => $principal,
			'payway' => $payway,
			'is7days' => $is7days,
			'optype' => $optype,
			'createTime' => time(),
		);
		$tId = $this->tasking->addData($addArr);
		if(!empty($tId))
		{
			redirect('shopadmin/Task/tasklist');
		}
		else
		{
			echo "<script>alert('发布错误,请重新发布')</script>";
			redirect('shopadmin/Task/index');
		}
	}

	/**
	 * 取消任务
	 * @param bool|false $tId
	 * @param bool|false $backurl
	 */
	public function cancelTask($tId = false,$type = false)
	{
		$tId = intval($tId);
		$type = intval($type);
		$backurl = $this->input->get_post('backurl');
		$updateArr = array(
			'isend' => $type
		);
		$this->tasking->updateData($updateArr,$tId);
		redirect($this->config->item('base_url').base64_decode($backurl));
		echo "<script>alert('操作！');</script>";
	}

	/**废弃任务进行删除
	 * @param bool|false $tId
	 */
	public function deleteTask($tId = false)
	{
		$tId = intval($tId);
		$backurl = $this->input->get_post('backurl');
		if(!empty($tId))
		{
			$this->tasking->deleteData($tId);
			redirect($this->config->item('base_url').base64_decode($backurl));
			echo "<script>alert('删除成功！');</script>";
		}
		else
		{
			redirect($this->config->item('base_url').base64_decode($backurl));
			echo "<script>alert('操作失败！参数错误！');</script>";
		}
	}

	/**
	 * 取消接手资格
	 */
	public function canelTask($juId = false,$tId = false)
	{
		$tId = intval($tId);
		$juId = intval($juId);
		$backurl = $this->input->get_post('backurl');
		if(!empty($juId))
		{
			$param['tId'] = $condition['tId'] = $tId;
			$param['juId'] = $juId;
			$info = $this->jiehsoumodel->getInfo($param);
			if($info)
			{
				$taskNum = $info['taskNum'];
				$taskinfo = $this->tasking->getInfo($condition);
				$myTaskNum = $taskinfo['taskNum'];
				$newTaskNum = ($taskNum + $myTaskNum);
				$updateArr = array(
					'taskNum' => $newTaskNum
				);
				$this->tasking->updateData($updateArr,$condition['tId']);
				$this->jiehsoumodel->deleteData($info['jId']);
				redirect($this->config->item('base_url').base64_decode($backurl));
				echo "<script>alert('取消成功！');</script>";
			}
		}
		else
		{
			echo '参数错误，请返回重新输入';
		}
		var_dump($juId);exit;
	}

	/**
	 * 所有任务
	 */
	public function taskpublic()
	{
		$condition = $param = array();
		$uId = $this->session->userdata('uId');
		$condition['isend'] = 0;
		$start = $this->uri->segment(4);
		$start = isset($start) ? intval($start) : 0;
		$limit = 10;
		$payway = intval($this->input->get_post('payway'));
		$param['payway'] = isset($payway) ? $payway : 3;
		$condition['payway'] = $param['payway'];
		if($param['payway'] == 3)
		{
			$condition['payway'] = false;
		}

		$is7days = intval($this->input->get_post('is7days'));
		$param['is7days'] = isset($is7days) ? $is7days : 3;
		$condition['is7days'] = $param['is7days'];
		if($param['is7days'] == 3)
		{
			$condition['is7days'] = false;
		}

		$optype = intval($this->input->get_post('optype'));
		$param['optype'] = isset($optype) ? $optype : 3;
		$condition['optype'] = $param['optype'];
		if($param['optype'] == 3)
		{
			$condition['optype'] = false;
		}

		$fanTime = intval($this->input->get_post('fanTime'));
		$param['fanTime'] = isset($fanTime) ? $fanTime : 4;
		$condition['fanTime'] = $param['fanTime'];
		if($param['fanTime'] == 4)
		{
			$condition['fanTime'] = false;
		}
		$count = $this->tasking->getCount($condition);
		$parampage = $this->publicmodel->dealparam($condition);
		$this->publicmodel->create_page('shopadmin/Task/tasklist/'.$start, $count, $limit ,4);
		$tasklist = $this->tasking->getList($condition,$limit,$start);
		foreach($tasklist as $k=>$v)
		{
			$newparam['tId'] = $v['tId'];
			$tasklist[$k]['jieshoulist'] = $this->jiehsoumodel->getList($newparam);
			foreach($tasklist[$k]['jieshoulist'] as $k2=>$v2)
			{
				$userparam['uId'] = $v2['juId'];
				$tasklist[$k]['jieshoulist'][$k]['userinfo'] = $this->user->getInfo($userparam);
			}

		}
		self::$data['count'] = $count;
		self::$data['tasklist'] = $tasklist;
		$backurl = '/shopadmin/Task/tasklist/'.$start.'?'.$parampage;
		self::$data['backurl'] = base64_encode($backurl);
		self::$data['pageparam'] = $parampage;
		self::$data['param'] = $param;
		$this->load->view('shopadmin/task/taskpublic',self::$data);
	}


	/**
	 *
	 */
	public function endJiehsouTask($juId = false,$tId = false,$type = false)
	{
		$tId = intval($tId);
		$juId = intval($juId);
		$type = intval($type);
		$backurl = $this->input->get_post('backurl');
		if(!empty($juId))
		{
			$param['tId'] = $tId;
			$param['juId'] = $juId;
			$info = $this->jiehsoumodel->getInfo($param);
			if(!empty($info))
			{
				$updateArr = array(
					'isend' => $type
				);
				$this->jiehsoumodel->updateData($updateArr,$info['jId']);
				redirect($this->config->item('base_url').base64_decode($backurl));
				echo "<script>alert('取消成功！');</script>";
			}
		}
	}
}
