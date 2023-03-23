<?php
require_once('conexion.php');

// check if the "Delete" button has been clicked
if(isset($_POST['submit'])) {
    $email_gerant = $_POST['email_gerant'];
    $nom_gerant = $_POST['nom_gerant'];
    $prenom_gerant = $_POST['prenom_gerant'];
    $pass = $_POST['pass'];
    $pass2 = $_POST['pass2'];
    // create the SQL query to delete the ad from the database
    if($pass == $pass2 && !empty($pass) && !empty($pass2)){
    $sql = "INSERT INTO `gerant`( `nom_gerant`, `prenom_gerant`, `email_gerant`, `password_gerant`) VALUES ('$nom_gerant','$prenom_gerant','$email_gerant','$pass')";

    // execute the query
    if(mysqli_query($conn, $sql)) {
        header("Location: admin.php");
    } else {
        echo "Error deleting ad: " . mysqli_error($conn);
    }
}
}

// close the database connection
mysqli_close($conn);
?>
