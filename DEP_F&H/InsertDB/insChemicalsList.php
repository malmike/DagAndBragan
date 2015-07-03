<?php 

	function insChemicalsList($con)
	{
		
		$id = clean($con, $_POST['id']);
		$cname = clean($con, $_POST['cname']);
		$quantity = clean($con, $_POST['quantity']);
		$metricUnit = clean($con, $_POST['metricUnit']);
		$use = clean($con, $_POST['use']);
		
		
		$ins = mysqli_query($con, "INSERT INTO chemicalslist (idChemicalsList, Name, MetricUnit, Metric, InUse) VALUES ('$id', '$cname', '$quantity', '$metricUnit', '$use')");
		if(!$ins)
		{
			header("location: F&Hindex.php?view=viewChemList");
		}
		else
		{
			header("location: F&Hindex.php?view=viewChemList");		
        }

	}
?>