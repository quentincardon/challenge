<?php
class gererc{
 private $db;
 private $insert;
 private $select;
 private $update;

public function __construct($db){
  $this->db = $db ;
  $this->insert = $db->prepare("insert into consultation (heureCons, nomCli, prenomCli, dateCons , adresseCli, telCli, montantCons) values (:heureCons, :nomCli, :prenomCli, :dateCons , :adresseCli, :telCli, :montantCons)");
  $this->select = $db->prepare("select heureCons, nomCli, prenomCli, dateCons , adresseCli, telCli, montantCons from Client c inner join consultation co on c.idCli=co.idCli");
  $this->update = $db->prepare("update consultation set heureCons=:heureCons, nomCli=:nomCli, prenomCli=:prenomCli, dateCons=:dateCons, adresseCli=:adresseCli, telcli=:telCli, montantCons=:montantCons where idCli=:idCli");

 }

 public function insert($heureCons, $nomCli, $prenomCli, $dateCons , $adresseCli, $telCli, $montantCons){
 $r = true;
 $this->insert->execute(array(':heureCons' => $heureCons, ':nomCli' => $nomCli, ':prenomCli' => $prenomCli, ':dateCons' => $dateCons, ':adresseCli' => $adresseCli,':telCli' => $telCli ,':montantCons' => $montantCons));
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

 public function update($heureCons, $nomCli, $prenomCli, $dateCons , $adresseCli, $telCli, $montantCons){
 $r = true;
 $this->update->execute(array(':heureCons' => $heureCons, ':nomCli' => $nomCli, ':prenomCli' => $prenomCli, ':dateCons' => $dateCons, ':adresseCli' => $adresseCli,':telCli' => $telCli ,':montantCons' => $montantCons));
 if ($this->update->errorCode()!=0){
 print_r($this->update->errorInfo());
 $r=false;
 }
 return $r;
 }

}

?>
