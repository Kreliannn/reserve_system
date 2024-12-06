<?php session_start()?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link href="Assets\css\bootstrap.min.css" rel="stylesheet">
    <script src="Assets\js\bootstrap.bundle.min.js"></script>
    <script src="Assets\js\jquery-3.7.1.min.js"></script>

<style>
    .card{
        transition: ease ;
        transition-duration: 1s;
        box-shadow: 0 20px 40px gray;
        margin-left: 25vw;
        margin-top: 50px;
        width: 50vw;
    }
    .card:hover{
        box-shadow: 0 20px 40px rgb(55, 55, 55);
    }
</style>

</head>
<body>
<nav class="navbar navbar-expand-sm navbar-dark" style="background-color: darkblue;">
        <div class="container-fluid">
          <a class="navbar-brand" href="#"><img src="Assets\img\Local\ncst.png" width="30px"></a>
          <ul class="navbar-nav me-auto">
        <li class="nav-item">
          <a class="nav-link" href="customer_transaction.php">View Recent Transaction</a>
        </li></ul>
          <form class="d-flex">
          <a class="nav-link text-light" href="index.php">Logout</a>
      </form>
        </div>
      </nav>
      <br>


      <h1 class='text-center'> welcome <?=$_SESSION['user']['customer_name']?> </h1>



      <a href="food.php" style="text-decoration: none;">
      <div class="card  p-3 text-center">
        <div class="card-body"><img src="Assets\img\Local\store1.png" width="100px"></div>
        <div class="card-footer">Store 1 (foods)</div>
      </div>
      </a>

      <a href="drinks.php" style="text-decoration: none;">
        <div class="card  p-3 text-center bg-light">
          <div class="card-body"><img src="Assets\img\Local\store2.png" width="100px"></div>
          <div class="card-footer">Store 2 (drinks)</div>
        </div>
        </a>
</body>
</html>