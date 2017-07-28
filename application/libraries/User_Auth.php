<?php

class User_Auth {

	protected $_ci;

	function __construct()
	{
		$this->_ci = &get_instance();
		$this->endpointUri = "http://localhost:8080";
	}

	function loginAuth()
	{
		$instance = $this->_ci;
		if ( $instance->session->userdata('userAuth'))
		{
			if ( $instance->session->userdata('adminKey'))
			{
				$rs = $instance->curl->simple_get($this->endpointUri.'/admin/?token=' . 
					$instance->session->userdata('adminKey'));
				$result = json_decode($rs);
			}
			elseif ( $instance->session->userdata('outletKey'))
			{
				$rs = $instance->curl->simple_get($this->endpointUri.'/outlet/?token=' . 
					$instance->session->userdata('outletKey'));
				$result = json_decode($rs);
			}

			return $result;
		}

		return false;
	}
}