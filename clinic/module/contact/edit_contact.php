            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">ตั้งค่าการติดต่อ</h1>
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
                            ตั้งค่าการติดต่อ
                        </div>
                        <div class="panel-body">
                            <div class="row">
                            <?
								$sql_contact="SELECT Address, Email, Telephone, Facebook, Google, Twitter, Instagram, Youtube, Map FROM set_contact";
								$result_contact=mysql_query($sql_contact) or die (mysql_error());
								list($Address, $Email, $Telephone, $Facebook, $Google, $Twitter, $Instagram, $Youtube, $Map)=mysql_fetch_row($result_contact);
							?>
                            	<form role="form" method="post" action="index_panel.php?module=contact&file=update_contact" enctype="multipart/form-data" data-toggle="validator">
                                <div class="col-lg-12">
                                	<div class="well">
                                        
                                        <div class="form-group">
                                        <label><i class="fa fa-home"></i> Address :</label>
                                        <input type="text" class="form-control" name="Address" placeholder="Address" value="<? echo $Address; ?>" required>
                                        </div>
                                        
                                        <div class="form-group">
                                        <label><i class="fa fa-home"></i> E-Mail :</label>
                                        <input type="text" class="form-control" name="Email" placeholder="E-Mail" value="<? echo $Email; ?>" required>
                                        </div>
                                        
                                        <div class="form-group">
                                        <label><i class="fa fa-home"></i> Telephone :</label>
                                        <input type="text" class="form-control" name="Telephone" placeholder="Telephone" value="<? echo $Telephone; ?>" required>
                                        </div>
                                        
                                        <div class="form-group">
                                        <label><i class="fa fa-home"></i> Facebook :</label>
                                        <input type="text" class="form-control" name="Facebook" placeholder="Facebook" value="<? echo $Facebook; ?>" required>
                                        </div>
                                        
                                        <div class="form-group">
                                        <label><i class="fa fa-home"></i> Google :</label>
                                        <input type="text" class="form-control" name="Google" placeholder="Google" value="<? echo $Google; ?>" required>
                                        </div>
                                        
                                        <div class="form-group">
                                        <label><i class="fa fa-home"></i> Twitter :</label>
                                        <input type="text" class="form-control" name="Twitter" placeholder="Twitter" value="<? echo $Twitter; ?>" required>
                                        </div>
                                        
                                        <div class="form-group">
                                        <label><i class="fa fa-home"></i> Instagram :</label>
                                        <input type="text" class="form-control" name="Instagram" placeholder="Instagram" value="<? echo $Instagram; ?>" required>
                                        </div>
                                        
                                        <div class="form-group">
                                        <label><i class="fa fa-home"></i> Youtube :</label>
                                        <input type="text" class="form-control" name="Youtube" placeholder="Youtube" value="<? echo $Youtube; ?>" required>
                                        </div>
                                        
                                        <div class="form-group">
                                        <label><i class="fa fa-home"></i> Map :</label>
                                        <textarea class="form-control" rows="4" name="Map" placeholder="Map" required><? echo $Map; ?></textarea>
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