<?php
 
  if(isset($_POST['deleteSchool'])){
    $schoolID = $_POST['schoolID'];
    
    require('../reusables/connect.php');

    
    $query = "DELETE FROM `schools` WHERE `id` = '$schoolID'";


    $school = mysqli_query($connect, $query);

    if($school){
      header("Location: ../index.php");
    }else{
      echo "There was an error adding the school: " . mysqli_error($connect); 
    }

  }
