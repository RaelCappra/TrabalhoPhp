<?php

/*
	function getConnection($host, $dbname, $user, $password){
		$dbconn = pg_connect("host = $host dbname = $dbname user = $user password = $password");
		if(!$dbconn){
			die();
		}
		return $dbconn;
	}
*/
	function getConnection(){
		$dbconn = pg_connect("host = localhost dbname = postgres user = postgres password = postgres");
		if(!$dbconn){
			die();
		}
		return $dbconn;
	}

 ?>