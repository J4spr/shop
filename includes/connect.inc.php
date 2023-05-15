<?php
$connection = new mysqli("localhost", "root", "", "shop");

if ($connection->connect_errno) {
    echo "Er is iets fout gegaan met het verbinden van database.
    \n\nStacktrace (" . $connection->connect_errno . "): " . $connection->connect_error . "";
}
/* Copyright (c) 2023 Cédric Verlinden. All rights reserved. */