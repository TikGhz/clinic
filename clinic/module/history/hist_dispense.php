<?
	$add_time=date("Y-m-d : H:i:s");

	//---------------- SESSION ข้อมูลยาที่จ่าย
	$cnt=count($_SESSION['sdid']);
	$h_did=$_SESSION['sdid'];
	$h_unit=$_SESSION['sd_unit'];
	$h_price=$_SESSION['sd_price'];
	$h_sum=$_SESSION['sum'];
	$total_revenue=$_SESSION['total_revenue'];
	$total_price=$_SESSION['all_revenue'];
	
	if($cnt>0){
		//---------------- หากมียา 1 อย่างหรือเลือกยาใน Array แถวแรกเท่านั้น มาสร้างรายการการจ่ายยาเป็น ID แรก
		$sql2="INSERT INTO hist_dispense VALUES(	'', 
																			'$_POST[uid]', 
																			'$_POST[pid]', 
																			'$total_price'
																		)";
		if($result2=mysql_query($sql2) or die("sql_error2=".mysql_error())){
			$hist_dispense_id="1";
			$_SESSION[success]="เพิ่มข้อมูลสั่งจ่ายยา";
		}
										
		//---------------- สร้างรายการการจ่ายยาเป็น รายละเอียดสั่งจ่ายยา
		$sql3="INSERT INTO hist_dispense_detail VALUES(	(SELECT MAX(Hist_ID) FROM hist_dispense), 
																						'$h_did[0]', 
																						'$h_unit[0]', 
																						'$h_sum[0]', 
																						'$add_time'
																				)";
		//เรียกข้อมูลจำนวนยาของ id แรกใน array ออกมา
		$sql_drug="SELECT Drug_Unit FROM drug WHERE Drug_ID='$h_did[0]' ";
		$result_drug=mysql_query($sql_drug) or die ("drug_error=".mysql_error());
		list($Drug_Unit)=mysql_fetch_row($result_drug);
		
		//แล้วเอาจำนวนในฐานข้อมูล ลบ กับจำนวนยาที่จ่ายไปของ id แรกใน array เก็บไว้ในตัวแปร
		$drug_total=$Drug_Unit-$h_unit[0];
		
		//แล้วนำตัวแปรที่ได้มาอัพเดทเข้าที่เดิมเป็นจำนวนใหม่ เฉพาะข้อมูลแรกใน array
		$update_drug="UPDATE drug SET Drug_Unit='$drug_total' WHERE Drug_ID='$h_did[0]' ";
		$re_update_drug=mysql_query($update_drug) or die ("update_drug_error=".mysql_error());
		
		//---------------- หากมียา 2 อย่างขึ้นไป สร้างรายการการจ่ายยาเป็นรายละเอียด จะเพิ่มในรายการสั่งจ่ายยา
		if($cnt>1){
			for($i=1;$i<$cnt;$i++){
				$sql3.=",(		(SELECT MAX(Hist_ID) FROM hist_dispense), 
									'$h_did[$i]', 
									'$h_unit[$i]', 
									'$h_sum[$i]', 
									'$add_time'
							)";
				//เรียกข้อมูลจำนวนยาของ id แรกใน array ออกมา
				$sql_drug1="SELECT Drug_Unit FROM drug WHERE Drug_ID='$h_did[$i]' ";
				$result_drug1=mysql_query($sql_drug1) or die ("drug_error1=".mysql_error());
				list($Drug_Uni1t)=mysql_fetch_row($result_drug1);
				
				//แล้วเอาจำนวนในฐานข้อมูล ลบ กับจำนวนยาที่จ่ายไปของ id ใน array เก็บไว้ในตัวแปร
				$drug_total1=$Drug_Unit1-$h_unit[$i];
				
				//แล้วนำตัวแปรที่ได้มาอัพเดทเข้าที่เดิมเป็นจำนวนใหม่
				$update_drug1="UPDATE drug SET Drug_Unit='$drug_total' WHERE Drug_ID='$h_did[$i]' ";
				$re_update_drug1=mysql_query($update_drug1) or die ("update_drug_error1=".mysql_error());
			}
		}
		$result3=mysql_query($sql3) or die("sql_error3=".mysql_error());
		
		//---------------- หากมีใบนัดจะเพิ่ม
		if($_POST['tre_app']=="นัด"){
			$sql1="INSERT INTO appointment VALUES(		'',
																				'$_POST[uid]', 
																				'$_POST[pid]', 
																				'$_POST[a_detail]', 
																				'$_POST[a_time]', 
																				'รอดำเนินการ',
																				'$add_time'
																		)";
																		
			$result1=mysql_query($sql1) or die("sql_error1=".mysql_error());
			$GLOBALS[app]="1";
			$_SESSION[success].="และเพิ่มข้อมูลใบนัด";
		}

		if($hist_dispense_id=="1"){
			$sql_delete="DELETE FROM treatment WHERE Tre_ID='$_POST[case_id]' ";
			$result_delete=mysql_query($sql_delete) or die("sql_delete=".mysql_error());
			
			$sql_update="UPDATE hist_treatment SET Tre_Status='1' WHERE Tre_ID='$_POST[case_id]' ";
			$result_update=mysql_query($sql_update) or die("sql_update=".mysql_error());
			
			$_SESSION[success].="สำเร็จแล้ว ";
		}
		
		// คำนวนรายได้จากค่ารักษา
		$sql4="INSERT INTO revenue VALUES(	'',
																	'$_POST[uid]', 
																	'$_POST[pid]', 
																	'ค่ารักษา',
																	'$total_revenue',
																	'1',
																	'$add_time'
																)";
		$result4=mysql_query($sql4) or die("sql_error4=".mysql_error());
		
		// คำนวนรายได้จากการขายยาในระบบ
		for($i=0;$i<$cnt;$i++){
			$sql5="SELECT Drug_Cost_Price, Drug_Price FROM drug WHERE Drug_ID='$h_did[$i]' ";
			$result5=mysql_query($sql5) or die("sql_error5=".mysql_error());
			list($Drug_Cost_Price, $Drug_Price)=mysql_fetch_row($result5);
			
			// รายได้จากการขายยา =(ราคาจิง * จำนวนที่สั่งซื้อ) - (ราคาซื้อ * จำนวนที่สั่งซื้อ)
			$reve=($Drug_Price*$h_unit[$i])-($Drug_Cost_Price*$h_unit[$i]);
			
			$sql6="INSERT INTO revenue VALUES(	'',
																	'$_POST[uid]', 
																	'$_POST[pid]', 
																	'ขายยา',
																	'$reve',
																	'2',
																	'$add_time'
																)";
			$result6=mysql_query($sql6) or die("sql_error6=".mysql_error());
			
		}
		
		//---------------- ปิดฐานข้อมูล และยกเลิกเซสชั่นตามชื่อ
		mysql_close();
		unset($_SESSION['sdid']);
		unset($_SESSION['sd_name']);
		unset($_SESSION['sd_unit']);
		unset($_SESSION['sd_price']);
		unset($_SESSION['sum']);
		unset($_SESSION['total_revenue']);
		unset($_SESSION['all_revenue']);
		
		echo "<script type='text/javascript'>window.location='index_panel.php?module=treat&file=main_treat_dispen';</script>";
	}else{
		$_SESSION[error]="ไม่สามารถเพิ่มข้อมูลจ่ายยาและนัดหมายได้ เนื่องจากไม่มีข้อมูล";
		echo "<script type='text/javascript'>window.location='index_panel.php?module=treat&file=main_treat_dispen';</script>";

	
	}
?>