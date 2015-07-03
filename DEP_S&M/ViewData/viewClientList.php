<?php
	function viewClientList($con)
	{
		$qry = "SELECT * FROM `clientinformation`";
		$result=mysqli_query($con, $qry);
		//if($con) echo "yess!!!<br>";
		/* echo date('Y-m-d', strtotime("now"))."</br>";
		echo date('Y-m-d', strtotime("-1 week"))."</br>";
		echo date('Y-m-d', strtotime("-1 month"))."</br>";
		echo date('Y-m-d', strtotime("-6 month"))."</br>";
		echo date('Y-m-d', strtotime("-1 year"))."</br>";
		echo date('Y-m-d', strtotime("-3 year"))."</br>"; */
?>		
        <label for="name">CLIENT DETAILS</label> <br/> 	
		<table class="table table-condensed"> 
						<thead> 
							<tr>
								<th>ID</th>								
								<th>NAME</th> 
								<th>DATE OF REGISTRATION</th>
								<th>TYPE</th> 
								<th>CONTACT PERSON</th> 
								<th>LOCATION</th> 
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
									echo "<td>{$row['RefNo']}</td>";
									echo "<td>{$row['Name']}</td>";
									echo "<td>{$row['Date']}</td>";
									echo "<td>{$row['ClientType']}</td>";
									echo "<td>{$row['Contact Person']}</td>";
									echo "<td>{$row['Physical Address']}</td>";
									echo "<td>{$row['Email']}</td>";
									echo "<td>{$row['Mobile Number']}</td>";
									echo "<td>{$row['Phone Number']}</td>";
					?>
								</tr> 
							</tbody> 								
					<?php
						} 
					?>
		</table>
		<label><a href="S&Mindex.php?insert=insClientList">ADD TO CLIENT LIST</a></label>
<?php
	}	
?>