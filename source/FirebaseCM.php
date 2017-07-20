<?php
namespace ald;

class FirebaseCM {
	//data Fields
	private $fields;
	
	//Google Firebase Cloud Msg URL
	private $fcm_url = "https://fcm.googleapis.com/fcm/send";

	//Header for Request
	private $headers;

	public function __construct($server_key){
		// set the server keys
		$this->headers = array(
			"Authorization: key=" . $server_key,
			"Content-Type: application/json"
		);
	}

	public function send($target, array $payload, array $data = null, $priority = "high") {
		/*
		* default value to send to fcm server
		*/
		$this->fields = [
			'priority' => $priority,
			'data' => $data,
			'notification' => $payload
		];

		/*
		* target can be list of ID or registration token,
		* but if not array, it's ma topic, or somethings 
		*/
		if(is_array($target)){
			$this->fields['registration_ids'] = (array)$target;
		}else{
			$this->fields['to'] = $target;
		}

		//and sent
		return $this->sendPushNotification();
	}
	
	/*
	* This function will make the actuall curl request to firebase server
	* and then the message is sent 
	*/
	private function sendPushNotification() {
		//Initializing curl to open a connection
		$ch = curl_init();
 
		//Setting the curl url
		curl_setopt($ch, CURLOPT_URL, $this->fcm_url);
		
		//setting the method as post
		curl_setopt($ch, CURLOPT_POST, true);

		//adding headers 
		curl_setopt($ch, CURLOPT_HTTPHEADER, $this->headers);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
 
		//disabling ssl support
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		
		//adding the fields in json format 
		curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($this->fields));
 
		//finally executing the curl request 
		$result = curl_exec($ch);
		if ($result === FALSE) {
			die('Curl failed: ' . curl_error($ch));
		}
 
		//Now close the connection
		curl_close($ch);
 
		//and return the result 
		return $result;
	}
}