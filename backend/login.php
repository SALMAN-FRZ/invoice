<?php
if(isset($_POST['btnLogin'])){

        include_once ("../dbConnect.php");
       

 

	if(isset($_POST['user_id']) && isset($_POST['final_password']))
                  		{
			// Get email in text feild
		    $user_id=mysqli_real_escape_string($con,$_POST['user_id']);
	
			// Get final password that are append random number and hashed in text feild
	  	   $user_password=mysqli_real_escape_string($con,$_POST['final_password']);
	
			// Get random number or salt key in text feild
            $random_number=mysqli_real_escape_string($con,$_POST['random_number']);
            

            	//	using prepare statement when selecting password
		$query_select_password = $con->prepare("SELECT id,user_name,password
            FROM credential
            WHERE user_name = ? ");
		
		// binding parameter s-> string  , type of feild
		$query_select_password->bind_param("s", $_POST['user_id']);
		$query_select_password->execute();
		$result = $query_select_password->get_result();
		
		//fetching result would go here, but will be covered later
			if($result->num_rows === 0) {
				
				// function of creating session in session_manager.php
					session_destroy();
				header('Location: ../login.php?login=usfalse');
				return;
            }
            
            //feching data in loop
			while($row = $result->fetch_assoc()) {
				
				//get password in database where login_id is same
				$password = $row['password'];
                
                
              
				// append database password and random_number of front_end
				$append_passwodrd=$password.$random_number;
				
				// hashing the append password in database
				$final_password_Db= hash('sha256', $append_passwodrd);
				
				//checking append user given password and database password 
				if($final_password_Db==$user_password){
					
                 
					 
		 
					

					 $_SESSION['login_id']=$user_id;
                  
                      //check role 
                    // if($role===1){
						header('Location: ../dashboard.php');
						return;
                    // } 
					



					
					
					
				}
				else{
					
					// session distroy when password is not correct entered
					session_destroy();
					header('Location: ../login.php?login=psfalse');
					
					return;
				}
				
			}
		
            
                          }

}