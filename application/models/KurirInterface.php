<?php

class KurirInterface extends CI_Model {

	function __construct()
	{
		parent::__construct();
		$this->endpointUri = endpoint_url();
	}

	/* @GET /public/list?type=kurir&access=true */
	public function getList()
	{
		$user = $this->curl->simple_get($this->endpointUri.'/public/list?type=kurir&access=true');
		$result = json_decode($user);

		return $result;
	}
}