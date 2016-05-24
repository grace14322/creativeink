<?php

defined('BASEPATH') OR exit('No Direct Script Allowed');

class Settings extends CI_Controller{


    public function index(){
        $this->loadhelper();
        $this->load->view('template\header');
        $this->load->view('settings\settings');
        $this->load->view('template\footer');
    }

    public function updateinfo()
    {

        $this->loadhelper();
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->database();

        $this->is_logged_in();

        $this->form_validation->set_rules('fname', 'First Name', 'required');
        $this->form_validation->set_rules('lname', 'Last Name', 'required|alpha');
        $sqlx = $this->db->query("SELECT * from users where user_id = ".$this->session->userdata('user_id'));
        $rownum = $sqlx->num_rows();
        $emailx = $sqlx->row();
        $callback = '';
        if($_POST['email'] != $emailx->email){
               $callback = '|callback_email_check';
        }

        $this->form_validation->set_rules('email', 'E-Mail', 'required|valid_email'.$callback);

        $this->form_validation->set_rules('gender', 'Gender', 'required');
        $sqly = $this->db->query("SELECT * from users where user_id = ".$this->session->userdata('user_id'));
        $rownum = $sqly->num_rows();
        $usernamex = $sqly->row();
        $callback = '';
        if($_POST['username'] != $usernamex->username){
               $callback = '|callback_username_check';
        }
        if ($this->session->userdata('is_admin') ){
            $this->form_validation->set_rules('username', 'Username', 'required'.$callback);
        }
                if ($this->form_validation->run() == FALSE)
        {
                $_SESSION['error-message'] = validation_errors();
        }
        else
        {
        $data = [
                    'firstname' => $_POST['fname'],
                    'lastname' => $_POST['lname'],
                    'gender' => $_POST['gender'],
                    'username' => $_POST['username'],
                    'email' => $_POST['email'],
        ];

      // echo $this->session->userdata('user_id');

        $this->db->where([ 'user_id' => $this->session->userdata('user_id') ]);
        $this->db->update('users', $data);

        $_SESSION['success-message']=" Profile Saved";

        echo $_SESSION['success-message'];
        }

        $sql = $this->db->query('SELECT * from users where user_id = '.$this->session->userdata('user_id'));
         $info = $sql->row();
                    $data = [
                            'user_id'   => $info->user_id,
                            'firstname' => $info->firstname,
                            'lastname'  => $info->lastname,
                            'email'     => $info->email,
                            'username'  => $info->username,
                            'gender'    => $info->gender,
                    ];

                    $this->session->set_userdata($data);

        header('location:'.base_url().'settings');
    }

  public function email_check($email) {
    $this->loadhelper();
     $sql = $this->db->query("SELECT * from users where email ='".$email."' ");
     $numrow = $sql->num_rows();
        if($numrow != 0){
            $this->form_validation->set_message('email_check', 'This {field} already exists');
            return false;
        }else{
            return true;
        }
   }
public function username_check($username) {
    $this->loadhelper();
     $sql = $this->db->query("SELECT * from users where username ='".$username."' ");
     $numrow = $sql->num_rows();
        if($numrow != 0){
            $this->form_validation->set_message('username_check', 'This {field} already exists');
            return false;
        }else{
            return true;
        }
   }
    public function updatepassword()
    {
        $this->loadhelper();
        $this->load->library('session');

        $password = $_POST['npass'];

        if(strlen($password) > 20) {
             $message = 'Password is too long, the maximum characters is 20';
             $message = $this->session->set_flashdata('error-message', $message);
            header('location:'.base_url().'settings');
            exit(1);
            }

        $cpassword = md5($_POST['cpass']);
        $npassword = md5($_POST['npass']);
        $vpassword = md5($_POST['vpass']);

        $message = '';

        $sql = $this->db->query('SELECT * from users where user_id = '.$this->session->userdata('user_id'));
         $info = $sql->row();

        if($cpassword != $info->password){
            $message = 'Oops! Invalid password.';
            $message = $this->session->set_flashdata('error-message', $message);
            header('location:'.base_url().'settings');
            exit(1);
        }

        if($cpassword == $npassword){
            $message = 'Oops! it looks like you have an error';
            $message = $this->session->set_flashdata('error-message', $message);
            header('location:'.base_url().'settings');
            exit(1);
        }
        if($npassword != $vpassword){
            $message = 'Oops! New Password and Confirm password did not match.';
            $message = $this->session->set_flashdata('error-message', $message);
            header('location:'.base_url().'settings');
            exit(1);
        }

        $data = [
            'password' => $npassword,
        ];

        $this->db->where([ 'user_id' => $this->session->userdata('user_id') ]);
        $this->db->update('users', $data);



        $sql = $this->db->query('SELECT * from users where user_id = '.$this->session->userdata('user_id'));
         $info = $sql->row();
                    $data = [
                            'user_id'   => $info->user_id,
                            'firstname' => $info->firstname,
                            'lastname'  => $info->lastname,
                            'email'     => $info->email,
                            'username'  => $info->username,
                            'gender'    => $info->gender,
                    ];

                    $this->session->set_userdata($data);

        $_SESSION['success-message']=" Password Changed";

        echo $_SESSION['success-message'];

        header('location:'.base_url().'settings');

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
