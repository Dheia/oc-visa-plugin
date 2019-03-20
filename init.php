<?php

use Shohabbos\BookShop\Models\Order;
use Shohabbos\Visa\Models\Settings;

Event::listen('shohabbos.visa.orderCreated', function($order, &$result) {
     $result = '{
        "amount": '.$order->amount.',
        "id": '.$order->id.',
        "showVisaModal": true
    }';
});

Event::listen('shohabbos.visa.transactionApproved', function ($data) {
    // check order as paid or fill user balance
	$order = Order::find($data['order_id']);
	
	if ($order) {
	    $order->is_paid = 1;
    	$result = $order->save();
    	$order->sendLink();    
	}
	
});