<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('users');
		$this->load->model('interviews');
	}
	public function index()
	{
		$a['users']=$this->users->get();
		$this->load->view('header');
		$this->load->view('home',$a);
		$this->load->view('footer');
	}
	public function all(){
		$a['interview']=$this->interviews->get();
		$this->load->view('header');
		$this->load->view('interviews',$a);
		$this->load->view('footer');
	}
	public function edit($iid=0){
		$a['interview']=$this->interviews->get($iid);
		$a['members']=$this->interviews->members($iid);
		$a['start_date']=substr($a['interview'][0]['start_time'],0,10);
		$a['start_time']=substr($a['interview'][0]['start_time'],11);
		$a['end_date']=substr($a['interview'][0]['end_time'],0,10);
		$a['end_time']=substr($a['interview'][0]['end_time'],11);
		$a['users']=$this->users->get();
		
		$this->load->view('header');
		$this->load->view('edit',$a);
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
		$type=$this->input->post('type');
		$iid=0;
		if($type==1){
			$iid=$this->input->post('iid');
		}
		if($sd < $ed && $sd >$date){
			
			//Again check if there are atleast 2 distinct Users
			// If we do not want to give web interface
			$temp=array();
			$cnt=0;
			for($i=0;$i<$tot;$i++)
			{
				if(!in_array($mem[$i],$temp)){
					array_push($temp, $mem[$i]);
				}
			}

			if(sizeof($temp)>=2){
				if($type==0)
					echo $this->interviews->new_interview($temp,$sd,$ed,$title);
				else{
					echo $this->interviews->update($iid,$temp,$sd,$ed,$title);
				}
			}
			else{
				echo '<div class="alert alert-danger"><h2>Select atleast 2 distinct users</h2></div>';
			}
		}
		else{
			echo '<div class="alert alert-danger"><h2>start Date-Time must be greater than current Date-Time'."<br>".'and less than end Date-Time'."<br>"."current Date-Time is ".Date("yy-m-d H:i:s").'</h2></div>';
		}
	}
	public function email(){
		$email=$this->input->post('email');
		$this->email->from('interviewschedulerinterview@gmail.com', 'Interview Scheduler');
        $this->email->to('goelshubhendu@gmail.com');
        $this->email->cc($email);
        $this->email->subject('You have a interview scheduled');
        $this->email->message('<div><h1>Hey there.</h1><h2>You have a new interview scheduled<br>From '.$sd.' To '.$ed.'</h2></div>');
        $this->email->send();
	}
	public function delete(){
		header('Access-Control-Allow-Origin: *');
		$iid=$this->input->post('iid');
		$this->interviews->delete($iid);
	}
}
