<!DOCTYPE html>
<html lang="en">
<?php
require_once('conexion.php');
session_start();
if (isset($_SESSION['username'])) {

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
                        <li class="nav-item"><a class="nav-link" href="resrvation.php">reservation</a></li>
                        <li class="nav-item"><a class="nav-link" href="creerannonce.php">Ajouter annonce</a></li>
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














                    <form action="dec.php" method="post">
                        <button type="submit" class=" ms-3 px-3 btn btn-outline-dark"><i class="bi bi-box-arrow-right"></i></button>
                    </form>
                </div>
            </div>
        </nav>

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
        <form action="" method="post">

<div class="row container">
          <div class="col-md-3 mb-4">
              <div class="form-outline">
                <select name="type" class="form-control form-control-lg">
                    <option value=""> -selcted type-</option>
                    <option value="roman" >roman</option>
                    <option value="dvd" >dvd</option>
                    <option value="cd" >cd</option>
                    <option value="magasin" >magasin</option>
                </select>
              </div>
            </div>

            <div class="col-md-3 mb-4">
              <div class="form-outline">
              <select name="etat" class="form-control form-control-lg">
                    <option value=""> -selcted Etat-</option>
                    <option value="bien" >bien</option>
                    <option value="tres bien" >tres bien</option>
                    <option value="no bien" >no bien</option>
                </select>
              </div>
            </div>

            <div class="col-md-3 mb-4">
              <div class="form-outline">
              <select name="sition" class="form-control form-control-lg">
                    <option value=""> -selcted disposability-</option>
                    <option value="réservé" >réservé</option>
                    <option value="Indisponible" >Indisponible</option>
                    <option value="disponible" >disponible</option>
                </select>
              </div>
            </div>

            <div class="col-md-2 mb-4">
              <div class="form-outline">
                <input type="submit" id="form3Example1n" id="file" name="file" class="form-control form-control-lg" />
              </div>
            </div>
          </div>
        </div>
    <div class="container px-4 px-lg-5 mt-5">
    </form>
            <div class="container px-4 px-lg-5 mt-5">
                <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">







                    <?php

                    // prepare SQL statement to retrieve ads
                    $sql = "SELECT * FROM ouvrage";
                    if(isset($_POST['file'])){
                        $typ = $_POST['type'];
                        $etat = $_POST['etat'];
                        $sition = $_POST['sition'];
                        if($_POST['type'] !=="" && $_POST['etat'] ==="" && $_POST['sition'] ===""){
                        $sql = "SELECT * FROM ouvrage where type_ouvrage='$typ'";
                    }
                    elseif($_POST['type'] !=="" && $_POST['etat'] !=="" && $_POST['sition'] ===""){
                        $sql = "SELECT * FROM ouvrage where type_ouvrage='$typ' and etat_ouvrage='$etat'";
                    }
                    elseif($_POST['type'] !=="" && $_POST['etat'] ==="" && $_POST['sition'] !==""){
                        $sql = "SELECT * FROM ouvrage where type_ouvrage='$typ' and situation='$sition'";
                    }
                    elseif($_POST['type'] ==="" && $_POST['etat'] !=="" && $_POST['sition'] ===""){
                        $sql = "SELECT * FROM ouvrage where etat_ouvrage='$etat'";
                    }
                    elseif($_POST['type'] ==="" && $_POST['etat'] !=="" && $_POST['sition'] !==""){
                        $sql = "SELECT * FROM ouvrage where etat_ouvrage='$etat' and situation='$sition'";
                    }
                    elseif($_POST['type'] ==="" && $_POST['etat'] ==="" && $_POST['sition'] !==""){
                        $sql = "SELECT * FROM ouvrage where situation='$sition'";
                    }
                    elseif($_POST['type'] !=="" && $_POST['etat'] !=="" && $_POST['sition'] !==""){
                        $sql = "SELECT * FROM ouvrage where situation='$sition' and etat_ouvrage='$etat' and type_ouvrage='$typ'";
                    }
                    };


                    $result = $conn->query($sql);
                    // check if there are any ads in the database
                    if ($result->num_rows > 0) {
                        // output data of each row
                        while ($row = $result->fetch_assoc()) {
                            // display the ad information in HTML
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
                                                <div class="bi-star-fill"> <?php echo $row["date_achat"]; ?></div>
                                                <div class="bi-star-fill"></div>

                                            </div>
                                            <!-- Product price-->

                                            <?php echo $row["prix"]; ?>$
                                        </div>
                                    </div>
                                    <!-- Product actions-->
                                    <div class="card-footer p-4 pt-0 border-top-0 bg-transparent d-flex justify-content-center align-content-center">
                                        <div class="text-center"><a class="btn btn-outline-dark mt-auto" data-bs-toggle="modal" data-bs-target="#exampleModal<?php echo $row["id_ouvrage"]; ?>">modifier</a></div>
                                        <div class="text-center"><a class=" ms-2 btn btn-outline-dark mt-auto" data-bs-toggle="modal" data-bs-target="#super<?php echo $row["id_ouvrage"]; ?>">suprimer</a></div>
                                    </div>
                                </div>
                            </div>






                            <!-- Modal -->
                            <div class="modal fade" id="super<?php echo $row["id_ouvrage"]; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Delete</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">

                                            <h2>Are you sure you want to delete this ad ? : </h2>



                                            <form method="post" action="delete.php">


                                                <input type="hidden" name="id" value="<?php echo $row['id_ouvrage']; ?>">
                                                <button type="submit" class="btn btn-danger">Delete</button>



                                            </form>



                                        </div>

                                    </div>
                                </div>
                            </div>



                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal<?php echo $row["id_ouvrage"]; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">modifier annonce</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">


                                            <form method="post" action="update_ad.php" enctype="multipart/form-data">
                                                <div class="form-group">
                                                    <label for="title">Title</label>
                                                    <input type="text" class="form-control" name="title" value="<?php echo $row["titre_ouvrage"]; ?>">
                                                </div>
                                                <div class="form-group">
                                                    <label for="description">Etat</label>
                                                    <textarea class="form-control" name="etat_ouvrage"><?php echo $row["etat_ouvrage"]; ?></textarea>
                                                </div>
                                                <div class="form-group">
                                                    <label for="price">Price</label>
                                                    <input type="text" class="form-control" name="prix" value="<?php echo $row["prix"]; ?>">
                                                </div>
                                                <div class="form-group">
                                                    <label for="price">Type</label>
                                                    <input type="text" class="form-control" name="type_ouvrage" value="<?php echo $row["type_ouvrage"]; ?>">
                                                </div>
                                                <div class="form-group">
                                                    <label for="price">Auteur</label>
                                                    <input type="text" class="form-control" name="auteur_ouvrage" value="<?php echo $row["auteur_ouvrage"]; ?>">
                                                </div>
                                                <div class="form-group">
                                                    <label for="price">Date d'achat</label>
                                                    <input type="date" class="form-control" name="date_achat" value="<?php echo $row["date_achat"]; ?>">
                                                </div>
                                                <div class="form-group">
                                                    <label for="price">Date d'edition</label>
                                                    <input type="date" class="form-control" name="date_edition" value="<?php echo $row["date_edition"]; ?>">
                                                </div>

                                                <div class="form-group">
                                                    <label for="price">Nombre de pages</label>
                                                    <input type="number" class="form-control" name="nombre_pages" value="<?php echo $row["nombre_pages"]; ?>">
                                                </div>


                                                <div class="form-group">
                                                    <label for="price">imag</label>
                                                    <input type="file" id="form3Example1n" id="file" name="file" class="form-control form-control-lg" /><br>
                                                    <input type="hidden" name="img" value="<?php echo  $row['image_ouvrage']; ?>">
                                                    <img src="<?php echo $row["image_ouvrage"]; ?>" height="100px" width="100px">
                                                </div>


                                                <div class="form-group">
                                                    <label for="situation">situation</label>
                                                    <select name="situation" class="form-select form-control form-select-sm">
                                                        <option>Open this select menu</option>
                                                        <option value="disponible" <?php if ($row["situation"] == 'disponible') echo 'selected'; ?>>disponible</option>
                                                        <option value="Indisponible" <?php if ($row["situation"] == 'Indisponible') echo 'selected'; ?>>Indisponible</option>
                                                        <option value="réservé" <?php if ($row["situation"] == 'réservé') echo 'selected'; ?>>réservé</option>
                                                    </select>

                                                </div>

                                                <!-- add other inputs here -->
                                                <input type="hidden" name="id" value="<?php echo  $row['id_ouvrage']; ?>">



                                                <!-- <button type="submit" class="btn btn-primary">Save changes</button> -->
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                    <button type="submit" name="submit" class="btn btn-primary">Save changes</button>
                                                </div>
                                            </form>



                                        </div>

                                    </div>
                                </div>


                            </div>




                <?php
                        }
                    } else {
                        echo "No ads found in the database";
                    }
                } else {
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