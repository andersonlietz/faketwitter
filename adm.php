<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="style.css">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADM</title>
</head>
<body>
    <?php
    require_once "conection.php";
include "header.php";
foreach($message as $m){
echo '<b>'.$m['name'].'</b><br><p>'.$m['email'].'</p><br><p>'.$m['message'].'</p>';
echo '<a href="excluir.php?id='.$m['id'].'">Excluir Mensagem</a>';
echo "<hr>";
}
include "footer.php";
?>
</body>
</html>




















