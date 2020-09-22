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
        $sql="INSERT INTO `tbl_test`(`user_name`,`phone_no`,`user_email`,`gender`)VALUES('$user_name','$phone_no','$user_email','$gender')";
        $stmt = $this->con->prepare($sql);
        if($stmt->execute())
        {
                $result=$stmt->rowCount();
                if($result>0) 
                {
                    echo "Sucessfully Inserted";
                }
                else
                {
                    echo "Insertion Failed";
                }
        }
        else
        {
            echo "Fail";
        }
        return true;

    }
    public function UpdateUserApplication($user_name,$user_email,$phone_no,$gender,$id)
    {
        $sql="UPDATE `tbl_test` SET `user_name`='$user_name',`user_email`='$user_email',`phone_no`='$phone_no',`gender`='$gender' WHERE `id`='$id'";
        $stmt = $this->con->prepare($sql);
        if($stmt->execute())
        {
                $rowCount=$stmt->rowCount();
                if($rowCount>0)
                {
                    echo "Updated";
                }
                else
                {
                    echo "You Will be Not Change";
                }
            }
        else
        {
           echo "Somthing Wrong Plz Check"; 
        }
        return true;
    }

    
    public function DeleteTestData($id)
    {
        $sql="DELETE FROM `tbl_test` WHERE id='$id'";
        $stmtt = $this->con->prepare($sql);
        if($stmtt->execute())
        {
            $result=$stmtt->rowCount();
            if($result>0)
            {
                echo "Deleted Sucessfully";

            }
            else
            {
                echo "Deleted Failed";

            }
        } 
        else
        {
            echo "Something Wrong";
        } 
    
        return true;

    }
    public function editUserApplication($id)
    {
        $sql="SELECT * FROM `tbl_test` where id='$id'";
        $stmt = $this->con->prepare($sql);
        $stmt->execute(['id'=>$id]);
        $result=$stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
   
    }
    public function ShowTestData()
    {
        //$data=array();
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
            <td>'.$row["id"].'</td>
             <td>'.$row["user_name"].'</td>
             <td>'.$row["user_email"].'</td>
             <td>'.$row["phone_no"].'</td>
             <td>'.$row["gender"].'</td>

             <td><button   type="button" id="'.$row["id"].'" class="btn btn-warning btn-xs editbtn">Update</button></td>
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