			<script src="js/plugins/morris/morris-data.js"></script>
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">รายงานข้อมูลคลินิก</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa  fa-user-md fa-5x"></i>
                                </div>
                                <?
								$result_pat=mysql_query("SELECT count(Pat_ID) FROM patient");
								list($count_pid)=mysql_fetch_row($result_pat);
								?>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><? echo $count_pid; ?></div>
                                    <div>ผู้ป่วยทั้งหมด!</div>
                                </div>
                            </div>
                        </div>
                        <a href="index_panel.php?module=patient&file=main_patient">
                            <div class="panel-footer">
                                <span class="pull-left">ดูรายละเอียด</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-tasks fa-5x"></i>
                                </div>
                                <?
								$result_drug=mysql_query("SELECT count(Drug_ID) FROM drug");
								list($count_did)=mysql_fetch_row($result_drug);
								?>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><? echo $count_did; ?></div>
                                    <div>เวชภัณฑ์ทั้งหมด!</div>
                                </div>
                            </div>
                        </div>
                        <a href="index_panel.php?module=drug&file=main_drug">
                            <div class="panel-footer">
                                <span class="pull-left">ดูรายละเอียด</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-yellow">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-shopping-cart fa-5x"></i>
                                </div>
                                <?
								$result_purchaser_detail=mysql_query("SELECT count(Purd_ID) FROM purchaser_detail");
								list($count_pdid)=mysql_fetch_row($result_purchaser_detail);
								?>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><? echo $count_pdid; ?></div>
                                    <div>การสั่งซื้อทั้งหมด!</div>
                                </div>
                            </div>
                        </div>
                        <a href="index_panel.php?module=order&file=main_order">
                            <div class="panel-footer">
                                <span class="pull-left">ดูรายละเอียด</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-red">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-history fa-5x"></i>
                                </div>
                                <?
								$result_appointment=mysql_query("SELECT count(App_ID) FROM appointment");
								list($count_aid)=mysql_fetch_row($result_appointment);
								?>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><? echo $count_aid; ?></div>
                                    <div>ใบนัดหมายทั้งหมด่!</div>
                                </div>
                            </div>
                        </div>
                        <a href="index_panel.php?module=appoint&file=main_appoint">
                            <div class="panel-footer">
                                <span class="pull-left">ดูรายละเอียด</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-8">
                    <div class="panel panel-default panel-red">
                        <div class="panel-heading">
                        	<i class="fa fa-warning fa-fw"></i>
                            รายการที่ใกล้จะหมด
                            <div style="float:right;">
                            <a href="index_panel.php?num=all" style="color:#FFF">จำนวน </a>
                            <a href="index_panel.php?expire=all" style="color:#FFF">หมดอายุ </a>
                            <a href="index_panel.php?all" style="color:#FFF">ทั้งหมด</a>
                            </div>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                            	<!--<table class="table table-striped table-bordered table-hover" id="dataTables-example">-->
                                <table class="table table-striped table-hover">
                                    <thead>
                                        <tr style="background-color:#CCC; color:#333;">
                                            <th>#</th>
                                            <th>รายการ</th>
                                            <th>จำนวน</th>
                                            <th>หมายเหตุ</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                            <?
							if($_GET[num]=="all"){
								$result_drug1=mysql_query("SELECT Drug_ID, Drug_Name, Drug_Detail, Drug_Type_ID, Drug_Unit, Drug_Cost_Price, Drug_Price, Pur_ID, User_ID, Drug_Date FROM drug WHERE Drug_Unit<=10 ");
								while(list($Drug_ID, $Drug_Name, $Drug_Detail, $Drug_Type_ID, $Drug_Unit, $Drug_Cost_Price, $Drug_Price, $Pur_ID, $User_ID, $Drug_Date)=mysql_fetch_row($result_drug1)){
							?>
                                        <tr class="odd gradeX">
                                            <td class="center"><a href=""><span class="text-red"><? echo $Drug_ID; ?></span></a></td>
                                            <td><a href=""><span class="text-red"><? echo $Drug_Name; ?></span></a></td>
                                            <td><a href=""><span class="text-red"><? echo $Drug_Unit; ?></span></a></td>
                                            <td><a href=""><i class="fa fa-warning fa-fw text-red"></i><span class="text-red"> จำนวนใกล้จะหมดแล้ว</span></a></td>
                                        </tr>
						<?
								}
							}
							elseif($_GET[expire]==all){
								$result_drug2=mysql_query("SELECT Drug_ID, Drug_Name, Drug_Detail, Drug_Type_ID, Drug_Unit, Drug_Cost_Price, Drug_Price, Pur_ID, User_ID, Drug_Date FROM drug");
								$add_time=date("Y-m-d H:i:s");	
								list($add_time1,$add_time2)=explode(" ","$add_time");
								list($year,$month,$day)=explode("-","$add_time1");
								list($hour,$minute,$second)=explode(":","$add_time2");
								while(list($Drug_ID, $Drug_Name, $Drug_Detail, $Drug_Type_ID, $Drug_Unit, $Drug_Cost_Price, $Drug_Price, $Pur_ID, $User_ID, $Drug_Date)=mysql_fetch_row($result_drug2)){
									$tdate=compareDate("$add_time1","$Drug_Date");
									if($tdate>=0){ 
						?>
                                    	<tr class="odd gradeX">
                                            <td class="center"><a href=""><span class="text-red"><? echo $Drug_ID; ?></span></a></td>
                                            <td><a href=""><span class="text-red"><? echo $Drug_Detail; ?></span></a></td>
                                            <td><a href=""><span class="text-red"><? echo $Drug_Unit; ?></span></a></td>
                                            <td><a href=""><i class="fa fa-warning fa-fw text-red"></i><span class="text-red"> หมดอายุแล้ว</span></a></td>
                                        </tr>
						<?		}elseif($tdate<=-604800){
						?>
                                    	<tr class="odd gradeX">
                                            <td class="center"><a href=""><span class="text-red"><? echo $Drug_ID; ?></span></a></td>
                                            <td><a href=""><span class="text-red"><? echo $Drug_Detail; ?></span></a></td>
                                            <td><a href=""><span class="text-red"><? echo $Drug_Unit; ?></span></a></td>
                                            <td><a href=""><i class="fa fa-warning fa-fw text-red"></i><span class="text-red"> จะหมดอายุภายใน 7 วัน</span></a></td>
                                        </tr>
							<?
									}
								}
							}else{
								$result_drug2=mysql_query("SELECT Drug_ID, Drug_Name, Drug_Detail, Drug_Type_ID, Drug_Unit, Drug_Cost_Price, Drug_Price, Pur_ID, User_ID, Drug_Date FROM drug");
								$add_time=date("Y-m-d H:i:s");	
								list($add_time1,$add_time2)=explode(" ","$add_time");
								while(list($Drug_ID, $Drug_Name, $Drug_Detail, $Drug_Type_ID, $Drug_Unit, $Drug_Cost_Price, $Drug_Price, $Pur_ID, $User_ID, $Drug_Date)=mysql_fetch_row($result_drug2)){
									$tdate=compareDate("$add_time1","$Drug_Date");
									if($tdate>=0){ 
						?>
                                    	<tr class="odd gradeX">
                                            <td class="center"><a href=""><span class="text-red"><? echo $Drug_ID; ?></span></a></td>
                                            <td><a href=""><span class="text-red"><? echo $Drug_Detail; ?></span></a></td>
                                            <td><a href=""><span class="text-red"><? echo $Drug_Unit; ?></span></a></td>
                                            <td><a href=""><i class="fa fa-warning fa-fw text-red"></i><span class="text-red"> หมดอายุแล้วเมื่อ <? echo $Drug_Date; ?></span></a></td>
                                        </tr>
						<?		}
									if($tdate<=-604800){
						?>
                                    	<tr class="odd gradeX">
                                            <td class="center"><a href=""><span class="text-red"><? echo $Drug_ID; ?></span></a></td>
                                            <td><a href=""><span class="text-red"><? echo $Drug_Detail; ?></span></a></td>
                                            <td><a href=""><span class="text-red"><? echo $Drug_Unit; ?></span></a></td>
                                            <td><a href=""><i class="fa fa-warning fa-fw text-red"></i><span class="text-red"> จะหมดอายุภายใน 7 วัน</span></a></td>
                                        </tr>
							<?	}	
                            		if($Drug_Unit<10){ ?>
                                    	<tr class="odd gradeX">
                                            <td class="center"><a href=""><span class="text-red"><? echo $Drug_ID; ?></span></a></td>
                                            <td><a href=""><span class="text-red"><? echo $Drug_Name; ?></span></a></td>
                                            <td><a href=""><span class="text-red"><? echo $Drug_Unit; ?></span></a></td>
                                            <td><a href=""><i class="fa fa-warning fa-fw text-red"></i><span class="text-red"> จำนวนใกล้จะหมดแล้ว</span></a></td>
                                        </tr>
                            <?	}
								}
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
                <!-- /.col-lg-8 -->
                <div class="col-lg-4">
                    <div class="panel panel-default panel-warning">
                        <div class="panel-heading">
                            <i class="fa fa-bell fa-fw"></i> รายการนัดวันนี้
                        </div>
                        <!-- /.panel-heading -->
                        <?
						
						$sql_appoint="SELECT * FROM appointment";
						$result_appoint=mysql_query($sql_appoint) or die (mysql_error());
						
						?>
                        <div class="panel-body">
                            <div class="list-group">
                            
                            <? 
							$i=0;
							while(list($App_ID, $User_ID, $Pat_ID, $App_Detail, $App_Time, $App_Status, $App_Date)=mysql_fetch_row($result_appoint)){	
									$add_time=date("Y-m-d H:i:s");	
									list($add_time1,$add_time2)=explode(" ","$add_time");
									$adate=compareDate("$add_time1","$App_Time");
								if($adate==0){
								$i++;
							?>
                                <a href="#" class="list-group-item">
                                    <i class="fa fa-comment fa-fw"></i> <? echo $App_Detail;?>
                                    <span class="pull-right text-muted small"><em><? echo $i;?></em>
                                    </span>
                                </a>
                            <?	}	?>
					<?	}	?>
<!--                            <?	if($adate==-86400){	?>
								<a href="#" class="list-group-item">
                                    <i class="fa fa-twitter fa-fw"></i> <? echo $App_Detail;?>
                                    <span class="pull-right text-muted small"><em><? echo $adate;?></em>
                                    </span>
                                </a>
                            <?	}	?>
                                <a href="#" class="list-group-item">
                                    <i class="fa fa-envelope fa-fw"></i> Message Sent
                                    <span class="pull-right text-muted small"><em>27 minutes ago</em>
                                    </span>
                                </a>
                                <a href="#" class="list-group-item">
                                    <i class="fa fa-tasks fa-fw"></i> New Task
                                    <span class="pull-right text-muted small"><em>43 minutes ago</em>
                                    </span>
                                </a>
                                <a href="#" class="list-group-item">
                                    <i class="fa fa-upload fa-fw"></i> Server Rebooted
                                    <span class="pull-right text-muted small"><em>11:32 AM</em>
                                    </span>
                                </a>
                                <a href="#" class="list-group-item">
                                    <i class="fa fa-bolt fa-fw"></i> Server Crashed!
                                    <span class="pull-right text-muted small"><em>11:13 AM</em>
                                    </span>
                                </a>
                                <a href="#" class="list-group-item">
                                    <i class="fa fa-warning fa-fw"></i> Server Not Responding
                                    <span class="pull-right text-muted small"><em>10:57 AM</em>
                                    </span>
                                </a>
                                <a href="#" class="list-group-item">
                                    <i class="fa fa-shopping-cart fa-fw"></i> New Order Placed
                                    <span class="pull-right text-muted small"><em>9:49 AM</em>
                                    </span>
                                </a>
                                <a href="#" class="list-group-item">
                                    <i class="fa fa-money fa-fw"></i> Payment Received
                                    <span class="pull-right text-muted small"><em>Yesterday</em>
                                    </span>
                                </a>
-->                            </div>
                            <!-- /.list-group -->
                            <a href="#" class="btn btn-default btn-block">ดูทั้งหมด</a>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                    
                    <div class="panel panel-default panel-warning">
                        <div class="panel-heading">
                            <i class="fa fa-bell fa-fw"></i> รายการนัดวันพรุ่งนี้
                        </div>
                        <!-- /.panel-heading -->
                        <?
						
						$sql_appoint="SELECT * FROM appointment";
						$result_appoint=mysql_query($sql_appoint) or die (mysql_error());
						
						?>
                        <div class="panel-body">
                            <div class="list-group">
                            
                            <? 
							$i=0;
							while(list($App_ID, $User_ID, $Pat_ID, $App_Detail, $App_Time, $App_Status, $App_Date)=mysql_fetch_row($result_appoint)){	
									$add_time=date("Y-m-d H:i:s");	
									list($add_time1,$add_time2)=explode(" ","$add_time");
									$adate=compareDate("$add_time1","$App_Time");
								if($adate==-86400){
								$i++;
							?>
								<a href="#" class="list-group-item">
                                    <i class="fa fa-twitter fa-fw"></i> <? echo $App_Detail;?>
                                    <span class="pull-right text-muted small"><em><? echo $i;?></em>
                                    </span>
                                </a>
                            <?	}	?>
					<?	}	?>
                           </div>
                            <!-- /.list-group -->
                            <a href="#" class="btn btn-default btn-block">ดูทั้งหมด</a>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-4 -->
            </div>
            <!-- /.row -->