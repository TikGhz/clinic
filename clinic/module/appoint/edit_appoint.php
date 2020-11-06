            <?
			$add_time=date("Y-m-d H:i:s");	
			list($add_time1,$add_time2)=explode(" ","$add_time");
			list($year,$month,$day)=explode("-","$add_time1");
			list($hour,$minute,$second)=explode(":","$add_time2");
			
			$result_appoint=mysql_query("SELECT App_ID, User_ID, Pat_ID, App_Detail, App_Time, App_Status, App_Date FROM appointment WHERE App_ID='$_GET[aid]' ORDER BY App_ID ASC");
			list($App_ID, $User_ID1, $Pat_ID1, $App_Detail, $App_Time, $App_Status, $App_Date)=mysql_fetch_row($result_appoint);
									
			$sql_doctor="SELECT * FROM user WHERE User_ID='$User_ID1' ";
			$result_doctor=mysql_query($sql_doctor) or die (mysql_error());
			list($User_ID, $User_ID_Card, $User_Username, $User_Password, $User_Gender, $User_Title, $User_Name, $User_Lastname, $User_Nickame, $User_Birthday, $User_Religion, $User_Blood, $User_Department, $User_Prof_photo, $User_Address, $User_Tel, $User_Email, $User_Salary, $User_Photo, $User_Type_ID)=mysql_fetch_row($result_doctor);
								
			$sql_pat="SELECT Pat_ID, Pat_ID_Card, Pat_Gender, Pat_Title, Pat_Name, Pat_Lastname, Pat_Birthday, Pat_Religion, Pat_Blood, Pat_Address, Pat_Tel, Pat_Career, Pat_Total_Cost, Pat_Date FROM patient WHERE Pat_ID='$Pat_ID1' ";
			$result_pat=mysql_query($sql_pat);
			list($Pat_ID, $Pat_ID_Card, $Pat_Gender, $Pat_Title, $Pat_Name, $Pat_Lastname, $Pat_Birthday, $Pat_Religion, $Pat_Blood, $Pat_Address, $Pat_Tel, $Pat_Career, $Pat_Total_Cost, $Pat_Date)=mysql_fetch_row($result_pat);
			?>
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">ใบนัด</h1>
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
                                		<h3>ทันตแพทย์</h3><h4><? echo $User_Name," ",$User_Lastname; ?></h4>
                                    	<div class="text-center">
                                        	<img src="image/profile/<? echo $User_Photo; ?>" width="200" height="200" class="img-thumbnail">
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
                				<div class="col-lg-6">
                                			<div class="" style="margin-bottom:20px; font-size:20px;">ใบนัดหมายที่ :  <strong><? echo ($year+543),"-",$App_ID; ?></strong></div>
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
                                                    	<form role="form" method="post" action="index_panel.php?module=appoint&file=update_appoint" enctype="multipart/form-data" data-toggle="validator">
                                <div class="col-lg-12">
                                	<div class="well">
                                        
                                        <div class="form-group">
                                        <label><i class="fa fa-home"></i> เลือกทันตแพทย์ :</label>
                                    		<select id="mySel" name="u_id" required>
                                    			<option value="">เลือกทันตแพทย์</option>
									<?
											$sql_doctor1="SELECT User_ID, User_Title, User_Name, User_Lastname FROM user";
											$result_doctor1=mysql_query($sql_doctor1) or die (mysql_error());
											while(list($User_ID2, $User_Title2, $User_Name2, $User_Lastname2)=mysql_fetch_row($result_doctor1)){	$i++;
											if($User_ID1==$User_ID2){
									?>
                                    			<option value="<? echo $User_ID2; ?>" selected><? echo $User_Title2,"",$User_Name2," ",$User_Lastname2; ?></option>
									<?	}else{	?>
                                    			<option value="<? echo $User_ID2; ?>"><? echo $User_Title2,"",$User_Name2," ",$User_Lastname2; ?></option>
									<?	}}	?>
                                    		</select>
                                        </div>
                                        
                                        <div class="form-group">
                                        <label><i class="fa fa-home"></i> เลือกผู้ป่วย :</label>
                                    		<select id="mySel1" name="p_id" required>
                                            	<option value="">เลือกผู้ป่วย</option>
                                   <?
											$sql_patient1="SELECT Pat_ID, Pat_Title, Pat_Name, Pat_Lastname FROM patient";
											$result_patient1=mysql_query($sql_patient1) or die (mysql_error());
											while(list($Pat_ID2, $Pat_Title2, $Pat_Name2, $Pat_Lastname2)=mysql_fetch_row($result_patient1)){	$i++;
											if($Pat_ID1==$Pat_ID2){
									?>
                                    			<option value="<? echo $Pat_ID2; ?>" selected><? echo $Pat_Title2,"",$Pat_Name2," ",$Pat_Lastname2; ?></option>
									<?	}else{	?>
                                    			<option value="<? echo $Pat_ID2; ?>"><? echo $Pat_Title2,"",$Pat_Name2," ",$Pat_Lastname2; ?></option>
									<?	}}	?>
                                    		</select>
                                        </div>
                                        
                                    	<div class="form-group">
                                        <label><i class="fa fa-home"></i> รายละเอียดใบนัด :</label>
                                        <textarea class="form-control" rows="3" name="a_detail" required><? echo $App_Detail; ?></textarea>
                                        </div>
                                        
                                        <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-plus"></i></span>
                                            <input type="date" class="form-control" name="a_time" placeholder="เวลา" value="<? echo $App_Time; ?>" required>
                                        </div>
                                        
                                        <div class="form-group">
                                        <?	if($App_Status=="ยกเลิก"){ $sel1="selected";}	else{ $sel1=""; }?>
                                        <?	if($App_Status=="รอดำเนินการ"){ $sel2="selected";}else{ $sel2=""; }	?>
                                        <?	if($App_Status=="เรียบร้อยแล้ว"){ $sel3="selected";}else{ $sel3=""; }	?>
                                                <select class="form-control" name="a_status" required>
                                                    <option value="">สถานะการดำเนินการ</option>
                                                    <option value="ยกเลิก" <? echo $sel1; ?>>ยกเลิก</option>
                                                    <option value="รอดำเนินการ" <? echo $sel2; ?>>รอดำเนินการ</option>
                                                    <option value="เรียบร้อยแล้ว" <? echo $sel3; ?>>เรียบร้อยแล้ว</option>
                                                </select>
                                            </div>
                                        
                                        <div class="form-group">
                                        <input type="hidden" class="form-control" name="a_id" value="<? echo $App_ID; ?>" required>
                                            <button type="submit" class="btn btn-primary">แก้ไขใบนัด</button>
                                            <button type="reset" class="btn btn-danger">รีเซ็ท</button>
                                        </div>
									</div>
                                </div>
                                <!-- /.col-lg-6 (nested) -->
                                </form>
                                                    	</div>
                                                	</div>
                                                </div>

                                            </div>
                                </div>
                                <!-- /.col-lg-6 (nested) -->
                            	<div class="col-lg-3">
                                	<div style="padding-left: 8px; padding-right: 8px; box-shadow: 0px 0px 5px 0px #CCCCCC; margin-bottom: 16px; padding: 20px;">
                                		<h3>ผู้ป่วย </h3><h4><? echo $Pat_Name," ",$Pat_Lastname; ?></h4>
                                    	<div class="text-center">
                                        	<img src="image/profile/profile.png" width="200" height="200" class="img-thumbnail">
                                        </div>
                                        
                                        <hr>
                                        
                                        <div class="profile-details">
                                            <ul class="fa-ul">
                                                <li><i class="fa-li fa fa-tasks"></i>อาชีพ: <span><? echo $Pat_Career; ?></span></li>
                                                <li><i class="fa-li fa fa-suitcase"></i>กรุ๊ปเลือด: <span><? echo $Pat_Blood; ?></span></li>
                                                <li><i class="fa-li fa fa-envelope"></i>เกิดเมื่อ: <span><? echo $Pat_Birthday; ?></span></li>
                                                <li><i class="fa-li fa fa-mobile"></i>มือถือ: <span><? echo $Pat_Tel; ?></span></li>
                                                <li><i class="fa-li fa fa-home"></i>ที่อยู่: <span><? echo $Pat_Address; ?></span></li>
                                                
                                            </ul>
										</div>
                                        
                                        <hr>
									</div>
                                </div>
                                <!-- /.col-lg-3 (nested) -->
                            
                            </div>
                            <!-- /.row (nested) -->

                    </div>
                    <!-- /.panel -->
                </div>
                
                <!-- /.col-lg-12 -->
            </div>
