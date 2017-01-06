<?php
$hostname="localhost";
$username="myuser";
$password="mypassword";
$dbname="lab1";

//creating connection
$conn=mysqli_connect($hostname,$username,$password,$dbname);

//checking connection
if(!$conn){
  die("Connection Failed : ".mysqli_connect_error());
}
echo "Connected to $dbname with user $username";

//sailors of age 27
echo "<h2>Sailors of age 27</h2>";
$sql="SELECT * FROM sailors WHERE age=27";
$result=mysqli_query($conn,$sql);
if(mysqli_num_rows($result)>0){
  while($row=mysqli_fetch_assoc($result)){
    echo "Id :".$row["sid"]."<br>";
    echo "Name :".$row["sname"]."<br>";
    echo "Rating :".$row["rating"]."<br>";
    echo "Age :".$row["age"]."<br><br>";
  }
  echo "<br>";
}else{
  echo "0 results<br><br>";
}

//Names and ages of all sailors
echo "<h2>Names and Ages of all sailors</h2>";
$sql="SELECT sname,age FROM sailors";
$result=mysqli_query($conn,$sql);
if(mysqli_num_rows($result)>0){
  while($row=mysqli_fetch_assoc($result)){
    echo "Name : ".$row["sname"]."<br>";
    echo "Age : ".$row["age"]."<br><br>";
  }
  echo "<br>";
}else{
  echo "0 results<br><br>";
}

//All the sailors that reserved a specific boat
echo "<h2>Names of Sailors who reserved specific boat</h2>";
$sql="SELECT sailors.sname FROM sailors,reserves WHERE bid='".$_GET["bnum"]."' AND sailors.sid=reserves.sid";
//$sql="SELECT sailors.sname FROM sailors,reserves WHERE bid=101 AND sailors.sid=reserves.sid";
$result=mysqli_query($conn,$sql);
if(mysqli_num_rows($result)>0){
  while($row=mysqli_fetch_assoc($result)){
    echo "Name : ".$row["sname"]."<br><br>";
  }
  echo "<br>";
}else{
  echo "0 results<br><br>";
}

//All the sid of sailors who have reserved a specific color boat
echo "<h2>Sids of sailors who have reserved specific color boat</h2>";
$sql="SELECT sailors.sid FROM sailors,reserves,boats WHERE boats.bcolor='".$_GET['bcol']."' AND boats.bid=reserves.bid AND sailors.sid=reserves.sid";
//$sql="SELECT sailors.sid FROM sailors,reserves,boats WHERE boats.bcolor='blue' AND boats.bid=reserves.bid AND sailors.sid=reserves.sid";
$result=mysqli_query($conn,$sql);
if(mysqli_num_rows($result)>0){
  while ($row=mysqli_fetch_assoc($result)) {
    echo "Sid : ".$row["sid"]."<br><br>";
  }
  echo "<br>";
}else{
  echo "0 results<br><br>";
}
mysqli_close($conn);
?>
