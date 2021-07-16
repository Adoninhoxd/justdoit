<?php
    session_start();
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
<?php include("layouts/_main-header.php");?>
    <div class="main-content">
        <div class="content-page">
            <div class="title-section">Productos destacados</div>
            <div class="product-list" id="space-list">

            </div>
        </div>
    </div>
    <script type="text/javascript" src="js/main-scripts.js"></script>
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
                    html+=
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
    </script>
</body>
</html>


