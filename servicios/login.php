<?php
//1: Error de conexion
//2: Email invalido
//3: Contraseña incorrecta
include('_conexion.php');
$emausu=$_POST['emausu'];
$sql="SELECT * FROM usuario WHERE emausu='$emausu'";
$result=mysqli_query($conexion,$sql);
if ($result) {
	$row=mysqli_fetch_array($result);
	$count=mysqli_num_rows($result);
	if ($count!=0){
		$pasusu=$_POST['pasusu'];
		if (password_verify($pasusu, $row['pasusu'])) {
			session_start();
			$_SESSION['codusu']=$row['codusu'];
			$_SESSION['emausu']=$row['emausu'];
			$_SESSION['nomusu']=$row['nomusu'];
			header('Location: ../');
		}else{
			header('Location: ../login.php?e=3');
		}
	}else{
		header('Location: ../login.php?e=2');
	}
}else{
	header('Location: ../login.php?e=1');
}

?>
