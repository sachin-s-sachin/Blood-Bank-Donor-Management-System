<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $blood_group = $_POST['blood_group'];
    $address = $_POST['address'];

$sql = "INSERT INTO donors (name, email, phone, blood_group, address) VALUES ('$name', '$email', '$phone', '$blood_group', '$address')";
if ($conn->query($sql) === TRUE) {
echo "New donor added successfully";
} else {
echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Add Donor</title>
</head>
<body>
<h2>Add Donor</h2>
<form method="post" action="add_donor.php">
<label>Name:</label>
<input type="text" name="name" required><br>
<label>Email:</label>
<input type="email" name="email" required><br>
<label>Phone:</label>
<input type="text" name="phone" required><br>
<label>Blood Group:</label>
<input type="text" name="blood_group" required><br>
<label>Address:</label>
<textarea name="address" required></textarea><br>
<input type="submit" value="Add Donor">
    </form>
</body>
</html>
