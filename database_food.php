<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link href="Assets\css\bootstrap.min.css" rel="stylesheet">
    <script src="Assets\js\bootstrap.bundle.min.js"></script>
    <script src="Assets\js\jquery-3.7.1.min.js"></script>
    <title>Store 1</title>

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

  <h1 class="text-center mt-4"> FOOD </h1>

  <table class="table table-bordered table-hover table-striped">
    <thead>
      <tr>
        <th>Food</th>
        <th>Price</th>
        <th>Stocks</th>
      </tr>
    </thead>
    <tbody id="food"></tbody>
  </table>
  <script>
    function server(){
      $.ajax({
        type: "POST",
        url: "fetch_food.php",
        success: function (response) {
          if(response.length > 0){
            let object = JSON.parse(response)
            // Loop throught JSON data to append rows to the table
            object.forEach(function(object){
              $("#food").append(`
                <tr>
                  <td>${object.Food_Name}</td>
                  <td>${object.Food_Price}</td>
                  <td> <form action='updateFoodStock.php' method="post"> <input type='number'  value='${object.Food_Quantity}' name='product_stock'>   <input type='hidden' name='product_id'   value='${object.Food_ID}'> <input type='submit' class='btn btn-primary'> </form></td>
                </tr>
              `)
            })
          } else {
            $("#food").append(`
              <div class='alert alert-danger'>
                No data available
              </div>
            `)
          }

        /*
        $(".save").click((event)=>{
          let product_info = JSON.parse(event.target.value);
          console.log(product_info)
          $.ajax({
            url : "updateFoodStock.php",
            method : "post",
            data : {
              product_id : product_info[0],
              product_stock : product_info[1]
            },
            success : (response) => {

              alert(response)
              window.location.reload()
            }
          })
        })*/
      
        }
      })
    }
    $(document).ready(()=>{
      server()


    })
  </script>
</body>
</html>