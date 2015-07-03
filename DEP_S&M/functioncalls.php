<?php error_reporting(E_ALL ^ E_NOTICE);?>
<?php
	session_start();

	include'includeParameters.php';
	
	$a = $_REQUEST['view'];
	$b = $_REQUEST['insert'];
	$c = $_REQUEST['connect'];
	$d = $_REQUEST['action'];
	if(!$a & !$b & !$c & !$d)
    {
        smhome();
        viewClientList($con);
    }else
    {
	    smhome();
	
	    switch($a)
	    {		
		    case "viewClientList":
			    viewClientList($con);
			    break;
		
	    }
	
	    switch($b)
	    {		
		    case "insClientList":
			    clientListForm($con);
			    break;
		
	    }
	
	    switch($c)
	    {		
		    case "client":
			    insClientList($con);
			    break;
		
	    }
	
	    switch($d)
	    {
		
		    case "logout":
			    logout();
			    break;
			
		
	    }
	}
?>