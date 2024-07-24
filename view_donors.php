<?php
include 'db.php';

$sql = "SELECT * FROM donors";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
<title>View Donors</title>
</head>
<body>
<h2>Donor List</h2>
<table border="1">
<tr>
<th>ID</th>
<th>Name</th>
<th>Email</th>
<th>Phone</th>
<th>Blood Group</th>
<th>Address</th>
</tr>
<?php
if ($result->num_rows > 0) {
while($row = $result->fetch_assoc()) {
echo "<tr>
<td>{$row['id']}</td>
 <td>{$row['name']}</td>
<td>{$row['email']}</td>
<td>{$row['phone']}</td>
<td>{$row['blood_group']}</td>
<td>{$row['address']}</td>
</tr>";
}
} else {
echo "<tr><td colspan='6'>No donors found</td></tr>";
        }
        $conn->close();
        ?>
    </table>
</body>
</html>
