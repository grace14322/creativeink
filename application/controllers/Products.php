<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Products extends CI_Controller {

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
        $sql = $this->db->query('SELECT * FROM products');
        $row = $sql->num_rows();


        $products = "";

        if($row == 0){
            $products = 0;
        }else{
            $products = $sql->result();
        }

        $sql = $this->db->query('SELECT * FROM category');
        $row = $sql->num_rows();


        $categories = "";

        if($row == 0){
            $categories = [];
        }else{
            $categories = $sql->result();
        }

        $data = [
            'categories'  => $categories,
            'products'    => $products,
        ];
		$this->load->view('template\header',  $data);
        $this->load->view('products\products',  $data);
        $this->load->view('template\footer',  $data);
	}

    public function create(){
        $this->loadhelper();

        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->database();

        $this->is_logged_in();

        $this->form_validation->set_rules('productname', 'Product Name', 'required');
        $this->form_validation->set_rules('productquantity', 'Product Quantity', 'required');
        $this->form_validation->set_rules('productprice', 'Product Price', 'required');
        $this->form_validation->set_rules('category', 'Category', 'required');
        if ($this->form_validation->run() == FALSE)
        {
                $_SESSION['error-message'] = validation_errors();
        }else{
            $sql = $this->db->query("select * from products where pr_name LIKE '%".$_POST['productname']."%'");
            $numrows = $sql->num_rows();
            if($numrows == 0):
            $data = [
             'pr_name'      => $_POST['productname'],
             'pr_quantity'  => $_POST['productquantity'],
             'pr_price'     => $_POST['productprice'],
             'cat_id'       => $_POST['category'],
        ];

        $this->db->insert('products',$data);

        $_SESSION['success-message']=" Product Added";
            header('location:'.base_url().'products');
                exit(0);
            else:
                 $_SESSION['error-message']= "Product already added or has similar product name";
            endif;
        }


        header('location: '.base_url().'products');
    }

    public function view(){
        $this->load->database();

        $this->load->helper(['url','form']);

        $this->load->library('session');

        $pr_id = $_GET['id'];
        $sql = $this->db->query("select p.*, c.* from products p, category c where pr_id = '".$pr_id."' AND p.cat_id = c.cat_id");
        $numrow = $sql->num_rows();

        if($numrow == 0){
           $products = 0;
        } else {
           $products = $sql->result();
        }

        $sql = $this->db->query("SELECT * from category ");
        $numrow = $sql->num_rows();

        if($numrow == 0){
           $categories = 0;
        } else {
           $categories = $sql->result();
        }

        foreach($products as $product):
            $pr_id = $product->pr_id;
            $pname = $product->pr_name;
            $cat_id = $product->cat_id;
            $cat_name = $product->cat_name;
            $quantity = $product->pr_quantity;
            $pr_price = $product->pr_price;
        endforeach;
				$items = $this->db->query("SELECT SUM(i.item_quantity) 'iQuantity' FROM items i where pr_id =".$pr_id);
				$available_quantity = 0;
				foreach($items->result() as $itemx):
					 $itemx->iQuantity;
					if($itemx->iQuantity != null || $itemx->iQuantity != '' || $itemx->iQuantity != 0):
						 $available_quantity =	$quantity - $itemx->iQuantity;
					 else:
						 $available_quantity =	$quantity;
					endif;
				endforeach;
				$data = [
            'pr_id'         => $pr_id,
            'products'      => $products,
            'pname'         => $pname,
            'cat_id'        => $cat_id,
            'quantity'      => $available_quantity,
            'pr_price'      => $pr_price,
            'categories'    => $categories,
            'cat_name'      => $cat_name,
        ];
		$this->load->view('template\header',  $data);
        $this->load->view('products\productview',  $data);
        $this->load->view('template\footer',  $data);
    }

    public function update()
    {
        $this->loadhelper();
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->database();

        $this->is_logged_in();

        $this->form_validation->set_rules('productname', 'Product Name', 'required');
        $this->form_validation->set_rules('productprice', 'Product Price', 'required');
        $this->form_validation->set_rules('category', 'Category', 'required');
        if ($this->form_validation->run() == FALSE)
        {
                $_SESSION['error-message'] = validation_errors();
        }else{
            $sql = $this->db->query("select * from products where pr_name = '".$_POST['productname']."'");
            $numrows = $sql->num_rows();
            if($numrows == 0):
            $data = [
             'pr_name'      => $_POST['productname'],
             'pr_quantity'  => $_POST['productquantity'],
             'pr_price'     => $_POST['productprice'],
             'cat_id'       => $_POST['category'],
            ];

            $where = "pr_id = ".$_POST['id'];

            $this->db->update('products', $data, $where);

            $_SESSION['success-message']=" Product Updated";
            else:
                 $_SESSION['error-message']= "Product has almost same content or has similar product name";
            endif;
        }


        header('location: '.base_url().'products/view?id='.$_POST['id']);
    }
		public function updateQuantity()
		{
			$this->loadhelper();
			$pr_id = $this->input->post('pr_id');
			$quantityToAdd = $this->input->post('quantityToAdd');

			$sql = $this->db->query("SELECT * from products where pr_id = ".$pr_id);
			$rows = $sql->result();

			foreach($rows as $row):
					echo $pr_quantity = $row->pr_quantity;
			endforeach;

			$where = "pr_id = ".$pr_id;
			$data = [
						'pr_quantity' => $pr_quantity + $quantityToAdd,
			];
			$this->db->update('products', $data, $where);

			$_SESSION['success-message']=" Product Updated";

			header('location: '.base_url().'products/view?id='.$pr_id);
		}
    protected function loadhelper()
    {
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
