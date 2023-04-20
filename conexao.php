<?php

$servidor="localhost";
$porta="3306";
$usuario="default";
$senha="#%*@";
$database="application";

$conexao=mysqli_connect($servidor,$usuario,$senha,$database,$porta);

mysqli_set_charset($conexao, "utf8mb4");
?>