            <?
				$sql_edit_drug="SELECT * FROM drug WHERE Drug_ID='$_GET[did]' ";
				$result_edit_drug=mysql_query($sql_edit_drug) or die (mysql_error());
				list($Drug_ID, $Drug_Name, $Drug_Detail, $Drug_Type_ID, $Drug_Unit, $Drug_Cost_Price, $Drug_Price, $Pur_ID1, $User_ID1, $Drug_Date)=mysql_fetch_row($result_edit_drug);
				
				$sql_edit_doctor="SELECT * FROM user WHERE User_ID='$User_ID1' ";
				$result_edit_doctor=mysql_query($sql_edit_doctor) or die (mysql_error());
				list($User_ID, $User_ID_Card, $User_Username, $User_Password, $User_Gender, $User_Title, $User_Name, $User_Lastname, $User_Nickame, $User_Birthday, $User_Religion, $User_Blood, $User_Department, $User_Prof_photo, $User_Address, $User_Tel, $User_Email, $User_Salary, $User_Photo, $User_Type_ID)=mysql_fetch_row($result_edit_doctor);
				
				$sql_edit_drug_type="SELECT Drug_Type_ID, Drug_Type_Name FROM drug_type WHERE Drug_Type_ID='$Drug_Type_ID' ";
				$result_edit_drug_type=mysql_query($sql_edit_drug_type)or die (mysql_error());
				list($Drug_Type_ID1, $Drug_Type_Name1)=mysql_fetch_row($result_edit_drug_type);
				
				$sql_edit_purchaser="SELECT Pur_ID, Pur_Business, Pur_Name, Pur_Lastname, Pur_Address, Pur_Tel, Pur_Email, Pur_Bankname, Pur_Account, Pur_Note FROM purchaser WHERE Pur_ID='$Pur_ID1' ";
				$result_edit_purchaser=mysql_query($sql_edit_purchaser)or die (mysql_error());
				list($Pur_ID, $Pur_Business, $Pur_Name, $Pur_Lastname, $Pur_Address, $Pur_Tel, $Pur_Email, $Pur_Bankname, $Pur_Account, $Pur_Note)=mysql_fetch_row($result_edit_purchaser);
				
			?>
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">คลังเวชภัณฑ์</h1>
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
                                		<h3>เจ้าหน้าที่เพิ่มยา</h3><h4><? echo $User_Name," ",$User_Lastname; ?></h4>
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
                                			<div class="" style="margin-bottom:20px; font-size:20px;">ชื่อเวชภัณฑ์ : <strong><? echo $Drug_Name; ?></strong></div>
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
                                                    	<form role="form" method="post" action="index_panel.php?module=drug&file=update_drug" enctype="multipart/form-data" data-toggle="validator">
                                                       		<div class="col-lg-12">
                                                            <div class="well">
                                                            
                                                            	<label><i class="fa fa-home"></i> ชื่อเวชภัณฑ์ :</label>
                                                                <div class="form-group input-group">
                                                                    <span class="input-group-addon"><i class="fa fa-flag"></i></span>
                                                                    <input type="text" class="form-control" name="d_name" placeholder="<? echo $Drug_Name; ?>" value="<? echo $Drug_Name; ?>" data-minlength="4"  required>
                                                                </div>
                                                                
                                                                <div class="form-group">
                                                                <label><i class="fa fa-home"></i> รายละเอียดเวชภัณฑ์ :</label>
                                                                <textarea class="form-control" rows="3" name="d_detail" required><? echo $Drug_Detail; ?></textarea>
                                                                </div>
                                                                
                                                                <div class="form-group">
                                                                <label><i class="fa fa-home"></i> ประเภทเวชภัณฑ์ :</label>
															<?	$sql_drug_type="SELECT Drug_Type_ID, Drug_Type_Name FROM drug_type ";
                                                                    $result_drug_type=mysql_query($sql_drug_type)or die (mysql_error());
                                                            ?>
                                                                    <select class="form-control" name="d_type_id" required>
                                                                        <option value="">เลือกประเภทเวชภัณฑ์</option>
                                                            <?	while(list($Drug_Type_ID2, $Drug_Type_Name2)=mysql_fetch_row($result_drug_type)){	
															
																	if($Drug_Type_ID==$Drug_Type_ID2){	?>
                                                                        <option value="<? echo $Drug_Type_ID2; ?>" selected><? echo $Drug_Type_Name2; ?></option>
                                                            <?	}else{	?>
                                                            			<option value="<? echo $Drug_Type_ID2; ?>"><? echo $Drug_Type_Name2; ?></option>
                                                            <?	}	}	?>
                                                                    </select>
                                                                </div>
                                                                
                                                                <label><i class="fa fa-home"></i> จำนวน :</label>
                                                                <div class="form-group input-group">
                                                                    <span class="input-group-addon"><i class="fa fa-group"></i></span>
                                                                    <input type="text" class="form-control" name="d_unit" placeholder="<? echo $Drug_Unit; ?>" value="<? echo $Drug_Unit; ?>" required>
                                                                </div>
                                                                
                                                                <label><i class="fa fa-home"></i> ราคาต้นทุน :</label>
                                                                <div class="form-group input-group">
                                                                    <span class="input-group-addon"><i class="fa fa-plus"></i></span>
                                                                    <input type="text" class="form-control" name="d_cprice" placeholder="<? echo $Drug_Cost_Price; ?>" value="<? echo $Drug_Cost_Price; ?>" required>
                                                                </div>
                                                                
                                                                <label><i class="fa fa-home"></i> ราคาขาย :</label>
                                                                <div class="form-group input-group">
                                                                    <span class="input-group-addon"><i class="fa fa-plus"></i></span>
                                                                    <input type="text" class="form-control" name="d_price" placeholder="<? echo $Drug_Price; ?>" value="<? echo $Drug_Price; ?>" required>
                                                                </div>
                                                                
                                                                <div class="form-group">
                                                                <input type="hidden" class="form-control" name="d_id" placeholder="<? echo $Drug_IDDrug_ID; ?>" value="<? echo $Drug_ID; ?>" required>
                                                                    <button type="submit" class="btn btn-primary">เพิ่มยา</button>
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
            <!--<div class="col-lg-6">
                    <div class="panel panel-default panel-default">
                        <div class="panel-heading">
                        	<i class="fa fa-users fa-fw"></i>
                            ข้อมูลทันตแพทย์
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                
                                <div class="col-lg-12">
                                	<div class="well">
										
                                        <div class="fileinput fileinput-new" data-provides="fileinput">
                                            <div class="fileinput-new thumbnail" style="width: 50%; height: 50%;">
                                                <img src="image/profile.png" alt="" data-src="image/profile.png" class="img-thumbnail">
                                            </div>
                                            <div class="fileinput-preview fileinput-exists thumbnail col-lg-12" style="max-width: 100%; max-height: 400px;"></div>
                                            <div>
                                                <span class="btn btn-default btn-file"><span class="fileinput-new">เลือกรูปประจำตัว</span>
                                                <span class="fileinput-exists">เปลี่ยน</span><input type="file" name="u_photo"></span>
                                                <a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">ลบออก</a>
                                            </div>
                                        </div>

                                        <div class="fileinput fileinput-new" data-provides="fileinput">
                                            <div class="fileinput-new thumbnail" style="width: 50%; height: 50%;">
                                                <img src="image/file.png" alt="" data-src="image/file.png" class="img-thumbnail">
                                            </div>
                                            <div class="fileinput-preview fileinput-exists thumbnail col-lg-12" style="max-width: 100%; max-height: 400px;"></div>
                                            <div>
                                                <span class="btn btn-default btn-file"><span class="fileinput-new">ใบประกอบวิชาชีพ</span>
                                                <span class="fileinput-exists">เปลี่ยน</span><input type="file" name="u_prof_photo"></span>
                                                <a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">ลบออก</a>
                                            </div>
                                        </div>
                                        <!--
                                        <div class="form-group input-group">
                                            <span class="input-group-btn">
                                                <span class="btn btn-info btn-file">
                                                    เลือกหลายรูป <input type="file" name="u_prof_photo">
                                                    หลายรูป <input type="file" multiple name="u_photo">
                                                </span>
                                            </span>
                                            <input type="text" class="form-control" readonly>
                                        </div>
                                          -->  
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
            