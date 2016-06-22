<?php
include 'lib/cart/db/cart_db.php';
include 'lib/cart/app/cart_app.php';
include 'lib/cart/view/cart_view.php';

$view_vars = \Cart\App\add_item($cart);


$lowercase = function ($item) {
	$item['name'] = strtolower($item['name']);
	return $item;
        };
?>


<!doctype html>
<html>
<head>
    <title>Shopping Cart</title>
    <link rel="icon" type="image/png"  href="img/shopping_cart_grey.png">
    <link rel="stylesheet" type="text/css" href="css/main.css" />
</head>
<body>
<div id="TopBanner">
    <h1>Shopping Cart <img src="img/shopping_cart_grey.png" alt="Shopping Cart"></h1>
    
</div>

<section id="User">
    <?php echo \Cart\View\display('user', ['users' => $users, 'cart' => $cart]); ?>
</section>
    
<section id="CartContents">
    <?php echo \Cart\View\display('item', ['new_item' => $view_vars['new_item']]); ?>
    <?php echo \Cart\View\display('items',  ['cart' => 
                    \Cart\Db\transform_items($cart, $lowercase)]); ?>
</section>

<section id="AllUsers">
    <h1>All Users</h1>
        <?php foreach($users as $username => $user) {
                printf("<li>%s</li>\n", $username);
        }
        ?>
</section>
</body>
</html>
