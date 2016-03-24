<?php
	define('DB_HOSTNAME', 'localhost');
	define('DB_USERNAME', 'stud');
	define('DB_PASSWORD', '19191001');
	
	// Соединяемся, выбираем базу данных
	function connect() {
		try 
		{
			$db = new PDO("mysql:host=DB_HOSTNAME;dbname=dict",DB_USERNAME,DB_PASSWORD);
			$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
		}
		}catch(PDOException $e){
        echo $e->getMessage();
    	}
		return $db;
	}	
?>
