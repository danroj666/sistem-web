<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registra Nueva Categoria</title>
    <link rel="stylesheet" href="estilos/categoria1.css">
</head>
<body>
<header class="header">
        <div class="logo">
<!---->            <img src="res/logo.png" alt="Logo de la marca">
        </div>
        <nav>
        <ul class="nav-links">
    <li><a href="producto.php">Registrar Producto</a></li>
    <li><a href="consulta-Productos.php">Consultar Producto</a></li>
    <li><a href="RegistraUsuario.php">Registrar Usuario</a></li>
</ul>
</nav>
<a class="btn" href="cerrarSesion.php"><button>Cerrar Sesion</button></a>

<a onclick="openNav()" class="menu" href="#"><button>Menu</button></a>

<div id="mobile-menu" class="overlay">
    <a onclick="closeNav()" href="" class="close">&times;</a>
    <div class="overlay-content">
        <a href="producto.php">Registrar Producto</a>
        <a href="consulta-Productos.php">Consultar Producto</a>
        <a href="RegistraUsuario.php">Registrar Usuario</a>
        <a href="cerrarSesion.php">Cerrar Sesion</a>
    </div>
</div>
<script type="text/javascript" src="nav.js"></script>
    </header>
    <?php

    if (isset($_SESSION['user'])) {
    if ($_SESSION['rol'] == 1) {
    ?>
      <h3>Registrar Categoria</h3>
    <section class="contenedor">
        <article class="content-art1">
            <form action="reg-categoria.php" method="post">
                <table class="catT">
                    <tr>
                        <td>
                            <label>CODIGO CATEGORIA</label>
                        </td>
                        <td>
                            <input type="text" name="txtCat" required>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>DESCRIPCION</label>
                        </td>
                        <td>
                            <input type="text" name="txtdescripcion" required>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <button class="buttons" type="reset">CANCELAR</button>
                        </td>
                        <td>
                            <button class="buttons" type="submit">REGISTRAR</button>
                        </td>
                    </tr>
                </table>
            </form>
        </article>
        <article class="content-art2">
            <table border="1" class="tablaCat">
                <tr>
                    <th>NO.</th>
                    <th>DESCRIPCION</th>
                    <th>ESTATUS</th>
                    <th>Editar</th>
                    <th>Eliminar</th>
                </tr>
                <?php
                include("conexion/conexion.php");
                $consulta = "CALL ObtenerCategorias()";
                $areas = mysqli_query($conexion, $consulta);
                while($regCat = mysqli_fetch_assoc($areas)){
                    echo "<tr>".
                    "<td>".$regCat["idCategoria"] . "</td>".
                    "<td>".$regCat["descripcionCat"] . "</td>".
                    "<td>".$regCat["estatus"] . "</td>".
                    "<td><a href='modificar-cat.php?id=".$regCat["idCategoria"]."' title='Editar'><img src='res/edit.png' width='30' height='30'></a></td>".
                    "<td><a href='Elimina-cat.php?id=".$regCat["idCategoria"]."' title='Eliminar'><img src='res/elim.png' width='30' height='30'></a></td>".
                    "</tr>";
                }
                ?>
            </table>
        </article>
    </section>
</body>
</html>
<?php
    } else {
        echo "No tienes privilegios para ingresar al sitio, solo administradores.";
    }
} else {
    echo "Para ingresar debes <a href='index.php'>iniciar sesión</a>";
}
?>

