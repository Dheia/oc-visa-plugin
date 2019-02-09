<?php namespace Shohabbos\Visa\Controllers;

use BackendMenu;
use Backend\Classes\Controller;
use System\Classes\SettingsManager;
use Shohabbos\Visa\Models\Settings;

class Transactions extends Controller
{
    public $implement = [
    	'Backend\Behaviors\ListController'
    ];
    
    public $listConfig = 'config_list.yaml';

    public $requiredPermissions = [
        'manage_transactions' 
    ];

    public function __construct()
    {
        parent::__construct();

        BackendMenu::setContext('October.System', 'system', 'settings');
        SettingsManager::setContext('Shohabbos.Visa', 'transactions');
    }

    public function handler() {
        $data = Input::all();

        // get vars 
        $password = Settings::get("password");
        $mer_id = Settings::get("mer_id");
        $acq_id = Settings::get("acq_id");


        // check sign
        $data = [
            'password' => Settings::get('password'),
            'merchant_id' => Settings::get('mer_id'),
            'acquirer_id' => Settings::get('acq_id'),
            'order_id' => $data['OrderID'],
            'amount' => $data['OrderID'],
            'currency' => Settings::get('currency'),
        ];
        
        $string = implode('', $data);
        $sign = base64_encode(sha1($string, true));


    }
    
}
