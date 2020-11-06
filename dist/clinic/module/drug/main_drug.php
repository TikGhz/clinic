            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">คลังเวชภัณฑ์ <a href="index_panel.php?module=drug&file=form_drug"><button type="button" class="btn btn-primary">เพิ่มข้อมูลเวชภัณฑ์</button></a></h1>
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
                            ข้อมูลเวชภัณฑ์
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                            <?
								$result_drug=mysql_query("SELECT Drug_ID, Drug_Name, Drug_Detail, Drug_Type_ID, Drug_Unit, Drug_Cost_Price, Drug_Price, Pur_ID, User_ID, Drug_Date FROM drug ORDER BY Drug_ID ASC");
							?>
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th class="text-center">รหัส</th>
                                            <th class="text-center">ชื่อผลิตภัณฑ์</th>
                                            <th class="text-center">ราคาต้นทุน</th>
                                            <th class="text-center">ราคาขาย</th>
                                            <th class="text-center">ประเภท</th>
                                            <th class="text-center">จำนวน</th>
                                            <th class="text-center">ดำเนินการ</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                            <?
								while(list($Drug_ID, $Drug_Name, $Drug_Detail, $Drug_Type_ID, $Drug_Unit, $Drug_Cost_Price, $Drug_Price, $Pur_ID, $User_ID, $Drug_Date)=mysql_fetch_row($result_drug)){
								
								$sql_drug_type="SELECT Drug_Type_ID, Drug_Type_Name FROM drug_type WHERE Drug_Type_ID='$Drug_Type_ID' ";
								$result_drug_type=mysql_query($sql_drug_type)or die (mysql_error());
								list($Drug_Type_ID1, $Drug_Type_Name1)=mysql_fetch_row($result_drug_type);
							?>
                                        <tr class="odd gradeX">
                                            <td class="text-center"><? echo $Drug_ID; ?></td>
                                            <td><? echo $Drug_Name; ?></td>
                                            <td class="text-right"><? echo $Drug_Cost_Price; ?></td>
                                            <td class="text-right"><? echo $Drug_Price ?></td>
                                            <td class="text-center"><? if($Drug_Type_ID==$Drug_Type_ID1){ echo $Drug_Type_Name1; }?></td>
                                            <td class="text-center"><? echo $Drug_Unit; ?></td>
                                            <td class="text-center">
                                            <!--<a href="index_panel.php?module=drug&file=show_drug&did=<? echo $Drug_ID; ?>">
                                            	<button type="button" class="btn btn-info"><i class="fa fa-search-plus fa-fw"></i> เรียกดู</button>
                                            </a>-->
                                            <a href="index_panel.php?module=drug&file=edit_drug&did=<? echo $Drug_ID; ?>">
                                            	<button type="button" class="btn btn-success"><i class="fa fa-pencil-square-o fa-fw"></i> แก้ไข</button>
                                            </a>
                                            <a href="index_panel.php?module=drug&file=delete_drug&did=<? echo $Drug_ID; ?>" onclick="return confirm('ยืนยันการลบข้อมูลเวชภัณฑ์ (<? echo $Drug_Name; ?>) ทั้งหมดหรือไม่ ?')">
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