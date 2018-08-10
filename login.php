<?php
$conn = mysqli_connect("localhost","root","",'csw');
if(mysqli_connect_error())	
{
	echo "connect error";
}
$data = json_decode(file_get_contents('php://input'), true);
$uname=$data['uname'];
$pass=$data['pass'];
$sql = "select * from csw_admin_login where name='$uname' and password='$pass'";
$query=mysqli_query($conn , $sql);
$count = mysqli_num_rows($query);
$row=mysqli_fetch_assoc($query);
if($count==1){
	$result[]=$row;
$json = array("status" => "Sucess", "message" => "Welcome to cambodia","Login Details" => $result);
header("HTTP/1.1 200 OK");
}else {
$json = array("status" => "Failed", "message" => "No Records Found");
header("HTTP/1.1 400 OK");
}
header("content-type: application/json");
echo json_encode($json);
?>

 	<?php
	/* if($_SERVER['REQUEST_METHOD'] == 'POST'){
	$con = mysqli_connect("localhost","root","","csw");
	logindetails();
	}
	function logindetails(){
	global $con;
	$uname=$_POST['name'];
	$password=$_POST['password'];
	$sql="select * from csw_admin_login where name='$uname' and password='$password'";
	$query = mysqli_query($con , $sql);
	$count = mysqli_num_rows($query);
	if($count>0){
	$row=mysqli_fetch_assoc($query);
	/* $temp_array[]=$row;
	$json = array("Login Details" => $temp_array); */
	/* 	$json = array("status" => "Sucess", "message" => "Welcome to zoin");
	
	} else
	{
	$json = array("status" => "Failed", "message" => "No Records Found");
	}
	header("content-type: application/json");
	echo json_encode($json);
	mysqli_connect($con);
	} */
	?>
