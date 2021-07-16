<?php
    include_once('../_conexion.php');
    session_start();


    $codusu = $_SESSION['codusu'];
    
    $sql="SELECT pedido.codped FROM pedido WHERE codusu=".$codusu." && estado = 1 ";
    $result=mysqli_query($conexion,$sql);
    $row=mysqli_fetch_array($result);
    $codped = $row['codped'];



    $dirusuped = $_POST['dirusuped'];
    $telusuped = $_POST['telusuped'];

    
    if (!empty($dirusuped) && !empty($telusuped) ) {
        header('Location: ../carrito.php?e=1');
        
        $sql =
            "UPDATE `pedido` 
            SET `estado` = '2',
             `dirusuped` = '".$dirusuped."', 
             `telusuped` = '".$telusuped."' 
             WHERE `pedido`.`codped` = '".$codped."'";

        if (mysqli_query($conexion, $sql)) {
            header('Location: ../index.php');
        } else header('Location: ../carrito.php?e=2');
    
    
    
} else  header('Location: ../carrito.php?e=3');









?>