<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
    <link rel="stylesheet" type="text/css" href="font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="css/estiloindex.css">
    <link rel="stylesheet" type="text/css" href="css/estilologin.css">
</head>
<body>
    <header>
        <div class="logo-place"><a href="index.php"><img src="assets/logopagina.png"></a></div>
    </header>
    <div class="main-content">
        <div class="content-page">
                    <form action="servicios/login.php" method="POST">
                        <h3>Iniciar sesion</h3>
                        <input type="text" name="emausu" placeholder="Correo">
                        <input type="password" name="pasusu" placeholder="Contraseña">
                        <p><a href="registro.php">¿no tienes cuenta? registrtate aqui!</p>
                        <?php
                            if(isset($_GET['e'])){
                                switch ($_GET['e']) {
                                    case '1':
                                        echo '<p>Error de conexion</p>';
                                        break;
                                    case '2':
                                        echo '<p>Email invalido</p>';
                                        break;
                                    case '3':
                                        echo '<p>Contraseña incorrecta</p>';
                                        break;
                                    case '4':
                                        echo '<p>correo y contraseña malos</p>';
                                        break;
                                    default:
                                        break;            
                                }
                            }
                        ?>
                        <button  class="btnlogin" type="submit">Ingresar</button>
                    </form>
            </div>
        </div>
    </div>
</body>
</html>