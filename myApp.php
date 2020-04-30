<?php

session_start();

require './db_inc.php';
require './account_class.php';

$account = new Account();

try
{
	$newId = $account->addAccount('myNewName', 'myPassword');
}
catch (Exception $e)
{
	/* Something went wrong: echo the exception message and die */
	echo $e->getMessage();
	die();
}

echo 'The new account ID is ' . $newId;