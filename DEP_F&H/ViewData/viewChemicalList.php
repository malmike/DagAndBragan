<?php
	function viewChemicalList($con)
	{
		$qry = "SELECT * FROM `chemicalslist`";
		$result=mysqli_query($con, $qry);
?>			
		<table class="table table-condensed"> 
				<label for="name">LIST OF CHEMICALS</label> <br/> 
						<thead> 
							<tr>
								<th>ID</th>								
								<th>NAME</th> 
								<th>METRIC</th> 
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
									echo "<td>{$row['idChemicalsList']}</td>";
									echo "<td>{$row['Name']}</td>";
									echo "<td>{$row['MetricUnit']}{$row['Metric']}</td>";
									echo "<td>{$row['InUse']}</td>";
					?>
								</tr> 
							</tbody> 								
					<?php
						} 
					?>
		</table>
		<br/>
		<label><a href="F&Hindex.php?insert=insChemList">ADD TO CHEMICAL LIST</a></label>
<?php
	}	
?>