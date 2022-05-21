<?php
$conn = mysqli_connect('localhost', 'root', '','tailorsoft');
if(isset($_POST["adminsubmit"]))
 {
$name = $_POST["username"]; 
        $password = $_POST["userpassword"];

// $con = mysqli_connect('localhost', 'database_user', 'database_password','database');

        $select1 = "SELECT password FROM adminlogin WHERE username = '".$name."'";

        $result1=$conn->query($select1);
        $row1=$result1->fetch_assoc();

        $select2 = "SELECT username FROM adminlogin WHERE password = '".$password."'";

        $result2=$conn->query($select2);
        $row2=$result2->fetch_assoc();


        if($name == $row2["username"] && $password == $row1["password"]) 
        { 
            include 'Admin.html';

        }
        else
        {
            echo'The username or password are incorrect!';
        }
}

// database connection code
if(isset($_POST['adminsignup']))
{
// $con = mysqli_connect('localhost', 'database_user', 'database_password','database');


// get the post records

$txtName = $_POST['username'];
$txtEmail = $_POST['useremail'];
$txtPassword = $_POST['userpassword'];

// database insert SQL code
$sql = "INSERT INTO `adminlogin` ( `username` , `email` , `password`) VALUES ( '$txtName', '$txtEmail',  '$txtPassword')";

// insert in database 
$rs = mysqli_query($conn, $sql);
if($rs)
{
	echo "Contact Records Inserted";
}
else
{
	echo "Are you a genuine visitor?";
	
}
}
// database connection code
if(isset($_POST['addemp']))
{
// $con = mysqli_connect('localhost', 'database_user', 'database_password','database');


// get the post records

$txtName = $_POST['empname'];
$txtEmail = $_POST['empemail'];
$txtNum = $_POST['empnum'];
$txtPassword = $_POST['emppass'];
$txtProject = $_POST['empproject'];
$txtManager = $_POST['empmanager'];
// database insert SQL code
$sql = "INSERT INTO `addemp` ( `name` , `email` , `phoneno` ,`password` ,   `project` , `manager` ) VALUES ( '$txtName', '$txtEmail', '$txtNum',  '$txtPassword' , '$txtProject' , '$txtManager')";

// insert in database 
$rs = mysqli_query($conn, $sql);
if($rs)
{
	echo "Contact Records Inserted";
}

else
{
	echo "Thik se kr be....";
	
}
}
if(isset($_POST["emplogin"],))
 {
        $name = $_POST["empname"]; 
        $password = $_POST["emppass"];

// $con = mysqli_connect('localhost', 'database_user', 'database_password','database');
$conn = mysqli_connect('localhost', 'root', '','tailorsoft');

        $select1 = "SELECT password FROM addemp WHERE name = '".$name."'";

        $result1=$conn->query($select1);
        $row1=$result1->fetch_assoc();
        
        $select2 = "SELECT name FROM addemp WHERE password = '".$password."'";

        $result2=$conn->query($select2);
        $row2=$result2->fetch_assoc();


        if($name == $row2["name"] && $password == $row1["password"]) 
        { 
            include 'employee.html';

        }
        else
        {
            echo'The username or password are incorrect!';
        }
}

?>