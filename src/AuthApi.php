<? php

namespace Krecent; 

use Krecent\Curl as Curl;

class AuthApi
{
	private $url;
	private $username;
	private $password;
	function __construct($url)
	{
		$this->url = $url;
	}
	/**
	 * undocumented function
	 *
	 * @return void
	 * @author 
	 **/
	public function getUser($username , $password , $userAgent)
	{
		$url =  $this->url . $username;
		$get = [
				 'user_password' => $password,
				];
		$headers = [
					'Content-Type: application/vnd.api+json',
					'User-Agent: Mozilla/5.0 (Windows NT 10.0)',
					'x-api-key: aupQj8k2YDjHOuXvacmI',
					];
		$response = Curl::get($url,$get,$headers);

		return $response;
	}

	/**
	 * undocumented function
	 *
	 * @return void
	 * @author 
	 **/
	public function setUser($email , $username , $password ,$registered_with )
	{
		$url =  $this->url;
		$post = [
				 'email_address' => $email,
				 'username' => $username, 
				 'user_password' => $password,
				 'registered_with' => $registered_with,
				];
		$headers = [
					'Content-Type: application/vnd.api+json',
					'User-Agent: Mozilla/5.0 (Windows NT 10.0)',
					'x-api-key: aupQj8k2YDjHOuXvacmI',
					];
		$response = Curl::post($url,$post,$headers);

		return $response;

	}
}