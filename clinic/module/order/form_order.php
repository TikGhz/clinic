            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">จัดซื้อเวชภัณฑ์</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <!--start alert-->
            <div class="row">
            	<div class="col-lg-12">
                    <?	if($_SESSION[success]!=""){	?>
                    <div class="alert alert-success alert-dismissible" role="alert">
						<button type="button" class="close" data-dismiss="alert">
							<span aria-hidden="true">&times;</span><span class="sr-only">Close</span>
						</button>
						<strong>สำเร็จแล้ว!</strong> <? echo $_SESSION[success]; ?>
                    </div>
                    <?	$_SESSION[success]=""; }	?>
                    
                    <?	if($_SESSION[info]!=""){	?>
                    <div class="alert alert-info alert-dismissible" role="alert">
						<button type="button" class="close" data-dismiss="alert">
							<span aria-hidden="true">&times;</span><span class="sr-only">Close</span>
						</button>
						<strong>ประกาศ!</strong> <? echo $_SESSION[info]; ?>
                    </div>
                    <?	$_SESSION[info]=""; }	?>
                    
                    <?	if($_SESSION[warning]!=""){	?>
                    <div class="alert alert-warning alert-dismissible" role="alert">
						<button type="button" class="close" data-dismiss="alert">
							<span aria-hidden="true">&times;</span><span class="sr-only">Close</span>
						</button>
						<strong>แจ้งเตือน!</strong> <? echo $_SESSION[warning]; ?>
                    </div>
                    <?	$_SESSION[warning]=""; }	?>
                    
                    <?	if($_SESSION[danger]!=""){	?>
                    <div class="alert alert-danger alert-dismissible" role="alert">
						<button type="button" class="close" data-dismiss="alert">
							<span aria-hidden="true">&times;</span><span class="sr-only">Close</span>
						</button>
						<strong>เกิดข้อผิดพลาด!</strong> <? echo $_SESSION[danger]; ?>
                    </div>
					<?	$_SESSION[danger]=""; }	?>
			</div>
            </div>
            <!--end alert-->
            <div class="row">
			<form role="form" name="filter" method="get" enctype="multipart/form-data" data-toggle="validator">
                <div class="col-lg-6">
                    <div class="panel panel-default panel-info">
                        <div class="panel-heading">
                        	<i class="fa fa-users fa-fw"></i>
                            ข้อมูลเวชภัณฑ์
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                	<div class="well">
                                        <div class="form-group">
									<?	$result_drug=mysql_query("SELECT Drug_ID, Drug_Name FROM drug ORDER BY Drug_ID ASC") or die (mysql_error());
									?>
                                        	<label><i class="fa fa-home"></i> เลือกเวชภัณฑ์ :</label>
                                            <input type='hidden' name='module' value='order'>
											<input type='hidden' name='file' value='form_order'>
                                    		<select class="form-control" name="product" onChange="document.filter.submit();" required>
                                    			<option value="">เลือกประเภทเวชภัณฑ์</option>
									<?	$i=0;
											while(list($Drug_ID, $Drug_Name)=mysql_fetch_row($result_drug)){	$i++;
											if($_GET[product]==$i){
									?>
                                    			<option value="<? echo $Drug_ID; ?>" selected><? echo $Drug_Name; ?></option>
									<?	}else{	?>
                                    			<option value="<? echo $Drug_ID; ?>"><? echo $Drug_Name; ?></option>
									<?	}}	?>
                                    		</select>
                                    	</div>
                                        
                                        <div class="form-group">
											<a href="index_panel.php?module=drug&file=form_drug">
												<button type="button" class="btn btn-success">เพิ่มเวชภัณฑ์ใหม่</button>
											</a>
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
                </div>
                <!-- /.col-lg-6 -->
                
                <div class="col-lg-6">
                    <div class="panel panel-default panel-info">
                        <div class="panel-heading">
                        	<i class="fa fa-users fa-fw"></i>
                           ข้อมูลผู้จัดซื้อ
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                	<div class="well">
                                    	<div class="form-group">
                                        <?
											$sql_purchaser="SELECT Pur_ID, Pur_Business, Pur_Name, Pur_Lastname, Pur_Address, Pur_Tel, Pur_Email, Pur_Bankname, Pur_Account, Pur_Note FROM purchaser";
											$result_purchaser=mysql_query($sql_purchaser) or die (mysql_error());
										?>
                                        <label><i class="fa fa-home"></i> เลือกผู้จัดซื้อ :</label>
                                    		<select class="form-control" name="people" onChange="document.filter.submit();" required>
                                    			<option value="">เลือกผู้จัดซื้อ</option>
										<?	$i=0;
												while(list($Pur_ID, $Pur_Business, $Pur_Name, $Pur_Lastname, $Pur_Address, $Pur_Tel, $Pur_Email, $Pur_Bankname, $Pur_Account, $Pur_Note)=mysql_fetch_row($result_purchaser)){	$i++;
												if($_GET[people]==$i){
										?>
                                    			<option value="<? echo $Pur_ID; ?>" selected><? echo $Pur_Business; ?></option>
										<?	}else{	?>
                                       			<option value="<? echo $Pur_ID; ?>"><? echo $Pur_Business; ?></option>
										<?	}}	?>
                                    		</select>
                                    	</div>
                                        
                                        <div class="form-group">
											<a href="index_panel.php?module=drug&file=form_drug&purchaser=yes">
												<button type="button" class="btn btn-success">เพิ่มผู้จัดซื้อใหม่</button>
											</a>
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
                </div>
                <!-- /.col-lg-6 -->
			</form>
            </div>
            <!--End-->
            
            <div class="row">
			<form role="form" method="post" action="index_panel.php?module=order&file=insert_order" enctype="multipart/form-data" data-toggle="validator">
				<?	if($_GET[product]>0){?>
                <div class="col-lg-6">
                    <div class="panel panel-default panel-info">
                        <div class="panel-heading">
                        	<i class="fa fa-users fa-fw"></i>
                            เพิ่มข้อมูลเวชภัณฑ์
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                	<div class="well">
                                    	<?
										$result_drug=mysql_query("SELECT Drug_ID, Drug_Name, Drug_Detail, Drug_Type_ID, Drug_Unit, Drug_Cost_Price, Drug_Price, Pur_ID, User_ID, Drug_Date FROM drug WHERE Drug_ID='$_GET[product]' ") or die (mysql_error());
										list($Drug_ID, $Drug_Name, $Drug_Detail, $Drug_Type_ID, $Drug_Unit, $Drug_Cost_Price, $Drug_Price, $Pur_ID, $User_ID, $Drug_Date)=mysql_fetch_row($result_drug)
										?>
                                        <label><i class="fa fa-home"></i> ชื่อเวชภัณฑ์ :</label>
                                    	<div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-flag"></i></span>
                                            <input type="text" class="form-control" name="pu_name" placeholder="ชื่อเวชภัณฑ์" value="<? echo $Drug_Name;?>" readonly>
                                        </div>
                                        
                                    	<div class="form-group">
                                        <label><i class="fa fa-home"></i> รายละเอียดเวชภัณฑ์ :</label>
                                        <textarea class="form-control" rows="3" name="pu_detail" readonly><? echo $Drug_Detail;?></textarea>
                                        </div>
                                        
                                        <div class="form-group">
									<?	$sql_drug_type="SELECT Drug_Type_ID, Drug_Type_Name FROM drug_type ";
											$result_drug_type=mysql_query($sql_drug_type)or die (mysql_error());
									?><label><i class="fa fa-home"></i> ประเภทเวชภัณฑ์ :</label>
                                    		<select class="form-control" name="pu_type_id" readonly>
                                    			<option value="" disabled>เลือกประเภทเวชภัณฑ์</option>
									<?	while(list($Drug_Type_ID1, $Drug_Type_Name1)=mysql_fetch_row($result_drug_type)){	?>
                                    <?	if($Drug_Type_ID1==$Drug_Type_ID){	?>
                                    			<option value="<? echo $Drug_Type_ID1; ?>" selected><? echo $Drug_Type_Name1; ?></option>
                                    <?	}else{	?>
                                    			<option value="<? echo $Drug_Type_ID1; ?>" disabled><? echo $Drug_Type_Name1; ?></option>
									<?	}}	?>
                                    		</select>
                                    	</div>
										
                                        <label><i class="fa fa-home"></i> จำนวนเดิม : <? echo $Drug_Unit; ?> ขวด</label>
                                        <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-group"></i></span>
                                            <input type="text" class="form-control" name="pu_unit" placeholder="จำนวนเวชภัณฑ์ใหม่" value="" required>
                                        </div>
                                        
                                        <label><i class="fa fa-home"></i> ราคาต้นทุนเดิม : <? echo $Drug_Cost_Price; ?> บาท</label>
                                        <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-plus"></i></span>
                                            <input type="text" class="form-control" name="pu_cost_price" placeholder="ราคาต้นทุนใหม่" value="" required>
                                        </div>
                                        
                                        <label><i class="fa fa-home"></i> ราคาขายเดิม : <? echo $Drug_Price; ?> บาท</label>
                                        <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-plus"></i></span>
                                            <input type="text" class="form-control" name="pu_price" placeholder="ราคาขายใหม่" value="" required>
                                        </div>
                                        <?	if($_GET[people]>0){	?>
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary">เพิ่มเวชภัณฑ์</button>
                                            <button type="reset" class="btn btn-danger">รีเซ็ท</button>
                                        </div>
                                        <?	}	?>
									</div>
                                </div>
                                <!-- /.col-lg-6 (nested) -->
                            </div>
                            <!-- /.row (nested) -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <?	}	?>
                <!-- /.col-lg-6 -->
                
                <?	if($_GET[people]>0){?>
                <div class="col-lg-6">
                	<!--alert-->
                    <div class="panel panel-default panel-info">
                        <div class="panel-heading">
                        	<i class="fa fa-users fa-fw"></i>
                            เพิ่มผู้จัดซื้อใหม่
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                	<div class="well">
                                    	<?
										$result_purchaser=mysql_query("SELECT Pur_ID, Pur_Business, Pur_Name, Pur_Lastname, Pur_Address, Pur_Tel, Pur_Email, Pur_Bankname, Pur_Account, Pur_Note FROM purchaser WHERE Pur_ID='$_GET[people]' ") or die (mysql_error());
										list($Pur_ID, $Pur_Business, $Pur_Name, $Pur_Lastname, $Pur_Address, $Pur_Tel, $Pur_Email, $Pur_Bankname, $Pur_Account, $Pur_Note)=mysql_fetch_row($result_purchaser);
										?>
                                        
                                    	<div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-flag"></i></span>
                                            <input type="text" class="form-control" name="pu_business" placeholder="ชื่อบริษัท" value="<? echo $Pur_Business; ?>" readonly>
                                        </div>
                                        
                                        <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-location-arrow"></i></span>
                                            <input type="text" class="form-control" name="pu_name" placeholder="ชื่อจริง" value="<? echo $Pur_Name; ?>" readonly>
                                        </div>
                                        
                                        <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-location-arrow"></i></span>
                                            <input type="text" class="form-control" name="pu_lastname" placeholder="นามสกุล" value="<? echo $Pur_Lastname; ?>" readonly>
                                        </div>
                                        
                                        <div class="form-group">
                                        <label><i class="fa fa-home"></i> ที่อยู่ปัจจุบัน :</label>
                                        <textarea class="form-control" rows="3" name="pu_address" readonly><? echo $Pur_Address; ?></textarea>
                                        </div>
                                        
                                        <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-mobile"></i></span>
                                            <input type="text" class="form-control" name="pu_tel" placeholder="เบอร์มือถือ" value="<? echo $Pur_Tel; ?>" readonly>
                                        </div>
                                        
                                        <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                                            <input type="email" class="form-control" name="pu_email" placeholder="อีเมล์" value="<? echo $Pur_Email; ?>" readonly>
                                        </div>
                                        
                                        <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-btc"></i></span>
                                            <input type="text" class="form-control" name="pu_bankname" placeholder="ธนาคาร" value="<? echo $Pur_Bankname; ?>" readonly>
                                        </div>
                                        
                                        <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-btc"></i></span>
                                            <input type="text" class="form-control" name="pu_account" placeholder="หมายเลขบัญชี" value="<? echo $Pur_Account; ?>" readonly>
                                        </div>
                                        
                                        <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-btc"></i></span>
                                            <input type="text" class="form-control" name="pu_note" placeholder="หมายเหตุ" value="<? echo $Pur_Note; ?>" readonly>
                                        </div>
                                        <input type="hidden" class="form-control" name="drug_id" value="<? echo $Drug_ID; ?>">
                                        <input type="hidden" class="form-control" name="pur_id" value="<? echo $Pur_ID; ?>">
									</div>
                                </div>
                                <!-- /.col-lg-6 (nested) -->
                            </div>
                            <!-- /.row (nested) -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <?	}	?>
                <!-- /.col-lg-6 -->
			</form>
            
            </div>