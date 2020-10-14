<?php
/*

** License **
Copyright © 2020 DS Media Group
Author : Salvatore Cahyo
License: MIT

*/
class Library
{
    public function __construct()
    {
        require "db.php";

        $this->db = new PDO("mysql:host={$host};dbname={$dbname}", $username, $password);
    }

    public function get_by_cd($kode)
    {
        $query = $this->db->prepare("SELECT * FROM code where id=?");
        $query->bindParam(1, $kode);
        $query->execute();
        return $query->fetch();
    }


    public function countuser()
    {
        $query = $this->db->prepare('SELECT * FROM user');
        $query->execute();
        return $query->rowCount();
    }
    public function countsupplier()
    {
        $query = $this->db->prepare('SELECT * FROM supplier');
        $query->execute();
        return $query->rowCount();
    }
    public function countkategori()
    {
        $query = $this->db->prepare('SELECT * FROM kategori');
        $query->execute();
        return $query->rowCount();
    }
    public function countbarang()
    {
        $query = $this->db->prepare('SELECT * FROM barang');
        $query->execute();
        return $query->rowCount();
    }
    public function counttrx($tgl)
    {
        $query = $this->db->prepare("SELECT COUNT(nota) AS nota FROM bayar WHERE FROM_UNIXTIME(tglbayar, '%Y-%m-%d')=?");
        $query->bindParam(1, $tgl);
        $query->execute();
        return $query->fetch();
    }
    public function getinfo()
    {
        $query = $this->db->prepare('SELECT isi FROM info');
        $query->execute();
        return $query->fetch();
    }
    public function getbln($bln)
    {
        $query = $this->db->prepare("SELECT FROM_UNIXTIME(tglbayar, '%d') AS tgl, COUNT(nota) AS nota FROM bayar WHERE FROM_UNIXTIME(tglbayar, '%m')=? GROUP BY FROM_UNIXTIME(tglbayar, '%d')");
        $query->bindParam(1, $bln);
        $query->execute();
        return $query->fetchAll();
    }
}
