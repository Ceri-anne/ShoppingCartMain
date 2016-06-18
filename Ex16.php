<?php

/*
TASK:

In Cart\Db add:
	transform_items()
	which takes a callback and applies it to each item, returning an entirely *new* cart
	(do not use a by-reference argument)
	
	use transform_items() to capitalize the name of all the items before they are displayed
	however do not overwrite $cart, or cart.db
	
	
Notice the new cart_application.php (Cart\App)
	All the code from cart_additem.php has been moved to cart_application.php
	Created Cart\App\add_item() with cart_additem's code in it, passing $cart to the function
	
	add_item()  returns an associative array ['new_item' => $new_item];
	
	
To index.php,
	changed _additem include to _applciation
	
	added 
	$view = \Cart\App\add_item($cart);
	
	call to display should now take the original array + $view_vars, 
	
	
TASK:
	create Cart\App\cleanup_users() with the cart_validate.php code
	
*/

