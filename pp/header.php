    <div id="message" style="background-color: red; text-align: center; width: 80%; margin-left: 10%; margin-bottom:5px;"></div>
    
    <nav id="load" class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <a class="navbar-brand" href="#">
            Food Tracker
          </a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li class='<?php echo !empty($index) ? "active":"" ?>'>
              <a href="<?php echo 'index.php' ?>">
                Days
              </a>
            </li>
            <li class='<?php echo !empty($addf) ? "active":"" ?>'>
              <a href="add_food.php">
                Add Food Item
              </a>
            </li>
            <li class='<?php echo !empty($login) ? "active":"" ?>'>
              <a  href="logout.php">Logout
              </a>
            </li>
            <li>
              <a id='isconected'><?php echo !empty($_SESSION['fullname']) ? $_SESSION['fullname'] : 'NOT CONNECTED!' ?></a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
