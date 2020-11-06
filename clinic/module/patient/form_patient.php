            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">ผู้ป่วย</h1>
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
                            เพิ่มข้อมูลผู้ป่วย
                        </div>
                        <div class="panel-body">
                            <div class="row">
                            
                            	<form role="form" name="pat" method="post" action="index_panel.php?module=patient&file=insert_patient" enctype="multipart/form-data" data-toggle="validator">
                                <div class="col-lg-6">
                                	<div class="well">
                                    	<h4>ข้อมูลทั่วไป</h4>
                                    	<div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-flag"></i></span>
                                            <input type="text" class="form-control" name="p_id_card" placeholder="รหัสบัตรประชาชน 13 หลัก" data-aslength="13"  required>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label>เพศ :</label>
                                            <label class="radio-inline">
                                                <input type="radio" name="p_gender" id="p_gender1" value="ชาย" required><i class="fa fa-male"> ชาย</i>
                                            </label>
                                            <label class="radio-inline">
                                                <input type="radio" name="p_gender" id="p_gender2" value="หญิง" required><i class="fa fa-female"> หญิง</i>
                                            </label>
                                        </div>
                                        
                                        <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-heart"></i></span>
                                            <input type="text" class="form-control" name="p_title" placeholder="คำนำหน้าชื่อ เช่น นาย นางสาว นาง หรืออื่น ๆ" required>
                                        </div>
                                        
                                        <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-location-arrow"></i></span>
                                            <input type="text" class="form-control" name="p_name" placeholder="ชื่อจริง" required>
                                        </div>
                                        
                                        <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-location-arrow"></i></span>
                                            <input type="text" class="form-control" name="p_lastname" placeholder="นามสกุล" required>
                                        </div>
                                        
                                        <div class="form-inline">
                                            <div class="form-group">
                                            <label>เกิดเมื่อ :</label>
                                                <select class="form-control" name="p_day" required>
													<option value="">วัน</option>
													<?	for($i=1;$i<=31;$i++){		?>
													<option value="<? echo $i; ?>"><? echo $i; ?></option>
													<?	}	?>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <select class="form-control" name="p_month" required>
													<option value="">เดือน</option>
													<?	for($i=1;$i<=12;$i++){		?>
													<option value="<? echo $i; ?>"><? echo $i; ?></option>
													<?	}	?>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <select class="form-control" name="p_year" required>
													<option value="">ปี</option>
													<?	for($i=2014;$i>=1950;$i--){	?>
													<option value="<? echo $i; ?>"><? echo $i; ?></option>
													<?	}	?>
                                                </select>
                                            </div>
                                        </div>
                                        
										<div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-group"></i></span>
                                            <input type="text" class="form-control" name="p_religion" placeholder="ศาสนา" required>
                                        </div>
                                        
                                        <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-plus"></i></span>
                                            <input type="text" class="form-control" name="p_blood" placeholder="กรุ๊ปเลือด : เอ บี โอ เอบี" required>
                                        </div>
                                        
                                        <div class="form-group">
                                        <label><i class="fa fa-home"></i> ที่อยู่ปัจจุบัน :</label>
                                        <textarea class="form-control" rows="3" name="p_address" required></textarea>
                                        </div>
                                        
                                        <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-mobile"></i></span>
                                            <input type="text" class="form-control" name="p_tel" placeholder="เบอร์มือถือ" required>
                                        </div>
                                        
                                        <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-mobile"></i></span>
                                            <input type="text" class="form-control" name="p_career" placeholder="อาชีพ" required>
                                        </div>
                                        
									</div>
                                </div>
                                <!-- /.col-lg-6 (nested) -->
                                <div class="col-lg-6">
                                	<div class="well">
                                   	  
                                        <h4>ด้านสุขภาพ</h4>
                                        
                                        <label> การดื่มสุรา:</label>
                                        <div class="form-group input-group">  
                         					<span class="input-group-addon"><i class="fa fa-mobile"></i></span>
                                            <input type="text" class="form-control" name="p_binge" placeholder="กรุณากรอกข้อมูล" required>
                                        </div>
                                        
                                        <label> ยาที่ต้องทานเป็นประจำ:</label>
                                        <div class="form-group input-group">  
                         					<span class="input-group-addon"><i class="fa fa-mobile"></i></span>
                                            <input type="text" class="form-control" name="p_routinely" placeholder="กรุณากรอกอย่างละเอียด" required>
                						</div>
                                        
                                        <label> ประวัติการแพ้ยา:</label>
                						<div class="form-group input-group">
                							<span class="input-group-addon"><i class="fa fa-mobile"></i></span>
                                            <input type="text" class="form-control" name="p_intolerance" placeholder="กรุณากรอกอย่างละเอียด" required>
                						</div>
                                       
                                       <div class="form-group">
                                            <label>โรคประจำตัว :</label>
                    						<label class="radio-inline">
                                                <input type="radio" name="p_diseases" id="p_diseases1" value="ไม่มี" onclick="onenable()" required><i>ไม่มี</i>
                      						</label>
                    						<label class="radio-inline">
                                                <input type="radio" name="p_diseases" id="p_diseases2" value="มี" onclick="offenable()" required><i>มี</i>
                    						</label>
                						</div>
                                        
										<div class="form-group">
											<label for="select">ท่านมีประวัติโรคประจำตัวใดต่อไปนี้ :</label>
                              				<select name="p_diseases_on" id="mySel2" required>
                                            	<option value="เลือกโรคประจำตัว">เลือกโรคประจำตัว</option>
                                				<option value="โรคความดันโลหิตสูง">โรคความดันโลหิตสูง</option>
												<option value="โรคหัวใจ">โรคหัวใจ</option>
                                				<option value="โรคเบาหวาน">โรคเบาหวาน</option>
                                				<option value="โรคไต">โรคไต</option>
                                				<option value="โรคทาลัสซิเมีย">โรคทาลัสซิเมีย</option>
                                				<option value="โรคโลหิตจาง">โรคโลหิตจาง</option>
                                				<option value="โรคตับ">โรคตับ</option>
                                				<option value="โรคอื่นๆ">โรคอื่นๆ</option>
                              				</select>
            							</div>

										
            							<div class="form-group">
                                        	<label> อาการเบื้องต้น :</label>
                                        	<textarea class="form-control" rows="3" name="p_symptoms" id="symptoms" required></textarea>
                                        </div>
                                        
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary">เพิ่มผู้ป่วย</button>
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