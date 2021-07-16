<?php
session_start();
$response=new stdClass();

if (!isset($_SESSION['codusu'])) {
    $response->state=false;
    $response->detail="Debe iniciar sesion";
    $response->open_login=true;
}else{
    include_once('../_conexion.php');
    $codusu=$_SESSION['codusu'];
    $codpro=$_POST['codpro'];
    $sql="SELECT pedido.codped FROM pedido WHERE codusu='".$codusu."' && estado=1";
    $result=mysqli_query($conexion,$sql);
    $row=mysqli_fetch_array($result);
    $codped = $row['codped'];



    if (null!==$codped) {
        $sql="INSERT INTO `productopedido`(`codped`, `codpro`)
            VALUES
            ('$codped','$codpro')";
        $result=mysqli_query($conexion,$sql);
        if ($result) {
            $response->state=true;
            $response->detail="Producto agreado";
        } else {
            $response->state=false;
            $response->detail="No fue posible agregar el producto";
        }
    }else {
        $sql="INSERT INTO pedido
        (codusu,fecped,estado,dirusuped,telusuped)
        VALUES
        ('$codusu',now(), 1, '','')";
        $result=mysqli_query($conexion,$sql);
        if ($result) {

            $sql="SELECT pedido.codped FROM pedido WHERE codusu='".$codusu."' && estado=1";
            $result=mysqli_query($conexion,$sql);
            $row=mysqli_fetch_array($result);
            $codped = $row['codped'];
            $sql="INSERT INTO `productopedido`(`codped`, `codpro`) 
                VALUES
                ('$codped','$codpro')";
            $result=mysqli_query($conexion,$sql);
            $response->state=true;
            $response->detail="Producto agreado";


        }else{
            $response->state=false;
            $response->detail="No fue posible agregar el producto";
        }
    }
    mysqli_close($conexion);
}



header('Content-Type: application/json');
echo json_encode($response);

?>