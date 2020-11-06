<?
	if(empty($_SESSION['sdid'])){
		$_SESSION['sdid']=array();
	}
	
		if(!in_array($_POST['did'],$_SESSION['sdid'])){
			$sql="SELECT Drug_ID, Drug_Name, Drug_Unit, Drug_Price FROM drug WHERE Drug_ID='$_POST[did]' ";
			$result=mysql_query($sql);
			list($Drug_ID, $Drug_Name, $Drug_Unit, $Drug_Price)=mysql_fetch_row($result);
			
			$_SESSION['sdid'][]=$_POST['did'];
			$_SESSION['sd_name'][]=$Drug_Name;
			$_SESSION['sd_price'][]=$Drug_Price;
			$_SESSION['sd_unit'][]=1;
		}
	//header("Location:cart.php");
	echo "<script type='text/javascript'>window.location='index_panel.php?module=treat&file=treat_dispen&case_id=$_GET[case_id]';</script>";
?>