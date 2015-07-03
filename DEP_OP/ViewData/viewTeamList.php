<?php
	function viewTeamList($dbo)
	{
		$qry = "SELECT `idTeam`, `ClientInformation_RefNo`, `Employee_idEmployee`, `Name`,`FName`, `LName`, `NumberOfMembers`, team.Date
                 FROM `team` INNER JOIN `clientinformation` ON `ClientInformation_RefNo` = `RefNo` INNER JOIN `employee` 
                 ON `idEmployee`=`Employee_idEmployee`";
		$row = $dbo->prepare($qry);
        $row->execute();
        $result=$row->fetchAll(PDO::FETCH_ASSOC);

?>		
        <label for="name">TEAM DETAILS</label> <br/>	
		<table class="table table-condensed">  
						<thead> 
							<tr>
								<th>TEAM ID</th>								
								<th>CLIENT REFNo.</th> 
								<th>CLIENT NAME</th>
								<th>TEAM LEADER</th> 
								<th>NUMBER OF MEMBERS</th> 
								<th>DATE</th> 
							</tr> 
						</thead>
					<?php 
						foreach($result as $value)
						{
					?>
							<tbody> 
								<tr> 
					<?php
									echo "<td>
                                    <a href='?view=viewTeamMembers&teamID={$value['idTeam']}&ClientRefNo={$value['ClientInformation_RefNo']}&ClientName={$value['Name']}&Date={$value['Date']}&TeamLeaderID={$value['Employee_idEmployee']}&FName={$value['FName']}&LName={$value['LName']}'>    
                                    {$value['idTeam']}</a></td>";
									echo "<td>{$value['ClientInformation_RefNo']}</td>";
									echo "<td>{$value['Name']}</td>";
									echo "<td>{$value['FName']} {$value['LName']}</td>";
									echo "<td>{$value['NumberOfMembers']}</td>";
									echo "<td>{$value['Date']}</td>";
					?>
								</tr> 
							</tbody> 								
					<?php
						} 
					?>
		</table>
		<label><a href="?insert=insTeam">ADD A TEAM</a></label>
<?php
	}	
?>