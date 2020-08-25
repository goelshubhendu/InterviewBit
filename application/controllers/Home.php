<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('users');
	}
	public function index()
	{
		$a['users']=$this->users->get();
		$this->load->view('header');
		$this->load->view('home',$a);
		$this->load->view('footer');
	}
	public function new()
	{

		header('Access-Control-Allow-Origin: *');
		$title=$this->input->post('title');
		$mem=$this->input->post('members');
		$tot=$this->input->post('tot');
		$sd=$this->input->post('sd');
		$sd=$sd." ".$this->input->post('st');
		$ed=$this->input->post('ed');
		$ed=$ed." ".$this->input->post('et');
		$date=Date("yy-m-d H:i:s");
		if($sd < $ed && $sd >$date){
			
			//Again check if there are atleast 2 distinct Users
			$temp=array();
			$cnt=0;
			for($i=0;$i<$tot;$i++)
			{
				if(!in_array($mem[$i],$temp)){
					array_push($temp, $mem[$i]);
				}
			}

			if(sizeof($temp)>=2){
				echo $this->users->new_interview($temp,$sd,$ed,$title);
			}
			else{
				echo '<div class="alert alert-danger"><h2>Select atleast 2 distinct users</h2></div>';
			}
		}
		else{
			echo '<div class="alert alert-danger"><h2>start Date-Time must be greater than current Date-Time'."<br>".'and less than end Date-Time'."<br>"."current Date-Time is ".Date("yy-m-d H:i:s").'</h2></div>';
		}
	}
}
