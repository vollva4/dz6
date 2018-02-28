
<?php
function errorCheck($json) {
	$content = file_get_contents($json) ;
	$test = json_decode($content, true);
	foreach ($test as $value) {
		if ((!$value['id']) or (!$value['textQwestion']) or (!$value['answer']) or (!$value['correct'])) {
			http_response_code(404);
			echo 'Некорректные данные!';
			exit(1);;
		}
	}
}
if (isset($_FILES['userfile']['name']))
{   
	$error = $_FILES['userfile']['error'];
	if (!$error) 
	{
		$name = basename($_FILES['userfile']['name']);
		$type = strtolower(substr($name, 1+strrpos($name,".")));
		$extentions = "json";
		if ($type != $extentions)
		{
			echo "Файл имеет недопустимое расширение!";
		} else 
		{
			$uploaddir = getcwd() . '/tests/' . $name;
			if (file_exists($uploaddir)) 
			{
		    	echo "Файл $name уже существует. Выберите другой файл!</br>";
			} else {
				$tmp_name = $_FILES['userfile']['tmp_name'];
				errorCheck($_FILES['userfile']['name']);
        		move_uploaded_file($tmp_name, $uploaddir);
        		header('Location: list.php');
        		exit();
        		//echo "Файл $name успешно отправлен!</br>";
        	}
		}
	} elseif (empty(($_FILES['userfile']['name']))) 
	{
		echo "Файл не выбран!\n";
	} else {
		echo "Ошибка загрузки файла!\n";
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Загрузить файл теста</title>
	<meta charset="utf-8">
</head>
<body>
<span>
<form enctype="multipart/form-data" action="admin.php" method="POST">
	<fieldset>
	    <legend><strong>Выберите файл для загрузки:</strong></legend>
    	<input name="userfile" type="file" placeholder="Выбрать файл с тестом:"></input>
    	<button type="submit" value="Отправить файл">Отправить файл</button>
	</fieldset>
    <p><a href="list.php">Перейти к списку доступных тестов</a></p>
</form>
</span>
</body>
</html>