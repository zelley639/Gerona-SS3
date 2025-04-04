<!DOCTYPE html>
<html>
<body>
<head>
    <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title> Sample Page </title>
   <style>
        body{
            background-color: aquamarine;
            text-align: center;
        }

        table {
            background-color: pink;
        }

        form {
            width: 300px;
            border: 10px solid black;
            margin: 20px auto;
            padding: 20px;
            background-color: white;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        

    </style>
</head>
<body>
      <h1>Select your order</h1>
   <table bgcolor="pink" align="center" border="1" width="50%">

      <tr>
         <th colspan="2">MENU</th>
         <th>FOOD PRICE</th>
      </tr>
      <tr>
        <td> <img src="https://cafejoanna.com/wp-content/uploads/2024/08/Mango-Ice-Cream-Sandwich-2-scaled.jpg" width="100px"> </td>
        <td> GRAHAM BAR </td>
        <td> ₱25</td>
      </tr>
      <tr>
        <td> <img src="https://sallysbakingaddiction.com/wp-content/uploads/2013/04/triple-chocolate-cake-4.jpg" width="100px"> </td>
        <td> CAKE </td>
        <td> ₱299</td>
      </tr>
      <tr>
        <td> <img src="https://sugarpursuit.com/wp-content/uploads/2022/06/Condensed-milk-ice-cream-thumbnail-500x500.jpg" width="100px"></td>
        <td> ICE MIK </td>
        <td> ₱89</td>
      </tr>
      <tr>
        <td> <img src="https://www.simplyrecipes.com/thmb/I4razizFmeF8ua2jwuD0Pq4XpP8=/1500x0/filters:no_upscale():max_bytes(150000):strip_icc()/__opt__aboutcom__coeus__resources__content_migration__simply_recipes__uploads__2019__09__easy-pepperoni-pizza-lead-4-82c60893fcad4ade906a8a9f59b8da9d.jpg" width="100px"></td>
        <td> PIZZA </td>
        <td> ₱199</td>
      </tr>
      <tr>
        <td> <img src="https://diethood.com/wp-content/uploads/2014/05/american-cheeseburger-7.jpg" width="100px"></td>
        <td> CHEESE BURGER </td>
        <td> ₱140</td>
      </tr>
    </table>  

    <form method="post">
        <h1>Select your order:</h1>
        <select name="order" id="order">
            <option value="1">Graham Bar - ₱25</option>
            <option value="2">Cake - ₱299</option>
            <option value="3">Ice Milk - ₱89</option>
            <option value="4">Pizza - ₱199</option>
            <option value="5">Cheese Burger - ₱140</option>
        </select>
        <br><br>
        
        <label for="quantity">Quantity:</label>
        <input type="number" name="quantity" id="quantity">
        <br><br>
        <label for="takeout">DineIn:</label>
        <input type="checkbox" name="dinein" id="takeout">
        <br>
        <label for="takeout">Takeout:</label>
        <input type="checkbox" name="takeout" id="takeout">
        <br>
        <input type="submit" value="Calculate Total">
    </form>

    <?php 
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $menu_items = ["GRAHAM BAR","Cake","Ice Milk","Pizza","Cheese Burger"];
        $prices = [25, 299, 89, 199, 140];

        $choice = intval($_POST["order"]);
        $quantity = intval($_POST["quantity"]);
        $is_takeout = isset($_POST["takeout"]);
        
        if ($choice < 1 || $choice > 5 || $quantity <= 0) {
            echo "<p>Invalid input!</p>";
            exit;
        }

        $order = $menu_items[$choice-1];
        $price = $prices[$choice-1];
        $subtotal = $price * $quantity;
        $tax = $is_takeout ? $subtotal * 0.12 : 0;
        $total_amount = $subtotal + $tax;
        $order_type = $is_takeout ? "Take-out" : "Dine-in";

        echo "<p>Item: $order</p>";
        echo "<p>Price: ₱" . number_format($price, 2) . "</p>"; 
        echo "<p>Subtotal: ₱" . number_format($subtotal, 2) . "</p>";
        echo "<p>Tax: ₱" . number_format($tax, 2) . "</p>"; 
        echo "<p>Total Amount: ₱" . number_format($total_amount, 2) . "</p>";
        echo "<p>Quantity: $quantity</p>";
        echo "<p>Order Type: $order_type</p>";
        
    }
    ?>
</body>
</html>
