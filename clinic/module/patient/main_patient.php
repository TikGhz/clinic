            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">ผู้ป่วย <a href="index_panel.php?module=patient&file=form_patient"><button type="button" class="btn btn-primary">เพิ่มข้อมูลผู้ป่วย</button></a></h1>
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
                            ข้อมูลผู้ป่วย
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>รหัส</th>
                                            <th>รหัสประจำตัว</th>
                                            <th>ชื่อสกุล</th>
                                            <th>อายุ</th>
                                            <th>กรุ๊ปเลือด</th>
                                            <th>เบอร์มือถือ</th>
                                            <th>ดำเนินการ</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                            <?
								$result_pat=mysql_query("SELECT Pat_ID, Pat_ID_Card, Pat_Gender, Pat_Title, Pat_Name, Pat_Lastname, Pat_Birthday, Pat_Religion, Pat_Blood, Pat_Address, Pat_Tel, Pat_Career, Pat_Total_Cost, Pat_Date FROM patient ORDER BY Pat_ID DESC");
								while(list($Pat_ID, $Pat_ID_Card, $Pat_Gender, $Pat_Title, $Pat_Name, $Pat_Lastname, $Pat_Birthday, $Pat_Religion, $Pat_Blood, $Pat_Address, $Pat_Tel, $Pat_Career, $Pat_Total_Cost, $Pat_Date)=mysql_fetch_row($result_pat)){
							?>
                                        <tr class="odd gradeX">
                                            <td class="center"><? echo $Pat_ID; ?></td>
                                            <td><? echo $Pat_ID_Card; ?></td>
                                            <td><? echo $Pat_Title,"",$Pat_Name," ",$Pat_Lastname; ?></td>
                                            <td><? echo getAge($Pat_Birthday); ?></td>
                                            <td><? echo $Pat_Blood; ?></td>
                                            <td><? echo $Pat_Tel; ?></td>
                                            <td>
                                            <a href="index_panel.php?module=patient&file=show_patient&pid=<? echo $Pat_ID; ?>">
                                            	<button type="button" class="btn btn-info"><i class="fa fa-search-plus fa-fw"></i> เรียกดู</button>
                                            </a>
                                            <a href="index_panel.php?module=patient&file=edit_patient&pid=<? echo $Pat_ID; ?>">
                                            	<button type="button" class="btn btn-success"><i class="fa fa-pencil-square-o fa-fw"></i> แก้ไข</button>
                                            </a>
                                            <a href="index_panel.php?module=patient&file=delete_patient&pid=<? echo $Pat_ID; ?>">
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