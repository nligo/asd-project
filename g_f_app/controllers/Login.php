<?php defined('BASEPATH') OR exit('No direct script access allowed');
header('content-type:text/html;charset="utf-8"');

/**
 * @author  gf
 * 登录控制器
 * Class Login
 */
class Login extends CI_Controller
{
	private static $view_data = array();
	public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->model('Login_model','loginmodel');
		$this->load->model('admin/User_model','user');
		$this->load->model('Public_model','publicmodel');
		$this->load->model('admin/Checkuser_model','checkmodel');
	}

	/**
	 * @author  gf
	 * 登录页面
	 */
	public function index()
	{
		$this->load->view('user/log');
	}

	/**
	 * @author  gf
	 * 登录处理
	 */
	public function loginIn()
	{
		$username = trim($this->input->post('username'));
		$password = md5($this->input->post('password'));
		$userType = intval($this->input->post('userType'));
		$check = $this->loginmodel->check($username,$password,$userType);
		if(!empty($check))
		{
			if($check['isactivate'] == 1)
			{
				$sessionArr = array(
					'phoneNumber'=> $check['phoneNumber'],
					'realName' => $check['realName'],
					'uId' => $check['uId'],
					'email' => $check['email'],
					'password' => $check['password'],
					'userType' => $check['userType'],
					'isactivate' => $check['isactivate'],
					'userlv' => $check['userlv'],
					'username' => $check['username'],
					'qq' => $check['qq']
				);
				$this->session->set_userdata($sessionArr);
				if($check['userType'] == 1)
				{
					redirect('shopadmin/Task/index');
				}
				if($check['userType'] == 2)
				{
					redirect('jieshouadmin/Task/index');
				}
			}
			elseif($check['isactivate'] == 0)
			{
				$sessionArr = array(
					'phoneNumber'=> $check['phoneNumber'],
					'realName' => $check['realName'],
					'uId' => $check['uId'],
					'email' => $check['email'],
					'password' => $check['password'],
					'userType' => $check['userType'],
					'isactivate' => $check['isactivate'],
					'username' => $check['username'],
					'userlv' => $check['userlv'],
					'qq' => $check['qq']
				);
				$this->session->set_userdata($sessionArr);
				$codition['uId'] = $check['uId'];
				$info = $this->checkmodel->getInfo($codition);
				//var_dump($info);exit;
				if (!empty($info)) {
					redirect('Apaysuccess/wait/' . $check['uId']);
				} else {
					redirect('Apaysuccess/index/' . $check['uId']);
				}
			}
			else
			{
				echo "<script>alert('您已经被管理员拉黑！哈哈哈');</script>";exit;
				return $this->index();
			}
		}
		else
		{
			redirect('Login');
		}
	}

	/**
	 * @author  gf
	 * 注销
	 */
	public function loginOut()
	{
		$this->session->sess_destroy();
		redirect('Login');
	}

	/**
	 * @author  gf
	 * 找回密码
	 */
	public function findWord()
	{
		$this->load->view('findword');
	}

	/**
	 * 执行找回密码
	 */
	public function dofindWord()
	{
		$condition = array();
		$condition['username'] = trim($this->input->post('username'));
		$email = $this->input->post('email');
		$userinfo = $this->user->getInfo($condition);
		if(!empty($userinfo))
		{
			$UId = $userinfo['UId'];
			$password = '123456';
			$md5Password = md5($password);
			$arr['password'] = $md5Password;
			$bool = $this->user->updateData($arr , $UId);
			$this->publicmodel->sendemail('13484875171@163.com',$userinfo['email'],'','ASD平台','密码更改通知','操作成功，用户名为'.$userinfo['username'].',<br/>密码为'.$password.'请您登录成功以后及时修改您的密码！');
			redirect('Login');
		}
		else
		{
			$this->publicmodel->sendemail('13484875171@163.com',$email,'','ASD平台','密码更改通知','操作失败，您输入的用户名或者邮箱号码不正确');
			redirect('Login');
		}
	}

	/**
	 * 效验用户名
	 */
	public function ajaxUser()
	{
		$res = array('err'=>0);
		$condition = array();
		$username = trim($this->input->post('username'));
		$condition['username'] = $username;
		$userinfo = $this->user->getInfo($condition);
		if(!empty($userinfo))
		{
			$res = array('err'=>1);
		}
		echo json_encode($res);exit;
	}

	/**
	 * 效验邮箱
	 */
	public function ajaxEmail()
	{
		$res = array('err'=>0);
		$condition = array();
		$email = trim($this->input->post('email'));
		$condition['email'] = $email;
		$userinfo = $this->user->getInfo($condition);
		if(!empty($userinfo))
		{
			$res = array('err'=>1);
		}
		echo json_encode($res);exit;
	}

	/**
	 * 效验密码
	 */
	public function ajaxPass()
	{
		$res = array('err'=>0);
		$condition = array();
		$password = $this->input->post('password');
		$condition['username'] = $this->input->post('username');
		$condition['password'] = md5($password);
		$userinfo = $this->user->getInfo($condition);
		if(!empty($userinfo))
		{
			$res = array('err'=>1);
		}
		echo json_encode($res);exit;
	}

	/**
	 * 系统官员登录
	 */
	public function admin()
	{
		$this->load->view('admin/log');
	}


	/**
	 *执行登陆
	 */
	public function adminloginin()
	{
		$username = trim($this->input->post('username'));
		$password = md5($this->input->post('password'));
		$userType = intval($this->input->post('userType'));
		$check = $this->loginmodel->check($username,$password,$userType);
		if(!empty($check))
		{
			$sessionArr = array(
				'phoneNumber'=> $check['phoneNumber'],
				'realName' => $check['realName'],
				'uId' => $check['uId'],
				'email' => $check['email'],
				'password' => $check['password'],
				'userType' => $check['userType'],
				'isactivate' => $check['isactivate'],
				'userlv' => $check['userlv'],
				'qq' => $check['qq']
			);
			$this->session->set_userdata($sessionArr);
			redirect('admin/Checkuser/index');
		}
		else
		{
			redirect('Login/admin');
		}
	}

	/**
	 * @author  gf
	 * 注销
	 */
	public function adminloginOut()
	{
		$this->session->sess_destroy();
		redirect('Login/admin');
	}
}