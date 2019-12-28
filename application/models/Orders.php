<?php

defined('BASEPATH') OR exit('No direct script access allowed');
use Ozdemir\Datatables\Datatables;
use Ozdemir\Datatables\DB\MySQL;
use Illuminate\Database\Eloquent\Model;
class Orders extends Model {
    public $timestamps = false;
    public $kolom = ['id', 'invoice_number', 'customers_id', 'delivery_name', 'delivery_company', 'delivery_street_address', 'delivery_city', 'delivery_postcode', 'delivery_state', 'delivery_phone', 'billing_name', 'billing_company', 'billing_street_address', 'payment_method', 'latitude', 'longitude'];
    public function __construct()
    {
        parent::__construct();
    }
}

/* End of file Couriers.php */
