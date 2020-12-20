<?php
    require dirname(__DIR__).'\db.php';
    $id=$_GET['item'];
    $location=$_GET['location'];
    if(isset($_SESSION['cart'][$id]))
    { 
        $_SESSION['cart'][$id]['quantity']++; 
    }
    else
    {
        $query=mysqli_query($link, "SELECT * FROM items
        WHERE id=$id");
        $item = mysqli_fetch_assoc($query);
        if(isset($item))
        { 
            $_SESSION['cart'][$item['id']] =
            array("quantity" => 1,
            "name" => $item['name'],
            "price" => $item['price']);
        }
    }
    header('Location: /'. $location .'');
