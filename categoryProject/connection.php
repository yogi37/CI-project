<?php
	$con = mysqli_connect("localhost","root","","demo");
	if(!$con){
		echo "Mysql connection is not setup";
		die();
	}