<?php
	class Pages extends CI_Controller{
		var $resource = "resource/user/";
		public function view($page = 'home'){
			if(!file_exists(APPPATH.'views/pages/'.$page.'.php')){
				show_404();
			}
			$data['title'] = ucfirst($page);

			$this->load->view('templates/header',['res'=>$this->resource]);
			$this->load->view('pages/'.$page, $data);
			$this->load->view('templates/footer');
		}
	}