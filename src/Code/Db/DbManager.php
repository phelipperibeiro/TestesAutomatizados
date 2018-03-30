<?php

namespace Code\Db;

class DbManager extends \PHPUnit_Framework_TestCase
{

    private $db;
    private $entities = array();

    public function setDbAdapter(\PDO $db)
    {
        $this->db = $db;
    }

    public function getConnection()
    {
        return $this->db;
    }

    public function persist($entity)
    {
        $this->entities[] = $entity;
    }

    public function flush()
    {
        foreach ($this->entities as $key => $entity) {
            $query = "insert into cliente (nome, email) values ('{$entity->getNome()}', '{$entity->getEmail()}');";
            unset($this->entities[$key]);
            $this->db->exec($query);
        }
        
    }

}
