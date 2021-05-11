<?php

    function createAccount($userName, $userEmail, $userPassword){
        // Open connection
        $link = mysqli_connect("localhost", "root", "", "bookstack");

        // Verificar se o registro já existe na tabela usuario
        $sql = "INSERT INTO usuario (nome, email, senha) values ('".$userName."','".$userEmail."','".$userPassword."');";
        if (mysqli_query($link, $sql)) {
            header("location: profile.php");
        } else {
            return false;
        }
    
        // Close connection
        mysqli_close($link);
    }

    function enterAccount($userEmail, $userPassword){
        // Open connection
        $link = mysqli_connect("localhost", "root", "", "bookstack");

        //TODO: armazenar o código do usuario na SESSION

        // Verificar se o login existe na tabela usuario
        $sql = "SELECT codigo FROM usuario 
                WHERE email = '".$userEmail."' 
                AND senha = '".$userPassword."';";
        $answer = mysqli_query($link, $sql);

        if (mysqli_num_rows($answer) > 0) {
            while($data = mysqli_fetch_array($answer)){
                echo $data['codigo'];
            }
            header("location: profile.php");
        } else {
            return false;
        }
    
        // Close connection
        mysqli_close($link);
    }


?>