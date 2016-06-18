<?php
namespace Cart\Db;

// CART "DATABASE"
$users = ['sholmes' => [
			'id' => 1001,
			'email' => 'sherlock@example.com',
			'postcode' => 'AA10 1AA',
		],
		'watson' => [
			'id' => 1002,
			'email' => 'drwatson`@example.com',
			'postcode' => 'BB10 A1B',
		]
	];

$camera = [
	'name' => 'Sony A7S',
	'price' => 1700
];

$lens = [
	'name' => 'Samyang 35mm',
	'price' => 400
];

$cart = [
	'user' => 'sholmes',
	'items' => [$camera, $lens]
];



// CART FUNCTIONS
function create_item(&$cart, $item) {
	array_push($cart['items'], $item);
	
	return count($cart) - 1;
}

function read_item_id($cart, $item_id) {
	return $cart[$item_id];
}

function read_item_name($cart, $item_name) {
	foreach($cart['items'] as $item) {
		if($item['name'] == $item_name) {
			return $item;
		}
	}
}

function delete_item(&$cart, $item_id) {
	unset($cart[$item_id]);
}

function delete_user(&$users, $username) {
	unset($users[$username]);
}


function update_item(&$cart, $item_id, $new_item) {
	$cart[$item_id] = $item;
}



// IO FUNCTIONS


const DATABASE_EXTENSION = '.db';
const DATABASE_NAME = 'cart';

function save_cart($cart, $dbname = DATABASE_NAME) {
	return file_put_contents($dbname . DATABASE_EXTENSION, serialize($cart));
}


function load_cart($dbname = DATABASE_NAME) {
	return unserialize(file_get_contents($dbname . DATABASE_EXTENSION));
}


//LOAD CART


if(file_exists(DATABASE_NAME . DATABASE_EXTENSION)) {
	$cart = load_cart();
}


function transform_items($cart,$callback){
    
    $cart['items'] = array_map($callback,$cart['items']);
    return $cart;
}


$callback = function ($item) {
	$item['name'] = strtolower($item['name']);
	return $item;
};

function cart_total($cart) {
    $cart_total=0;
	foreach($cart['items'] as $item) {
            $cart_total += $item['price'];
        }            
    return $cart_total;
}
