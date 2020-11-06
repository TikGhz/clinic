            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">ตารางปฏิบัติงาน 
                    	<a href="index_panel.php?module=work&file=form_work">
                    		<button type="button" class="btn btn-primary">เพิ่มเวลาทำการ</button>
                    	</a>
                        <a href="../table_work.php">
                    		<button type="button" class="btn btn-primary">ดูตารางปฏิบัติงาน</button>
                    	</a>
                    </h1>
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
                            ข้อมูลตารางปฏิบัติงาน
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                            <?
								$result_work=mysql_query("SELECT Work_ID, User_ID, Work_Date, Work_Enter, Work_Out, Work_Color FROM work ORDER BY Work_ID ASC");
							?>
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>รหัส</th>
                                            <th>พนักงาน</th>
                                            <th>วันที่/เวลา</th>
                                            <th>เวลาเข้า</th>
                                            <th>เวลาออก</th>
                                            <th>สถานะสี</th>
                                            <th>ดำเนินการ</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                            <?
								while(list($Work_ID, $User_ID1, $Work_Date, $Work_Enter, $Work_Out, $Work_Color)=mysql_fetch_row($result_work)){
									
								$sql_doctor="SELECT * FROM user WHERE User_ID='$User_ID1' ";
								$result_doctor=mysql_query($sql_doctor) or die (mysql_error());
								list($User_ID, $User_ID_Card, $User_Username, $User_Password, $User_Gender, $User_Title, $User_Name, $User_Lastname, $User_Nickame, $User_Birthday, $User_Religion, $User_Blood, $User_Department, $User_Prof_photo, $User_Address, $User_Tel, $User_Email, $User_Salary, $User_Photo, $User_Type_ID)=mysql_fetch_row($result_doctor);
							?>
                                        <tr class="odd gradeX">
                                            <td class="center"><? echo $Work_ID; ?></td>
                                            <td><? if($User_ID1==$User_ID){ echo $User_Title," ",$User_Name," ",$User_Lastname; } ?></td>
                                            <td><? echo $Work_Date; ?></td>
                                            <td><? echo $Work_Enter ?></td>
                                            <td><? echo $Work_Out; ?></td>
                                            <td><span style="color:<? echo $Work_Color; ?>">ลักษณะสี</span></td>
                                            <td>
                                            <a href="index_panel.php?module=work&file=edit_work&wid=<? echo $Work_ID; ?>">
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