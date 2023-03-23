<table class="table table-primary">
        <thead>
          <tr>
            <th scope="col">#id</th>
            <th scope="col">id_client</th>
            <th scope="col">titre</th>
            <th scope="col">description</th>
            <th scope="col">adresse</th>
            <th scope="col">superficie</th>
            <th scope="col">categorie</th>
            <th scope="col">ville</th>
            <th scope="col">type_annonce</th>
            <th scope="col">price</th>
            <th scope="col">vitrin</th>
            <th scope="col">Offer</th>
            <th scope="col">date_publication</th>
            <th scope="col">date_modification</th>
            <th scope="col">modifier</th>
          </tr>
        </thead>
        <tbody>






    <?php
    
    // prepare SQL statement to retrieve ads
    $sql = "SELECT * FROM annonce";
    $result = $conn->query($sql);
    // check if there are any ads in the database
    if ($result->num_rows > 0) {
        // output data of each row
        while ($row = $result->fetch_assoc()) {
            // display the ad information in HTML
            ?>

            <tr>
              <th scope="row"><?php echo $row["id_annonce"]; ?></th>
              <td><?php echo $row["id_client"]; ?></td>
              <td><?php echo $row["titre"]; ?></td>
              <td><?php echo $row["description"]; ?></td>
              <td><?php echo $row["adresse"]; ?></td>
              <td><?php echo $row["superficie"]; ?></td>
              <td><?php echo $row["categorie"]; ?></td>
              <td><?php echo $row["ville"]; ?></td>
              <td><?php echo $row["type_annonce"]; ?></td>
              <td><?php echo $row["price"]; ?></td>
              <td><?php echo $row["vitrin"]; ?></td>
              <td><?php echo $row["premium"]; ?></td>
              <td><?php echo $row["date_publication"]; ?></td>
              <td><?php echo $row["date_modification"]; ?></td>
              <td >
                <div class="d-flex">
              <a href="" type="button" class="btn btn-primary " data-bs-toggle="modal" data-bs-target="#suprimer<?php echo $row['id_annonce']; ?>">
                                Delete
                            </a>
                <button type="button" class="btn btn-primary ms-3" data-bs-toggle="modal" data-bs-target="#exampleModal<?php echo $row['id_annonce']; ?>">
                                modifier
                            </button>
                            </div>
                </td>
            </tr>



            <!-- modal suprimer -->
            <div class="modal fade" id="suprimer<?php echo $row['id_annonce']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        
                    </div>








                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal<?php echo $row['id_annonce']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">


                                    <form method="post" action="update_ad.php">
                                        <div class="form-group">
                                            <label for="title">Title</label>
                                            <input type="text" class="form-control"  name="title" value="<?php echo $row["titre"]; ?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="description">Description</label>
                                            <textarea class="form-control" name="description"><?php echo $row["description"]; ?></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="price">Price</label>
                                            <input type="text" class="form-control"  name="price" value="<?php echo $row["price"]; ?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="price">adresse</label>
                                            <input type="text" class="form-control" name="adresse" value="<?php echo $row["adresse"]; ?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="price">superficie</label>
                                            <input type="text" class="form-control"  name="superficie" value="<?php echo $row["superficie"]; ?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="price">categorie</label>
                                            <input type="text" class="form-control"  name="categorie" value="<?php echo $row["categorie"]; ?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="price">ville</label>
                                            <input type="text" class="form-control"  name="ville" value="<?php echo $row["ville"]; ?>">
                                        </div>


                                        <div class="form-group">
                                            <label for="price">type_annonce</label>
                                            <input type="text" class="form-control"  name="type_annonce" value="<?php echo $row["type_annonce"]; ?>">
                                        </div>


                                        <div class="form-group">
                                            <label for="price">vitrin</label>
                                            <input type="text" class="form-control"  name="vitrin" value="<?php echo $row["vitrin"]; ?>">
                                        </div>


                                        <div class="form-group">
                                            <label for="premium">premium</label>
                                            <select name="premium" class="form-select form-control form-select-sm" >
                                            <option >Open this select menu</option>
                                              <option value="premium" <?php if ($row["premium"] == 'premium') echo 'selected'; ?>>premium</option>
                                              <option value="free" <?php if ($row["premium"] == 'free') echo 'selected'; ?>>free</option>
                                            </select>

                                        </div>

                                        <!-- add other inputs here -->
                                        <input type="hidden" name="id" value="<?php echo  $row['id_annonce']; ?>">



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

    // close the database connection
    $conn->close();
    ?>
       
  </tbody>
</table>