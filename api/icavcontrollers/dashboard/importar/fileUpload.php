<?php


include "operaciones.php";
// Directorio de destino (Carpeta de destino)
$target_dir = "./../../../../app/icav/dashboard/resources/uploads/pastoral/";

// Ruta de guardado del archivo
$target_file = $target_dir . basename($_FILES["file"]["name"]);
$metodo = $_POST["metodo"];
if ($metodo == 1) {
    // Permiso de Subir (Por ahora ok = 1)
    // En caso de algun error (ok = 0). No se puede subir el archivo
    if(uploadFile($_FILES["file"]["tmp_name"], $target_file) == 1){
        echo json_encode(array("result" => 1));
    }
    else{
        deleteFile($target_file);
        if(uploadFile($_FILES["file"]["tmp_name"], $target_file) == 1){
            echo json_encode(array("result" => 1));
        }
    }
}