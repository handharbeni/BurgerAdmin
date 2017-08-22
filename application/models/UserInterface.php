<?php

class UserInterface extends CI_Model {

	function __construct()
	{
		parent::__construct();
		$this->endpointUri = endpoint_url();
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

	/* @POST /admin/user */
	public function postHapusUser($data)
	{
		$x = $this->curl->simple_post($this->endpointUri.'/admin/user' , $data);
		$result = json_decode($x);

		return $result;
	}
}