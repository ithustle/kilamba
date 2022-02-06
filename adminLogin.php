<?php

require_once 'Conexao.php';
require_once 'Login.php';

$user = new Login();

if (isset($_POST['txtUser'])){
    $utilizador = $_POST['txtUser'];
} else {
    $utilizador = NULL;
}

if (isset($_POST['txtPass'])){
    $Password = md5($_POST['txtPass']);
    
} else {
    $Password = NULL;
}

if ($utilizador == NULL || $Password == NULL){
    header("Location: admin/?login=fail");
} else {
	session_start();
	$_SESSION['txtUser'] = $utilizador;
	$_SESSION['txtPass'] = $Password;
    $user->loginAcesso($utilizador, $Password);
}

?>