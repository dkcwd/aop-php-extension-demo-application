<?php
/**
 * A simple application for demoing very basic usage of the AOP extension for PHP.
 * 
 * I've prepared a walkthrough at http://youtu.be/GSYkhWTuCWQ which will be a 
 * good place to start if you haven't already seen it.
 * 
 * I used the AOP extension for PHP on github.com: https://github.com/AOP-PHP/AOP
 * so you need to install the extension first.  Just follow the instructions on 
 * their github page and let them know if you run into any problems.  If you run
 * into any difficulties feel free to also let me know and I'll do my best to help 
 * as much as I can. :-)   
 * 
 * FYI - the AOP php extension provides us with additional internal PHP functions. 
 * The examples in this application focus on using the function aop_add_before().
 * There are many more ways of working with the extension this is really very basic
 * to help you learn about AOP and the extension.
 * 
 * I'm hoping this will show some ways we can play with aop techniques using this 
 * extension and make it faster for people to get around to playing with it by
 * themselves.
 * 
 * If you want a canonical source of information regarding the extension then the
 * manual is an excellent resource.  You can grab the manual from their github page.
 * 
 * I'd like to point out that I'm not suggesting the way I have done this is the 
 * best way to do it.  As ever there will be plenty of ways to * go about things.  
 * :-) 
 * 
 * With that said, I have chosen to create classes representing each aspect to 
 * make it easier to tell which method I am targetting to apply advice before.
 * 
 * I've explained the naming convention in the file 'aspects.php' so best to 
 * refer to that.
 * 
 * When you are ready to start experimenting, comment in the include statement
 * for the aspects.php file and refer to the aspects.php file for the aspects 
 * you want to work with.
 * 
 * @author Dave Clark (dave@dkcwd.com.au)
 * @link https://github.com/dkcwd/aop-php-extension-demo-application
 * @copyright Dave Clark 2013
 * @license http://opensource.org/licenses/mit-license.php
 */

// probably goes without saying but if you see a blank screen comment in the next line:
// ini_set('display_errors', 1);

// Defining some constants
defined('DS') || define('DS', DIRECTORY_SEPARATOR);
defined('APP_ROOT') || define('APP_ROOT', realpath(__DIR__ . DS . '..' . DS));
defined('APP_PATH') || define('APP_PATH', APP_ROOT . DS . 'modules' . DS . 'app' . DS);
defined('CONFIG_PATH') || define('CONFIG_PATH', APP_PATH . 'config' . DS);
defined('STATIC_PAGE_PATH') || define('STATIC_PAGE_PATH', APP_PATH . 'static-pages' . DS);

// set up autoloading
include CONFIG_PATH . DS . 'autoload.php';


// aspects - when you want to start working with these you can comment in the include
// include CONFIG_PATH . DS . 'aspects.php';


// include the upper half of the layout 
include APP_PATH . 'templates' . DS . 'layout-upper.phtml';

// get our Application object instance and run the methods representing a full cycle 
$app = \app\core\Application::getApplication();   
$app->bootstrap()->run()->route()->render()->shutdown();

// include the bottom half of the layout
include APP_PATH . 'templates' . DS . 'layout-lower.phtml';