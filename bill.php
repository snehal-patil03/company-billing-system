<?php include 'db.php'; ?>

<form method="post">
    Product:
    <select name="product">
        <?php
        $res = mysqli_query($conn, "SELECT * FROM products");
        while($row = mysqli_fetch_assoc($res)){
            echo "<option value='{$row['name']}'>{$row['name']} - {$row['price']}</option>";
        }
        ?>
    </select><br>

    Quantity: <input type="number" name="qty"><br>
    <input type="submit" name="bill" value="Generate Bill">
</form>

<?php
if(isset($_POST['bill'])){
    $product = $_POST['product'];
    $qty = $_POST['qty'];

    $res = mysqli_query($conn, "SELECT * FROM products WHERE name='$product'");
    $row = mysqli_fetch_assoc($res);

    $total = $row['price'] * $qty;

    mysqli_query($conn, "INSERT INTO bills(product_name, quantity, total) 
    VALUES('$product','$qty','$total')");

    echo "Total Bill: ₹" . $total;
}
?>