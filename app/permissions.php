<?php 
    /**
     * Instrução para verificar se a sessão foi iniciada, caso contrario o usuario
     * é redirecionado para o "public/index.php", impossibilitando que ele tenha acesso
     * atráves da URL.
     */
    if(@$_SESSION['logged_in'] != true){
        header ("Location: ../public/index.php");
    }

 ?>