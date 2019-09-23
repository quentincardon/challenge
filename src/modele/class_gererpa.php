<?php
class gererpa{
 private $db;
 private $insert;
 private $select;
 private $update;

public function __construct($db){
  $this->db = $db ;
  $this->insert = $db->prepare("insert into Client (nomCli, prenomCli, datenaisCli, adresseCli, telCli) values (:nomCli, :prenomCli, :datenaisCli, :adresseCli, :telCli)");
  $this->select = $db->prepare("select nomCli, prenomCli, datenaisCli, adresseCli, telCli from Client");
  $this->update = $db->prepare("update Client set nomCli=:nomCli, prenomCli=:prenomCli, datenaisCli=:datenaisCli, adresseCli=:adresseCli, telCli=:telCli where idCli=:idCli");

 }

 public function insert($nomCli, $prenomCli, $datenaisCli , $adresseCli, $telCli){
 $r = true;
 $this->insert->execute(array(':nomCli' => $nomCli, ':prenomCli' => $prenomCli, ':datenaisCli' => $datenaisCli, ':adresseCli' => $adresseCli,':telCli' => $telCli ));
 if ($this->insert->errorCode()!=0){
 print_r($this->insert->errorInfo());
 $r=false;
 }
 return $r;
 }

  public function select(){
 $liste = $this->select->execute();
 if ($this->select->errorCode()!=0){
 print_r($this->select->errorInfo());
 }
 return $this->select->fetchAll();
 }

 public function update($nomCli, $prenomCli, $datenaisCli , $adresseCli, $telCli){
 $r = true;
 $this->update->execute(array(':nomCli' => $nomCli, ':prenomCli' => $prenomCli, ':datenaisCli' => $datenaisCli, ':adresseCli' => $adresseCli,':telCli' => $telCli ));
 if ($this->update->errorCode()!=0){
 print_r($this->update->errorInfo());
 $r=false;
 }
 return $r;
 }

}

?>
