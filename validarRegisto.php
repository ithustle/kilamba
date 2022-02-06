<?php

    $campo = $_GET['campo'];
    $valor = $_GET['valor'];


    if ($campo == "nome"){

        if ($valor == ""){
            echo "Digite o nome!";
        }elseif (preg_match("/[a-z0-9_\.\-]+@[a-z0-9_\.\-]*[a-z0-9_\-]+\.[a-z]{2,4}/", $valor)){
            echo "Digite um nome válido!";
        }
    }

    if ($campo == "pass"){

        if (strlen($valor) < 6){
            echo "Não pode conter menos de 6 caracteres!";
        }elseif (!preg_match("/[a-z0-9]/", $valor)){
            echo "A sua senha deve ter pelo menos um número!";
        }
    }

    if ($campo == "resposta"){

        if ($valor == ""){
            echo "Você deve introduzir uma resposta secreta!";
        }
    }

?>
