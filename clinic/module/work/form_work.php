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
                            เพิ่มเวลาทำการ
                        </div>
                        <div class="panel-body">
                            <div class="row">
                            
                            	<form role="form" method="post" action="index_panel.php?module=work&file=insert_work" enctype="multipart/form-data" data-toggle="validator">
                                <div class="col-lg-12">
                                	<div class="well">
                                        <?
										$sql_doctor="SELECT User_ID, User_Title, User_Name, User_Lastname FROM user WHERE User_Type_ID='3' ";
										$result_doctor=mysql_query($sql_doctor) or die (mysql_error());
										?>
                                        <div class="form-group">
                                        <label><i class="fa fa-home"></i> เลือกทันตแพทย์ :</label>
                                    		<select id="mySel" name="u_id" required>
                                            	<option value="">เลือกทันตแพทย์</option>
										<?	while(list($User_ID, $User_Title, $User_Name, $User_Lastname)=mysql_fetch_row($result_doctor)){	?>
                                    			<option value="<? echo $User_ID; ?>"><? echo $User_Title," ",$User_Name," ",$User_Lastname; ?></option>
										<?	}	?>
                                    		</select>
                                        </div>
                                        
                                        <label><i class="fa fa-home"></i> เลือกวันที่ :</label>
                                        <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-plus"></i></span>
                                            <input type="text" id="datetimepicker7" class="form-control" name="work_time" placeholder="วันที่ทำงาน" required>
                                        </div>
                                        
                                        <label><i class="fa fa-home"></i> เวลาเข้า :</label>
                                        <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-plus"></i></span>
                                            <input type="text" id="datetimepicker21" class="form-control" name="work_enter" placeholder="เวลาเข้า" required>
                                        </div>
                                        
                                        <label><i class="fa fa-home"></i> เวลาออก :</label>
                                        <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-plus"></i></span>
                                            <input type="text" id="datetimepicker22" class="form-control" name="work_out" placeholder="เวลาออก" required>
                                        </div>
                                        
                                        <label><i class="fa fa-home"></i> สีประจำตัว :</label>
                                        <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-plus"></i></span>
                                            <input type="color" id="" class="form-control" name="work_color" placeholder="เลือกสีประจำตัว" required>
                                        </div>
                                        
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary">เพิ่มตารางทำงาน</button>
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