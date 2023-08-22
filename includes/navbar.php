<header class="main-header">
  <nav  class="navbar navbar-static-top">
    <!-- style="background-image: url(images/pallet.jpg);" -->
    <div class="container">
      <!-- Collect the nav links, forms, and other content for toggling -->
     <div class="navbar-header">
         <img src="images/pallet1.png" class="pull-left" alt="Palletcraft" width="50" height="50">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
          <i class="fa fa-bars"></i>
        </button>
      </div>
      <!-- /.navbar-collapse -->
      <!-- Navbar Right Menu -->

    
       <div class="collapse navbar-collapse pull-left" id="navbar-collapse">
        
        <ul class="nav navbar-nav">
         
         
          <li><a href="index.php">HOME</a></li>
          <!-- Products -->
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">PRODUCTS <span class="caret"></span></a>
            <ul class="dropdown-menu" role="menu">
              <?php
             
                $conn = $pdo->open();
                try{
                  $stmt = $conn->prepare("SELECT * FROM category");
                  $stmt->execute();
                  foreach($stmt as $row){
                    echo "
                      <li><a href='category.php?category=".$row['cat_slug']."'>".$row['name']."</a></li>
                    ";                  
                  }
                }
                catch(PDOException $e){
                  echo "There is some problem in connection: " . $e->getMessage();
                }

                $pdo->close();

              ?>
            </ul>
          </li>
    <!--          <?php
                if(isset($_SESSION['user'])){
                  echo "
                     
            <li><a href='order_transact.php'>TRANSACT HISTORY</a></li>
           
                  ";
                }
                else{
                  echo "
                            <li class='dropdown'>
            <a href='login.php' class='dropdown-toggle' data-toggle='dropdown'>TRANSACT HISTORY<span class='caret'></span></a>
           <ul class='dropdown-menu' role='menu'>
              <li><a href='login.php'>Login</a></li>
             
            </ul>
          </li>
                  ";
                }
              ?>
          -->

           <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">CUSTOMIZE<span class="caret"></span></a>
            <ul class="dropdown-menu" role="menu">
              <li><a href="ps_custom.php">Plantstand</a></li>
              <li><a href="chair_custom.php">Chair</a></li>
              <li><a href="table_custom.php">Table</a></li>
            </ul>
          </li>
          <!--  <ul class='dropdown-menu' role='menu'>
              <li><a href='custom_ps_history.php'>Plantstand</a></li>
              <li><a href='custom_chair_history.php'>Chair</a></li>
              <li><a href='custom_table_history.php'>Table</a></li>
            </ul>
          </li>
          <li class='dropdown'> -->
    <?php
                if(isset($_SESSION['user'])){
                  echo "
                     
           
             <li class='dropdown'>
            <a href='#' class='dropdown-toggle' data-toggle='dropdown'>TRANSACTION HISTORY<span class='caret'></span></a>
            <ul class='dropdown-menu' role='menu'>
              <li><a href='order_transact.php'>TRANSACTION HISTORY</a></li>
               <li><a href='custom_ps_history.php'>CUSTOMIZATION HISTORY</a></li>
              
            </ul>
          </li>
           
                  ";
                }
                else{
                  echo "
                            <li class='dropdown'>
            <a href='login.php' class='dropdown-toggle' data-toggle='dropdown'>TRANSACTION HISTORY<span class='caret'></span></a>
           <ul class='dropdown-menu' role='menu'>
              <li><a href='login.php'>Login</a></li>
             
            </ul>
          </li>
                  ";
                }
              ?>
           
           <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">KNOW MORE <span class="caret"></span></a>
            <ul class="dropdown-menu" role="menu">
              <li><a href="ft.php">FACTS & TIPS</a></li>
              <li><a href="about.php">ABOUT US</a></li>
              <li><a href="terms.php">TERMS & SERVICES</a></li>
            </ul>
          </li>
             <form method="POST" class="navbar-form navbar-left" action="search.php">
          <div class="input-group">
              <input type="text" class="form-control" id="navbar-search-input" name="keyword" placeholder="Search Product" required>
          </div>
        </form>
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
          <i class="fa fa-bars"></i>
        </button>
           <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <li class="dropdown messages-menu">
            <!-- Menu toggle button -->
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i style="padding-right:10%;" class="fa fa-shopping-cart"></i>
              <span class="label label-success cart_count"></span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have <span class="cart_count"></span> item(s) in cart</li>
              <li>
                <ul class="menu" id="cart_menu">
                </ul>
              </li>
              <li class="footer"><a href="cart_view.php">Go to Cart</a></li>
            </ul>
          </li>
          <?php
            if(isset($_SESSION['user'])){
              $image = (!empty($user['photo'])) ? 'images/'.$user['photo'] : 'images/profile.jpg';
              echo '
                <li class="dropdown user user-menu">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <img src="'.$image.'" class="user-image" alt="User Image">
                    <span class="hidden-xs">'.$user['firstname'].' '.$user['lastname'].'</span>
                  </a>
                  <ul class="dropdown-menu">
                    <!-- User image -->
                    <li class="user-header">
                      <img src="'.$image.'" class="img-circle" alt="User Image">

                      <p>
                        '.$user['firstname'].' '.$user['lastname'].'
                        <small>Member since '.date('M. Y', strtotime($user['created_on'])).'</small>
                      </p>
                    </li>
                    <li class="user-footer">
                      <div class="pull-left">
                        <a href="profile.php" class="btn btn-default btn-flat" style="border-radius: 8px;">Profile</a>
                      </div>
                      <div class="pull-right">
                        <a href="logout.php" class="btn btn-default btn-flat" style="border-radius: 8px;">Sign out</a>
                      </div>
                    </li>
                  </ul>
                </li>
              ';
            }
            else{
              echo "
                <li><a href='login.php'>LOGIN</a></li>
                <li><a href='signup.php'>SIGNUP</a></li>
              ";
            }
          ?>
        </ul>
      </div>
          
          
        </ul>
       
      </div>
    </div>
  </nav>
</header>