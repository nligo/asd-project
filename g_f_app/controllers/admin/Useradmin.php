<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Class 用户管理
 */
class Useradmin extends CI_Controller
{
	public static $data = array();
	public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->model('admin/User_model', 'user');
		$this->load->model('Public_model', 'publicmodel');
		$this->load->model('admin/Userinfo_model', 'userinfo');
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
	 * 用户列表
	 */
	public function index()
	{
		$condition = $param = array();
		$start = $this->uri->segment(4);
		$start = isset($start) ? intval($start) : 0;
		$limit = 10;
		$username = $this->input->get_post('username');
		$param['username'] = isset($username) ? trim($username) : '';
		if(!empty($param['username']))
		{
			$condition['username'] = $param['username'];
		}
		$usertype = $this->input->get_post('userType');
		$usertype = isset($usertype) ? intval($usertype) : 4;
		$condition['userType'] = $usertype;
		if($usertype == 4)
		{
			$condition['userType'] = false;
		}
		$param['userType'] = $usertype;

		$isactivate = $this->input->get_post('isactivate');
		$isactivate = isset($isactivate) ? intval($isactivate) : 4;
		$condition['isactivate'] = $isactivate;
		if($isactivate == 4)
		{
			unset($condition['isactivate']);
		}
		$param['isactivate'] = $isactivate;
		$count = $this->user->getCount($condition);
		$parampage = $this->publicmodel->dealparam($condition);
		$this->publicmodel->create_page('admin/Useradmin/index/'.$start, $count, $limit ,4);
		$userlist = $this->user->getList($condition,$limit,$start);
		self::$data['count'] = $count;
		self::$data['userlist'] = $userlist;
		$backurl = '/admin/Useradmin/index/'.$start.'?'.$parampage;
		self::$data['backurl'] = base64_encode($backurl);
		self::$data['pageparam'] = $parampage;
		self::$data['param'] = $param;
		$this->load->view('admin/user/userlist',self::$data);
	}
}
