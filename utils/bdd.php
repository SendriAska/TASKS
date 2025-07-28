<?php

include "../env.php";
function connectBDD()
{
    return new PDO(
        'mysql:host=' . BDD_SERVEUR . ';dbname=' . BDD_NAME .'',
        BDD_LOGIN,
        BDD_PASSWORD,
        [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
    );
}