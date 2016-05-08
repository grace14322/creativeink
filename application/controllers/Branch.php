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

        $this->loadhelper();

        $this->form_validation->set_rules('branchname', 'Branch Name', 'required');
        $this->form_validation->set_rules('address', 'Address', 'required|is_unique[branch.br_address]',
            array(
                'is_unique'     => 'This %s already exists.'
                )
            );
        if ($this->form_validation->run() == FALSE)
        {
                $_SESSION['error-message'] = validation_errors();
        }else{
                 $data = [
                    'br_name' => $_POST['branchname'],
                    'br_address' => $_POST['address'],
                ];
                    $this->db->insert('branch', $data);

                $_SESSION['success-message']=" Branch Saved";
        }


        header('location:'.base_url().'branch');
    }
    public function deletebr()
    {
        $this->loadhelper();

        $_SESSION['success-message']=" Branch Deleted";

        echo $_SESSION['success-message'];
    
        header('location:'.base_url().'branch');
    }
    public function view(){
        $this->loadhelper();

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
        $this->loadhelper();

        $this->form_validation->set_rules('branchname', 'Branch Name', 'required');
        $sqlx = $this->db->query("SELECT * from branch where br_id = ".$_POST['id']);
        $rownum = $sqlx->num_rows();
        $addressx = $sqlx->row();
        $callback = '';
        if($_POST['address'] != $addressx->br_address){
               $callback = '|callback_address_check';
        }
        $this->form_validation->set_rules('address', 'Address', 'required'.$callback);

        if ($this->form_validation->run() == FALSE)
        {
                $_SESSION['error-message'] = validation_errors();
        }else{
            $data = [
             'br_name'      => $_POST['branchname'],
             'br_address'  => $_POST['address'],
            ];

            $where = "br_id = ".$_POST['id'];

            $this->db->update('branch', $data, $where);

            $_SESSION['success-message']=" Branch Updated";
        }


        header('location: '.base_url().'branch/view?id='.$_POST['id']);
    }
    
    public function address_check($address) { 
    $this->loadhelper();
     $sql = $this->db->query("SELECT * from branch where br_address ='".$address."' ");
     $numrow = $sql->num_rows();
        if($numrow != 0){
            $this->form_validation->set_message('address_check', 'This {field} already exists');
            return false;               
        }else{
            return true;
        } 
   }
     protected function loadhelper(){
        $this->load->library('form_validation');
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
