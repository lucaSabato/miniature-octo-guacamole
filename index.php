<?php

require_once 'bootstrap.php';

define("CBOOKAPICLIENT", "8XWr1Hp5xbhSM6u0");
define("CBOOKAPISECRET", "07xdHM9OA8ULaBeC");
define("CRITTERAPIKEY", "j4nHNuaPo2nq6AdW");


$app = new App(CBOOKAPICLIENT, CBOOKAPISECRET, CRITTERAPIKEY);

$app->render();
