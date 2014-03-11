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

        'hybridauth' => array(
            'withYiiUser' => true, // Set to true if using yii-user
            "providers" => array ( 
                "yahoo" => array ( 
                    "enabled" => true 
                ),
 				"google" => array ( 
                    "enabled" => true,
                    "keys"    => array ( 
            			"id" => "960793796185-1jssr40u2lakoccr8fib9sptpcl0351s.apps.googleusercontent.com", 
            			"secret" => "KJ4LUVd0HCbBIR3cL1f1HM0A" 
            		)
                ),
                "facebook" => array ( 
                    "enabled" => true,
                    "keys"    => array (
                    	"id" => "380117428794885",
                    	"secret" => "34156cae53afc1296a4faf65c1d49191"
                    ),
                ),
                "twitter" => array ( 
                    "enabled" => true,
                    "keys"    => array (
                    	"key" => "K6zFXmFlPi6GlfSyruD5Q",
                    	"secret" => "xufv0Po4RgeK7LTIHnylBylIK6XokOxnaTH8zOsaM"
                    ) 
                )
            )
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
        'mail' => array(
 			'class' => 'ext.yii-mail.YiiMail',
 			'transportType' => 'smtp',
 			'transportOptions' => array(
 				'host'=>getenv("MAILGUN_SMTP_SERVER") ? 
						getenv("MAILGUN_SMTP_SERVER") : 
						"smtp.mailgun.org",
				'username'=>getenv("MAILGUN_SMTP_LOGIN") ? 
						getenv("MAILGUN_SMTP_LOGIN") : 
						"postmaster@atmssethbusque.mailgun.org",
				'password'=>getenv("MAILGUN_SMTP_PASSWORD") ? 
						getenv("MAILGUN_SMTP_PASSWORD") : 
						"065ddxkqfzr6",
				'port'=>getenv("MAILGUN_SMTP_PORT") ? 
						getenv("MAILGUN_SMTP_PORT") : 
						"587"
 			),
 			'viewPath' => 'application.views.mail',
 			'logging' => true,
 			'dryRun' => false
 		),
	),

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=>array(
		// this is used in contact page
		'adminEmail'=>'sethbusque@gmail.com',
		'twitterConsumerKey'=>array(
			'K6zFXmFlPi6GlfSyruD5Q','xufv0Po4RgeK7LTIHnylBylIK6XokOxnaTH8zOsaM'
		)
	),
);