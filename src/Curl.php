<?php

namespace Krecent;

class Curl
{
	const CONNECTION_TIMEOUT=30;
	
	/*
	send GET requests
	@param string $url tp request
	@param array $get values to send
	@param array $options for cURL
	@return string	
	*/

	public static function get($url, array $get=array(),array $headers=array())
	{
		$defaults = array
		(
			CURLOPT_URL => $url . (strpos($url, '?') === FALSE ? '?' : '') . http_build_query($get),
            CURLOPT_HTTPHEADER => $headers,
            CURLOPT_RETURNTRANSFER => TRUE,
            CURLOPT_TIMEOUT => self::CONNECTION_TIMEOUT
		);
		return self::send( $defaults);
	
	}
	
	/**
     * Send a POST request using cURL.
     * @param string $url to request
     * @param array $post POST data to send
     * @param array $options for cURL
     * @return string
     */
    public static function post($url, array $post = array(), array $headers = array())
    {   
        $defaults = array
        (
            CURLOPT_URL => $url,
            CURLOPT_POST => TRUE,
            CURLOPT_POSTFIELDS => http_build_query($post),
            CURLOPT_HTTPHEADER => $headers,
            CURLOPT_RETURNTRANSFER => TRUE,
            CURLOPT_TIMEOUT => self::CONNECTION_TIMEOUT
        );
        
		return self::send( $defaults);
    }
    
    /**
     * Send a PUT request using cURL.
     * @param type $url
     * @param array $put
     * @param array $options
     * @return type 
     */
    public static function put($url, array $put = array(), array $headers = array())
    {   
        $defaults = array
        (
            CURLOPT_URL => $url,
            CURLOPT_CUSTOMREQUEST => 'PUT',
            CURLOPT_POSTFIELDS => http_build_query($put),
            CURLOPT_HTTPHEADER => $headers,
            CURLOPT_RETURNTRANSFER => TRUE,
            CURLOPT_TIMEOUT => self::CONNECTION_TIMEOUT
        );
        
		return self::send( $defaults);
    }
    
    /**
     * Send a DELETE request using cURL.
     * @param type $url
     * @param array $put
     * @param array $options
     * @return type 
     */
    public static function delete($url, array $delete = array(), array $headers = array())
    {   
        $defaults = array
        (
            CURLOPT_URL => $url,
            CURLOPT_CUSTOMREQUEST => 'DELETE',
            CURLOPT_POSTFIELDS => http_build_query($delete),
            CURLOPT_HTTPHEADER => $headers,
            CURLOPT_RETURNTRANSFER => TRUE,
            CURLOPT_TIMEOUT => self::CONNECTION_TIMEOUT
        );
        
		return self::send( $defaults);
    }
    
    /**
     * Execute cURL using supplied options.
     * @param array $options
     * @return type
     * @throws \Exception 
     */
    private static function send(array $options = array())
    {
        $ch = curl_init();
        
        curl_setopt_array($ch, $options);  
        curl_setopt($ch, CURLOPT_CAINFO, 'C:/xampp/php/ca-bundle.crt');

        for($i = 0; $i < 4; $i++){
            $response = curl_exec($ch);
            if ($response !== FALSE){
                break;
             }
        }
        if ($response === FALSE) {                                    
            throw new \Exception (curl_error($ch));
        }
        
        // Fetch response headers, etc.
        $info = curl_getinfo($ch);
        
        curl_close($ch);        
        
        $result = new \stdClass();
        // $result->response =  json_decode($response);
        $result->response =  $response;
        $result->info = $info;
        
        return $result;
    }
}


?>