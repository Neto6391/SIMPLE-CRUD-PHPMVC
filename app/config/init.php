<?php

  //Directory Project
define("PROJECTPATH", dirname(__DIR__));
 
//Directory App
define("APPPATH", PROJECTPATH . '/app');
define("HOST", $_SERVER['HTTP_HOST']);
define("URI", rtrim(dirname($_SERVER['PHP_SELF']), '/\\'));

//Load Classes
require_once(PROJECTPATH."/config/Connection.php");
require_once(PROJECTPATH."/model/BookStore.php");
require_once(PROJECTPATH."/controllers/ListController.php");
require_once(PROJECTPATH."/controllers/RegisterController.php");
require_once(PROJECTPATH."/controllers/EditController.php");
require_once(PROJECTPATH."/controllers/DeleteController.php");