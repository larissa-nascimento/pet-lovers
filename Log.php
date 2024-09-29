
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css">
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
       <input type="text" name="data">
       <button type="submit">Hello</button> 
    </form>
    
<?php
    if(isset($_POST['submit'])) {
        echo "Hello world !";
    } else {
        error_reporting(E_ERROR | E_PARSE);
        $name = $_POST['data'];
        $query = "select login from login where login like '%" . $name . "%';";
    
        $conn = new mysqli("localhost:3306", "root", "", "mg");
        $execution = $conn->real_query($query);
        $result = $conn->store_result();
        
        echo "<table>";
        foreach($result as $row){
            $buceta = $row['login'];
            echo "
                <thead>
                    <tr>
                        <th>$buceta</th>
                    </tr>
                </thead>
            ";
            //echo "<h2>" . $row['login'] . "\n" . "</h2>";
        }
        echo "</table>";  
    }

    
?>
</div>

</body>
</html>