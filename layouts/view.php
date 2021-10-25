<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>galeryImages</title>
  </head>
  <?php
$usuario = $_SESSION['username'];
  ?>
  <body>


    <div class="container">
      <div class="card-columns">
        <?php
          
        
        
          $con = mysqli_connect("localhost", "root", "", "tfg");
          
          $query = "SELECT * FROM imagenes where email='" . $usuario . "';";
          $res = mysqli_query($con, $query);
          $row = mysqli_fetch_assoc($res);
        if(!empty($row)){
          foreach($row as $rows){
        ?>
        <div class="card" data-toggle="modal" 
          data-target="#mdl<?php echo $rows['id'];?>">
          <img data-toggle="modal" data-target="#modal1" class="img-fluid z-depth-1" 
          src="data:<?php echo $rows['tipo']; ?>;base64,<?php echo  base64_encode($rows['imagen']); ?>" 
          data-target="#indicators" data-slide-to="0" alt="" />
          <div class='p-3'>
            
            <button class="btn btn-info float-right mb-3">View</button>
          </div>
        </div>
        <?php include("modal.php");?>
      <?php }  } ?>    
      </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>