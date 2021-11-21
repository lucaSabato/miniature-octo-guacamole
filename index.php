<?php

require_once 'bootstrap.php';

// CBookAPI credentials
define("CBOOKAPICLIENT", "8XWr1Hp5xbhSM6u0");
define("CBOOKAPISECRET", "07xdHM9OA8ULaBeC");

// CritterAPI Key
define("CRITTERAPIKEY", "j4nHNuaPo2nq6AdW");

// LgramAPI credentials
define("LGRAMAPICLIENT", "8XWr1Hp5xbhSM6u0");
define("LGRAMAPISECRET", "07xdHM9OA8ULaBeC");

// API Wrappers
$cbookWrapper = new CBookWrapper(CBOOKAPICLIENT, CBOOKAPISECRET);
$critterWrapper = new CritterWrapper(CRITTERAPIKEY);
$lgramWrapper = new LgramWrapper(LGRAMAPICLIENT, LGRAMAPISECRET);

$associateGroups = [
    $cbookWrapper->normalise(),
    $critterWrapper->normalise(),
    $lgramWrapper->normalise()
];

$app = new App($associateGroups);

include 'views/header.php';

$app->render();

include 'views/footer.php';
