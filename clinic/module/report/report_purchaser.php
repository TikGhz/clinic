            <div class="row">
                <div class="col-lg-12 hidden-print">
                    <h1 class="page-header">รายงานจัดซื้อเวชภัณฑ์</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                	<div class="row hidden-print">
                    	
                    </div><div class="panel-body">
                            <form action="index_panel.php?module=report&file=report_purchaser" method="post">
                            	<div class="form-inline" style="float:left; margin-right:5px;">
                                    <div class="form-group input-group">
										<span class="input-group-addon">ระหว่างวันที่</span>
										<input type="text" id="date_timepicker_start" class="form-control" name="date_start" value="<? echo $_POST[date_start]; ?>" placeholder="วันที่เริ่ม">
									</div>
                                    <div class="form-group input-group">
										<span class="input-group-addon">ถึงวันที่</span>
										<input type="text" id="date_timepicker_end" class="form-control" name="date_end" value="<? echo $_POST[date_end]; ?>" placeholder="วันที่สุดท้าย">
									</div>
                                </div>
								<div class="form-inline" style="float:left; margin-right:5px;">
                                	<div class="form-group input-group">
                                    	<?	if($_POST[p_status]=="ทั้งหมด"){ $sel1="selected";}else{$sel1="";}
												if($_POST[p_status]=="รอดำเนินการ"){ $sel2="selected";}else{$sel2="";}
												if($_POST[p_status]=="รับแล้วบางส่วน"){ $sel3="selected";}else{$sel3="";}
												if($_POST[p_status]=="รับทั้งหมดแล้ว"){ $sel4="selected";}else{$sel4="";}
										?>
										<span class="input-group-addon">สถานะ</span>
											<select class="form-control" name="p_status" >
												<option value="ทั้งหมด" <? echo $sel1; ?>>ทั้งหมด</option>
												<option value="รอดำเนินการ" <? echo $sel2; ?>>รอดำเนินการ</option>
                                                <option value="รับแล้วบางส่วน" <? echo $sel3; ?>>รับแล้วบางส่วน</option>
                                                <option value="รับทั้งหมดแล้ว" <? echo $sel4; ?>>รับทั้งหมดแล้ว</option>
											</select>
									</div>
                                </div>
                                	<? $a=$_GET[date_start]; ?>
										<button type="submit" class="btn btn-info"><i class="fa fa-search-plus fa-fw"></i> เรียกดู</button>
                                    	<button type="button" class="btn btn-success" style="background-color: #9e6ab8;" onclick="print();"> พิมพ์หน้านี้</button>
                            </form>
                    	</div>
                    
                    <div class="row hidden-print">
                        <div class="panel-body">
                            <div class="table-responsive">
                            <?
							if($_POST[date_start]==""){$_POST[date_start]="1950-01-01";}
							if($_POST[date_end]==""){$_POST[date_end]="2050-12-31";}
							if($_POST[p_status]=="ทั้งหมด"){
								$result_purchaser_detail=mysql_query("SELECT Purd_ID, Pur_ID, Drug_ID, Purd_Unit, Purd_Cost_Price, Purd_Price, Purd_Status, User_ID, Purd_Date FROM purchaser_detail WHERE Purd_Date Between '$_POST[date_start]' and '$_POST[date_end]' ORDER BY Purd_ID ASC");
							}else{
								$result_purchaser_detail=mysql_query("SELECT Purd_ID, Pur_ID, Drug_ID, Purd_Unit, Purd_Cost_Price, Purd_Price, Purd_Status, User_ID, Purd_Date FROM purchaser_detail WHERE Purd_Date Between '$_POST[date_start]' and '$_POST[date_end]' AND Purd_Status='$_POST[p_status]' ORDER BY Purd_ID ASC");
							}
							list($year1,$month1,$day1)=explode("-","$_POST[date_start]");
							list($year2,$month2,$day2)=explode("-","$_POST[date_end]");
							
							for($i=1;$i<10;$i++){
								if($day1 == $i ){$day1=$i;}
								if($day2 == $i ){$day2=$i;}
							}
							
	$thaiweek=array("วันอาทิตย์","วันจันทร์","วันอังคาร","วันพุธ","วันพฤหัส","วันศุกร์","วันเสาร์");

	$thaimonth=array("มกราคม","กุมภาพันธ์","มีนาคม","เมษายน","พฤษภาคม","มิถุนายน","กรกฎาคม","สิงหาคม","กันยายน","ตุลาคม","พฤศจิกายน","ธันวาคม");

	$thaimonth1=array("ม.ค.","ก.พ.","มี.ค.","เม.ย.","พ.ค.","มิ.ย.","ก.ค.","ส.ค.","ก.ย.","ต.ค.","พ.ย.","ธ.ค.");
							?>
                            <div class="text-center">
                            	<h3>รายงานจัดซื้อเวชภัณฑ์</h3>
                            	<h5>สถานะ <? echo $_POST[p_status]; ?>
                                <?	echo "ระหว่างวันที่ ",date($day1)," ", $thaimonth[date($month1)-1] , " พ.ศ. ",date($year1)+543;	?>
                                <?	echo "ถึงวันที่ ",date($day2)," ", $thaimonth[date($month2)-1] , " พ.ศ. ",date($year2)+543;	?>
                                </h5>
                            </div>
                                <table class="table table-striped table-bordered table-hover" style="border-left:0px;border-right:0px;">
                                    <thead style="border-bottom:1px solid #ddd;">
                                        <tr>
                                            <th class="text-center" width="5%" style="border:0px;">ลำดับ</th>
                                            <th class="text-center" width="20%" style="border:0px;">ผู้จัดซื้อ</th>
                                            <th class="text-center" width="20%" style="border:0px;">เวชภัณฑ์</th>
                                            <th class="text-center" width="9%" style="border:0px;">จำนวน</th>
                                            <th class="text-center" width="10%" style="border:0px;">ต้นทุน(บาท)</th>
                                            <th class="text-center" width="10%" style="border:0px;">ขาย(บาท)</th>
                                            <th class="text-center" width="13%" style="border:0px;">เมื่อวันที่</th>
                                            <th class="text-center" width="13%" style="border:0px;">สถานะ</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                            <?	$i=0;
								while(list($Purd_ID, $Pur_ID1, $Drug_ID1, $Purd_Unit, $Purd_Cost_Price, $Purd_Price, $Purd_Status, $User_ID1, $Purd_Date)=mysql_fetch_row($result_purchaser_detail)){
									$i++;
									
									$sql_report_user="SELECT User_Name, User_Lastname FROM user WHERE User_ID='$User_ID1' ";
									$result_report_user=mysql_query($sql_report_user) or die (mysql_error());
									list($User_Name, $User_Lastname)=mysql_fetch_row($result_report_user);
									
									$sql_purchaser="SELECT Pur_Business FROM purchaser WHERE Pur_ID='$Pur_ID1' ";
									$result_purchaser=mysql_query($sql_purchaser)or die (mysql_error());
									list($Pur_Business)=mysql_fetch_row($result_purchaser);
									
									$result_drug=mysql_query("SELECT Drug_Name, Drug_Type_ID FROM drug WHERE Drug_ID='$Drug_ID1' ") or die (mysql_error());
									list($Drug_Name, $Drug_Type_ID)=mysql_fetch_row($result_drug);
									
									$sql_drug_type="SELECT Drug_Type_ID, Drug_Type_Name FROM drug_type WHERE Drug_Type_ID='$Drug_Type_ID' ";
									$result_drug_type=mysql_query($sql_drug_type)or die (mysql_error());
									list($Drug_Type_ID1, $Drug_Type_Name1)=mysql_fetch_row($result_drug_type)
							?>
                                        <tr class="odd gradeX">
                                            <td class="text-center" style="border:0px;"><? echo $i; ?></td>
                                            <td style="border:0px;"><? echo $Pur_Business; ?></td>
                                            <td style="border:0px;"><? echo $Drug_Name; ?></td>
                                            <td class="text-center" style="border:0px;"><? echo $Purd_Unit," ",$Drug_Type_Name1?></td>
                                            <td class="text-center" style="border:0px;"><? echo $Purd_Cost_Price; ?></td>
                                            <td class="text-center" style="border:0px;"><? echo $Purd_Price; ?></td>
                                            <td class="text-center" style="border:0px;">
                                            <?	list($year3,$month3,$day3)=explode("-","$Purd_Date");	
											for($z=1;$z<10;$z++){
												if($day3 == $z ){$day3=$z;}
											}	
											echo date($day3)," ", $thaimonth1[date($month3)-1] ," ",date($year3)+543;	?>
                                            </td>
                                            <td class="text-center" style="border:0px;"><? echo $Purd_Status; ?></td>
                                        </tr>
							<?
								}
							?>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
					</div>
                    <!--<div class="row visible-print-block">-->
                    <div class="row visible-print-block">
                        <div class="panel-body">
                            <div class="table-responsive">
                            <?
							if($_POST[date_start]==""){$_POST[date_start]="1950-01-01";}
							if($_POST[date_end]==""){$_POST[date_end]="2050-12-31";}
							if($_POST[p_status]=="ทั้งหมด"){
								$result_purchaser_detail=mysql_query("SELECT Purd_ID, Pur_ID, Drug_ID, Purd_Unit, Purd_Cost_Price, Purd_Price, Purd_Status, User_ID, Purd_Date FROM purchaser_detail WHERE Purd_Date Between '$_POST[date_start]' and '$_POST[date_end]' ORDER BY Purd_ID ASC");
							}else{
								$result_purchaser_detail=mysql_query("SELECT Purd_ID, Pur_ID, Drug_ID, Purd_Unit, Purd_Cost_Price, Purd_Price, Purd_Status, User_ID, Purd_Date FROM purchaser_detail WHERE Purd_Date Between '$_POST[date_start]' and '$_POST[date_end]' AND Purd_Status='$_POST[p_status]' ORDER BY Purd_ID ASC");
							}
							list($year1,$month1,$day1)=explode("-","$_POST[date_start]");
							list($year2,$month2,$day2)=explode("-","$_POST[date_end]");
							
							for($i=1;$i<10;$i++){
								if($day1 == $i ){$day1=$i;}
								if($day2 == $i ){$day2=$i;}
							}
							
	$thaiweek=array("วันอาทิตย์","วันจันทร์","วันอังคาร","วันพุธ","วันพฤหัส","วันศุกร์","วันเสาร์");

	$thaimonth=array("มกราคม","กุมภาพันธ์","มีนาคม","เมษายน","พฤษภาคม","มิถุนายน","กรกฎาคม","สิงหาคม","กันยายน","ตุลาคม","พฤศจิกายน","ธันวาคม");

	$thaimonth1=array("ม.ค.","ก.พ.","มี.ค.","เม.ย.","พ.ค.","มิ.ย.","ก.ค.","ส.ค.","ก.ย.","ต.ค.","พ.ย.","ธ.ค.");
							?>
                            <div class="text-center">
                            	<h3>รายงานจัดซื้อเวชภัณฑ์</h3>
                            	<h5>สถานะ <? echo $_POST[p_status]; ?>
                                <?	echo "ระหว่างวันที่ ",date($day1)," ", $thaimonth[date($month1)-1] , " พ.ศ. ",date($year1)+543;	?>
                                <?	echo "ถึงวันที่ ",date($day2)," ", $thaimonth[date($month2)-1] , " พ.ศ. ",date($year2)+543;	?>
                                </h5>
                            </div>
                                <table class="table table-striped table-bordered table-hover" style="border-left:0px;border-right:0px;">
                                    <thead style="border-bottom:1px solid #ddd;">
                                        <tr>
                                            <th class="text-center" width="5%" style="border:0px;">ลำดับ</th>
                                            <th class="text-center" width="20%" style="border:0px;">ผู้จัดซื้อ</th>
                                            <th class="text-center" width="20%" style="border:0px;">เวชภัณฑ์</th>
                                            <th class="text-center" width="10%" style="border:0px;">จำนวน</th>
                                            <th class="text-center" width="10%" style="border:0px;">ต้นทุน(บาท)</th>
                                            <th class="text-center" width="10%" style="border:0px;">ขาย(บาท)</th>
                                            <th class="text-center" width="10%" style="border:0px;">เมื่อวันที่</th>
                                            <th class="text-center" width="15%" style="border:0px;">สถานะ</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                            <?	$i=0;
								while(list($Purd_ID, $Pur_ID1, $Drug_ID1, $Purd_Unit, $Purd_Cost_Price, $Purd_Price, $Purd_Status, $User_ID1, $Purd_Date)=mysql_fetch_row($result_purchaser_detail)){
									$i++;
									
									$sql_report_user="SELECT User_Name, User_Lastname FROM user WHERE User_ID='$User_ID1' ";
									$result_report_user=mysql_query($sql_report_user) or die (mysql_error());
									list($User_Name, $User_Lastname)=mysql_fetch_row($result_report_user);
									
									$sql_purchaser="SELECT Pur_Business FROM purchaser WHERE Pur_ID='$Pur_ID1' ";
									$result_purchaser=mysql_query($sql_purchaser)or die (mysql_error());
									list($Pur_Business)=mysql_fetch_row($result_purchaser);
									
									$result_drug=mysql_query("SELECT Drug_Name, Drug_Type_ID FROM drug WHERE Drug_ID='$Drug_ID1' ") or die (mysql_error());
									list($Drug_Name, $Drug_Type_ID)=mysql_fetch_row($result_drug);
									
									$sql_drug_type="SELECT Drug_Type_ID, Drug_Type_Name FROM drug_type WHERE Drug_Type_ID='$Drug_Type_ID' ";
									$result_drug_type=mysql_query($sql_drug_type)or die (mysql_error());
									list($Drug_Type_ID1, $Drug_Type_Name1)=mysql_fetch_row($result_drug_type)
							?>
                                        <tr class="odd gradeX">
                                            <td class="text-center" style="border:0px;"><? echo $i; ?></td>
                                            <td style="border:0px;"><? echo $Pur_Business; ?></td>
                                            <td style="border:0px;"><? echo $Drug_Name; ?></td>
                                            <td class="text-center" style="border:0px;"><? echo $Purd_Unit," ",$Drug_Type_Name1?></td>
                                            <td class="text-center" style="border:0px;"><? echo $Purd_Cost_Price; ?></td>
                                            <td class="text-center" style="border:0px;"><? echo $Purd_Price; ?></td>
                                            <td class="text-center" style="border:0px;">
                                            <?	list($year3,$month3,$day3)=explode("-","$Purd_Date");	
											for($z=1;$z<10;$z++){
												if($day3 == $z ){$day3=$z;}
											}	
											echo date($day3)," ", $thaimonth1[date($month3)-1] ," ",date($year3)+543;	?>
                                            </td>
                                            <td class="text-center" style="border:0px;"><? echo $Purd_Status; ?></td>
                                        </tr>
							<?
								}
							?>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
					</div>
                </div>
                <!-- /.col-lg-12 -->
            </div>