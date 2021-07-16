<?php
	session_start();
	if (!isset($_SESSION['codusu'])) {
		header('location: index.php');
	}
?>
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
</head>
<body>
    <?php include("layouts/_main-header.php"); ?>
    <div class="main-content">
        <div class="content-page">
            <h3>Mis pedidos</h3>
            <div class="body-pedidos" id="space-list">   
            </div>

            <input class="ipt-procom" type="text" id="dirusuped" placeholder="Direccion">
            <br>
            <input class="ipt-procom" type="number" id="telusuped" placeholder="Celular">
            <br>
            <button onclick="procesar_compra()" href="index.php"" class="btncompra">Procesar compra</button>
            

        </div>
    </div>
    <script type="text/javascript" src="js/main-scripts.js"></script>
    <script type="text/javascript">
    $(document).ready(function(){
			$.ajax({
				url:'servicios/pedido/get_carrito.php',
				type:'POST',
				data:{},
				success:function(data){
					console.log(data);
					let html='';
					let monto=0;
					for (var i = 0; i < data.datos.length; i++) {
						html+=
						'<div class="item-pedido">'+
							'<div class="pedido-img">'+
								'<img src="assets/products/'+data.datos[i].rutimapro+'">'+
							'</div>'+
							'<div class="pedido-detalle">'+
								'<h3>'+data.datos[i].nompro+'</h3>'+
								'<p><b>Precio:</b> S/.'+data.datos[i].prepro+'</p>'+
								'<p><b>Fecha:</b> '+data.datos[i].fecped+'</p>'+
								'<p><b>Estado:</b> '+data.datos[i].estado+'</p>'+
								'<p><b>Dirección:</b> '+data.datos[i].dirusuped+'</p>'+
								'<p><b>Celular:</b> '+data.datos[i].telusuped+'</p>'+
							'</div>'+
						'</div>';
                    '<div class="product-box">'+
                        '<a href="producto.php?p='+data.datos[i].codpro+'">'+
                             '<div class="product">'+
                                '<img src="assets/products/'+data.datos[i].rutimapro+'">'+
                                '<div class="detail-title">'+data.datos[i].nompro+'</div>'+
                                '<div class="detail-price">'+data.datos[i].prepro+'</div>'+
                             '</div>'+
                        '</a>'+
                    '</div>';    
                    }
                    document.getElementById("space-list").innerHTML=html;
                },
                error:function(err){
                    console.error(err);
                }
                
            });
        });
        function procesar_compra(){
            let dirusuped=document.getElementById("dirusuped").value;
            let telusuped=$("#telusuped").val();
            if(dirusuped=="" || telusuped==""){
                alert("Complete los campos");
            }else{
                $.ajax({
                url:'servicios/pedido/get_confirmar.php',
                type:'POST',
                data:{
                    dirusuped:dirusuped,
                    telusuped:telusuped
                },
                success:function(data){
                    console.log(data);
                    if(data.state){
                        window.location.href="index.php";
                    }

                },
                error:function(err){
                    console.error(err);
                }

            });
        }
    }

    </script>
</body>

</html>