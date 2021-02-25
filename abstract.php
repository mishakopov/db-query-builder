<?php

namespace QueryBuilder;

use PDO;

abstract class DBController{
    protected $connection;

    abstract protected function connect();

    abstract protected function buildQuery();

    public function execute()
    {
        $query = $this->buildQuery();
        $stmt = $this->connection->prepare($query);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}