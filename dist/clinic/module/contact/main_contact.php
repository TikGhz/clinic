            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">ติดต่อเรา <a href="index_panel.php?module=contact&file=edit_contact"><button type="button" class="btn btn-primary">ตั้งค่า</button></a></h1>
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
                            ข้อมูลการติดต่อ
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                            <?
								$result_contact=mysql_query("SELECT Con_ID, Con_Name, Con_Tel, Con_Mail, Con_Subject, Con_Message FROM contact");
							?>
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>รหัส</th>
                                            <th>ผู้ติดต่อ</th>
                                            <th>เบอร์มือถือ</th>
                                            <th>อีเมล</th>
                                            <th>หัวข้อ</th>
                                            <th>รายละเอียด</th>
                                            <th>ดำเนินการ</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                            <?
								while(list($Con_ID, $Con_Name, $Con_Tel, $Con_Mail, $Con_Subject, $Con_Message)=mysql_fetch_row($result_contact)){ 
							?>
                                        <tr class="odd gradeX">
                                            <td class="center"><? echo $Con_ID; ?></td>
                                            <td><? echo $Con_Name; ?></td>
                                            <td><? echo $Con_Tel; ?></td>
                                            <td><? echo $Con_Mail; ?></td>
                                            <td><? echo $Con_Subject; ?></td>
                                            <td><? echo $Con_Message; ?></td>
                                            <td>
                                            <a href="index_panel.php?module=contact&file=ans_contact&uid=<? echo $Con_ID; ?>">
                                            	<button type="button" class="btn btn-primary"><i class="fa fa-search-plus fa-fw"></i> ตอบกลับ</button>
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