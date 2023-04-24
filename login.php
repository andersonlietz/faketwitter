<?php
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
<link rel="shortcut icon" href="imagens/log.png" type="image x-icon">
    <link rel="stylesheet" type="text/css" href="style.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Entrar</title>
</head>
<body>
    <?php
        include "header.php";
    ?>
    <h2>Entrar</h2>
    <?php 
   require_once 'Classes/usuarios.php';
   $u = new Usuario("twitterdb","localhost","root","");
 if(isset($_POST['email']))
 {
    $email = addslashes($_POST['email']);
    $senha = addslashes($_POST['senha']);
    //confirmar se está tudo preenchido
    if(!empty($email) && !empty($senha)){
    if($u->$e == "")//esta tudo ok
    {
        //$u->conectar($email, $senha);

    if($u->entrar($email, $senha))
    { 
        header("location: index.php");
    }else{
        ?>
        <div class="msg-erro">
        Email e/ou senha estão incorretos!
    </div>
        <?php
    }
    }
    ?>
    <div class="msg-erro">
   <?php echo "Erro:  ".$u->msgErro;
   ?>
</div>
<?php
}
else 
{
    ?>
    <div class="msg-erro">
    Preencha todos os campos!
</div>
    <?php
}
 }
?>
<form method="POST" >
<input class="field" type="e-mail" name="email" placeholder="E-mail">
<input class="field" type="password" name="senha" placeholder="Senha">
<input type="submit" value="ACESSAR">
<a href="cadastro.php">Ainda não é inscrito? <b>Cadastre-se!</b></a>
</form>
</article>
<aside>
    
</aside>
</main>
<?php
include "footer.php";
?>
</body>
</html>