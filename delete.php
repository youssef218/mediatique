<?php
require_once('conexion.php');

// check if the "Delete" button has been clicked
if(isset($_POST['id'])) {
    $id_ad = $_POST['id'];

    // create the SQL query to delete the ad from the database
    $sql = "DELETE FROM reserve WHERE id_ouvrage  = $id_ad";

    // execute the query
    if(mysqli_query($conn, $sql)) {
        $sql = "DELETE FROM ouvrage WHERE id_ouvrage  = $id_ad";

        // execute the query
        if(mysqli_query($conn, $sql)) {
            echo "Ad deleted successfully.";
            
        } else {
            echo "Error deleting ad: " . mysqli_error($conn);
        }
    } else {
        echo "Error deleting ad: " . mysqli_error($conn);
    }
}
header("Location: admin.php");
// close the database connection
mysqli_close($conn);
?>
