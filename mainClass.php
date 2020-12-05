<?php

class main {

	var $showSQLerrors = true;
	var $linkSQL = false;
	var $mysqli = false;
	var $lastInsertID = 0;
    var $shopName = 'Sklep Zoologiczny';
    

    var $daysOfWeek = array(
		1 => 'poniedziałek',
		2 => 'wtorek',
		3 => 'środa',
		4 => 'czwartek',
		5 => 'piątek',
		6 => 'sobota',
		0 => 'niedziela',
	);
	
	var $monthNames = array(
		1=>'styczeń',
		2=>'luty',
		3=>'marzec',
		4=>'kwiecień',
		5=>'maj',
		6=>'czerwiec',
		7=>'lipiec',
		8=>'sierpień',
		9=>'wrzesień',
		10=>'październik',
		11=>'listopad',
		12=>'grudzień',
	);
	
	
	function __construct() {
		//global $mainSettings;		
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
		echo "<pre style='border: 1px solid ".(strlen($c)? $c: 'gray')."'>";
		print_r($t);
		echo "</pre>";
	}
	
}
