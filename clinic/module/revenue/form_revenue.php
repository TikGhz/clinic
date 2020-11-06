            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">รายได้</h1>
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
                            เพิ่มข้อมูลรายได้อื่นๆ
                        </div>
                        <div class="panel-body">
                            <div class="row">
                            
                            	<form role="form" method="post" action="index_panel.php?module=revenue&file=insert_revenue" enctype="multipart/form-data" data-toggle="validator">
                                <div class="col-lg-12">
                                	<div class="well">
                                        <?
										$sql_doctor="SELECT User_ID, User_Title, User_Name, User_Lastname FROM user";
										$result_doctor=mysql_query($sql_doctor) or die (mysql_error());
										?>
                                        <div class="form-group">
                                        <label><i class="fa fa-home"></i> รายได้จาก :</label>
                                    		<select id="mySel" name="u_id" required>
                                            	<option value="">เลือกบุคคล</option>
										<?	while(list($User_ID, $User_Title, $User_Name, $User_Lastname)=mysql_fetch_row($result_doctor)){	?>
                                    			<option value="<? echo $User_ID; ?>"><? echo $User_Title," ",$User_Name," ",$User_Lastname; ?></option>
										<?	}	?>
                                    		</select>
                                        </div>
                                        
                                    	<div class="form-group">
                                        <label><i class="fa fa-home"></i> รายละเอียดรายได้ :</label>
                                        <textarea class="form-control" rows="3" name="rave_detail" required></textarea>
                                        </div>
                                        
                                        <div class="form-group">
                                        <label><i class="fa fa-home"></i> จำนวนเงิน(บาท) :</label>
                                        <input type="text" class="form-control" name="rave_price" placeholder="" required>
                                        </div>
                                        
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary">เพิ่มรายได้</button>
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