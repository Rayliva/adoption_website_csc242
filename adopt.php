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
  $sql = "SELECT * FROM $table_name";
  $result = $conn->query($sql);

  
 echo "<main>";

 echo '<div class="filter-container">';
 echo '<form method="get">';
     echo '<label for="filter">Filter by:</label>';
     echo '<select name="filter" id="filter">';
         echo '<option value="all">All</option>';
         echo '<option value="dog">Dog</option>';
         echo '<option value="cat">Cat</option>';
         echo '<option value="asc">Days in Shelter Ascending</option>';
         echo '<option value="desc">Days in Shelter Descending</option>';
     echo '</select>';
     echo '<button type="submit">Apply Filter</button>';
 echo '</form>';
echo '</div>';



// Default filter
$filter = isset($_GET['filter']) ? $_GET['filter'] : 'all';

// Query to fetch data based on filter
$sql = "";
switch ($filter) {
    case 'dog':
        $sql = "SELECT * FROM t_adoptees WHERE type = 'dog'";
        break;
    case 'cat':
        $sql = "SELECT * FROM t_adoptees WHERE type = 'cat'";
        break;
    case 'asc':
        $sql = "SELECT * FROM t_adoptees ORDER BY days_in_shelter ASC";
        break;
    case 'desc':
        $sql = "SELECT * FROM t_adoptees ORDER BY days_in_shelter DESC";
        break;
    default:
        $sql = "SELECT * FROM t_adoptees";
        break;
}

// Execute query and fetch data
$stmt = $conn->query($sql);
while ($row = $stmt->fetch_assoc()) {
    $photo = $row['photo']; // Assuming 'photo_url' is the column name for the photo URL
        $description = $row['description']; // Assuming 'description' is the column name for the description
        $days_in_shelter = $row['days_in_shelter']; // Assuming 'days_in_shelter' is the column name for the days in shelter
        $animal_name = $row['name']; // Assuming 'name' is the column name for the animal name
        echo "<div class='parent'>";
        echo "<div class='div1'> <img src='photos/$photo' alt='$photo' class='adoptee_photos'> </div>";
        echo "<div class='div2'> $animal_name </div>";
        echo "<div class='div3'> $description </div>";
        echo "<div class='div4'> Days in shelter: $days_in_shelter </div>";
        echo "</div>";
}





echo "</main>";
  
  // Close connection
  $conn->close();
?>





<?php require_once ("footer.html");?>