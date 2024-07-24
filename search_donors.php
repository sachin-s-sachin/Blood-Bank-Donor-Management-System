<?php
include 'db.php';

$search_term = '';
$results = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $search_term = $_POST['search_term'];
    $sql = "SELECT * FROM donors WHERE blood_group LIKE '%$search_term%'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $results[] = $row;
        }
    }
    $conn->close();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Search Donors</title>
</head>
<body>
<h2>Search Donors</h2>
<form method="post" action="search_donors.php">
<label>Blood Group:</label>
<input type="text" name="search_term" required>
<input type="submit" value="Search">
</form>
<?php if (!empty($results)) { ?>
<h2>Search Results</h2>
<table border="1">
<tr>
<th>ID</th>
<th>Name</th>
<th>Email</th>
<th>Phone</th>
<th>Blood Group</th>
<th>Address</th>
</tr>
<?php foreach ($results as $row) { ?>
<tr>
<td><?php echo $row['id']; ?></td>
<td><?php echo $row['name']; ?></td>
<td><?php echo $row['email']; ?></td>
<td><?php echo $row['phone']; ?></td>
<td><?php echo $row['blood_group']; ?></td>
<td><?php echo $row['address']; ?></td>
</tr>
<?php } ?>
</table>
<?php } ?>
</body>
</html>
