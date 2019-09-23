<?php

class patients {
private $db;
private $select;


public function __construct($db){
$this->db = $db;
$this->select = $db->prepare("select idCli, nomCli, prenomCli, datenaisCli , adresseCli, telCli from Client");
$this->insert = $db->prepare("insert into Client (idCli,  nomCli, prenomCli, datenaisCli , adresseCli, telCli) values (:idCli,  :nomCli, :prenomCli, :datenaisCli , :adresseCli, :telCli)");

}

public function select(){
$liste = $this->select->execute();
if ($this->select->errorCode() != 0){
print_r($this->select->errorInfo());
}
return $this->select->fetchAll();
}

public function insert($idCli, $nomCli, $prenomCli, $datenaisCli , $adresseCli, $telCli ){
$r = true;
$this->insert->execute(array(':idCli' => $idCli, ':nomCli' => $nomCli, ':prenomCli' => $prenomCli, ':datenaisCli' => $datenaisCli, ':adresseCli' => $adresseCli,':telCli' => $telCli ));
if ($this->insert->errorCode() != 0){
print_r($this->insert->errorInfo());
$r = false;
}
return $r;
}




}
