<?php
require_once('conexion.php');
session_start();

// Check if form is submitted
if (isset($_POST['submit'])) {
    // Get form data
    $id_ouvrage = $_POST['idov'];
    $id_resve = $_POST['idrv'];
    $id_client = $_POST['idcl'];
    // // Prepare and execute SQL statement
    $sql = "DELETE FROM reserve WHERE id_reserve = '$id_resve'";
    if ($conn->query($sql) === TRUE) {
        $sql = "UPDATE `ouvrage` SET `situation` = 'Indisponible' WHERE `id_ouvrage` = '$id_ouvrage'";
        if ($conn->query($sql) === TRUE) {
            $sql = "UPDATE adherant SET penalties = penalties + 1 WHERE id_client = '$id_client'";
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

    // Close the database connection
    $conn->close();
} 
?>