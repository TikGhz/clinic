            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">ใบนัด <a href="index_panel.php?module=appoint&file=form_appoint"><button type="button" class="btn btn-primary">เพิ่มใบนัด</button></a></h1>
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
                            ข้อมูลใบนัด
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                            <?
								$result_appoint=mysql_query("SELECT App_ID, User_ID, Pat_ID, App_Detail, App_Time, App_Status, App_Date FROM appointment ORDER BY App_ID ASC");
							?>
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>รหัสนัด</th>
                                            <th>ทันตแพทย์</th>
                                            <th>ผู้ป่วย</th>
                                            <th>รายละเอียด</th>
                                            <th>วันที่/เวลา</th>
                                            <th>สถานะ</th>
                                            <th>ดำเนินการ</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                            <?
								while(list($App_ID, $User_ID1, $Pat_ID1, $App_Detail, $App_Time, $App_Status, $App_Date)=mysql_fetch_row($result_appoint)){
									
								$sql_doctor="SELECT * FROM user WHERE User_ID='$User_ID1' ";
								$result_doctor=mysql_query($sql_doctor) or die (mysql_error());
								list($User_ID, $User_ID_Card, $User_Username, $User_Password, $User_Gender, $User_Title, $User_Name, $User_Lastname, $User_Nickame, $User_Birthday, $User_Religion, $User_Blood, $User_Department, $User_Prof_photo, $User_Address, $User_Tel, $User_Email, $User_Salary, $User_Photo, $User_Type_ID)=mysql_fetch_row($result_doctor);
								
								$sql_pat="SELECT Pat_ID, Pat_ID_Card, Pat_Gender, Pat_Title, Pat_Name, Pat_Lastname, Pat_Birthday, Pat_Religion, Pat_Blood, Pat_Address, Pat_Tel, Pat_Career, Pat_Total_Cost, Pat_Date FROM patient WHERE Pat_ID='$Pat_ID1' ";
								$result_pat=mysql_query($sql_pat);
								list($Pat_ID, $Pat_ID_Card, $Pat_Gender, $Pat_Title, $Pat_Name, $Pat_Lastname, $Pat_Birthday, $Pat_Religion, $Pat_Blood, $Pat_Address, $Pat_Tel, $Pat_Career, $Pat_Total_Cost, $Pat_Date)=mysql_fetch_row($result_pat);
								
							?>
                                        <tr class="odd gradeX">
                                            <td class="center"><? echo $App_ID; ?></td>
                                            <td><? if($User_ID1==$User_ID){ echo $User_Title," ",$User_Name," ",$User_Lastname; } ?></td>
                                            <td><? if($Pat_ID1==$Pat_ID){ echo $Pat_Title," ",$Pat_Name," ",$Pat_Lastname; } ?></td>
                                            <td><? echo $App_Detail ?></td>
                                            <td><? echo $App_Time; ?></td>
                                            <td><? echo $App_Status; ?></td>
                                            <td>
                                            <a href="index_panel.php?module=appoint&file=show_appoint&aid=<? echo $App_ID; ?>">
                                            	<button type="button" class="btn btn-info"><i class="fa fa-pencil-square-o fa-fw"></i> พิมพ์ใบนัด</button>
                                            </a>
                                            <a href="index_panel.php?module=appoint&file=edit_appoint&aid=<? echo $App_ID; ?>">
                                            	<button type="button" class="btn btn-success"><i class="fa fa-pencil-square-o fa-fw"></i> แก้ไข</button>
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