<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 支付信息
 * Class Apaysuccess_model
 */
class Apaysuccess_model extends CI_Model
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
		$bool = $this->db->insert($this->table, $data);
		return $bool ? $this->db->insert_id() : $bool;
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
		return $where;
	}
}
