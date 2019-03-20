<?php namespace Shohabbos\Visa\Components;

use Cms\Classes\ComponentBase;
use Shohabbos\Visa\Models\Settings;

/**
 * User session
 *
 * This will inject the user object to every page and provide the ability for
 * the user to sign out. This can also be used to restrict access to pages.
 */
class PayForm extends ComponentBase
{

    public function componentDetails()
    {
        return [
            'name'        => 'VISA FORM',
            'description' => 'Visa payment form'
        ];
    }

    public function onRun() {
    	$amount = $this->getAmountInUsd(input('amount'));
    	$amount = $this->generateVisaAmount($amount);

        $data = [
	        'password' => Settings::get('password'),
	        'merchant_id' => Settings::get('mer_id'),
	        'acquirer_id' => Settings::get('acq_id'),
	        'order_id' => input('order_id'),
	        'amount' => $amount,
	        'currency' => Settings::get('currency'),
	    ];
	    
	    $string = implode('', $data);

	    // set data
	    $this->page['data'] = $data;
	    $this->page['sign'] = base64_encode(sha1($string, true));
        $this->page['handler'] = url(Settings::get('handler'));
    }

    public function generateVisaAmount($amount) {
    	$amount = str_replace(".", "", $amount);
    	$amount = str_pad($amount, 12, '0', STR_PAD_LEFT);

    	return $amount;
    }
    
    public function getAmountInUsd($amount) {
    	$rate = Settings::get('rate');

    	return round($amount / $rate, 2);
    }
}
