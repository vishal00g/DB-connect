<?php
$uname=$_POST['uname'];
$upswd=$_POST['upswd'];
if(!empty($uname) && !empty($upswd))
{
$host="localhost";
$dbusername="root";
$dbpassword="";
$dbname="vishal";
$conn=new mysqli($host, $dbusername, $dbpassword, $dbname);
if(mysqli_connect_error())
{
die('ConnectError('.mysqli_connect_errno().')' .mysqli_connect_error());
}
else
{
$SELECT="SELECT uname1 From register where uname1=? limit1"
$stmt=$conn->prepare($SELECT);
$stmt->bind_param("s",$uname);
$stmt->execute();
$stmt->bind_result($name);
$stmt->store_result();
$rnum=$stmt->num_rows;
if($rnum==0)
{
$stmt->close();
echo "Username Not Found<br>";
}
else
{
echo "Username Found<br>";
$SELECT="SELECT upswd1 From register where uname1=?";
$stmt=$conn->prepare($SELECT);
$stmt->bind_param("s",$uname);
$stmt->execute();
$stmt->bind_result($pswd);
$stmt->fetch();
echo "<br>Registered Password:".$pswd;
echo "<br>Entered Password:".$upswd;
if($upswd==$pswd){
echo "<br>Connect Password<br>Successfully Logged In";
}
else{
echo "<br>Incorrect Password";
}}
$stmt->close();
$conn->close();
}
else
{
echo "All field are required";
die();
}
?>