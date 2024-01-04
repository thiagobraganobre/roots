<?php

class BD {
    private $conexao;

    public function __construct($dbName='default') {
        try {

            $configPath = __DIR__ . '/config.php';
            include($configPath);

            // Extrai as informações de configuração
            $dsn = "{$config["db"]["$dbName"]["driver"]}:host={$config["db"]["$dbName"]["host"]};dbname={$config["db"]["$dbName"]["dbname"]};charset=utf8";
            $username = $config["db"]["$dbName"]["user"];
            $password = $config["db"]["$dbName"]["pass"];

            
            $this->conexao = new PDO($dsn, $username, $password);
            $this->conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Erro na conexão: " . $e->getMessage();
        }
    }


    public function getSQLFilePath($queryName) {
        $mapping = include('./sql/mapeamento.php');

        if (isset($mapping[$queryName])) {
            return $mapping[$queryName];
        } else {
            throw new Exception("Consulta não encontrada: $queryName");
        }
    }

    public function getQuery($queryName) {
        $sqlFilePath = $this->getSQLFilePath($queryName);
        $sqlContent = file_get_contents($sqlFilePath);
        return $sqlContent;
    }

    public function read($queryName, $params = [], $all = true) {
        $response = $this->execute($queryName, $params);    

        if ($all) {
            return $response->fetchAll(PDO::FETCH_ASSOC);
        } else {
            return $response->fetch(PDO::FETCH_ASSOC);
        }
    }

    public function execute($queryName, $params) {
        $queryContent = $this->getQuery($queryName);    
        $stmt = $this->conexao->prepare($queryContent);

        if (!empty($params)){
            $stmt->execute($params);
        } else {
            $stmt->execute();
        }

    return $stmt;    
    }

    //after insert
    public function getLastInsertId() {
        return $this->conexao->lastInsertId();
    }

    //after update
    public function getRowCount($stmt) {
        return $stmt->rowCount();
    }


}