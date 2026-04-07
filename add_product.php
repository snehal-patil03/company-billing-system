<?php include 'db.php'; ?>

<form method="post">
    Product Name: <input type="text" name="name"><br>
    Price: <input type="number" name="price"><br>
    <input type="submit" name="submit" value="Add Product">
</form>

<?php
if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $price = $_POST['price'];

    mysqli_query($conn, "INSERT INTO products(name, price) VALUES('$name','$price')");
    echo "Product Added!";
}
?>