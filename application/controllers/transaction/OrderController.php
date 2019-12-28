<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class OrderController extends CI_Controller {

    protected $fields;
    public function __construct()
	{
    parent::__construct();
    $this->load->model('Orders');
    
	}
    
    public function index()
    {
      $kolom = $this->Orders->kolom;
		  return $this->blade_view->render('shops.order.index',compact('kolom'));
    }

    public function create()
    {
      if ($this->input->server('REQUEST_METHOD') == 'GET'){
        $formInput = $this->fields;
        return $this->blade_view->render('master.product.create',compact('formInput'));
      }
      else if ($this->input->server('REQUEST_METHOD') == 'POST'){
        $id = $this->Products->insert($this->input->post());
        if($id)
        {
          $this->session->set_flashdata('msg', 'Sukses memanjingkan data...!!');
        }
        redirect($_SERVER['HTTP_REFERER']);
      }
    }
    public function delete($id)
    {
      $this->Products->where('id',$id)->delete();
      $this->session->set_flashdata('msg', 'Sukses delete data');
      redirect($_SERVER['HTTP_REFERER']);
    }

    public function take($id)
    {
      if ($this->input->server('REQUEST_METHOD') == 'GET'){
        $field = $this->Products
            // ->select($this->fields)
            ->find($id);
        return $this->blade_view->render('master.product.edit',compact('field'));
      }
      else if ($this->input->server('REQUEST_METHOD') == 'POST'){
        $dd = $this->Products
              ->where('id',$id)
              ->update($this->input->post());
        if($dd){
          $this->session->set_flashdata('msg', 'Sukses update data');
        }
        redirect($_SERVER['HTTP_REFERER']);
      }
      
    }
    
    public function grid()
      {
          $j = $this->griddata
                  ->field($this->Orders->kolom)
                  ->table('orders')
                  ->where('status','=',null)
                  ->add('edit',function($data){
                      $action = '<div class="btn-group-xs">';
                      $action += '<a href="'. route('order.take',$data['id']).'" class="btn btn-sm btn-warning m-b-2">Takes Order</a>';
                      $action += '<a href="'. route('order.take',$data['id']).'" class="btn btn-sm btn-warning m-b-2">Takes Order</a>';                      $action += '</div>';
                      return $action;
                  })
          // ->hide('billing_name', 'billing_company', 'billing_street_address', 'payment_method')
          ->generate();
          $this->output
                  ->set_content_type('application/json')
                  ->set_output($j);
      }
}

/* End of file OrderController.php */
