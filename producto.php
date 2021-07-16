<?php session_start(); ?>
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
            <section>
                <div class="parte1">
                    <img id="idimg" src="">
                </div>
                <div class="parte2">
                    <h2 id="idtitle"></h2>
                    <h4 id="idprice"></h4>
                    <button onclick="iniciar_compra()">Comprar</button>
                </div>
            </section>            
            <div class="product-list" id="space-list">
            </div>
        </div>
    </div>
        <script type="text/javascript" src="js/main-scripts.js"></script>
    <script type="text/javascript">
        var p='<?php echo $_GET["p"];?>';
    </script>
    <script type="text/javascript">
        $(document).ready(function(){
            $.ajax({
                url:'servicios/producto/get_all_products.php',
                type:'POST',
                data:{},
                success:function(data){
                    console.log(data);
                    let html='';
                    for (var i = 0; i < data.datos.length; i++) {
                        if(data.datos[i].codpro==p){
                            document.getElementById("idimg").src="assets/products/"+data.datos[i].rutimapro;
                            document.getElementById("idtitle").innerHTML=data.datos[i].nompro;
                            document.getElementById("idprice").innerHTML=data.datos[i].prepro;
                        }   
                    }
                    document.getElementById("space-list").innerHTML=html;
                },
                error:function(err){
                    console.error(err);
                }     
            });
        });
        function iniciar_compra(){
            $.ajax({
                url:'servicios/compra/validar_inicio_compra.php',
                type:'POST',
                data:{
                    codpro:p
                },
                success:function(data){
                    console.log(data);
                    if (data.state) {
                        alert(data.detail);
                    }else{
                        alert(data.detail);
                        if (data.open_login) {
                            open_login();
                        }
                    }
                },
                error:function(err){
                    console.error(err);
                }
            });
        }
        function open_login(){
            window.location.href="login.php";
        }
    </script>
</body>
</html>