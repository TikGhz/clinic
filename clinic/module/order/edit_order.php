            <?
				$result_purchaser_detail=mysql_query("SELECT Purd_ID, Pur_ID, Drug_ID, Purd_Unit, Purd_Cost_Price, Purd_Price, Purd_Status, User_ID FROM purchaser_detail WHERE Purd_ID='$_GET[puid]' ");
			list($Purd_ID, $Pur_ID1, $Drug_ID1, $Purd_Unit, $Purd_Cost_Price, $Purd_Price, $Purd_Status, $User_ID1)=mysql_fetch_row($result_purchaser_detail);
				
				$result_drug=mysql_query("SELECT Drug_ID, Drug_Name, Drug_Detail, Drug_Type_ID, Drug_Unit, Drug_Cost_Price, Drug_Price, Pur_ID, User_ID, Drug_Date FROM drug WHERE Drug_ID='$Drug_ID1' ") or die (mysql_error());
				list($Drug_ID, $Drug_Name, $Drug_Detail, $Drug_Type_ID, $Drug_Unit, $Drug_Cost_Price, $Drug_Price, $Pur_ID, $User_ID, $Drug_Date)=mysql_fetch_row($result_drug);
				
				$sql_edit_doctor="SELECT * FROM user WHERE User_ID='$User_ID1' ";
				$result_edit_doctor=mysql_query($sql_edit_doctor) or die (mysql_error());
				list($User_ID, $User_ID_Card, $User_Username, $User_Password, $User_Gender, $User_Title, $User_Name, $User_Lastname, $User_Nickame, $User_Birthday, $User_Religion, $User_Blood, $User_Department, $User_Prof_photo, $User_Address, $User_Tel, $User_Email, $User_Salary, $User_Photo, $User_Type_ID)=mysql_fetch_row($result_edit_doctor);
				
				$sql_edit_purchaser="SELECT Pur_ID, Pur_Business, Pur_Name, Pur_Lastname, Pur_Address, Pur_Tel, Pur_Email, Pur_Bankname, Pur_Account, Pur_Note FROM purchaser WHERE Pur_ID='$Pur_ID1' ";
				$result_edit_purchaser=mysql_query($sql_edit_purchaser)or die (mysql_error());
				list($Pur_ID, $Pur_Business, $Pur_Name, $Pur_Lastname, $Pur_Address, $Pur_Tel, $Pur_Email, $Pur_Bankname, $Pur_Account, $Pur_Note)=mysql_fetch_row($result_edit_purchaser);
			?>
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">จัดซื้อเวชภัณฑ์</h1>
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
                                		<h3>เจ้าหน้าที่จัดซื้อ</h3><h4><? echo $User_Name," ",$User_Lastname; ?></h4>
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
                                			<div class="" style="margin-bottom:20px; font-size:20px;">ชื่อเวชภัณฑ์ <strong><? echo $Drug_Name; ?></strong></div>
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
                                                    	<form role="form" method="post" action="index_panel.php?module=order&file=update_order" enctype="multipart/form-data" data-toggle="validator">
                                                       		<div class="col-lg-12">
                                                            <div class="well">

                                        <label><i class="fa fa-home"></i> ชื่อเวชภัณฑ์ :</label>
                                    	<div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-flag"></i></span>
                                            <input type="text" class="form-control" name="o_name" placeholder="ชื่อเวชภัณฑ์" value="<? echo $Drug_Name;?>" readonly>
                                        </div>
                                        
                                    	<div class="form-group">
                                        <label><i class="fa fa-home"></i> รายละเอียดเวชภัณฑ์ :</label>
                                        <textarea class="form-control" rows="3" name="o_detail" readonly><? echo $Drug_Detail;?></textarea>
                                        </div>
                                        
                                        <div class="form-group">
									<?	$sql_drug_type="SELECT Drug_Type_ID, Drug_Type_Name FROM drug_type ";
											$result_drug_type=mysql_query($sql_drug_type)or die (mysql_error());
									?><label><i class="fa fa-home"></i> ประเภทเวชภัณฑ์ :</label>
                                    		<select class="form-control" name="o_type_id" readonly>
                                    			<option value="" disabled>เลือกประเภทเวชภัณฑ์</option>
									<?	while(list($Drug_Type_ID1, $Drug_Type_Name1)=mysql_fetch_row($result_drug_type)){	?>
                                    <?	if($Drug_Type_ID1==$Drug_Type_ID){?>
                                    			
                                    			<option value="<? echo $Drug_Type_ID1; ?>" selected><? echo $Drug_Type_Name1; ?></option>
                                    <?	}else{	?>
                                    			<option value="<? echo $Drug_Type_ID1; ?>" disabled><? echo $Drug_Type_Name1; ?></option>
									<?	}}	?>
                                    		</select>
                                    	</div>
										
                                        <label><i class="fa fa-home"></i> จำนวนเดิมมี : <? echo $Drug_Unit; ?></label>
                                        <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-group"></i></span>
                                            <input type="text" class="form-control" name="o_unit" placeholder="จำนวนเวชภัณฑ์ใหม่" value="<? echo $Purd_Unit; ?>" required>
                                        </div>
                                        
                                        <label><i class="fa fa-home"></i> ราคาต้นทุนเดิม : <? echo $Drug_Cost_Price; ?> บาท</label>
                                        <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-plus"></i></span>
                                            <input type="text" class="form-control" name="o_cost_price" placeholder="ราคาต้นทุนใหม่" value="<? echo $Purd_Cost_Price; ?>" required>
                                        </div>
                                        
                                        <label><i class="fa fa-home"></i> ราคาขายเดิม : <? echo $Drug_Price; ?> บาท</label>
                                        <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-plus"></i></span>
                                            <input type="text" class="form-control" name="o_price" placeholder=s"ราคาขายใหม่" value="<? echo $Purd_Price; ?>" required>
                                        </div>
                                        
                                        <div class="form-group">
                                        <?
										if($Purd_Status=="รอดำเนินการ"){ $sel1="selected";}
										if($Purd_Status=="รับแล้วบางส่วน"){ $sel2="selected";}
										if($Purd_Status=="รับทั้งหมดแล้ว"){ $sel3="selected";}
										?>
										<label><i class="fa fa-home"></i> สถานะดำเนินการ :</label>
                                    		<select class="form-control" name="o_status" required>
                                    			<option value="">เลือกสถานะดำเนินการ</option>
                                    			<option value="รอดำเนินการ" <? echo $sel1; ?>>รอดำเนินการ</option>
                                                <option value="รับแล้วบางส่วน" <? echo $sel2; ?>>รับแล้วบางส่วน</option>
                                                <option value="รับทั้งหมดแล้ว" <? echo $sel3; ?>>รับทั้งหมดแล้ว</option>
                                    		</select>
                                    	</div>
                                        
                                        <div class="form-group">
                                        	<input type="hidden" class="form-control" name="d_name" value="<? echo $Drug_Name;?>" required>
                                        	<input type="hidden" class="form-control" name="oid" value="<? echo $_GET[puid];?>" required>
                                            <input type="hidden" class="form-control" name="old_status" value="<? echo $Purd_Status;?>" required>
                                            <input type="hidden" class="form-control" name="u_id" value="<? echo $User_ID;?>" required>
                                            <button type="submit" class="btn btn-primary">แก้ไขจัดซื้อ</button>
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
                                		<h3><? echo $Pur_Business; ?></h3><h4><? echo $Pur_Name," ",$Pur_Lastname; ?></h4>
                                        <hr>
                                        
                                        <div class="profile-details">
                                            <ul class="fa-ul">
                                                <li><i class="fa-li fa fa-tasks"></i>ธนาคาร: <span><? echo $Pur_Bankname; ?></span></li>
                                                <li><i class="fa-li fa fa-suitcase"></i>เลขบัญชี: <span><? echo $Pur_Account; ?></span></li>
                                                <li><i class="fa-li fa fa-envelope"></i>อีเมล์: <span><? echo $Pur_Email; ?></span></li>
                                                <li><i class="fa-li fa fa-mobile"></i>มือถือ: <span><? echo $Pur_Tel; ?></span></li>
                                                <li><i class="fa-li fa fa-home"></i>ที่อยู่: <span><? echo $Pur_Address; ?></span></li>
                                                
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
            