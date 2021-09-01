<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	private $model = 'Model_user';

	public function __construct(){
		parent::__construct();

		$this->load->model($this->model);
	}

	public function index()
	{
		$session = $this->session->userdata();

		$articles = $this->{$this->model}->get_articles($session['id']);
		$this->load->view('header');
		$this->load->view('user_blog_list', array(
			'articles' => $articles
		));
		$this->load->view('footer');
	}

	public function login(){
		$data = $this->input->post();

		$this->form_validation->set_rules('email', 'Email', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');

		if ($this->form_validation->run() !== FALSE){
			$user = $this->{$this->model}->get_user_by_email($data['email']);
			if (empty($user)){
				echo '<p>The user does not exist</p>';
			}
			else if (!password_verify($data['password'], $user[0]->password)) {
				echo '<p>Your details are incorrect</p>';
			}
			else {

				$this->session->set_userdata(array(
					'id' => $user[0]->id,
					'email' => $user[0]->email
				));

				redirect(base_url('/user'));
			}
		}

		$this->load->view('header');
		$this->load->view('login_form');
		$this->load->view('footer');
	}

	public function register(){
		$data = $this->input->post();

		$this->form_validation->set_rules('email', 'Email', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');
		$this->form_validation->set_rules('password_confirm', 'Password Confirmation', 'required|matches[password]');

		if ($this->form_validation->run() !== FALSE){
			$inserted_id = $this->{$this->model}->create($data);
			if ($inserted_id !== null){

				$this->session->set_userdata(array(
					'id' => $inserted_id,
					'email' => $data->email
				));
				redirect(base_url('/user'));
			}
		}

		$this->load->view('header');
		$this->load->view('register_form');
		$this->load->view('footer');
	}

	public function logout(){
		
	}
}
