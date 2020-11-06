            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">ทันตแพทย์ <a href="index_panel.php?module=doctor&file=form_doctor"><button type="button" class="btn btn-primary">เพิ่มข้อมูลทันตแพทย์</button></a></h1>
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
                            ข้อมูลทันตแพทย์
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                            <?
								$result_user=mysql_query("SELECT User_ID, User_Username, User_Title, User_Name, User_Lastname, User_Nickame, User_Birthday, User_Department, User_Tel FROM user WHERE User_Type_ID='3' ");
							?>
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>รหัส</th>
                                            <th>ชื่อผู้ใช้</th>
                                            <th width="15%">ชื่อสกุล</th>
                                            <th>ชื่อเล่น</th>
                                            <th>แผนก</th>
                                            <th>เบอร์มือถือ</th>
                                            <th>ดำเนินการ</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                            <?
								while(list($User_ID, $User_Username, $User_Title, $User_Name, $User_Lastname, $User_Nickame, $User_Birthday, $User_Department, $User_Tel)=mysql_fetch_row($result_user)){ 
							?>
                                        <tr class="odd gradeX">
                                            <td class="center"><? echo $User_ID; ?></td>
                                            <td><? echo $User_Username; ?></td>
                                            <td><? echo $User_Title,"",$User_Name," ",$User_Lastname; ?></td>
                                            <td><? echo $User_Nickame; ?></td>
                                            <td><? echo $User_Department; ?></td>
                                            <td><? echo $User_Tel; ?></td>
                                            <td>
                                            <a href="index_panel.php?module=doctor&file=show_doctor&uid=<? echo $User_ID; ?>">
                                            	<button type="button" class="btn btn-info"><i class="fa fa-search-plus fa-fw"></i> เรียกดู</button>
                                            </a>
                                            <a href="index_panel.php?module=doctor&file=edit_doctor&uid=<? echo $User_ID; ?>">
                                            	<button type="button" class="btn btn-success"><i class="fa fa-pencil-square-o fa-fw"></i> แก้ไข</button>
                                            </a>
                                            <a href="index_panel.php?module=doctor&file=delete_doctor&uid=<? echo $User_ID; ?>">
                                				<button type="button" class="btn btn-danger"><i class="fa fa-trash-o fa-fw"></i> ลบ</button>
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