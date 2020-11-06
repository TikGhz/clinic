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
                	<!--Function Alert-->
                    <?	echo gatAlert(); ?>
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
									<div style="box-shadow: 0px 0px 5px 0px #CCCCCC; ">
										<div id="profile">
											<div class="panel-body">

												<div style="padding-bottom:0px; margin-bottom:20px; font-size:20px; border-bottom: 1px solid #ddd; ">
													<h4>ข้อมูลผู้ป่วย</h4>
												</div>
                                                
												<div style="position: absolute; right: 0; top: 0; margin-top: 12px; margin-right:30px;">
													<a href="index_panel.php?module=patient&file=edit_patient&pid=<? echo $Pat_ID; ?>" class="btn btn-success edit-profile">
                                                    	<i class="fa fa-pencil-square fa-lg"></i> แก้ไขผู้ป่วย
                                                    </a>
												</div>
                                                    
														<div class="row profile-user-info">
															<div class="col-sm-6">
                                                            	<div class="profile-user-details clearfix">
                                                                    <div class="profile-user-details-label">บัตรประชาชน:</div>
                                                                    <div class="profile-user-details-value"><? echo $Pat_ID_Card; ?>&nbsp;</div>
                                                                </div>
                                                                <div class="profile-user-details clearfix">
                                                                    <div class="profile-user-details-label">เพศ:</div>
                                                                    <div class="profile-user-details-value"><? echo $Pat_Gender; ?>&nbsp;</div>
                                                                </div>
                                                                <div class="profile-user-details clearfix">
                                                                    <div class="profile-user-details-label">คำนำหน้าชื่อ:</div>
                                                                    <div class="profile-user-details-value"><? echo $Pat_Title; ?>&nbsp;</div>
                                                                </div>
                                                                <div class="profile-user-details clearfix">
                                                                    <div class="profile-user-details-label">ชื่อ:</div>
                                                                    <div class="profile-user-details-value"><? echo $Pat_Name; ?>&nbsp;</div>
                                                                </div>
                                                                <div class="profile-user-details clearfix">
                                                                    <div class="profile-user-details-label">นามสกุล:</div>
                                                                    <div class="profile-user-details-value"><? echo $Pat_Lastname; ?>&nbsp;</div>
                                                                </div>
                                                                <div class="profile-user-details clearfix">
                                                                <?	list($year2,$month2,$day2)=explode("-","$Pat_Birthday");
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
                                                                    <div class="profile-user-details-value"><? echo $Pat_Religion; ?>&nbsp;</div>
                                                                </div>
                                                                <div class="profile-user-details clearfix">
                                                                    <div class="profile-user-details-label">กรุ๊ปเลือด:</div>
                                                                    <div class="profile-user-details-value"><? echo $Pat_Blood; ?>&nbsp;</div>
                                                                </div>
                                                            </div>
                                                            
                                                            <div class="col-sm-6">
																<div class="profile-user-details clearfix">
                                                                    <div class="profile-user-details-label">การดื่มสุรา:</div>
                                                                    <div class="profile-user-details-value"><? echo $Pat_Binge; ?>&nbsp;</div>
                                                                </div>
                                                                <div class="profile-user-details clearfix">
                                                                    <div class="profile-user-details-label">ยาทานประจำ:</div>
                                                                    <div class="profile-user-details-value"><? echo $Pat_Routinely; ?>&nbsp;</div>
                                                                </div>
                                                                <div class="profile-user-details clearfix">
                                                                    <div class="profile-user-details-label">แพ้ยา:</div>
                                                                    <div class="profile-user-details-value"><? echo $Pat_Intolerance; ?>&nbsp;</div>
                                                                </div>
                                                                <div class="profile-user-details clearfix">
                                                                    <div class="profile-user-details-label">โรคประจำตัว:</div>
                                                                    <div class="profile-user-details-value"><? echo $Pat_Diseases; ?>&nbsp;</div>
                                                                </div>
                                                                <div class="profile-user-details clearfix">
                                                                    <div class="profile-user-details-label">เคยเป็นโรค:</div>
                                                                    <div class="profile-user-details-value"><? echo $Pat_Diseases_ON; ?>&nbsp;</div>
                                                                </div>
                                                                <div class="profile-user-details clearfix">
                                                                    <div class="profile-user-details-label">อาการเบื้องต้น:</div>
                                                                    <div class="profile-user-details-value"><? echo $Pat_Symptoms; ?>&nbsp;</div>
                                                                </div>
                                                            </div>
														</div>
												
                                                <ul class="nav nav-tabs">
													<li class="active"><a href="#tab-activity" data-toggle="tab">การรักษา</a></li>
                                                    <li><a href="#tab-friends" data-toggle="tab">ทันตแพทย์</a></li>
												</ul>
                                                <?
												$sql_ht="SELECT Tre_ID, Pat_ID, User_ID, Tre_Date, Tre_Symptoms, Tre_Examination, Tre_Diagnosis, Tre_Remedy, Tre_Dispensing, Tre_Appoint, Tre_Status FROM hist_treatment WHERE Pat_ID='$_GET[pid]' LIMIT 0,10 ";
												$result_ht=mysql_query($sql_ht) or die (mysql_error());
												?>
                                                <div class="tab-content" style="padding: 0 10px; ">
													<div class="tab-pane fade in active" id="tab-activity">
														<div class="table-responsive" style="border: 0px solid #ddd; ">
															<table class="table">
																<tbody class="table2">
                                                                <?	while(list($Tre_ID, $Pat_ID, $User_ID, $Tre_Date, $Tre_Symptoms, $Tre_Examination, $Tre_Diagnosis, $Tre_Remedy, $Tre_Dispensing, $Tre_Appoint, $Tre_Status)=mysql_fetch_row($result_ht)){	
														$result_user=mysql_query("SELECT User_Title, User_Name, User_Lastname FROM user WHERE User_ID='$User_ID' ");
														list($User_Title, $User_Name, $User_Lastname)=mysql_fetch_row($result_user);
																?>
																	<tr>
																		<td class="text-center"><i class="fa fa-plus-square"></i></td>
																		<td>
                                                                        <? echo "รักษาโดย ";	?> 
                                                                        <a href="index_panel.php?module=treat&file=show_treat&tid=<? echo $Tre_ID;?>">
																			<? echo $User_Title,"",$User_Name," ",$User_Lastname; ?>
                                                                        </a>
                                                                        <?	if($Tre_Status==1){	?>
                                                                        			<span class="label label-success">เรียบร้อย</span>
                                                                         <?	}elseif($Tre_Status==2){	?>
                                                                         			<span class="label label-primary">กำลังรักษา</span>
                                                                         <?	}else{	?>
                                                                        			<span class="label label-danger">ยกเลิก</span>
                                                                         <?	}	?>
																		</td>
																		<td>
																		<? echo $Tre_Date;	?>
																		</td>
																	</tr>
                                                                <?	}	?>
                                                                </tbody>
                                                            </table>
                                                            
														</div>
                                                        <a href="#" class="btn btn-success pull-right">ดูทั้งหมด</a>
													</div>
                                                    
                                                    <div class="tab-pane fade" id="tab-friends">
                                                        <ul class="widget-users row">
                                                        <?
														$result_ht1=mysql_query($sql_ht) or die (mysql_error());
														while(list($Tre_ID, $Pat_ID, $User_ID, $Tre_Date, $Tre_Symptoms, $Tre_Examination, $Tre_Diagnosis, $Tre_Remedy, $Tre_Dispensing, $Tre_Appoint, $Tre_Status)=mysql_fetch_row($result_ht1)){	
														$result_user1=mysql_query("SELECT User_Title, User_Name, User_Lastname FROM user WHERE User_ID='$User_ID' ");
														list($User_Title, $User_Name, $User_Lastname)=mysql_fetch_row($result_user1);
														?>
                                                            <li class="col-md-6">
                                                                <div class="img">
                                                                    <img src="image/profile/profile.png" alt="" width="50" height="50">
                                                                </div>
                                                                <div class="details">
                                                                    <div class="name">
                                                                        <a href="#"><? echo $User_Title,"",$User_Name," ",$User_Lastname; ?></a>
                                                                    </div>
                                                                    <div class="time">
                                                                        <i class="fa fa-clock-o"></i> <? echo fb_date(strtotime($Tre_Date)); ?>
                                                                    </div>
                                                                    <div class="type">
                                                                    	 <?	if($Tre_Status==1){	?>
                                                                        			<span class="label label-success">เรียบร้อย</span>
                                                                         <?	}elseif($Tre_Status==2){	?>
                                                                         			<span class="label label-primary">กำลังรักษา</span>
                                                                         <?	}else{	?>
                                                                        			<span class="label label-danger">ยกเลิก</span>
                                                                         <?	}	?>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                        <?	}	?>
                                                        </ul>
                                                        <br>
                                                        <a href="#" class="btn btn-success pull-right">ดูทั้งหมด</a>
                                                    </div>
												</div>
											</div>
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
            
            