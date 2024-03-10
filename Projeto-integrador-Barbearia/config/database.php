<?php

$hostname = "localhost";
$database = "db_pti_agenda";
$usuario = "root";
$senha = "";

$mysqli = new mysqli($hostname, $usuario, $senha, $database);

if ($mysqli->errno) {
    echo "Falha ao conectar: (" . $mysqli->connect_errno . ") " . $mysqli->errno;
}