<?php
class Database
{

    private string $db_name = 'louispinoit_project';
    private string $db_user = 'louispinoit';
    private string $db_pass = '0fe9c223659a937baedf75cd59cc8ccc';
    private string $db_host  = 'db.3wa.io';
    private int $db_port = 3306;
    private $pdo;


    private function getPDO()
    {
        if ($this->pdo === null) {
            $pdo = new \PDO('mysql:dbname=' . $this->db_name . ';port=' . $this->db_port . ';host=' . $this->db_host, $this->db_user, $this->db_pass);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->pdo = $pdo;
        }
        return $this->pdo;
    }

    public function query($statement)
    {
        $req = $this->getPDO()->query($statement);
        $datas = $req->fetchAll();
        return $datas;
    }

    public function prepare($statement, $params = null, $one = false)
    {
        $req = $this->getPDO()->prepare($statement);
        $req->execute($params);
        if ($one) {
            $data = $req->fetch(PDO::FETCH_ASSOC);
        } else {
            $data = $req->fetchAll(PDO::FETCH_ASSOC);
        }
        return $data;
    }
}
