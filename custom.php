<?php include 'includes/session.php'; ?>
<?php include 'includes/header.php'; ?>




<body class="hold-transition skin-blue layout-top-nav">
<div class="wrapper">

	<?php include 'includes/navbar.php'; ?>
	 
	  <div class="content-wrapper" style="background-color: #ebe9e8;">
	    <div class="container" >

	    	 <form class="form-horizontal" action="custom-file.php" enctype="multipart/form-data" method="GET">

                        

                     

	      <!-- Main content -->
	      <section class="content" >
	        <div class="row">
	        	<div class="col-sm-9">
	        		<h1><center><strong>Customization</strong></center></h1> 
	        		<h3><center><strong>Put the details for your Logo</strong></center></h3>
	        		
	        		
	        		
					
					
	        		
					
                            <h4><strong>ADD YOUR BRAND NAME </strong></h4>

                            <input type="text" name="bname" placeholder="I.e PALLETcraft" class="form-control">

                            <h4><strong>ADD YOUR SLOGAN</strong></h4>

                            <input type="text" name="slogan" placeholder="I.e No man" class="form-control">
                            <h4><strong>TEXT COLOR</strong></h4>

                            <label for="favcolor">Select your preferred color:</label>
                            <input type="color" id="favcolor" name="favcolor" value="#ff0000"><br><br>

                            <h4><strong>ADD YOUR BACKGROUND IMAGE</strong></h4>

                            <input type="text" name="bg" placeholder="I.e url" class="form-control">

                        </div>
                        <div class="form-group col-md-12">
                            <input style="   top:50%;
    background-color:black;
    color: #fff;
    border:none; 
    border-radius:10px; 
    padding:15px;
    min-height:30px; 
    min-width: 100px;" type="submit" name="ad" class="btn btn-primary pull-right" value="Save">

                        </div>

                            <div class="form-group">
                                 



                   



                    <div class="col-sm-9">
                        
                                  <h4><strong>For your own design</strong></h4> 
                              <h4><strong><a href="#">Click here to upload your own design</a></strong></h4> 
                                
                           
                        </div>
                       
                     

                    </div>
                </div>

                        </form>

                    
                         <?php
                    error_reporting(0);
                    if (isset($_POST['add'])) {

                        include 'includes/session.php';


                        $id = $_POST['id'];
                        $firstname = $_POST['firstname'];
                        $lastname = $_POST['lastname'];
                        $email = $_POST['email'];
                        $password = $_POST['password'];
                        $address = $_POST['address'];
                        $contact = $_POST['contact'];
                        

                        $photo = $_POST['photo'];
                        $name = $_FILES['photo']['name'];


                        $size = $_FILES['photo']['size'];
                        $type = $_FILES['photo']['type'];
                        $temp = $_FILES['photo']['tmp_name'];


                        move_uploaded_file($temp, "files/" . $name);
                        if ($name != "") {
                            mysqli_query($conn, "UPDATE users SET firstname='$firstname', lastname='$lastname', email='$email', password='$password', address='$address', contact='$contact',image='$name' WHERE id='$id'");

                        } else {
                            mysqli_query($conn, "UPDATE users SET firstname='$firstname', lastname='$lastname', email='$email', password='$password', address='$address', contact='$contact' WHERE id='$id'");


                        }

                        echo "<script type='text/javascript'>
                             alert('Successfully Updated');</script>";
                        echo "<script>document.location='profile.php'</script>";


                    }

                    ?>

					
			
			
	        		
	        		

	        	</div>
	        	
	        </div>
	      </section>
	     
	    </div>
	  </div>
  
  	<?php include 'includes/footer.php'; ?>
</div>

<?php include 'includes/scripts.php'; ?>
</body>
</html>