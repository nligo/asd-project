<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * @author  gf
 * 商家信息
 * Class Shoper
 */
class Shoper extends CI_Controller
{
	public static $data = array();
	public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->model('admin/User_model', 'user');
		$this->load->model('Public_model', 'publicmodel');
		$this->load->model('shopadmin/Task_model', 'tasking');
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
	 * 商家统计
	 */
	public function taskcount()
	{
		$uId = $this->session->userdata('uId');
		$conditon = array();
		$conditon['uId'] = $uId;
		self::$data['counttask'] = $this->tasking->getCount($conditon);
		$endparam['uId'] = $uId;
		$endparam['isend'] = 1;
		self::$data['countend'] = $this->tasking->getCount($endparam);
		self::$data['countmoney'] = $this->tasking->getCountNum('taskmoney','taskNum',$endparam['uId']);
		$userparam['uId'] = $uId;
		self::$data['info'] = $this->user->getInfo($userparam);
		$this->load->view('shopadmin/shoper/taskcount',self::$data);
	}
}
