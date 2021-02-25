<?php

namespace QueryBuilder;

trait DBtrait
{
    public function table(string $tablename)
    {
        $this->tablename = $tablename;

        return $this;
    }

    public function select(...$columns)
    {
        $this->select = $columns;

        return $this;
    }

    public function where(array $keyvalue)
    {
        $this->where = $keyvalue;

        return $this;
    }

    public function update(array $data)
    {
        $this->update = $data;

        return $this;
    }

    public function delete(array $data)
    {
        $this->delete = $data;

        return $this;
    }

    public function insert(array $data)
    {
        $this->insert = $data;

        return $this;
    }

    public function buildInsertQuery(array $data){
        $query = ' INSERT INTO ' . $this->tablename . ' (';
        $whereString = '';
        foreach ($data as $key => $value){
            $whereString .= " `$key`, ";
        }
        $whereString = rtrim($whereString , ', ' );
        $query .= $whereString . ") Values (";

        $whereString = '';
        foreach ($data as $key => $value) {
            $whereString .= " '$value', ";
        }

        $whereString = rtrim($whereString , ', ' );
        $query .= ' ' . $whereString . ' ) ; ';

        return $query;
    }

}