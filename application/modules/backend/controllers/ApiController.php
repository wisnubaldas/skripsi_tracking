<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use \Firebase\JWT\JWT;
class ApiController extends MX_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model(['Tracking_d','Tracking_h']);
	}
	public function index()
	{
		$token = $this->uri->segment(2);
		try {
			$decoded = JWT::decode($token, 'baldas', array('HS256'));
	        $decodedData = (array) $decoded;
	        // dump($decodedData);
			$data = json_decode($this->input->raw_input_stream);
			$result = $this->create_data($data);
		} catch (\Firebase\JWT\SignatureInvalidException $e) {
			$this->output
					->set_status_header(200)
			        ->set_content_type('application/json')
			        ->set_output(json_encode(array('message' => $e->getMessage())));
		}

	}
	private function create_data($data)
	{
		foreach ($data as $v) {
				$smi = $v->smi;
				$awb = $v->AWBNumber;
				$hawb = isset($v->hawb)?$v->hawb:null;
				$host_name = $v->HostName;
				$airline_prefix = $v->AirlinePrefix;
				$partial_pieces = isset($v->PartialNumberOfPieces)?$v->PartialNumberOfPieces:null;
				$weight = isset($v->Weight)?$v->Weight:null;
				$pieces = isset($v->TotalNumberOfPieces)?$v->TotalNumberOfPieces:null;
				$flight_number = isset($v->FlightNumber)?$v->FlightNumber:null;
				$flag = $v->MessageSent;
				$shipper = isset($v->ShipperName)?$v->ShipperName:null;
				$created_at = $v->create_at;
				$detail = compact('awb','host_name','airline_prefix','partial_pieces','weight','pieces','flight_number','flag','shipper','created_at');

				Tracking_d::insert($detail);
				$header = compact('smi','awb');
				Tracking_h::insert($header);
				print_r($header);

				// $this->output
				// 	->set_status_header(200)
			 //        ->set_content_type('application/json')
			 //        ->set_output(json_encode(array('message' => 'sukses')));
			}
	}

}

/*
try {
    (new \Firebase\JWT\JWT())->decode($token, $key, $allowedAlgorithms);
} catch (\InvalidArgumentException $e) {
    // Key may not be empty
} catch (\Firebase\JWT\SignatureInvalidException $e) {
    // Signature verification failed
} catch (\Firebase\JWT\BeforeValidException $e) {
    // Cannot handle token prior to <datetime>
} catch (\Firebase\JWT\ExpiredException $e) {
    // Expired token
} catch (\UnexpectedValueException $e) {
    // Wrong number of segments
    // Invalid header encoding
    // Invalid claims encoding
    // Invalid signature encoding
    // Empty algorithm
    // Algorithm not supported
    // Algorithm not allowed
    // "kid" invalid, unable to lookup correct key
    // "kid" empty, unable to lookup correct key
} catch (\DomainException $e) {
    // Null result with non-null input --at json decode
    // Algorithm not supported --at verify
    // OpenSSL error: <error> --at verify
} catch (\Exception $e) {
    // NA
}
*/

/* End of file ApiController.php */
/* Location: ./application/modules/backend/controllers/ApiController.php */