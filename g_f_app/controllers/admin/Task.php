<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * @author  gf
 * 任务中心
 * Class Task
 */
class Task extends CI_Controller
{
	public static $data = array();

	public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->model('Public_model', 'publicmodel');
		$this->load->model('shopadmin/Task_model', 'tasking');
		$this->load->model('admin/User_model', 'user');
		$this->load->model('jieshouadmin/Jieshoutask_model', 'jiehsoumodel');
		self::$data['header'] = $this->publicmodel->adminheader();
		$this->check();
		self::$data['sessioninfo'] = $_SESSION;
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
	 * 任务主页
	 */
	public function index()
	{
		$condition = $param = array();
		$start = $this->uri->segment(4);
		$start = isset($start) ? intval($start) : 0;
		$limit = 10;
		$tasktitle = $this->input->get_post('tasktitle');
		$param['tasktitle'] = isset($tasktitle) ? trim($tasktitle) : '';
		if(!empty($param['tasktitle']))
		{
			$condition['tasktitle'] = $param['tasktitle'];
		}
		$count = $this->tasking->getCount($condition);
		$parampage = $this->publicmodel->dealparam($condition);
		$this->publicmodel->create_page('admin/Task/index/'.$start, $count, $limit ,4);
		$tasklist = $this->tasking->getList($condition,$limit,$start);
		self::$data['count'] = $count;
		self::$data['tasklist'] = $tasklist;
		$backurl = '/admin/Task/index/'.$start.'?'.$parampage;
		self::$data['backurl'] = base64_encode($backurl);
		self::$data['pageparam'] = $parampage;
		self::$data['param'] = $param;
		$this->load->view('admin/task/tasklist',self::$data);
	}
}
