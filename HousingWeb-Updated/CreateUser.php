<?php include 'HTMLDatabaseFunctions.php';



   function NewUser()
{
	$FName = $_POST['FName'];
    $LName = $_POST['LName'];
	$email = $_POST['email'];
	$password =  $_POST['password'];
	$cPassword = $_POST['cPassword'];
	$cMail = $_POST['cMail'];
	global $conn;
    /*$sql = "SELECT * FROM users WHERE username='$username'";*/
    /*$qry=mysqli_query($conn, $sql);*/
    
    $sql = "INSERT INTO users (FName, LName, email, password)
            VALUES ('$FName','$LName', '$email', '$password')";

    if ($conn->query($sql) === TRUE) {
    
    echo '<script language="javascript">'; #run script to confirm reservation has been made
    echo 'alert("Your account has been created sucessfully");';
    echo 'window.location.href = "../index/index.php";'; #redirect to search page
    echo '</script>';
    
    header("location: index.html");
    
    
} else {
    
    echo '<script language="javascript">'; #run script to confirm reservation has been made
    echo 'alert("You already have an account");';
    echo 'window.location.href = "../index/index.php";'; #redirect to search page
    echo '</script>';
}
    
    

}

/*__________________________________Ignore this code_________________________*/
/*if (!$check1_res) {
printf("Error: %s\n", mysqli_error($conn));
exit();
}
    
    $row=mysqli_fetch_array($qry);
    while($row){
    
    
    if(($row['username'] == '') && ($cPassword == $password)){
        
            $iSql = "INSERT INTO users (username, password, email)
            VALUES ($username,$password,$email)";
            
            $ins = mysqli_query($conn, $iSql); 
            
            
}
}
}*/



    function SignUp()
{
    if(!empty($_POST['username']))   //checking the 'user' name which is from Sign-Up.html, is it empty or have some text
{
    $sql = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
	$qry = mysqli_query($conn, $sql ) or die(mysqli_error());
    $row=mysqli_fetch_array($conn, $qry);
    if(($row['username'] == '') && ($cPassword == $password))
	{
		NewUser();
		
	}
	else
	{
		echo "SORRY...This email already has a user account associated with it...";
	}
}
}

	NewUser();





exit();


?>