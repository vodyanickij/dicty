 <?php
$user = 'stud1';
$pass = 'ptaeiq';

	$dbh = new PDO('mysql:host=127.0.0.1;dbname=dict', $user, $pass);
for ($i=1; $i <51; $i++) { 


	$res = $dbh->query("SELECT word FROM words WHERE id='$i' ");

foreach($res as $row) 
	{
		$row1 = explode(' ',$row[0]);
		$row[0] = implode(' ',$row1 );
	    echo ($row[0])."-";
    }





	 $url = file_get_contents('https://dictionary.yandex.net/api/v1/dicservice.json/lookup?key=dict.1.1.20160319T121129Z.13b14bfdfe2a4a19.cf77d9185e9274addc296de938ce508b8654ef69&lang=en-ru&text='.$row[0].'&options=1');
	 $jsonData = json_decode($url);
	 $result = $jsonData->def[0]->tr[0]->text; 
	 $result1 = $jsonData->def[0]->tr[0]->pos; 
	 echo $result;
	 echo "-";
	 //echo $result1;
	 $result2 = $jsonData->def[0]->tr[0]->syn[0]->text;
	 echo "-";
	 echo "Синоним - ";
	 echo  $result2.'<br>';

	}
   // $z = $result->tr->array(1);
 //var_dump($z);

 //  $result1 = $jsonData->def[1];
 //    $s = $result1->text;
	// var_dump($s);
 //  var_dump($result->text);

 ?>