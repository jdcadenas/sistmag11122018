<?php
class Database{
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
			self::$instancia->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			self::$instancia->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

		} return self::$instancia;


	}
}