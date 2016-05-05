<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 支付宝回调页面(半成品)
 * Class Apaysuccess
 */
class Apaysuccess extends CI_Controller
{
	public static $view_data = array();
	public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->model('Login_model', 'loginmodel');
		$this->load->model('admin/User_model', 'user');
		$this->load->model('Public_model', 'publicmodel');
		$this->load->model('admin/Userinfo_model', 'userinfo');
		$this->load->model('admin/Apaysuccess_model','apaysuccess');
		$this->check();
	}

	/**
	 * @author  gf
	 * 验证
	 */
	public function check()
	{
		$session = $_SESSION;
		if(!(isset($session['isactivate'])) && $session['isactivate'] !=0)
		{
			redirect('Login/index');
		}
	}

	public function index($UId = false)
	{
		$UId = intval($UId);
		$condition['uId'] = $UId;
		$check = $this->user->getInfo($condition);
		self::$view_data['info'] = $check;
		$this->load->view('apay/apaysuccess',self::$view_data);
	}

	/**
	 * 提交回执
	 */
	public function doadd()
	{
		$uId = intval($this->input->post('UId'));
		$payType = trim($this->input->post('payType'));
		$apayNum = trim($this->input->post('apayNum'));
		$apayStreamNum = trim($this->input->post('apayStreamNum'));
		$addarr = array(
			'uId' => $uId,
			'payType' => $payType,
			'apayNum' => $apayNum,
			'apayStreamNum' => $apayStreamNum,
			'createTime' => time()
		);
		$aId = $this->apaysuccess->addData($addarr);
		$param['aId'] = $aId;
		if($param['aId'])
		{
			redirect('Apaysuccess/wait/'.$uId);
		}
	}

	/**
	 * 等待激活页面
	 * @param bool|false $aId
	 */
	public function wait($UId = false)
	{
		$UId = intval($UId);
		$condition['uId'] = $UId;
		$check = $this->apaysuccess->getInfo($condition);
		$param['uId'] = $check['uId'];
		$userinfo = $this->user->getInfo($param);
		self::$view_data['info'] = $userinfo;
		$this->load->view('admin/checkuser/wait',self::$view_data);
	}
}
