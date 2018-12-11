<?php

class Conexion{

	private static $instancia=null;


	private function __construct (){

	}
	
	public static function tenerconex(){
		$dbname="malariologia";
		$host="localhost";
		$dbuser="postgres";
		$dbpass="informatik";

		if(!self::$instancia){

			self::$instancia=new PDO ("pgsql:dbname=$dbname;host=$host", $dbuser, $dbpass);


		} return self::$instancia;



	}
} 
?>