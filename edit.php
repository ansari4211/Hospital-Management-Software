<!-- edit.php -->
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Edit Patient</title>
<link rel="stylesheet" href="style.css">
</head>
<body>
  <header>
    <h1>Edit Patient</h1>
  </header>
  <main>
    <section class="form-section">
      <?php
      include 'conn.php';
      
      if (isset($_GET['Id'])) {
          $Id = $_GET['Id'];
          $sql = "SELECT * FROM hospital WHERE Id='$Id'";
          $result = mysqli_query($conn, $sql);
          $row = mysqli_fetch_assoc($result);
      }
      
      
      if (isset($_POST['update'])) {
        $Id = $_POST['Id'];
        $Name = mysqli_real_escape_string($conn, $_POST['Name']);
        $Gender = mysqli_real_escape_string($conn, $_POST['Gender']);
        $Age = mysqli_real_escape_string($conn, $_POST['Age']);
        $Patient = mysqli_real_escape_string($conn, $_POST['Patient']);
        $Doctor = mysqli_real_escape_string($conn, $_POST['Doctor']);
        $Regdate = mysqli_real_escape_string($conn, $_POST['Regdate']);
        $Address = mysqli_real_escape_string($conn, $_POST['Address']);

        $sql = "UPDATE hospital SET Name='$Name', Gender='$Gender', Age='$Age', Patient='$Patient', Doctor='$Doctor', Regdate='$Regdate', Address='$Address' WHERE Id='$Id'";

        if (mysqli_query($conn, $sql)) {
            header('location: index.php');
            exit();
        } else {
            echo "Error updating record: " . mysqli_error($conn);
        }
    }
   
      ?>
      <form action="edit.php" method="POST">
        <input type="hidden" name="Id" value="<?php echo $row['Id']; ?>">
        <label for="Name">Name:</label>
        <input type="text" id="Name" name="Name" value="<?php echo $row['Name']; ?>" required>
        
        <label for="Gender">Gender:</label>
        <select id="Gender" name="Gender" required>
          <option value="male" <?php if ($row['Gender'] == 'male') echo 'selected'; ?>>Male</option>
          <option value="female" <?php if ($row['Gender'] == 'female') echo 'selected'; ?>>Female</option>
          <option value="other" <?php if ($row['Gender'] == 'other') echo 'selected'; ?>>Other</option>
        </select>
        
        <label for="Age">Age:</label>
        <input type="number" id="Age" name="Age" value="<?php echo $row['Age']; ?>" required>
        
        <label for="Patient">Patient:</label>
        <input type="text" id="Patient" name="Patient" value="<?php echo $row['Patient']; ?>" required>
        
        <label for="Doctor">Doctor:</label>
        <input type="text" id="Doctor" name="Doctor" value="<?php echo $row['Doctor']; ?>" required>
        
        <label for="Regdate">Date:</label>
        <input type="date" id="Regdate" name="Regdate" value="<?php echo $row['Regdate']; ?>" required>
        
        <label for="Address">Address:</label>
        <textarea id="Address" name="Address" required><?php echo $row['Address']; ?></textarea>
        
        <button type="submit" name="update">Update</button>
      </form>
    </section>
  </main>
  <footer>
   
  </footer>
</body>
</html>
