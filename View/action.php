<?php
require '../Model/AdminModel.php';

$data=new AdminModel();
if(isset($_POST['action']) && $_POST['action']=="save"){

    $user_name=$_POST['user_name'];
    $user_email=$_POST['user_email'];
    $phone_no=$_POST['phone_no'];
    $gender=$_POST['gender'];


    $data->InsertEntApp($user_name,$user_email,$phone_no,$gender);

}
if(isset($_POST["action"])) //Check value of $_POST["action"] variable value is set to not
{
 //For Load All Data
 if($_POST["action"] == "Load") 
 {
    $data->ShowTestData();

 }
}

?>