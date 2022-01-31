<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<title>THE MEANING OF Zodiac signs</title>
</head>
<body>
<form type="text" class="form" name="a" method="GET" action="<?=$_SERVER['PHP_SELF']?>">

<select type="text" name="a">
  <option>Овен</option>
  <option>Телец</option>
  <option>Близнецы</option>
  <option>Рак</option>
  <option>Лев</option>
  <option>Дева</option>
  <option>Весы</option>
  <option>Скоррпион</option>
  <option>Стрелец</option>
  <option>Козерог</option>
  <option>Водолей</option>
  <option>Рыбы</option>
</select>
<!--
<p><INPUT type="radio" id="radioButton" name="a" >Овен</p>
<p><INPUT type="radio" name="a" values="Лев" >Лев</p>
<p><INPUT type="radio" name="a" ></p> 
<p><INPUT type="radio" name="a" ></p> 
<p><INPUT type="radio" name="a" ></p> 
<p><INPUT type="radio" name="a" ></p> 
<p><INPUT type="radio" name="a" ></p> 
<p><INPUT type="radio" name="a" ></p> 
<p><INPUT type="radio" name="a" ></p> 
<p><INPUT type="radio" name="a" ></p> 
<p><INPUT type="radio" name="a" ></p> 
<p><INPUT type="radio" name="a" ></p> 
<input type="text" name="a">
-->
<input type="submit"><br>
</form>
	<?php
	$a = ($_GET['a']); 
	echo "$a<br>";
	$dbc = mysqli_connect('localhost', 'root', '', 'today');
	$query = "SELECT meaning FROM zodiac where signt='$a'";
	//первая часть сверху вторая снизу
	$result = mysqli_query($dbc, $query);
	$data_array = array();
	while ($row = mysqli_fetch_assoc($result)) {
  	$data_array[$row['signt']] = $row['meaning'];
	}
	echo "$data_array[$row]";
//var_dump($data_array);
//	echo "$a";
	?>
</body>
</html>