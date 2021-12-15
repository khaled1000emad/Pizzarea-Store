<?php 
include 'db.php';

session_start();
$email = $password = '';
$err="";
$flag=20;
$admin_mail = 'admin@pizzarea.org';
if(isset($_POST['login']))
{   
   
    $_SESSION['email'] = $_POST['email'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $query = "SELECT pass1 FROM customers_pizza WHERE email = '$email'; ";
    $result = mysqli_query($connection, $query);
    $passwords = mysqli_fetch_all($result, MYSQLI_ASSOC);
    
    if(empty($passwords)){
        $err="Wrong credentials";
        $flag=1;
    }
    else{
        if($password == $passwords[0]['pass1']){
            if($_POST['email'] == $admin_mail){
                setcookie('auth', '63b2c9bbf98974515a88289f40bc7821'); //auth_as_admin
                header('Location: admin.php');
            }
            else{
                $query2 = "SELECT * FROM customers_pizza WHERE email = '$email'; ";
                $result2 = mysqli_query($connection, $query2);
                $ids = mysqli_fetch_assoc($result2);
                header('Location: index.php?id='.$ids['id']);
                setcookie('auth','dc5b2886959161589717ccb656e63246'); //auth_as_user
            }
            
            
        }
        else{
            $err="Wrong credentials";
            $flag=1;
        }
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
    <link rel="stylesheet" href="style-sign.css">
</head>
<body class="bg-secondary" id="bodyId">
    <div id="header">
        <div id="header-title"><h2 class="navbar-brand" ><b>Pizzarea Store</b></h2></div>
       
    </div>
    <div id="outter-form" class="bg-light">
        <div id="inner-form">
            <h3 class="text-center " id="Login">Login </h3>
            <div id="err" ><?php if($flag == 1){echo '<p style="color: #721c24; background-color: #f8d7da; border-color: #f5c6cb; border: 1px solid transparent; border-radius: 0.25rem; padding: 0.75rem 1.25rem;">'.$err.'</p>';}else if($flag == 0){echo '<p style="color: #155724; background-color: #d4edda; border-color: #c3e6cb; border: 1px solid transparent; border-radius: 0.25rem; padding: 0.75rem 1.25rem;">'.$err.'</p>';} ?></div>
            
            <form id="form" method="POST" >
                <div class="mb-3">
                    <label for="email" class="form-label">Email address</label>
                    <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" required value=<?php echo $email; ?>>
                </div>
                <br>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password" required value=<?php echo $password; ?>>
                </div>
                <br>
                <br>
                <input type="submit" class="btn btn-primary" id="btn-log" value="Login" name="login"></input>
                <p>New User ? <a href="register.php">Register now</a></p>
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