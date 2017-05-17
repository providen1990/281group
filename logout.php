<?php
/**
 * Created by PhpStorm.
 * User: Manish
 * Date: 13-05-2017
 * Time: 21:25
 */

require ('apiFunction.php');
session_start();
session_destroy();
Redirect('index.php');

?>