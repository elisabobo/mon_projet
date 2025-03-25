<?php

class Database{
    protected PDO $db;
    public function __construct(){	
		//donne le chemin complet le petit point permet 
        //de faire la concaténation de string
		$this->db = new PDO('sqlite:' . $_SERVER['DOCUMENT_ROOT'].'/assets/php'. '/db.sqlite');
        $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $this->db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_ASSOC);

}
}

