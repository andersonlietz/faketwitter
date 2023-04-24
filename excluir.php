<?php
require_once "conection.php";
$id = $_GET['id'];

if(!empty($id)){
    $sql = "DELETE FROM contato WHERE id = $id ; ";
    if (mysqli_query($conn, $sql)) {
        header("location: adm.php");
  } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }

    //header("location: adm.php");
}else{
    echo 'Erro ao excluir mensagem!';
}
?>