            <?
				$sql_edit_patient="SELECT * FROM patient WHERE Pat_ID='$_GET[pid]' ";
				$result_edit_doctor=mysql_query($sql_edit_patient) or die (mysql_error());
				list($Pat_ID, $Pat_ID_Card, $Pat_Gender, $Pat_Title, $Pat_Name, $Pat_Lastname, $Pat_Birthday, $Pat_Religion, $Pat_Blood, $Pat_Address, $Pat_Tel, $Pat_Career, $Pat_Total_Cost, $Pat_Date)=mysql_fetch_row($result_edit_doctor);
				
				$sql_edit_health="SELECT * FROM patient_health WHERE Pat_ID='$_GET[pid]' ";
				$result_edit_health=mysql_query($sql_edit_health) or die (mysql_error());
				list($Pat_ID, $Pat_Binge, $Pat_Routinely, $Pat_Intolerance, $Pat_Diseases, $Pat_Diseases_ON, $Pat_Symptoms)=mysql_fetch_row($result_edit_health);
			?>
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">ผู้ป่วย</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->

            <div class="row">
                <div class="col-lg-12">
                    <div class="panel">
                            <div class="row">
                                <div class="col-lg-3">
                                	<div style="padding-left: 8px; padding-right: 8px; box-shadow: 0px 0px 5px 0px #CCCCCC; margin-bottom: 16px; padding: 20px;">
                                        <div style="padding-bottom:0px; margin-bottom:20px; font-size:20px;">
                                        	<h4><? echo $Pat_Name," ",$Pat_Lastname; ?></h4>
                                        </div>
                                    	<div class="text-center">
                                        	<img src="image/profile/profile.png" width="200" height="200" class="img-thumbnail">
                                        </div>
                                        
                                        <hr>
                                        <div class="profile-details">
                                            <ul class="fa-ul">
                                                <li><i class="fa-li fa fa-tasks"></i>อาชีพ: <span><? echo $Pat_Career; ?></span></li>
                                                <li><i class="fa-li fa fa-suitcase"></i>โรคประจำตัว: <span><? echo $Pat_Diseases; ?></span></li>
                                                <li><i class="fa-li fa fa-envelope"></i>แพ้ยา: <span><? echo $Pat_Intolerance; ?></span></li>
                                                <li><i class="fa-li fa fa-mobile"></i>มือถือ: <span><? echo $Pat_Tel; ?></span></li>
                                                <li><i class="fa-li fa fa-home"></i>ที่อยู่: <span><? echo $Pat_Address; ?></span></li>
                                            </ul>
										</div>
                                        <hr>
                                        
									</div>
                                </div>
                                <!-- /.col-lg-3 (nested) -->
                				<div class="col-lg-9">
                                			<div class="" style="margin-bottom:20px; font-size:20px;">โปรไฟล์คุณ <strong><? echo $Pat_Name," ",$Pat_Lastname; ?></strong></div>
                                            <!-- Nav tabs -->
                                            <ul class="nav nav-tabs" style="border-bottom: 0px solid #ddd;">
                                                <li class="active">
                                                <a href="#update" data-toggle="tab" style="box-shadow: 0px -2px 5px 0px #CCCCCC; border:0px solid #ccc;">
                                                อัพเดทข้อมูล</a>
                                                </li>
                                            </ul>
                
                                            <!-- Tab panes -->
                                            <div class="tab-content" style="box-shadow: 0px 0px 5px 0px #CCCCCC; border:0px solid #ccc; border-top-color: transparent;">
                                                <div class="tab-pane fade in active" id="update">
                									<div class="panel-body">
                            <div class="row">
							<form role="form" name="pat" method="post" action="index_panel.php?module=patient&file=update_patient" enctype="multipart/form-data" data-toggle="validator">
                                <div class="col-lg-6">
                                	<div class="well">
                                    	<h4>ข้อมูลทั่วไป</h4>
                                    	<div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-flag"></i></span>
                                            <input type="text" class="form-control" name="p_id_card" placeholder="<? echo $Pat_ID_Card;?>" data-aslength="13" value="<? echo $Pat_ID_Card;?>" required>
                                        </div>
                                        
                                        <div class="form-group">
                                        	<? if($Pat_Gender=="ชาย"){ $chk1="checked";}else{$chk1="";} ?>
											<? if($Pat_Gender=="หญิง"){ $chk2="checked";}else{$chk2="";}  ?>
                                            <label>เพศ :</label>
                                            <label class="radio-inline">
                                                <input type="radio" name="p_gender" id="p_gender1" value="ชาย" <? echo $chk1 ?> required>
                                                <i class="fa fa-male"> ชาย</i>
                                            </label>
                                            <label class="radio-inline">
                                                <input type="radio" name="p_gender" id="p_gender2" value="หญิง" <? echo $chk2 ?> required>
                                                <i class="fa fa-female"> หญิง</i>
                                            </label>
                                        </div>
                                        
                                        <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-heart"></i></span>
                                            <input type="text" class="form-control" name="p_title" placeholder="<? echo $Pat_Title;?>" value="<? echo $Pat_Title;?>" required>
                                        </div>
                                        
                                        <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-location-arrow"></i></span>
                                            <input type="text" class="form-control" name="p_name" placeholder="<? echo $Pat_Name;?>" value="<? echo $Pat_Name;?>" required>
                                        </div>
                                        
                                        <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-location-arrow"></i></span>
                                            <input type="text" class="form-control" name="p_lastname" placeholder="<? echo $Pat_Lastname;?>" value="<? echo $Pat_Lastname;?>" required>
                                        </div>
                                        
                                        <div class="form-inline">
                                        	<?	list($pat_year, $pat_month, $pat_day)=explode("-" , $Pat_Birthday);	?>
                                            <div class="form-group">
                                            <label>เกิด :</label>
                                                <select class="form-control" name="p_day" required>
													<option value="">วัน</option>
													<?	for($i=1;$i<=31;$i++){		
															if($pat_day==$i){		?>
																<option value="<? echo $i; ?>" selected><? echo $i; ?></option>
													<?	}else{	?>
																<option value="<? echo $i; ?>"><? echo $i; ?></option>
													<?	}}	?>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <select class="form-control" name="p_month" required>
													<option value="">เดือน</option>
													<?	for($i=1;$i<=12;$i++){		
															if($pat_month==$i){		?>
																<option value="<? echo $i; ?>" selected><? echo $i; ?></option>
													<?	}else{	?>
																<option value="<? echo $i; ?>"><? echo $i; ?></option>
													<?	}}	?>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <select class="form-control" name="p_year" required>
													<option value="">ปี</option>
													<?	for($i=2014;$i>=1950;$i--){	
															if($pat_year==$i){		?>
																<option value="<? echo $i; ?>" selected><? echo $i; ?></option>
													<?	}else{	?>
																<option value="<? echo $i; ?>"><? echo $i; ?></option>
													<?	}}	?>
                                                </select>
                                            </div>
                                        </div>
                                        
										<div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-group"></i></span>
                                            <input type="text" class="form-control" name="p_religion" placeholder="<? echo $Pat_Religion;?>" value="<? echo $Pat_Religion;?>" required>
                                        </div>
                                        
                                        <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-plus"></i></span>
                                            <input type="text" class="form-control" name="p_blood" placeholder="<? echo $Pat_Blood;?>" value="<? echo $Pat_Blood;?>" required>
                                        </div>
                                        
                                        <div class="form-group">
                                        <label><i class="fa fa-home"></i> ที่อยู่ปัจจุบัน :</label>
                                        <textarea class="form-control" rows="3" name="p_address" required><? echo $Pat_Address;?></textarea>
                                        </div>
                                        
                                        <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-mobile"></i></span>
                                            <input type="text" class="form-control" name="p_tel" placeholder="<? echo $Pat_Tel;?>" value="<? echo $Pat_Tel;?>" required>
                                        </div>
                                        
                                        <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-mobile"></i></span>
                                            <input type="text" class="form-control" name="p_career" placeholder="<? echo $Pat_Career;?>" value="<? echo $Pat_Career;?>" required>
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
                                            <input type="text" class="form-control" name="p_binge" placeholder="<? echo $Pat_Binge;?>" value="<? echo $Pat_Binge;?>" required>
                                        </div>
                                        
                                        <label> ยาที่ต้องทานเป็นประจำ:</label>
                                        <div class="form-group input-group">  
                         					<span class="input-group-addon"><i class="fa fa-mobile"></i></span>
                                            <input type="text" class="form-control" name="p_routinely" placeholder="<? echo $Pat_Routinely;?>" value="<? echo $Pat_Routinely;?>" required>
                						</div>
                                        
                                        <label> ประวัติการแพ้ยา:</label>
                						<div class="form-group input-group">
                							<span class="input-group-addon"><i class="fa fa-mobile"></i></span>
                                            <input type="text" class="form-control" name="p_intolerance" placeholder="<? echo $Pat_Intolerance;?>" value="<? echo $Pat_Intolerance;?>" required>
                						</div>
                                       
                						<div class="form-group">
											<? if($Pat_Diseases=="ไม่มี"){ $pchk1="checked";}else{$pchk1="";} ?>
											<? if($Pat_Diseases=="มี"){ $pchk2="checked";}else{$pchk2="";}  ?>
                                            <label>โรคประจำตัว :</label>
                    						<label class="radio-inline">
                                                <input type="radio" name="p_diseases" id="p_diseases1" value="ไม่มี" onclick="onenable()" <? echo $pchk1; ?> required><i>ไม่มี</i>
                      						</label>
                    						<label class="radio-inline">
                                                <input type="radio" name="p_diseases" id="p_diseases2" value="มี" onclick="offenable()" <? echo $pchk2; ?> required><i>มี</i>
                    						</label>
                						</div>
                                        
										<div class="form-group">
                                        	<? if($Pat_Diseases_ON==""){ $chk1="selected";}else{$chk1="";} ?>
                                        	<? if($Pat_Diseases_ON=="โรคความดันโลหิตสูง"){ $chk2="selected";}else{$chk2="";} ?>
											<? if($Pat_Diseases_ON=="โรคหัวใจ"){ $chk3="selected";}else{$chk3="";}  ?>
                                        	<? if($Pat_Diseases_ON=="โรคเบาหวาน"){ $chk4="selected";}else{$chk4="";} ?>
											<? if($Pat_Diseases_ON=="โรคไต"){ $chk5="selected";}else{$chk5="";}  ?>
                                        	<? if($Pat_Diseases_ON=="โรคทาลัสซิเมีย"){ $chk6="selected";}else{$chk6="";} ?>
											<? if($Pat_Diseases_ON=="โรคโลหิตจาง"){ $chk7="selected";}else{$chk7="";}  ?>
                                        	<? if($Pat_Diseases_ON=="โรคตับ"){ $chk8="selected";}else{$chk8="";} ?>
											<? if($Pat_Diseases_ON=="โรคอื่นๆ"){ $chk9="selected";}else{$chk9="";}  ?>
											<label for="select">ท่านมีประวัติโรคประจำตัวใดต่อไปนี้ :</label>
                              				<select name="p_diseases_on" id="mySel2">
                                            	<option value="" <? echo $chk1; ?>>เลือกโรคประจำตัว</option>
                                				<option value="โรคความดันโลหิตสูง" <? echo $chk2; ?>>โรคความดันโลหิตสูง</option>
												<option value="โรคหัวใจ" <? echo $chk3; ?>>โรคหัวใจ</option>
                                				<option value="โรคเบาหวาน" <? echo $chk4; ?>>โรคเบาหวาน</option>
                                				<option value="โรคไต" <? echo $chk5; ?>>โรคไต</option>
                                				<option value="โรคทาลัสซิเมีย" <? echo $chk6; ?>>โรคทาลัสซิเมีย</option>
                                				<option value="โรคโลหิตจาง" <? echo $chk7; ?>>โรคโลหิตจาง</option>
                                				<option value="โรคตับ" <? echo $chk8; ?>>โรคตับ</option>
                                				<option value="โรคอื่นๆ" <? echo $chk9; ?>>โรคอื่นๆ</option>
                              				</select>
            							</div>

            							<div class="form-group">
                                        	<label> อาการเบื้องต้น :</label>
                                        	<textarea class="form-control" rows="3" name="p_symptoms" id="symptoms" placeholder="<? echo $Pat_Symptoms;?>" value="<? echo $Pat_Symptoms;?>"></textarea>
                                        </div>
                                        
                                        <div class="form-group">
                                        	<input type="hidden" name="pid" value="<? echo $_GET[pid]; ?>">
                                            <button type="submit" class="btn btn-primary">อัพเดท</button>
                                            <button type="reset" class="btn btn-danger">ยกเลิก</button>
                                        </div>
                                        
									</div>
                                </div>
                                
							</form>
                            </div>
                            <!-- /.row (nested) -->
                        							</div>
                                                    <!-- /.panel-body (nested) -->
                                                </div>
                                            </div>
                                </div>
                                <!-- /.col-lg-9 (nested) -->
                            </div>
                            <!-- /.row (nested) -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row (nested) -->