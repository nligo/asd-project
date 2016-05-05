<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * @author  gf
 * 激活用户页面
 * Class Check
 */
class Checkuser extends CI_Controller
{
	public static $data = array();
	public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->model('Login_model', 'loginmodel');
		$this->load->model('admin/User_model', 'user');
		$this->load->model('Public_model', 'publicmodel');
		$this->load->model('admin/Checkuser_model', 'check');
		$this->load->model('admin/Userinfo_model','userinfo');
		self::$data['header'] = $this->publicmodel->adminheader();
		$this->check();
	}

	/**
	 * @author  gf
	 * 验证
	 */
	public function check()
	{
		$session = $_SESSION;
		if((isset($session['userType'])) && $session['userType'] != 0)
		{
			redirect('Login/admin');
		}
	}

	/**
	 * 申请激活列表
	 */
	public function index()
	{
		self::$data['sessioninfo'] = $_SESSION;
		$condition = $param = array();
		$start = $this->uri->segment(4);
		$start = isset($start) ? intval($start) : 0;
		$limit = 10;
		$count = $this->check->getCount($condition);
		$parampage = $this->publicmodel->dealparam($condition);
		$this->publicmodel->create_page('admin/Checkuser/index/'.$start, $count, $limit ,4);
		$tasklist = $this->check->getList($condition,$limit,$start);
		self::$data['count'] = $count;
		self::$data['paylist'] = $tasklist;
		$backurl = '/admin/Checkuser/index/'.$start.'?'.$parampage;
		self::$data['backurl'] = base64_encode($backurl);
		self::$data['pageparam'] = $parampage;
		$this->load->view('admin/checkuser/checklist',self::$data);
	}

	/**
	 * 取消任务
	 * @param bool|false $tId
	 * @param bool|false $backurl
	 */
	public function changeUser($aId = false,$type = false)
	{
		$aId = intval($aId);
		$condition['aId'] = $aId;
		$type = intval($type);
		$backurl = $this->input->get_post('backurl');
		$userinfo = $this->check->getInfo($condition);
		if($userinfo)
		{
			$uId = $userinfo['uId'];
			$updateArr = array(
				'isactivate' => $type
			);
			$this->check->updateData($updateArr,$aId);
			$this->user->updateData($updateArr,$uId);
			redirect($this->config->item('base_url').base64_decode($backurl));
			echo "<script>alert('操作！');</script>";
		}

	}

	/**
	 * 用户信息
	 */
	public function userinfo($uId = false)
	{
		$uId = intval($uId);
		$condition = array();
		$condition['uId'] = $uId;
		$info = $this->user->getInfo($condition);
		$userinfo = $this->userinfo->getInfo($condition);
		$backurl = $this->input->get_post('backurl');
		self::$data['userinfo'] = $userinfo;
		self::$data['info'] = $info;
		self::$data['backurl'] = $backurl;
		$this->load->view('admin/user/userinfo',self::$data);
	}

}
