<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Store 2</title>
    <link href="Assets\css\bootstrap.min.css" rel="stylesheet">
    <script src="Assets\js\bootstrap.bundle.min.js"></script>
    <script src="Assets\js\jquery-3.7.1.min.js"></script>
    <link rel="stylesheet" href="food and drinks.css">

</head>
<body>

<!-- NAVBAR SA TAAS-->
<nav class="navbar navbar-expand-sm navbar-dark" style="background-color: darkblue;">
        <div class="container-fluid">
          <a class="navbar-brand" href="index.php"><img src="Assets\img\Local\ncst.png" width="30px"></a>
          <ul class="navbar-nav me-auto">
          <li class="nav-item">
            <a class="nav-link" href="customer.php" style="color: white;">Back-></a>
          </li>
        </ul>
        </div>
      </nav>

  <h1 class="text-center mt-4"> DRINKS </h1>

  <!-- MENU SA DRINKS-->
  <div class="grid" id="drinks"></div>
  <!-- DISPLAY DRINKS -->
  <script>
    function server(){
      $.ajax({
        type: "POST",
        url: "fetch_drinks.php",
        success: function (response) {
          if(response.length > 0){
            let object = JSON.parse(response)
            console.log(object)
            // Loop throught JSON data to append rows to the table
            object.forEach(function(Drink){
              $("#drinks").append(`
                <div class='card p-3 text-center'>
                                    <div class='card-body'>
                                        <img src="${Drink.Drink_Thumbnail}" width='150px'>
                                    </div>
                                    <div class="card-footer">
                                        <b>${Drink.Drink_Name}</b><br>
                                        Price: P ${Drink.Drink_Price}
                                        <br>
                                        <!-- Quantity Selector -->
                                        <label for="quantity-${Drink.Drink_ID}">Quantity:</label>
                                        <select class="form-select" id="quantity-${Drink.Drink_ID}" data-id="${Drink.Drink_ID}" data-name="${Drink.Drink_Name}" data-price="${Drink.Drink_Price}">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                        </select>
                                        <button class='btn btn-warning text-light add-to-cart mt-2' data-id="${Drink.Drink_ID}" data-name="${Drink.Drink_Name}" data-price="${Drink.Drink_Price}">Add to Cart</button>
                                    </div>
                                </div>
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
    $(document).ready(()=>{


      server();

      // Cart data initialization
      let cart = [];
        let totalPrice = 0;

        // Add item to cart
        $(document).on('click', '.add-to-cart', function () {
            let id = $(this).data("id");
            let name = $(this).data("name");
            let price = parseFloat($(this).data("price"));
            let quantity = parseInt($(`#quantity-${id}`).val());  // Get the selected quantity

            // Check if the item is already in the cart
            let itemIndex = cart.findIndex(item => item.id === id);
            if (itemIndex >= 0) {
                // Item is already in cart, increase quantity
                cart[itemIndex].quantity += quantity;
            } else {
                // Item is not in cart, add it with the selected quantity
                cart.push({
                    id: id,
                    name: name,
                    price: price,
                    quantity: quantity
                });
            }

            // Update cart display and total price
            updateCart();
        });

        // Remove item from cart
        $(document).on('click', '.remove-from-cart', function () {
            let id = $(this).data("id");

            // Find the item in the cart and remove it
            cart = cart.filter(item => item.id !== id);

            // Update cart display and total price
            updateCart();
        });

        // Function to update cart display and total price
        function updateCart() {
            let cartList = $(".list");
            cartList.empty(); // Clear the cart list
            totalPrice = 0;  // Reset total price

            cart.forEach(function (item) {
                cartList.append(`
                    <li>${item.name} - P ${item.price} x ${item.quantity} 
                        <button class="btn btn-danger btn-sm remove-from-cart" data-id="${item.id}">Remove</button>
                    </li>
                `);
                totalPrice += item.price * item.quantity;
            });

            // Update total price and cart display
            $("#total").html(`<h5>Total: P ${totalPrice.toFixed(2)}</h5>`);
        }

       
    })
  </script>
<br><br>
  <!-- NAVBAR SA IBABA -->
  <div id="parent" class="container-fluid px-4">
    <div class="list"><h6>Order List: </h6></div>
    <hr id="hrline">
    <ul>
        <div id="total">
            <h5 id='total_price'>Total: 0</h5>
        </div>
        <div>
            <input type="time" id="time" name="time" class='form-control'required>
            <select name="" id="date" class='form-control'>
                <option value="today"> today </option>
                <option value="tommorow"> tommorow </option>
                <option value="2days"> sa isang araw hahaha </option>
            </select>
            <br>
            <button class="btn btn-success text-light" style="width: 100%;" href="payment.php" id="paymentbot">Proceed to Payment -></button>
        </div>
       
    </ul>
</div>

</body>
</html>