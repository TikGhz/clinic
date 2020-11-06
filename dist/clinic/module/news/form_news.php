            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">ข่าวประกาศ</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                	<!--Function Alert-->
                    <?	echo gatAlert(); ?>
                    
                    <div class="panel panel-default panel-info">
                        <div class="panel-heading">
                        	<i class="fa fa-users fa-fw"></i>
                            เพิ่มข้อมูลข่าวประกาศ
                        </div>
                        <div class="panel-body">
                            <div class="row">
                            
                            	<form role="form" method="post" action="index_panel.php?module=news&file=insert_news" enctype="multipart/form-data" data-toggle="validator">
                                <div class="col-lg-8">
                                	<div class="well">
                                        
                                        <div class="form-group">
                                        <label><i class="fa fa-home"></i> หัวข้อ :</label>
                                        <input type="text" class="form-control" name="n_title" placeholder="หัวข้อข่าว" required>
                                        </div>
                                        
                                        <div class="form-group">
                                        <label><i class="fa fa-home"></i> รายละเอียดของข่าว :</label>
                                        <textarea class="form-control" rows="4" name="n_detail" placeholder="รายละเอียดของข่าว" required></textarea>
                                        </div>
                                        
									</div>
                                </div>
                                <!-- /.col-lg-6 (nested) -->
                                
                                <div class="col-lg-4">
                                	<div class="well">
                                        
                                        <div class="fileinput fileinput-new" data-provides="fileinput">
                                            <div class="fileinput-new thumbnail" style="width: 50%; height: 50%;">
                                                <img src="image/profile.png" alt="" data-src="image/news.png" class="img-thumbnail">
                                            </div>
                                            <div class="fileinput-preview fileinput-exists thumbnail col-lg-12" style="max-width: 100%; max-height: 400px;"></div>
                                            <div>
                                                <span class="btn btn-default btn-file"><span class="fileinput-new">เลือกรูปข่าว</span>
                                                <span class="fileinput-exists">เปลี่ยน</span><input type="file" name="n_image"></span>
                                                <a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">ลบออก</a>
                                            </div>
                                        </div>
                                        
                                        <div class="form-group">
                                        	<input type="hidden" name="u_type_id" value="3">
                                            <button type="submit" class="btn btn-primary">เพิ่มข่าว</button>
                                            <button type="reset" class="btn btn-danger">ยกเลิก</button>
                                        </div>


									</div>
                                </div>
                                <!-- /.col-lg-6 (nested) -->
                                
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