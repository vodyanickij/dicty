<?php

include('bd.php');

class Word 
{
	public $messages_db = '';
	public $word;
	public $translation;
	public $dict_id;
	static public $bd;

	function __construct($word, $translation, $dict_id)
	{
		$this->word = $word;
		$this->translation = $translation;
		$this->dict_id = $dict_id;
		if (!isset(self::$db))
		{
			self::$db = connect();
		}
	}

	function __toString()
	{
		return $this->messages_text();
	}
	
	function db_save()
	{
		try
		{
			$sql = "
				INSERT INTO words SET
					word = '".$this->word."',
					trans = '".$this->translation."',
					dict_id = '".$this->dict_id."'
			";
			if (self::$db->query($sql))
			{
				$messages = "The word is successfully added!";
			}
			else
			{
				$messages = "Try again!";
			}
		}
		catch(PDOException $e)
		{
			$this->messages_db = $e->getMessage();
			return False;
		}
		$this->messages_db = $messages;
		return True;
	}

	function db_load($word, $trans, $dict_id)
	{
		try {
		$dbh = new PDO("mysql:host=DB_HOSTNAME;dbname=dict",DB_USERNAME,DB_PASSWORD);
		$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		$sql = "SELECT * FROM words WHERE word = '".$word."'" ;
		foreach ($pdo->query($sql) as $row) { 
			$messages_db = array("word" => $row['word'], "trans" => $row['trans'], "dict_id" => $row['dict_id']);
		}
	}catch(PDOException $e){
		$messages_db = $e->getMessage();
	}
		return $messages_db;
	}
	
	function messages_text()
	{
		$ret = $messages_db;
		return $ret;
	}

}
