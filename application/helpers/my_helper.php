<?php

if ( !function_exists('trimLower'))
{
	function trimLower($string)
	{
		$string = trim($string);
		$string = strtolower($string);

		return $string;
	}
}

if ( ! function_exists('endpoint_url'))
{
	function endpoint_url()
	{
		$uri = "http://localhost:8080";
		return $uri;
	}
}

if ( ! function_exists('humantime'))
{
	function humantime($datetime)
	{
		$x = strtotime($datetime);

		$string = null;

		$bulan = array(
				'Januari' , 'Februari' , 'Maret' , 'April' , 'Mei' , 'Juni' , 'Juli',
				'Agustus' , 'September' , 'Oktober' , 'November' , 'Desember'
 			);

		$day = array(
				'Mon' , 'Tue' , 'Wed' , 'Thu' , 'Fri' , 'Sat' , 'Sun'
			);

		$hari = array(
				'Senin','Selasa','Rabu','Kamis','Jumat','Sabtu','Minggu'
			);

		$string .= $hari[array_search(date('D',$x), $day)].", ";
		$string .= date('d' , $x)." ";
		$string .= $bulan[str_replace('0', ' ', date('m' , $x)) - 1]." ";
		$string .= date('Y H:i' , $x);
		
		return $string;
	}
}