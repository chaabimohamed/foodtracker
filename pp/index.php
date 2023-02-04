<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Food Tracker | Home</title>

    <!-- Bootstrap core CSS -->
    <link href="bootstrap/bootstrap.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="bootstrap/theme.css" rel="stylesheet">

  </head>

  <body>
    <?php
      $index = true;
      require "header.php";
      
    ?>

    
  <div class="container theme-showcase col-sm-6 col-sm-offset-3" role="main">

      <div class="row">
        <div>
          <form method="POST" action="home_back.php">
            <div class="form-group">
              <label for="new-day">New Day</label>
              <input type="date" class="form-control" id="new-day" name="date">
            </div>

            <button type="submit" class="btn btn-primary">Add</button>
          </form>

          <div class="page-header"></div>


          <?php
          require "config.php" ;
          $iduser=$_SESSION['id'];

          $conn = new mysqli(constant('host'),constant('username'),constant('password'),constant('db')) or die('error');

          if (!empty($iduser)){
            $sql = "SELECT * FROM log_date WHERE iduser=$iduser;";
            $res = $conn->query($sql);
            foreach ($res as $e){
              $dateE = $e['entry_date'];
              $sqlm = "SELECT * from food f INNER JOIN food_date fd on fd.food_id = f.id AND fd.log_date_id=".$e['id'].";";
              $m = $conn->query($sqlm);
              $p=0;
              $cd=0;
              $f=0;
              $a=0;
            foreach($m as $k){
                #echo $k['name'];
                $p+=$k['protein'];
                $cd+=$k['carbohydrates'];
                $f+=$k['fat'];
                $a+=$k['calories'];
            }

            echo "<div class=\"panel panel-primary\">
                    <div class=\"panel-heading\">
                    <h3 class=\"panel-title\">".$e['entry_date']."</h3>
                    </div>
                    <div class=\"panel-body\">
                    <ul class=\"nav nav-pills\" role=\"tablist\">
                      <li><a>Protein: <span class=\"badge\">".$p."</span></a></li>
                      <li><a>Carbohydates: <span class=\"badge\">".$cd."</span></a></li>
                      <li><a>Fat: <span class=\"badge\">".$f."</span></a></li>
                      <li><a>Calories: <span class=\"badge\">".$a."</span></a></li>
                      <li><a href=\"day.php?date=".$e['entry_date']."&id=".$e["id"]."\" type=\"button\" class=\"btn btn-link\">View Detail</a></li>
                      <li><a href=\"deletedate.php?id=".$e["id"]."\" type=\"button\" class=\"btn btn-danger  \" >Delete</a></li>
                  
                    </ul>
                  </div>
                  </div>" ;





            }
          }
          else {
            $res=array();
          }            
          ?>
        </div>
      </div>

    </div>
    <script src="js/message.js"></script>

  </body>

</html>