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
                            <i class="fa fa-bell fa-fw"></i> แจ้งเตือน
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="list-group">
                                <a href="#" class="list-group-item">
                                    <i class="fa fa-comment fa-fw"></i> New Comment
                                    <span class="pull-right text-muted small"><em>4 minutes ago</em>
                                    </span>
                                </a>
                                <a href="#" class="list-group-item">
                                    <i class="fa fa-twitter fa-fw"></i> 3 New Followers
                                    <span class="pull-right text-muted small"><em>12 minutes ago</em>
                                    </span>
                                </a>
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
                            </div>
                            <!-- /.list-group -->
                            <a href="#" class="btn btn-default btn-block">ดูทั้งหมด</a>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                    
                    <!--<div class="chat-panel panel panel-default panel-info">
                        <div class="panel-heading">
                            <i class="fa fa-comments fa-fw"></i>
                            ห้องสนทนา
                            <div class="btn-group pull-right">
                                <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
                                    <i class="fa fa-chevron-down"></i>
                                </button>
                                <ul class="dropdown-menu slidedown">
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-refresh fa-fw"></i> Refresh
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-check-circle fa-fw"></i> Available
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-times fa-fw"></i> Busy
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-clock-o fa-fw"></i> Away
                                        </a>
                                    </li>
                                    <li class="divider"></li>
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-sign-out fa-fw"></i> Sign Out
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="panel-body">
                            <ul class="chat">
                                <li class="left clearfix">
                                    <span class="chat-img pull-left">
                                        <img src="http://placehold.it/50/55C1E7/fff" alt="User Avatar" class="img-circle" />
                                    </span>
                                    <div class="chat-body clearfix">
                                        <div class="header">
                                            <strong class="primary-font">คุณหมอแนน</strong> 
                                            <small class="pull-right text-muted">
                                                <i class="fa fa-clock-o fa-fw"></i> 12 นาทีที่แล้ว
                                            </small>
                                        </div>
                                        <p>
                                            วันนี้คนไข้มากันเยอะจริง ๆ ไม่ได้พักได้ผ่อนบ้างเลย.
                                        </p>
                                    </div>
                                </li>
                                <li class="right clearfix">
                                    <span class="chat-img pull-right">
                                        <img src="http://placehold.it/50/FA6F57/fff" alt="User Avatar" class="img-circle" />
                                    </span>
                                    <div class="chat-body clearfix">
                                        <div class="header">
                                            <small class=" text-muted">
                                                <i class="fa fa-clock-o fa-fw"></i> 13 นาทีที่แล้ว</small>
                                            <strong class="pull-right primary-font">พนง.แอม</strong>
                                        </div>
                                        <p>
                                            สวัสดีตอนเช้าค่ะ ทุกคน มาทำงานกันเช้าเลยนะคะ.
                                        </p>
                                    </div>
                                </li>
                                <li class="left clearfix">
                                    <span class="chat-img pull-left">
                                        <img src="http://placehold.it/50/55C1E7/fff" alt="User Avatar" class="img-circle" />
                                    </span>
                                    <div class="chat-body clearfix">
                                        <div class="header">
                                            <strong class="primary-font">ผู้จัดการ</strong> 
                                            <small class="pull-right text-muted">
                                                <i class="fa fa-clock-o fa-fw"></i> 14 นาทีที่แล้ว</small>
                                        </div>
                                        <p>
                                            ขอรายงานสรุปประจำเดือนนี้ด้วยนะคะ
                                        </p>
                                    </div>
                                </li>
                                <li class="right clearfix">
                                    <span class="chat-img pull-right">
                                        <img src="http://placehold.it/50/FA6F57/fff" alt="User Avatar" class="img-circle" />
                                    </span>
                                    <div class="chat-body clearfix">
                                        <div class="header">
                                            <small class=" text-muted">
                                                <i class="fa fa-clock-o fa-fw"></i> 15 นาทีที่แล้ว</small>
                                            <strong class="pull-right primary-font">ผู้ดูแลระบบ</strong>
                                        </div>
                                        <p>
                                            กำลังอัพเดทระบบ.
                                        </p>
                                    </div>
                                </li>
                                <li class="left clearfix">
                                    <span class="chat-img pull-left">
                                        <img src="http://placehold.it/50/55C1E7/fff" alt="User Avatar" class="img-circle" />
                                    </span>
                                    <div class="chat-body clearfix">
                                        <div class="header">
                                            <strong class="primary-font">ทดลอง</strong> 
                                            <small class="pull-right text-muted">
                                                <i class="fa fa-clock-o fa-fw"></i> 45 นาทีที่แล้ว</small>
                                        </div>
                                        <p>
                                            ทดลองทดลองทดลอง
                                        </p>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="panel-footer">
                            <div class="input-group">
                                <input id="btn-input" type="text" class="form-control input-sm" placeholder="Type your message here..." />
                                <span class="input-group-btn">
                                    <button class="btn btn-info btn-sm" id="btn-chat">
                                        Send
                                    </button>
                                </span>
                            </div>
                        </div>
                    </div>-->
                    <!-- /.panel .chat-panel -->
                </div>
                <!-- /.col-lg-4 -->
            </div>
            <!-- /.row -->