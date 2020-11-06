            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">หมอ & ห้องตรวจ</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                	<!--Function Alert-->
                    <?	echo gatAlert(); ?>
                	<div class="panel panel-default">
                        <div class="panel-heading">
                        	<i class="fa fa-users fa-fw"></i>
                            ข้อมูลหมอและห้องตรวจ
                        </div>
                    	<div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>ห้องตรวจ</th>
                                            <th>ผู้ใช้</th>
                                            <th>แผนก</th>
                                            <th>สถานะ</th>
                                            <th>ดำเนินการ</th>
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
                                            <? 	if($Room_Status=="ว่าง"){	?>
                                                <a href="">
                                                    <button type="button" class="btn btn-success"><? echo $Room_Status; ?></button>
                                                </a>
                                            <?	}else{	?>
                                            	<a href="">
                                                    <button type="button" class="btn btn-danger"><? echo $Room_Status; ?></button>
                                                </a>
                                            <?	}	?>
                                            </td>
                                            <td>
                                                <a href="index_panel.php?module=patient&file=insert_quere&rid=<? echo $Room_ID; ?>&pid=<? echo $_GET[pid]; ?>">
                                                    <button type="button" class="btn btn-info">เพิ่มเข้าคิว</button>
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
                </div>
            </div>