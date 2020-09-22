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
if(isset($_POST['action']) && $_POST['action']=="update")
    {
    $user_name=$_POST['user_name'];
    $user_email=$_POST['user_email'];
    $phone_no=$_POST['phone_no'];
    $gender=$_POST['gender'];
    $id=$_POST['id'];


    $data->UpdateUserApplication($user_name,$user_email,$phone_no,$gender,$id);

}
if(isset($_POST['action'])=="Load") //Check value of $_POST["action"] variable value is set to not
{
 //For Load All Data
 if($_POST['action'] == "Load") 
 {
    $data->ShowTestData();

 }
}
if(isset($_GET["cust_id"]))
{
    $id=$_GET['cust_id'];
    $row=$data->editUserApplication($id);
    echo json_encode($row);
}
if(isset($_GET["id"]))
{
    $id=$_GET['id'];
    $data->DeleteTestData($id);
    
}

?>