<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 商家任务中心model
 * Class Task_model
 */
class Task_model extends CI_Model
{
	private $table = 'ph_task';

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
	 * 修改数据
	 * @param $data
	 * @param $UId
	 * @return mixed
	 */
	public function updateData($data, $tId)
	{
		$tId = intval($tId);
		$this->db->where('tId', $tId);
		$query = $this->db->update($this->table, $data);
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
	public function getList($condition = array(), $limit = 10, $start = 0)
	{
		$limit = intval($limit);
		$start = intval($start);
		$where = $this->_getWhere($condition);
		$this->db->where($where);
		$this->db->limit($limit, $start);
		$this->db->order_by('createTime', 'DESC');
		$this->db->order_by('taskmoney', 'DESC');
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
		if (isset($condition['tId']))
		{
			$where['tId'] = $condition['tId'];
		}
		if (isset($condition['uId']))
		{
			$where['uId'] = $condition['uId'];
		}
		if (isset($condition['isend']))
		{
			$where['isend'] = $condition['isend'];
		}
		if (isset($condition['tasktitle']))
		{
			$where['tasktitle like'] = '%'.$condition['tasktitle'].'%';
		}

		if (isset($condition['fanTime']) && $condition['fanTime'] != false)
		{
			$where['fanTime'] = $condition['fanTime'];
		}

		if (isset($condition['payway']) && $condition['payway'] != false)
		{
			$where['payway'] = $condition['payway'];
		}

		if (isset($condition['is7days'])  && $condition['is7days'] != false)
		{
			$where['is7days'] = $condition['is7days'];
		}

		if (isset($condition['optype'])  && $condition['optype'] != false)
		{
			$where['optype'] = $condition['optype'];
		}
		return $where;
	}

	/**删除任务
	 * @param $tId
	 */
	public function deleteData($tId)
	{
		$sId = intval($tId);
		$this->db->where('tId', $tId);
		return $this->db->delete($this->table);
	}

	/**
	 * 获取某一字段内的和
	 * @param $select
	 * @param $uId
	 * @return mixed
	 */
	public function getCountNum($taskNum,$taskMoney,$uId)
	{
		$sql = "SELECT SUM($taskNum*$taskMoney) as countmoney FROM {$this->table} WHERE uId=".$uId;
		return $this->db->query($sql)->row_array();
	}
}
