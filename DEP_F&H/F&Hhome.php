<?php
	session_start();
	function fhhome()
	{
?>

    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="#">F&H DEPARTMENT</a>
            </div>
            <div>
                <ul class="nav navbar-nav">					
					    <li class="dropdown"> <a class="dropdown-toggle" data-toggle="dropdown">INVENTORY<span class="caret"></span> </a> 
						    <ul class="dropdown-menu"> 
							    <li class="divider"></li>
							    <li><a href="?view=viewChemList">CHEMICALLIST</a></li>
							    <li class="divider"></li>
							    <li><a href="?view=viewEquip">EQUIPMENT&PPE</a></li>
							    <li class="divider"></li>
							    <li><a href="?insert=insInventoryOut">INVENTORYOUT</a></li> 
							    <li class="divider"></li>
						    </ul> 
					    </li> 
					
					    <li class="dropdown"> <a class="dropdown-toggle" data-toggle="dropdown">PURCHASEORDER<span class="caret"></span> </a> 
						    <ul class="dropdown-menu">
                                <li class="divider"></li> 
							    <li><a href="?insert=insPurchaseOrder">ENTER PURCHASEORDER</a></li> 
                                <li class="divider"></li>
							    <li><a href="?insert=selPurchaseOrder">SELECT PURCHASEORDER</a></li> 
                                <li class="divider"></li>
						    </ul> 
					    </li> 
					    <li class="dropdown"> <a class="dropdown-toggle" data-toggle="dropdown">DELIVARYNOTE<span class="caret"></span> </a> 
						    <ul class="dropdown-menu">
                                <li class="divider"></li> 
							    <li><a href="?insert=insDelivaryNote">ENTER DELIVARYNOTE</a></li>
                                <li class="divider"></li>
							    <li><a href="?insert=selDelivaryNote">SELECT DELIVARYNOTE</a></li> 
                                <li class="divider"></li>
						    </ul> 
					    </li>
                        <li class="dropdown"> <a class="dropdown-toggle" data-toggle="dropdown">SUPPLIER<span class="caret"></span> </a> 
						    <ul class="dropdown-menu">
                                <li class="divider"></li> 
							    <li><a href="?view=viewSuppliers">SUPPLIERLIST</a></li>						
                                <li class="divider"></li>
							    <li><a href="?view=viewInvoice">SUPPLIERINVOICE</a></li>
                                <li class="divider"></li>
						    </ul> 
					    </li> 
                         <?php if($i == 1){?> <li class="active"> <?php } else{?> <li> <?php } ?><a href="?view=viewEmployee">EMPLOYEE</a></li>   
                </ul>
                <ul class="nav navbar-nav navbar-right">
                        <li><a href="?action=logout"><span class="glyphicon glyphicon-log-out"></span> LOGOUT</a></li>
                </ul>
            </div>
        </div>
    </nav>

<?php
	}
?>