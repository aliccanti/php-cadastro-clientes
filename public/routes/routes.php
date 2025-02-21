<?php

$router = [
    'GET' => [
        '/' => 'listClientsController.php'
    ],
    'POST' => [
        '/saveClients' => 'saveClientsController.php',
        '/editClients' => 'editClientsController.php',
        '/deleteClients' => 'deleteClientsController.php',
    ],
];