<?php include("includes/connection.php"); ?>
<?php
    $sql = "SELECT * FROM products";
    if (isset($_GET["order"])) {
        $order = $_GET["order"];
        if ($order == "name" || $order == 'price' || $order == "amount") {
            setcookie('order', $_GET["order"]);
        } else {
            unset($order);
        }
    }
        if (empty($order) && isset($_COOKIE['order'])) {
            $order = $_COOKIE['order'];
            if (!($order == "name" || $order == 'price' || $order == "amount")) {
                unset($order);
                setcookie('order', '', time());
            }
        }
        if (isset($order)) {
        $sql .= " ORDER BY " . $order;
        
    }
    $result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart</title>
    <link rel="stylesheet" href="style.css"/>
</head>
<body>
    
    <table>
        <thead>
            <th>id</th>
            <th> <a href="/index.php?order=name">Name</a>  </th>
            <th><a href="/index.php?order=price">Price</a>  </th>
            <th><a href="/index.php?order=amount">Quantity</a>  </th>
        </thead>
        <tbody>
        <?php
            
            while ($row = $result->fetch_assoc()) {
        ?>
            <tr>
                <td><?= $row["id"]?></td>
                <td><?= $row["name"]?></td>
                <td><?= $row["price"]?></td>
                <td><?= $row["amount"]?></td>
            </tr>
        <?php
            }
        ?>
        </tbody>
    </table>
</body>
</html>