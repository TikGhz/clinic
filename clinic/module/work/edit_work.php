<?
			$result_work=mysql_query("SELECT Work_ID, User_ID, Work_Date, Work_Enter, Work_Out, Work_Color FROM work WHERE Work_ID='$_GET[wid]' ");
			list($Work_ID, $User_ID1, $Work_Date, $Work_Enter, $Work_Out, $Work_Color)=mysql_fetch_row($result_work);
									
			$sql_doctor="SELECT * FROM user WHERE User_ID='$User_ID1' ";
			$result_doctor=mysql_query($sql_doctor) or die (mysql_error());
			list($User_ID, $User_ID_Card, $User_Username, $User_Password, $User_Gender, $User_Title, $User_Name, $User_Lastname, $User_Nickame, $User_Birthday, $User_Religion, $User_Blood, $User_Department, $User_Prof_photo, $User_Address, $User_Tel, $User_Email, $User_Salary, $User_Photo, $User_Type_ID)=mysql_fetch_row($result_doctor);
?>
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">ตารางปฏิบัติงาน</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
            	<div class="col-lg-12">
                	<!--Function Alert-->
                    <?	echo gatAlert(); ?>
				</div>
                <div class="col-lg-6">
                    <div class="panel panel-default panel-info">
                        <div class="panel-heading">
                        	<i class="fa fa-users fa-fw"></i>
                            อัพเดทเวลาทำการ
                        </div>
                        <div class="panel-body">
                            <div class="row">
                            
                            	<form role="form" method="post" action="index_panel.php?module=work&file=update_work" enctype="multipart/form-data" data-toggle="validator">
                                <div class="col-lg-12">
                                	<div class="well">
                                        <div class="form-group">
                                        <label><i class="fa fa-home"></i> เลือกทันตแพทย์ :</label>
                                    		<select id="mySel" name="u_id" required>
                                    			<option value="">เลือกทันตแพทย์</option>
									<?
											$sql_doctor1="SELECT User_ID, User_Title, User_Name, User_Lastname FROM user WHERE User_Type_ID='3'";
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
                                        
                                        <label><i class="fa fa-home"></i> เลือกวันที่ :</label>
                                        <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-plus"></i></span>
                                            <input type="text" id="datetimepicker7" class="form-control" name="work_time" placeholder="วันที่ทำงาน" value="<? echo $Work_Date; ?>" required>
                                        </div>
                                        
                                        <label><i class="fa fa-home"></i> เวลาเข้า :</label>
                                        <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-plus"></i></span>
                                            <input type="text" id="datetimepicker21" class="form-control" name="work_enter" placeholder="เวลาเข้า" value="<? echo $Work_Enter; ?>" required>
                                        </div>
                                        
                                        <label><i class="fa fa-home"></i> เวลาออก :</label>
                                        <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-plus"></i></span>
                                            <input type="text" id="datetimepicker22" class="form-control" name="work_out" placeholder="เวลาออก" value="<? echo $Work_Out; ?>" required>
                                        </div>
                                        
                                        <label><i class="fa fa-home"></i> สีประจำตัว :</label>
                                        <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-plus"></i></span>
                                            <input type="color" id="" class="form-control" name="work_color" placeholder="เลือกสีประจำตัว" value="<? echo $Work_Color; ?>" required>
                                        </div>
                                        
                                        <div class="form-group">
                                        <input type="hidden" class="form-control" name="work_id" value="<? echo $Work_ID; ?>" required>
                                            <button type="submit" class="btn btn-primary">อัพเดทตารางทำงาน</button>
                                            <button type="reset" class="btn btn-danger">รีเซ็ท</button>
                                        </div>
									</div>
                                </div>
                                <!-- /.col-lg-6 (nested) -->
                                </form>
                                
                            </div>
                            <!-- /.row (nested) -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>