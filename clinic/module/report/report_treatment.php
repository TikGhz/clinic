            <div class="row">
                <div class="col-lg-12 hidden-print">
                    <h1 class="page-header">รายงานการรักษา</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                	<div class="row hidden-print">
                    	<div class="panel-body">
                            <form action="index_panel.php?module=report&file=report_treatment" method="post">
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
										<span class="input-group-addon">ประเภท</span>
											<select class="form-control" name="tre_app" >
										<?	if($_POST[tre_app]=="ทั้งหมด"){ $sel1="selected";}else{$sel1="";}
												if($_POST[tre_app]=="นัด"){ $sel2="selected";}else{$sel2="";}
												if($_POST[tre_app]=="ไม่นัด"){ $sel3="selected";}else{$sel3="";}
										?>
												<option value="ทั้งหมด" <? echo $sel1; ?>>ทั้งหมด</option>
                                                <option value="นัด" <? echo $sel2; ?>>นัด</option>
                                                <option value="ไม่นัด" <? echo $sel3; ?>>ไม่นัด</option>
											</select>
									</div>
                                </div>
                                	<? $a=$_GET[date_start]; ?>
										<button type="submit" class="btn btn-info"><i class="fa fa-search-plus fa-fw"></i> เรียกดู</button>
                                    	<button type="button" class="btn btn-success" style="background-color: #9e6ab8;" onclick="print();"> พิมพ์หน้านี้</button>
                            </form>
                    	</div>
                    </div>
                    
                    <div class="row hidden-print">
                        <div class="panel-body">
                            <div class="table-responsive">
                            <?
							if($_POST[date_start]==""){$_POST[date_start]="1950-01-01";}
							if($_POST[date_end]==""){$_POST[date_end]="2050-12-31";}
							
							if($_POST[tre_app]=="ทั้งหมด"){
								$result_dispense_detail=mysql_query("SELECT Tre_ID, Pat_ID, User_ID, Tre_Date, Tre_Symptoms, Tre_Examination, Tre_Diagnosis, Tre_Remedy, Tre_Dispensing, Tre_Appoint, Tre_Status FROM hist_treatment WHERE Tre_Date Between '$_POST[date_start]' AND '$_POST[date_end]' ORDER BY Tre_ID ASC");
							}else{
								$result_dispense_detail=mysql_query("SELECT Tre_ID, Pat_ID, User_ID, Tre_Date, Tre_Symptoms, Tre_Examination, Tre_Diagnosis, Tre_Remedy, Tre_Dispensing, Tre_Appoint, Tre_Status FROM hist_treatment WHERE Tre_Date Between '$_POST[date_start]' AND '$_POST[date_end]' AND Tre_Appoint='$_POST[tre_app]' ORDER BY Tre_ID ASC");
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
                            	<h3>รายงานการรักษา</h3>
                            	<h5>ประเภทใบนัด <? echo $_POST[tre_app]; ?>
                                <?	echo "ระหว่างวันที่ ",date($day1)," ", $thaimonth[date($month1)-1] , " พ.ศ. ",date($year1)+543;	?>
                                <?	echo "ถึงวันที่ ",date($day2)," ", $thaimonth[date($month2)-1] , " พ.ศ. ",date($year2)+543;	?>
                                </h5>
                            </div>
                                <table class="table table-striped table-bordered table-hover" style="border-left:0px;border-right:0px;">
                                    <thead style="border-bottom:1px solid #ddd;">
                                        <tr>
                                            <th class="text-center" width="%" style="border:0px;">ลำดับ</th>
                                            <th class="text-center" width="%" style="border:0px;">หมอ</th>
                                            <th class="text-center" width="%" style="border:0px;">ผู้ป่วย</th>
                                            <th class="text-center" width="%" style="border:0px;">เมื่อวันที่ / เวลา</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                            <?	$i=0;
								while(list($Tre_ID, $Pat_ID, $User_ID, $Tre_Date, $Tre_Symptoms, $Tre_Examination, $Tre_Diagnosis, $Tre_Remedy, $Tre_Dispensing, $Tre_Appoint, $Tre_Status)=mysql_fetch_row($result_dispense_detail)){
									$i++;
									
									$sql_report_user="SELECT User_Name, User_Lastname FROM user WHERE User_ID='$User_ID' ";
									$result_report_user=mysql_query($sql_report_user) or die (mysql_error());
									list($User_Name, $User_Lastname)=mysql_fetch_row($result_report_user);
									
									$sql_report_patient="SELECT Pat_Name, Pat_Lastname FROM patient WHERE Pat_ID='$Pat_ID' ";
									$result_report_patient=mysql_query($sql_report_patient) or die (mysql_error());
									list($Pat_Name, $Pat_Lastname)=mysql_fetch_row($result_report_patient);
									
							?>
                                        <tr class="odd gradeX">
                                            <td class="text-center" style="border:0px;"><? echo $i; ?></td>
                                            <td style="border:0px;"><? echo $User_Name," ",$User_Lastname; ?></td>
                                            <td style="border:0px;"><? echo $Pat_Name," ",$Pat_Lastname; ?></td>
                                            <td class="text-center" style="border:0px;">
                                            <?	
											list($Tre_Date1,$Tre_Date2)=explode(" ","$Tre_Date");
											list($year3,$month3,$day3)=explode("-","$Tre_Date1");	
											for($z=1;$z<10;$z++){
												if($day3 == $z ){$day3=$z;}
											}	
											echo date($day3)," ", $thaimonth1[date($month3)-1] ," ",date($year3)+543;	
											echo " / ",$Tre_Date2;
											?>
                                            </td>
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
							
							if($_POST[tre_app]=="ทั้งหมด"){
								$result_dispense_detail=mysql_query("SELECT Tre_ID, Pat_ID, User_ID, Tre_Date, Tre_Symptoms, Tre_Examination, Tre_Diagnosis, Tre_Remedy, Tre_Dispensing, Tre_Appoint, Tre_Status FROM hist_treatment WHERE Tre_Date Between '$_POST[date_start]' AND '$_POST[date_end]' ORDER BY Tre_ID ASC");
							}else{
								$result_dispense_detail=mysql_query("SELECT Tre_ID, Pat_ID, User_ID, Tre_Date, Tre_Symptoms, Tre_Examination, Tre_Diagnosis, Tre_Remedy, Tre_Dispensing, Tre_Appoint, Tre_Status FROM hist_treatment WHERE Tre_Date Between '$_POST[date_start]' AND '$_POST[date_end]' AND Tre_Appoint='$_POST[tre_app]' ORDER BY Tre_ID ASC");
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
                            	<h3>รายงานการรักษา</h3>
                            	<h5>ประเภทใบนัด <? echo $_POST[tre_app]; ?>
                                <?	echo "ระหว่างวันที่ ",date($day1)," ", $thaimonth[date($month1)-1] , " พ.ศ. ",date($year1)+543;	?>
                                <?	echo "ถึงวันที่ ",date($day2)," ", $thaimonth[date($month2)-1] , " พ.ศ. ",date($year2)+543;	?>
                                </h5>
                            </div>
                                <table class="table table-striped table-bordered table-hover" style="border-left:0px;border-right:0px;">
                                    <thead style="border-bottom:1px solid #ddd;">
                                        <tr>
                                            <th class="text-center" width="%" style="border:0px;">ลำดับ</th>
                                            <th class="text-center" width="%" style="border:0px;">หมอ</th>
                                            <th class="text-center" width="%" style="border:0px;">ผู้ป่วย</th>
                                            <th class="text-center" width="%" style="border:0px;">เมื่อวันที่ / เวลา</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                            <?	$i=0;
								while(list($Tre_ID, $Pat_ID, $User_ID, $Tre_Date, $Tre_Symptoms, $Tre_Examination, $Tre_Diagnosis, $Tre_Remedy, $Tre_Dispensing, $Tre_Appoint, $Tre_Status)=mysql_fetch_row($result_dispense_detail)){
									$i++;
									
									$sql_report_user="SELECT User_Name, User_Lastname FROM user WHERE User_ID='$User_ID' ";
									$result_report_user=mysql_query($sql_report_user) or die (mysql_error());
									list($User_Name, $User_Lastname)=mysql_fetch_row($result_report_user);
									
									$sql_report_patient="SELECT Pat_Name, Pat_Lastname FROM patient WHERE Pat_ID='$Pat_ID' ";
									$result_report_patient=mysql_query($sql_report_patient) or die (mysql_error());
									list($Pat_Name, $Pat_Lastname)=mysql_fetch_row($result_report_patient);
									
							?>
                                        <tr class="odd gradeX">
                                            <td class="text-center" style="border:0px;"><? echo $i; ?></td>
                                            <td style="border:0px;"><? echo $User_Name," ",$User_Lastname; ?></td>
                                            <td style="border:0px;"><? echo $Pat_Name," ",$Pat_Lastname; ?></td>
                                            <td class="text-center" style="border:0px;">
                                            <?	
											list($Tre_Date1,$Tre_Date2)=explode(" ","$Tre_Date");
											list($year3,$month3,$day3)=explode("-","$Tre_Date1");	
											for($z=1;$z<10;$z++){
												if($day3 == $z ){$day3=$z;}
											}	
											echo date($day3)," ", $thaimonth1[date($month3)-1] ," ",date($year3)+543;	
											echo " / ",$Tre_Date2;
											?>
                                            </td>
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