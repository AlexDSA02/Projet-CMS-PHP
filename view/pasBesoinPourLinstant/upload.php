<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr">
  <head>
    <title>Upload d'une image sur le serveur !</title>
  </head>
  <body>
    <!-- Debut du formulaire -->
   <form action="upload.php" method="post" enctype="multipart/form-data">
      Select image to upload:
      <input type="file" name="fileToUpload" id="fileToUpload">
      </br></br>Nom de l'image?
      <input type='text' name="newName" id="newName">
      <input type="submit" value="Upload Image" name="submit">
      </form></br>
    </form>
    <!-- Fin du formulaire -->

  </body>
</html>

<?php
$target_dir = "../img/";
//Récupere l'extension du fichier
$extension=pathinfo($_FILES['fileToUpload']['name'], PATHINFO_EXTENSION);
//Concaténe le nouveau nom et l'extension
$newName= $_POST['newName'] .'.'. $extension;
//Le fichier est donc renommer
$_FILES['fileToUpload']['name']=$newName;
$target_file = $target_dir . basename($newName);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        //echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "Le dossier que vous essayez d'upload n'est pas une image.";
        $uploadOk = 0;
    }
}


// Check if file already exists
if (file_exists($target_file)) {
    echo "Désolé le nom de se dossier existe déja.";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 50000000) {
    echo "Désolé, votre dossier est trop volumineux.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Désolé, seul les fichiers JPG, JPEG, PNG & GIF sont accépté.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "L'upload de votre dossier a échoué.";






// Si tout est ok on essaye de lancé l'upload



} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "L'image ". basename( $_FILES["fileToUpload"]["name"]). " a était upload.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}

?>
