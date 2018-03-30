<?php

use Code\Db\DbManager;
use Code\Cliente\Cliente;

class DbManagerTest extends \PHPUnit_Framework_TestCase
{

    private $db;

    public function setUp()
    {
        $this->db = new \PDO('mysql:host=127.0.0.1;dbname=fsc', 'root', '123456');

        $query = file_get_contents(__DIR__ . '/sql/cliente.sql');

        $this->db->exec($query);
    }

    public function tearDown()
    {
        $this->db->exec("drop table cliente");
    }

    public function testVerificaSeTemAdaptadorValidoDeBancoDeDados()
    {
        $dbManager = new DbManager();

        $dbManager->setDbAdapter(new \PDO('mysql:host=127.0.0.1;dbname=fsc', 'root', '123456'));

        $this->assertInstanceOf("\PDO", $dbManager->getConnection());
    }

    public function testVerificaInsertDeDadosCliente()
    {
        $dbManeger = new DbManager();
        $dbManeger->setDbAdapter($this->db);
        
        $cliente = new Cliente();
        $cliente->setNome("Felipe Ribeiro");
        $cliente->setEmail("phelipperibeiro@hotmail.com");
        
        $cliente2 = new Cliente();
        $cliente2->setNome("Thiago Ribeiro");
        $cliente2->setEmail("thiago@hotmail.com");

        $dbManeger->persist($cliente);
        $dbManeger->flush();

        $stmt = $this->db->query("select * from cliente");
        $this->assertEquals(1, count($stmt->fetchAll()));

        $dbManeger->persist($cliente2);
        $dbManeger->flush();
        
        $stmt = $this->db->query("select * from cliente");
        $this->assertEquals(2, count($stmt->fetchAll()));
        
    }

}
