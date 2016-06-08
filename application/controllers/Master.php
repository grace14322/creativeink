<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Master extends CI_Controller {

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
        $this->load->helper(['form', 'url']);
        $this->load->library('session');
        $this->is_logged_in();
				$data = [
					'is_in_login' => true,
				];

				header('Access-Control-Allow-Origin: *');
				$this->load->view('template\header');
        $this->load->view('auth\login');

        $this->load->view('template\footer', $data);

	}

    protected function is_logged_in()
    {
        if($this->session->userdata('user_id')){
            if($this->session->userdata('ustype_id') == 3){
                redirect('transaction');
            }

            redirect('dashboard');
        }
        return false;
    }

}
