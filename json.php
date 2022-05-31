<?php
session_start();

$conn = new mysqli("localhost", "root", "", "library");


IF(isset($_POST['add'])){
      $name=$_POST['name'];
     $data = "INSERT INTO user (name) VALUES ('$name')";
 
    $db = mysqli_query($conn , $data) or die(mysqli_error());
   header('location:script.html');
}

 
if(isset($_POST['update'])){
      $name1=$_POST['name1'];
      $id=$_POST['id1'];
$sql = "UPDATE user SET name = '$name1' where user_id='$id'";

if ($conn->query($sql) === TRUE) {
 
  header('location:script.html');
   echo "Record updated successfully";
} else {
  echo "Error updating record: " . $conn->error;
}
}
$e=array();
$data = "SELECT * FROM user  ";
                $result = mysqli_query($conn , $data);
                $count=1;
                if($result==TRUE){
                    $view=mysqli_num_rows($result);
                    if($view>0){
                        while($view=mysqli_fetch_assoc($result)){
                             $e["id"]=$view["user_id"];
                             $e["name"]=$view["name"];
                            
                            
                        }
                    }
                }
                ?>
                 
  <?php

   echo json_encode($e); 

