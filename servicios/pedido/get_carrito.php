<?php
include('../_conexion.php');
$response=new stdClass();
session_start();
$codusu = $_SESSION['codusu'];
function estado2texto($id){
	

}


$datos=[];
$i=0;

$sql="select pedido.codped,
	productopedido.codpro,
	producto.nompro,
	producto.prepro,
	producto.rutimapro,
	pedido.fecped,
	pedido.dirusuped,
	pedido.telusuped,
	pedido.estado
	from pedido
	JOIN productopedido on productopedido.codped = pedido.codped
	JOIN producto on producto.codpro = productopedido.codpro
	where pedido.codusu = '".$codusu."' && pedido.estado = 1";
$result=mysqli_query($conexion,$sql);
while($row=mysqli_fetch_array($result)){
	$obj=new stdClass();
	$obj->codped=$row['codped'];
	$obj->codpro=$row['codpro'];
	$obj->nompro=utf8_encode($row['nompro']);
	$obj->prepro=$row['prepro'];
	$obj->rutimapro=$row['rutimapro'];
	$obj->fecped=$row['fecped'];
	$obj->dirusuped=utf8_encode($row['dirusuped']);
	$obj->telusuped=$row['telusuped'];
	$obj->estado="por procesar";
	$datos[$i]=$obj;
	$i++;
}
$response->datos=$datos;

mysqli_close($conexion);
header('Content-Type: application/json');
echo json_encode($response);
?>