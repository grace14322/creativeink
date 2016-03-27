<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

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
		$this->load->helper('url');
		$this->load->library('session');
		$this->load->database();

		$this->is_logged_in();

		$this->getSalesToday();
		$sql = $this->db->query("SELECT distinct(DATE_FORMAT(tr_at, '%Y-%m')) 'm', SUM(total) 'p' FROM transaction t group by YEAR(tr_at),MONTH(tr_at)");
		//$sql = $this->db->query("SELECT distinct(DATE_FORMAT(t.tr_at, '%Y-%m')) 'm', b.br_id 'b', SUM(t.total) 'p' FROM transaction t, branch b where t.br_id = b.br_id group by YEAR(t.tr_at),MONTH(t.tr_at), t.br_id;");

		$rows = json_encode($sql->result());
		// foreach($rows as $date):
		//      $date->dates;
		// endforeach;
		$sql_branch = $this->db->query('SELECT * FROM branch');
		$branches = $sql_branch->result();
		$x = [
				'dataforChart' => $rows,
				'branches'=> $branches,
		];

    $this->load->view('template/header', $x);
    $this->load->view('dashboard/dashboard', $x);
    $this->load->view('template/footer', $x);

	}

	public function branch()
	{
		$br_id = $this->input->get('br_id');
		$this->load->helper('url');
		$this->load->library('session');
		$this->load->database();

		$this->is_logged_in();

		$this->getSalesToday();
		$sql = $this->db->query("SELECT distinct(DATE_FORMAT(tr_at, '%Y-%m')) 'm', SUM(total) 'p' FROM transaction t WHERE t.br_id = $br_id group by YEAR(tr_at),MONTH(tr_at)");
		//$sql = $this->db->query("SELECT distinct(DATE_FORMAT(t.tr_at, '%Y-%m')) 'm', b.br_id 'b', SUM(t.total) 'p' FROM transaction t, branch b where t.br_id = b.br_id group by YEAR(t.tr_at),MONTH(t.tr_at), t.br_id;");

		$rows = json_encode($sql->result());
		// foreach($rows as $date):
		//      $date->dates;
		// endforeach;
		$sql_branch = $this->db->query('SELECT * FROM branch');
		$branches = $sql_branch->result();
		$x = [
				'dataforChart' => $rows,
				'branches'=> $branches,
		];

		$this->load->view('template/header', $x);
		$this->load->view('dashboard/dashboard', $x);
		$this->load->view('template/footer', $x);
	}
protected function getSalesToday()
{
	$ustype_id = $this->session->userdata('ustype_id');

	$sql = $this->db->query("select * from user_type where ustype_id= ".$ustype_id);
	$info = $sql->row();

	$sql = $this->db->query('select * from transaction where tr_at >= CURDATE()');
	$numrows = $sql->num_rows();
	$total = 0;
	if($numrows != 0){
			foreach($sql->result() as $tr):
					$total = $total + $tr->total;
			endforeach;
	}
	$data = [
			'usertype' => $info->ustype_name,
			'salesToday' => $total,
	];

	$this->session->set_userdata($data);
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
