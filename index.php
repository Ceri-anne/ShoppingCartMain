<?php
include 'cart_db.php';
include 'cart_application.php';

const TEMPLATE_EXTENSION = '.phtml';
const TEMPLATE_FOLDER = 'templates/';
const TEMPLATE_PREFIX = 'cart_view_';


function display($template, $variables, $extension = TEMPLATE_EXTENSION) {
	extract($variables);
	
	ob_start();
	include TEMPLATE_FOLDER . TEMPLATE_PREFIX . $template . $extension;
	return ob_get_clean();
}

$view_vars = \Cart\App\add_item($cart);

?>


<!doctype html>
<html>
<head>
    <title>Shopping Cart</title>
    <link rel="stylesheet" type="text/css" href="css/main.css" />
</head>
<body>
<div id="TopBanner">
    <h1>Shopping Cart</h1>
    <img src="img/shopping_cart_grey.png" alt="Shopping Cart">
</div>
    
<?php echo display('user', ['users' => $users, 'cart' => $cart]); ?>
<?php echo display('item', ['new_item' => $view_vars['new_item']]); ?>
<?php echo display('items',  ['cart' => 
                \Cart\Db\transform_items($cart, $callback)]); ?>

<h1>All Users</h1>
<?php foreach($users as $username => $user) {
	printf("<li>%s</li>\n", $username);
}
?>

</body>
</html>
