<?php

class UserInterface extends CI_Model {

	function __construct()
	{
		parent::__construct();
		$this->endpointUri = "http://localhost:8080";
	}

	/* @GET /public/list?type=user&access=true */
	public function getList()
	{
		$user = $this->curl->simple_get($this->endpointUri.'/public/list?type=user&access=true');
		$result = json_decode($user);

		return $result;
	}

	/* @GET /users/?token={access_token} */
	public function getUserDetail($token)
	{
		$user = $this->curl->simple_get($this->endpointUri.'/users/?token='.$token);
		$result = json_decode($user);

		return $result;
	}
}