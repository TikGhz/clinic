            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">ทันตแพทย์</h1>
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
                            เพิ่มข้อมูลทันตแพทย์
                        </div>
                        <div class="panel-body">
                            <div class="row">
                            
                            	<form role="form" method="post" action="index_panel.php?module=doctor&file=insert_doctor" enctype="multipart/form-data" data-toggle="validator">
                                <div class="col-lg-6">
                                	<div class="well">
                                    	<div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-flag"></i></span>
                                            <input type="text" class="form-control" name="u_idcard" placeholder="รหัสบัตรประชาชน 13 หลัก" data-aslength="13"  required>
                                        </div>
                                        
                                    	<div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                            <input type="text" class="form-control" name="u_username" placeholder="ชื่อผู้ใช้ มากกว่า 5 ตัวอักษร" data-minlength="5"required>
                                        </div>
                                        
                                        <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                            <input type="text" class="form-control" name="u_password" placeholder="รหัสผ่าน มากกว่า 5 ตัวอักษร" data-minlength="5" required>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label>เพศ :</label>
                                            <label class="radio-inline">
                                                <input type="radio" name="u_gender" id="u_gender1" value="ชาย" required><i class="fa fa-male"> ชาย</i>
                                            </label>
                                            <label class="radio-inline">
                                                <input type="radio" name="u_gender" id="u_gender2" value="หญิง" required><i class="fa fa-female"> หญิง</i>
                                            </label>
                                        </div>
                                        
                                        <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-heart"></i></span>
                                            <input type="text" class="form-control" name="u_title" placeholder="คำนำหน้าชื่อ เช่น นาย นางสาว นาง หรืออื่น ๆ" required>
                                        </div>
                                        
                                        <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-location-arrow"></i></span>
                                            <input type="text" class="form-control" name="u_name" placeholder="ชื่อจริง" required>
                                        </div>
                                        
                                        <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-location-arrow"></i></span>
                                            <input type="text" class="form-control" name="u_lastname" placeholder="นามสกุล" required>
                                        </div>
                                        
                                        <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-location-arrow"></i></span>
                                            <input type="text" class="form-control" name="u_nickname" placeholder="ชื่อเล่น">
                                        </div>
                                        
                                        <div class="form-inline">
											<div class="form-group">
                                            	<label>เกิดเมื่อ :</label>
												<select class="form-control" name="u_day" required>
													<option value="">วัน</option>
													<?	for($i=1;$i<=31;$i++){		?>
													<option value="<? echo $i; ?>"><? echo $i; ?></option>
													<?	}	?>
												</select>
											</div>
											<div class="form-group">
												<select class="form-control" name="u_month" required>
													<option value="">เดือน</option>
													<?	for($i=1;$i<=12;$i++){		?>
													<option value="<? echo $i; ?>"><? echo $i; ?></option>
													<?	}	?>
												</select>
											</div>
											<div class="form-group">
												<select class="form-control" name="u_year" required>
													<option value="">ปี</option>
													<?	for($i=2014;$i>=1950;$i--){	?>
													<option value="<? echo $i; ?>"><? echo $i; ?></option>
													<?	}	?>
												</select>
											</div>
                                        </div>
                                        
                                        <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-group"></i></span>
                                            <input type="text" class="form-control" name="u_religion" placeholder="ศาสนา" required>
                                        </div>
                                        
                                        <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-plus"></i></span>
                                            <input type="text" class="form-control" name="u_blood" placeholder="กรุ๊ปเลือด : เอ บี โอ เอบี" required>
                                        </div>

                                        <div class="form-group">
                                            <label><i class="fa fa-suitcase"></i> แผนก :</label>
                                            <select multiple class="form-control" name="u_department" required>
                                                <option value="อุดฟัน">อุดฟัน</option>
                                                <option value="ศัยกรรม">ศัยกรรม</option>
                                                <option value="ผ่าตัด">ผ่าตัด</option>
                                            </select>
                                        </div>
                                        
                                        <div class="form-group">
                                        <label><i class="fa fa-home"></i> ที่อยู่ปัจจุบัน :</label>
                                        <textarea class="form-control" rows="3" name="u_address" required></textarea>
                                        </div>
                                        
                                        <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-mobile"></i></span>
                                            <input type="text" class="form-control" name="u_tel" placeholder="เบอร์มือถือ" required>
                                        </div>
                                        
                                        <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                                            <input type="email" class="form-control" name="u_email" placeholder="อีเมล์" required>
                                        </div>
                                        
                                        <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-btc"></i></span>
                                            <input type="text" class="form-control" name="u_salary" placeholder="เงินเดือน" required>
                                        </div>
									</div>
                                </div>
                                <!-- /.col-lg-6 (nested) -->
                                <div class="col-lg-6">
                                	<div class="well">
										
                                        <div class="fileinput fileinput-new" data-provides="fileinput">
                                            <div class="fileinput-new thumbnail" style="width: 50%; height: 50%;">
                                                <img src="image/profile.png" alt="" data-src="image/profile.png" class="img-thumbnail">
                                            </div>
                                            <div class="fileinput-preview fileinput-exists thumbnail col-lg-12" style="max-width: 100%; max-height: 400px;"></div>
                                            <div>
                                                <span class="btn btn-default btn-file"><span class="fileinput-new">เลือกรูปประจำตัว (ถ้ามี)</span>
                                                <span class="fileinput-exists">เปลี่ยน</span><input type="file" name="u_photo"></span>
                                                <a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">ลบออก</a>
                                            </div>
                                        </div>

                                        <div class="fileinput fileinput-new" data-provides="fileinput">
                                            <div class="fileinput-new thumbnail" style="width: 50%; height: 50%;">
                                                <img src="image/file.png" alt="" data-src="image/file.png" class="img-thumbnail">
                                            </div>
                                            <div class="fileinput-preview fileinput-exists thumbnail col-lg-12" style="max-width: 100%; max-height: 400px;"></div>
                                            <div>
                                                <span class="btn btn-default btn-file"><span class="fileinput-new">ใบประกอบวิชาชีพ (ถ้ามี)</span>
                                                <span class="fileinput-exists">เปลี่ยน</span><input type="file" name="u_prof_photo"></span>
                                                <a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">ลบออก</a>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                        	<input type="hidden" name="u_type_id" value="3">
                                            <button type="submit" class="btn btn-primary">เพิ่มทันตแพทย์</button>
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