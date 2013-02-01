<?php
/**
 * I decided to instantiate a list of objects from the classes which represent some 
 * aspects and simply include this file from the index.php file.
 * 
 * The aop_add_before() function which registers the method we are listening for 
 * as well as the advice we want actioned when the listener is triggered are defined 
 * in the __construct() method of the class representing each aspect.
 * 
 * The naming convention I chose for classes was:
 *  
 * {Where}{Class}{Method}
 * 1. Where the advice will be applied
 * 2. The Class we are targeting
 * 3. The Method we are listening for
 *  
 * As a reminder, when working with this AOP extension for PHP, the advice is 
 * usually a callback containing the action you want carried out.  
 */

// start by looking at $beforeUrlConstruct and refer to the comments
$beforeUrlConstruct = new \app\core\aspects\BeforeUrlConstruct();

// $beforeApplicationForceShutdown = new \app\core\aspects\BeforeApplicationForceShutdown();
// $beforeRouterProcessRoute = new \app\core\aspects\BeforeRouterProcessRoute();
// $beforeStaticPageRendererRender = new \app\core\aspects\BeforeStaticPageRendererRender();