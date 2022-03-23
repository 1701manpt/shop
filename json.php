<?php
require_once "connection.php";
require_once "class/customer.php";

echo (new Customer([]))->select("13")->__to_json();