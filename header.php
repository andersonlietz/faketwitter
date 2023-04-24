<header>
<h1><a href="index.php">FakeTwitter</a></h1>
<ul>
    <li><a href="contato.php">Contato</a></li>
    <li><a href="login.php">Login</a></li>
    <li><a href="cadastro.php">Cadastro</a></li>
   <?php
    if(isset($informacoes))//se a pessoa estiver logada
            { ?>
                <li><a rel="nofollow" href="sair.php">Sair</a></li>
                <hr>
           <?php }else{ ?>
                <li><a rel="nofollow" href="login.php">Entrar</a></li>
           <?php }
?>
</ul>
</header>