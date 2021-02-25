<?php
namespace QueryBuilder;

require_once 'abstract.php';
require_once 'db-interface.php';
require_once 'trait.php';


use PDO;

class DB extends DBController implements DBInterface
{
    use DBtrait;

    private const HOST = '127.0.0.1';
    private const DBNAME = 'dbname';
    private const USERNAME = 'username';
    private const PASSWORD = 'password';
    protected $tablename;
    protected $select;
    protected $where;
    protected $update;

    public function __construct()
    {
        $this->connect();
    }

    protected function connect()
    {
        try{
            $this->connection = new PDO('mysql:host=' . self::HOST . ';dbname=' . self::DBNAME , self::USERNAME , self::PASSWORD);
        }catch (\Exception $e){
            die($e->getMessage());
        }
    }


    protected function buildQuery()
    {
        $query = '';

        if($this->select){
            $query = ' SELECT ' . ($this->select ? implode( ', ' , $this->select) : ' * ');
            $query .= ' FROM ' . $this->tablename;
        }

        if($this->update){
            $query = 'Update ' . $this->tablename . ' Set ';
            $whereString = '';
            foreach ($this->update as $key => $value) {
                $whereString .= $key . ' = ' . " '$value',  ";
            }
            $whereString = rtrim($whereString , ', ' );
            $query .= ' ' . $whereString;
        }

        if ($this->delete){
            $query = ' Delete FROM ' . $this->tablename;
        }

        if ($this->insert){

            if(isset($this->insert[0]) && is_array($this->insert[0])){
                foreach ($this->insert as $key => $value){
                    $query .= $this->buildInsertQuery($value);
                }
            }
            else{
                $query = $this->buildInsertQuery($this->insert);
            }

        }


        if ($this->where) {
            $where = '';
            foreach ($this->where as $key => $value){
                $where .= $key . '=' . " '$value' && ";
            }
            $where = rtrim($where , '&& ');
            $query .= ' WHERE ' . $where;
        }

        return $query;
    }


}