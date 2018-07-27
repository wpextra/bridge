<?php
/********************************************************************
 | We tried our best to keep our code clean & lightweight			|
 | Main purpose is to give wordpress more without override 			|
 | main identity of WordPress itself.								|
 | 																	|
 | Main idea is to help developer & startup to build their apps 	|
 | & prototype faster and cheaper without sacrify technical part 	|.
 ********************************************************************/


/***********************************************
* Core files. 
* *********************************************/
require_once dirname( __FILE__ ) . '/autoloader.php';
require_once dirname( __FILE__ ) . '/client/client.php';
require_once dirname( __FILE__ ) . '/core/core.php';



/***********************************************
* Services. Builtin service to handle some actions
* *********************************************/


/***********************************************
* Template extension for twig
* *********************************************/
require_once dirname( __FILE__ ) . '/template/template.php';

/***********************************************
* Integrated framework with wordpress
* *********************************************/
require_once dirname( __FILE__ ) . '/setup/template.php';
require_once dirname( __FILE__ ) . '/setup/listener.php';
require_once dirname( __FILE__ ) . '/setup/register.php';
require_once dirname( __FILE__ ) . '/setup/metabox-post.php';
require_once dirname( __FILE__ ) . '/setup/metabox-term.php';
require_once dirname( __FILE__ ) . '/setup/metabox-user.php';




/***********************************************
* Helpers
* *********************************************/
require_once dirname( __FILE__ ) . '/bridge.php';


/***********************************************
* Additional features
* - Dev Tool : http://github.com/wpextra/devtool
* - GraphQL  : http://github.com/wpextra/graphql
* - withReact: http://github.com/wpextra/react-bridge
* *********************************************/



