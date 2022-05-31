<?php 
 session_start();

$conn = new mysqli("localhost", "root", "", "library");

if(isset($_GET['view'])){
      $id=$_GET['id1'];
    
$e=array();
$data = "SELECT * FROM user where user_id=$id ";
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
            }  
                ?>
                 
  <?php



   echo json_encode($e); 
    header('location:script.html');

   ?>