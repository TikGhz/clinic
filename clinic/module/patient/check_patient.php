<?
	$sql_room="SELECT Room_ID, Room_Name, Room_Status, User_ID FROM room WHERE User_ID='$_SESSION[login_id]' ";
	$result_room=mysql_query($sql_room);
	list($Room_ID, $Room_Name, $Room_Status, $User_ID)=mysql_fetch_row($result_room);
	
	if($User_ID==$_SESSION[login_id]){ $room=$Room_ID; }else{ $room=""; }

		if($room!=""){
?>
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">รักษาผู้ป่วย - <? echo $Room_Name; ?> 
                    <form role="form" method="post" action="index_panel.php?module=room&file=update_room&ut=doctor&us=doctor" enctype="multipart/form-data" style="display: inline-block;">
                    <input type="hidden" class="form-control" name="rid" value="<? echo $Room_ID; ?>">
                    <input type="hidden" class="form-control" name="r_status" value="ว่าง">
					<button type="submit" class="btn btn-danger">ออกจากห้อง</button>
                    </form></h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <div class="row">
                <div class="col-lg-12">
                	<!--Function Alert-->
                    <?	echo gatAlert(); ?>
                	<div class="panel panel-default">
                        <div class="panel-heading">
                        	<i class="fa fa-users fa-fw"></i>
                            ข้อมูลผู้ป่วย
                        </div>
                    	<div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th class="text-center">คิว</th>
                                            <th class="text-center">รหัสประจำตัว</th>
                                            <th class="text-center">ชื่อสกุล</th>
                                            <th class="text-center">อายุ</th>
                                            <th class="text-center">กรุ๊ปเลือด</th>
                                            <th class="text-center">ดำเนินการ</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?
										$n=0;
                                        $result_queue=mysql_query("SELECT Que_ID, Pat_ID, Room_ID FROM queue WHERE Room_ID='$room' ");
                                        while(list($Que_ID, $Pat_ID ,$Room_ID)=mysql_fetch_row($result_queue)){
										$n++;
										$result_user=mysql_query("SELECT User_Title, User_Name, User_Lastname FROM user WHERE User_ID='$User_ID' ");
                                        list($User_Title, $User_Name, $User_Lastname)=mysql_fetch_row($result_user);
										
										$result_patient=mysql_query("SELECT Pat_ID, Pat_ID_Card, Pat_Gender, Pat_Title, Pat_Name, Pat_Lastname, Pat_Birthday, Pat_Religion, Pat_Blood, Pat_Address, Pat_Tel, Pat_Career, Pat_Total_Cost, Pat_Date FROM patient WHERE Pat_ID='$Pat_ID' ");
		list($Pat_ID, $Pat_ID_Card, $Pat_Gender, $Pat_Title, $Pat_Name, $Pat_Lastname, $Pat_Birthday, $Pat_Religion, $Pat_Blood, $Pat_Address, $Pat_Tel, $Pat_Career, $Pat_Total_Cost, $Pat_Date)=mysql_fetch_row($result_patient);
                                    ?>
                                        <tr class="odd gradeX">
                                            <td class="text-center"><? echo $n; ?></td>
                                            <td><? echo $Pat_ID_Card; ?></td>
                                            <td><? echo $Pat_Title,"",$Pat_Name," ",$Pat_Lastname; ?></td>
                                            <td><? echo getAge($Pat_Birthday); ?></td>
                                            <td><? echo $Pat_Blood; ?></td>
                                            <td>
                                            <form role="form" method="post" action="index_panel.php?module=treat&file=main_treat" enctype="multipart/form-data">
                                            	<input type="hidden" name="qid" value="<? echo $Que_ID; ?>">
												<input type="hidden" name="pid" value="<? echo $Pat_ID; ?>">
                                                <input type="hidden" name="rid" value="<? echo $Room_ID; ?>">
												<button type="submit" class="btn btn-info">รักษา</button>
                                            </form>
                                            </td>
                                        </tr>
                                    <?
                                        }
                                    ?>
                                    </tbody>
                                </table>
                            </div>
                    	</div>
                	</div>
                </div>
            </div>
<?	}else{	?>
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">ห้องตรวจ</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <div class="row">
                <div class="col-lg-12">
                	<!--Function Alert-->
                    <?	echo gatAlert(); ?>
                	<div class="panel panel-default">
                        <div class="panel-heading">
                        	<i class="fa fa-users fa-fw"></i>
                            ข้อมูลห้องตรวจ
                        </div>
                    	<div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th class="text-center" width="10%">ลำดับ</th>
                                            <th class="text-center" width="20%">รายการ</th>
                                            <th class="text-center" width="40%">ผู้ใช้</th>
                                            <th class="text-center" width="30%">สถานะ</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?	$i=1;
                                        $result_room=mysql_query("SELECT Room_ID, Room_Name, Room_Status, User_ID FROM room");
                                        while(list($Room_ID, $Room_Name, $Room_Status, $User_ID5)=mysql_fetch_row($result_room)){
                                    ?>
                                        <tr class="odd gradeX">
                                            <td class="text-center" style="vertical-align: middle;"><? echo $Room_ID; ?></td>
                                            <td style="vertical-align: middle;"><? echo $Room_Name; ?></td>
											<form role="form" method="post" action="index_panel.php?module=room&file=update_room&ut=doctor" enctype="multipart/form-data" data-toggle="validator">
							<?	if($User_ID5==0){	?>
                                            <td style="vertical-align: middle; text-align:center;"> 
                                            <?	$sql_doctor="SELECT User_ID, User_Title, User_Name, User_Lastname FROM user WHERE User_ID='3' ";
													$result_doctor=mysql_query($sql_doctor);
													list($User_ID, $User_Title, $User_Name, $User_Lastname)=mysql_fetch_row($result_doctor);
											?>
                                            <input type="hidden" class="form-control" name="uid" value="<? echo $User_ID; ?>">
                                            <? echo $User_Title," ",$User_Name," ",$User_Lastname; ?>
                                            
                                            </td>
							<?	}else{	?>
                                            <td class="text-center" style="vertical-align: middle;"><? echo $User_Title,"",$User_Name," ",$User_Lastname; ?></td>
							<?	}	?>
                                            <td style="vertical-align: middle;"><input type="hidden" class="form-control" name="rid" value="<? echo $Room_ID; ?>">
							<?	if($User_ID5=="0"){	?>
													<input type="hidden" class="form-control" name="r_status" value="ไม่ว่าง">
													<button type="submit" class="btn btn-success">เข้าห้อง</button>
							<?	}else{	?>
													<input type="hidden" class="form-control" name="r_status" value="ว่าง">
													<button type="submit" class="btn btn-danger">ออกจากห้อง</button>
							<?	}	?>
                                            </td>
											</form>
                                        </tr>
                                    <?
                                        }
                                    ?>
                                    </tbody>
                                </table>
                            </div>
                    	</div>
                	</div>
                </div>
            </div>
<?	}	?>