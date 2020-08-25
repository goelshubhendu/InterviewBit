<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Model {

	public function get(){
		$q=$this->db->get('users')->result_array();
		return $q;
	}
	public function new_interview($mem,$sd,$ed,$title){
		$avail=true;
		$temp=array();
		for($i=0;$i<sizeof($mem);$i++){
			$q=$this->db->query("select * from users_interviews where uid='$mem[$i]' and ((start_time <= '$sd' and end_time >='$sd') or (start_time <= '$ed' and end_time >='$ed') or(start_time >= '$sd' and end_time >= '$ed') )");
			if($q->num_rows()>0){
				$avail=false;
				array_push($temp,$mem[$i]);
			}
		}
		$res="";
		if($avail==true){
			$iid=$this->get_random();
			while(1){
				$this->db->where('iid',$iid);
				$q=$this->db->get('interviews');
				if($q->num_rows()>0)
					$iid=$this->get_random();
				else
					break;		
			}
			$data=array('iid'=>$iid,'title'=>$title,'start_time'=>$sd,'end_time'=>$ed);
			$this->db->insert('interviews',$data);
			for($i=0;$i<sizeof($mem);$i++){
				$data=array('iid'=>$iid,'uid'=>$mem[$i],'start_time'=>$sd,'end_time'=>$ed);
				$this->db->insert('users_interviews',$data);
			}
			$res='<div class="alert alert-success"><h3>Successfully Created Interview</h3></div>';
		}
		else{
			$res='<div class="alert alert-danger"><h3>Following Participants are not Available in this time slot</h3>'."<br>".'<h4>';
			for($i=0;$i<sizeof($temp);$i++){
				$uid=$temp[$i];
				$this->db->where('uid',$uid);
				$q=$this->db->get('users')->result_array();
				foreach ($q as $key => $value) {
					$res.=$value['name']." (".$value['email'].")<br>";
				}
			}
		}
		return $res."</h4></div>";
	}
	private function get_random($num=100000){
		return rand(1,$num);
	}
}
