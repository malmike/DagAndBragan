<?php
    function changeStatus($dbo, $id, $status)
    {
        if($status=="Active")
        {
            $sql = "UPDATE `employee` SET `Status`= 'InActive' WHERE `idEmployee`='$id'";  
        }else if($status=="InActive")
        {
            $sql = "UPDATE `employee` SET `Status`= 'Active' WHERE `idEmployee`='$id'";
        }  
          
        $row = $dbo->prepare($sql);
		$row->execute();
        header("location: F&Hindex.php?view=viewEmployee");
    }


?>
