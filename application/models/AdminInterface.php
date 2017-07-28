<?php

class AdminInterface extends CI_Model {

	function __construct()
	{
		parent::__construct();
		$this->endpointUri = "http://localhost:8080";
	}

	/* @GET /admin/order?token=:access_token */
	public function getOrder($token)
	{
		$order = $this->curl->simple_get($this->endpointUri.'/admin/order?token='.$token);
		$result = json_decode($order);

		return $result;
	}

	/* @GET /admin/menu?token=:access_token */
	public function getMenu($token)
	{
		$menu = $this->curl->simple_get($this->endpointUri.'/admin/menu?token='.$token);
		$result = json_decode($menu);

		return $result;
	}

	/* @GET /public/list?type=resto&access=true */
	public function getListResto()
	{
		$user = $this->curl->simple_get($this->endpointUri.'/public/list?type=resto&access=true');
		$result = json_decode($user);

		return $result;
	}

	/* @POST /admin/outlet */
	public function postAddOutlet($data)
	{
		$outlet = $this->curl->simple_post($this->endpointUri.'/admin/outlet' , $data);
		$result = json_decode($outlet);

		return $result;
	}

	public function getToolsValue($key = '')
	{
		$this->lastUri = $this->endpointUri.'/public/tools_value?access=true';

		if ( $key)
		{
			$this->lastUri .= '&key='.$key;
		}

		$tools = $this->curl->simple_get($this->lastUri);
		$result = json_decode($tools);

		return $result;
	}
}