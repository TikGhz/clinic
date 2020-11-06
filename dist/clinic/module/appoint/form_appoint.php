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
				</div>
                <div class="col-lg-6">
                    <div class="panel panel-default panel-info">
                        <div class="panel-heading">
                        	<i class="fa fa-users fa-fw"></i>
                            เพิ่มข้อมูลใบนัด
                        </div>
                        <div class="panel-body">
                            <div class="row">
                            
                            	<form role="form" method="post" action="index_panel.php?module=appoint&file=insert_appoint" enctype="multipart/form-data" data-toggle="validator">
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
                                        
                                        <div class="form-group">
                                        <label><i class="fa fa-home"></i> เลือกผู้ป่วย :</label>
                                    		<select id="mySel1" name="p_id" required>
                                            	<option value="">เลือกผู้ป่วย</option>
										<?	$sql_pat="SELECT Pat_ID, Pat_Title, Pat_Name, Pat_Lastname FROM patient";
												$result_pat=mysql_query($sql_pat);
												while(list($Pat_ID, $Pat_Title, $Pat_Name, $Pat_Lastname)=mysql_fetch_row($result_pat)){	?>
                                    			<option value="<? echo $Pat_ID; ?>"><? echo $Pat_Title," ",$Pat_Name," ",$Pat_Lastname; ?></option>
										<?	}	?>
                                    		</select>
                                        </div>
                                        
                                    	<div class="form-group">
                                        <label><i class="fa fa-home"></i> รายละเอียดใบนัด :</label>
                                        <textarea class="form-control" rows="3" name="a_detail" required></textarea>
                                        </div>
                                        
                                        <label><i class="fa fa-home"></i> วันที่นัด :</label>
                                        <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-plus"></i></span>
                                            <input type="text" id="datetimepicker7" class="form-control" name="a_time" placeholder="วันที่นัด" required>
                                        </div>
                                        
                                        <div class="form-group">
                                        <label><i class="fa fa-home"></i> รายละเอียดใบนัด :</label>
                                                <select class="form-control" name="a_status" required>
                                                    <option value="">สถานะการดำเนินการ</option>
                                                    <option value="ยกเลิก">ยกเลิก</option>
                                                    <option value="รอดำเนินการ" selected>รอดำเนินการ</option>
                                                    <option value="เรียบร้อย">เรียบร้อย</option>
                                                </select>
                                            </div>
                                        
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary">เพิ่มใบนัด</button>
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