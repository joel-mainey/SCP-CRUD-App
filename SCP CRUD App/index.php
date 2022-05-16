<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>SCP</title>
  </head>
  <body class="container">
    <?php include "connection.php"; ?>
            
    <div>
        <ul class="nav navbar-dark bg-dark">
            
            <!-- run php loop through table and display item field here -->
            <?php foreach($result as $link): ?>
            
            <li class="nav-item active"><a href="index.php?link='<?php echo $link['item']; ?>'" class="nav-link text-light"><?php echo $link['item']; ?></a></li>
            
            <?php endforeach; ?>
            
            <li class="nav-item active"><a href="form.php" class="nav-link text-light">Add a new SCP entry</a></li>
        </ul>
    </div> 
    
        <div class="card card-body shadow">
            <?php
                if(isset($_GET['link']))
                {
                    $item = trim($_GET['link'], "'");
                    
                    //run sql command to retrieve record base on GET value
                    $record = $connection->query("select * from scps where item ='$item'");
                    
                    //turn record into an associative array
                    $array = $record->fetch_assoc();
                    
                    //variables to hold our update and delete url strings
                    $id = $array['id'];
                    $update = "update.php?update=" . $id;
                    $delete = "connection.php?delete=" . $id;
                    
                    echo "
                    <h2 class='card-title'>{$array['item']}</h2>
                    <h4 class='card-title'>{$array['object']}</h3>
                    <p><img src='{$array['image']}' class='img-fluid'></p>
                    <p class='card-title'>{$array['containment']}</p>
                    <p class='card-text'>{$array['description']}</p>
                    <p>
                        <a href='{$update}' class='btn btn-warning'>Update Record</a>
                        <a href='{$delete}' class='btn btn-danger'>Delete Record</a>
                    </p>
                    ";
                }
                else
                {
                    //default view that the user sees when visiting for the first time
                    echo "
                    <p>Welcome to SCP</p>
                    ";
                }
            ?>
        </div>
    

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
  </body>
</html>