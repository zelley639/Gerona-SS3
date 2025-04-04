<?php
// Sample menu data (replace with your actual menu)
$menu = [
  "Graham Bar" => 25,
  "Cake" => 99.9,
  "Mango Float" => 55,
  "Coca Cola" => 35,
  "Halo Halo" => 89,
];

$order = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  foreach ($menu as $item => $price) {
    if (isset($_POST[$item]) && isset($_POST[$item . "_quantity"]) && is_numeric($_POST[$item . "_quantity"])) {
      $quantity = (int)$_POST[$item . "_quantity"]; // Cast to integer for safety
      $order[$item] = $quantity;
    }
  }
}

function calculateTotal($order, $menu) {
  $total = 0;
  foreach ($order as $item => $quantity) {
    $total += $menu[$item] * $quantity;
  }
  return $total;
}
?>

<!DOCTYPE html>
<html>
<head>
<title> Food Order</title>
<style>

.item { margin-bottom: 10px;
       align-checkbox: center; }

/* Basic styling */
body { font-family: sans-serif; }
        label { display: block; margin-bottom: 5px; }
        input, select { width: 100%; padding: 8px; margin-bottom: 10px; }
        button { background-color: #ff3399; color: white; padding: 10px; border: none; cursor: pointer; }
        #result { margin-top: 20px; font-weight: bold; }
    
body {
    font-family: sans-serif;
    background-color: lightgreen;
}
.container {
    width: 500px;
    margin: 0 auto;
    padding: 20px;
    border: 1px solid #17100f;
    border-radius: 5px;
    shadow: 50px;
    background-color:pink;
    box-shadow: 0 0 10px rgba(1, 1, 1, 1.1);
}
h1 {
    text-align: center;
}
label {
    display: block;
    margin-bottom: 5px;
}
input[type="number"] {
    width: 100%;
    padding: 8px;
    margin-bottom: 10px;
    border: 1px solid #ccc;
    box-sizing: border-box;
}
select {
    width: 100%;
    padding: 8px;
    margin-bottom: 10px;
    border: 1px solid #ccc;
    box-sizing: border-box;
}
input[type="radio"] {
    margin-right: 5px;
}
button {
    background-color: #4CAF50;
    color: white;
    padding: 10px 15px;
    border: none;
    cursor: pointer;
}
#result {
    margin-top: 20px;
    font-weight: bold;
    text-align: center;
}

</style>
</head>
<body>
<div class="container">
<h1>ORDER HERE</h1>

<form method="post">
  <?php foreach ($menu as $item => $price): ?>
    <div class="item">
      <label for="<?php echo $item; ?>"><?php echo $item; ?> ($<?php echo number_format($price, 2); ?>)</label>
      <input type="number" id="<?php echo $item; ?>_quantity" name="<?php echo $item; ?>_quantity" value="0" min="0">
      <input type="checkbox" id="<?php echo $item; ?>" name="<?php echo $item; ?>" value="true"> Add to Order
    </div>
  <?php endforeach; ?>

  <button type="submit">Place Order</button>
</form>

<h2>Your Order</h2>
<?php if (!empty($order)): ?>
  <ul>
    <?php foreach ($order as $item => $quantity): ?>
      <li><?php echo $item; ?> x <?php echo $quantity; ?></li>
    <?php endforeach; ?>
  </ul>
  <p>Total: $<?php echo number_format(calculateTotal($order, $menu), 2); ?></p>
<?php else: ?>
  <p>Your order is empty.</p>
<?php endif; ?>

</body>
</html>