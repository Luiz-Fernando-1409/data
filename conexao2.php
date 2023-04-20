<?php

$servidor="localhost";
$porta="3306";
$usuario="gerencial";
$senha="bcO4ShAHJudAn4M4Oi9O9uANuCUOe9lypdBAwtELvPQ7QRWd2nRfK";
$database="application";

$conexao=mysqli_connect($servidor,$usuario,$senha,$database,$porta);

mysqli_set_charset($conexao, "utf8mb4");

?>