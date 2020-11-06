<?	
		$result_patient=mysql_query("SELECT Pat_ID, Pat_ID_Card, Pat_Gender, Pat_Title, Pat_Name, Pat_Lastname, Pat_Birthday, Pat_Religion, Pat_Blood, Pat_Address, Pat_Tel, Pat_Career, Pat_Total_Cost, Pat_Date FROM patient WHERE Pat_ID='$_POST[pid]' ");
		list($Pat_ID, $Pat_ID_Card, $Pat_Gender, $Pat_Title, $Pat_Name, $Pat_Lastname, $Pat_Birthday, $Pat_Religion, $Pat_Blood, $Pat_Address, $Pat_Tel, $Pat_Career, $Pat_Total_Cost, $Pat_Date)=mysql_fetch_row($result_patient);
		
		$result_patient_health=mysql_query("SELECT Pat_Binge, Pat_Routinely, Pat_Intolerance, Pat_Diseases, Pat_Diseases_ON, Pat_Symptoms FROM patient_health WHERE Pat_ID='$Pat_ID' ");
		list($Pat_Binge, $Pat_Routinely, $Pat_Intolerance, $Pat_Diseases, $Pat_Diseases_ON, $Pat_Symptoms)=mysql_fetch_row($result_patient_health);
		
		$result_user=mysql_query("SELECT User_ID, User_Username, User_Title, User_Name, User_Lastname, User_Birthday, User_Address, User_Tel, User_Salary FROM user WHERE User_ID='$_SESSION[login_id]' ");
		list($User_ID, $User_Username, $User_Title, $User_Name, $User_Lastname, $User_Birthday, $User_Address, $User_Tel, $User_Salary)=mysql_fetch_row($result_user);
		

