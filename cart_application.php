<?php
namespace Cart\App;
include 'cart_validation.php';



use function Cart\Db\create_item, 
			 Cart\Db\save_cart,
			 Cart\Db\read_item_name;
			 
use function Cart\Db\delete_user,
			 Cart\Validation\postcode_valid;

function add_item(&$cart) {

	$new_id = create_item($cart, [
		'name' => 'HTC m8',
		'price' => 500
	]);
	
	save_cart($cart);

	return ['new_item' => read_item_name($cart, 'HTC m8')];
}

function clean_up(&$users){
    foreach($users as $username => $user) {
            if(!postcode_valid($user['postcode'])) {
                    delete_user($users, $username);
            }
    }
}

?>
