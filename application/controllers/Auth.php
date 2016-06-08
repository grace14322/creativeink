<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

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

    public function password_check($str)
    {
       if (preg_match('#[0-9]#', $str) && preg_match('#[a-zA-Z]#', $str)) {
         return TRUE;
       }
       return FALSE;
    }
    public function postLogin()
    {
       $this->load->database();
       $this->load->helper(array('form', 'url'));

        $this->load->library('form_validation');
        $this->load->library('session');

        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required',
                array('required' => 'You must provide a %s.')
        );
        if ($this->form_validation->run() == FALSE)
        {
                $_SESSION['error-message'] =  validation_errors();
                redirect(base_url());
        }
        else
        {
                $sql = $this->db->query('SELECT * from users where (username = "'.$_POST['username'].'" OR email = "'.$_POST['username'].'") AND password="'.md5($_POST['password']).'"');
                $row = $sql->num_rows();
                if ($row == 0) {
                     $_SESSION['error-message'] = 'These credentials do not match our records';
                     header('location:'.base_url());
                } else {
                    $info = $sql->row();
                    $is_admin = false;
                    if($info->ustype_id == 1):
                        $is_admin = true;
                    endif;
                    $sqlx = $this->db->query("Select * from branch where br_id='".$info->br_id."'");


                    $info->branch_name = $sqlx->row()->br_name;

                    $data = [
                            'user_id'   => $info->user_id,
                            'firstname' => $info->firstname,
                            'lastname'  => $info->lastname,
                            'email'     => $info->email,
                            'username'  => $info->username,
                            'gender'    => $info->gender,
                            'ustype_id' => $info->ustype_id,
                            'br_id'     => $info->br_id,
                            'branch'    => $info->branch_name,
                            'is_admin'  => $is_admin,
                    ];

                    $this->session->set_userdata($data);
                    if($info->ustype_id == 3):
                        redirect('transaction');
                    endif;
                    header('location: '.base_url().'dashboard');
                }
        }
    }

    public function logout()
    {
       $this->load->database();
       $this->load->helper(array('form', 'url'));

        $this->load->library('form_validation');
        $this->load->library('session');

        $this->session->sess_destroy();
        redirect('/');
    }
		public function forgotpassword()
		{
			$this->load->database();
		 $this->load->helper(array('form', 'url'));

			$this->load->library('form_validation');
			$this->load->library('session');

				$this->load->view('template\header');
				$this->load->view('auth\forgotpassword');
				$this->load->view('template\footer');
		}
		public function emailReset(){
			$this->load->database();
		 $this->load->helper(array('form', 'url'));

			$this->load->library('form_validation');
			$this->load->library('session');
			$this->form_validation->set_rules('email', 'E - Mail', 'required|valid_email');
			if ($this->form_validation->run() == FALSE)
			{
                $_SESSION['validation-errors'] = validation_errors();
                redirect(base_url('auth/forgotpassword'));
			}
			else
			{
				$email_slug = $this->makeslug();


				$sqlemail = $this->db->query("SELECT * from users where email = '".$this->input->post('email')."'");
				if($sqlemail->num_rows() == 0):
					$_SESSION['error-message'] = "We don't have a record for ".$this->input->post('email');
				else:
					foreach($sqlemail->result() as $x):
							$user_id = $x->user_id;
					endforeach;
					$data = [
							'email_slug' => $email_slug,
							'user_id'	=> $user_id,
					];
					$this->db->insert('emailreset',$data);
					$config = Array(
						'protocol' => 'smtp',
						'smtp_host' => 'ssl://smtp.googlemail.com',
						'smtp_port' => 465,
						'smtp_user' => 'creativeinkpos@gmail.com',
						'smtp_pass' => 'brzlkymqmkohzlql',
						'smtp_timeout' => '4',
            'mailtype'  => 'html',
            'charset'   => 'iso-8859-1'
					);
						$this->load->library('email', $config);
						$this->email->set_newline("\r\n");
						$this->email->from('creativeinkpos@gmail.com', 'Creativeink');
						$this->email->to($this->input->post('email'));
						$this->email->subject(' Password Reset ');
						$data = [
									'slug' => $email_slug,
						];
						$body = $this->load->view('emails/forgottemplate.php',$data,TRUE);

						$this->email->message($body);
						if (!$this->email->send()) {
							show_error($this->email->print_debugger());
						}
						else {
							$_SESSION['success-message'] = 'We have e-mailed your password reset link!';

						}
				endif;
					redirect(base_url().'auth/forgotpassword');
			}


		}
		public function reset()
		{
			$this->load->database();
		 $this->load->helper(array('form', 'url'));
		   $this->load->library('session');

			$this->load->library('form_validation');
			$this->load->library('session');
			$sql = $this->db->query("SELECT * from emailreset where email_slug = '".$_GET['t']."'");
			if($sql->num_rows() == 0):
					$_SESSION['error-message'] = 'This page is no longer exist or the link has expired';
					redirect('/');
			else:
				foreach($sql->result() as $x):
					 $user_id = $x->user_id;
				endforeach;
				$data = [
						'user_id' =>$user_id,
				];
				$this->load->view('template\header', $data);
				$this->load->view('auth\resetpassword', $data);
				$this->load->view('template\footer', $data);
			endif;

		}
		public function resetpassword()
		{
             $this->load->database();
			 $this->load->helper(array('form', 'url'));
 		     $this->load->library('session');

			 $npassword = md5($_POST['npass']);
			 $vpassword = md5($_POST['vpass']);
			 $user_id = $_POST['user_id'];
			 $t = $_POST['slug'];
			 $message = '';

            $password = $_POST['npass'];

            if(strlen($password) > 20) {
             $message = 'Password is too long, the maximum characters is 20';
             $message = $this->session->set_flashdata('error-message', $message);
             header('location:'.base_url().'auth/reset?t='.$t);
             exit(1);
            }

			 if($_POST['npass'] == '' || $_POST['vpass'] == ''){
					 $message = 'Please Complete the form to proceed';
					 $message = $this->session->set_flashdata('error-message', $message);
					 header('location:'.base_url().'auth/reset?t='.$t);
					 exit(1);
			 }
			 if($npassword != $vpassword){
					 $message = 'Oops! New Password and Confirm password did not match.';
					 $message = $this->session->set_flashdata('error-message', $message);
					 header('location:'.base_url().'auth/reset?t='.$t);
					 exit(1);
			 }

			 $data = [
					 'password' => $npassword,
			 ];

			 $this->db->where([ 'user_id' => $user_id ]);
			 $this->db->update('users', $data);

			 $this->db->query("DELETE from emailreset where email_slug ='".$t."' ");

			 $_SESSION['success-message'] = 'Password Reset';
			 redirect('/');
		}
     protected function is_logged_in()
    {
			$this->load->database();
		 $this->load->helper(array('form', 'url'));
			$this->load->library('session');
        if(!$this->session->userdata('user_id')){
            redirect('/');
        }
         redirect('dashboard');

    }

		protected function makeslug()
		{
			$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		 $charactersLength = strlen($characters);
		 $randomString = '';
		 for ($i = 0; $i < 20; $i++) {
				 $randomString .= $characters[rand(0, $charactersLength - 1)];
		 }
		 return $randomString;
		}
}
