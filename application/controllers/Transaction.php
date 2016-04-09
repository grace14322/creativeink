<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaction extends CI_Controller {

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
            $products = [];
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
				$branch = $this->db->query("SELECT * from branch where br_id = ".$this->session->br_id);

        $data = [
            'categories'  => $categories,
            'products'    => $products,
						'branches'		=> $branch->result(),
        ];
		$this->load->view('template\header', $data);
        $this->load->view('transaction\transaction', $data);
        $this->load->view('template\footer', $data);
	}
  public function getItem(){
		 $this->loadhelper();
		 $pr_id = $this->input->get('pr_id');
		 $item_quantity = $this->input->get('item_quantity');
		 $sql = $this->db->query("SELECT * FROM products where pr_id = '".$pr_id."'");
		 $numrows = $sql->num_rows();
		 $x = 0;
		 $itemsx = $this->db->query("SELECT SUM(i.item_quantity) 'iQuantity' FROM items i where pr_id =".$pr_id);
		 $rowsxz = $itemsx->num_rows;
		 $available_quantity = '';
		 foreach($sql->result() as $product):
			 foreach($itemsx->result() as $itemx):
				 if($itemx->iQuantity):
					 	$available_quantity =	$product->pr_quantity - $itemx->iQuantity;
					else:
					 	$available_quantity =	$product->pr_quantity;
				 endif;
			 endforeach;
			  $items[$x]['item_id'] = $product->pr_id;
			 	$items[$x]['item_quantity'] = $item_quantity;
				$items[$x]['item_name'] = $product->pr_name;
				$items[$x]['item_price']= $product->pr_price;
				$x++;
		 endforeach;
		 		if($item_quantity > $available_quantity):
					echo 0;
				else:
					echo json_encode($items);
				endif;
	}

	public function getQuantity()
  {
			$this->loadhelper();
			$pr_id = $this->input->get('pr_id');
			$products = $this->db->query("SELECT * from products where pr_id =".$pr_id);
			$items = $this->db->query("SELECT SUM(i.item_quantity) 'iQuantity' FROM items i where pr_id =".$pr_id);
			$available_quantity = 0;
			foreach($products->result() as $product):
				foreach($items->result() as $itemx):
					 $itemx->iQuantity;
					if($itemx->iQuantity != null || $itemx->iQuantity != '' || $itemx->iQuantity != 0):
						 $available_quantity =	$product->pr_quantity - $itemx->iQuantity;
					 else:
						 $available_quantity =	$product->pr_quantity;
					endif;
				endforeach;
			endforeach;
			echo $available_quantity;
	}
	public function voidItem()
	{
			$this->loadhelper();
			$password = md5($this->input->get('password'));
			$br_id = $this->input->get('br_id');
			$sqlx = $this->db->query("SELECT * from users where br_id = ".$br_id." AND password='".$password."'");
			$num_rows = $sqlx->num_rows();
			echo $num_rows;
	}
	  public function store()
		{
			$this->loadhelper();
			$transaction_id = $this->makeid();
			$items = json_decode(json_encode($this->input->get('items')),true);
			$total = $this->input->get('total');

			$data = [
						'tr_id' => $transaction_id,
						'user_id' => $this->session->userdata('user_id'),
						'cu_id' => 0,
						'br_id' => $this->session->userdata('br_id'),
						'tr_details' => '',
						'total'	=> $total,
			];

			$this->db->insert('transaction', $data);
			foreach($items as $item => $value):
						 $data = [
							 		'tr_id' => $transaction_id,
							 		'pr_id' => $value['item_id'],
									'item_quantity' => $value['item_quantity'],
						 ];
						 $this->db->insert('items', $data);
			endforeach;

			echo 1;
		}
		public function viewitems(){
			$this->loadhelper();
			 	$items = $this->db->query("SELECT  i.tr_id 'transaction_id',  p.pr_name 'pr_name',  p.pr_price 'price',  i.item_quantity 'quantity' FROM items i, products p where i.pr_id = p.pr_id AND i.tr_id = '".$_GET['tr_id']."'");

				echo json_encode($items->result());
		}
		protected function makeid()
		{
			$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		 $charactersLength = strlen($characters);
		 $randomString = '';
		 for ($i = 0; $i < 11; $i++) {
				 $randomString .= $characters[rand(0, $charactersLength - 1)];
		 }
		 return $randomString;
		}
    protected function loadhelper()
    {
			  $this->load->helper('date');
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
     }
}
