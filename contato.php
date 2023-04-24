<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" type="text/css" href="style.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contato</title>
</head>
<body>
    <?php
include "header.php";
    ?>
    <section>
<form method="POST">
      <input class="field" name="name" type="name" placeholder="Nome">
      <input class="field" name="email" type="email" placeholder="E-mail">
      <textarea class="field" id="message" name="message" placeholder="Digite aqui..." maxlength="2000"></textarea>
      <input type="submit" value="ENVIAR">
      </form>
</section>
<?php
require_once "conection.php";
if(isset($_POST['name'])){
    $nome=addslashes($_POST['name']);
    $email=addslashes($_POST['email']);
    $message=addslashes($_POST['message']);

    if(!empty($nome)&&!empty($email)&&!empty($message)){

        $sql = "INSERT INTO contato (name, email, message) VALUES ('$nome', '$email', '$message')";
        
        if (mysqli_query($conn, $sql)) {
            echo "Mensagem gravada com sucesso!";
      } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
      }

    }else{
        echo "Preencha todos os campos";
    }

}
include "footer.php";
?>

</body>
</html>