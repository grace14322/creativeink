<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

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


            $ext = "select u.*, ut.*, b.br_name  from users u, user_type ut, branch b where u.ustype_id = ut.ustype_id and ut.ustype_id = u.ustype_id and u.br_id = b.br_id and b.br_id = u.br_id";

        if(!$this->session->userdata('is_admin')):
            $ext = 'select u.*, ut.*, b.br_name  from users u, user_type ut, branch b  where u.ustype_id = ut.ustype_id and u.br_id = b.br_id and b.br_id = '.$this->session->userdata('br_id').' and u.ustype_id <> 1';
        endif;
        $sql = $this->db->query($ext);
        $row = $sql->num_rows();
        $users = "";
        if($row == 0){
            $users = 0;
        }else{
            $users = $sql->result();
        }

        $sql = $this->db->query('select * from branch');
        $row = $sql->num_rows();

        $branch = "";
        if($row == 0){
            $branch = 0;
        }else{
            $branch = $sql->result();
        }

        $sql = $this->db->query('select * from user_type');
        $row = $sql->num_rows();

        $user_type = "";
        if($row == 0){
            $user_type = 0;
        }else{
            $user_type = $sql->result();
        }

        $data = [
            'branches' => $branch,
            'users'  => $users,
            'user_types' => $user_type,
        ];

		$this->load->view('template/header', $data);
        $this->load->view('user/user', $data);
        $this->load->view('template/footer', $data);
	}

    public function viewuser(){
        $this->loadhelper();

        $sql = $this->db->query('select u.*, ut.*, b.*  from users u, user_type ut, branch b where u.user_id = '. $_GET['id'] .' AND u.ustype_id = ut.ustype_id and u.br_id = b.br_id');
        $row = $sql->num_rows();

        $users = "";
        if($row == 0){
            $users = 0;
        }else{
            $users = $sql->result();
        }

        foreach($users as $user):
            $user_id = $user->user_id;
            $firstname = $user->firstname;
            $lastname = $user->lastname;
            $email = $user->email;
            $gender_id = $user->gender;
            if($gender_id == 1):
                $gender = "Male";
            else:
                $gender = "Female";
            endif;
            $user_types = $user->ustype_name;
            $branch = $user->br_name;
            $br_id  = $user->br_id;
            $ustype_id = $user->ustype_id;
        endforeach;
        $sql = $this->db->query('select * from branch');
        $row = $sql->num_rows();

        $branches = "";
        if($row == 0){
            $branches = 0;
        }else{
            $branches = $sql->result();
        }

        $sql = $this->db->query('select * from user_type');
        $row = $sql->num_rows();

        $user_type = "";
        if($row == 0){
            $user_type = 0;
        }else{
            $user_type = $sql->result();
        }

        $data = [
            'user_id'   => $user_id,
            'firstname' => $firstname,
            'lastname'  => $lastname,
            'email'     => $email,
            'gender'    => $gender,
            'user_types' => $user_types,
            'branch'    => $branch,
            'br_id'     => $br_id,
            'ustype_id' => $ustype_id,
            'branches'  => $branches,
            'user_type' => $user_type,
            'gender_id' => $gender_id,
        ];

        $this->load->view('template/header', $data);
        $this->load->view('user/userview', $data);
        $this->load->view('template/footer', $data);
    }

    public function update(){
         $this->loadhelper();
        $this->form_validation->set_rules('usertype', 'User type', 'required');
        $this->form_validation->set_rules('firstname', 'First Name', 'required');
        $this->form_validation->set_rules('lastname', 'Last Name', 'required');
        $this->form_validation->set_rules('email', 'E-Mail', 'required|valid_email');
        $this->form_validation->set_rules('gender', 'Gender', 'required');
        if ($this->form_validation->run() == FALSE)
        {
                $_SESSION['error-message'] = validation_errors();
        }
        else
        {
            $data = [
                'br_id' => $_POST['branch'],
                'ustype_id' => $_POST['usertype'],
                'firstname' => $_POST['firstname'],
                'lastname'  => $_POST['lastname'],
                'email'     => $_POST['email'],
                'gender'    => $_POST['gender'],
            ];
        $this->db->where([ 'user_id' => $_POST['user_id'] ]);
        $this->db->update('users', $data);

        $_SESSION['success-message']=" User Updated";

        echo $_SESSION['success-message'];

        }


        header('location:'.base_url().'users/viewuser?id='.$_POST['user_id']);
    }

    public function create(){
        $this->loadhelper();

        $this->form_validation->set_rules('usertype', 'User type', 'required');
        $this->form_validation->set_rules('firstname', 'First Name', 'required');
        $this->form_validation->set_rules('lastname', 'Last Name', 'required');
        $this->form_validation->set_rules('email', 'E-Mail', 'required|valid_email');
        $this->form_validation->set_rules('gender', 'Gender', 'required');
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('vpassword', 'Confirm Password', 'required');
        if ($this->form_validation->run() == FALSE)
        {
                $_SESSION['error-message'] = validation_errors();
        }
        else
        {
					
            $data = [
                'br_id' => $_POST['branch'],
                'ustype_id' => $_POST['usertype'],
                'firstname' => $_POST['firstname'],
                'lastname'  => $_POST['lastname'],
                'email'     => $_POST['email'],
                'gender'    => $_POST['gender'],
                'username'  => $_POST['username'],
                'password'  => md5($_POST['password']),
            ];

            $this->db->insert('users', $data);

            $_SESSION['success-message']=" User Added";

            echo $_SESSION['success-message'];
        }


        header('location:'.base_url().'users');
    }

    protected function loadhelper()
    {
        $this->load->database();
        $this->load->helper(['url','form']);
        $this->load->library('session');
        $this->load->library('form_validation');
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
