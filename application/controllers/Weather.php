<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Weather extends CI_Controller {

	public function index()
	{
		$apiKey = "79e90045733e7949d9a5a45eea68813e";
		$cityId = "1566083";
		$googleApiUrl = "http://api.openweathermap.org/data/2.5/weather?id=" . $cityId . "&lang=en&units=metric&APPID=" . $apiKey;

		$ch = curl_init();

		curl_setopt($ch, CURLOPT_HEADER, 0);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_URL, $googleApiUrl);
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
		curl_setopt($ch, CURLOPT_VERBOSE, 0);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		$response = curl_exec($ch);

		curl_close($ch);
		$data['data'] = json_decode($response);
		date_default_timezone_set("Asia/Ho_Chi_Minh");
		$data['currentTime'] = time();
		$this->load->view('components/weather', $data);
	}
	public function callApi($method, $url, $data)
	{
		$curl = curl_init();
	    switch ($method){
	      case "POST":
	         curl_setopt($curl, CURLOPT_POST, 1);
	         if ($data)
	            curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
	         break;
	      case "PUT":
	         curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "PUT");
	         if ($data)
	            curl_setopt($curl, CURLOPT_POSTFIELDS, $data);			 					
	         break;
	      default:
	         if ($data)
	            $url = sprintf("%s?%s", $url, http_build_query($data));
		}
	}
	public function mailmail()
		{
			$to = 'bqbiamshybee@gmail.com';
			$subject = 'S hello';
			$message = 'content';
			$header = "From: bqbiamshybee@gmail.com";
			if(mail($to, $subject, $message, $header) == true)
			{
				echo "sent";
			}
		}

}

/* End of file Weather.php */
/* Location: ./application/controllers/Weather.php */