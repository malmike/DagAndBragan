
<?php
	function viewEmployee($con)
	{
		$qry = "SELECT * FROM `employee`";
		$result=mysqli_query($con, $qry);
?>	
        <label for="name">EMPLOYEE DETAILS</label> <br/> 		
		<table class="table table-condensed"> 
						<thead> 
							<tr>
								<th>ID</th>								
								<th>NAME</th> 
                                <th>APPROVAL</th>
								<th>MOBILE</th> 
								<th>OTHER MOBILE</th> 
								<th>EMAIL</th> 
								<th>DEPARTMENT</th> 
								<th>POSITION</th> 
							</tr> 
						</thead>
					<?php 
						while($row = mysqli_fetch_array($result, MYSQLI_BOTH))
						{
					?>
							<tbody>
								<tr> 
					<?php
									echo "<td><a href='?change=changeStatus&id={$row['idEmployee']}&status={$row['Status']}'>{$row['idEmployee']}</a></td>";
									echo "<td>{$row[FName]} {$row[LName]}</td>";
									echo "<td>{$row['Status']}</td>";
                                    echo "<td>{$row['Mobile Number']}</td>";
									echo "<td>{$row['Phone Number']}</td>";
									echo "<td>{$row['Email']}</td>";
									echo "<td>{$row['Department']}</td>";
									echo "<td>{$row['Position']}</td>";
									
					?>
								</tr> 
							</tbody> 								
					<?php
						} 
					?>
		</table>																									
<?php
	}	
?>





