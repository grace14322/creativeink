<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Category extends CI_Controller {

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
$this->load->helper(array('form', 'url'));

        $this->load->library('form_validation');
        $this->load->library('session');

        $this->load->database();

        $this->is_logged_in();

        $sql = $this->db->query('SELECT * FROM category');
        $row = $sql->num_rows();


        $category = "";

        if($row == 0){
            $category = '<span class="text-center">No category available</span>';
        }else{
            $category = $sql->result();
        }

        $data = [
            'categories'  => $category,
        ];

		$this->load->view('template/header', $data);
        $this->load->view('category/category', $data);
        $this->load->view('template/footer', $data);
	}
    public function update(){
        $this->load->database();

        $this->load->helper(['url','form']);
        $this->load->library('form_validation');
        $this->load->library('session');

        $this->is_logged_in();

        $this->form_validation->set_rules('categoryname', 'Category Name', 'required|alpha');
        if ($this->form_validation->run() == FALSE)
        {
                $_SESSION['error-message'] = validation_errors();
        }else{
            $sql = $this->db->query("select * from category where cat_name LIKE '%".$_POST['categoryname']."%'");
            $numrows = $sql->num_rows();
            if($numrows == 0):
            $data = [
             'cat_name' => $_POST['categoryname'],
            ];

            $where = "cat_id = ".$_POST['cat_id'];

            $this->db->update('category', $data, $where);

            $_SESSION['success-message']=" Product Updated";
            else:
                 $_SESSION['error-message']= "Category has similar category name";
            endif;
        }

        redirect('category/view?id='.$_POST['cat_id']);
    }
    public function view(){
        $this->load->database();

        $this->load->helper(['url','form']);

        $this->load->library('session');

        $cat_id = $_GET['id'];

        $sql = $this->db->query("SELECT * from category where cat_id = '".$cat_id."'");
        $numrow = $sql->num_rows();

        if($numrow == 0){
           $categories = 0;
        } else {
           $categories = $sql->result();
        }

        $sql = $this->db->query("select c.*, p.* from category c, products p where c.cat_id = '".$cat_id."' and p.cat_id = c.cat_id");
        $numrow = $sql->num_rows();

        if($numrow == 0){
           $products = 0;
        } else {
           $products = $sql->result();
        }
        foreach($categories as $category):
            $cat_name = $category->cat_name;
            $cat_id = $category->cat_id;
        endforeach;
        $data = [
            'products'      => $products,
            'cat_name'      => $cat_name,
            'cat_id'        => $cat_id,
        ];

		$this->load->view('template/header',  $data);
        $this->load->view('category/categoryview',  $data);
        $this->load->view('template/footer',  $data);
    }

    public function create(){

        $this->load->helper(array('form', 'url'));

        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->database();

        $this->is_logged_in();

        $this->form_validation->set_rules('categoryname', 'Category Name', 'required|alpha');
        if ($this->form_validation->run() == FALSE)
        {
                $_SESSION['error-message'] = validation_errors();
        }else{
            $sql = $this->db->query("select * from category where cat_name LIKE '%".$_POST['categoryname']."%'");
            $numrows = $sql->num_rows();
            if($numrows == 0):
                 $data = [
                    'cat_name' => $_POST['categoryname'],
                ];
                    $this->db->insert('category', $data);

                $_SESSION['success-message']=" Category Saved";
                header('location:'.base_url().'category');
                exit(0);
            else:
                 $_SESSION['error-message']= "Category already added or has similar category name";
            endif;
        }


        header('location:'.base_url().'category');
    }


    protected function is_logged_in()
    {
        if(!$this->session->userdata('user_id')){
            redirect('/');
        }

    }
}
