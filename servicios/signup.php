<?php


include('_conexion.php');





if (!empty($_POST['emanom']) && !empty($_POST['emaape']) && !empty($_POST['emausu']) && !empty($_POST['emapas'])) {
    $emanom = $_POST['emanom'];
    $emaape = $_POST['emaape'];
    $emausu = $_POST['emausu'];
    $emapas = $_POST['emapas'];

    $sql="SELECT * FROM usuario WHERE emausu='$emausu'";
    $result=mysqli_query($conexion,$sql);
    $row=mysqli_fetch_array($result);
	$count=mysqli_num_rows($result);
    if ($count!=0) {
        header('Location: ../registro.php?e=2');
        

    }else {
        $password = password_hash($emapas, PASSWORD_DEFAULT);

        /*
        $text = "INSERT INTO ". $table ."  (`NOMBRE`, `EMAIL`, `DIRECCION`, `PASSWORD`) VALUES (`" . $username . "`,`" . $email . "`,`" . $direccion . "`,`" . $password . "`)";
        $var_str = var_export($text, true);
        $var = "<?php\n\n\$query = $var_str;\n\n?>";
        file_put_contents('filename.php', $var);*/

        $sql =
            "INSERT INTO usuario ( `nomusu`, `apeusu`, `emausu`, `pasusu`) VALUES
            ('" . $emanom . "','" . $emaape . "','" . $emausu . "','" . $password . "')";

        if (mysqli_query($conexion, $sql)) {
            header('Location: ../login.php');
        } else header('Location: ../registro.php?e=3');
    }
    
    
} else  header('Location: ../registro.php?e=1');








?>