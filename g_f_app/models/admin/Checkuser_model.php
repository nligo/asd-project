<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 激活用户model
 * Class User_model
 */
class Checkuser_model extends CI_Model
{
	private $table = 'ph_apayinfo';
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
	public function updateData($data , $aId)
	{
		$aId = intval($aId);
		$this->db->where('aId',$aId);
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
		$this->db->order_by('aId','DESC');
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
		if(isset($condition['aId']))
		{
			$where['aId'] = $condition['aId'];
		}
		if(isset($condition['uId']))
		{
			$where['uId'] = $condition['uId'];
		}
		if(isset($condition['isactivate']) && $condition['isactivate'] !=false)
		{
			$where['isactivate'] = $condition['isactivate'];
		}
		return $where;
	}
}
