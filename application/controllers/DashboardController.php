<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DashboardController extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('googlemaps');
		$this->load->model('Orders');
		
	}

	public function index()
	{
		$lat_long = $this->Orders->select(['latitude','longitude','status'])
									->whereIn('status',['delivery','pickup'])
									->get();
		// dd($lat_long->toArray());
		
		$this->googlemaps->initialize();
		$this->googlemaps->center = '-6.21462, 106.84513';
		$this->googlemaps->directions = true;
		$this->googlemaps->minifyJS = true;
		foreach ($lat_long as $v) {
			switch ($v->status) {
				case 'delivery':
					$this->googlemaps->add_marker(
						[
							'position' => $v->latitude.', '.$v->longitude,
							'icon' => 'http://maps.google.com/mapfiles/kml/pal4/icon7.png'
						]
					);
					break;
				case 'pickup':
						$this->googlemaps->add_marker(
							[
								'position' => $v->latitude.', '.$v->longitude,
								'icon' => 'http://maps.google.com/mapfiles/kml/pal4/icon54.png',
								'onclick'=>'alert("dsdasdasdsa")'
							]
						);
					break;
			}
		}
		$data['map'] = $this->googlemaps->create_map();
		return $this->blade_view->render('template.map-dashboard',$data);
	}

}

/* End of file DashboardController.php */
/* Location: ./application/controllers/DashboardController.php */