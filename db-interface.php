<?php

namespace QueryBuilder;

interface DBInterface{

    public function select();

    public function where(array $data);

    public function table(string $tablename);

    public function update(array $data);

    public function insert(array $data);

    public function delete(array $data);
}
