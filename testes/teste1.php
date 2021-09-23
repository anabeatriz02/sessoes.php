<?php

    //CRIANDO UMA SESSÃO

    session_start();

    //verificando o id da sessão
    echo session_id();

    //CRIANDO VARIÁVEIS DE SESSÃO
    $_SESSION["nome"] = "Kamily Vitória";

    $nome = "KAMILY VITÓRIA";
    echo $nome;