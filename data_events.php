<?php
header("Content-type:application/json; charset=UTF-8");          
header("Cache-Control: no-store, no-cache, must-revalidate");         
header("Cache-Control: post-check=0, pre-check=0", false);    

include("include/connect.php");
	$sql="SELECT App_ID, User_ID, Pat_ID, App_Detail, App_Time, App_Status, App_Date FROM appointment";
	$result=mysql_query($sql) or die (mysql_error());
?>
 [
<? 	
	$i=0;
	while(list($App_ID, $User_ID, $Pat_ID, $App_Detail, $App_Time, $App_Status, $App_Date)=mysql_fetch_row($result)){
		$i++;
			if($App_Status=="เรียบร้อย"){ $col="#5cb85c"; }
			elseif($App_Status=="รอดำเนินการ"){ $col="#428bca"; }
			elseif($App_Status=="ยกเลิก"){ $col="#d9534f"; }
			else{ $col=""; }
		if($i!=mysql_num_rows($result)){
?>
			{
                "title": "<? echo $App_Detail;?>",
                "start": "<? echo $App_Time;?>T07:00:00",
                "end": "<? echo $App_Time;?>T17:00:00",
                "color":"<? echo $col; ?>"
			},
<?	}else{	?>
			{
                "title": "<? echo $App_Detail;?>",
                "start": "<? echo $App_Time;?>T07:00:00",
                "end": "<? echo $App_Time;?>T17:00:00",
                "color":"<? echo $col; ?>"
			}
<?	}	
	}	?>
]