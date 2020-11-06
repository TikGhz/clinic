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
                                	<div style="padding-left: 8px; padding-right: 8px; box-shadow: 0px 0px 5px 0px #CCCCCC;  margin-bottom: 16px; padding: 20px;">
                                		<h3><? echo $User_Name," ",$User_Lastname; ?></h3>
                                    	<div class="text-center">
                                        	<img src="image/profile/<? echo $User_Photo; ?>" width="200" height="200" class="img-thumbnail">
                                        </div>
                                        
                                        <div class="text-center" style="padding-top: 15px;">
                                            <button class="btn btn-success"><i class="fa fa-flag"></i> ออนไลน์</button>
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
									<div style="box-shadow: 0px 0px 5px 0px #CCCCCC; ">
										<div id="profile">
											<div class="panel-body">

												<div style="padding-bottom:0px; margin-bottom:20px; font-size:20px; border-bottom: 1px solid #ddd; ">
													<h4>ข้อมูลพนักงาน</h4>
												</div>
                                                
												<div style="position: absolute; right: 0; top: 0; margin-top: 12px; margin-right:30px;">
													<a href="index_panel.php?module=employee&file=edit_employee&uid=<? echo $User_ID; ?>" class="btn btn-success edit-profile">
                                                    	<i class="fa fa-pencil-square fa-lg"></i> แก้ไขข้อมูล
                                                    </a>
												</div>
                                                    
														<div class="row profile-user-info">
															<div class="col-sm-6">
                                                            	<div class="profile-user-details clearfix">
                                                                    <div class="profile-user-details-label">บัตรประชาชน:</div>
                                                                    <div class="profile-user-details-value"><? echo $User_ID_Card; ?>&nbsp;</div>
                                                                </div>
                                                                <div class="profile-user-details clearfix">
                                                                    <div class="profile-user-details-label">เพศ:</div>
                                                                    <div class="profile-user-details-value"><? echo $User_Gender; ?>&nbsp;</div>
                                                                </div>
                                                                <div class="profile-user-details clearfix">
                                                                    <div class="profile-user-details-label">คำนำหน้าชื่อ:</div>
                                                                    <div class="profile-user-details-value"><? echo $User_Title; ?>&nbsp;</div>
                                                                </div>
                                                                <div class="profile-user-details clearfix">
                                                                    <div class="profile-user-details-label">ชื่อ:</div>
                                                                    <div class="profile-user-details-value"><? echo $User_Name; ?>&nbsp;</div>
                                                                </div>
                                                                <div class="profile-user-details clearfix">
                                                                    <div class="profile-user-details-label">นามสกุล:</div>
                                                                    <div class="profile-user-details-value"><? echo $User_Lastname; ?>&nbsp;</div>
                                                                </div>
                                                                <div class="profile-user-details clearfix">
                                                                    <div class="profile-user-details-label">ชื่อเล่น:</div>
                                                                    <div class="profile-user-details-value"><? echo $User_Nickame; ?>&nbsp;</div>
                                                                </div>
                                                                <div class="profile-user-details clearfix">
                                                                <?	list($year2,$month2,$day2)=explode("-","$User_Birthday");
																		for($i=1;$i<10;$i++){
																			if($day2 == $i ){$day2=$i;}
																		}	?>
                                                                    <div class="profile-user-details-label">วันเกิด:</div>
                                                                    <div class="profile-user-details-value">
																	<? echo "วันที่ ",date($day2)," ", $thaimonth[date($month2)-1] , " พ.ศ. ",date($year2)+543; ?>&nbsp;
                                                                    </div>
                                                                </div>
                                                                <div class="profile-user-details clearfix">
                                                                    <div class="profile-user-details-label">ศาสนา:</div>
                                                                    <div class="profile-user-details-value"><? echo $User_Religion; ?>&nbsp;</div>
                                                                </div>
                                                                <div class="profile-user-details clearfix">
                                                                    <div class="profile-user-details-label">กรุ๊ปเลือด:</div>
                                                                    <div class="profile-user-details-value"><? echo $User_Blood; ?>&nbsp;</div>
                                                                </div>
                                                            </div>
                                                            
															<div class="col-sm-6">
																<div class="profile-user-details clearfix">
                                                                    <div class="profile-user-details-label">ชื่อเข้าระบบ:</div>
                                                                    <div class="profile-user-details-value"><? echo $User_Username; ?>&nbsp;</div>
                                                                </div>
                                                                <div class="profile-user-details clearfix">
                                                                    <div class="profile-user-details-label">รหัสผ่าน:</div>
                                                                    <div class="profile-user-details-value"><? echo $User_Password; ?>&nbsp;</div>
                                                                </div>
                                                            </div>
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
            