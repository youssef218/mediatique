<?php

require_once('conexion.php');
session_start() ;
if (isset($_POST['submit'])){
// Get user input
$email = $_POST['email'];
$password = $_POST['password'];
// Prepare and execute the SQL statement
$sql = "SELECT * FROM gerant WHERE email_gerant = '$email' AND password_gerant = '$password'";
$result = mysqli_query($conn, $sql);
// Check if the user exists in the database
if (mysqli_num_rows($result) > 0) {
  $row = mysqli_fetch_assoc($result);
  $_SESSION['iduser'] = $row["id_gerant"] ;
    // User admin exixiste
        header("Location: admin.php");
    
} else {
    $sql = "SELECT * FROM adherant WHERE username = '$email' AND password = '$password'";
        $result = mysqli_query($conn, $sql);
        // Check if the user exists in the database
        if (mysqli_num_rows($result) > 0) {
            // User exists, check validation status 
            $row = mysqli_fetch_assoc($result);
            if ($row["penalties"] <= 3) {
                // Validation is true, redirect to authorized page
                $_SESSION['iduser'] = $row["id_client"] ;
                header("Location: index.php");
                
                
            } else {
                // Validation is false, redirect to unauthorized page
                header("Location: non-valide.html");
            }
        } else {
            // User does not exist, display error message
            echo "Invalid email or password. Please try again.";
        }
}
$_SESSION['username'] = $email;


}

// Close the database connection
mysqli_close($conn);
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <title>Médiathèque</title>
</head>
<body>
    <section class="vh-101" style="background-color: #9A616D;">
        <div class="container py-5 h-100">
          <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col col-xl-10">
              <div class="card" style="border-radius: 1rem;">
                <div class="row g-0">
                  <div class="col-md-6 col-lg-5 d-none d-md-block">
                    <img src="./assets/photo login.png"
                      alt="login form" class="img-fluid" style="border-radius: 1rem 0 0 1rem;" />
                  </div>
                  <div class="col-md-6 col-lg-7 d-flex align-items-center">
                    <div class="card-body p-4 p-lg-5 text-black">
      
                      <form action="signin.php"  method="post">
      
                        <div class="d-flex align-items-center mb-3 pb-1">
                          <i class="fas fa-cubes fa-2x me-3" style="color: #ff6219;"></i>
                          <span class="h1 fw-bold mb-0">Connexion Form</span>
                        </div>
      
                        <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Sign into your account</h5>
      
                        <div class="form-outline mb-4">
                          <input type="text" name="email" id="form2Example17" class="form-control form-control-lg" />
                          <label class="form-label" for="form2Example17">Username</label>
                        </div>
      
                        <div class="form-outline mb-4">
                          <input type="password" name="password" id="form2Example27" class="form-control form-control-lg" />
                          <label class="form-label" for="form2Example27">Password</label>
                        </div>
      
                        <div class="pt-1 mb-4">
                          <input type="submit" name="submit" class="btn btn-dark btn-lg btn-block" value="Login">
                          
                        </div>
      
                        <!-- <a class="small text-muted" href="#!">Forgot password?</a> -->
                        <p class="mb-5 pb-lg-2" style="color: #393f81;">Don't have an account? <a href="signup.php"
                            style="color: #393f81;">Register here</a></p>
                        <!-- <a href="#!" class="small text-muted">Terms of use.</a>
                        <a href="#!" class="small text-muted">Privacy policy</a> -->
                      </form>
      
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>