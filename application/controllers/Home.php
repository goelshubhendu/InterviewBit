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
		
		// Again Validating that there are atleast 2 distinct members..
		// If we want to schedule via scripts..
		$temp=array();
		$cnt=0;
		for($i=0;$i<$tot;$i++)
		{
			if(!in_array($mem[$i],$temp)){
				array_push($temp, $mem[$i]);
			}
		}

		if(sizeof($temp)>=2){
			//$var=$this->users->available($temp,$start,$end);
			//echo $var;
		}
		else{
			echo '<div class="alert alert-danger"><h2>Select atleast 2 distinct users</h2></div>';
		}
	}
}
