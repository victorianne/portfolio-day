<?php
session_start();

$error = '';

$student_first_name = "";


if ($_SESSION['validUser'] == "yes") {
  $error = "Welcome Back! $student_first_name";
}
else{
  if (isset($_POST['submit'])) {
    //Define $user and $pass
    $student_username = $_POST['student_username'];
    $student_password = $_POST['student_password'];

    include 'connect.php';

    $sql = "SELECT student_username, student_password FROM student_info_2020 WHERE student_username = :student_username AND student_password = :student_password";

    $stmt = $conn->prepare($sql);
    $stmt->bindParam(":student_username", $student_username); //ss using two strings
    $stmt->bindParam(":student_password", $student_password ); //ss using two strings
    $stmt->execute();
    $stmt->fetch();

    if ($stmt->rowCount() == 1) {
      $_SESSION['validUser'] = "yes";
      $error = "Welcome Back ! $student_first_name";
    }
    else {
      $_SESSION['validUser'] = "no";
      $error = "Username or Password is Invalid";
    }
 
  }


 else{
      
    }

  }
?>

<!DOCTYPE html>
<html>
<head>
	  <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" type="text/css" href="css/studentForm.css"> 


    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 


	<title>Login Form</title>
</head>
<body>
 <link href="https://fonts.googleapis.com/css?family=Julius+Sans+One&display=swap" rel="stylesheet">
    <div class="jumbotron jumbotron-fluid">
     <?php
      if ($_SESSION['validUser'] == "yes") {
        
        ?>
        <div id="profile">
        <b id="welcome">Welcome : <i><?php echo $student_first_name; ?></i></b>
        <b id="logout"><a href="logout.php">Log Out</a></b>
        </div>

        <div class="page_container">
          <div class="login-form">
            <form id="studentForm" name="studentForm" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) . "?recID=$recID"; ?>">

              <h3>Update Student Information Form</h3>
                <?php
                        //If the form was submitted and valid and properly put into database display the INSERT result message
                  if($validForm)
                  {
                    ?>
                  <h2><?php echo $message ?></h2>
                    <?php
                  }
                  else  //display form
                  {
                    ?>

               <p>
                      <label for="student_first_name">First Name:</label>
                      <input type="text" name="student_first_name" id="student_first_name" value="<?php echo $student_first_name; ?>">
                      <span class="error">* <?php echo $firstNameErrMsg;?></span>
                    </p>
                    <p>
                      <label for="student_last_name">Last Name:</label>
                      <input type="text" name="student_last_name" id="student_last_name" value="<?php echo $student_last_name;  ?>">
                      <span class="error">* <?php echo $lastNameErrMsg;?></span>
                    </p>
                    <p>
                      <label for="student_major">Program: </label>
                        <select id="cars">
                          <option value="select">---</option>
                      <option value="Web Development">Web Development</option>
                        <option value="Graphic Design">Graphic Design</option>
                        <option value="Photography">Photography</option>
                        <option value="Video">Video</option>
                        <option value="Animation">Animation</option>
                    </select>
                      <span class="error">* <?php echo $majorErrMsg;?></span>
                    </p>
                     <p>
                      <label for="student_portfolio">Portfolio:</label>
                      <input type="text" name="student_portfolio" id="student_portfolio" required value="<?php echo $student_portfolio;  ?>">
                      <span class="error">* <?php echo $portfolioErrMsg;?></span>
                    </p>
                    <p>
                      <label for="student_linkedin">LinkedIn Account:</label>
                      <input type="text" name="student_linkedin" id="student_linkedin" required value="<?php echo $student_linkedin;  ?>">
                      <span class="error">* <?php echo $linkedinErrMsg;?></span>
                    </p>  
                    <p>
                      <label for="student_secondary">Secondary:</label>
                      <input type="text" name="student_secondary" id="student_secondary" value="<?php echo $student_secondary; ?>">
                      <span class="error">* <?php echo $secondaryErrMsg;?></span>
                    </p>
                    <p>
                      <label for="student_hometown">Hometown:</label>
                      <input type="text" name="student_hometown" id="student_hometown" value="<?php echo $student_hometown;  ?>">
                      <span class="error">* <?php echo $hometownErrMsg;?></span>
                    </p>
                    <p>
                      <label for="student_career_goals">Career Goals: </label>
                      <input type="text" name="student_career_goals" id="student_career_goals" value="<?php echo $student_career_goals;  ?>">
                      <span class="error">* <?php echo $careerGoalsErrMsg;?></span>
                    </p>
                     <p>
                      <label for="student_hobbies">Hobbies:</label>
                      <input type="text" name="student_hobbies" id="student_hobbies" required value="<?php echo $student_hobbies;  ?>">
                      <span class="error">* <?php echo $hobbiesErrMsg;?></span>
                    </p>
                    <p>
                      <label for="student_state">State:</label>
                      <select id="student_state" name="student_state"><option value="---">---</option><option value="Alabama">Alabama</option><option value="Alaska">Alaska</option><option value="Arizona">Arizona</option><option value="Arkansas">Arkansas</option><option value="California">California</option><option value="Colorado">Colorado</option><option value="Connecticut">Connecticut</option><option value="Delaware">Delaware</option><option value="District of Columbia">District of Columbia</option><option value="Florida">Florida</option><option value="Georgia">Georgia</option><option value="Guam">Guam</option><option value="Hawaii">Hawaii</option><option value="Idaho">Idaho</option><option value="Illinois">Illinois</option><option value="Indiana">Indiana</option><option value="Iowa">Iowa</option><option value="Kansas">Kansas</option><option value="Kentucky">Kentucky</option><option value="Louisiana">Louisiana</option><option value="Maine">Maine</option><option value="Maryland">Maryland</option><option value="Massachusetts">Massachusetts</option><option value="Michigan">Michigan</option><option value="Minnesota">Minnesota</option><option value="Mississippi">Mississippi</option><option value="Missouri">Missouri</option><option value="Montana">Montana</option><option value="Nebraska">Nebraska</option><option value="Nevada">Nevada</option><option value="New Hampshire">New Hampshire</option><option value="New Jersey">New Jersey</option><option value="New Mexico">New Mexico</option><option value="New York">New York</option><option value="North Carolina">North Carolina</option><option value="North Dakota">North Dakota</option><option value="Northern Marianas Islands">Northern Marianas Islands</option><option value="Ohio">Ohio</option><option value="Oklahoma">Oklahoma</option><option value="Oregon">Oregon</option><option value="Pennsylvania">Pennsylvania</option><option value="Puerto Rico">Puerto Rico</option><option value="Rhode Island">Rhode Island</option><option value="South Carolina">South Carolina</option><option value="South Dakota">South Dakota</option><option value="Tennessee">Tennessee</option><option value="Texas">Texas</option><option value="Utah">Utah</option><option value="Vermont">Vermont</option><option value="Virginia">Virginia</option><option value="Virgin Islands">Virgin Islands</option><option value="Washington">Washington</option><option value="West Virginia">West Virginia</option><option value="Wisconsin">Wisconsin</option><option value="Wyoming">Wyoming</option></select>
                      <span class="error">* <?php echo $stateErrMsg;?></span>
                    </p>

                    <p>
                      <label for="student_minor">Minor:</label>
                      <input type="text" name="student_minor" id="student_minor" value="<?php echo $student_minor; ?>">
                      <span class="error">* <?php echo $minorErrMsg;?></span>
                    </p>
                    <p>
                      <label for="student_password">Password:</label>
                      <input type="text" name="student_password" id="student_password" value="<?php echo $student_password;  ?>">
                      <span class="error">* <?php echo $passwordErrMsg;?></span>
                    </p>
                     <p>
                      <label for="student_username">Username:</label>
                      <input type="text" name="student_username" id="student_username" value="<?php echo $student_username;  ?>">
                      <span class="error">* Use your DMACC Email<?php echo $usernameErrMsg;?></span>
                    </p>
                    <p>
                      <label for="student_image">Image: </label>
                      <input type="text" name="student_image" id="student_image" value="<?php echo $student_image;  ?>">
                      <span class="error">* <?php echo $imageErrMsg;?></span>
                    </p>


              <p>
                <input type="submit" name="submit" id="button3" value="Update Student">
                <input type="reset" name="reset" id="reset" value="Reset">
              </p>

               <?php
                  }//end else
                    ?> 

            </form>
        </div><!-- end of login-form div-->

        <?php  
        }
        else
        {
        ?>
          <div class="page_container">
            <div class="login-form">
               <form action="loginForm.php" method="post" name="loginForm">
                 <h2 class="text-center">Log in</h2>       
                  <div class="form-group">
                      <input type="text" id="student_username" name="student_username" placeholder="Username">
                  </div>
                  <div class="form-group">
                       <input type="password" id="student_password" name="student_password" placeholder="Password">
                  </div>
                  <div class="form-group">
                      <input name="submit" type="submit" value="Login">
                  <span><?php echo $error ?></span>
                  </div>
                  <a href="addStudent.php">Register New Student</a>       
            </form>
          </div><!--close login-form -->
        </div><!--close page container -->
    <?php
      }
    ?>
</body>
</html>