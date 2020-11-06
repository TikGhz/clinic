<?
	if($_POST['sd_unit']!=""){ //นับจำนวน
		$_SESSION['sd_unit']=$_POST['sd_unit'];
		
	}
	
	if($_POST['total_revenue']>="0"){ //ราคารวม
		$_SESSION['total_revenue']=$_POST['total_revenue'];
	}

	
	if($_GET['del']!=""){
		$count_order=count($_SESSION['sdid']);//นับจำนวนรายการสินค้า
			for($i=0;$i<$count_order;$i++){ //วนลูปตามจำนวนรายการสินค้า
				if($_GET[del]!=$_SESSION['sdid'][$i]){ //ถ้ารหัสสินค้าในตะกร้าไม่ตรงกับรหัสสินค้า
					//เก็บรหัสสินค้านั้นไว้ใน Array
					$tsdid[]=$_SESSION['sdid'][$i];
					$tsd_name[]=$_SESSION['sd_name'][$i];
					$tsd_price[]=$_SESSION['sd_price'][$i];
					$tsd_unit[]=$_SESSION['sd_unit'][$i];
				}
			}
			//เอาข้อมูลใน Array เก็บเข้าไปใน Session แทนที่ข้อมูลเดิม
				
				$_SESSION['sdid']=$tsdid;
				$_SESSION['sd_name']=$tsd_name;
				$_SESSION['sd_price']=$tsd_price;
				$_SESSION['sd_unit']=$tsd_unit;
	}
	echo "<script type='text/javascript'>window.location='index_panel.php?module=treat&file=treat_dispen&case_id=$_GET[case_id]#cal';</script>";
?>