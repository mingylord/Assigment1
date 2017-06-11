<?php

class MySQL extends PDO {
    
	private $pdo;
	private static $instance = null;
	
	private static $db = null;
    
	public function __construct()
    { 
        $this->engine     = 'mysql'; 
        $this->host       = '127.0.0.1';
        $this->database   = 'balder'; 
        $this->user       = 'root'; 
        $this->pass       = ''; 
        
		$this->pdo = new PDO($this->engine . ":host=" . $this->host .";dbname=" . $this->database .";", $this->user, $this->pass);

		$dns = $this->engine.':dbname='.$this->database.";host=".$this->host; 
        parent::__construct($dns, $this->user, $this->pass ); 

    }
	
	
}

?>