<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * @author  gf
 * 接手信息
 * Class Jieshouinfo
 */
class Jieshouinfo extends CI_Controller
{
	public static $data = array();
	public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->model('shopadmin/Task_model','tasking');
		$this->load->model('Public_model','publicmodel');
		$this->load->model('jieshouadmin/Jieshoutask_model', 'jiehsoumodel');
		$this->load->model('Public_model','publicmodel');
		$this->load->model('admin/User_model','user');
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
	 * 接手信息
	 */
	public function index()
	{

		$condition['juId'] = $param['juId'] = $userparam['uId'] = $this->session->userdata('uId');
		$param['isend'] = 1;
		self::$data['counttask'] = $this->jiehsoumodel->getCount($condition);
		self::$data['countend'] = $this->jiehsoumodel->getCount($param);
		self::$data['countmoney'] = $this->jiehsoumodel->getCountNum('taskNum','taskMoney',$condition['juId']);
		self::$data['info'] = $this->user->getInfo($userparam);
		$this->load->view('jieshouadmin/jieshouinfo',self::$data);
	}
}
