            <div class="row">
                <div class="col-lg-12 hidden-print">
                    <h1 class="page-header">รายงานรายจ่าย</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                	<div class="row hidden-print">
                    	<div class="panel-body">
                            <form action="index_panel.php?module=report&file=report_cost" method="post">
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
                                    	<?	if($_POST[a_status]=="ทั้งหมด"){ $sel1="selected";}else{$sel0="";}
												if($_POST[a_status]=="จัดซื้อ"){ $sel1="selected";}else{$sel1="";}
												if($_POST[a_status]=="เงินเดือน"){ $sel2="selected";}else{$sel2="";}
										?>
										<span class="input-group-addon">ประเภท</span>
											<select class="form-control" name="a_status" >
												<option value="ทั้งหมด" <? echo $sel0; ?>>ทั้งหมด</option>
                                                <option value="จัดซื้อ" <? echo $sel1; ?>>จัดซื้อ</option>
												<option value="เงินเดือน" <? echo $sel2; ?>>เงินเดือน</option>
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
							if($_POST[a_status]=="ทั้งหมด"){
								$result_exp=mysql_query("SELECT Exp_ID, User_ID, Exp_Name, Exp_Price, Exp_Type, Exp_Date FROM expenditure WHERE Exp_Date Between '$_POST[date_start]' and '$_POST[date_end]' ORDER BY Exp_ID ASC");
							}else{
								$result_exp=mysql_query("SELECT Exp_ID, User_ID, Exp_Name, Exp_Price, Exp_Type, Exp_Date FROM expenditure WHERE Exp_Date Between '$_POST[date_start]' and '$_POST[date_end]' AND Exp_Type='$_POST[a_status]' ORDER BY Exp_ID ASC");
							}
							list($year1,$month1,$day1)=explode("-","$_POST[date_start]");
							list($year2,$month2,$day2)=explode("-","$_POST[date_end]");
							for($i=1;$i<10;$i++){
								if($day1 == $i ){$day1=$i;}
								if($day2 == $i ){$day2=$i;}
							}
							?>
                            <div class="text-center">
                            	<h3>รายงานรายจ่าย</h3>
                            	<h5>
                                <?	echo "ระหว่างวันที่ ",date($day1)," ", $thaimonth[date($month1)-1] , " พ.ศ. ",date($year1)+543;	?>
                                <?	echo "ถึงวันที่ ",date($day2)," ", $thaimonth[date($month2)-1] , " พ.ศ. ",date($year2)+543;	?>
                                </h5>
                            </div>
                                <table class="table table-striped table-bordered table-hover" style="border-left:0px;border-right:0px;">
                                    <thead style="border-bottom:1px solid #ddd;">
                                        <tr>
                                            <th class="text-center" width="" style="border:0px;">ลำดับ</th>
                                            <th class="text-center" width="" style="border:0px;">เจ้าหน้าที่</th>
                                            <th class="text-center" width="" style="border:0px;">รายละเอียด</th>
                                            <th class="text-center" width="" style="border:0px;">ราคา</th>
                                            <th class="text-center" width="" style="border:0px;">วันที่/เวลา</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                            <?	$i=0;
								while(list($Exp_ID, $User_ID, $Exp_Name, $Exp_Price, $Exp_Type, $Exp_Date)=mysql_fetch_row($result_exp)){
									$i++;
									
									$sql_report_user="SELECT User_Name, User_Lastname FROM user WHERE User_ID='$User_ID' ";
									$result_report_user=mysql_query($sql_report_user) or die (mysql_error());
									list($User_Name, $User_Lastname)=mysql_fetch_row($result_report_user);
									
									/*$sql_report_patient="SELECT Pat_Name, Pat_Lastname FROM patient WHERE Pat_ID='$Pat_ID' ";
									$result_report_patient=mysql_query($sql_report_patient) or die (mysql_error());
									list($Pat_Name, $Pat_Lastname)=mysql_fetch_row($result_report_patient);*/
							?>
                                        <tr class="odd gradeX">
                                            <td class="text-center" style="border:0px;"><? echo $i; ?></td>
                                            <td style="border:0px;"><? echo $User_Name," ",$User_Lastname; ?></td>
                                            <td style="border:0px;"><? echo $Exp_Name ?></td>
                                            <td style="border:0px;"><? echo $Exp_Price; ?></td>
                                            <td style="border:0px;"><? echo $Exp_Date; ?></td>
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
							if($_POST[a_status]=="0"){
								$result_exp=mysql_query("SELECT Reve_ID, User_ID, Pat_ID, Reve_Name, Reve_Price, Reve_Type, Reve_Date FROM revenue WHERE Reve_Date Between '$_POST[date_start]' and '$_POST[date_end]' ORDER BY Reve_ID ASC");
							}else{
								$result_exp=mysql_query("SELECT Reve_ID, User_ID, Pat_ID, Reve_Name, Reve_Price, Reve_Type, Reve_Date FROM revenue WHERE Reve_Date Between '$_POST[date_start]' and '$_POST[date_end]' AND Reve_Type='$_POST[a_status]' ORDER BY Reve_ID ASC");
							}
							list($year1,$month1,$day1)=explode("-","$_POST[date_start]");
							list($year2,$month2,$day2)=explode("-","$_POST[date_end]");
							for($i=1;$i<10;$i++){
								if($day1 == $i ){$day1=$i;}
								if($day2 == $i ){$day2=$i;}
							}
							?>
                            <div class="text-center">
                            	<h3>รายงานรายจ่าย</h3>
                            	<h5>
                                <?	echo "ระหว่างวันที่ ",date($day1)," ", $thaimonth[date($month1)-1] , " พ.ศ. ",date($year1)+543;	?>
                                <?	echo "ถึงวันที่ ",date($day2)," ", $thaimonth[date($month2)-1] , " พ.ศ. ",date($year2)+543;	?>
                                </h5>
                            </div>
                                <table class="table table-striped table-bordered table-hover" style="border-left:0px;border-right:0px;">
                                    <thead style="border-bottom:1px solid #ddd;">
                                        <tr>
                                            <th class="text-center" width="" style="border:0px;">ลำดับ</th>
                                            <th class="text-center" width="" style="border:0px;">เจ้าหน้าที่</th>
                                            <th class="text-center" width="" style="border:0px;">รายละเอียด</th>
                                            <th class="text-center" width="" style="border:0px;">ราคา</th>
                                            <th class="text-center" width="" style="border:0px;">วันที่/เวลา</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                            <?	$i=0;
								while(list($Reve_ID, $User_ID, $Pat_ID, $Reve_Name, $Reve_Price, $Reve_Type, $Reve_Date)=mysql_fetch_row($result_exp)){
									$i++;
									
									$sql_report_user="SELECT User_Name, User_Lastname FROM user WHERE User_ID='$User_ID' ";
									$result_report_user=mysql_query($sql_report_user) or die (mysql_error());
									list($User_Name, $User_Lastname)=mysql_fetch_row($result_report_user);
									
									/*$sql_report_patient="SELECT Pat_Name, Pat_Lastname FROM patient WHERE Pat_ID='$Pat_ID' ";
									$result_report_patient=mysql_query($sql_report_patient) or die (mysql_error());
									list($Pat_Name, $Pat_Lastname)=mysql_fetch_row($result_report_patient);*/
							?>
                                        <tr class="odd gradeX">
                                            <td class="text-center" style="border:0px;"><? echo $i; ?></td>
                                            <td style="border:0px;"><? echo $User_Name," ",$User_Lastname; ?></td>
                                            <td style="border:0px;"><? echo $Reve_Name ?></td>
                                            <td style="border:0px;"><? echo $Reve_Price; ?></td>
                                            <td style="border:0px;"><? echo $Reve_Date; ?></td>
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