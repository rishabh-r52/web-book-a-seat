<?php include 'src/components/session_manager.php'?>
<?php include 'src/components/header1.php'?>

<link rel="stylesheet" href="src/css/add-details.css">
<!-- Include Bootstrap CSS -->
<?php include 'src/components/header2.php'?>

<div class="movies-header">
    MOVIES DATABASE
</div>

<form id="myForm" action="src/components/submit.php" method="post" class="mt-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
              <label for="selection">Choose a Table:</label>
                <select id="selection" name="option" class="form-control mb-3">
                    <option value="">Choose an option</option>
                    <option value="cities">Cities</option>
                    <option value="languages">Languages</option>
                    <option value="movies">Movies</option>
                    <option value="quality">Quality</option>
                </select>
                <div id="inputFields">
                    <!-- Dynamic input fields will appear here -->
                </div>
                <button type="submit" id="submitButton" class="btn btn-primary btn-block submit_button" style="display: none;">Submit</button>
            </div>
        </div>
    </div>
</form>

<div class="filler"></div>

<script>
  document.getElementById('selection').addEventListener('change', function() {
    var selection = this.value;
    var inputFieldsDiv = document.getElementById('inputFields');
    var submitButton = document.getElementById('submitButton');
    
        // Clear previous input fields
        inputFieldsDiv.innerHTML = '';
        
        // Show submit button if an option is selected
        if (selection) {
          submitButton.style.display = 'block';
        } else {
          submitButton.style.display = 'none';
        }
        
        // Generate input fields based on selection
        if (selection === 'cities' || selection === 'languages' || selection === 'quality') {
          var textField = document.createElement('input');
          textField.type = 'text';
          textField.name = 'data';
          textField.placeholder = 'Enter ' + selection;
          textField.classList.add('form-control', 'mb-3');
          inputFieldsDiv.appendChild(textField);
        } else if (selection === 'movies') {
          var movieNameField = document.createElement('input');
          movieNameField.type = 'text';
          movieNameField.name = 'movie_name';
          movieNameField.placeholder = 'Enter movie name';
          movieNameField.classList.add('form-control', 'mb-3');
          inputFieldsDiv.appendChild(movieNameField);
          
          var releaseDateField = document.createElement('input');
          releaseDateField.type = 'date';
          releaseDateField.name = 'release_date';
            releaseDateField.placeholder = 'Release date';
            releaseDateField.classList.add('form-control', 'mb-3');
            inputFieldsDiv.appendChild(releaseDateField);
          }
          
          // Show input fields
          inputFieldsDiv.style.display = 'block';
        });
      </script>

      <div class="filler"></div>

<?php include 'src/components/footer.php'?>