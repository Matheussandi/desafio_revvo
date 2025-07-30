<?php

class Database {
    private $host;
    private $dbname;
    private $username;
    private $password;
    private $pdo;
    
    public function __construct() {
        $this->host = DB_HOST;
        $this->dbname = DB_NAME;
        $this->username = DB_USER;
        $this->password = DB_PASS;
    }
    
    /**
     * Estabelece conexão com o banco de dados
     */
    public function connect() {
        if ($this->pdo === null) {
            try {
                $dsn = "mysql:host={$this->host};dbname={$this->dbname};charset=utf8mb4";
                $options = [
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                    PDO::ATTR_EMULATE_PREPARES => false,
                ];
                
                $this->pdo = new PDO($dsn, $this->username, $this->password, $options);
            } catch (PDOException $e) {
                throw new Exception("Erro na conexão com o banco de dados: " . $e->getMessage());
            }
        }
        
        return $this->pdo;
    }
    
    /**
     * Executa uma query e retorna os resultados
     */
    public function query($sql, $params = []) {
        try {
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute($params);
            return $stmt;
        } catch (PDOException $e) {
            throw new Exception("Erro na execução da query: " . $e->getMessage());
        }
    }
    
    /**
     * Retorna o último ID inserido
     */
    public function lastInsertId() {
        return $this->connect()->lastInsertId();
    }
    
    /**
     * Fecha a conexão
     */
    public function disconnect() {
        $this->pdo = null;
    }
}