?>
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">รักษาผู้ป่วย
                    </h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                	<ul class="nav nav-tabs">
						<li class="active"><a href="#tab-treat" data-toggle="tab">การรักษา</a></li>
						<li ><a href="#tab-history" data-toggle="tab">ประวัติผู้ป่วย</a></li>
					</ul>
                    
                    <div class="tab-content" style="padding: 0 0px; ">
                    
                    	<div class="tab-pane  fade in active" id="tab-treat">
						<div style="box-shadow: 0px 0px 0px 0px #CCCCCC; border:1px solid #ddd; border-top:1px solid transparent;">
							<div id="treat">
								<div class="panel-body">
									<div style="padding-bottom:0px; margin-bottom:20px; font-size:20px; border-bottom: 1px solid #ddd; ">
										<h4>การรักษาผู้ป่วย</h4>
									</div>
                                    <form role="form" method="post" action="index_panel.php?module=treat&file=insert_treat" enctype="multipart/form-data" data-toggle="validator">
                                    <div class="row">
                                    	<div class="col-sm-12">
                                        
                                        	<div class="form-inline">
                                                <div class="form-group input-group">
                                                    <span class="input-group-addon">ชื่อผู้ป่วย</span>
                                                    <input type="text" class="form-control" name="p_name" value="<? echo $Pat_Title,"",$Pat_Name," ",$Pat_Lastname; ?>" readonly>
                                                    <input type="hidden" class="form-control" name="tp_id" value="<? echo $Pat_ID; ?>">
                                                </div>
                                                <div class="form-group input-group">
                                                    <span class="input-group-addon">หมอที่รักษา</span>
                                                    <input type="text" class="form-control" name="u_name" value="<? echo $User_Title,"",$User_Name," ",$User_Lastname; ?>" readonly>
                                                    <input type="hidden" class="form-control" name="tu_id" value="<? echo $User_ID; ?>">
                                                </div>
                                                <div class="form-group input-group">
                                                    <span class="input-group-addon">วันที่รักษา</span>
                                                    <input type="text" class="form-control" name="form_date" value="<? echo date("d m Y"); ?>" readonly>
                                                    <input type="hidden" class="form-control" name="t_date" value="<? echo $add_time=date("Y-m-d"); ?>">
                                                </div>
                                			</div>
                                            
                                        </div>
                                        
                                    	<div class="col-sm-6">
                                        	<div class="panel panel-default">
                                            	<div class="panel-heading">
                                                    <i class="fa fa-users fa-fw"></i> อาการ
                                                </div>
                                                <div class="panel-body">
                                                	<div class="form-group">
                                                        <textarea class="form-control" rows="3" name="t_symptoms" placeholder="กรอกรายละเอียด" required></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="col-sm-6">
                                        	<div class="panel panel-default">
                                            	<div class="panel-heading">
                                                    <i class="fa fa-users fa-fw"></i> ตรวจร่างกาย
                                                </div>
                                                <div class="panel-body">
                                                	<div class="form-group">
                                                        <textarea class="form-control" rows="3" name="t_examination" placeholder="กรอกรายละเอียด" required></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="col-sm-6">
                                        	<div class="panel panel-default">
                                            	<div class="panel-heading">
                                                    <i class="fa fa-users fa-fw"></i> วินิจฉัยโรค
                                                </div>
                                                <div class="panel-body">
                                                	<div class="form-group">
                                                        <textarea class="form-control" rows="3" name="t_diagnosis" placeholder="กรอกรายละเอียด" required></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="col-sm-6">
                                        	<div class="panel panel-default">
                                            	<div class="panel-heading">
                                                    <i class="fa fa-users fa-fw"></i> การรักษา
                                                </div>
                                                <div class="panel-body">
                                                	<div class="form-group">
                                                        <textarea class="form-control" rows="3" name="t_remedy" placeholder="กรอกรายละเอียด" required></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="col-sm-6">
                                        	<div class="panel panel-default">
                                            	<div class="panel-heading">
                                                    <i class="fa fa-users fa-fw"></i> จ่ายยา
                                                </div>
                                                <div class="panel-body">
                                                	<div class="form-group">
                                                        <textarea class="form-control" rows="3" name="t_dispensing" placeholder="กรอกรายละเอียด" required></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="col-sm-6">
                                        	<div class="form-inline">
                                                <div class="form-group input-group">
                                                    <span class="input-group-addon">แพ้ยา</span>
                                                    <input type="text" class="form-control" name="p_intolerance" value="<? echo $Pat_Intolerance; ?>" readonly>
                                                </div>
                                                
                                                <div class="form-group">
                                                    <div class="onoffswitch">
                                                        <input type="checkbox" name="t_appoint" class="onoffswitch-checkbox" id="myonoffswitch">
                                                        <label class="onoffswitch-label" for="myonoffswitch">
                                                            <span class="onoffswitch-inner"></span>
                                                            <span class="onoffswitch-switch"></span>
                                                        </label>
                                                    </div>
                                                </div>
                                                
                                                <div class="form-group">
                                                	<input type="hidden" class="form-control" name="qid" value="<? echo $_POST[qid]; ?>" required>
                                                	<input type="hidden" class="form-control" name="pid" value="<? echo $_POST[pid]; ?>" required>
                                                	<input type="hidden" class="form-control" name="rid" value="<? echo $_POST[rid]; ?>" required>
                                                    
                                                    <button type="submit" class="btn btn-primary">บันทึก</button>
                                                    <button type="reset" class="btn btn-danger">ยกเลิก</button>
                                                </div>
                							</div>
                                        </div>
                                        
                                    </div>
                                    </form>
                                </div>
							</div>
						</div>
                        </div>
                        
                        <div class="tab-pane" id="tab-history">
						<div style="box-shadow: 0px 0px 0px 0px #CCCCCC; border:1px solid #ddd; border-top:1px solid transparent;">
							<div id="profile">
								<div class="panel-body">
									<div style="padding-bottom:0px; margin-bottom:20px; font-size:20px; border-bottom: 1px solid #ddd; ">
										<h4>ข้อมูลผู้ป่วย</h4>
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
												<div class="profile-user-details-label">วันเกิด:</div>
												<div class="profile-user-details-value"><? echo $Pat_Birthday; ?>&nbsp;</div>
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
												<div class="profile-user-details-label">ยาที่ทานประจำ:</div>
												<div class="profile-user-details-value"><? echo $Pat_Routinely; ?>&nbsp;</div>
											</div>
											<div class="profile-user-details clearfix">
												<div class="profile-user-details-label">ประวัติแพ้ยา:</div>
												<div class="profile-user-details-value"><? echo $Pat_Intolerance; ?>&nbsp;</div>
											</div>
											<div class="profile-user-details clearfix">
												<div class="profile-user-details-label">โรคประจำตัว:</div>
												<div class="profile-user-details-value"><? echo $Pat_Diseases; ?>&nbsp;</div>
											</div>
											<div class="profile-user-details clearfix">
												<div class="profile-user-details-label">เคยมี:</div>
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
                                                
                                                <div class="tab-content" style="padding: 0 10px; ">
													<div class="tab-pane fade in active" id="tab-activity">
														<div class="table-responsive" style="border: 0px solid #ddd; ">
															<table class="table">
																<tbody class="table2">
																	<tr>
																		<td class="text-center"><i class="fa fa-comment"></i></td>
																		<td>
																			ไไไไไไกฟหกปแอาส่าสดเ.
																		</td>
																		<td>
																			2014/08/08 12:08
																		</td>
																	</tr>
																	<tr>
                                                                        <td class="text-center">
                                                                            <i class="fa fa-truck"></i>
                                                                        </td>
                                                                        <td>
                                                                            Scarlett Johansson changed order status from <span class="label label-primary">Pending</span>
                                                                            to <span class="label label-success">Completed</span>
                                                                        </td>
                                                                        <td>
                                                                            2014/08/08 12:08
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="text-center">
                                                                            <i class="fa fa-check"></i>
                                                                        </td>
                                                                        <td>
                                                                            Scarlett Johansson posted a comment in <a href="#">Lost in Translation opening scene</a> discussion.
                                                                        </td>
                                                                        <td>
                                                                            2014/08/08 12:08
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="text-center">
                                                                            <i class="fa fa-users"></i>
                                                                        </td>
                                                                        <td>
                                                                            Scarlett Johansson posted a comment in <a href="#">Avengers Initiative</a> project.
                                                                        </td>
                                                                        <td>
                                                                            2014/08/08 12:08
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="text-center">
                                                                            <i class="fa fa-heart"></i>
                                                                        </td>
                                                                        <td>
                                                                            Scarlett Johansson changed order status from <span class="label label-warning">On Hold</span>
                                                                            to <span class="label label-danger">Disabled</span>
                                                                        </td>
                                                                        <td>
                                                                            2014/08/08 12:08
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="text-center">
                                                                            <i class="fa fa-check"></i>
                                                                        </td>
                                                                        <td>
                                                                            Scarlett Johansson posted a comment in <a href="#">Lost in Translation opening scene</a> discussion.
                                                                        </td>
                                                                        <td>
                                                                            2014/08/08 12:08
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="text-center">
                                                                            <i class="fa fa-truck"></i>
                                                                        </td>
                                                                        <td>
                                                                            Scarlett Johansson changed order status from <span class="label label-primary">Pending</span>
                                                                            to <span class="label label-success">Completed</span>
                                                                        </td>
                                                                        <td>
                                                                            2014/08/08 12:08
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="text-center">
                                                                            <i class="fa fa-users"></i>
                                                                        </td>
                                                                        <td>
                                                                            Scarlett Johansson posted a comment in <a href="#">Avengers Initiative</a> project.
                                                                        </td>
                                                                        <td>
                                                                            2014/08/08 12:08
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                            
														</div>
                                                        <a href="#" class="btn btn-success pull-right">ดูทั้งหมด</a>
													</div>
											
                                                    <div class="tab-pane fade" id="tab-friends">
                                                        <ul class="widget-users row">
                                                            <li class="col-md-6">
                                                                <div class="img">
                                                                    <img src="img/samples/scarlet.png" alt="">
                                                                </div>
                                                                <div class="details">
                                                                    <div class="name">
                                                                        <a href="#">Scarlett Johansson</a>
                                                                    </div>
                                                                    <div class="time">
                                                                        <i class="fa fa-clock-o"></i> Last online: 5 minutes ago
                                                                    </div>
                                                                    <div class="type">
                                                                        <span class="label label-danger">Admin</span>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                            <li class="col-md-6">
                                                                <div class="img">
                                                                    <img src="img/samples/kunis.png" alt="">
                                                                </div>
                                                                <div class="details">
                                                                    <div class="name">
                                                                        <a href="#">Mila Kunis</a>
                                                                    </div>
                                                                    <div class="time online">
                                                                        <i class="fa fa-check-circle"></i> Online
                                                                    </div>
                                                                    <div class="type">
                                                                        <span class="label label-warning">Pending</span>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                            <li class="col-md-6">
                                                                <div class="img">
                                                                    <img src="img/samples/ryan.png" alt="">
                                                                </div>
                                                                <div class="details">
                                                                    <div class="name">
                                                                        <a href="#">Ryan Gossling</a>
                                                                    </div>
                                                                    <div class="time online">
                                                                        <i class="fa fa-check-circle"></i> Online
                                                                    </div>
                                                                </div>
                                                            </li>
                                                            <li class="col-md-6">
                                                                <div class="img">
                                                                    <img src="img/samples/robert.png" alt="">
                                                                </div>
                                                                <div class="details">
                                                                    <div class="name">
                                                                        <a href="#">Robert Downey Jr.</a>
                                                                    </div>
                                                                    <div class="time">
                                                                        <i class="fa fa-clock-o"></i> Last online: Thursday
                                                                    </div>
                                                                </div>
                                                            </li>
                                                            <li class="col-md-6">
                                                                <div class="img">
                                                                    <img src="img/samples/emma.png" alt="">
                                                                </div>
                                                                <div class="details">
                                                                    <div class="name">
                                                                        <a href="#">Emma Watson</a>
                                                                    </div>
                                                                    <div class="time">
                                                                        <i class="fa fa-clock-o"></i> Last online: 1 week ago
                                                                    </div>
                                                                </div>
                                                            </li>
                                                            <li class="col-md-6">
                                                                <div class="img">
                                                                    <img src="img/samples/george.png" alt="">
                                                                </div>
                                                                <div class="details">
                                                                    <div class="name">
                                                                        <a href="#">George Clooney</a>
                                                                    </div>
                                                                    <div class="time">
                                                                        <i class="fa fa-clock-o"></i> Last online: 1 month ago
                                                                    </div>
                                                                </div>
                                                            </li>
                                                            <li class="col-md-6">
                                                                <div class="img">
                                                                    <img src="img/samples/kunis.png" alt="">
                                                                </div>
                                                                <div class="details">
                                                                    <div class="name">
                                                                        <a href="#">Mila Kunis</a>
                                                                    </div>
                                                                    <div class="time online">
                                                                        <i class="fa fa-check-circle"></i> Online
                                                                    </div>
                                                                    <div class="type">
                                                                        <span class="label label-warning">Pending</span>
                                                                    </div>
                                                                </div>

                                                            </li>
                                                            <li class="col-md-6">
                                                                <div class="img">
                                                                    <img src="img/samples/ryan.png" alt="">
                                                                </div>
                                                                <div class="details">
                                                                    <div class="name">
                                                                        <a href="#">Ryan Gossling</a>
                                                                    </div>
                                                                    <div class="time online">
                                                                        <i class="fa fa-check-circle"></i> Online
                                                                    </div>
                                                                </div>
                                                            </li>
                                                        </ul>
                                                        <br>
                                                        <a href="#" class="btn btn-success pull-right">ดูทั้งหมด</a>
                                                    </div>
												</div>
											</div>
							</div>
						</div>
                        </div>
                    </div>
                </div>
                <!-- /.col-lg-12 -->
            </div>