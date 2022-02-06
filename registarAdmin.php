<?php
    require_once 'Conexao.php';
    require_once 'login.php';

    $login = new Login();
    
    $nome = $_GET["Nome"];
    $user = $_GET["nUser"];
    $pass = $_GET["uSenha"];
    $pass2 = $_GET["uSenhac"];
    
    $caracteres = "/[a-z0-9_\.\-]+@[a-z0-9_\.\-]*[a-z0-9_\-]+\.[a-z]{2,4}/";
    
    $login->setNome($nome);
    $login->setUser($user); 
    $login->setPassword(md5($pass));
    
    if (empty($user)||!preg_match($caracteres, $user)){
        echo 'O campo Nome de utilizador merece a sua atenção!';
    }elseif (empty ($pass)||strlen($pass) < 6){
        echo "O campo Palavra-passe merece a sua atenção!";
    }elseif($pass != $pass2){
        echo "Os campos Palavra-passe e Confirmar palavra-passe não conscidem!";
    }elseif (empty ($nome) ||!preg_match($caracteres, $nome)){
        echo "O campo Nome merece a sua atenção!";
    }else{
        $login->registarUtilizador();
        echo 'Sucesso!';
    }

?>
