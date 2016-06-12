<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Notify extends CI_Controller {

	public function notifyproduct()
	{
      $this->loadhelper();
      $products = $this->db->query('SELECT * from products');
      if($products->num_rows() != 0):
        $x = 0;
        $productWithSmallQuantity = [];
        foreach($products->result() as $product):
          $xx = $this->checkQuantity($product->pr_id, $product->pr_quantity);
          if($xx <= 20){
                $productWithSmallQuantity[$x] = $product;
          }
          $x++;
        endforeach;
      endif;
      if(count($productWithSmallQuantity) != 0):
        echo  json_encode($productWithSmallQuantity);
      endif;
	}

  public function getAvailableQuantity($pr_id, $pr_quantity)
	{
			echo $this->checkQuantity($pr_id, $pr_quantity);
	}
																							//10
  protected function checkQuantity($pr_id, $pr_quantity){
    $this->load->database();
    $items = $this->db->query('SELECT * from items where pr_id = '. $pr_id);
    $total_item_quantity = 0;
    foreach($items->result() as $item):
        $total_item_quantity =  $total_item_quantity + $item->item_quantity;
    endforeach;
							//180            //37
     return $pr_quantity - $total_item_quantity;
  }
  protected function loadhelper(){
      $this->load->database();
      $this->load->helper(['url','form']);
      $this->load->library('session');
  }
}
