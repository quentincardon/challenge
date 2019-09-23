<?php

class Consultation {
private $db;
private $select;




public function __construct($db){
$this->db = $db;
$this->select = $db->prepare("select heureCons, nomCli, prenomCli, dateCons , adresseCli, telCli, montantCons from Client c inner join consultation co on c.idCli=co.idCli");
}

public function select(){
$liste = $this->select->execute();
if ($this->select->errorCode() != 0){
print_r($this->select->errorInfo());
}
return $this->select->fetchAll();
}


}
