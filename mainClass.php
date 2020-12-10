<?php

class main {

	var $showSQLerrors = true;
	var $linkSQL = false;
	var $mysqli = false;
	var $lastInsertID = 0;
    var $shopName = 'Sklep Zoologiczny';
	
	
	function __construct() {
			
	}
	
	
	function SQLConnect($conf) {
		//print_r($conf);
		if (!$conn = mysqli_connect($conf['host'].':'.$conf['port'], $conf['user'], $conf['pass'],$conf['db'])) return false;
		//if (!mysqli_select_db($conf['db'])) return false;
		if (!mysqli_query($conn,"SET NAMES UTF8")) return false;
		global $mysqli;
		$mysqli = $conn;
        $this->mysqli = $conn;
        $this -> linkSQL = $conn;
		return $conn;
	}

	function sql($s, $link = false) {
		
        if(!$link){
            $link = $this -> linkSQL;
        }
		
		if (!($r = mysqli_query($link, $s))) {
			if ($this -> showSQLerrors) print "SQL: ".$s."<br>ERR: ".mysqli_error($link)."<br>";
			return false;
		}
		
		$ss = "SELECT LAST_INSERT_ID() as `lastID`";
		if (!($rr = mysqli_query($link, $ss))) {
		    $this->lastInsertID = 0;
		}
		$t = mysqli_fetch_assoc($rr);
		$this->lastInsertID = $t['lastID'];
				
		return $r;
	}
	
	    
	function debug($t,$c=""){
		// return;
		echo "<pre style='border: 1px solid ".(strlen($c)? $c: 'gray')."'>";
		print_r($t);
		echo "</pre>";
	}
	
}
