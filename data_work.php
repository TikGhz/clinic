<?php
header("Content-type:application/json; charset=UTF-8");          
header("Cache-Control: no-store, no-cache, must-revalidate");         
header("Cache-Control: post-check=0, pre-check=0", false);    

include("include/connect.php");
	$result_work=mysql_query("SELECT Work_ID, User_ID, Work_Date, Work_Enter, Work_Out, Work_Color FROM work");
?>
 [
<? 	
	$i=0;
	while(list($Work_ID, $User_ID1, $Work_Date, $Work_Enter, $Work_Out, $Work_Color)=mysql_fetch_row($result_work)){
		$i++;
		$result_doctor=mysql_query("SELECT User_Name, User_Lastname FROM user WHERE User_ID='$User_ID1' ") or die (mysql_error());
		list($User_Name, $User_Lastname)=mysql_fetch_row($result_doctor);
		if($i!=mysql_num_rows($result_work)){
?>
			{
                "title": "<? echo $User_Name," ",$User_Lastname; ?>",
                "start": "<? echo $Work_Date;?>T<? echo $Work_Enter; ?>",
                "end": "<? echo $Work_Date;?>T<? echo $Work_Out; ?>",
                "color":"<? echo $Work_Color; ?>"
			},
<?	}else{	?>
			{
                "title": "<? echo $User_Name," ",$User_Lastname; ?>",
                "start": "<? echo $Work_Date;?>T<? echo $Work_Enter; ?>",
                "end": "<? echo $Work_Date;?>T<? echo $Work_Out; ?>",
                "color":"<? echo $Work_Color; ?>"
			}
<?	}	
	}	?>
]