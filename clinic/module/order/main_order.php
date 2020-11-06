            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">จัดซื้อเวชภัณฑ์ <a href="index_panel.php?module=order&file=form_order"><button type="button" class="btn btn-primary">เพิ่มรายการจัดซื้อ</button></a></h1>
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
                <div class="col-lg-12">
                	<!--Function Alert-->
                    <?	echo gatAlert(); ?>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                        	<i class="fa fa-users fa-fw"></i>
                            รายการจัดซื้อเวชภัณฑ์
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                            <?
								$result_purchaser_detail=mysql_query("SELECT Purd_ID, Pur_ID, Drug_ID, Purd_Unit, Purd_Cost_Price, Purd_Price, Purd_Status, User_ID FROM purchaser_detail ORDER BY Purd_ID ASC");
							?>
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>รหัส</th>
                                            <th>ผู้จัดซื้อ</th>
                                            <th>เวชภัณฑ์</th>
                                            <th>จำนวน</th>
                                            <th>ราคาต้นทุน</th>
                                            <th>ราคาขาย</th>
                                            <th>สถานะ</th>
                                            <th>ดำเนินการ</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                            <?
								while(list($Purd_ID, $Pur_ID, $Drug_ID, $Purd_Unit, $Purd_Cost_Price, $Purd_Price, $Purd_Status, $User_ID)=mysql_fetch_row($result_purchaser_detail)){
									$result_purchaser=mysql_query("SELECT Pur_Business FROM purchaser WHERE Pur_ID='$Pur_ID' ") or die (mysql_error());
									list($Pur_Business)=mysql_fetch_row($result_purchaser);
										
									$result_drug=mysql_query("SELECT Drug_Name FROM drug WHERE Drug_ID='$Drug_ID' ") or die (mysql_error());
									list($Drug_Name)=mysql_fetch_row($result_drug)
							?>
                                        <tr class="odd gradeX">
                                            <td class="center"><? echo $Purd_ID; ?></td>
                                            <td><? echo $Pur_Business; ?></td>
                                            <td><? echo $Drug_Name; ?></td>
                                            <td><? echo $Purd_Unit ?></td>
                                            <td><? echo $Purd_Cost_Price; ?></td>
                                            <td><? echo number_format($Purd_Unit*$Purd_Cost_Price, 2, '.', ''); ?></td>
                                            <td><? echo $Purd_Status; ?></td>
                                            <td>
                                            <? 	if($Purd_Status=="รับทั้งหมดแล้ว"){?>
                                            <button type="button" class="btn btn-primary"><i class="fa fa-pencil-square-o fa-fw"></i> สมบูรณ์</button>
                                            <?	}else{	?>
                                            <a href="index_panel.php?module=order&file=edit_order&puid=<? echo $Purd_ID; ?>">
                                            	<button type="button" class="btn btn-success"><i class="fa fa-pencil-square-o fa-fw"></i> แก้ไข</button>
                                            </a>
                                            <?	}	?>
                                            </td>
                                        </tr>
							<?
								}
							?>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>