<?php

namespace ll\llenv;

use Dcat\Admin\Extend\ServiceProvider;
use Dcat\Admin\Admin;

class DcatEnvServiceProvider extends ServiceProvider
{
	protected $js = [
//        'js/index.js',
    ];
	protected $css = [
//		'css/index.css',
	];
    protected $menu = [
        [
            'title' => '系统环境变量',
            'uri'   => 'dcat-env',
            'icon'  => '', // 图标可以留空
        ],
    ];

	public function register()
	{
		//
	}

	public function init()
	{
		parent::init();

		//

	}

	public function settingForm()
	{
		return new Setting($this);
	}
}
