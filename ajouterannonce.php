<?php
require_once('conexion.php');
session_start();

// Check if form is submitted
if (isset($_POST['id'])) {
    // Get form data
    $id_ouvrage = $_POST['id'];
    $id_client = $_SESSION['iduser'];

    // // Prepare and execute SQL statement
    $sql = "INSERT INTO reserve (id_client, id_ouvrage) VALUES ($id_client, $id_ouvrage)";
    if ($conn->query($sql) === TRUE) {
        $sql = "UPDATE `ouvrage` SET `situation` = 'réservé' WHERE `id_ouvrage` = '$id_ouvrage'";
        if ($conn->query($sql) === TRUE) {
            $sql = "UPDATE adherant SET reservation = reservation + 1 WHERE id_client = '$id_client'";
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

    // Close the database connection
    $conn->close();
} 
?>