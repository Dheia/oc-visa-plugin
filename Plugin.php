<?php namespace Shohabbos\Visa;

use Backend;
use System\Classes\PluginBase;

class Plugin extends PluginBase
{

	public function pluginDetails() {
    	return [
    		'name' => 'shohabbos.visa::lang.plugin.name',
    		'description' => 'shohabbos.visa::lang.plugin.description',
    		'author' => 'Shohabbos Olimjonov',
            'icon' => 'oc-icon-visa',
            'homepage' => 'https://itmaker.uz',
    	];
    }

    public function registerComponents()
    {
    }

    public function registerSettings() {
	    return [
	    	'transactions' => [
                'label'       => 'shohabbos.visa::lang.transactions.title',
                'description' => 'shohabbos.visa::lang.transactions.description',
                'icon'        => 'icon-list-alt',
                'url'         => Backend::url('shohabbos/visa/transactions'),
                'order'       => 500,
                'category'    => 'shohabbos.visa::lang.plugin.name',
                'permissions' => ['shohabbos.visa.manage_messages']
            ],
	        'settings' => [
	        	'category'    => 'shohabbos.visa::lang.plugin.name',
	            'label'       => 'shohabbos.visa::lang.settings.label',
	            'description' => 'shohabbos.visa::lang.settings.description',
	            'icon'        => 'icon-cog',
	            'class'       => 'Shohabbos\Visa\Models\Settings',
	            'order'       => 501,
	            'keywords'    => 'visa paymets',
	        ]
	    ];
	}

}
