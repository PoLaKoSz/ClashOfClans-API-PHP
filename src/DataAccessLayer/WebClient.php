<?php

namespace PoLaKoSz\CoC_API\DataAccessLayer
{
	use PoLaKoSz\CoC_API\Exceptions\ApiException;

	class WebClient
	{
		private $apiKey;
		private $baseURL;
		
		public function __construct(string $apiKey)
		{
			$this->baseURL = 'https://api.clashofclans.com/v1';
			$this->apiKey = $apiKey;
		}
		
		/**
		 * Send a Request to SuperCell's Servers and Receive it
		 *
		 * @param  string    $url      
		 * @return stdClass  response  from API
		 */
		public function sendRequest(string $url)
		{
			$url = $this->baseURL . $this->encodeHashTag($url);

			$ch = curl_init();

			curl_setopt($ch, CURLOPT_URL, $url);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
			curl_setopt($ch, CURLOPT_HTTPHEADER, array(
				'authorization: Bearer '. $this->apiKey,
			));
			
			$response = curl_exec($ch);

			$info = curl_getinfo($ch);

			if ($info['http_code'] != 200) {
				throw new ApiException('The request was not successfull.', $info['http_code'], $response);
			}
			
			curl_close($ch);

			$response = $this->escapeJsonString($response);
			
			return json_decode($response);
		}

		/**
		 * @param string   $url  what needs to be encoded
		 * @var   string         encoded url
		 */
		private function encodeHashTag(string $url)
		{
			return str_replace("#", urlencode('#'), $url);
		}

		/**
		 * Escape all invalid character
		 * 
		 * @param string  $value  string wthat needs to be escaped
		 * @param string
		 */
		private function escapeJsonString(string $value)
		{
			$escapers	  = array("<");
			$replacements = array("&lt;");
			
			$result = str_replace($escapers, $replacements, $value);

			return $result;
		}
	}
}
