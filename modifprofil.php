<?php

session_start();
if (isset($_POST['submit'])) {
    require_once('conexion.php');
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
  $password2 = $_POST['pass1'];
  $password3 = $_POST['ancien'];
    $id = $_SESSION['iduser'];
if(!empty($password1) && !empty($password) && $password == $password1 && $password2==$password3 )

{

    // echo $username.'-------';
    // echo $prenom_client.'-------' ;
    // echo $nom_client.'-------' ;
    // echo $adresse_client .'-------';
    // echo $email_client .'-------';
    // echo $tele_client .'-------';
    // echo $cin_client .'-------';
    // echo $naissance_client .'-------';
    // echo $type_client.'-------' ;
    // echo $password .'-------';
    // echo $password2 .'-------';
    // echo $password3 .'-------';
    // echo $password1 ;


    if(!empty($username) && !empty($prenom_client) &&!empty($nom_client) &&!empty($adresse_client) &&!empty($email_client) &&!empty($tele_client) &&!empty($cin_client) &&!empty($naissance_client) &&!empty($type_client) &&!empty($password2) ){
$sql = "UPDATE adherant SET username='$username', password='$password', prenom_client='$prenom_client', nom_client='$nom_client', adresse_client='$adresse_client', email_client='$email_client', tele_client='$tele_client', cin_client='$cin_client', naissance_client='$naissance_client', type_client='$type_client' where id_client='$id' ";
        if ($conn->query($sql) === TRUE) {
          header("Location: index.php");
       
    }
     
      } 
}elseif( empty($password1) && empty($password)  && $password2==$password3)

{
   

    if(!empty($username) && !empty($prenom_client) &&!empty($nom_client) &&!empty($adresse_client) &&!empty($email_client) &&!empty($tele_client) &&!empty($cin_client) &&!empty($naissance_client) &&!empty($type_client) &&!empty($password2) ){
$sql = "UPDATE adherant SET username='$username', password='$password2', prenom_client='$prenom_client', nom_client='$nom_client', adresse_client='$adresse_client', email_client='$email_client', tele_client='$tele_client', cin_client='$cin_client', naissance_client='$naissance_client', type_client='$type_client' where id_client ='$id' ";
        if ($conn->query($sql) === TRUE) {
          header("Location: index.php");
    }
     
      } 
}


 
mysqli_close($conn);
  

}
;



if (isset($_POST['submitadmin'])) {
    require_once('conexion.php');
    $prenom_gerant = $_POST['prenom_gerant'];
    $nom_gerant = $_POST['nom_gerant'];
    $email_gerant = $_POST['email_gerant'];
    $id = $_SESSION['iduser'];
    $password = $_POST['pass'];
    $password1 = $_POST['pass2'];
    $password2 = $_POST['pass1'];
    $password3 = $_POST['ancien'];
  
  if(!empty($password) && !empty($password1)  && $password == $password1 && $password2==$password3 )
  
  {
  
      if(!empty($prenom_gerant) && !empty($nom_gerant) &&!empty($email_gerant) &&!empty($password2) ){
  $sql = "UPDATE gerant SET nom_gerant='$nom_gerant', prenom_gerant= '$prenom_gerant' , email_gerant = '$email_gerant' , password_gerant ='$password'  where id_gerant ='$id'";
          if ($conn->query($sql) === TRUE) {
            header("Location: admin.php");
      }
       
        } 
  }
  elseif( (empty($password) && empty($password1) ) || $password2==$password3 ){
    if(!empty($prenom_gerant) && !empty($nom_gerant) &&!empty($email_gerant) &&!empty($password2) ){
        $sql = "UPDATE gerant SET nom_gerant='$nom_gerant', prenom_gerant= '$prenom_gerant' , email_gerant = '$email_gerant' , password_gerant ='$password2'  where id_gerant ='$id'";
                if ($conn->query($sql) === TRUE) {
                  header("Location: admin.php");
            }
             
              } 

  }
  
  
   
    
  mysqli_close($conn);
  
  }
  ;
?>