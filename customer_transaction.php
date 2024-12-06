<?php
include "database_configure.second.php"; 

$all_orders = $database->get("select * from reserve_food where customer_student_id = ? ORDER BY reserve_id DESC", [$_SESSION['user']['username']], "fetchAll");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Store 1</title>
    <link href="Assets/css/bootstrap.min.css" rel="stylesheet">
    <script src="Assets/js/jquery-3.7.1.min.js"></script>
    <script src="Assets/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="food_and_drinks.css">
</head>
<body>
<input type="hidden" id='customer_id' value="<?=$_SESSION['user']['customer_id']?>">
<!-- NAVBAR -->
<nav class="navbar navbar-expand-sm navbar-dark" style="background-color: darkblue;">
    <div class="container-fluid">
        <a class="navbar-brand" href="index.php"><img src="Assets/img/Local/ncst.png" width="30px"></a>
        <ul class="navbar-nav me-auto">
            <li class="nav-item">
                <a class="nav-link" href="customer.php" style="color: white;">Back-></a>
            </li>
        </ul>
    </div>
</nav>

<div class="container mt-4">
        <h1 class="text-center mb-4"> orders </h1>
        
        <div id="orderList">
           <?php foreach($all_orders as $order): ?>
            <div class="card mb-3">
                <div class="card-body">

                    <div class="row">
                        <div class='col-10'>
                            <h5 class="card-title col-5">Customer: <?= $order['customer_name']?></h5>
                        </div>
                        
                        <div class='col'>
                            <form classs='col-5'action="cancel.order.php" method='post'> 
                                <input type="hidden"  name='reserve_id' value='<?=$order['reserve_id']?>'>
                                <input type="submit" value='cancel order' class='btn btn-danger ms-3'>
                            </form>
                        </div>
                        
                    </div>
                    
                    <p class="card-text">Student Number: <?= $order['customer_student_id']?> </p>
                    <p class="card-text">Pick-up Date: <?= $order['date']?></p>
                    <p class="card-text">Pick-up Time: <?= $order['time']?></p>
                      <?php $order_item = $database->get("select * from reserve_food_items where reserve_id = ?", [$order['reserve_id']], "fetchAll") ?>                    
                      <table class='table table-stripped' >
                        <tr>
                          <th> name </th>
                          <th> quantity </th>
                          <th> price </th>
                        </tr>
                        <?php foreach($order_item as $item):?>
                            <tr> 
                              <td> <?=$item['food_name']?> </td>
                              <td> <?=$item['quantity']?> </td>
                              <td> <?=$item['price']?> </td>
                            </tr>
                        <?php endforeach?>
                      </table>
                      <?php 
                        $statusClass = match($order['status']) {
                            "waiting" => "alert-primary",
                            "completed" => "alert-success",
                            default => "alert-danger",
                        };
                    ?>
                    <h1 class='text-center alert <?= $statusClass ?>'> <?= htmlspecialchars($order['status']) ?> </h1>

                </div>
            </div>
            <?php endforeach; ?>
  
        </div>
    </div>



</body>
</html>