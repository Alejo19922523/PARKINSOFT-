<?php

class Mysql
{
    private $host;
    private $user;
    private $pass;
    private $db;
    protected $connection;

    public function __construct()
    {
        $this->host = DB_HOST;
        $this->user = DB_USER;
        $this->pass = DB_PASS;
        $this->db   = DB_NAME;
        $this->connection = null;
        $this->connect();
    }

    private function connect()
    {
        $this->connection = new mysqli($this->host, $this->user, $this->pass, $this->db);
        $this->connection->set_charset('utf8');
        if ($this->connection->connect_error) {
            die(json_encode([
                'status'  => 'error',
                'message' => 'Error de conexión: ' . $this->connection->connect_error
            ]));
        }
    }

    // SELECT múltiples filas
    public function select_all(string $sql): array
    {
        $result = $this->connection->query($sql);
        $rows = [];
        if ($result && $result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $rows[] = $row;
            }
        }
        return $rows;
    }

    // SELECT una sola fila
    public function select(string $sql): array
    {
        $result = $this->connection->query($sql);
        if ($result && $result->num_rows > 0) {
            return $result->fetch_assoc();
        }
        return [];
    }

    // INSERT con prepared statement
    public function insert(string $sql, array $data): bool
    {
        $stmt = $this->connection->prepare($sql);
        if (!$stmt) return false;

        $types = $this->getTypes($data);
        $stmt->bind_param($types, ...$data);
        $result = $stmt->execute();
        $stmt->close();
        return $result;
    }

    // UPDATE con prepared statement
    public function update(string $sql, array $data): bool
    {
        $stmt = $this->connection->prepare($sql);
        if (!$stmt) return false;

        $types = $this->getTypes($data);
        $stmt->bind_param($types, ...$data);
        $result = $stmt->execute();
        $stmt->close();
        return $result;
    }

    // DELETE simple
    public function delete(string $sql): bool
    {
        $result = $this->connection->query($sql);
        return (bool)$result;
    }

    // Detecta tipos para bind_param: i=int, d=float, s=string
    private function getTypes(array $data): string
    {
        $types = '';
        foreach ($data as $value) {
            if (is_int($value))        $types .= 'i';
            elseif (is_float($value))  $types .= 'd';
            else                       $types .= 's';
        }
        return $types;
    }

    public function __destruct()
    {
        if ($this->connection) {
            $this->connection->close();
        }
    }
}
?>
