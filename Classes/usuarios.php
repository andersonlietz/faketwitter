<?php 

 Class Usuario{

private $pdo;
// construtor
public function __construct($dbname, $hostname, $username, $password){
    try {
        $this->pdo = new PDO("mysql:dbname=".$dbname.";host=".$hostname, $username, $password);
    }catch(PDOException $e){
        $msgErro = $e->getMessage();
        echo "Erro com BD:".$e->getMessage();
    }catch(Exception $e){
        echo "Erro: ".$e->getMessage();
    }
    
}
// cadastrar
public function cadastrar($nome, $email, $senha)
{ //antes de cadastrar verificar se o email ja esta cadastrado
    $cmd=$this->pdo->prepare("SELECT id from users WHERE email = :e");
    $cmd->bindValue(":e", $email);
    $cmd->execute();
    if($cmd->rowCount()>0)//veio id
    {
        return false;
    }else//nao veio id
   {//cadastrar
    $cmd=$this->pdo->prepare("INSERT INTO users (name,email,senha) values(:n,:e,:s)");
    $cmd->bindValue(":n", $nome);
    $cmd->bindValue(":e", $email);
    $cmd->bindValue(":s", md5($senha));
    $cmd->execute();
    return true;
}
    }
//logar
public function entrar( $email, $senha)
{
    $cmd=$this->pdo->prepare("SELECT * from  users WHERE email = :e and senha = :s");
    $cmd->bindValue(":e", $email);
    $cmd->bindValue(":s", md5($senha));
    $cmd->execute();
    if($cmd->rowCount()>0)//se foi encontrado essa pessoa
    {
            $dados=$cmd->fetch();
            ob_start();
            session_start();
            if($dados['id'] == 1)
            {
                //usuario administrador
                    $_SESSION['id_master'] = 1;
            }else{
                //usuario normal
                $_SESSION['id_usuario'] = $dados['id'];
} 
return true;//encontrada
    }else{
        return false;//pessoa não encontrada
    }
}
public function buscarDadosUser($id)
{
    $cmd = $this->pdo->prepare("SELECT * from users WHERE id = :id");
    $cmd->bindValue(":id",$id);
    $cmd->execute();
    $dados = $cmd->fetch();
    return $dados;
}
// public function buscarTodosUsuarios()
// {
// $cmd = $this->pdo->prepare("SELECT usuarios.id,usuarios.nome,usuarios.email,
//  COUNT(comentarios.id) as 'quantidade'
//  from usuarios
//  left join comentarios
//  ON usuarios.id = comentarios.fk_id_usuario
//  group by usuarios.id");
// $cmd->execute();
// $dados = $cmd->fetchAll(PDO::FETCH_ASSOC);
// return $dados;
// }
 }
