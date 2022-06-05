<?php
include("db.php");
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $query = "SELECT * FROM estudiante WHERE id = $id";
    $result = mysqli_query($conn, $query);
    if(mysqli_num_rows($result) == 1){
        $row = mysqli_fetch_array($result);
        $nom = $row['nombre'];
        $id = $row['id'];
        $fechaNaci = $row['fechanacimiento'];
        $papa = $row['PAPA'];
    }
}
if (isset($_POST['edit'])){
    $iden = $_POST['iden'];
    $nom = $_POST['nom'];
    $fechaNaci = $_POST['fechanaci'];
    $papa = $_POST['papa'];
    $query = "UPDATE estudiante SET nombre = '$nom', id = $iden, fechanacimiento = '$fechaNaci', PAPA = $papa WHERE id = $id";
    $result = mysqli_query($conn, $query);
    if(!$result){
        $_SESSION['mensaje'] = "No se pudo editar";
        $_SESSION['tipo_mensaje'] = "Danger";
        //die("Fallo consulta");
    }
    else{
        $_SESSION['mensaje'] = "Se edito correctamente";
        $_SESSION['tipo_mensaje'] = "Success";
    }

    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD con PHP</title>
    <!--- Bootstrap--->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.2/font/bootstrap-icons.css">
</head>
<body>
<nav class="navbar navbar-dark bg-dark">
    <div class="container">
        <a href="index.php" class="navbar-brand">CRUD con PHP</a>
    </div>
</nav>
<div class="container p-4">
    <div class="row">
        <div class="col-md-4 mx-auto">
            <div class="card card-body">
                <form action="editar.php?id=<?php echo $id; ?>" method="POST">
                    <div class="mb-3">
                        <label for="iden" class="form-label">Identificacion: </label>
                        <input type="text" name="iden" id="iden" class="form-control" value="<?php echo $id; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="nom" class="form-label">Nombre Completo: </label>
                        <input type="text" name="nom" id="nom" class="form-control" value="<?php echo $nom; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="fechaNaci" class="form-label">Fecha Nacimiento: </label>
                        <input type="date" name="fechaNaci" id="fechaNaci" class="form-control" value="<?php echo $fechaNaci; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="papa" class="form-label">Fecha Nacimiento: </label>
                        <input type="number" name="papa" id="papa" class="form-control" value="<?php echo $papa; ?>" required>
                    </div>
                    <input type="submit" class = "btn btn-success btn-block" name="edit" value="Editar">
                </form>
            </div>
        </div>
    </div>
</div>

                    


