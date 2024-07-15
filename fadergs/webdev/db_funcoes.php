<?php
require('db_conf.php');

function connect_to_database($dbname = NULL) {
    global $driver, $host, $username, $password;

    if ($dbname) {
        $dbname = "dbname=${dbname};";
    } else {
        $dbname = "";
    }

    $dsn = "${driver}:host=${host};${dbname}";

    $options = [
        // desliga emulação para PreparedStatements
        PDO::ATTR_EMULATE_PREPARES   => false,
        // força exceções em caso de erros
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        // define o retorno padrão dos dados em um array associativo
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    ];

    try {
      $pdo = new PDO($dsn, $username, $password, $options);
    } catch (Exception $e) {
      echo "ERROR: ".$e->getMessage()."\n";
      exit('\nOooops...');
    }
    return $pdo;
}

?>
