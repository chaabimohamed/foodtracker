<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Food Tracker | Day Details</title>
    <!-- Bootstrap core CSS -->
    <link href="bootstrap/bootstrap.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="bootstrap/theme.css" rel="stylesheet">
  </head>
  <body>
    <?php  
    
    require "header.php" ;
    require "config.php";
    $iduser=$_SESSION['id'];
    $dateid = $_GET['id'];

    $conn = new mysqli(constant('host'),constant('username'),constant('password'),constant('db')) or die('error');
    if (!empty($iduser)){
        $sql = "SELECT * FROM food WHERE iduser=$iduser;";
        $food_date ="SELECT * FROM food_date WHERE log_date_id=$dateid;";
        $res = $conn->query($sql);
        $fres = $conn->query($food_date);

    }
    else {
      $res=array();
    };


            $protein = 0;
            $carbohydrates=0; 
            $fat = 0;
            $calories=0;
              foreach ($fres as $v) {
                foreach ($res as $e) {
                    if($v['food_id']==$e['id']){
                        $protein += $e['protein'];
                        $carbohydrates+=$e['carbohydrates']; 
                        $fat += $e['fat'];
                        $calories+=$e['calories'];
                    }
                }
              };



    $url = "day_back.php?date=".$_GET['date']."&dateid=".$dateid;

    ?>
    

    <div class="container theme-showcase col-sm-6 col-sm-offset-3" role="main">
      <div class="row">
        <div>
          <div class="panel panel-primary">
            <div class="panel-heading">
              <h3 class="panel-title"><?php echo $_GET["date"]?></h3>
            </div>
            <div class="panel-body">
              <form method="POST" action="<?php echo $url?>">
                <div class="form-group">
                  <select class="form-control" name="select">
                  <option>Select</option>
                  <?php
                  foreach ($res as $e) {
                    echo "
                      <option >".$e['name']."</option>
                      ";
                    };
                  
            
                  ?>
                    
                  </select>
                </div>
                <button type="submit" class="btn btn-primary">Add</button>
              </form>
 
                <div class="page-header">
                <ul class="nav nav-pills" role="tablist">
                  <li class="active"><a>Total</a></li>
                  <li><a>Protein: <span class="badge"><?php echo $protein ?>
                  </span></a></li>
                  <li><a>Carbohydates: <span class="badge"><?php echo $carbohydrates ?>
                  </span></a></li>
                  <li><a>Fat: <span class="badge"><?php echo $fat ?>
                  </span></a></li>
                  <li><a>Calories: <span class="badge"><?php echo $calories ?>
                  </span></a></li>
                </ul>
              </div>
            <div class="page-header"></div>
            <?php
            $date = $_GET['date'];

            $urld = 'deletefoodday.php?date='.$date.'&idd='.$dateid.'&idf=';

              foreach ($fres as $v) {
                foreach ($res as $e) {
                    if($v['food_id']==$e['id']){
                      echo "<div class='panel-body'>
                      <ul class='nav nav-pills' role='tablist'>
                        <li class='active'><a>".$e['name']."</a></li>
                        <li><a>Protein: <span class='badge'>".$e['protein']."</span></a></li>
                        <li><a>Carbohydates: <span class='badge'>".$e['carbohydrates']."</span></a></li>
                        <li><a>Fat: <span class='badge'>".$e['fat']."</span></a></li>
                        <li><a>Calories: <span class='badge'>".$e['calories']."</span></a></li>
                        <li><a href=\"$urld".$v["id"]."\" type=\"button\" class=\"btn btn-danger  \" >Delete</a></li>
                      </ul>
                    </div>";

                    }
                }
              };

            ?>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>