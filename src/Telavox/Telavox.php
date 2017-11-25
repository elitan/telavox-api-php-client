<?php

namespace Telavox;

class Telavox {

	function __construct($host, $username, $password) {

		$this->auth_query = [
			'username' => $username,
			'password' => $password,
		];

		// create http client
		$this->http_client = new \GuzzleHttp\Client(
			[
				'base_uri' => $host,
				'headers' => [
					'User-Agent' => 'elitan/telavox-api-php-client',
				]
			]
		);
	}

	private function returnResponseBody($response) {
		return json_decode((string)$response->getBody());
	}

	function calls($from_date= null, $to_date = null, $with_recordings = false) {

		$url = 'calls';

		$query = [
			'fromDate' => $from_date,
		];

		$query = array_merge($query, $this->auth_query);

		$response = $this->http_client->request('GET', $url, [
			'query' => $query
		]);

		return $this->returnResponseBody($response);
	}

	function dial($number, $autoanswer = false, $onlycallmobile = false) {

		$autoanswer = $autoanswer ? 'true' : 'false';
		$onlycallmobile = $onlycallmobile ? 'true' : 'false';

		$url = 'dial/' . $number;

		$query = [
			'autoanswer' => $autoanswer,
			'onlycallmobile' => $onlycallmobile,
		];

		$query = array_merge($query, $this->auth_query);

		$response = $this->http_client->get($url, [
			'query' => $query
		]);

		return $this->returnResponseBody($response);
	}

}
