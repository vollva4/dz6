<?php 
$content = file_get_contents('tests/test1.json') ;
echo $content;
$decoded = json_decode($content, true);
echo '<pre>';
print_r($decoded);
echo count($decoded);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>php</title>
    <form  action="http://university.netology.ru/u/avolvach/me/dz4.php" method="post" enctype="multipart/form-data">
      <input type="submit" value="test1" > 
     </form>
     <form  action="http://university.netology.ru/u/avolvach/me/dz5.php" method="post" enctype="multipart/form-data">
      <input type="submit" value="test2" >
     </form>
</head>
<body>
</body>