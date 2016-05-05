<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 用户操作
 * Class User
 */
class User extends CI_Controller
{
	private static $view_data = array();
	public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->model('Login_model','loginmodel');
		$this->load->model('admin/User_model','user');
		$this->load->model('Public_model','publicmodel');
		$this->load->model('admin/Userinfo_model', 'userinfo');
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
	 * 效验密码
	 */
	public function ajaxPass()
	{
		$res = array('err'=>0);
		$condition = array();
		$username = $this->session->userdata('username');
		$password = $this->input->post('password');
		$condition['password'] = md5($password);
		$userinfo = $this->user->getInfo($condition);
		if(!empty($userinfo))
		{
			$res = array('err'=>1);
		}
		echo json_encode($res);exit;
	}

	/**
	 * 修改信息
	 */
	public function changeInfo()
	{
		$condition = array();
		$uId = intval($this->input->post('uId'));
		$condition['username'] = $this->session->userdata('username');
		$condition['password'] = md5($this->input->post('password'));
		$passwordS = md5($this->input->post('passwordS'));
		$passwordF = md5($this->input->post('passwordF'));
		$qq = trim($this->input->post('qq'));
		$email = trim($this->input->post('email'));
		$userinfo = $this->user->getInfo($condition);
		if(!empty($uId))
		{
			if(!empty($userinfo))
			{
				if($passwordF != $passwordS)
				{
					echo "<script>alert('操作失败！！');</script>";
					exit;
				}
				else
				{
					$updateArr = array(
						'password' => $passwordS,
						'email' => $email,
						'qq' => $qq,
					);
					$this->user->updateData($updateArr,$uId);
					$this->session->sess_destroy();
					redirect('Login');
				}
			}
		}

	}
}
