<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<form method="post">
<p>
	<input name="log" type="text" size="15" maxlength="15">
</p>
<p>
	<input type="submit" name="ok" value="Ok">
</p>
<?php
$text_input = $_POST['log'];

	if (isset($_POST['ok'])) {
		$url = file_get_contents('https://dictionary.yandex.net/api/v1/dicservice.json/lookup?key=dict.1.1.20160318T202458Z.1f096f4217403a0a.ff0eac3843a0da2d7333e9f76335c3fd834dcf6c&lang=en-ru&text='.$text_input.'&options=1');
		$jsonData = json_decode($url);
		$rest = $jsonData->def;

		for($k =0; $k<count($rest); $k++){
			$rest1 = $jsonData->def[$k]->tr;

			for($i =0; $i<count($rest1); $i++){
				$rest2 = $rest1[$i] -> text;

				echo $rest2."<br>";
		}
	}
}

?>
<p>
	<input name="result" type="text" size="15" maxlength="15" value="<?echo $result?>">
</p>
</form>
</body>
</html>
