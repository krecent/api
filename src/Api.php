<?php

namespace Krecent; 

use Krecent\Curl as Curl;

class Api
{
	private $url;
	private $username;
	private $password;
	// function __construct($url)
	// {
	// 	$this->url = $url;
	// }
	/**
	 * undocumented function
	 *
	 * @return void
	 * @author 
	 **/
	public function getUser($username , $password)
	{
		$url = "http://localhost:8000/api/auth/v1/users" ."/". $username;
		$get = [
				 'user_password' => $password,
				];
		$headers = [
					'Content-Type: application/vnd.api+json',
					'User-Agent: Mozilla/5.0 (Windows NT 10.0)',
					'x-api-key: aupQj8k2YDjHOuXvacmI',
					];
		$request = Curl::get($url,$get,$headers);

		$response = json_decode($request->response, true);
        if(isset($response["data"])){
        	$userArray = array('krc_user_id' => $response["data"]["id"], 'username' => $response["data"]["attributes"]["username"]);
            return $userArray;
         }elseif (isset($response["errors"])) {
            return $response["errors"][0]["code"];
         }else{
            return false;
         }

		// return $response;
	}

	/**
	 * undocumented function
	 *
	 * @return void
	 * @author 
	 **/
	public function setUser(
		$username,
        $password, 
        $email, 
        $registered_with)
	{
		
		$url =  "http://localhost:8000/api/auth/v1/users";
		$post = [
				 'email_address' => $email,
				 'username' => $username,
				 'registered_with' => $registered_with,
				 'user_password' => $password				 
				];
		$headers = [
					'Content-Type: application/vnd.api+json',
					'User-Agent: Windows NT 10.0',
					'x-api-key: aupQj8k2YDjHOuXvacmI',
					];
		$request = Curl::post($url,$post,$headers);

		$response = json_decode($request->response, true);
		if(isset($response["data"])){
        	$userArray = array('krc_user_id' => $response["data"]["id"], 'username' => $response["data"]["attributes"]["username"]);
            return $userArray;
         }elseif (isset($response["errors"])) {
            return $response["errors"][0]["code"];
         }else{
            return false;
         }

	}
}