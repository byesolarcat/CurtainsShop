<?php
    require dirname(__DIR__).'\db.php';
    if (isset($_SESSION['cart']))
    {
        $userid = $_COOKIE['userid'];
        $checkoutprice = $_SESSION['order']['price'];
        $query = mysqli_query($link, "INSERT INTO orders(userid, price) VALUES ('$userid', '$checkoutprice')");
        $ordernumber = mysqli_query($link,
        "SELECT MAX(orderid) as 'orderid'
            FROM orders
            WHERE userid = $userid
        LIMIT 1");
        $orderid = mysqli_fetch_assoc( $ordernumber)['orderid'];
        foreach($_SESSION['cart'] as $item)
	    {
            $itemid = current(array_keys($_SESSION['cart']));
            $quantity = $item['quantity'];
            mysqli_query($link, "INSERT INTO orderscontent(orderid, itemid, quantity) VALUES ($orderid, $itemid, $quantity)");
            next(array_keys($_SESSION['cart']));
        }
        unset($_SESSION['cart']);
        echo '<script> alert("Ваш заказ '.$orderid.' принят!");
        window.location.href = "/index.php"</script>;';
    }
    else
    {
        echo '<script>window.location.href = "/index.php"</script>;';
    }
?>