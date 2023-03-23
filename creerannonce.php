<?php
require_once('conexion.php');
session_start();


// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $titre_ouvrage = $_POST['titre_ouvrage'];
    $auteur_ouvrage = $_POST['auteur_ouvrage'];
    $image_ouvrage = $_POST['image_ouvrage'];
    $etat_ouvrage = $_POST['etat_ouvrage'];
    $type_ouvrage = $_POST['type_ouvrage'];
    $date_achat = $_POST['date_achat'];
    $date_edition = $_POST['date_edition'];
    $nombre_pages = $_POST['nombre_pages'];
    $situation = $_POST['situation'];
    $prix = $_POST['prix'];
  $id = $_SESSION['iduser'];
  
    $file = $_FILES['file'];
    $filename = $file['name'];
    $filetemp = $file['tmp_name'];
    $filedestination = 'uploads/' . $filename;
    move_uploaded_file($filetemp, $filedestination);
  
  
  



    // Prepare and execute SQL statement
    $sql = "INSERT INTO ouvrage (titre_ouvrage, auteur_ouvrage, image_ouvrage, 	etat_ouvrage, type_ouvrage, date_achat, date_edition, nombre_pages, situation,  id_gerant, prix)
    VALUES ('$titre_ouvrage', '$auteur_ouvrage','$filedestination', '$etat_ouvrage', '$type_ouvrage', '$date_achat', '$date_edition', '$nombre_pages', '$situation' , '$id', '$prix')";

    if ($conn->query($sql) === TRUE) {
        echo "Ad added successfully";
        header("Location: admin.php");

    } else {
        echo "Error updating client record: " . mysqli_error($conn);
    }
}

// Close the database connection
$conn->close();
?>






<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="/css/login.css" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous" />
  <title>Médiathèque</title>
</head>

<body>
  <form action="" method="post" enctype="multipart/form-data">
  <section class="h-100 " style="background-color: #9A616D;">
    <div class="container py-5 h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col">
          <div class="card card-registration my-4">
            <div class="row g-0">

              <div class="col-xl">
                <div class="card-body p-md-5 text-black">
                  <h3 class="mb-5 text-uppercase">Add un ouvrage +</h3>
                  <div class="row">
                  <div class="col-md-4 mb-4">
                      <div class="form-outline">
                        <input type="text" id="form3Example1m" name="titre_ouvrage" class="form-control form-control-lg" />
                        <label class="form-label" for="form3Example1m">Titre d'ouvrage</label>
                      </div>
                    </div>
                    <div class="col-md-4 mb-4">
                      <div class="form-outline">
                        <input type="text" id="form3Example1m" name="auteur_ouvrage" class="form-control form-control-lg" />
                        <label class="form-label" for="form3Example1m">Auteur d'ouvrage</label>
                      </div>
                    </div>
                    <div class="col-md-4 mb-4">
                      <div class="form-outline">
                        <input type="file" id="form3Example1n" id="file" name="file" class="form-control form-control-lg" />
                        <label class="form-label" for="form3Example1n">Image d'ouvrage</label>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-4 mb-4">
                      <div class="form-outline">
                        <input type="text" id="form3Example1m1" name="etat_ouvrage" class="form-control form-control-lg" />
                        <label class="form-label" for="form3Example1m1">Etat d'ouvrage</label>
                      </div>
                    </div>
                    <div class="col-md-4 mb-4">
                      <div class="form-outline">
                        <input type="text" id="form3Example1n1" name="type_ouvrage"  class="form-control form-control-lg" />
                        <label class="form-label" for="form3Example1n1">Type d'ouvrage</label>
                      </div>
                    </div>


                    <div class="col-md-4 mb-4">
                      <div class="form-outline">
                        <input type="number" id="form3Example1n1" name="nombre_pages"  class="form-control form-control-lg" />
                        <label class="form-label" for="form3Example1n1">Nombre de pages</label>
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-4 mb-4">
                      <div class="form-outline">
                        <input type="number" id="form3Example1m1" name="prix" class="form-control form-control-lg" />
                        <label class="form-label" for="form3Example1m1">prix</label>
                      </div>
                    </div>
            
                    <div class="col-md-4 mb-4">
                      <div class="form-outline">
                        <input type="date" id="form3Example1m1" name="date_achat" class="form-control form-control-lg" />
                        <label class="form-label" for="form3Example1m1">Date d'achat</label>
                      </div>
                    </div>

                    <div class="col-md-4 mb-4">
                      <div class="form-outline">
                        <input type="date" id="form3Example1n1" name="date_edition"  class="form-control form-control-lg" />
                        <label class="form-label" for="form3Example1n1">Date d'edition</label>
                      </div>
                    </div>
                  </div>







                  <div class="row">
                    
                  <div class="col-md-12 mb-4">
                      <div class="form-outline">
                        <select name="situation" id="form3Example97" class="form-control form-control-lg">
                          <option value="disponible">disponible</option>
                          <option value="Indisponible">Indisponible</option>
                          <option value="réservé">réservé jusqu'à</option>
                        </select>
                        <label class="form-label" for="form3Example97">Type</label>
                      </div>
                    </div>
                  </div>

                  

                  <div class="d-flex justify-content-end pt-3">
                    <a href="admin.php" type="button" class="btn  btn-lg ms-2">
                      annuler
                    </a>
                    <input type="submit" name="submit" class="btn btn-dark btn-lg btn-block ms-2" value="Creer un annonce">
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</form>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
    crossorigin="anonymous"></script>
</body>

</html>