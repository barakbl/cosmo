<?php

namespace Core;
use Core\Helpers;

abstract class Model {
    protected $conf = array();
    protected $dbh;
    function __construct() {
        $conf = Helpers::config();
        $this->conf = $conf->db;
        $host = $this->conf->host;
        $username = $this->conf->username;
        $password = $this->conf->password;
        $dbname = $this->conf->dbname;

        try {
            $this->dbh = new \PDO("mysql:dbname=$dbname;host=$host",$username,$password );
        } catch(PDOException $e) {
            echo $e->getMessage();
        }
    }

    function getPdo() {
        return $this->dbh;
    }
    /**
     * @param $tblName - db table name
     *
     * @return \PDOStatement
     */
    function getAll($tblName,$params = array()) {
        $sql = "SELECT * FROM " . $tblName;
        $sth = $this->dbh->prepare($sql);
        $sth->execute();
        $result = $sth->fetchAll();
        return $result;

        return $res;
    }

    /**
     * @param $tblName
     * @param $id - uniq id for record
     *
     * @return \PDOStatement
     */
    function getByPk($tblName, $id) {
        $sql = "SELECT * FROM " . $tblName . " where id = " . $id;
        $sth = $this->dbh->prepare($sql);
        $sth->execute();
        $result = $sth->fetchAll();
        return $result;
    }

    function insert($tblName, $data) {
        $fields = join(',',array_keys($data));
        $sql = "INSERT INTO ($fields) VALUES ()";
    }
}