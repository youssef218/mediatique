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
                    <li class="nav-item"><a class="nav-link active" aria-current="page" href="index.php">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="#!">mes reserve</a></li>
                </ul>
                <form class="d-flex" action="dec.php" method="post">
                    <button class="btn btn-outline-dark" type="button">
                    <i class="bi bi-person"></i>
                        profile
                        <span class="badge bg-dark text-white ms-1 rounded-pill">0</span>
                    </button>
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
        <div class="container px-4 px-lg-5 mt-5">
        <h2>reservation en coure  : </h2>
            <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">

             





<?php
               
                // prepare SQL statement to retrieve ads
                $idclient = $_SESSION['iduser'] ;
                $sql = "SELECT * FROM reserve where id_client = '$idclient' and date_retour is null";
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
                                <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                    <div class="text-center"><a class="btn btn-outline-dark mt-auto" data-bs-toggle="modal" data-bs-target="#exampleModal<?php echo $row["id_ouvrage"]; ?>">more</a></div>
                                </div>
                            </div>
                        </div>






                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal<?php echo $row["id_ouvrage"]; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel"><?php echo $row["titre_ouvrage"]; ?></h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <h2>Auteur : <?php echo $row["auteur_ouvrage"]; ?></h2>
                                        <img class="card-img-top" style="height:250px;" src="<?php echo $row["image_ouvrage"]; ?>" alt="..." />
                                        <h3>Prix : <?php echo $row["prix"]; ?></h3>
                                        <h3>Etat : <?php echo $row["etat_ouvrage"]; ?></h3>
                                        <h3>Type : <?php echo $row["type_ouvrage"]; ?></h3>
                                        <h3>Date d'achat : <?php echo $row["date_achat"]; ?></h3>
                                        <h3>Date d'edition : <?php echo $row["date_edition"]; ?></h3>
                                        <h3>Nombre de pages : <?php echo $row["nombre_pages"]; ?></h3>
                                        <h3>Situation : <?php echo $row["situation"]; ?></h3>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <form action="annulerreserve.php" method="post">
                                        <input type="hidden" name="idouvrage" value="<?php echo  $row['id_ouvrage']; ?>">
                                        <input type="hidden" name="idclient" value="<?php echo  $idclient ?>">
                                        <input type="hidden" name="idreserve" value="<?php echo  $rowd["id_reserve"]; ?>">
                                        <input type="submit" name="submit" value="annuler" class="btn btn-outline-dark mt-auto ">
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                       
                       
                       
                       
                       
                       
                       
                       
                       
                       <?php 
                        
                        
                        
                        
                        
                    }
                }
                
            }
                } else {
                    echo "Not found reservation";
                }
                   
            
                ?>


            </div>
        </div>
    </section>






    <section class="py-5">
        <div class="container px-4 px-lg-5 mt-5">
            <h2>Historique reserve  : </h2>
            <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">

             





<?php
               
                // prepare SQL statement to retrieve ads
                $idclient = $_SESSION['iduser'] ;
                $sql = "SELECT * FROM reserve where id_client = '$idclient' and date_retour is not null";
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
                                <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                    <div class="text-center"><a class="btn btn-outline-dark mt-auto" data-bs-toggle="modal" data-bs-target="#exampleModal<?php echo $row["id_ouvrage"]; ?>">more</a></div>
                                </div>
                            </div>
                        </div>






                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal<?php echo $row["id_ouvrage"]; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel"><?php echo $row["titre_ouvrage"]; ?></h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <h2>Auteur : <?php echo $row["auteur_ouvrage"]; ?></h2>
                                        <img class="card-img-top" style="height:250px;" src="<?php echo $row["image_ouvrage"]; ?>" alt="..." />
                                        <h3>Prix : <?php echo $row["prix"]; ?></h3>
                                        <h3>Etat : <?php echo $row["etat_ouvrage"]; ?></h3>
                                        <h3>Type : <?php echo $row["type_ouvrage"]; ?></h3>
                                        <h3>Date d'achat : <?php echo $row["date_achat"]; ?></h3>
                                        <h3>Date d'edition : <?php echo $row["date_edition"]; ?></h3>
                                        <h3>Nombre de pages : <?php echo $row["nombre_pages"]; ?></h3>
                                        <h3>Situation : <?php echo $row["situation"]; ?></h3>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <form action="ajouterannonce.php" method="post">
                                        <input type="hidden" name="id" value="<?php echo  $row['id_ouvrage']; ?>">
                                        <?php if ($row["situation"] == 'disponible') {
                                            $id_client = $_SESSION['iduser'];
                                            $sql = "SELECT * FROM adherant where id_client = '$id_client'";
                                            $result1 = $conn->query($sql);
                                            // check if there are any ads in the database
                                            if ($result1->num_rows > 0) {
                                                // output data of each row
                                                while ($rowd = $result1->fetch_assoc()) {
                                                    if ($rowd['reservation'] < 3) {
                                                        echo '<input type="submit" name="submit" value="réservé" class="btn btn-outline-dark mt-auto ">' ;

                                                    }
                                                    else{
                                                        echo '<a href="mesreserve.php" class=" text-danger">vous max au reserve</a>';
                                                    }
                                                }
                                            }
                                        }
                                        
                                        
                                        
                                         ?>
                                        </form>
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

