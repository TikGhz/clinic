            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">คลังเวชภัณฑ์</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
<?	if($_GET[purchaser]=="yes"){	?>
			<form role="form" method="post" action="index_panel.php?module=drug&file=insert_drug&purchaser=yes" enctype="multipart/form-data" data-toggle="validator">
<?	}else{	?>
			<form role="form" method="post" action="index_panel.php?module=drug&file=insert_drug" enctype="multipart/form-data" data-toggle="validator">
<?	}	?>
                <div class="col-lg-6">
                	<!--alert-->
                    <div>
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
                    
                    <div class="panel panel-default panel-info">
                        <div class="panel-heading">
                        	<i class="fa fa-users fa-fw"></i>
                            เพิ่มข้อมูลเวชภัณฑ์
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                	<div class="well">
                                    
                                    	<div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-flag"></i></span>
                                            <input type="text" class="form-control" name="d_name" placeholder="ชื่อยา" data-minlength="4"  required>
                                        </div>
                                        
                                    	<div class="form-group">
                                        <label><i class="fa fa-home"></i> รายละเอียดเวชภัณฑ์ :</label>
                                        <textarea class="form-control" rows="3" name="d_detail" required></textarea>
                                        </div>
                                        
                                        <div class="form-group">
									<?	$sql_drug_type="SELECT Drug_Type_ID, Drug_Type_Name FROM drug_type ";
											$result_drug_type=mysql_query($sql_drug_type)or die (mysql_error());
									?>
                                    		<select class="form-control" name="d_type_id" required>
                                    			<option value="">เลือกประเภทเวชภัณฑ์</option>
									<?	while(list($Drug_Type_ID, $Drug_Type_Name)=mysql_fetch_row($result_drug_type)){	?>
                                    			<option value="<? echo $Drug_Type_ID; ?>"><? echo $Drug_Type_Name; ?></option>
									<?	}	?>
                                    		</select>
                                    	</div>
									
                                        <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-group"></i></span>
                                            <input type="text" class="form-control" name="d_unit" placeholder="จำนวนเวชภัณฑ์ทั้งหมด" required>
                                        </div>
                                        
                                        <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-plus"></i></span>
                                            <input type="text" class="form-control" name="d_cost_price" placeholder="ราคาต้นทุน ต่อเม็ด , ต่อชิ้น , ต่อขวด" required>
                                        </div>
                                        
                                        <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-plus"></i></span>
                                            <input type="text" class="form-control" name="d_price" placeholder="ราคาขาย ต่อเม็ด , ต่อชิ้น , ต่อขวด" required>
                                        </div>
                                        
                                        <?	if($_GET[purchaser]=="yes"){?>
                                        <div class="form-group">
                                    		<select class="form-control" name="pu_new" disabled>
                                    			<option value="" selected>เพิ่มผู้จัดซื้อใหม่</option>
                                    		</select>
                                    	</div>
                                        <?	}else{	
											$sql_purchaser="SELECT Pur_ID, Pur_Business, Pur_Name, Pur_Lastname, Pur_Address, Pur_Tel, Pur_Email, Pur_Bankname, Pur_Account, Pur_Note FROM purchaser";
											$result_purchaser=mysql_query($sql_purchaser) or die (mysql_error());
										?>
                                        <div class="form-group">
                                    		<select class="form-control" name="pu_id" required>
                                    			<option value="">เลือกผู้จัดซื้อ</option>
										<?	while(list($Pur_ID, $Pur_Business, $Pur_Name, $Pur_Lastname, $Pur_Address, $Pur_Tel, $Pur_Email, $Pur_Bankname, $Pur_Account, $Pur_Note)=mysql_fetch_row($result_purchaser)){	?>
                                    			<option value="<? echo $Pur_ID; ?>"><? echo $Pur_Business; ?></option>
										<?	}	?>
                                    		</select>
                                    	</div>
                                        <?	}	?>
                                        
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary">เพิ่มเวชภัณฑ์</button>
                                            <?	if($_GET[purchaser]=="yes"){	?>
                                                        <a href="index_panel.php?module=drug&file=form_drug">
                                                            <button type="button" class="btn btn-warning">ยกเลิก</button>
                                                        </a>
                                            <?	}else{	?>
                                                        <a href="index_panel.php?module=drug&file=form_drug&purchaser=yes">
                                                            <button type="button" class="btn btn-primary">เพิ่มผู้จัดซื้อ</button>
                                                        </a>
                                            <?	}	?>
                                            <button type="reset" class="btn btn-danger">รีเซ็ท</button>
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
                <?	if($_GET[purchaser]=="yes"){?>
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
                                    	<div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-flag"></i></span>
                                            <input type="text" class="form-control" name="pu_business" placeholder="ชื่อบริษัท" required>
                                        </div>
                                        
                                        <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-location-arrow"></i></span>
                                            <input type="text" class="form-control" name="pu_name" placeholder="ชื่อจริง" required>
                                        </div>
                                        
                                        <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-location-arrow"></i></span>
                                            <input type="text" class="form-control" name="pu_lastname" placeholder="นามสกุล" required>
                                        </div>
                                        
                                        <div class="form-group">
                                        <label><i class="fa fa-home"></i> ที่อยู่ปัจจุบัน :</label>
                                        <textarea class="form-control" rows="3" name="pu_address" required></textarea>
                                        </div>
                                        
                                        <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-mobile"></i></span>
                                            <input type="text" class="form-control" name="pu_tel" placeholder="เบอร์มือถือ" required>
                                        </div>
                                        
                                        <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                                            <input type="email" class="form-control" name="pu_email" placeholder="อีเมล์" required>
                                        </div>
                                        
                                        <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-btc"></i></span>
                                            <input type="text" class="form-control" name="pu_bankname" placeholder="ธนาคาร" required>
                                        </div>
                                        
                                        <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-btc"></i></span>
                                            <input type="text" class="form-control" name="pu_account" placeholder="หมายเลขบัญชี" required>
                                        </div>
                                        
                                        <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-btc"></i></span>
                                            <input type="text" class="form-control" name="pu_note" placeholder="หมายเหตุ" required>
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
                <?	}else{	?>
				<div class="col-lg-6 visible-print-block">
                	<!--alert-->
                    <div>
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
                    <div class="panel panel-default panel-info">
                        <div class="panel-heading">
                        	<i class="fa fa-users fa-fw"></i>
                            ผู้จัดซื้อ
                        </div>
                        <div class="panel-body">
                            <div class="row">

                                <div class="col-lg-12">
                                	<div class="well">
                                    	<div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-flag"></i></span>
                                            <input type="text" class="form-control" name="" placeholder="ชื่อบริษัท" disabled>
                                        </div>
                                        
                                        <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-location-arrow"></i></span>
                                            <input type="text" class="form-control" name="" placeholder="ชื่อจริง" disabled>
                                        </div>
                                        
                                        <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-location-arrow"></i></span>
                                            <input type="text" class="form-control" name="" placeholder="นามสกุล" disabled>
                                        </div>
                                        
                                        <div class="form-group">
                                        <label><i class="fa fa-home"></i> ที่อยู่ปัจจุบัน :</label>
                                        <textarea class="form-control" rows="3" name="" disabled></textarea>
                                        </div>
                                        
                                        <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-mobile"></i></span>
                                            <input type="text" class="form-control" name="" placeholder="เบอร์มือถือ" disabled>
                                        </div>
                                        
                                        <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                                            <input type="email" class="form-control" name="" placeholder="อีเมล์" disabled>
                                        </div>
                                        
                                        <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-btc"></i></span>
                                            <input type="text" class="form-control" name="" placeholder="ธนาคาร" disabled>
                                        </div>
                                        
                                        <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-btc"></i></span>
                                            <input type="text" class="form-control" name="" placeholder="หมายเลขบัญชี" disabled>
                                        </div>
                                        
                                        <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-btc"></i></span>
                                            <input type="text" class="form-control" name="" placeholder="หมายเหตุ" disabled>
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
                </div> <!-- ปิด-->
				<?	}	?>
                <!-- /.col-lg-6 -->
			</form>
            
            </div>