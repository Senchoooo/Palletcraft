<?php include 'includes/session.php'; ?>
<?php include 'includes/header.php'; ?>


<!DOCTYPE html>
<html>
<head>
<style>
* {
  box-sizing: border-box;
}

.column {
  float: left;
  width: 33.33%;
  padding: 5px;
}

/* Clearfix (clear floats) */
.row::after {
  content: "";
  clear: both;
  display: table;
}
</style>
</head>
<body class="hold-transition skin-blue layout-top-nav">
<div class="wrapper">

	<?php include 'includes/navbar.php'; ?>
	 
	  <div class="content-wrapper" style="background-color: #ebe9e8;">
	    <div class="container" >

	      <!-- Main content -->
	      <section class="content" >
	        <div class="row">
	        	<div class="col-sm-9">
	         <h2>Logos & Signages Ideas for you</h2>
<p>Take risk</p>

<div class="row">
  <div class="column">
    <img src="images/1.png" alt="Snow" style="width:100%">
  </div>
  <div class="column">
    <img src="images/4.png" alt="Forest" style="width:100%">
  </div>
  <div class="column">
    <img src="images/3.png" alt="Mountains" style="width:100%">
  </div>
</div>

	        	</div>

	        	<div class="col-sm-3">
	        		<?php include 'includes/sidebar.php'; ?>
	        	</div>
	        </div>
	        	<div class="box box-solid">
	  	<div class="box-header with-border">
	    	<h3 class="box-title"><b>For your own design</b></h3>
	  	</div>
	  	<div class="box-body">
	  		<form action="upload.php" method="POST" enctype="multipart/form-data">
	    	  <div class="form-group">
                    <label for="photo" class="col-sm-3 control-label">Photo</label>

                    <div class="col-sm-9">
                      <input type="file" id="photo" name="photo">
                      <button type="upload" class="btn btn-success btn-flat" name="submit" value="upload"><i class="fa fa-check-square-o"></i> Upload</button>
                    </div>
                </div>
                </form>
	    	
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