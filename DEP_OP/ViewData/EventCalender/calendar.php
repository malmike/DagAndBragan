<?php

error_reporting(0);
include("../../../ConnectDB/connect.php");

/// get current month and year and store them in $cMonth and $cYear variables
if($_REQUEST["month"]>0){
    $cMonth = "0".intval($_REQUEST["month"]);
    if ($_REQUEST["month"]>9) {
        $cMonth = intval($_REQUEST["month"]);
    }
    $cYear = intval($_REQUEST["year"]);
}else
{
    $cMonth = date("m");
    $cYear = date("Y");
}


// calculate next and prev month and year used for next / prev month navigation links and store them in respective variables
$prev_year = $cYear;
$next_year = $cYear;
$prev_month = intval($cMonth)-1;
$next_month = intval($cMonth)+1;

// if current month is December or January month navigation links have to be updated to point to next / prev years
if ($cMonth == 12 ) {
	$next_month = 1;
	$next_year = $cYear + 1;
} elseif ($cMonth == 1 ) {
	$prev_month = 12;
	$prev_year = $cYear - 1;
}

if ($prev_month<10) $prev_month = '0'.$prev_month;
if ($next_month<10) $next_month = '0'.$next_month;
?>
  <table class= "table table-bordered" width="100%">
 <thead>
	 <tr>
		  <th class="mNav"><a href="javascript:LoadMonth('<?php echo $prev_month; ?>', '<?php echo $prev_year; ?>')">&lt;&lt;&lt;&lt;</a></th>
		  <th colspan="5" class="cMonth"><i><?php echo date("F, Y",strtotime($cYear."-".$cMonth."-01")); ?></i></th>
		  <th class="mNav"><a href="javascript:LoadMonth('<?php echo $next_month; ?>', '<?php echo $next_year; ?>')">&gt;&gt;&gt;&gt;</a></th>
	  </tr>
 </thead>	  
<thead>	  
	<tr>
		<th class="mNav">S</th>
		<th class="mNav">M</th>
		<th class="mNav">T</th>
		<th class="mNav">W</th>
		<th class="mNav">T</th>
		<th class="mNav">F</th>
		<th class="mNav">S</th>
	</tr>
</thead>
<tbody>
<?php 
$first_day_timestamp = mktime(0,0,0,$cMonth,1,$cYear); // time stamp for first day of the month used to calculate 
$maxday = date("t",$first_day_timestamp); // number of days in current month
$thismonth = getdate($first_day_timestamp); // find out which day of the week the first date of the month is
$startday = $thismonth['wday']; // 0 is for Sunday and as we want week to start on Mon we subtract 1


for ($i=0; $i<($maxday+$startday); $i++) {
	
	if (($i % 7) == 0 ) echo "<tr>";
	
	if ($i < $startday) { echo "<td>&nbsp;</td>"; continue; };
	
	$current_day = $i - $startday + 1;
	if ($current_day<10) $current_day = '0'.$current_day;

// set css class name based on number of events for that day
		$event = eventDate($cYear."-".$cMonth."-".$current_day, $con);
		
		if($event != "")
		{
			$css='withevent';
			$click = "onclick=\"LoadEvents('".$cYear."-".$cMonth."-".$current_day."')\"";

		}else
		{
			$css='noevent'; 		
			$click = '';
		} 		
		
		echo "<td class='".$css."'".$click."><div class='date'><label>". $current_day . "<label></div>".$event."</td>";
		
		if (($i % 7) == 6 ) echo "</tr>";
	}
?> 
<tbody>
</table>

<?php
	function eventDate($date, $con)
	{
		$sql = "SELECT `idWorkPlan`, `Name`, `WorkType`, `StartDate` FROM `workplan`, `clientinformation` WHERE  `StartDate` <= '{$date}'AND `EndDate` >= '{$date}' AND `RefNo`=`ClientInformation_RefNo`";
		$sql_result = mysqli_query ($con, $sql) or die ('request "Could not execute SQL query" '.$sql);
		if(mysqli_num_rows($sql_result) > 0){
			while ($row = mysqli_fetch_array($sql_result, MYSQLI_BOTH)) 
			{
				$event .= "<b>{$row['WorkType']}:&nbsp</b>{$row['Name']} </br>";
			}
		}else
		{
			$event = "";
		}
		return $event;
	}
?>