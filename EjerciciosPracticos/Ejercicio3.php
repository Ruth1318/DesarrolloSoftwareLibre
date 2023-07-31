<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
$cantidadDeimagenes = 10;
$inicio =0;
$img='<img style="width: 100px;" src="https://th.bing.com/th/id/R.5fa819d1342841d90d1c5e4bccfe86d7?rik=BVr7vtKo8IFXCw&riu=http%3a%2f%2fpngimg.com%2fuploads%2fpokemon%2fpokemon_PNG113.png&ehk=ZQL6QW%2f3rTBlFgd0Buytv85l41VopTam6TJgfSXQioU%3d&risl=&pid=ImgRaw&r=0" alt="" srcset="">
';
while ($inicio < $cantidadDeimagenes  ) {
    echo $img;
    $inicio++;
}
?>   
</body>
</html>