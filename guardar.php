<?php

include("db.php");

if(isset($_POST['save'])){
    $iden=$_POST['iden'];
    $nom=$_POST['nom'];
    $fechaNaci=$_POST['fechaNaci'];
    $papa=$_POST['papa'];
    $imag= addslashes(file_get_contents($_FILES['imag']['tmp_name']));
/*modifique mi tabla*/ 
    $query= "INSERT INTO estudiante(id,nombre,fechanacimiento,PAPA,imagen)
     VALUES($iden,'$nom','$fechaNaci',$papa,'$imag')";
    $result=mysqli_query($conn,$query);
    if(!$result){
        $_SESSION['mensaje']="No se pudo guardar";
        $_SESSION['tipo_mensaje']="danger";
        //die("Falló consulta.");
    }
    else{
        $_SESSION['mensaje'] = "Estudiante guardado";
        $_SESSION['tipo_mensaje'] = "success";
    }
    header("Location: index.php");
}
?>
