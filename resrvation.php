<!DOCTYPE html>
<html lang="en">
<?php
                require_once('conexion.php');
                session_start();
                if(isset($_SESSION['username'])){
                    
?>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Shop Homepage - Start Bootstrap Template</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="css/styles.css" rel="stylesheet" />
</head>

<body>
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container px-4 px-lg-5">
            <a class="navbar-brand" href="#!">Médiathèque</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                    <li class="nav-item"><a class="nav-link active" aria-current="page" href="admin.php">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="creerannonce.php">Ajouter ouvrage</a></li>
                    <li class="nav-item"><button data-bs-toggle="modal" data-bs-target="#exampleModal" type="button" class="btn  btn-md ms-2">ajouter un Gerant</button></li>
                </ul>


                <form action="ajoutergerant.php" method="post">
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Ajouter Gerant</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">

                                        <div class="col-xl-12">
                                            <div class="card-body p-md-5 text-black">
                                                <div class="row">
                                                    <div class="col-md-6 mb-4">
                                                        <div class="form-outline">
                                                            <input type="text" id="form3Example1m" name="prenom_gerant" class="form-control form-control-lg" />
                                                            <label class="form-label" for="form3Example1m">Prenom gerant</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 mb-4">
                                                        <div class="form-outline">
                                                            <input type="text" id="form3Example1n" name="nom_gerant" class="form-control form-control-lg" />
                                                            <label class="form-label" for="form3Example1n">Nom gerant</label>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-outline mb-4">
                                                    <input type="email" id="form3Example8" name="email_gerant" class="form-control form-control-lg" />
                                                    <label class="form-label" for="form3Example8">Email gerant</label>
                                                </div>
                                                <div class="form-outline mb-4">
                                                    <input type="password" id="form3Example99" name="pass" class="form-control form-control-lg" />
                                                    <label class="form-label" for="form3Example99">Password</label>
                                                </div>
                                                <div class="form-outline mb-4">
                                                    <input type="password" id="form3Example99" name="pass2" class="form-control form-control-lg" />
                                                    <label class="form-label" for="form3Example99">Conformer Password</label>
                                                </div>


                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer d-flex  justify-content-center pt-3">
                                        <button data-bs-dismiss="modal" type="button" class="btn  btn-lg ms-2">
                                            close
                                        </button>
                                        <input type="submit" name="submit" class="btn btn-dark btn-lg btn-block ms-2" value="Ajouter">

                                    </div>
                                </div>
                            </div>
                        </div>


                    </form>




               
                    <button class="btn btn-outline-dark" data-bs-toggle="modal" data-bs-target="#example" type="button">
                    <i class="bi bi-person"></i>
                        profile
                        <span class="badge bg-dark text-white ms-1 rounded-pill">0</span>
                    </button>
                    <form class="d-flex" action="dec.php" method="post">
                    <button type="submit" class=" ms-3 px-3 btn btn-outline-dark"><i class="bi bi-box-arrow-right"></i></button>
                </form>
            </div>
        </div>
    </nav>

    

    <?php
                    $id_client = $_SESSION['iduser'];
                    $sql = "SELECT * FROM gerant where id_gerant = '$id_client'";
                    $result = $conn->query($sql);
                    // check if there are any ads in the database
                    if ($result->num_rows > 0) {
                        // output data of each row
                        while ($row = $result->fetch_assoc()) {
                            // echo $row["prenom_gerant"];
                    ?>
                            <!-- Modal -->

                            <form action="modifprofil.php" method="post">
                                <div class="modal fade" id="example" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">Profile</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">

                                                <div class="col-xl-12">
                                                    <div class="card-body p-md-5 text-black">
                                                        <div class="row">
                                                            <div class="col-md-6 mb-4">
                                                                <div class="form-outline">
                                                                    <input type="text" id="form3Example1m" value="<?php echo $row["prenom_gerant"];  ?>" name="prenom_gerant" class="form-control form-control-lg" />
                                                                    <label class="form-label" for="form3Example1m">Prenom</label>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6 mb-4">
                                                                <div class="form-outline">
                                                                    <input type="text" id="form3Example1n" value="<?php echo $row["nom_gerant"];  ?>" name="nom_gerant" class="form-control form-control-lg" />
                                                                    <label class="form-label" for="form3Example1n">Nom</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6 mb-4">
                                                                <div class="form-outline">
                                                                    <input type="email" id="form3Example1m1" value="<?php echo $row["email_gerant"];  ?>" name="email_gerant" class="form-control form-control-lg" />
                                                                    <label class="form-label" for="form3Example1m1">C.I.N</label>
                                                                </div>
                                                            </div>

                                                            <div class="form-outline mb-4">
                                                                <input type="password" id="form3Example99" name="pass1" class="form-control form-control-lg" />
                                                                <label class="form-label" for="form3Example99">Password</label>
                                                            </div>
                                                            <div class="form-outline mb-4">
                                                                <input type="password" id="form3Example99" name="pass" class="form-control form-control-lg" />
                                                                <label class="form-label" for="form3Example99">Password</label>
                                                            </div>
                                                            <div class="form-outline mb-4">
                                                                <input type="password" id="form3Example99" name="pass2" class="form-control form-control-lg" />
                                                                <label class="form-label" for="form3Example99">Conformer Password</label>
                                                            </div>


                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer d-flex  justify-content-center pt-3">
                                                    <button data-bs-dismiss="modal" type="button" class="btn  btn-lg ms-2">
                                                        close
                                                    </button>
                                                    <input type="hidden" id="form3Example99" value="<?php echo $row["password_gerant"];   ?>" name="ancien" class="form-control form-control-lg" />

                                                    <input type="submit" name="submitadmin" class="btn btn-dark btn-lg btn-block ms-2" value="save the changes">

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                            </form>







                    <?php
                        }
                    }
                    // display the ad information in HTML
                    ?>


    <!-- Header-->
    <header class="bg-dark py-5">
        <div class="container px-4 px-lg-5 my-5">
            <div class="text-center text-white">
                <h1 class="display-4 fw-bolder">Shop in style</h1>
                <p class="lead fw-normal text-white-50 mb-0">With this shop hompeage template</p>
            </div>
        </div>
    </header>
    <!-- Section-->
    <section class="py-5">
        <div class="container px-4 px-lg-5 mt-5">
        <h1>reservation non Valider : </h1><br><br>
            <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">

             





<?php
               
                // prepare SQL statement to retrieve ads
                $idclient = $_SESSION['iduser'] ;
                $sql = "SELECT * FROM reserve ";
                $result = $conn->query($sql);
                // check if there are any ads in the database
                if ($result->num_rows > 0) {
                    // output data of each row
            while ($rowd = $result->fetch_assoc()) {
              
              

                $idovrage = $rowd["id_ouvrage"];

                if($rowd["date_validation"] ===null && $rowd["date_retour"]===null){
                $sql1 = "SELECT * FROM ouvrage where id_ouvrage = '$idovrage'";
                $result1 = $conn->query($sql1);
                // check if there are any ads in the database
                if ($result1->num_rows > 0) {
                    // output data of each row
                    while ($row = $result1->fetch_assoc()) {
                       ?> 
                       
                       
                       
                       
                       <div class="col mb-5">
                            <div class="card h-100">
                                <!-- Sale badge-->
                                <div class="badge bg-dark text-white position-absolute" style="top: 0.5rem; right: 0.5rem"><?php echo $row["situation"]; ?></div>
                                <!-- Product image-->
                                <img class="card-img-top" style="height:250px;" src="<?php echo $row["image_ouvrage"]; ?>" alt="..." />
                                <!-- Product details-->
                                <div class="card-body p-4">
                                    <div class="text-center">
                                        <!-- Product name-->
                                        <h5 class="fw-bolder"><?php echo $row["titre_ouvrage"]; ?></h5>
                                        <!-- Product reviews-->
                                        <div class="d-flex justify-content-center small text-warning mb-2">
                                            <div> <span class=" fs-5">Date reserve</span> <br><?php echo $rowd["date_reserv"]; ?></div>
                                           

                                        </div>
                                        <!-- Product price-->

                                    Id client    <?php echo  $rowd["id_client"] ; ?>
                                    </div>
                                </div>
                                <!-- Product actions-->
                                <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                    <form action="valid.php" method="post">
                                        <input type="hidden" name="idov" value="<?php echo  $row['id_ouvrage']; ?>">
                                        <input type="hidden" name="idrv" value="<?php echo  $rowd['id_reserve']; ?>">
                                    <div class="text-center"><button type="submit" name="submit" class="btn btn-outline-dark mt-auto">Accepted</button></div>
                                </form>
                                </div>
                            </div>
                        </div>




                       
                       
                       
                       
                       <?php 
                        
                        
                        
                        
                        
                    }
                }
            };
            }
                } 
                   
            
                ?>


            </div>
        </div>
    </section>




    <!-- Section-->
    <section class="py-5">
        <div class="container px-4 px-lg-5 mt-5">
        <h1>reservation Attendre de validation : </h1><br><br>
            <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">

             





<?php
               
                // prepare SQL statement to retrieve ads
                $idclient = $_SESSION['iduser'] ;
                $sql = "SELECT * FROM reserve ";
                $result = $conn->query($sql);
                // check if there are any ads in the database
                if ($result->num_rows > 0) {
                    // output data of each row
            while ($rowd = $result->fetch_assoc()) {
              
              

                $idovrage = $rowd["id_ouvrage"];

                if($rowd["date_validation"] !==null && $rowd["date_retour"]===null){


                

                $sql1 = "SELECT * FROM ouvrage where id_ouvrage = '$idovrage'";
                $result1 = $conn->query($sql1);
                // check if there are any ads in the database
                if ($result1->num_rows > 0) {
                    // output data of each row
                    while ($row = $result1->fetch_assoc()) {
                       ?> 
                       
                       
                       
                       
                       <div class="col mb-5">
                            <div class="card h-100">
                                <!-- Sale badge-->
                                <div class="badge bg-dark text-white position-absolute" style="top: 0.5rem; right: 0.5rem"><?php echo $row["situation"]; ?></div>
                                <!-- Product image-->
                                <img class="card-img-top" style="height:250px;" src="<?php echo $row["image_ouvrage"]; ?>" alt="..." />
                                <!-- Product details-->
                                <div class="card-body p-4">
                                    <div class="text-center">
                                        <!-- Product name-->
                                        <h5 class="fw-bolder"><?php echo $row["titre_ouvrage"]; ?></h5>
                                        <!-- Product reviews-->
                                        <div class="d-flex justify-content-center small text-warning mb-2">
                                            <div> <span class=" fs-5">Date Validation</span> <br><?php echo $rowd["date_validation"]; ?></div>
                                           

                                        </div>
                                        <!-- Product price-->

                                    Id client    <?php echo  $rowd["id_client"] ; ?>
                                    </div>
                                </div>
                                <!-- Product actions-->
                                <div class="card-footer p-4 d-flex justify-content-center pt-0 border-top-0 bg-transparent">
                                    <form action="validretour.php" method="post">
                                        <input type="hidden" name="idov" value="<?php echo  $row['id_ouvrage']; ?>">
                                        <input type="hidden" name="idcl" value="<?php echo  $rowd["id_client"]; ?>">
                                        <input type="hidden" name="idrv" value="<?php echo  $rowd['id_reserve']; ?>">
                                    <div class="text-center"><button type="submit" name="submit" class="btn btn-outline-dark mt-auto">valider retour</button></div>
                                </form>
                                <form action="reject.php" class="ms-3" method="post">
                                        <input type="hidden" name="idov" value="<?php echo  $row['id_ouvrage']; ?>">
                                        <input type="hidden" name="idcl" value="<?php echo  $rowd["id_client"]; ?>">
                                        <input type="hidden" name="idrv" value="<?php echo  $rowd['id_reserve']; ?>">
                                    <div class="text-center"><button type="submit" name="submit" class="btn btn-outline-dark mt-auto">reject</button></div>
                                </form>
                                </div>
                            </div>
                        </div>
                       
                       <?php 
                        
                        
                        
                        
                        
                    }
                }
            };
                
            }
                } 
                   
            
                ?>


            </div>
        </div>
    </section>





    

    <!-- Section-->
    <section class="py-5">
        <div class="container px-4 px-lg-5 mt-5">
        <h1>Historique reservation : </h1><br><br>
            <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">

             





<?php
               
                // prepare SQL statement to retrieve ads
                $idclient = $_SESSION['iduser'] ;
                $sql = "SELECT * FROM reserve  where date_validation is not null and date_retour is not null ";
                $result = $conn->query($sql);
                // check if there are any ads in the database
                if ($result->num_rows > 0) {
                    // output data of each row
            while ($rowd = $result->fetch_assoc()) {
              
              

                $idovrage = $rowd["id_ouvrage"];

               


                

                $sql1 = "SELECT * FROM ouvrage where id_ouvrage = '$idovrage'";
                $result1 = $conn->query($sql1);
                // check if there are any ads in the database
                if ($result1->num_rows > 0) {
                    // output data of each row
                    while ($row = $result1->fetch_assoc()) {
                       ?> 
                       
                       
                       
                       
                       <div class="col mb-5">
                            <div class="card h-100">
                               
                                <img class="card-img-top" style="height:250px;" src="<?php echo $row["image_ouvrage"]; ?>" alt="..." />
                                <!-- Product details-->
                                <div class="card-body p-4">
                                    <div class="text-center">
                                        <!-- Product name-->
                                        <h5 class="fw-bolder"><?php echo $row["titre_ouvrage"]; ?></h5>

                                    Id client    <?php echo  $rowd["id_client"] ; ?>
                                    </div>
                                </div>
                                <!-- Product actions-->
                                <div class="card-footer p-4 d-flex justify-content-center pt-0 border-top-0 bg-transparent">
                                    
                                <div class="text-center"><a class="btn btn-outline-dark mt-auto" data-bs-toggle="modal" data-bs-target="#exampleModal<?php echo $rowd["id_reserve"]; ?>">more</a></div>

                                </div>
                            </div>
                        </div>
                       


                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal<?php echo $rowd["id_reserve"]; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel"><?php echo $row["titre_ouvrage"]; ?></h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <h2>Auteur : <?php echo $row["auteur_ouvrage"]; ?></h2>
                                        <img class="card-img-top" style="height:250px;" src="<?php echo $row["image_ouvrage"]; ?>" alt="..." />
                                        <h3>Date reserve : <?php echo $rowd["date_reserv"]; ?></h3>
                                        <h3>Date Validation : <?php echo $rowd["date_validation"]; ?></h3>
                                        <h3>Date de retour : <?php echo $rowd["date_retour"]; ?></h3>
                                        <h3>Id Client : <?php echo $rowd["id_client"]; ?></h3>
                                        
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>








                       <?php 
                    }
                }                
            }
                } else {
                    echo "No ads found in the database";
                }
                   
            } else{
                header("Location: signin.php");
            }
                // close the database connection
                $conn->close();
                ?>


            </div>
        </div>
    </section>

    


    <!-- Footer-->
    <footer class="py-5 bg-dark">
        <div class="container">
            <p class="m-0 text-center text-white">Copyright &copy; Your Website 2022</p>
        </div>
    </footer>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="js/scripts.js"></script>
</body>

</html>

