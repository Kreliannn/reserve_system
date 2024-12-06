<?php

class Database{

    public function pdo()
    {
        return new PDO("mysql:host=localhost; user=root; dbname=storedb;");
    }

    public function insert($query, $data = [])
    {
        $pdo = $this->pdo();
        $stmt = $pdo->prepare($query);
        $stmt->execute($data);
    }

    public function nsert($query, $data = [])
    {
        $pdo = $this->pdo();
        $stmt = $pdo->prepare($query);
        $stmt->execute($data);
        return $this;
    }


    public function update($query, $data = [])
    {
        $pdo = $this->pdo();
        $stmt = $pdo->prepare($query);
        $stmt->execute($data);
    }

    public function delete($query, $id = [])
    {
        $pdo = $this->pdo();
        $stmt = $pdo->prepare($query);
        $stmt->execute($id);
    }

    public function get($query, $data = [], $type)
    {
        $pdo = $this->pdo();
        $stmt = $pdo->prepare($query);
        $stmt->execute($data);
        switch($type)
        {
            case "fetch":
                return $stmt->fetch(PDO::FETCH_ASSOC);
            break;

            case "fetchAll":
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            break;
        }
    }


    public function update_session()
    {
        switch($_SESSION['user']['account_type'])
        {
            case "tenant":
                $_SESSION['user'] = $this->get('select * from tenants where account_id = ?', [$_SESSION['user']['account_id']], 'fetch');
            break;

            case "landlord":
                $_SESSION['user'] = $this->get('select * from landlords where account_id = ?', [$_SESSION['user']['account_id']], 'fetch');
            break;
        }
      
    }

}