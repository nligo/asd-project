<?php
defined('BASEPATH') OR exit('No direct script access allowed');
header('content-type:text/html;charset="utf-8"');

class Public_model extends CI_Model
{
	public static $view_data = array();
	public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
	}

	/**
	 * @author  gf
	 * 验证用户
	 */
	public function checkUser()
	{
		$sessioninfo = $_SESSION;
		if(!isset($sessioninfo['username']))
		{
			redirect('Login/');
		}

	}

	/**
	 * 商家用户公共头部
	 */
	public function header()
	{
		self::$view_data['sessioninfo'] = $_SESSION;
		$headerclass= $this->uri->segment(3);
		$headerparam = $this->uri->segment(4);
		self::$view_data['headerparam'] = $headerparam;
		self::$view_data['headerclass'] = $headerclass;
		$this->load->view('common/header',self::$view_data);
	}

	/**
	 * 接手用户公共头部
	 */
	public function jieshouheader()
	{
		self::$view_data['sessioninfo'] = $_SESSION;
		$headerparam = $this->uri->segment(2);
		$headerclass = $this->uri->segment(3);
		self::$view_data['headerparam'] = $headerparam;
		self::$view_data['headerclass'] = $headerclass;
		$this->load->view('common/jieshouheader',self::$view_data);
	}

	/**
	 * 系统管理员公共头部
	 */
	public function adminheader()
	{
		self::$view_data['sessioninfo'] = $_SESSION;
		$headerparam = $this->uri->segment(2);
		self::$view_data['headerparam'] = $headerparam;
		$this->load->view('admin/header',self::$view_data);
	}

	/**
	 *  分页
	 * */
	public function create_page($base_url, $count_all, $per_page, $uri_segment = 4, $num_links = 5)
	{
		$this->load->library('pagination');
		$config['base_url'] = base_url($base_url); // 分页链接
		$config['total_rows'] = $count_all; // 总数据条数
		$config['per_page'] = $per_page; // 每页显示数量
		$config['use_page_numbers'] = FALSE; // 默认分页URL中是显示每页记录数,启用use_page_numbers后显示的是当前页码
		$config['first_link'] = '<span aria-hidden="true">&laquo;</span>'; // 自定义 首页名称
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';
		$config['next_link'] = '<span aria-hidden="true">&gt;</span>'; // 自定义 下一页名称
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		$config['prev_link'] = '<span aria-hidden="true">&lt;</span>'; // 自定义 上一页名称
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';
		$config['last_link'] = '<span aria-hidden="true">&raquo;</span>'; // 自定义 末页名称
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';
		$config['display_pages'] = TRUE; // 是否显示数字链接
		$config['uri_segment'] = $uri_segment; // 指定index.php后第几位是分页数
		$config['num_links'] = $num_links; // 指定当前页前后各显示几页
		$config['cur_tag_open'] = '<li><a class="active">'; // 选中页码标签开始
		$config['cur_tag_close'] = '</a></li>'; // 选中页码标签结束
		$config['num_tag_open'] = '<li>'; // 自定义数字链接
		$config['num_tag_close'] = '</li>'; // 自定义数字链接
		$this->pagination->initialize($config);
		return true;
	}

	/**
	 * 处理参数
	 * */
	public function dealparam($param)
	{

		$url = array();
		if(!empty($param)){
			foreach ($param as $k=>$v)
			{
				if($v !== '')
				{
					$url[] = $k.'='.$v;
				}
			}
		}
		return !empty($url) ? implode('&', $url) : '';
	}

	/**
	 * 上传图片
	 */
	public function uploader($userfile='imageName')
	{
		$config ['upload_path'] = './uploads/';
		$config ['allowed_types'] = 'gif|jpg|png';
		$config ['encrypt_name'] = TRUE;
		$config['max_size'] = '100000000';
		$config['max_width'] = '100000';
		$config['max_height'] = '100000';
		$this->load->library('upload', $config);
		//var_dump($this->upload);
		//判断。如果为真执行下一步，如果为假跳转至原页面
		if (!$this->upload->do_upload($userfile)) {
			$file = '';
		//	echo 123;exit;
			return $file;
		}
		else
		{
			//获取文件信息
			$data = array(
				'upload_data' => $this->upload->data()
			);
			var_dump($data);
			// 取得上传文件夹的路径
			$path = $config ['upload_path'];

			// 取得上传文件的名字
			$file = $data ['upload_data'] ['file_name'];
			var_dump($file);exit;
			$filePath = $this->config->item('img_url').$file;
			return $filePath;
		}
	}

	/**
	 * 上传文件
	 */
	public function uploadfile($fileName)
	{
		$config ['upload_path'] = './uploads/download/';
		$config ['allowed_types'] = 'rar|tar|zip';
		$config ['encrypt_name'] = TRUE;
		$config['max_size'] = '1000000000000';
		$config['max_width'] = '100000000000';
		$config['max_height'] = '10000000000';
		$this->load->library('upload', $config);
		//判断。如果为真执行下一步，如果为假跳转至原页面
		if (!$this->upload->do_upload($fileName)) {
			$file = '';
			return $file;
		}
		else
		{
			//获取文件信息
			$data = array(
				'upload_data' => $this->upload->data()
			);
			//var_dump($data);exit;
			// 取得上传文件夹的路径
			$path = $config ['upload_path'];

			// 取得上传文件的名字
			$file = $data ['upload_data'] ['file_name'];
			$filePath = $this->config->item('dl_url').$file;
			return $filePath;
		}
	}

	/*******************配置类方法开始***************************/
	/**
	 * 邮件带附件配置方法
	 * $emailname => 发件人邮箱
	 * $toemailname => 收件人邮箱
	 * $name => 收件人名字
	 * $title => 邮箱标题
	 * $contents => 邮箱内容
	 **/
	public function sendemail($emailname,$toemailname,$cEmailName,$name,$title,$contents)
	{
		$this->load->library('email');            //加载CI的email类

		//以下设置Email参数
		$config['protocol'] = 'smtp';
		$config['smtp_host'] = 'smtp.163.com';
		$config['smtp_user'] = '13484875171@163.com';
		$config['smtp_pass'] = 'oiixevdbkcybzfds';
		$config['smtp_port'] = '25';
		$config['charset'] = 'utf-8';
		$config['wordwrap'] = TRUE;
		$config['mailtype'] = 'html';
		$this->email->initialize($config);

		//以下设置Email内容
		$this->email->from($emailname, $name);
		$this->email->to($toemailname);
		$this->email->cc($cEmailName);
		$this->email->subject($title);
		$this->email->message($contents);
		$this->email->send();
		//echo $this->email->print_debugger();        //返回包含邮件内容的字符串，包括EMAIL头和EMAIL正文。用于调试。
	}
}
