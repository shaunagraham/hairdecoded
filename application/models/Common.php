<?php

defined('BASEPATH') OR exit('No direct script access allowed');

Class Common extends CI_Model
{
	
	public function insertRecord($tablename,$data)
	{
		return $this->db->insert($tablename,$data);
	}

	public function updateRecord($tablename,$data,$where = null)
	{
		return $this->db->set($data)->where($where)->update($tablename);
	}

	public function deleteRecord($tablename,$data)
	{
		return $this->db->where($data)->delete($tablename);
	}

	public function selectRecord($tablename,$field="*",$where=null,$orderfieldname=null,$order=null,$limit=null,$startLimit=null)
	{
		$this->db->select($field);
		if(!empty($where)) {
			$this->db->where($where);
		}

		if(!empty($orderfieldname) && !empty($order)) {
			$this->db->order_by($orderfieldname,$order);
		}

		if(!empty($startLimit) && !empty($limit)) {
			$this->db->limit($limit,$startLimit);
		}elseif(!empty($limit)){
			$this->db->limit($limit,$order);
		}

		return $this->db->get($tablename)->result();
	}

	public function session_check($data)
	{
		$userId = $data['userId'];
		$num = $this->selectRecord("user",array("id"=>$userId,"is_deleted"=>0));

		if (!empty($num)) {
			return true;
		} else {
			$this->session->sess_destroy('si_session_uid');
			return false;
		}
	}

}