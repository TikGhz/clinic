            <?
				$sql_show_employee="SELECT * FROM user WHERE User_ID='$_GET[uid]' ";
				$result_show_employee=mysql_query($sql_show_employee) or die (mysql_error());
				list($User_ID, $User_ID_Card, $User_Username, $User_Password, $User_Gender, $User_Title, $User_Name, $User_Lastname, $User_Nickame, $User_Birthday, $User_Religion, $User_Blood, $User_Department, $User_Prof_photo, $User_Address, $User_Tel, $User_Email, $User_Salary, $User_Photo, $User_Type_ID)=mysql_fetch_row($result_show_employee);
			?>
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">พนักงาน</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->

            <div class="row">
                <div class="col-lg-12">
				<?	echo gatAlert(); ?>
                    <div class="panel">
                            <div class="row">
                                <div class="col-lg-3">
                                	<div style="padding-left: 8px; padding-right: 8px; box-shadow: 0px 0px 5px 0px #CCCCCC; margin-bottom: 16px; padding: 20px;">
                                		<h3><? echo $User_Name," ",$User_Lastname; ?></h3>
                                    	<div class="text-center">
                                        	<img src="image/profile/<? echo $User_Photo; ?>" width="200" height="200" class="img-thumbnail">
                                        </div>
                                        
                                        <div class="text-center" style="padding-top: 15px;">
                                            <button class="btn btn-success"><i class="fa fa-flag"></i> Online</button>
                                        </div>
                                        
                                        <hr>
                                        
                                        <div class="profile-details">
                                            <ul class="fa-ul">
                                                <li><i class="fa-li fa fa-tasks"></i>ตำแหน่ง: <span><? echo $User_Type_ID; ?></span></li>
                                                <li><i class="fa-li fa fa-suitcase"></i>แผนก: <span><? echo $User_Department; ?></span></li>
                                                <li><i class="fa-li fa fa-envelope"></i>อีเมล์: <span><? echo $User_Email; ?></span></li>
                                                <li><i class="fa-li fa fa-mobile"></i>มือถือ: <span><? echo $User_Tel; ?></span></li>
                                                <li><i class="fa-li fa fa-home"></i>ที่อยู่: <span><? echo $User_Address; ?></span></li>
                                                
                                            </ul>
										</div>
                                        
                                        <hr>
									</div>
                                </div>
                                <!-- /.col-lg-3 (nested) -->
                				<div class="col-lg-9">
                                			<div class="" style="margin-bottom:20px; font-size:20px;">โปรไฟล์คุณ <strong><? echo $User_Name," ",$User_Lastname; ?></strong></div>
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
                                                    	<form role="form" method="post" action="index_panel.php?module=employee&file=update_employee" enctype="multipart/form-data" data-toggle="validator">
                                                            <div class="col-lg-6">
                                                                <div class="well">
                                                                	<input type="hidden" name="uid" value="<? echo $User_ID; ?>">
                                                                    <div class="form-group input-group">
                                                                        <span class="input-group-addon"><i class="fa fa-flag"></i></span>
                                                                        <input type="text" class="form-control" name="u_idcard" placeholder="<? echo $User_ID_Card; ?>" data-aslength="13" value="<? echo $User_ID_Card; ?>">
                                                                    </div>
                                                                    
                                                                    <div class="form-group input-group">
                                                                        <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                                                        <input type="text" class="form-control" name="u_username" placeholder="<? echo $User_Username; ?>" data-minlength="4" value="<? echo $User_Username; ?>">
                                                                    </div>
                                                                    
                                                                    <div class="form-group input-group">
                                                                        <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                                                        <input type="text" class="form-control" name="u_password" placeholder="<? echo $User_Password; ?>" data-minlength="4" value="<? echo $User_Password; ?>">
                                                                    </div>
                                                                    
                                                                    <div class="form-group">
                                                                    	<? if($User_Gender=="ชาย"){ $chk1="checked";}else{$chk1="";} ?>
                                                                        <? if($User_Gender=="หญิง"){ $chk2="checked";}else{$chk2="";}  ?>
                                                                        <label>เพศ :</label>
                                                                        <label class="radio-inline">
                                                                            <input type="radio" name="u_gender" id="u_gender1" value="ชาย" <? echo $chk1 ?> >
                                                                            <i class="fa fa-male"> ชาย</i>
                                                                        </label>
                                                                        <label class="radio-inline">
                                                                            <input type="radio" name="u_gender" id="u_gender2" value="หญิง" <? echo $chk2 ?> >
                                                                            <i class="fa fa-female"> หญิง</i>
                                                                        </label>
                                                                    </div>
                                                                    
                                                                    <div class="form-group input-group">
                                                                        <span class="input-group-addon"><i class="fa fa-heart"></i></span>
                                                                        <input type="text" class="form-control" name="u_title" placeholder="<? echo $User_Title; ?>" value="<? echo $User_Title; ?>">
                                                                    </div>
                                                                    
                                                                    <div class="form-group input-group">
                                                                        <span class="input-group-addon"><i class="fa fa-location-arrow"></i></span>
                                                                        <input type="text" class="form-control" name="u_name" placeholder="<? echo $User_Name; ?>" value="<? echo $User_Name; ?>">
                                                                    </div>
                                                                    
                                                                    <div class="form-group input-group">
                                                                        <span class="input-group-addon"><i class="fa fa-location-arrow"></i></span>
                                                                        <input type="text" class="form-control" name="u_lastname" placeholder="<? echo $User_Lastname; ?>" value="<? echo $User_Lastname; ?>">
                                                                    </div>
                                                                    
                                                                    <div class="form-group input-group">
                                                                        <span class="input-group-addon"><i class="fa fa-location-arrow"></i></span>
                                                                        <input type="text" class="form-control" name="u_nickname" placeholder="<? echo $User_Nickame; ?>" value="<? echo $User_Nickame; ?>">
                                                                    </div>
                                                                    
                                                                    <div class="form-inline">
                                                                        <label>วันเกิด:</label>
                                                                        <?	list($u_year, $u_month, $u_day)=explode("-" , $User_Birthday);	?>
                                                                        <div class="form-group">
                                                                            <select class="form-control" name="u_day">
                                                                                <option value="">วัน</option>
                                                                                <?	for($i=1;$i<=31;$i++){		
																						if($u_day==$i){		?>
                                                                                			<option value="<? echo $i; ?>" selected><? echo $i; ?></option>
                                                                                <?	}else{	?>
																							<option value="<? echo $i; ?>"><? echo $i; ?></option>
																				<?	}}	?>
                                                                            </select>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <select class="form-control" name="u_month">
                                                                                <option value="">เดือน</option>
                                                                                <?	for($i=1;$i<=12;$i++){		
																						if($u_month==$i){		?>
                                                                                			<option value="<? echo $i; ?>" selected><? echo $i; ?></option>
                                                                                <?	}else{	?>
																							<option value="<? echo $i; ?>"><? echo $i; ?></option>
																				<?	}}	?>
                                                                            </select>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <select class="form-control" name="u_year">
                                                                                <option value="">ปี</option>
                                                                                <?	for($i=2014;$i>=1950;$i--){		
																						if($u_year==$i){		?>
                                                                                			<option value="<? echo $i; ?>" selected><? echo $i; ?></option>
                                                                                <?	}else{	?>
																							<option value="<? echo $i; ?>"><? echo $i; ?></option>
																				<?	}}	?>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    
                                                                    <div class="form-group input-group">
                                                                        <span class="input-group-addon"><i class="fa fa-group"></i></span>
                                                                        <input type="text" class="form-control" name="u_religion" placeholder="<? echo $User_Religion; ?>" value="<? echo $User_Religion; ?>">
                                                                    </div>
                                                                    
                                                                    <div class="form-group input-group">
                                                                        <span class="input-group-addon"><i class="fa fa-plus"></i></span>
                                                                        <input type="text" class="form-control" name="u_blood" placeholder="<? echo $User_Blood; ?>" value="<? echo $User_Blood; ?>">
                                                                    </div>
                            
                                                                    <div class="form-group">
                                                                        <label><i class="fa fa-suitcase"></i> แผนก :</label>
                                                                        <select multiple class="form-control" name="u_department">
                                                                            <option value="1">คลอด</option>
                                                                            <option value="2">อุดฟัน</option>
                                                                            <option value="3">ศัยกรรม</option>
                                                                            <option value="4">ผ่าตัด</option>
                                                                        </select>
                                                                    </div>
                                                                    
                                                                    <div class="form-group">
                                                                    <label><i class="fa fa-home"></i> ที่อยู่ปัจจุบัน :</label>
                                                                    <textarea class="form-control" rows="3" name="u_address"><? echo $User_Address; ?></textarea>
                                                                    </div>
                                                                    
                                                                    <div class="form-group input-group">
                                                                        <span class="input-group-addon"><i class="fa fa-mobile"></i></span>
                                                                        <input type="text" class="form-control" name="u_tel" placeholder="<? echo $User_Tel; ?>" value="<? echo $User_Tel; ?>">
                                                                    </div>
                                                                    
                                                                    <div class="form-group input-group">
                                                                        <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                                                                        <input type="email" class="form-control" name="u_email" placeholder="<? echo $User_Email; ?>" value="<? echo $User_Email; ?>">
                                                                    </div>
                                                                    
                                                                    <div class="form-group input-group">
                                                                        <span class="input-group-addon"><i class="fa fa-btc"></i></span>
                                                                        <input type="text" class="form-control" name="u_salary" placeholder="<? echo $User_Salary; ?>" value="<? echo $User_Salary; ?>">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!-- /.col-lg-6 (nested) -->
                                                            <div class="col-lg-6">
                                                                <div class="well">
                                                                    
                                                                    <div class="fileinput fileinput-new" data-provides="fileinput">
                                                                        <div class="fileinput-new thumbnail" style="width: 100%; height: 50%;">
                                                                            <img src="image/profile/<? echo $User_Photo; ?>" alt="" data-src="image/profile/<? echo $User_Photo; ?>" class="img-thumbnail">
                                                                        </div>
                                                                        <div class="fileinput-preview fileinput-exists thumbnail col-lg-12" style="max-width: 100%; max-height: 400px;"></div>
                                                                        <div>
                                                                            <span class="btn btn-default btn-file"><span class="fileinput-new">เลือกรูปประจำตัว</span>
                                                                            <span class="fileinput-exists">เปลี่ยน</span><input type="file" name="u_photo"></span>
                                                                            <a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">ลบออก</a>
                                                                        </div>
                                                                    </div>
                            
                                                                    <div class="fileinput fileinput-new" data-provides="fileinput">
                                                                        <div class="fileinput-new thumbnail" style="width: 100%; height: 50%;">
                                                                            <img src="image/professional/<? echo $User_Prof_photo; ?>" alt="" data-src="image/professional/<? echo $User_Prof_photo; ?>" class="img-thumbnail">
                                                                        </div>
                                                                        <div class="fileinput-preview fileinput-exists thumbnail col-lg-12" style="max-width: 100%; max-height: 400px;"></div>
                                                                        <div>
                                                                            <span class="btn btn-default btn-file"><span class="fileinput-new">ใบประกอบวิชาชีพ</span>
                                                                            <span class="fileinput-exists">เปลี่ยน</span><input type="file" name="u_prof_photo"></span>
                                                                            <a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">ลบออก</a>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <input type="hidden" name="uid" value="<? echo $User_ID; ?>">
                                                                        <button type="submit" class="btn btn-primary">อัพเดท</button>
                                                                        <button type="reset" class="btn btn-danger">ยกเลิก</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            
                                                            </form>
                                                    	</div>
                                                	</div>
                                                </div>

                                            </div>
                                </div>
                            
                            
                            </div>
                            <!-- /.row (nested) -->

                    </div>
                    <!-- /.panel -->
                </div>
                
                <!-- /.col-lg-12 -->
            </div>
                                    </div>
                                </div>
                                <!-- /.col-lg-6 (nested) -->
                            </div>
                            <!-- /.row (nested) -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>-->
            