<?php
  session_start();
  
  // Check if the user is not logged in or not an admin
  if (!isset($_SESSION['login_user'])) {  
      header("Location: index.php"); 
      exit(); // Stop further execution of the script
  }

  if($_SESSION['login_user'] != "admin") {
      header("Location: home.php"); 
      exit(); // Stop further execution of the script
  }

  // Include necessary files
  include_once 'src/components/db_connection.php'; // Include database connection

  // Handle form submission
  if(isset($_POST['submit'])) { 
    $table = $_POST['table']; // Get the selected table
    $data = $_POST['data']; // Get the data
    $data2 = mysqli_real_escape_string($conn, $_POST['data2']);

    if(isset($data2)){
      $data = array($data2, $data);
    }
    else{
      $data = array($data);
    }

    $query = "SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_SCHEMA = '$database' AND TABLE_NAME = '$table'";

    $result = $conn->query($query);

    $columns = [];

    if ($result->num_rows > 0) {
      // Output data of each row
      while($row = $result->fetch_assoc()) {
        if($row["COLUMN_NAME"] != 'id')
          $columns[] = $row["COLUMN_NAME"];
      }
    } else {
        echo "0 results";
    }

    $column_length = count($columns)-1;
    echo $column_length;

    while($column_length!=-1){
      // Insert the data into the selected table
      $sql = "INSERT INTO $table ($columns[$column_length]) VALUES ('$data[$column_length]')"; // Replace 'column_name' with the appropriate column name
      $column_length = $column_length - 1;
      if (mysqli_query($conn, $sql)) {
      } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
      }
    }
    echo "<script type='text/javascript'>alert('New record inserted successfully'); window.location.href = 'movies.php';</script>";
  }
?>

<?php include 'src/components/header1.php' ?>
<link rel="stylesheet" href="src/css/current-booking-style.css">
<?php include 'src/components/header2.php' ?>

<div class="container mt-5">
    <h2>Add more details</h2>
    <form action="" method="POST">
        <div class="mb-3">
            <label for="table" class="form-label">Select a table:</label>
            <select class="form-select" id="table" name="table" required>
                <option value="">Select Table</option>
                <option value="cities">Cities</option>
                <option value="languages">Languages</option>
                <option value="quality">Quality</option>
                <option value="movies">Movies</option>
            </select>
        </div>        

        <div id="data_input" class="mb-3" style="display: none;">
            <label for="data" class="form-label">Enter data:</label>
            <input type="text" name="data" id="data"> 
        </div>
        <div id="data_input2" class="mb-3" style="display: none;">
            <label for="data2" class="form-label">Please select the Release Date:</label>
            <input type="date" class="form-control" id="data2" name="data2" required>
        </div>
        
     
        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

<script>
  // Show data input field when table is selected
  document.getElementById('table').addEventListener('change', function() {
    var selectedTable = this.value;
    if (selectedTable !== '') {
      if(selectedTable == 'movies'){
        document.getElementById('data_input2').style.display = 'block';
        document.getElementById('data_input').style.display = 'block';
      }
      else{
        document.getElementById('data_input').style.display = 'block';
      }
    } else {
      document.getElementById('data_input').style.display = 'none';
      document.getElementById('data_input2').style.display = 'none';
    }
  });
</script>

<?php include 'src/components/footer.php' ?>
