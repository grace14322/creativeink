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

        $sql = $this->db->query("SELECT * FROM category c WHERE c.deleted_at = '0000-00-00 00:00:00'");

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

    public function trash($id)
    {
       $this->load->database();
       $this->load->helper(array('form', 'url'));

        $this->load->library('form_validation');
        $this->load->library('session');

        $data = [
            'deleted_at'    => date('Y-m-d H:i:s'),
                ];

        $where = "cat_id = '$id'";

        $this->db->update('category', $data, $where);
        $this->db->update('products', $data, $where);

        $_SESSION['success-message']=" Category Deleted";

        echo $_SESSION['success-message'];

        header('location:'.base_url().'category');
    }

    public function deletepr()
    {
       $this->load->database();
       $this->load->helper(array('form', 'url'));

        $this->load->library('form_validation');
        $this->load->library('session');

        $_SESSION['success-message']=" Product Deleted";

        echo $_SESSION['success-message'];

        redirect('category/view?id='.$_POST['cat_id']);
    }

    public function update(){

        $this->load->helper(['url','form']);
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->database();

        $this->is_logged_in();
        $sqlx = $this->db->query("SELECT * from category where cat_id = ".$_POST['id']);
        $rownum = $sqlx->num_rows();
        $categorynamex = $sqlx->row();
        $callback = '';
        if($_POST['categoryname'] != $categorynamex->cat_name){
               $callback = '|callback_categoryname_check';
        }

        $this->form_validation->set_rules('categoryname', 'Category Name', 'required|alpha'.$callback);

        if ($this->form_validation->run() == FALSE)
        {
                $_SESSION['error-message'] = validation_errors();
        }else{
            $data = [
             'cat_name' => $_POST['categoryname'],
            ];

            $where = "cat_id = ".$_POST['cat_id'];

            $this->db->update('category', $data, $where);

            $_SESSION['success-message']=" Category Updated";
        }

        redirect('category/view?id='.$_POST['cat_id']);
    }
    public function categoryname_check($categoryname) {
     $this->load->helper(['url','form']);
    $sql = $this->db->query("SELECT * from category where cat_name ='".$categoryname."' ");
    $numrow = $sql->num_rows();
        if($numrow != 0){
            $this->form_validation->set_message('categoryname_check', 'Category has similar {field} ');
            return false;
        }else{
            return true;
        }
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

        $this->form_validation->set_rules('categoryname', 'Category Name', 'required|alpha|is_unique[category.cat_name]',
            array(
                'is_unique'     => 'Category already added or has similar category name'
                )
            );

        if ($this->form_validation->run() == FALSE)
        {
                $_SESSION['error-message'] = validation_errors();
        }else{
                 $data = [
                    'cat_name' => $_POST['categoryname'],
                ];
                    $this->db->insert('category', $data);

                $_SESSION['success-message']=" Category Saved";
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
