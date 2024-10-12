<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>erro</title>
    <style>

        body{ 
            font-family:sans-serif;
            background-color:bisque;
            position:absolute;
            top:50%;
            left:50%;
            transform:translate(-50%,-50%);
        }
    </style>
</head>
<body>
    Resposta errada
    <button onClick="back()">Voltar</button>
    <script>
        function back(){
            window.location.href = 'login.php';
        }
    </script>
</body>
</html>