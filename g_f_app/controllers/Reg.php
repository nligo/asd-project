<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * @author  gf
 * 注册用户
 * Class Reg
 */
class Reg extends CI_Controller
{
	private static $view_data = array();

	public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->model('Login_model', 'loginmodel');
		$this->load->model('admin/User_model', 'user');
		$this->load->model('Public_model', 'publicmodel');
		$this->load->model('admin/Userinfo_model', 'userinfo');
	}

	/**
	 * 注册页面
	 */
	public function index($userType = false)
	{
		$userType = $this->uri->segment(3);
		self::$view_data['userType'] = isset($userType) ? intval($userType) : 1;
		$this->load->view('user/reg', self::$view_data);
	}

	/**
	 * 执行注册
	 */
	public function doreg()
	{

		$password = md5($this->input->post('passwordF'));
		$email = trim($this->input->post('email'));
		$qqNumber = trim($this->input->post('qq'));
		$phoneNumber = trim($this->input->post('phoneNumber'));
		$realName = trim($this->input->post('realName'));
		$userType = intval($this->input->post('userType'));
		$shopUrl = trim($this->input->post('shopUrl'));
		$bankNum = intval($this->input->post('bankNum'));
		$IDnumber = trim($this->input->post('IDnumber'));
		$usersex = intval($this->input->post('usersex'));
		if(!empty($phoneNumber))
		{
			$username = $phoneNumber;
		}
		if(!empty($bankNum))
		{
			$insertArr = array(
				'username' => $username,
				'password' => $password,
				'qq' => $qqNumber,
				'email' => $email,
				'realName' => $realName,
				'phoneNumber' => $phoneNumber,
				'userType' => $userType,
				'bankNum' => $bankNum,
				'IDnumber' => $IDnumber,
				'createTime' => time(),
				'usersex' => $usersex
			);
		}
		else
		{
			$insertArr = array(
				'username' => $username,
				'password' => $password,
				'qq' => $qqNumber,
				'email' => $email,
				'realName' => $realName,
				'phoneNumber' => $phoneNumber,
				'userType' => $userType,
				'bankNum' => '',
				'IDnumber' => $IDnumber,
				'shopUrl' => $shopUrl,
				'createTime' => time(),
				'usersex' => $usersex
			);
		}

		$UId = $this->user->addData($insertArr);
		$imgArr = array('IDpositivePath','IDoppositePath','otherIDPath','realpayPath','sellerPath');
		$this->load->library('uploader');
		for($i=0;$i<count($imgArr);$i++)
		{
			$fileName = $this->uploader->upload_file($imgArr[$i]);
			$newArr[$i] = $fileName;
		}
		$insertData = array(
			'UId' => $UId,
			'IDpositivePath' => $newArr[0],
			'IDoppositePath' => $newArr[1],
			'otherIDPath' => $newArr[2],
			'realpayPath' => $newArr[3],
			'sellerPath' => $newArr[4],
			'userType' => $userType,
		);
		$sId = $this->userinfo->addData($insertData);
		if(!empty($sId) || !empty($UId))
		{
				redirect('Apaysuccess/index/'.$UId);
		}
		else
		{
			echo '操作失败！';
			redirect('Reg/index');
		}
	}

	/**
	 * 效验用户名
	 */
	public function ajaxPhone()
	{
		$res = array('err'=>0);
		$condition = array();
		$phoneNumber = trim($this->input->post('phoneNumber'));
		$condition['phoneNumber'] = $phoneNumber;
		$userinfo = $this->user->getInfo($condition);
		if(!empty($userinfo))
		{
			$res = array('err'=>1);
		}
		echo json_encode($res);exit;
	}
}
