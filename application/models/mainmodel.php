<?php
class mainmodel extends CI_model
{
	public function regaction($a,$b)

	{
		$this->db->insert("login",$b);
		$userid=$this->db->insert_id();
		$a["u_id"]=$userid;
		$this->db->insert("reg",$a);
	}
	
	public function encpaswd($pass)

	{
		return password_hash($pass,PASSWORD_BCRYPT);
	
	}

		public function details()   
		{
		$this->db->select('*');
		$this->db->join('login','login.id=reg.u_id','inner');
		$qry=$this->db->get("reg");
		return $qry;
		}
		public function approve($id)
	{
		$this->db->set('status','0');
		$qry=$this->db->where('id',$id);
		$qry=$this->db->update("login");
		return $qry;
	}
	public function reject($id)
	{
		$this->db->set('status','1');
		$qry=$this->db->where('id',$id);
		$qry=$this->db->update("login");
		return $qry;
	}
	public function getusrid($unm)
		{
			$this->db->select('id');
			$this->db->from("login");
			$this->db->where("username",$unm);
			return $this->db->get()->row('id');
		}
		public function getusr($id)
		{
			$this->db->select('*');
			$this->db->from("login");
			$this->db->where("id",$id);
			return $this->db->get()->row();
		}
			public function selectpass($num,$pass)
	{
		$this->db->select('password');
		$this->db->from("login");
		$this->db->where("username",$unm);
		$qry=$this->db->get()->row('password');
		return $this->verifypass($pass,$qry);
	}
	public function verifypass($pass,$qry)
	{
		return password_verify($pass,$qry);
	}
}


?>