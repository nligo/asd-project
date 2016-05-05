<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 用户管理
 * Class User_model
 */
class User_model extends CI_Model
{
	private $table = 'ph_user';
	public function __construct()
	{
		parent::__construct();
	}

	/**
	 * 添加数据
	 * @param $data
	 * @return mixed
	 */
	public function addData($data)
	{
		$bool = $this->db->insert($this->table ,$data);
		return $bool ? $this->db->insert_id() : $bool;
	}

	/**
	 * 修改数据
	 * @param $data
	 * @param $UId
	 * @return mixed
	 */
	public function updateData($data , $UId)
	{
		$UId = intval($UId);
		$this->db->where('uId',$UId);
		$query = $this->db->update($this->table , $data);
		return $query;
	}

	/**
	 * 查询用户单挑数据
	 * @param array $condition
	 * @return mixed
	 */
	public function getInfo($condition = array())
	{
		$where = $this->_getWhere($condition);
		$this->db->where($where);
		$query = $this->db->get($this->table)->row_array();
		return $query;
	}

	/**
	 * 获取全部数据
	 * @param array $condition
	 * @param int $limit
	 * @param int $start
	 * @return mixed
	 */
	public function getList($condition = array() , $limit = 10 , $start = 0)
	{
		$limit = intval($limit);
		$start = intval($start);
		$where = $this->_getWhere($condition);
		$this->db->where($where);
		$this->db->limit($limit , $start);
		$this->db->order_by('createTime','ASC');
		$query = $this->db->get($this->table)->result_array();
		return $query;
	}

	/**
	 * 获取总数
	 * @param array $condition
	 * @return mixed
	 */
	public function getCount($condition = array())
	{
		$where = $this->_getWhere($condition);
		$this->db->where($where);
		$count = $this->db->get($this->table)->num_rows();
		return $count;
	}
	/**
	 * 搜索条件
	 * @param array $condition
	 * @return array
	 */
	private function _getWhere($condition = array())
	{
		$where = array();
		if(isset($condition['username']))
		{
			$where['username'] = $condition['username'];
		}
		if(isset($condition['email']))
		{
			$where['email'] = $condition['email'];
		}
		if(isset($condition['password']))
		{
			$where['password'] = $condition['password'];
		}
		if(isset($condition['uId']))
		{
			$where['uId'] = $condition['uId'];
		}
		if(isset($condition['phoneNumber']))
		{
			$where['phoneNumber'] = $condition['phoneNumber'];
		}
		if(isset($condition['userType']) && $condition['userType'] != false)
		{
			$where['userType'] = $condition['userType'];
		}

		if(isset($condition['isactivate']))
		{
			$where['isactivate'] = $condition['isactivate'];
		}
		return $where;
	}
}
