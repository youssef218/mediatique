<?php
require_once('conexion.php');
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
if (isset($_POST['submit'])) {
  $username = $_POST['user'];
  $prenom_client = $_POST['prenom'];
  $nom_client = $_POST['nom'];
  $adresse_client = $_POST['addrese'];
  $email_client= $_POST['mail'];
  $tele_client = $_POST['tel'];
  $cin_client = $_POST['cin'];
  $naissance_client = $_POST['naissance'];
  $type_client = $_POST['type'];
  $password = $_POST['pass'];
  $password1 = $_POST['pass2'];

  if(!empty($username) && !empty($prenom_client) &&!empty($nom_client) &&!empty($adresse_client) &&!empty($email_client) &&!empty($tele_client) &&!empty($cin_client) &&!empty($naissance_client) &&!empty($type_client) &&!empty($password) && $password == $password1 ){
    $sql = "INSERT INTO adherant (username, password, prenom_client, nom_client, adresse_client, email_client, tele_client, cin_client, naissance_client, type_client, penalties, reservation)
    VALUES ('$username', '$password', '$prenom_client', '$nom_client', '$adresse_client', '$email_client', '$tele_client', '$cin_client', '$naissance_client', '$type_client', '0', '0')";
    if ($conn->query($sql) === TRUE) {
      header("Location: signin.php");
         
}
 
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
  
  $conn->close();

}
;


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
  <form action="" method="post">
  <section class="h-100 " style="background-color: #9A616D;">
    <div class="container py-5 h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col">
          <div class="card card-registration my-4">
            <div class="row g-0">
              <div class="col-xl-6 d-none d-xl-block">
                <img src="./assets/photo login.png" alt="Sample photo" class="img-fluid" style="
                      border-top-left-radius: 0.25rem;
                      border-bottom-left-radius: 0.25rem; " />
              </div>

              <div class="col-xl-6">
                <div class="card-body p-md-5 text-black">
                  <h3 class="mb-5 text-uppercase">Registration form</h3>
                  <div class="row">
                    <div class="col-md-6 mb-4">
                      <div class="form-outline">
                        <input type="text" id="form3Example1m" name="prenom" class="form-control form-control-lg" />
                        <label class="form-label" for="form3Example1m">Prenom</label>
                      </div>
                    </div>
                    <div class="col-md-6 mb-4">
                      <div class="form-outline">
                        <input type="text" id="form3Example1n" name="nom" class="form-control form-control-lg" />
                        <label class="form-label" for="form3Example1n">Nom</label>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6 mb-4">
                      <div class="form-outline">
                        <input type="text" id="form3Example1m1" name="cin" class="form-control form-control-lg" />
                        <label class="form-label" for="form3Example1m1">C.I.N</label>
                      </div>
                    </div>
                    <div class="col-md-6 mb-4">
                      <div class="form-outline">
                        <input type="date" id="form3Example1n1" name="naissance"  class="form-control form-control-lg" />
                        <label class="form-label" for="form3Example1n1">Naissance</label>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6 mb-4">
                      <div class="form-outline">
                        <select name="type" id="form3Example97" class="form-control form-control-lg">
                          <option value="etudiant">Etudiant</option>
                          <option value="fonctionnaire">Fonctionnaire</option>
                          <option value="employé">Employé</option>
                          <option value="femme">Femme</option>
                          <option value="foyer">Foyer</option>
                        </select>
                        <label class="form-label" for="form3Example97">Type</label>
                      </div>
                    </div>

                    <div class="col-md-6 mb-4">
                      <div class="form-outline">
                        <input type="tel" name="tel" id="form3Example9" pattern="[0]{1}[5-8]{1}[0-9]{8}"
                          class="form-control form-control-lg" />
                        <label class="form-label" for="form3Example9">Téléphone</label>
                      </div>
                    </div>
                  </div>

                  <div class="form-outline mb-4">
                    <input type="email" id="form3Example8" name="mail" class="form-control form-control-lg" />
                    <label class="form-label" for="form3Example8">Email</label>
                  </div>

                  <div class="form-outline mb-4">
                    <input type="text" id="form3Example8" name="addrese" class="form-control form-control-lg" />
                    <label class="form-label" for="form3Example8">Address</label>
                  </div>

                  <div class="form-outline mb-4">
                    <input type="text" id="form3Example90" name="user" class="form-control form-control-lg" />
                    <label class="form-label" for="form3Example90">Username</label>
                  </div>

                  <div class="form-outline mb-4">
                    <input type="text" id="form3Example99" name="pass" class="form-control form-control-lg" />
                    <label class="form-label" for="form3Example99">Password</label>
                  </div>
                  <div class="form-outline mb-4">
                    <input type="text" id="form3Example99" name="pass2" class="form-control form-control-lg" />
                    <label class="form-label" for="form3Example99">Conformer Password</label>
                  </div>

                  <div class="d-flex justify-content-end pt-3">
                    <a href="signin.php">
                      <button type="button" class="btn  btn-lg ms-2">
                        Connexion
                      </button>
                    </a>
                    <input type="submit" name="submit" class="btn btn-dark btn-lg btn-block ms-2" value="Create an account">
                    <!-- <button type="button" > -->
                      
                    </button>
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