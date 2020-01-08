<?php
$servername = "localhost";
$username = "id11831593_acecal";
$password = "acecalgoa";
$dbname = "id11831593_goa";

$phonenumber = $_POST["phonenumber"];
$pincode = $_POST["savepincode"];
$address = $_POST["address"];
$gender = $_POST["gender"];
// $phonenumber =  substr($phonenumber,1);

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
$sql = "INSERT INTO user (phonenumber, pincode, gender, address)
    VALUES ($phonenumber, $pincode, '$gender', '$address')";

if (mysqli_query($conn, $sql)) {
    echo "Profile Saved!!! <br/> <center><a href=https://acecal.000webhostapp.com/goa/>Help Build Goa</a></center>";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

?>
<script>
var savepincode = <?php echo $_POST["savepincode"] ?>;
localStorage.setItem("pincode",savepincode);
</script>