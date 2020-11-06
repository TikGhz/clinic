            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">ใบนัดและจ่ายยา</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                	<!--Function Alert-->
                    <?	echo gatAlert(); unset($_SESSION['allrevenue']); ?>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                        	<i class="fa fa-users fa-fw"></i>
                            ข้อมูลผู้ป่วย
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>ผู้ป่วย</th>
                                            <th>ทันตแพทย์</th>
                                            <th>วันที่ตรวจ</th>
                                            <th>ใบนัด</th>
                                            <th>จ่ายยา</th>
                                            <th>ดำเนินการ</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                            <?
								$result_treatment=mysql_query("SELECT Tre_ID, Pat_ID, User_ID, Tre_Date, Tre_Symptoms, Tre_Examination, Tre_Diagnosis, Tre_Remedy, Tre_Dispensing, Tre_Appoint FROM treatment ORDER BY Tre_ID DESC");
								while(list($Tre_ID, $Pat_ID1, $User_ID1, $Tre_Date, $Tre_Symptoms, $Tre_Examination, $Tre_Diagnosis, $Tre_Remedy, $Tre_Dispensing, $Tre_Appoint)=mysql_fetch_row($result_treatment)){
									
								$result_pat=mysql_query("SELECT Pat_ID, Pat_Title, Pat_Name, Pat_Lastname FROM patient WHERE Pat_ID='$Pat_ID1' ");
								list($Pat_ID, $Pat_Title, $Pat_Name, $Pat_Lastname)=mysql_fetch_row($result_pat);
								
								$result_user=mysql_query("SELECT User_ID, User_Title,	User_Name, User_Lastname FROM user WHERE User_ID='$User_ID1' ");
								list($User_ID, $User_Title, $User_Name, $User_Lastname)=mysql_fetch_row($result_user);
							?>
                                        <tr class="odd gradeX">
                                            <td><? echo $Pat_Title,"",$Pat_Name," ",$Pat_Lastname; ?></td>
                                            <td><? echo $User_Title,"",$User_Name," ",$User_Lastname; ?></td>
                                            <td><? echo $Tre_Date; ?></td>
                                            <td><? echo $Tre_Appoint; ?></td>
                                            <td><? echo $Tre_Dispensing; ?></td>
                                            <td>
                                            <a href="index_panel.php?module=treat&file=treat_dispen&case_id=<? echo $Tre_ID; ?>">
                                            	<button type="button" class="btn btn-info"><i class="fa fa-search-plus fa-fw"></i> ใบนัดและจ่ายยา</button>
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