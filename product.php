<?php
error_reporting(0);
$conn = mysqli_connect("localhost","root","",'json');
if(mysqli_connect_error())	
{
	echo "connect error";
}
$sql = "select name,prize from products";
$query=mysqli_query($conn , $sql);
$count = mysqli_num_rows($query);

if($count==0){
	$json = array("status" => "Failed", "message" => "No Records Found");
	header("HTTP/1.1 400 OK");
}else {
	while($row=mysqli_fetch_assoc($query)){
		$result[]=$row;
	}
		$json = array("status" => "200", "product details" => $result);
		header("HTTP/1.1 200 OK");
}
header("content-type: application/json");
echo json_encode($json);
?>