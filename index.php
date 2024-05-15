<?php require_once ("header.html");?>

<?php 
  // Connect to your MySQL database
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "adoptees";
  
  $conn = new mysqli($servername, $username, $password, $dbname);
  
  // Check connection
  if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
  }
  
  // Select the table you want to query
  $table_name = "t_adoptees";
  
  // Construct and execute the query
  $sql = "SELECT * FROM t_adoptees ORDER BY days_in_shelter DESC LIMIT 1;";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $animal_name = $row['name'];
    $days_in_shelter = $row['days_in_shelter'];
    $image_path = $row['photo'];
} else {
    $animal_name = "N/A";
    $days_in_shelter = "N/A";
}
?>

<main>
  <section>
      <h3>Our Longest Resident, <?php echo $animal_name; ?>, has been with us for <?php echo $days_in_shelter; ?> days!</h3>
        <p>Help us find <?php echo $animal_name; ?> a forever home!</p>
        <img src="photos/<?php echo $image_path; ?>" alt="<?php echo $animal_name; ?>" class="adoptee_photos">
  </section>
        
        <section>
            <h3>Pet of the Week</h3>
            <p>This is a brief description of our website.</p>
        </section>

        <section>
            <h3>Recently Adopted</h3>
        </section>
    </main>

<?php require_once ("footer.html");?>