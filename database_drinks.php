<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Store 2</title>
    <link href="Assets\css\bootstrap.min.css" rel="stylesheet">
    <script src="Assets\js\bootstrap.bundle.min.js"></script>
    <script src="Assets\js\jquery-3.7.1.min.js"></script>

</head>
<body>

<!-- NAVBAR SA TAAS-->
  <nav class="navbar navbar-expand-sm navbar-dark" style="background-color: darkblue;">
    <div class="container-fluid">
      <a class="navbar-brand" href="index.php"><img src="Assets\img\Local\ncst.png" width="30px"></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="mynavbar">
        <ul class="navbar-nav me-auto">
          <li class="nav-item">
            <a class="nav-link" href="database_food.php" style="color: white;">Store 1</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="database_drinks.php" style="color: white;">Store 2</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="employee.reserve_order.php" style="color: white;"> reserve food </a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <h1 class="text-center mt-4"> DRINKS </h1>

  <table class="table table-bordered table-hover table-striped">
    <thead>
      <tr>
        <th>Drinks</th>
        <th>Price</th>
        <th>Stocks</th>
      </tr>
    </thead>
    <tbody id=drinks></tbody>
  </table>
  <script>
    function server(){
      $.ajax({
        type: "POST",
        url: "fetch_drinks.php",
        success: function (response) {
          if(response.length > 0){
            let object = JSON.parse(response)
            // Loop throught JSON data to append rows to the table
            object.forEach(function(object){
              $("#drinks").append(`
                <tr>
                  <td>${object.Drink_Name}</td>
                  <td>${object.Drink_Price}</td>
                  <td>${object.Drink_Quantity}</td>
                </tr>
              `)
            })
          } else {
            $("#drinks").append(`
              <div class='alert alert-danger'>
                No data available
              </div>
            `)
          }
        }
      })
    }
    $(document).ready(server())
  </script>
</body>
</html>
<?php

?>