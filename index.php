<?php
ob_start();
session_start();
require_once 'Classes/usuarios.php';
?>
<!DOCTYPE html>
<html lang="pt">
<head>
  <meta charset=ISO-8859-1>
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <title>Twitter</title>
</head>
<body>
  <?php
require_once "conection.php";
include "header.php";


if(isset($_SESSION['id_usuario']))
{
    $us = new Usuario("twitterdb","localhost","root","");
   $informacoes=$us->buscarDadosUser($_SESSION['id_usuario']);
}elseif(isset($_SESSION['id_master']))
{
    $us = new Usuario("twitterdb","localhost","root","");
  $informacoes = $us->buscarDadosUser($_SESSION['id_master']);
}

echo '<ul>';
foreach($resultado as $r) {
  echo '<li>';
  echo '<b>';
  echo '<h2>'.$r['titulo'].'</h2><br>'.$r['imagem'].'<br><span>'.$r['conteudo'].'</span>'.'<i><br>'. $r['data'].'</i>'.'<br><a href="post.php?id='.$r['id'].'">Acesse aqui!</a>';
 
  echo '</b>';
  echo '</li>';
}
echo '</ul>';

////
?>
<footer>
  <?php
require "footer.php";
?>
</footer>
</body>
</html>

