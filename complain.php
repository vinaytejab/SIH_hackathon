<?php
$servername = "localhost";
$username = "id11831593_acecal";
$password = "acecalgoa";
$dbname = "id11831593_goa";

$phonenumber = $_POST["phonenumber"];
$pincode = $_POST["pincode"];
$imgurl = $_POST["imgurl"];
$longitude = $_POST["longitude"];
$latitude = $_POST["latitude"];
// $phonenumber =  substr($phonenumber,1);

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
$cidd = mysqli_query($conn, "select phonenumber from civilagencies where pincode = $pincode limit 1");
if (mysqli_num_rows($cidd) > 0) {
    // output data of each row
    while($cid = mysqli_fetch_assoc($cidd)) {
       $sql = "INSERT INTO complaint (userphonenumber, pincode, latitude, longitude, imgurl, caphonenumber)
    VALUES ($phonenumber, $pincode, '$latitude', '$longitude', '$imgurl', $cid[phonenumber] )";
    }
}
//$sql = "INSERT INTO complaint (userphonenumber, pincode, latitude, longitude, imgurl, caphonenumber)
 //   VALUES ($phonenumber, $pincode, '$latitude', '$longitude', '$imgurl', $cidd )";

if (mysqli_query($conn, $sql)) {
    $cid = mysqli_query($conn, "select id from complaint where pincode = $pincode limit 1");

}





 echo "Complaint Submitted!!! <br/> <center><a href=https://acecal.000webhostapp.com/goa/>Help Build Goa</a></center>";

?>