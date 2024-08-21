<?php
include 'db_connect.php';

$sql = "SELECT id, username, email, created_at FROM users";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<h2>User List</h2>";
    echo "<table border='1'><tr><th>ID</th><th>Username</th><th>Email</th><th>Created At</th></tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["id"]. "</td><td>" . $row["username"]. "</td><td>" . $row["email"]. "</td><td>" . $row["created_at"]. "</td>";
        echo "<td><a href='update_user.php?id=".$row["id"]."'>Edit</a> | <a href='delete_user.php?id=".$row["id"]."' onclick='return confirm(\"Are you sure?\")'>Delete</a></td></tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}

$conn->close();
?>