            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">ตั้งค่าระบบ</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-8">
                	<!--Function Alert-->
                    <?	echo gatAlert(); ?>
                    
                    <div class="panel panel-default panel-info">
                        <div class="panel-heading">
                        	<i class="fa fa-users fa-fw"></i>
                            ตั้งค่าระบบ
                        </div>
                        <div class="panel-body">
                            <div class="row">
                            <?
								$sql_setting="SELECT set_logo, set_title, set_description, set_keyword, set_footer, set_vat FROM setting";
								$result_setting=mysql_query($sql_setting) or die (mysql_error());
								list($set_logo,$set_title,$set_description,$set_keyword,$set_footer,$set_vat)=mysql_fetch_row($result_setting);
							?>
                            	<form role="form" method="post" action="index_panel.php?module=setting&file=update_setting" enctype="multipart/form-data" data-toggle="validator">
                                <div class="col-lg-12">
                                	<div class="well">
                                        
                                        <div class="form-group">
                                        <label><i class="fa fa-home"></i> โลโก้ :</label>
                                        <input type="text" class="form-control" name="logo" placeholder="โลโก้" value="<? echo $set_logo; ?>" required>
                                        </div>
                                        
                                        <div class="form-group">
                                        <label><i class="fa fa-home"></i> ชื่อหัวเว็บ :</label>
                                        <input type="text" class="form-control" name="title" placeholder="ชื่อหัวเว็บ" value="<? echo $set_title; ?>" required>
                                        </div>
                                        
                                        <div class="form-group">
                                        <label><i class="fa fa-home"></i> รายละเอียดเว็บ :</label>
                                        <input type="text" class="form-control" name="detail" placeholder="รายละเอียดเว็บ" value="<? echo $set_description; ?>" required>
                                        </div>
                                        
                                        <div class="form-group">
                                        <label><i class="fa fa-home"></i> คำค้นหาใน Google :</label>
                                        <input type="text" class="form-control" name="keyword" placeholder="คำค้นหาใน Google" value="<? echo $set_keyword; ?>" required>
                                        </div>
                                        
                                        <div class="form-group">
                                        <label><i class="fa fa-home"></i> ผู้จัดทำ :</label>
                                        <input type="text" class="form-control" name="footers" placeholder="ผู้จัดทำ" value="<? echo $set_footer; ?>" required>
                                        </div>
                                        
                                        <div class="form-group">
                                        <label><i class="fa fa-home"></i> ภาษีในระบบ :</label>
                                        <input type="text" class="form-control" name="vatsys" placeholder="ภาษีในระบบ" value="<? echo $set_vat; ?>" required>
                                        </div>
                                        
										<div class="form-group">
                                        	<input type="hidden" name="nid" value="<? echo $_GET[nid]?>">
                                            <button type="submit" class="btn btn-primary">อัพเดทระบบ</button>
                                            <button type="reset" class="btn btn-danger">ยกเลิก</button>
                                        </div>

									</div>
                                </div>
                                </form>
                                
                                <!-- /.col-lg-6 (nested) -->
                            </div>
                            <!-- /.row (nested) -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>

                <!-- /.col-lg-12 -->
            </div>