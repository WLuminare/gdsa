<?php
	class Admin extends CI_Controller{
		var $resource = "resource/user/";
		public function login(){
			$data['title'] = 'Sign In';

			$this->form_validation->set_rules('username', 'Username', 'required');
			$this->form_validation->set_rules('password', 'Password', 'required');
			if($this->form_validation->run() === FALSE){
				$this->load->view('templates/header',['res'=>$this->resource]);
				$this->load->view('admin/login', $data);
				$this->load->view('templates/footer');
			} else {
				//get username
				$username = $this->input->post('username');
				//get password
				$password = md5($this->input->post('password'));

				$user_id = $this->admin_model->login($username, $password);
				if($user_id){
					//create session
					$user_data = array(
						'user_id' => $user_id, 
						'username' => $username,
						'logged_in' => true
						);
					$this->session->set_userdata($user_data);
					$this->session->set_flashdata('user_loggedin','You are now logged in');
					redirect('posts');
				} else {
					$this->session->set_flashdata('login_failed','Login is invalid');
					redirect('admin/login');
				}			
			}
		}

		public function logout(){
			//unset data
			$this->session->unset_userdata('logged_in');
			$this->session->unset_userdata('user_id');
			$this->session->unset_userdata('username');
			
			$this->session->set_flashdata('user_loggedout','You are now logged out');
			redirect('admin/login');
		}
	}