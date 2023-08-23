<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Hospital Management CRUD</title>
<link rel="stylesheet" href="style.css">
</head>
<body>
  <header>
    <h1>Hospital Management</h1>
  </header>
  <main>
    <section class="form-section">
      <h2>Add New Patient</h2>
      <form action="create.php" method="POST">
        <label for="Name">Name:</label>
        <input type="text" id="Name" name="Name" required>
        
        <label for="Gender">Gender:</label>
        <select id="Gender" name="Gender" required>
          <option value="male">Male</option>
          <option value="female">Female</option>
          <option value="other">Other</option>
        </select>
        
        <label for="Age">Age:</label>
        <input type="number" id="Age" name="Age" required>
        
        <label for="Patient">Patient:</label>
        <input type="text" id="Patient" name="Patient" required>
        
        <label for="Doctor">Doctor:</label>
        <input type="text" id="Doctor" name="Doctor" required>
        
        <label for="Regdate">Date:</label>
        <input type="date" id="Regdate" name="Regdate" required>
        
        <label for="Address">Address:</label>
        <textarea id="Address" name="Address" required></textarea>
        
        <button type="submit" name="submit">Add Patient</button>
      </form>
    </section>
    
    <section class="record-list">
      <h2>Patients List</h2>
      <table border="1">
        <tr>
          <th>Name</th>
          <th>Gender</th>
          <th>Age</th>
          <th>Patient</th>
          <th>Doctor</th>
          <th>Date</th>
          <th>Address</th>
          <th>Actions</th>
        </tr>
        <?php
        include 'conn.php';
        $sql = "SELECT * FROM hospital";
        $result = mysqli_query($conn, $sql);

        while ($row = mysqli_fetch_assoc($result)) {
          echo "<tr>";
          echo "<td>".$row['Name']."</td>";
          echo "<td>".$row['Gender']."</td>";
          echo "<td>".$row['Age']."</td>";
          echo "<td>".$row['Patient']."</td>";
          echo "<td>".$row['Doctor']."</td>";
          echo "<td>".$row['Regdate']."</td>";
          echo "<td>".$row['Address']."</td>";
          echo "<td>
                  <a href='edit.php?Id=".$row['Id']."'>Edit</a>
                  <a href='delete.php?Id=".$row['Id']."' onclick=\"return confirm('Are you sure you want to delete this record?');\">Delete</a>
                </td>";
          echo "</tr>";
        }
        ?>
      </table>
    </section>
  </main>
  <footer>
    <p>&copy; 2023 Hospital Management CRUD</p>
  </footer>
</body>
</html>
