<?php
	function viewEquip($con)
	{
		$qry = "SELECT * FROM `equipment&ppe`";
		$result=mysqli_query($con, $qry);
?>			
		<table class="table table-condensed"> 
				<label for="name">LIST OF EQUIPMENT AND PPE</label> <br/> 
						<thead> 
							<tr>
								<th>ID</th>								
								<th>NAME</th> 
								<th>IN USE</th>  
							</tr> 
						</thead>
					<?php 
						while($row = mysqli_fetch_array($result, MYSQLI_BOTH))
						{
					?>
							<tbody> 
								<tr> 
					<?php
									echo "<td>{$row['idEquipment']}</td>";
									echo "<td>{$row['Name']}</td>";
									echo "<td>{$row['InUse']}</td>";
					?>
								</tr> 
							</tbody> 								
					<?php
						} 
					?>
		</table>
		<br/>
		<label><a href="F&Hindex.php?insert=insEquip">ADD TO EQUIPMENT AND PPE</a></label>
<?php
	}	
?>