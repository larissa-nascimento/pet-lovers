
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/style-log.css">
</head>
<body>
<nav>
    <div class="logo">
        <img src="img/logo.png" alt="Pet Lovers"  width="200px">
    </div>
    <ul id="MenuItens">
        <li><a href="index.html" title="Home">Home</a></li>
        <li><a href="cachorro.html" title="Cachorros">Cachorros</a></li>
        <li><a href="gato.html" title="Gatos">Gatos</a></li>
        <li><a href="animais.html" title="Animais">Outros Pets</a></li>
        <li><a href="conta.html" title="Minha conta">Minha conta</a></li>
    </ul>
    <div class="center">
        <img src="img/sacola.png" alt="Sacola de compras" width="50px" height="50px" class="sacola"> 
    </div>
</nav>


<div class="search">
    <form action="" method="post">
       <input type="text" name="data" placeholder="pesquise aqui...">
       <button type="submit">Procurar</button> 
    </form>
    
<?php

    error_reporting(E_ERROR | E_PARSE);
    if(isset($_POST['submit'])) {
        echo "Hello world !";
    } else {
         function caralho($c, $result){
            foreach($result as $row){
              $login_name = $row['login'];
              $id = $row['id'];
              $query_time = "select time from login_time where user_id = $id;";
              $run = $c->query($query_time);

              echo "<div class='username' onclick='toggleMenu()'><h2>$login_name</h2></div>";

              foreach($run as $res){
                $time = $res['time'];

                echo "
                <ul>
                    <li> $time</li>
                </ul>
                ";
              }
            }
          }  
        }
        $name = $_POST['data'];
        $query = "select login,id from login where login like '%" . $name . "%';";
        $conn = new mysqli("localhost:3306", "root", "", "mg");
        $execution = $conn->real_query($query);
        $result = $conn->store_result();
        
        caralho($conn, $result);

       
       

    
?>
</div>
</body>
</html>