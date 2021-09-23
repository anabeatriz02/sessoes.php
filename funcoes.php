<?php

function lerArquivo($nomeArquivo){


    $arquivo = file_get_contents($nomeArquivo);


    $arquivoArray = json_decode($arquivo);
 
    return $arquivoArray;
}

function realizarLogin($usuario, $senha, $dados){

    foreach ($dados as $dado){

        if ($dado->usuario == $usuario && $dado->senha == $senha) {
            
            //Variaveis de sessão:
            $_SESSION["usuario"] = $dado->usuario;
            $_SESSION["id"] = session_id();
            $_SESSION["data_hora"] = date('d/m/Y - h:i:s');

            header('location: area_restrita.php');
            exit;

        }
        
    }

    header('location: index.php');

}

//FUNÇÃO DE VVERIFICAÇÃO DE LOGIN
//VERIFICA SE O USUÁRIO PASSOU PELO PROCESSO DE LOGIN

function verificarLogin(){

    if($_SESSION["id"] != session_id() || (empty($_SESSION["id"])) ){

        header('location: index.php');

    }
}

//FUNÇÃO DE FINZALIZAÇÃO DE LOGIN
//EFETUA A AÇÃO DE SAIR DO USUÁRIO DESTRUINDO A SESSÃO

function finalizarLogin(){
    session_unset(); //LIMPA TODAS A AVARIAVEIS DE SESSÃO
    session_destroy(); //DESTRÓI A SESSÃO ATIVA

    header('location: index.php');
}