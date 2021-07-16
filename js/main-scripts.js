$(document).ready(function(){
    $("#idbusqueda").keyup(function(e){
        if(e.keyCode==13){
            search_product();
        }
    });
});

function search_product(){
    window.location.href="busqueda.php?text="+ $("#idbusqueda").val();
}