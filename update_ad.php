<?php
require_once('conexion.php');
session_start();
// Check if form is submitted
if (isset($_POST['submit'])) {
    // Get form data
    $id = $_SESSION['iduser'];
    $idov = $_POST['id'];
    $title = $_POST['title'];
    $etat_ouvrage = $_POST['etat_ouvrage'];
    $prix = $_POST['prix'];
    $type_ouvrage = $_POST['type_ouvrage'];
    $auteur_ouvrage = $_POST['auteur_ouvrage'];
    $date_achat = $_POST['date_achat'];
    $date_edition = $_POST['date_edition'];
    $nombre_pages = $_POST['nombre_pages'];
    $situation = $_POST['situation'];


    $file = $_FILES['file'];
    $filename = $file['name'];
    $filetemp = $file['tmp_name'];
    $filedestination = 'uploads/' . $filename;
    move_uploaded_file($filetemp, $filedestination);


        if($filename === ""){
        $filedestination = $_POST['img'];
        };

    


    $sql = "UPDATE ouvrage SET titre_ouvrage='$title', auteur_ouvrage='$auteur_ouvrage', image_ouvrage='$filedestination', prix='$prix', etat_ouvrage='$etat_ouvrage', type_ouvrage='$type_ouvrage', date_achat='$date_achat', date_edition='$date_edition', nombre_pages='$nombre_pages', situation='$situation', id_gerant='$id' where id_ouvrage='$idov'";

    if ($conn->query($sql) === TRUE) {
        echo "Ad added successfully";
    } else {
        echo "Error updating client record: " . mysqli_error($conn);
    }
    header("Location: admin.php");
}

// Close the database connection
$conn->close();
?>
