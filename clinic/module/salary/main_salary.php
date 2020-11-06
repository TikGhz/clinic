            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">เงินเดือน <a href="index_panel.php?module=salary&file=form_salary"><button type="button" class="btn btn-primary">เพิ่มข้อมูลเงินเดือน</button></a></h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                	<!--Function Alert-->
                    <?	echo gatAlert(); ?>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                        	<i class="fa fa-users fa-fw"></i>
                            ข้อมูรายได้
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                            <?
									$result_salary=mysql_query("SELECT Sal_ID, User_ID, Sal_Salary, Sal_OT_Hour, Sal_OT_Price, Sal_Decreas, Sal_Status, Sal_Date FROM salary");
							?>
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th >ลำดับ</th>
                                            <th >ลูกจ้าง</th>
                                            <th >เงินเดือน</th>
                                            <th >โอที(ชั่วโมง)</th>
                                            <th >โอที(บาท)</th>
                                            <th >หักเงิน</th>
                                            <th >สถานะ</th>
                                            <th >รวม</th>
                                            <th >วัน/เวลา</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                            <?	$n=0;
								while(list($Sal_ID, $User_ID, $Sal_Salary, $Sal_OT_Hour, $Sal_OT_Price, $Sal_Decreas, $Sal_Status, $Sal_Date)=mysql_fetch_row($result_salary)){ 
									$sql_doctor="SELECT User_ID, User_Title, User_Name, User_Lastname FROM user WHERE User_ID='$User_ID' ";
									$result_doctor=mysql_query($sql_doctor) or die (mysql_error());
									list($User_ID, $User_Title, $User_Name, $User_Lastname)=mysql_fetch_row($result_doctor);
									$n++;
							?>
                                        <tr class="odd gradeX">
                                            <td class="center"><? echo $n; ?></td>
                                            <td><? echo $User_Title,"",$User_Name," ",$User_Lastname; ?></td>
                                            <td><? echo $Sal_Salary; ?></td>
                                            <td><? echo $Sal_OT_Hour; ?></td>
                                            <td><? echo $Sal_OT_Price; ?></td>
                                            <td><? echo $Sal_Decreas; ?></td>
                                            <td><? echo $Sal_Status; ?></td>
                                            <td><? echo ($Sal_Salary+($Sal_OT_Hour*$Sal_OT_Price))-$Sal_Decreas; ?></td>
                                            <td><? echo $Sal_Date; ?></td>
<!--                                            <td>
                                            <a href="index_panel.php?module=salary&file=main_salary&rid=<? /*echo $Sal_ID;*/ ?>">
                                            	<button type="button" class="btn btn-info"><i class="fa fa-search-plus fa-fw"></i> ใบเสร็จ</button>
                                            </a>
                                            </td>
-->                                        </tr>
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
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>