<?php
    include 'includes/session.php';
if(!empty($_GET['id'])){
    
 
    
    //Get image data from database
    $result = $conn->query("SELECT image FROM images WHERE id = {$_GET['id']}");
    
    if($result->num_rows > 0){
        $imgData = $result->fetch_assoc();
        
        //Render image
        header("Content-type: image/jpg"); 
        echo $imgData['image']; 
    }else{
        //do nothing
    }
}
?>
