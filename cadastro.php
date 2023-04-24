<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Cadastro</title>
</head>
<body>
    <?php
    include "header.php";
if(isset($_POST['name']))
{
    $nome=addslashes($_POST['name']);
    $email=addslashes($_POST['email']);
    $senha=addslashes($_POST['senha']);
    $confSenha=addslashes($_POST['confsenha']);

    if(!empty($nome)&&!empty($email)&&!empty($senha)&&!empty($confSenha))
{
    if($senha == $confSenha)
    {
        require_once "./Classes/usuarios.php";
    $us = new Usuario("twitterdb","localhost","root","");

   if($us->cadastrar($nome, $email, $senha))
   { ?>
        <p class="mensagens">Cadastrado com sucesso!<a href="login.php">Acesse já!</a></p>
  <?php }else{
      ?>
            <p class="mensagens">O email inserido já está cadastrado!</p>
 <?php  }
    }else{ ?>
        <p  class="mensagens">Senhas não correspondem!</p>
  <?php  }
    
}else{ ?>

    <p class="mensagens">Preencha todos os campos!</p>
<?php }
}
    ?>
    <section>
<form method="POST">
      <input class="field" type="text" name="name" placeholder="Nome" maxlength="30">
      <input class="field"  type="email" name="email" placeholder="E-mail" maxlength="50">
      <input class="field"  type="password"name="senha" placeholder="Senha">
      <input class="field"  type="password"name="confsenha" placeholder="Confirme a senha">
      <input type="submit" value="ENVIAR">
      <a href="login.php"><b>Já têm uma conta? Acesse aqui.</b></a>
      </form>
</section>
<?php
    include "footer.php";
?>
</body>
</html>