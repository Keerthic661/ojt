
  
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class main extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->view('registration');
	}
	//view for register
	
	public function register()
	{
		$this->load->view('registration');
	}
	//view for login
	
	public function login()
	{
		$this->load->view('login');
	}
	//view for details
	
	public function details()      
	{
		$this->load->model('mainmodel');
		$data['n']=$this->mainmodel->details();
		$this->load->view('details',$data);
	}
	//Registration action
	
	public function regaction()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules("fname","fname",'required');
		$this->form_validation->set_rules("lname","lname",'required');
		$this->form_validation->set_rules("username","username",'required');
		$this->form_validation->set_rules("password","password",'required');
		$this->form_validation->set_rules("mobile","mobile",'required');
		$this->form_validation->set_rules("email","email",'required');
		if($this->form_validation->run())
		{
			$this->load->model('mainmodel');
			$pass=$this->input->post('password');
			$encpass=$this->mainmodel->encpaswd($pass);
			$a=array("fname"=>$this->input->post("fname"),
					"lname"=>$this->input->post("lname"),
					"username"=>$this->input->post("username"),
					"password"=>$this->input->post("password"),
					"mobile"=>$this->input->post("mobile"),
				"email"=>$this->input->post("email"));
			$b=array("username"=>$this->input->post("username"),
					"password"=>$encpass,"user_type"=>'1');
					 $this->mainmodel->regaction($a,$b);
					 redirect(base_url().'main/details');

		}
	  }

	  //approval 
	  public function approve()
	{
		$this->load->model('mainmodel');
		$id=$this->uri->segment(3);
		$this->mainmodel->approve($id);
		redirect('main/details','refresh');
	}
	//reject
	public function reject()
	{
		$this->load->model('mainmodel');
		$id=$this->uri->segment(3);
		$this->mainmodel->reject($id);
		redirect('main/details','refresh');
	}

	//login action  
		public function techlog()
		{
		$this->load->library('form_validation');
		$this->form_validation->set_rules("username","username",'required');
		$this->form_validation->set_rules("password","password",'required');
		if($this->form_validation->run())
		{
			
			$this->load->model('mainmodel');
			$uname=$this->input->post("username");
			$pass=$this->input->post("password");
			$rslt=$this->mainmodel->selectpass($uname,$pass);
			if($rslt)
			{
				$id=$this->mainmodel->getuserid($uname);
				$user=$this->mainmodel->getuser($id);
				$this->load->library(array('session'));
				$this->session->set_userdata(array('id'=>(int)$user->id,'status'=>$user->status,'user_type'=>$user->user_type));

				if($_SESSION['status']=='0'&& $_SESSION['user_type']=='0')
				{
					redirect(base_url().'main/details');
				}
				elseif ($_SESSION['status']=='1'&& $_SESSION['user_type']=='1') 
				{
					redirect(base_url().'main/details');
				}
	
				else
				{
					echo"waiting for approval";
				}
			}
			else
			{
				echo"invalid user";
			}
		   }
		}

	}

