<?php

namespace Krecent; 

use Krecent\Curl as Curl;

class Api
{
	private $url;
	private $userAgent;
	private $apiKey;
	function __construct($url , $userAgent, $apiKey)
	{
		$this->url = $url;
		$this->apiKey = $apiKey;
		$this->userAgent = $userAgent;
	}
	/**
	 * Get the user instance for an existing user , else get necessary error response
	 *
	 *
	 * @param string $username unique name identifier for user
	 * @param string $password unique key to authenticate a user
	 * @return array
	 * @Waheed Derby 
	 **/
	public function getUser($username , $password)
	{
		$url = $this->url ."/". $username;
		$get = [
				 'user_password' => $password,
				];
		$headers = [
					'Content-Type: application/vnd.api+json',
					"User-Agent: $this->userAgent",
					"x-api-key: $this->apiKey",
					];
		$request = Curl::get($url,$get,$headers);
		$response = json_decode($request->response, true);
        if(isset($response["data"])){
        	$userArray = array('krc_user_id' => $response["data"]["id"], 'username' => $response["data"]["attributes"]["username"]);
            return $userArray;
         }elseif (isset($response["errors"])) {
            	if(isset($response["errors"][0]["code"])){
            		return $response["errors"][0];
            	}else{
            		return $response["errors"][0];
            	}
         }else{
            return false;
         }

	}

	/**
	 * Set instance for a new user ,  ensure all required parameters are submitted else,
	 * return a error response and info 
	 *
	 *
	 * @param string $username unique name identifier for user
	 * @param string $password unique key to authenticate a user
	 * @param string $email user email address to confirm user
	 * @param string $registered_with service used to register for the platform
	 * @return array
	 * @Waheed Derby 
	 **/
	public function setUser(
		$username,
        $password, 
        $email, 
        $registered_with)
	{
		
		$url =  $this->url;
		$post = [
				 'email_address' => $email,
				 'username' => $username,
				 'registered_with' => $registered_with,
				 'user_password' => $password				 
				];
		$headers = [
					'Content-Type: application/vnd.api+json',
					"User-Agent: $this->userAgent",
					"x-api-key: $this->apiKey",
					];
		$request = Curl::post($url,$post,$headers);
		$response = json_decode($request->response, true);
		if(isset($response["data"])){
        	$userArray = array('krc_user_id' => $response["data"]["id"], 'username' => $response["data"]["attributes"]["username"]);
            return $userArray;
         }elseif (isset($response["errors"])) {
            	if(isset($response["errors"][0]["code"])){
            		return $response["errors"][0];
            	}else{
            		return $response["errors"][0];
            	}
         }else{
            return false;
         }

	}
}