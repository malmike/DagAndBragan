<?php
	function viewSupplierList($con)
	{
		$qry = "SELECT * FROM `supplierlist`";
		$result=mysqli_query($con, $qry);
?>			
		<table class="table table-condensed"> 
				<label for="name">SUPPLIER DETAILS</label> <br/> 
						<thead> 
							<tr>
								<th>ID</th>								
								<th>NAME</th> 
								<th>CONTACT PERSON</th> 
								<th>ADDRESS</th> 
								<th>EMAIL</th> 
								<th>PHONE NO.</th> 
								<th>ALTERNATIVE PHONE NO.</th> 
							</tr> 
						</thead>
					<?php 
						while($row = mysqli_fetch_array($result, MYSQLI_BOTH))
						{
					?>
							<tbody> 
								<tr> 
					<?php
									echo "<td>{$row['idSupplier']}</td>";
									echo "<td>{$row['Name']}</td>";
									echo "<td>{$row['ContactPerson']}</td>";
									echo "<td>{$row['Address']}</td>";
									echo "<td>{$row['Email']}</td>";
									echo "<td>{$row['PhoneNumber']}</td>";
									echo "<td>{$row['OtherPhone']}</td>";
					?>
								</tr> 
							</tbody> 								
					<?php
						} 
					?>
		</table>
		<label><a href="F&Hindex.php?insert=insSupplier">ADD TO SUPPLIER LIST</a></label>
<?php
	}	
?>