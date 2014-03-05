<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.

$localhost = true;

$blacklist = array('127.0.0.1','::1');

if(!in_array($_SERVER['REMOTE_ADDR'], $blacklist)){
	$localhost = false;
}

$username      = $localhost ? "root" : getenv("OPENSHIFT_MYSQL_DB_USERNAME");
$password      = $localhost ? "gjn5tdgs" : getenv("OPENSHIFT_MYSQL_DB_PASSWORD");
$hostname      = $localhost ? "localhost" : getenv("OPENSHIFT_MYSQL_DB_HOST");
$port          = $localhost ? "" : getenv("OPENSHIFT_MYSQL_DB_PORT");
$db            = $localhost ? "kaimito" : "php";

return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'Kaimito',

	// preloading 'log' component
	'preload'=>array('log','bootstrap','fontawesome'),

	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
        'application.modules.user.models.*',
        'application.modules.user.components.*',
	),

	'modules'=>array(
		// uncomment the following to enable the Gii tool
		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'gjn5tdgs',
			// If removed, Gii defaults to localhost only. Edit carefully to taste.
			'ipFilters'=>array('127.0.0.1','::1'),
		),

		'user'=>array(
            # encrypting method (php hash function)
            'hash' => 'md5',

            # send activation email
            'sendActivationMail' => true,

            # allow access for non-activated users
            'loginNotActiv' => false,

            # activate user on registration (only sendActivationMail = false)
            'activeAfterRegister' => false,

            # automatically login from registration
            'autoLogin' => true,

            # registration path
            'registrationUrl' => array('/user/registration'),

            # recovery password path
            'recoveryUrl' => array('/user/recovery'),

            # login form path
            'loginUrl' => array('/user/login'),

            # page after login
            'returnUrl' => array('/user/profile'),

            # page after logout
            'returnLogoutUrl' => array('/user/login'),
        ),
	),

	// application components
	'components'=>array(
		'user'=>array(
			// enable cookie-based authentication
			'allowAutoLogin'=>true,
		),
		// uncomment the following to enable URLs in path-format
		'urlManager'=>array(
			'urlFormat'=>'path',
			'rules'=>array(
				'<controller:\w+>/<id:\d+>'=>'<controller>/view',
				'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
				'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
			),
			// further clean our URLs, i.e., hiding the entry script index.php in the URL
			'showScriptName' => false,
			// We may also add some sux to our URLs. For example, we can have /post/100.html
			// instead of /post/100. This makes it look more like a URL to a static Web page.
			'urlSuffix' => '.htm',
		),
		/*
		'db'=>array(
			'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/testdrive.db',
		),
		*/
		// uncomment the following to use a MySQL database
		'db'=>array(
			'connectionString' => 'mysql:host='.$hostname.';dbname='.$db,
			'emulatePrepare' => true,
			'username' => $username,
			'password' => $password,
			'charset' => 'utf8',
			'tablePrefix' => 'tbl_',
		),
		'errorHandler'=>array(
			// use 'site/error' action to display errors
			'errorAction'=>'site/error',
		),
		'log'=>array(
			'class'=>'CLogRouter',
			'routes'=>array(
				array(
					'class'=>'CFileLogRoute',
					'levels'=>'error, warning',
				),
				// uncomment the following to show log messages on web pages
				/*
				array(
					'class'=>'CWebLogRoute',
				),
				*/
			),
		),
		'bootstrap'=>array(
			'class'=>'ext.bootstrap.components.Bootstrap',
		),
		'fontawesome'=>array(
			'class'=>'ext.fontawesome.FontAwesome',
			'minified'=>true,
		),
		'user'=>array(
            // enable cookie-based authentication
            'class' => 'WebUser',
        ),
        'mailgun' => array(
            'class' => 'application.extensions.php-mailgun.MailgunYii',
            'domain' => 'sandbox39039.mailgun.org',
            'key' => 'key-8m2o8ppr6aw6gk3xjvdhb6uyjiyxwq18',
            'tags' => array('yii'), // You may also specify some Mailgun parameters
            'enableTracking' => false,
        ),
	),

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=>array(
		// this is used in contact page
		'adminEmail'=>'sethbusque@gmail.com',
	),
);