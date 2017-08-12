<?php

class OutletInterface extends CI_Model {

	function __construct()
	{
		parent::__construct();
		$this->endpointUri = endpoint_url();
	}

	/* @GET /public/list?type=user&access=true */
	public function getList()
	{
		$user = $this->curl->simple_get($this->endpointUri.'/public/list?type=outlet&access=true');
		$result = json_decode($user);

		return $result;
	}

	/* @GET /outlet/order?token=:access_token */
	public function getOrder($token)
	{
		$order = $this->curl->simple_get($this->endpointUri.'/outlet/order?token='.$token);
		$result = json_decode($order);

		return $result;
	}

	/* @GET /outlet/menu?token=:access_token */
	public function getMenu($token)
	{
		$menu = $this->curl->simple_get($this->endpointUri.'/outlet/menu?token='.$token);
		$result = json_decode($menu);

		return $result;
	}

	/* @POST /outlet/setting */
	public function postSettings($data)
	{
		$this->uri = $this->endpointUri.'/outlet/setting';

		$settings = $this->curl->simple_post($this->uri, $data);
		$result = json_decode($settings);

		return $result;
	}

	/* @POST /outlet/kurir */
	public function postOrderToCourier($data)
	{
		$this->uri = $this->endpointUri.'/outlet/kurir';

		$order = $this->curl->simple_post($this->uri, $data);
		$result = json_decode($order);

		return $result;
	}

}