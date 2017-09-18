<?php


define('PHANTOM_DATETIME', isset($_SERVER['REQUEST_TIME']) ? $_SERVER['REQUEST_TIME'] : time());
define('PHANTOM_TIMESTAMP', date('Y-m-d H:i:s', PHANTOM_DATETIME));
define('PHANTOM_TIME_STRING', date('YmdHis', PHANTOM_DATETIME));
define('PHANTOM_DATE', date('Y-m-d', PHANTOM_DATETIME));