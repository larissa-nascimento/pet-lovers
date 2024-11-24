<?php
    $conn = new mysqli("localhost:3306", "root", "", "mg");
    $login = $_POST["login"];
    $senha = $_POST["password"];

    $query = "select * from login where login like '%$login%';";
    $r = $conn->query($query);
    foreach($r as $res){
        $usr_id = $res['id'];
        $conn = new mysqli("localhost:3306", "root", "", "mg");
        if($res['login'] === "admin"){
            if($senha === $res['password']){
                header("location: log.php");
            }else{
                header("location: error.php");
            }
        }
        elseif($res['login'] === $login){
            if($senha === $res['password']){
                $time_query = "insert into login_time (user_id, time)  values('$usr_id', now());";
                $conn->query($time_query);
                $id = $res['id'];
                echo "
                    <form name='redirect-form' action='twofa.php' method='post'>
                        <input type='hidden' name='id' value='$id' />
                    </form>
                 
                    <script> 
                        document.forms['redirect-form'].submit()
                    </script>
                ";

            }else{
                header("location: error.php");
            }
            
        }
    }
    

?>