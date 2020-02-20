<?php
session_start();
  include 'connect.php';      //connects to the database

  $stmt = $conn->prepare("SELECT student_id, student_first_name, student_last_name, student_major, student_portfolio, student_linkedin, student_secondary, student_hometown, student_career_goals, student_hobbies, student_state, student_minor, student_password, student_username, student_image  FROM student_info_2020");
  $stmt->execute();
?>



<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" type="text/css" href="css/events.css"> 


    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <title>Edit Student Info</title>
</head>
<body>
<div class="page_container">
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <a class="navbar-brand" href="index.html">
        <img src="Imaginati Logo.gif" class="img-fluid" alt="Responsive image" width="100px" height="100px"></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarText">
          <ul class="navbar-nav mr-auto">
              <li class="nav-item active">
                 <a class="nav-link" href="index.html">Home<span class="sr-only">(current)</span></a>
              </li>
              <li class="nav-item">
                  <a class="nav-link" href="addStudent.php">Student Input Form</a>
              </li>
               <li class="nav-item">
            <a class="nav-link" href="loginForm.php">Login</a>
        </li>
      </ul>
       
    </span>
   
    </div>
   
    </nav>
 <div class="container">
    <table class="table">
  <tbody>
    <tr>
      <tr>
    <td>First Name</td>
    <td>Last Name</td>
    <td>Major</td>
    <td>Portfolio</td>
    <td>LinkedIn</td>
    <td>Secondary</td>
    <td>Hometown</td>
    <td>Career Goals</td>
    <td>Hobbies</td>
    <td>State</td>
    <td>Minor</td>
    
    <?php
    if ($_SESSION['validUser'] == "yes") {
    ?>
    <td>Password</td>
    <td>Username</td>
    <td>Image</td>
    <td>UPDATE</td>

    <?php
  }
  ?>
  </tbody>
  <?php 
  while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
  {
    echo "<tr>";
      echo "<td>" . $row['student_first_name'] . "</td>"; 
      echo "<td>" . $row['student_last_name'] . "</td>";
      echo "<td>" . $row['student_major'] . "</td>";
      echo "<td>" . $row['student_portfolio'] . "</td>";  
      echo "<td>" . $row['student_linkedin'] . "</td>";
      echo "<td>" . $row['student_secondary'] . "</td>"; 
      echo "<td>" . $row['student_hometown'] . "</td>";
      echo "<td>" . $row['student_career_goals'] . "</td>";
      echo "<td>" . $row['student_hobbies'] . "</td>";  
      echo "<td>" . $row['student_state'] . "</td>";
      echo "<td>" . $row['student_minor'] . "</td>"; 
      if ($_SESSION['validUser'] == "yes") {
      echo "<td>" . $row['student_password'] . "</td>";
      echo "<td>" . $row['student_username'] . "</td>";
      echo "<td>" . $row['student_image'] . "</td>";  
      echo "<td><a href='updateStudent.php?recID=" . $row['student_id'] . "'>Update</a></td>"; 
       
      }   
    echo "</tr>";
  }
?>
</table>


</div>

</div><!--close page container-->
 <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>