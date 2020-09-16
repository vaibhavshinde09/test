<?php
require 'dbconfig.php';

class AdminModel{
    private $db;
    private $con;

    public function __construct()
    {
        $this->db = new DbConnect;
		$this->con =$this->db->connect();

    }
    public function InsertEntApp($user_name,$user_email,$phone_no,$gender)
    {
        $sql="INSERT INTO `tbl_test`(`user_name`,`phone_no`,`user_email`,`gender`)VALUES('$user_name','$user_email','$phone_no','$gender')";
        $stmt = $this->con->prepare($sql);
        if($stmt->execute())
        {
            echo "Sucessfully Inserted";
        }
        else
        {
           echo "Insertion Failed";
        }
        return true;


    }
    public function ShowTestData()
    {
        $data=array();
        $sql="SELECT * FROM `tbl_test`";
        $stmt = $this->con->prepare($sql);
        $stmt->execute();
        $result=$stmt->fetchAll(PDO::FETCH_ASSOC);
       // $data[]=$result;
        $output = '';
        $output .= '
                    <table class="table table-bordered">
                <tr>
                    <th width="40%">Name</th>
                    <th width="40%">Email</th>
                    <th width="40%">Mobile No.</th>
                    <th width="40%">Gender.</th>
                    <th width="10%">Update</th>
                    <th width="10%">Delete</th>
                </tr>
                ';

        if($stmt->rowCount()>0)
        {
           foreach($result as $row)
           {
            $output .= '
            <tr>
             <td>'.$row["user_name"].'</td>
             <td>'.$row["user_email"].'</td>
             <td>'.$row["phone_no"].'</td>
             <td>'.$row["gender"].'</td>

             <td><button type="button" id="'.$row["id"].'" class="btn btn-warning btn-xs update">Update</button></td>
             <td><button type="button" id="'.$row["id"].'" class="btn btn-danger btn-xs delete">Delete</button></td>
            </tr>
            ';
        
           }
        }
        else
        {
            $output .= '
            <tr>
             <td align="center">Data not Found</td>
            </tr>
           ';
        
        }
        $output .= '</table>';
        echo $output;
      
    }
        

        //$data=array();
    //     $sql="SELECT * FROM `tbl_test`";
    //     $stmt = $this->con->prepare($sql);
    //     $stmt->execute();
    //     $result=$stmt->fetchAll(PDO::FETCH_ASSOC);
    //     $data = (object) [];
    //     $array = array();

    //   //  $data[]=$result;
    //     foreach($result as $row)
    //     { 
    //         $data = (object) [];
    //         $data->user_name=$row['user_name'];
    //         $data->user_email=$row['user_email'];
    //         $data->phone_no=$row['phone_no'];
    //         $data->gender=$row['gender'];
    //         array_push($array, $data);

    //     }
    //     return $data;


  
  
}
$ob=new AdminModel();

//print_r($ob->ShowTestData());
?>