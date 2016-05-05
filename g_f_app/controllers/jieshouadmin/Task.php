<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 接手任务主页
 * Class Index
 */
class Task extends CI_Controller
{
	public static $data = array();
	public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->model('Public_model','publicmodel');
		$this->load->model('shopadmin/Task_model','tasking');
		$this->load->model('admin/User_model', 'user');
		$this->load->model('jieshouadmin/Jieshoutask_model', 'jiehsoumodel');
		self::$data['header'] = $this->publicmodel->jieshouheader();
		self::$data['sessioninfo'] = $_SESSION;
		$this->check();
	}

	/**
	 * @author  gf
	 * 验证
	 */
	public function check()
	{
		$session = $_SESSION;
		if((isset($session['userType'])) && $session['userType'] != 2)
		{
			redirect('Login/index');
		}
	}

	/**
	 * 热门单子
	 */
	public function index()
	{
		$condition = $param = array();
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
		$this->publicmodel->create_page('jieshouadmin/Task/index/'.$start, $count, $limit ,4);
		$tasklist = $this->tasking->getList($condition,$limit,$start);
		foreach($tasklist as $k=>$v)
		{
			$newParam['tId'] = $v['tId'];
			$newParam['juId'] = $this->session->userdata('uId');
			$tasklist[$k]['mytaskinfo'] = $this->jiehsoumodel->getInfo($newParam);
		}
		self::$data['count'] = $count;
		self::$data['tasklist'] = $tasklist;
		$backurl = '/jieshouadmin/Task/index/'.$start.'?'.$parampage;
		self::$data['backurl'] = base64_encode($backurl);
		self::$data['pageparam'] = $parampage;
		self::$data['param'] = $param;
		$this->load->view('jieshouadmin/task/hottask',self::$data);
	}

	/**
	 * 执行添加任务
	 */
	public function taskadd()
	{
		$juId = $this->session->userdata('uId');
		$uId = intval($this->input->post('uId'));
		$taskmoney = intval($this->input->post('taskmoney'));
		$tId = intval($this->input->post('tId'));
		$taskNum = intval($this->input->post('taskNum'));
		$jieshoutaskNum = intval($this->input->post('jieshoutaskNum'));
		$arr = array(
			'tId' => $tId,
			'uId' => $uId,
			'juId' => $juId,
			'taskMoney' => $taskmoney,
			'taskNum' => $jieshoutaskNum,
			'createTime' => time()
		);
		$this->jiehsoumodel->addData($arr);
		$newTaskNum = ($taskNum - $jieshoutaskNum);
		$updateArr['taskNum'] = $newTaskNum;
		$this->tasking->updateData($updateArr,$tId);
		redirect('jieshouadmin/Task/mytask');
	}

	/**
	 * 我的任务
	 */
	public function mytask()
	{
		$condition = $param = array();
		$condition['juId'] = $this->session->userdata('uId');
		$condition['isend'] = 0;
		$start = $this->uri->segment(4);
		$start = isset($start) ? intval($start) : 0;
		$limit = 10;
		$count = $this->jiehsoumodel->getCount($condition);
		$parampage = $this->publicmodel->dealparam($condition);
		$this->publicmodel->create_page('jieshouadmin/Task/mytask/'.$start, $count, $limit ,4);
		$mytasklist = $this->jiehsoumodel->getList($condition,$limit,$start);
		foreach($mytasklist as $k=>$v)
		{
			$taskParam['tId'] = $v['tId'];
			$mytasklist[$k]['tasklist'] = $this->tasking->getInfo($taskParam);
			$userparam['uId'] = $v['uId'];
			$mytasklist[$k]['userInfo'] = $this->user->getInfo($userparam);
		}
		self::$data['count'] = $count;
		self::$data['mytasklist'] = $mytasklist;
		$backurl = 'jieshouadmin/Task/mytask/'.$start.'?'.$parampage;
		self::$data['backurl'] = base64_encode($backurl);
		self::$data['pageparam'] = $parampage;
		$this->load->view('jieshouadmin/task/mytask',self::$data);
	}

	/**
	 * 取消我的订单
	 */
	public function cancelmytask($jId = false)
	{
		$jId = intval($jId);
		$condition['jId'] = $jId;
		$mytaskInfo = $this->jiehsoumodel->getInfo($condition);
		if($mytaskInfo)
		{
			$mytaskNum = $mytaskInfo['taskNum'];
			$taskMoney = $mytaskInfo['taskMoney'];
			$param['tId'] = $mytaskInfo['tId'];
			$taskinfo = $this->tasking->getInfo($param);
			$taskNum = $taskinfo['taskNum'];
			$newTaskNum = ($mytaskNum+$taskNum);
			$updateArr = array(
				'taskNum' => $newTaskNum
			);
			$this->tasking->updateData($updateArr,$mytaskInfo['tId']);
			$this->jiehsoumodel->deleteData($jId);
			redirect('jieshouadmin/Task/mytask');
		}
	}

	public function endtask()
	{
		$condition = $param = array();
		$condition['juId'] = $this->session->userdata('uId');
		$condition['isend'] = 1;
		$start = $this->uri->segment(4);
		$start = isset($start) ? intval($start) : 0;
		$limit = 10;
		$count = $this->jiehsoumodel->getCount($condition);
		$parampage = $this->publicmodel->dealparam($condition);
		$this->publicmodel->create_page('jieshouadmin/Task/mytask/'.$start, $count, $limit ,4);
		$mytasklist = $this->jiehsoumodel->getList($condition,$limit,$start);
		foreach($mytasklist as $k=>$v)
		{
			$taskParam['tId'] = $v['tId'];
			$mytasklist[$k]['tasklist'] = $this->tasking->getInfo($taskParam);
			$userparam['uId'] = $v['uId'];
			$mytasklist[$k]['userInfo'] = $this->user->getInfo($userparam);
		}
		self::$data['count'] = $count;
		self::$data['mytasklist'] = $mytasklist;
		$backurl = 'jieshouadmin/Task/mytask/'.$start.'?'.$parampage;
		self::$data['backurl'] = base64_encode($backurl);
		self::$data['pageparam'] = $parampage;
		$this->load->view('jieshouadmin/task/endtask',self::$data);
	}
}
