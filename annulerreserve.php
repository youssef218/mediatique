<?php
require_once('conexion.php');
if(isset($_POST['idouvrage']) && isset($_POST['idclient']) && isset($_POST['idreserve'])){
$idclient = $_POST['idclient'];
$idouvrage = $_POST['idouvrage'] ;
$idreserve =  $_POST['idreserve'] ;


$sql = "DELETE FROM reserve WHERE id_reserve = '$idreserve' ";
if ($conn->query($sql) === TRUE) {
    $sql = "UPDATE `ouvrage` SET `situation` = 'disponible' WHERE `id_ouvrage` = '$idouvrage'";
    if ($conn->query($sql) === TRUE) {
        $sql = "UPDATE adherant SET reservation = reservation -1 WHERE id_client = '$idclient'";
        if ($conn->query($sql) === TRUE) {
            header("Location: mesreserve.php");
        } else {
            echo "Error updating client record: " . mysqli_error($conn);
        }
    } else {
        echo "Error updating client record: " . mysqli_error($conn);
    }
} else {
    echo "Error updating client record: " . mysqli_error($conn);
}


}
$conn->close();

?>