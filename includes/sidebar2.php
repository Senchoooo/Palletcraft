<div class="row">
	<div class="box box-solid">
	  	<div class="box-header with-border">
	    	<h3 class="box-title"><b>ABOUT RUSSEL</b></h3>
	  	</div>
	  	<div class="box-body">
	   <?php
                    $conn = $pdo->open();

                    try{
                      $now = date('Y-m-d');
                      $stmt = $conn->prepare("SELECT * FROM system_info WHERE id=:id");
                      $stmt->execute(['id'=>6]);
                      foreach($stmt as $row){
                   
                    		echo "
	       					
                  <td>".$row['description']."</td>


	       						";

                    }
                }
                    catch(PDOException $e){
                      echo $e->getMessage();
                    }

                    $pdo->close();
                  ?>
	    	
	  	</div>
	</div>
</div>

<div class="row">
	<div class="box box-solid">
	  	<div class="box-header with-border">
	    	<h3 class="box-title"><b>Contact Us</b></h3>
	  	</div>
	  	<div class="box-body">
	    	 <?php
                    $conn = $pdo->open();

                    try{
                      $now = date('Y-m-d');
                      $stmt = $conn->prepare("SELECT * FROM system_info WHERE id=:id");
                      $stmt->execute(['id'=>4]);
                      foreach($stmt as $row){
                   
                    		echo "
	       					
                  <td>".$row['description']."</td>


	       						";

                    }
                }
                    catch(PDOException $e){
                      echo $e->getMessage();
                    }

                    $pdo->close();
                  ?>
	    	
	  	</div>
	</div>
</div>


<div class="row">
	<div class='box box-solid'>
	  	<div class='box-header with-border'>
	    	<h3 class='box-title'><b>Follow us on Social Media</b></h3>
	  	</div>
	  	<div class='box-body'>
	  		<a href="https://www.facebook.com/profile.php?id=100085891585795" target="_blank" class="btn btn-social-icon btn-facebook"><i class="fa fa-facebook"></i></a>
	    <!-- 	<a href="https://www.facebook.com/profile.php?id=100085891585795" class="btn btn-social-icon btn-facebook"><i class="fa fa-facebook"></i></a> -->
	    	
	  	</div>
	</div>
</div>