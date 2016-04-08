<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Branch extends CI_Controller {

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
		$this->loadhelper();
        $sql = $this->db->query('SELECT * from branch');
        $numrow = $sql->num_rows();
        $branch = '';
        if($numrow != 0){
            $branch = $sql->result();
        }

        $data = [
                'branches' => $branch,
        ];
        $this->load->view('template\header', $data);
        $this->load->view('branch\branch', $data);
        $this->load->view('template\footer', $data);
	}

        public function create(){

        $this->load->helper(array('form', 'url'));

        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->database();

        $this->is_logged_in();

        $this->form_validation->set_rules('branchname', 'Branch Name', 'required');
        $this->form_validation->set_rules('address', 'Address', 'required');
        if ($this->form_validation->run() == FALSE)
        {
                $_SESSION['error-message'] = validation_errors();
        }else{
            $sql = $this->db->query("select * from branch where br_address LIKE '%".$_POST['address']."%'");
            $numrows = $sql->num_rows();
            if($numrows == 0):
                 $data = [
                    'br_name' => $_POST['branchname'],
                    'br_address' => $_POST['address'],
                ];
                    $this->db->insert('branch', $data);

                $_SESSION['success-message']=" Branch Saved";
                header('location:'.base_url().'branch');
                exit(0);
            else:
                 $_SESSION['error-message']= "Branch already added or has similar branch address";
            endif;
        }


        header('location:'.base_url().'branch');
    }

    public function view(){
        $this->load->database();

        $this->load->helper(['url','form']);

        $this->load->library('session');

        $br_id = $_GET['id'];
        $sql = $this->db->query("select b.* from branch b where br_id = '".$br_id."' ");
        $numrow = $sql->num_rows();

        if($numrow == 0){
           $branches = 0;
        } else {
           $branches = $sql->result();
        }

        $sql = $this->db->query("SELECT * from branch ");
        $numrow = $sql->num_rows();

        if($numrow == 0){
           $branch = 0;
        } else {
           $branch = $sql->result();
        }

        foreach($branches as $branch):
            $br_id = $branch->br_id;
            $br_name = $branch->br_name;
            $br_address = $branch->br_address;
        endforeach;
        $data = [
            'br_id'         => $br_id,
            '$branch'       => $branch,
            'br_name'       => $br_name,
            'br_address'    => $br_address,
        ];
		$this->load->view('template\header',  $data);
        $this->load->view('branch\branchview',  $data);
        $this->load->view('template\footer',  $data);
    }

    public function update()
    {
        $this->load->helper(array('form', 'url'));

        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->database();

        $this->is_logged_in();

        $this->form_validation->set_rules('branchname', 'Branch Name', 'required');
        $this->form_validation->set_rules('address', 'Address', 'required');

        if ($this->form_validation->run() == FALSE)
        {
                $_SESSION['error-message'] = validation_errors();
        }else{
            $sql = $this->db->query("select * from branch where br_address LIKE '%".$_POST['address']."%'");
            $numrows = $sql->num_rows();
            if($numrows == 0):
            $data = [
             'br_name'      => $_POST['branchname'],
             'br_address'  => $_POST['address'],
            ];

            $where = "br_id = ".$_POST['id'];

            $this->db->update('branch', $data, $where);

            $_SESSION['success-message']=" Branch Updated";
						header('location: '.base_url().'branch/view?id='.$_POST['id']);
						exit(0);
            else:
                 $_SESSION['error-message']= "Branch has almost same details or has similar branch address";
            endif;
        }


        header('location: '.base_url().'branch/view?id='.$_POST['id']);
    }

     protected function loadhelper(){
        $this->load->database();
        $this->load->helper(['url','form']);
        $this->load->library('session');
        $this->is_logged_in();
    }

     protected function is_logged_in()
    {
        if(!$this->session->userdata('user_id')){
            redirect('/');
        }
       if($this->session->userdata('ustype_id') == 3){
            redirect('transaction');
        }
    }
}
