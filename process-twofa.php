<?php
    $conn = new mysqli("localhost:3306", "root", "", "mg");

    $query = "select id_usr,nome_materno, data_nascimento,cep from usuarios";
    $result = $conn->query($query);
    foreach($result as $res){
        $pergunta1 = $_POST["pergunta1"];
        $pergunta2 = $_POST["pergunta2"];
        $pergunta3 = $_POST["pergunta3"];
        $id = $_POST['caralho'];
        $db_id = $res['id_usr'];
        $db_pergunta1 = $res["nome_materno"];
        $db_pergunta2 = $res["data_nascimento"];
        $db_pergunta3 = $res["cep"];

        if($db_id === $id){
            if($pergunta1 === $db_pergunta1 and $pergunta2 === $db_pergunta2 and $pergunta3 === $db_pergunta3){
                header("location: index.php");
            }else{
                header("location: error.php");

            }
        }
         
    }


?>