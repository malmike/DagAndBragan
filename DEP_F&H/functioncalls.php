<?php error_reporting(E_ALL ^ E_NOTICE);?>
<?php
	session_start();
	
	include'includeParameters.php';
	
	$a = $_REQUEST['view'];
	$b = $_REQUEST['insert'];
	$c = $_REQUEST['connect'];
	$d = $_REQUEST['action'];
    $e = $_REQUEST['change'];
	$id = $_REQUEST['id'];
	$status = $_REQUEST['status'];
	
    if(!$a & !$b & !$c & !$d & !$e)
    {
      fhhome();
      viewEmployee($con);  
    }else
    {
	    fhhome();
	    switch($a)
	    {		
		    case "viewInventory":
			    echo "Not worked on";
			    break;
		    case "viewChemList":
			    viewChemicalList($con);
			    break;
		
		    case "viewEquip":
			    viewEquip($con);
			    break;
		
		    case "viewStockReciptrReport":
			    echo "Not worked on";
			    break;
		
		    case "viewSuppliers":
			    viewSupplierList($con);
			    break;		
	
		    case "viewPurchaseOrder":
			    viewPurchaseOrder($con, $id);
			    break;
			
		    case "viewDelivaryNote":
			    viewDelivaryNote($con, $id);
			    break;
			
		    case "viewInvoice":
			    echo "Not worked on";
			    break;
			
		    case "viewEmployee":
			    viewEmployee($con);
			    break;	
			
			
	    }
	
	    switch($b)
	    {		
		    case "insChemList":
			    ChemicalListForm();
			    break;
			
		    case "insEquip":
			    EquipmentForm();
			    break;
			
		    case "insSupplier":
			    SupplierListForm();
			    break;
		
		    case "insPurchaseOrder":
			    purchaseOrderForm($con);
			    break;
			
		    case "insPurchaseList":
			    purchaseListForm($con);
			    break;
		
		    case "selPurchaseOrder":
			    selectPurchaseOrderForm($con);
			    break;
			
		    case "insDelivaryNote":
			    delivaryNoteForm($con);
			    break;
			
		    case "insDelivaryNoteItem":
			    delivaryNoteItemForm($con);
			    break;
		
		    case "selDelivaryNote":
			    selectDelivaryNoteForm($con);
			    break;
			
		    case "insInventoryOut":
			    inventoryOutForm($con);
			    break;
	    }
	    switch($c)
	    {
		
		    case "sup":
			    insSupplier($con);
			    break;
			
		    case "chem":
			    insChemicalsList($con);
			    break;
			
		    case "equip":
			    insEquipment($con);
			    break;
			
		    case "purchaseOrder":
			    insPurchaseOrder($con);
			    break;
			
		    case "purchaseItem":
			    insPurchaseItem($con);
			    break;
			
		    case "delivaryNote":
			    insDelivaryNote($con);
			    break;
			
		    case "delivaryNoteItem":
			    insDelivaryNoteItem($con);
			    break;
		
		    case "inventoryOut":
			    insInventoryOut($con);
			    break;
			
	    }
	
	    switch($d)
	    {
		
		    case "logout":
			    logout();
			    break;
			
		
	    }
        switch($e)
        {
            case "changeStatus":
                changeStatus($dbo, $id, $status);
                break;
        }
	}
?>