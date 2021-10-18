<form action="index.php" method="POST" enctype="multipart/form-data">
    Añadir imagen: <input name="archivo" id="archivo" type="file" />
    <input type="submit" name="subir" value="Subir imagen" />
  </form>
  <?php
  error_reporting(0);
  ?>
  <?php
  $msg = "";

  // If upload button is clicked ...
  if (isset($_POST['subir'])) {

    $filename = $_FILES["archivo"]["name"];
    $tempname = $_FILES["archivo"]["tmp_name"];
    $folder = "image/" . $filename;

    $db = mysqli_connect("localhost", "root", "", "tfg");

    // Get all the submitted data from the form
    $sql = "INSERT INTO imagen (image) VALUES ('$filename')";

    // Execute query
    mysqli_query($db, $sql);

    // Now let's move the uploaded image into the folder: image
    if (move_uploaded_file($tempname, $folder)) {
      $msg = "Image uploaded successfully";
    } else {
      $msg = "Failed to upload image";
    }
  }
  $result = mysqli_query($db, "SELECT * FROM imagen");
  while ($data = mysqli_fetch_array($result)) {
  ?>
  <section id="galeria" class="container">
      <div class="text-center pt-5">
          <h1>Galeria</h1>
          <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Sed consectetur optio voluptas ipsum adipisci reprehenderit harum qui et doloremque eligendi. Similique ea eveniet iure ratione ad esse ab, delectus aliquam!</p>
      </div>
<div class="row">
 
    <div class="col-lg-4 col-md-6 col-sm">
    <img src="image/<?php echo $data['image']; ?>" alt="Galeria imagen">
    </div>
  <?php
  }
  ?>
  </div>
    </section>