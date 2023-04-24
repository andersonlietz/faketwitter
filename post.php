<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="style.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Postagem</title>
</head>
<body>
<?php
require_once "conection.php";
include "header.php";

if(isset($_GET['id'])){

    $postId = $_GET['id'];
    $currentPost;

    foreach( $resultado as $post){
        if($post['id'] == $postId){
            $currentPost = $post;
        }
    }

}


?>
<?= $currentPost['imagem']; ?>
<h1 id="titulo"><?=  $currentPost['titulo']; ?></h1>
<p id="conteudo"><?=  $currentPost['conteudo']; ?></p>
<i id="data"><?=  $currentPost['data']; ?></i>
<footer>
  <?php
require 'footer.php';
?>
</footer>
</body>
</html>

