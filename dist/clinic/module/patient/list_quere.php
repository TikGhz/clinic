            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">หมอ & ห้องตรวจ</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                	<div class="panel panel-default">
                        <div class="panel-heading">
                        	<i class="fa fa-users fa-fw"></i>
                            ข้อมูลหมอและห้องตรวจ
                        </div>
                    	<div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" >
                                    <thead>
                                        <tr>
                                            <th>ห้องตรวจ</th>
                                            <th>ผู้ใช้</th>
                                            <th>แผนก</th>
                                            <th>สถานะห้อง</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?
                                        $result_room=mysql_query("SELECT Room_ID, Room_Name, Room_Status, User_ID FROM room");
                                        while(list($Room_ID, $Room_Name, $Room_Status, $User_ID)=mysql_fetch_row($result_room)){
                                    ?>
                                        <tr class="odd gradeX">
                                            <td><? echo $Room_Name; ?></td>
                                            <td><? echo $User_ID; ?></td>
                                            <td><? echo $User_ID; ?></td>
                                            <td>
                                                <a href="">
                                                    <button type="button" class="btn btn-danger"><? echo $Room_Status; ?></button>
                                                </a>
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
                    <!---->
                    <?
					$result_room=mysql_query("SELECT Room_ID, Room_Name, Room_Status, User_ID FROM room");
					while(list($Room_ID, $Room_Name, $Room_Status, $User_ID)=mysql_fetch_row($result_room)){
					?>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                        	<i class="fa fa-users fa-fw"></i>
                            <?	echo $Room_Name;	?>
                        </div>
                    	<div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" >
                                    <thead>
                                        <tr>
                                            <th>คิวที่</th>
                                            <th>หมอ</th>
                                            <th>แผนก</th>
                                            <th>ผู้ป่วย</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?	$i=0;
										$result_queue=mysql_query("SELECT Que_ID, Pat_ID FROM queue WHERE Room_ID='$Room_ID' ");
                                        while(list($Que_ID, $Pat_ID)=mysql_fetch_row($result_queue)){
											$i++;
                                    ?>
                                        <tr class="odd gradeX">
                                            <td><? echo $i; ?></td>
                                            <td><? echo $User_ID; ?></td>
                                            <td><? echo $User_ID; ?></td>
                                            <td>
                                                <a href="">
                                                    <button type="button" class="btn btn-danger"><? echo $Pat_ID; ?></button>
                                                </a>
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
                    <?	}	?>
                </div>
            </div>