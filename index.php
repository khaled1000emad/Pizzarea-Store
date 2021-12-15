<?php
session_start();
include 'db.php';
//auth_as_user
if($_COOKIE['auth'] != 'dc5b2886959161589717ccb656e63246' ){
  header('Location: sign.php');
}

$name = $_SESSION['email'];
$strings = explode('@', $name);
$username =  $strings[0];

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=\, initial-scale=1.0">
  <link rel="stylesheet" href="css/bootstrap.css">
  <link rel="stylesheet" href="style-sign.css">
  <title>Document</title>
</head>
<body class="bg-secondary" id="bodyId">
  
<nav class="navbar navbar-expand-lg navbar-light bg-primary">
  <h2 class="navbar-brand" ><b>Pizzarea Store</b></h2>
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
  <div id='welcome-message'>
    <?php echo 'Welcome '.$username.', Looking for a nice dinner today ?'; ?>
  </div>
  
  <div class="row row-cols-1 row-cols-md-2 g-4">
  <div class="col">
    <div class="card">
      
      <div class="card-body">
        <h5 class="card-title"><b>Cheese Lover $15</b></h5>
        <hr>
        <p class="card-text">Meet our well-collected sets of cheese all mixed together to give you cheese bomb in your mouth that you have never tasted.</p>
        <br>
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
            Order Now !
        </button>
        
      </div>
    </div>
  </div>
  <div class="col">
    <div class="card">
     
      <div class="card-body">
        <h5 class="card-title"><b>Super Supreme $20</b></h5>
        <hr>
        <p class="card-text">This pizza is our most ordered as it have our finest meats mixedd together with an addition of our special ranch sauce .</p>
        <br>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
            Order Now !
        </button>
      </div>
    </div>
  </div>
  <div class="col">
    <div class="card">
      
      <div class="card-body">
        <h5 class="card-title"><b>Stuffed Crust $25</b></h5>
        <hr>
        <p class="card-text">Chicken pizza with hotdogs stuffed in its crust layered in cheddar cheese</p>
        <br>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
            Order Now !
        </button>
      </div>
    </div>
  </div>
  <div class="col">
    <div class="card">
      
      <div class="card-body">
        <h5 class="card-title"><b>Pizzarea Special $35</b></h5>
        <hr>
        <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
        <br>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
            Order Now !
        </button>
      </div>
    </div>
  </div>
</div>

<!-- Modal Code -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Order Details</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method='POST'>
          <input type='text' name='address' required placeholder='Address ...'>
          <br>
          <br>
          <input type='number' name='pizzas' required placeholder='Quantity ...'>
          <br>
          <br>
          <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <!-- <button type="submit" class="btn btn-primary">Place Order</button> -->
          <input type='submit' name='submit' class='btn btn-primary' value='Place Order'>
          </div>
        </form>
      </div>
      
    </div>
  </div>
</div>
    <!-- End of modal code -->
</div>
  
  
  <footer class="text-light" id="footer">Copyright 2021 Pizzarea Store</footer>
  <script src="script.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/jquery-3.6.0.min.js"></script>
  <script src="js/bootstrap.js"></script>
</body>
</html>