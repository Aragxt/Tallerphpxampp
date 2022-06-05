<?php

include("db.php");

if(isset($_GET['id'])){
    $id = $_GET['id'];

    $query = "DELETE FROM producto WHERE id = $id";
    $result = mysqli_query($conn,$query);
    if (!$result) {
        $_SESSION['mensaje'] = "No se pudo eliminar";
        $_SESSION['tipo_mensaje'] = "danger";
        die("Fallo consulta.");
    }
    else{
        $_SESSION['mensaje'] = "Producto eliminado";
        $_SESSION['tipo_mensaje'] = "info";
    }

    header("Location: index.php");s

}
?>
