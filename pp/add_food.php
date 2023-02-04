<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Food Tracker | Add Food</title>
   
    <!-- Bootstrap core CSS -->
    <link href="bootstrap/bootstrap.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="bootstrap/theme.css" rel="stylesheet">

  </head>

  <body>

    <?php
      $addf = true;  
      require "config.php" ;
      require "header.php";
      $iduser=$_SESSION['id'];
      $conn = new mysqli(constant('host'),constant('username'),constant('password'),constant('db')) or die('error');
      if (!empty($iduser)){
        $sql = "SELECT * FROM food WHERE iduser=$iduser;";    
        $res = $conn->query($sql);
      }
      else {
        $res=array();
      }
      
    ?>

    <div class="container theme-showcase col-sm-6 col-sm-offset-3" role="main">

      <div class="row">
        <div>

          <div class="panel panel-primary" >

            <div class="panel-heading">
              <h3 class="panel-title">Foods</h3>
            </div>

            <div class="panel-body">

              <form method="POST" action="add_food_back.php" name="f">
                <div class="form-group">
                  <label for="food-name">Food Name</label>
                  <input type="text" class="form-control" id="food-name" name="fn" placeholder="Food Name">
                </div>
                <div class="form-group">
                  <label for="protein">Protein</label>
                  <input type="number" class="form-control" id="protein"  name="fp" placeholder="Protein">
                </div>
                <div class="form-group">
                  <label for="carbohydrates">Carbohydrates</label>
                  <input type="number" class="form-control" id="carbohydrates"  name="fc" placeholder="Carbohydrates">
                </div>
                <div class="form-group">
                  <label for="fat">Fat</label>
                  <input type="number" class="form-control" id="fat"  name="ff" placeholder="Fat">
                </div>
                <div class="form-group">
                  <label for="cat">Calories</label>
                  <input type="number" class="form-control" id="calories"  name="fcc" placeholder="Calories">
                </div>
                <button type="submit" class="btn btn-primary">Add</button>
              </form>

              <div class="page-header"></div>
            
            <?php
              foreach($res as $rs) {
                  echo "<ul></ul><ul class='nav nav-pills' role='tablist' id='ul' >
                  <li class='active'><a>".$rs['name']."</a></li>
                  <li><a>Protein: <span class='badge'>".$rs['protein']."</span></a></li>
                  <li><a>Carbohydrates: <span class='badge'>".$rs['carbohydrates']."</span></a></li>
                  <li><a>Fat: <span class='badge'>".$rs['fat']."</span></a></li>
                  <li><a>Calories: <span class='badge'>".$rs['carbohydrates']*$rs['fat']."</span></a></li>
                  <li><a href=\"food_delete.php?id=".$rs["id"]."\" type=\"button\" class=\"btn btn-danger  \" >Delete</a></li>
                  </ul>
                  ";
           }
            ?>
          </div>
          </div>
        </div>
      </div>

    </div>    
  </body>


</html>