<?php

class gererm {

    private $db;
    private $insert;
    private $select;
    private $update;

    public function __construct($db) {
        $this->db = $db;
        $this->select = $db->prepare("select nomMat, comMat, Quantite from materiel");
        $this->insert = $db->prepare("insert into materiel (nomMat, comMat, Quantite) values (:nomMat, :comMat, :Quantite)");
        $this->update = $db->prepare("update materiel set nomMat=:nomMat, comMat=:comMat, Quantite=:Quantite where codeMat=:codeMat");
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
       

    public function select() {
        $liste = $this->select->execute();
        if ($this->select->errorCode() != 0) {
            print_r($this->select->errorInfo());
        }
        return $this->select->fetchAll();
    }

    public function update($nomMat, $comMat, $Quantite) {
        $r = true;
        $this->update->execute(array(':nomMat' => $nomMat, ':comMat' => $comMat, ':Quantite' => $Quantite));
        if ($this->update->errorCode() != 0) {
            print_r($this->update->errorInfo());
            $r = false;
        }
        return $r;
    }

}

?>
