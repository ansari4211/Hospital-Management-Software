<!-- create.php -->
<?php
include 'conn.php';

if (isset($_POST['submit'])) {
    $Name = mysqli_real_escape_string($conn, $_POST['Name']);
    $Gender = mysqli_real_escape_string($conn, $_POST['Gender']);
    $Age = mysqli_real_escape_string($conn, $_POST['Age']);
    $Patient = mysqli_real_escape_string($conn, $_POST['Patient']);
    $Doctor = mysqli_real_escape_string($conn, $_POST['Doctor']);
    $Regdate = mysqli_real_escape_string($conn, $_POST['Regdate']);
    $Address = mysqli_real_escape_string($conn, $_POST['Address']);

    $sql = "INSERT INTO hospital (Name, Gender, Age, Patient, Doctor, Regdate, Address) VALUES ('$Name', '$Gender', '$Age', '$Patient', '$Doctor', '$Regdate', '$Address')";

    if (mysqli_query($conn, $sql)) {
        header('location: index.php');
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}
?>
