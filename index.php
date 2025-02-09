<?php 
  include('inc/functions.php');
  secure()
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <!-- Bootstrap CDN -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>
<body>
  <div class="container-fluid">
    <div class="row">
      <div class="col">
        <?php require('reusables/nav.php')?>
          <div class="container-fluid">
            <a class="navbar-brand" href="#">LMS</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                  <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#">Link</a>
                </li>
              </ul>
            </div>
          </div>
        </nav>
      </div>
    </div>
  </div>
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h1 class="display-2">Schools</h1>
      </div>
    </div>
    <div class="row">
      <?php 
       require('reusables/connect.php');

        $query  = 'SELECT * FROM schools';
        $schools = mysqli_query($connect, $query);

        //echo '<pre>' . print_r($schools) . '</pre>';

        foreach($schools as $school){
          echo '<div class="card col-md-4 mb-2">
          <div class="card-body">
            <h5 class="card-title">' . $school['School Name'] . '</h5>
            <p class="card-text">' . $school['School Level'] . '</p>
            <span class="badge bg-secondary">' . $school['Phone'] .'</span><br><br>
            <a href="mailto:' . $school['Email'] . '" class="btn btn-primary">' . $school['Email'] . '</a>
          </div>
           <div class="card-footer">
            <div class="row">
              <div class="col">
                <form method="GET" action="updateSchool.php">
                  <input type="hidden" name="schoolID" value="' . $school['id'] .'">
                  <button class="btn btn-sm btn-primary">Update</button>
                </form>
              </div>
              <div class="col">
              <form method="GET" action="deleteSchool.php">
                  <input type="hidden" name="schoolID" value="' . $school['id'] .'">
                  <button class="btn btn-sm btn-danger">Delete</button>
                </form>
               
              </div>
            </div>
          </div>
        </div>';
        }

      ?>
    </div>
  </div>
</body>
</html>