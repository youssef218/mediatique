<?php
require_once('conexion.php');
if(isset($_POST['submit'])){
    
    $id_ouvrage =  $_POST['idov'];
    $id_client = $_POST['idrv'];

    $sql = "UPDATE `ouvrage` SET `situation` = 'Indisponible' WHERE `id_ouvrage` = '$id_ouvrage'";
    if ($conn->query($sql) === TRUE) {
        echo "hhhhh";
        $sql = "UPDATE reserve SET date_validation	= NOW() WHERE id_reserve = '$id_client'";
        if ($conn->query($sql) === TRUE) {
            header("Location: resrvation.php");
        } else {
            echo "Error updating client record: " . mysqli_error($conn);
        }
    } else {
        echo "Error updating client record: " . mysqli_error($conn);
    }
} else {
    echo "Error updating client record: " . mysqli_error($conn);
}







?>