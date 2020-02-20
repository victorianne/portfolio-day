<?php  

		$student_first_name = "";
		$student_last_name = "";
		$student_major = "";
		$student_portfolio = "";
		$student_linkedin = "";
		$student_secondary = "";
		$student_hometown = "";
		$student_career_goals = "";
		$student_hobbies = "";
		$student_state = "";
		$student_minor = "";
		$student_password = "";
		$student_username = "";
		$student_image = "";
		$firstNameErrMsg = "";
		$lastNameErrMsg = "";
		$majorErrMsg = "";
		$careerGoalsErrMsg = "";
		$hobbiesErrMsg = "";
		$minorErrMsg = "";
		$passwordErrMsg = "";
		$usernameErrMsg = "";



		$validForm = false;

		if(isset($_POST["submit"]))
		{
			$student_first_name = $_POST['student_first_name'];
			$student_last_name = $_POST['student_last_name'];
			$student_major = $_POST['student_major'];
			$student_portfolio = $_POST['student_portfolio'];
			$student_linkedin = $_POST['student_linkedin'];
			$student_secondary = $_POST['student_secondary'];
			$student_hometown = $_POST['student_hometown'];
			$student_state = $_POST['student_state'];
			$student_minor = $_POST['student_minor'];
			$student_password = $_POST['student_password'];
			$student_username = $_POST['student_username'];
			$student_image = $_POST['student_image'];


			function validateFirstName($inputValue)
	{
				global $validForm, $firstNameErrMsg;		//Use the GLOBAL Version of these variables instead of making them local
				$firstNameErrMsg = "";
				
				if($inputValue == "")
				{
					$validForm = false;
					$firstNameErrMsg = "Field Required";
				}
			}//end validateFirstName()

			function validateLastName($inputValue)
	{
				global $validForm, $lastNameErrMsg;		//Use the GLOBAL Version of these variables instead of making them local
				$lastNameErrMsg = "";
				
				if($inputValue == "")
				{
					$validForm = false;
					$lastNameErrMsg = "Field Required";
				}
			}//end validateLastName()

			function validateMajor($inputValue)
	{
				global $validForm, $majorErrMsg;		//Use the GLOBAL Version of these variables instead of making them local
				$majorErrMsg = "";
				
				if($inputValue == "")
				{
					$validForm = false;
					$majorErrMsg = "Field Required";
				}
			}//end validateMajor()

			function validateCareerGoals($inputValue)
	{
				global $validForm, $careerGoalsErrMsg;		//Use the GLOBAL Version of these variables instead of making them local
				$careerGoalsErrMsg = "";
				
				if($inputValue == "")
				{
					$validForm = false;
					$careerGoalsErrMsg = "Field Required";
				}
			}//end validateFirstName()

			function validateHobbies($inputValue)
	{
				global $validForm, $hobbiesErrMsg;		//Use the GLOBAL Version of these variables instead of making them local
				$hobbiesErrMsg = "";
				
				if($inputValue == "")
				{
					$validForm = false;
					$hobbiesErrMsg = "Field Required";
				}
			}//end validateFirstName()


			function validateMinor($inputValue)
	{
				global $validForm, $minorErrMsg;		//Use the GLOBAL Version of these variables instead of making them local
				$minorErrMsg = "";
				
				if($inputValue == "")
				{
					$validForm = false;
					$minorErrMsg = "Name cannot be spaces";
				}
			}//end validateFirstName()

			function validatePassword($inputValue)
	{
				global $validForm, $passwordErrMsg;		//Use the GLOBAL Version of these variables instead of making them local
				$passwordErrMsg = "";
				
				if($inputValue == "")
				{
					$validForm = false;
					$passwordErrMsg = "Field Required";
				}
			}//end validateFirstName()

			function validateUsername($inputValue)
	{
				global $validForm, $usernameErrMsg;		//Use the GLOBAL Version of these variables instead of making them local
				$usernameErrMsg = "";
				
					if($inputValue == "")
				{
					$validForm = false;
					$usernameErrMsg = "Use Dmacc email";
				}
			}//end validateFirstName()


	


			$validForm = true;

			validateFirstName($student_first_name);
			validateLastName($student_last_name);
			validateMajor($student_major);
			validateCareerGoals($student_career_goals);
			validateHobbies($student_hobbies);
			validateMinor($student_minor);
			validatePassword($student_password);
			validateUsername($student_username);

			require_once("connect.php");

			if($validForm)
			{
				$message = "All good";

				try {

					$sql = "INSERT INTO student_info_2020 (student_id, student_first_name, student_last_name, student_major, student_portfolio, student_linkedin, student_secondary, student_hometown, student_career_goals, student_hobbies, student_state, student_minor, student_password, student_username, student_image) 
					VALUE (NULL, :student_first_name, :student_last_name, :student_major, :student_portfolio, :student_linkedin, :student_secondary, :student_hometown, :student_career_goals, :student_hobbies, :student_state, :student_minor, :student_password, :student_username, :student_image";

					$statement = $conn->prepare($sql);
					
					$statement->bindParem(':student_first_name', $student_first_name);
					$statement->bindParem(':student_last_name', $student_last_name);
					$statement->bindParem(':student_major', $student_major);
					$statement->bindParem(':student_portfolio', $student_portfolio);
					$statement->bindParem(':student_linkedin', $student_linkedin);
					$statement->bindParem(':student_secondary', $student_secondary);
					$statement->bindParem(':student_hometown', $student_hometown);
					$statement->bindParem(':student_career_goals', $student_career_goals);
					$statement->bindParem(':student_hobbies', $student_hobbies);
					$statement->bindParem(':student_state', $student_state);
					$statement->bindParem(':student_minor', $student_minor);
					$statement->bindParem(':student_password', $student_password);
					$statement->bindParem(':student_username', $student_username);
					$statement->bindParem(':student_image', $student_image);

					$statement->excute();

					$message = "Your information has been submitted successfully. Thank you for your submisstion!";

				}//end of try

				catch(PDOExepction $e)
				{
					$message = "There has been a problem. Please try again later.";

					error_log($e->getMessage());
				} //end catch
			
			}//end of if statement
			else
			{
				$message = "Something went wrong.";
			}

		}; //end of submit


?>

<!DOCTYPE html>
<html>
<head>
	 <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" type="text/css" href="css/studentForm.css"> 


    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 

	<title>Student Info Form</title>
</head>

	<style>

	.error	{
		color:red;
		font-style:italic;	
	}

	</style>

<body>

 <div class="pageContainer">
 	<link href="https://fonts.googleapis.com/css?family=Julius+Sans+One&display=swap" rel="stylesheet">
<div class="page_container">
	<?php
      if ($_SESSION['validUser'] == "yes") {

        ?>
        <div id="profile">
        <b id="welcome">Welcome : <i><?php echo $student_first_name; ?></i></b>
        <b id="logout"><a href="logout.php">Log Out</a></b>
        </div>
        <?php
        }
        else
        {
        ?>
 	<div class="page_container">
 	<div class="login-form">
	<form id="addStudent" name="addStudent" method="post" action="addStudent.php">
	  <h3>Student Information Insert Form</h3>
	  	<?php
	            //If the form was submitted and valid and properly put into database display the INSERT result message
				if($validForm)
				{
	        ?>
	      <h2><?php echo $message ?></h2>
	      	<?php
				}
				else	//display form
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
	        <!--<span class="error">* <?php echo $majorErrMsg;?></span>-->
	      </p>
	       <p>
	        <label for="student_portfolio">Portfolio:</label>
	        <input type="text" name="student_portfolio" id="student_portfolio" value="<?php echo $student_portfolio;  ?>">
	      </p>
	      <p>
	        <label for="student_linkedin">LinkedIn Account:</label>
	        <input type="text" name="student_linkedin" id="student_linkedin" value="<?php echo $student_linkedin;  ?>">
	      </p>  
	      <p>
	        <label for="student_secondary">Secondary:</label>
	        <input type="text" name="student_secondary" id="student_secondary" value="<?php echo $student_secondary; ?>">

	      </p>
	      <p>
	        <label for="student_hometown">Hometown:</label>
	        <input type="text" name="student_hometown" id="student_hometown" value="<?php echo $student_hometown;  ?>">
	      </p>
	      <p>
	        <label for="student_career_goals">Career Goals: </label>
	        <textarea type="text" name="student_career_goals" id="student_career_goals" value="<?php echo $student_career_goals;  ?>"></textarea>
	        <span class="error">* <?php echo $careerGoalsErrMsg;?></span>
	      </p>
	       <p>
	        <label for="student_hobbies">Hobbies:</label>
	        <textarea type="text" name="student_hobbies" id="student_hobbies" value="<?php echo $student_hobbies;  ?>"></textarea>
	        <span class="error">* <?php echo $hobbiesErrMsg;?></span>
	      </p>
	      <p>
	        <label for="student_state">State:</label>
	        <select id="student_state" name="student_state"><option value="---">---</option><option value="Alabama">Alabama</option><option value="Alaska">Alaska</option><option value="Arizona">Arizona</option><option value="Arkansas">Arkansas</option><option value="California">California</option><option value="Colorado">Colorado</option><option value="Connecticut">Connecticut</option><option value="Delaware">Delaware</option><option value="District of Columbia">District of Columbia</option><option value="Florida">Florida</option><option value="Georgia">Georgia</option><option value="Guam">Guam</option><option value="Hawaii">Hawaii</option><option value="Idaho">Idaho</option><option value="Illinois">Illinois</option><option value="Indiana">Indiana</option><option value="Iowa">Iowa</option><option value="Kansas">Kansas</option><option value="Kentucky">Kentucky</option><option value="Louisiana">Louisiana</option><option value="Maine">Maine</option><option value="Maryland">Maryland</option><option value="Massachusetts">Massachusetts</option><option value="Michigan">Michigan</option><option value="Minnesota">Minnesota</option><option value="Mississippi">Mississippi</option><option value="Missouri">Missouri</option><option value="Montana">Montana</option><option value="Nebraska">Nebraska</option><option value="Nevada">Nevada</option><option value="New Hampshire">New Hampshire</option><option value="New Jersey">New Jersey</option><option value="New Mexico">New Mexico</option><option value="New York">New York</option><option value="North Carolina">North Carolina</option><option value="North Dakota">North Dakota</option><option value="Northern Marianas Islands">Northern Marianas Islands</option><option value="Ohio">Ohio</option><option value="Oklahoma">Oklahoma</option><option value="Oregon">Oregon</option><option value="Pennsylvania">Pennsylvania</option><option value="Puerto Rico">Puerto Rico</option><option value="Rhode Island">Rhode Island</option><option value="South Carolina">South Carolina</option><option value="South Dakota">South Dakota</option><option value="Tennessee">Tennessee</option><option value="Texas">Texas</option><option value="Utah">Utah</option><option value="Vermont">Vermont</option><option value="Virginia">Virginia</option><option value="Virgin Islands">Virgin Islands</option><option value="Washington">Washington</option><option value="West Virginia">West Virginia</option><option value="Wisconsin">Wisconsin</option><option value="Wyoming">Wyoming</option></select>
	        <!--<span class="error">* <?php echo $stateErrMsg;?></span>-->
	      </p>

	      <p>
	        <label for="student_minor">Emphasis:</label>
	        <input type="text" name="student_minor" id="student_minor" value="<?php echo $student_minor; ?>">
	       
	      </p>
	      <p>
	        <label for="student_password">Password:</label>
	        <input type="text" name="student_password" id="student_password" value="<?php echo $student_password;  ?>">
	        <span class="error">* <?php echo $passwordErrMsg;?></span>
	      </p>
	       <p>
	        <label for="student_username">Username:</label>
	        <input type="text" name="student_username" id="student_username" value="<?php echo $student_username;  ?>">
	        <span class="error">*<?php echo $usernameErrMsg;?></span>
	      </p>
	     




	  <p>
	    <input type="submit" name="submit" id="button3" value="Submit Information">
	    <input type="reset" name="reset" id="reset" value="Reset">
	  </p>

	  	<a href="loginForm.php">Login</a> 

	   <?php
				}//end else
	        ?> 

	</form>
	</div>
	</div>

	<footer>
		<p>Copyright &copy; <script> var d = new Date(); document.write (d.getFullYear());</script> All Rights Reserved</p>
	</footer>
	</div>

</div>

<?php
      }
    ?>
<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>