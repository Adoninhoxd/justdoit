<?php
include('../_conexion.php');
$response=new stdClass();
session_start();
$codusu = $_SESSION['codusu'];
function estado2texto($id){
	switch ($id) {
		case '2':
			return 'Pendiente de pago ';
			break;
		case '3':
			return 'Enviado';
			break;
		case '4':
			return 'Entregado';
			break;
		default:
			break;
	}
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
	where (pedido.estado = 2 OR pedido.estado = 3 OR pedido.estado = 4) && pedido.codusu = '".$codusu."'";
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
	$obj->estado=estado2texto($row['estado']);
	$datos[$i]=$obj;
	$i++;
}
$response->datos=$datos;


header('Content-Type: application/json');
mysqli_close($conexion);
echo json_encode($response);
?>