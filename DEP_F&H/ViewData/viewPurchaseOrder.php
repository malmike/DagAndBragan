<?php
	function viewPurchaseOrder($con, $id)
	{
		if(isset($_POST['subPurchaseOrder']))$id=$_POST['purchaseOrder'];
		
		$qry = "SELECT `idPurchaseOrder`, `Date`, `SupplierList_idSupplier`, `Name`
				FROM `purchaseorder`,`supplierlist`
				WHERE `idPurchaseOrder`='$id' AND `SupplierList_idSupplier`=`idSupplier`";
		$result=mysqli_query($con, $qry);
		if(mysqli_num_rows($result) == 1) 
		{
			$row = mysqli_fetch_assoc($result);	

			echo "<h4>Date: ".$row['Date']."</h4>";
			echo "<h4>To: ".$row['Name']."</h4>";
			echo "<h4>Ref: ".$id."</h4></br>";
		}
		
		$chem ="SELECT `idChemicalsList`, `Quantity`, `Name`,`Metric`,`MetricUnit`,`UnitPrice` 
				FROM `purchaselist`,`chemicalslist` 
				WHERE `PurchaseOrder_idPurchaseOrder`='$id' AND `idChemicalsList`=`ChemicalsList_idChemicalsList`";
		$chemResult=mysqli_query($con, $chem);		
		
				
		$equip ="SELECT `idEquipment`, `Quantity`, `Name`, `UnitPrice`
				FROM `purchaselist`,`equipment&ppe` 
				WHERE `PurchaseOrder_idPurchaseOrder`='$id' AND `idEquipment`=`Equipment&PPE_idEquipment&PPE`";
		$equipResult=mysqli_query($con, $equip);	
?>	

		<label for="name">PLEASE SUPPLY THE FOLLOWING ITEMS</label> <br/> 	
		<table class="table table-condensed"> 
						<thead> 
							<tr>
								<th>ITEM</th>
								<th>METRIC UNIT</th>
								<th>QTY</th> 
								<th>UNIT PRICE</th> 
								<th>TOTALS</th>  
							</tr> 
						</thead>
						<tbody>
					<?php 
						if(mysqli_num_rows($chemResult) > 0)
						{
							while($row = mysqli_fetch_array($chemResult, MYSQLI_BOTH))
							{
								$name = $row['Name'];
								$metricUnit = $row['MetricUnit'].$row['Metric'];
								$quantity = $row['Quantity'];
								$unitPrice = $row['UnitPrice'];
								$total = $row['UnitPrice']*$row['Quantity'];
								
								$grandTotal += $total;
							
								echo "<tr>";
								echo "<td>{$name}</td>";
								echo "<td>{$metricUnit}</td>";
								echo "<td>{$quantity}</td>";
								echo "<td>{$unitPrice}</td>";
								echo "<td>{$total}</td>";
								echo "</tr>";
							}
						}
						
						if(mysqli_num_rows($equipResult) > 0)
						{
							while($row = mysqli_fetch_array($equipResult, MYSQLI_BOTH))
							{
								$name = $row['Name'];
								$metricUnit = "-";
								$quantity = $row['Quantity'];
								$unitPrice = $row['UnitPrice'];
								$total = $row['UnitPrice']*$row['Quantity'];
								
								$grandTotal += $total;
							
								echo "<tr>";
								echo "<td>{$name}</td>";
								echo "<td>{$metricUnit}</td>";
								echo "<td>{$quantity}</td>";
								echo "<td>{$unitPrice}</td>";
								echo "<td>{$total}</td>";
								echo "</tr>";
							}
						}
					?>
					<tr>
						<td>GRAND TOTAL</td>
						<td></td>
						<td></td>
						<td></td>
						<td><?php echo $grandTotal?></td>
					</tr>
				</tbody> 
		</table>
		
<?php
	}	
?>