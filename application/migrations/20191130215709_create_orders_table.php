<?php

defined('BASEPATH') OR exit('No direct script access allowed');
use Faker\Factory as Faker;
class Migration_create_orders_table extends CI_Migration
{
    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Customers');
    }
    
    public function up()
    {
        try {
            $this->dbforge->drop_table('orders',TRUE);
            $this->dbforge->add_field(array(
                'id' => array(
                        'type' => 'INT',
                        'constraint' => 100,
                        'unsigned' => TRUE,
                        'auto_increment' => TRUE
                ),
                'invoice_number' => array(
                    'type' => 'VARCHAR',
                    'constraint' => 100,
                    'unsigned' => TRUE,
                ),
                'customers_id' => array(
                    'type' => 'INT',
                    'constraint' => 100,
                    'unsigned' => TRUE,
                ),
                'delivery_name' => array(
                        'type' => 'VARCHAR',
                        'constraint' => '100',
                ),
                'delivery_company' => array(
                    'type' => 'VARCHAR',
                    'constraint' => '100',
                ),
                'delivery_street_address' => array(
                        'type' => 'TEXT',
                        'null' => TRUE,
                ),
                'delivery_city' => array(
                    'type' => 'VARCHAR',
                    'constraint' => '100',
                ),
                'delivery_postcode' => array(
                    'type' => 'VARCHAR',
                    'constraint' => '100',
                ),
                'delivery_state' => array(
                    'type' => 'VARCHAR',
                    'constraint' => '100',
                ),
                'delivery_phone' => array(
                    'type' => 'VARCHAR',
                    'constraint' => '100',
                ),
                'billing_name' => array(
                    'type' => 'VARCHAR',
                    'constraint' => '100',
                ),
                'billing_company' => array(
                    'type' => 'VARCHAR',
                    'constraint' => '100',
                ),
                'billing_street_address' => array(
                    'type' => 'TEXT',
                    'null' => TRUE,
                ),
                'payment_method' => array(
                    'type' => 'TEXT',
                    'null' => TRUE,
                ),
                'latitude' => array(
                    'type' => 'VARCHAR',
                    'constraint' => '100',
                ),
                'longitude' => array(
                    'type' => 'VARCHAR',
                    'constraint' => '100',
                ),
                'status' => array(
                    'type' => 'VARCHAR',
                    'constraint' => '100',
                ),
            ));
            $this->dbforge->add_key('id', TRUE);
            $this->dbforge->add_key('customers_id');
            $this->dbforge->create_table('orders');
        
            // create data dummy
        for ($i=0; $i < 100; $i++) { 
            $this->generateData();
        }

        } catch (\Throwable $th) {
            echo 'Message: ' .$th->getMessage();
        }

    }

    public function down()
    {
        $this->dbforge->drop_table('orders',TRUE);
    }

    protected function generateData()
    {
        try {
            $faker = Faker::create('id_ID');
            $invoice_number = 'INV-'.$faker->numberBetween($min = 1000, $max = 900000).date('Ymd');
            $customers_id = $faker->numberBetween($min = 1, $max = 100);
            $delivery_name = $faker->name($gender = 'male'|'female');
            $delivery_company = $faker->company;
            $delivery_street_address = $faker->address;
            $delivery_city = $faker->city;
            $delivery_postcode = $faker->postcode;
            $delivery_state = $faker->state;
            $delivery_phone = $faker->e164PhoneNumber;
            $billing_name = $faker->name;
            $billing_company = $faker->company;
            $billing_street_address = $faker->address;
            $payment_method = $faker->randomElement(['cash','credit']);
            $latitude = $faker->latitude($min = -6.30000, $max = -6.120000);
            $longitude = $faker->longitude($min = 106.700000, $max = 106.900000);
            $status = $faker->randomElement(['complete','delivery','pickup']);
            $dd = compact('invoice_number',
            'customers_id',
            'delivery_name',
            'delivery_company',
            'delivery_street_address',
            'delivery_city',
            'delivery_postcode',
            'delivery_state',
            'delivery_phone',
            'billing_name',
            'billing_company',
            'billing_street_address',
            'payment_method',
            'latitude',
            'longitude',
            'status');
            $this->db->insert('orders', $dd);
        } catch (\Throwable $th) {
            dump($th);
        }
        
        
    }
}