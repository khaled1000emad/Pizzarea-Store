<?php 
    include 'db.php';
    $connection =  mysqli_connect('localhost', 'root', '', 'customers_db');
    $pass_err="";
    $flag=20;
    $email = $pass = $pass2 = '';
    if(isset($_POST['register']))
    {
        $pass=mysqli_real_escape_string($connection, $_POST['password']);
        $pass2=mysqli_real_escape_string($connection, $_POST['password2']);
        $email = mysqli_real_escape_string($connection, $_POST['email']);
        if($pass != $pass2)
        {
            $pass_err="Two passwords does not match";
            $flag=1;
        }
        else if($pass == $pass2){
           if(checkEmail($email)){
                $query = "INSERT INTO customers_pizza(email, pass1, pass2) VALUES('$email', '$pass', '$pass2');";
                if(mysqli_query($connection, $query)){
                    $pass_err = "User Created Succesfully";
                    $flag = 0;
                }
                else{
                    echo "Query error";
                }
           }
           else{
               $pass_err = "Email already exists";
                $flag = 1;
           }
            
           
        }

        
    }
    
function checkEmail($Email){
    $connection =  mysqli_connect('localhost', 'root', '', 'customers_db');
    $sql = "SELECT * FROM customers_pizza WHERE email='$Email';";
    $result = mysqli_query($connection, $sql);
    $emails = mysqli_fetch_all($result, MYSQLI_ASSOC);
    //print_r($emails);
    if(empty($emails)){
        return True;
    }
    else{
        return False;
    }
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pizzarea Store</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="style.css">
</head>
<body class="bg-secondary" id="bodyId">
    <div  id="header">
    <div id="header-title"><h2 class="navbar-brand" ><b>Pizzarea Store</b></h2></div>
        
    </div>
    <div id="outter-form" class="bg-light">
        <div id="inner-form">
            <h3 class="text-center " id="register">Register Now </h3>
            <div id="err" ><?php if($flag == 1){echo '<p style="color: #721c24; background-color: #f8d7da; border-color: #f5c6cb; border: 1px solid transparent; border-radius: 0.25rem; padding: 0.75rem 1.25rem;">'.$pass_err.'</p>';}else if($flag == 0){echo '<p style="color: #155724; background-color: #d4edda; border-color: #c3e6cb; border: 1px solid transparent; border-radius: 0.25rem; padding: 0.75rem 1.25rem;">'.$pass_err.'</p>';} ?></div>
            
            <form id="form" method="POST" action="register.php">
                
                <div class="mb-3">
                    <label for="email" class="form-label">Email address</label>
                    <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" required value="<?php echo $email; ?>">
                    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                </div>
                <br>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password" required value="<?php echo $pass; ?>">
                </div>
                <br>
                <div class="mb-3">
                    <label for="password2" class="form-label">Repeat Password</label>
                    <input type="password" class="form-control" id="password2" name="password2" required value="<?php echo $pass2; ?>">
                </div>
                <br>
                <button type="submit" class="btn btn-primary" id="btn-reg" value="Register" name="register">Register</button>
                <p>already a user? <a href="sign.php">Login now</a></p>
            </form>
        </div>
    </div>
   
    <footer class="text-light" id="footer">Copyright 2021 Pizzarea Store</footer>









    <script src="script.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/jquery-3.6.0.min.js"></script>
    <script src="js/bootstrap.js"></script>
    
</body>
</html>