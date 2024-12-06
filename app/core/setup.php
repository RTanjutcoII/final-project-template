<?php

//require our files, remember should be relative to index.php
require '../app/core/Router.php';
require '../app/models/Model.php';
require '../app/models/Course.php';
require '../app/models/Ask.php';
require '../app/models/Work.php';
require '../app/controllers/Controller.php';
require '../app/controllers/MainController.php';
require '../app/controllers/CourseController.php';
require '../app/controllers/AskController.php';
require '../app/controllers/WorkController.php';



//set up env variables
$env = parse_ini_file('../.env');

define('DBNAME', $env['DBNAME']);
define('DBHOST', $env['DBHOST']);
define('DBUSER', $env['DBUSER']);
define('DBPASS', $env['DBPASS']);
define('DBDRIVER', '');

//set up other configs
define('DEBUG', true);