<?php
class db {
    private $host;
    private $user;
    private $psw;
    private $database;
    private $db;
    
    public function __construct($host=null,$user=null,$psw=null,$database=null){
        if($host!=null){
            $this->host=$host;
            $this->user=$user;
            $this->psw=$psw;
            $this->database=$database;
        }
        try{
            $this->db=new PDO('mysql:host='.$this->host.';dbname='.$this->database,
                    $this->user,$this->psw,array(
                        PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES UTF8',
                        PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));
        } catch (PDOException $ex) {
            die("<h1>Impossible de se connecter à la base de donnée</h1>");
        }
    }
    public function query($sql,$data= array()){
        $req= $this->db->prepare($sql);
        $req->execute($data);
        return $req->fetchAll(PDO::FETCH_OBJ);
    }
}
