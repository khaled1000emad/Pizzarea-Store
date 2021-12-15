<?php
include 'db.php';
error_reporting(0);
session_start();

if($_COOKIE['auth'] != '63b2c9bbf98974515a88289f40bc7821'){
    die("<br><h1>Unauthorized</h1>\n_____________________________________________________________________________________________________________________________________________________________________________________________<br><br><h3><b>This portal is avaliable only for admin users</b></h3>");
}
else{
    $query = 'select * from customers_pizza order by id';
    $sql = mysqli_query($connection, $query);
    $results = mysqli_fetch_all($sql, MYSQLI_ASSOC);
    $id = $_POST['user-id'];
    if(isset($_POST['delete'])){
        $query2 = "DELETE FROM customers_pizza WHERE id=$id";
        if(!mysqli_query($connection, $query2)){
           die("An error occured, please try again");
        }
         
    }
    function say(){
        echo "HI";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="style-admin.css">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body class='bg-secondary'>
    
    <nav class="navbar navbar-expand-lg navbar-light bg-primary">
  <h2 class="navbar-brand" ><b>ِAdmin Area</b></h2>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <!-- <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a> -->
        <input value='Logout' type='submit' id='logout' class='btn btn-danger' onclick="logOut()">
      </li>
     
    </ul>
  </div>
</nav>
    <br>
    <?php foreach($results as $result){ ?>
        <div id='users-div'>
            <strong><p id='users-text'>User ID: <?php print_r($result['id']); ?>  <br> User Email: <?php print_r($result['email']); ?> </p></strong>
            <form method='POST'>
                <input type='submit' class='btn btn-danger' value='DELETE' name='delete' id='delete-btn'>
                <input type='hidden' name='user-id' value=<?php echo $result['id']; ?>>
            </form>
            
        </div>
        <?php }?>
      
</body>
<script src='script.js'></script>
</html>