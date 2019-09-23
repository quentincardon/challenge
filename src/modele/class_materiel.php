<?php

class materiel {

    private $db;
    private $insert;
    private $select;

    public function __construct($db) {
        $this->db = $db;
        $this->select = $db->prepare("select nomMat, comMat, Quantite from materiel m");
        $this->insert = $db->prepare("insert into materiel (nomMat, comMat, Quantite) values (:nomMat, :comMat, :Quantite)");
    }

    

    public function select() {
        $liste = $this->select->execute();
        if ($this->select->errorCode() != 0) {
            print_r($this->select->errorInfo());
        }
        return $this->select->fetchAll();
    }

    public function insert($nomMat, $comMat, $Quantite) {
        $r = true;
        $this->insert->execute(array(':nomMat' => $nomMat, ':comMat' => $comMat, ':Quantite' => $Quantite));
        if ($this->insert->errorCode() != 0) {
            print_r($this->insert->errorInfo());
            $r = false;
        }
        return $r;
    }
}

?>