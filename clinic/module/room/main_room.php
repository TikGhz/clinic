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
											
										$result_user=mysql_query("SELECT User_Title, User_Name, User_Lastname FROM user WHERE User_ID='$User_ID5' ");
                                        list($User_Title, $User_Name, $User_Lastname)=mysql_fetch_row($result_user);
                                    ?>
                                        <tr class="odd gradeX">
                                            <td class="text-center" style="vertical-align: middle;"><? echo $Room_ID; ?></td>
                                            <td style="vertical-align: middle;"><? echo $Room_Name; ?></td>
                                            
											<form role="form" method="post" action="index_panel.php?module=room&file=update_room" enctype="multipart/form-data" data-toggle="validator">
											<?	if($User_ID5==0){	?>
                                            <td style="vertical-align: middle;"> 
                                            <div class="form-group" style="display:block; margin:0px;">
                                                    <select id="mySel<? echo $i++; ?>" name="uid" required>
                                                        <option value="">เลือกทันตแพทย์</option>
												<?	$sql_doctor="SELECT User_ID, User_Title, User_Name, User_Lastname FROM user WHERE User_Type_ID='3' ";
                                                        $result_pat=mysql_query($sql_doctor);
														
                                                        while(list($User_ID, $User_Title, $User_Name, $User_Lastname)=mysql_fetch_row($result_pat)){	
														
														if($User_ID==$User_ID5){}else{?>
                                                        	<option value="<? echo $User_ID; ?>"><? echo $User_Title," ",$User_Name," ",$User_Lastname; ?></option>
                                                <?	}
														}	?>
                                                    </select>
                                            </div>
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