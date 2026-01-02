<?php
$servername = "localhost";
$username = "root";
$password = "YourNewStrongPassword123!";
$dbname = "University";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$message = "";

// INSERT DATA
if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $faculty = $_POST['faculty'];
    $semester = $_POST['semester'];

    $sql = "INSERT INTO student (name, faculty, semester)
            VALUES ('$name', '$faculty', '$semester')";

    if ($conn->query($sql) === TRUE) {
        $message = "Record inserted successfully";
    } else {
        $message = "Error: " . $conn->error;
    }
}

// UPDATE DATA
if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $faculty = $_POST['faculty'];
    $semester = $_POST['semester'];

    $sql = "UPDATE student 
            SET name='$name', faculty='$faculty', semester='$semester' 
            WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        $message = "Record updated successfully";
    } else {
        $message = "Error updating record: " . $conn->error;
    }
}

// DELETE DATA
if (isset($_POST['delete'])) {
    $id = $_POST['id'];

    $sql = "DELETE FROM student WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        $message = "Record deleted successfully";
    } else {
        $message = "Error deleting record: " . $conn->error;
    }
}

// FETCH ALL STUDENTS
$result = $conn->query("SELECT * FROM student");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Student CRUD</title>
</head>
<body>

<h2>Insert Student</h2>
<form method="post">
    Name:
    <input type="text" name="name" required><br><br>

    Faculty:
    <input type="text" name="faculty" required><br><br>

    Semester:
    <input type="text" name="semester" required><br><br>

    <input type="submit" name="submit" value="Insert">
</form>

<hr>

<h2>Update Student</h2>
<form method="post">
    Student ID:
    <input type="number" name="id" required><br><br>

    Name:
    <input type="text" name="name" required><br><br>

    Faculty:
    <input type="text" name="faculty" required><br><br>

    Semester:
    <input type="text" name="semester" required><br><br>

    <input type="submit" name="update" value="Update">
</form>

<hr>

<h2>Delete Student</h2>
<form method="post">
    Student ID:
    <input type="number" name="id" required><br><br>

    <input type="submit" name="delete" value="Delete">
</form>

<hr>

<h2>All Students</h2>
<table border="1">
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Faculty</th>
        <th>Semester</th>
    </tr>
    <?php if ($result->num_rows > 0): ?>
        <?php while($row = $result->fetch_assoc()): ?>
        <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['name']; ?></td>
            <td><?php echo $row['faculty']; ?></td>
            <td><?php echo $row['semester']; ?></td>
        </tr>
        <?php endwhile; ?>
    <?php else: ?>
        <tr><td colspan="4">No records found</td></tr>
    <?php endif; ?>
</table>

<p><b><?php echo $message; ?></b></p>

</body>
</html>

<?php
$conn->close();
?>
