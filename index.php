<?php include('db.php'); ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Productos</title>
    <!--- Bootstrap--->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.2/font/bootstrap-icons.css">
</head>
<body>
    <nav class="navbar navbar-dark bg-dark">
        <div class="container">
            <a href="index.php" class= "navbar-brand">Productos</a>
        </div>
    </nav>
    <div class="container p-4">
        <div class="row">
            <div class="col-md-4">
                <?php if(isset($_SESSION['mensaje'])) {?>
                    <div class="alert alert-<?=$_SESSION['tipo_mensaje'];?> alert-dismissible fade show" role="alert">
                    <?php echo $_SESSION['mensaje'];?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <?php session_unset();}?>

                <div class="card card-body">
                    <form action="guardar.php" method="POST" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="iden" class="form-label">ID Producto:</label>
                            <input type="text" id="iden" name="iden" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="nom" class="form-label">Nombre Producto:</label>
                            <input type="text" id="nom" name="nom" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="fechaNaci" class="form-label">Fecha de vencimiento:</label>
                            <input type="date" id="fechaNaci" name="fechaNaci" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="precio" class="form-label">Precio:</label>
                            <input type="number" id="precio" name="precio" step="any" class="form-control" onchange="verificar()" required>
                        </div>
                        <div class="mb-3">
                            <label for="imag" class="form-label">Imagen:</label>
                            <input type="file" id="imag" name="imag" class="form-control" required>
                        </div>
                        <input type="submit" class="btn btn-success btn-block" name="save" value="Guardar">
                    </form>
                </div>
            </div>
            <div class="col-md-8">
            <table class="table table-bordered">
                <thead>
                    <th>ID Producto</th>
                    <th>Nombre</th>
                    <th>Fecha Nacimiento</th>
                    <th>Precio</th>
                    <th>Imagen</th>
                    <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $query = "SELECT * FROM producto";
                    $result = mysqli_query($conn, $query);
                    while($row = mysqli_fetch_array($result)){?>
                        <tr>
                            <td><?php echo $row['id'] ?></td>
                            <td><?php echo $row['nombre'] ?></td>
                            <td><?php echo $row['fecha'] ?></td>
                            <td><?php echo $row['precio'] ?></td>
                            <td><img height="80px" src="data:imag0/png;base64,<?php echo base64_encode($row['imagen']); ?>"/></td>
                            <td>
                                <a href="editar.php?id=<?php echo $row['id']?>" class="btn btn-primary">
                                    <i class="bi bi-pencil-fill"></i>
                                </a>
                                <a href="eliminar.php?id=<?php echo $row['id'] ?>" class="btn btn-danger">
                                    <i class="bi bi-trash-fill"></i>
                                </a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<script src="validar.js"></script>
</body>
</html>