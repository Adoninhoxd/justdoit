<header>
        <div class="logo-place"><a href="index.php"><img src="assets/logopagina.png"></a></div>
        <div class="search-place">
        <input type="text" id="idbusqueda" placeholder="Busca tu producto">
            <button class="btn-main btn-search" onclick="search_product()"><i class="fa fa-search" aria-hidden="true"></i>
            </button>
        </div>
        <div class="option-place">
            <?php
            if (isset($_SESSION['codusu'])) {
                echo '<div class="item-option" title="Cerrar sesion"><a href="servicios/logout.php"><i class="fa fa-user-circle" aria-hidden="true"></i></a>'.$_SESSION['nomusu'].'</div>';
            }else{
            ?>    
        <div class="item-option" title="Registrate">
            <a href="registro.php"><i  class="fa fa-user-circle" aria-hidden="true"></i></a>
        </div>
        <div class="item-option" title="Ingresar">
            <a href="login.php"><i class="fa fa-sign-in" aria-hidden="true"></i></a>
        </div>            
            <?php
            }
            ?>
        <div class="item-option" title="Mis compras">
            <a href="carrito.php"><i class="fa fa-shopping-cart" aria-hidden="true"></i></a>
        </div>
        <div class="item-option" title="Historial">
            
            <a href="historial.php"><i class="fa fa-history" aria-hidden="true"></i></a>
        </div>
    </div>
    </header>