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
                    <form action="servicios/signup.php" method="POST">
                        <h3>Registro</h3>
                        <input type="text" name="emanom" placeholder="Nombre">
                        <input type="text" name="emaape" placeholder="Apellidos">
                        <input type="text" name="emausu" placeholder="Correo">
                        <input type="password" name="emapas" placeholder="Contraseña">

                        <?php
                            if(isset($_GET['e'])){
                                switch ($_GET['e']) {
                                    case '1':
                                        echo '<p>Todos los campos son necesarios</p>';
                                        break;
                                    case '2':
                                        echo '<p>Corrreo existente</p>';
                                        break;
                                    case '3':
                                        echo '<p>error conexion</p>';
                                        break;
                                    default:
                                        break;
                                }
                            }
                        ?>

                        <button class="btnregistro" type="submit">Registrarse</button>
                    </form>
            </div>
        </div>
    </div>
</body>
</html>