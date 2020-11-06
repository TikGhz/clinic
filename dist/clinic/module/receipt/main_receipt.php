            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">พิมพ์ใบเสร็จ</h1>
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
                            ข้อมูลเสร็จ
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                            <?
								$result_hd=mysql_query("SELECT Hist_ID, User_ID, Pat_ID, Hist_Total FROM hist_dispense");
							?>
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>รหัส</th>
                                            <th>ทันตแพทย์</th>
                                            <th>ผู้ป่วย</th>
                                            <th>ราคารวม</th>
                                            <th>ดำเนินการ</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                            <?
								while(list($Hist_ID, $User_ID, $Pat_ID, $Hist_Total)=mysql_fetch_row($result_hd)){ 
									$sql_report_user="SELECT User_Name, User_Lastname FROM user WHERE User_ID='$User_ID' ";
									$result_report_user=mysql_query($sql_report_user) or die (mysql_error());
									list($User_Name, $User_Lastname)=mysql_fetch_row($result_report_user);
									
									$sql_report_patient="SELECT Pat_Title, Pat_Name, Pat_Lastname FROM patient WHERE Pat_ID='$Pat_ID' ";
									$result_report_patient=mysql_query($sql_report_patient) or die (mysql_error());
									list($Pat_Title, $Pat_Name, $Pat_Lastname)=mysql_fetch_row($result_report_patient);
							?>
                                        <tr class="odd gradeX">
                                            <td class="center"><? echo $Hist_ID; ?></td>
                                            <td><? echo $User_Title,"",$User_Name," ",$User_Lastname; ?></td>
                                            <td><? echo $User_Title,"",$Pat_Name," ",$Pat_Lastname; ?></td>
                                            <td><? echo $Hist_Total; ?></td>
                                            <td>
                                            <a href="index_panel.php?module=receipt&file=show_receipt&hid=<? echo $Hist_ID; ?>">
                                            	<button type="button" class="btn btn-info"><i class="fa fa-search-plus fa-fw"></i> พิมพ์ใบเสร็จ</button>
                                            </a>
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
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>