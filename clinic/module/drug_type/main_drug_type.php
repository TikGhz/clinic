            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">ประเภทเวชภัณฑ์
                    </h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
            	<div class="col-lg-12">
                	<!--Function Alert-->
                    <?	echo gatAlert(); ?>
				</div>
                <div class="col-lg-7">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                        	<i class="fa fa-users fa-fw"></i>
                            ข้อมูลประเภทเวชภัณฑ์
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                            <?
								$result_drug=mysql_query("SELECT Drug_Type_ID, Drug_Type_Name FROM drug_type ORDER BY Drug_Type_ID ASC");
							?>
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>รหัสประเภท</th>
                                            <th>ประเภท</th>
                                            <th>ดำเนินการ</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                            <?
								while(list($Drug_Type_ID, $Drug_Type_Name)=mysql_fetch_row($result_drug)){
							?>
                                        <tr class="odd gradeX">
                                            <td class="center"><? echo $Drug_Type_ID; ?></td>
                                            <td><? echo $Drug_Type_Name; ?></td>
                                            <td>
                                            <a href="index_panel.php?module=drug_type&file=main_drug_type&edit_dtid=<? echo $Drug_Type_ID; ?>">
                                            	<button type="button" class="btn btn-success"><i class="fa fa-pencil-square-o fa-fw"></i> แก้ไข</button>
                                            </a>
                                            <a href="index_panel.php?module=drug_type&file=main_drug_type&delete_dtid=<? echo $Drug_Type_ID; ?>">
                                            	<button type="button" class="btn btn-danger"><i class="fa fa-pencil-square-o fa-fw"></i> ลบ</button>
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
                <!-- /.col-lg-6 -->
                <div class="col-lg-5">
                    <?	if($_GET[edit_dtid]!=""){?>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                        	<i class="fa fa-users fa-fw"></i>
                            แก้ไขข้อมูลประเภทเวชภัณฑ์
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                        	<form role="form" method="post" action="index_panel.php?module=drug_type&file=update_drug_type" enctype="multipart/form-data" data-toggle="validator">
                            	<div class="col-lg-8">
                                		<div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-flag"></i></span>
                                            <?	
		$result_edit_drug=mysql_query("SELECT Drug_Type_ID, Drug_Type_Name FROM drug_type WHERE Drug_Type_ID=$_GET[edit_dtid]");
		list($Drug_Type_ID, $Drug_Type_Name)=mysql_fetch_row($result_edit_drug); ?>
        									<input type="hidden" class="form-control" name="d_tid"  value="<? echo $Drug_Type_ID; ?>">
                                            <input type="text" class="form-control" name="d_tname" placeholder="ชื่อประเภทยา" value="<? echo $Drug_Type_Name; ?>"  required>
										</div>
                            	</div>
                            	<div class="col-lg-4">
                                	<button type="submit" class="btn btn-primary"><i class="fa fa-pencil-square-o fa-fw"></i> อัพเดท</button>
                            	</div>
                            </form>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <?	}	?>
                    <!-- /.panel -->
                    
                    <div class="panel panel-default">
                        <div class="panel-heading">
                        	<i class="fa fa-users fa-fw"></i>
                            เพิ่มข้อมูลประเภทเวชภัณฑ์
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                        	<form role="form" method="post" action="index_panel.php?module=drug_type&file=insert_drug_type" enctype="multipart/form-data" data-toggle="validator">
                            	<div class="col-lg-8">
                                		<div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-flag"></i></span>
                                            <input type="text" class="form-control" name="d_name" placeholder="ชื่อประเภทยา" data-minlength="2"  required>
										</div>
                            	</div>
                            	<div class="col-lg-4">
                                	<button type="submit" class="btn btn-primary"><i class="fa fa-pencil-square-o fa-fw"></i> เพิ่มข้อมูล</button>
                            	</div>
                            </form>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
            </div>