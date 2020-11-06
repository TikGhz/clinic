            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">รายได้ <a href="index_panel.php?module=revenue&file=form_revenue"><button type="button" class="btn btn-primary">เพิ่มรายได้อื่นๆ</button></a></h1>
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
                            ข้อมูลรายได้
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                            <?
								if($_GET[reve]!=""){
									$result_revenue=mysql_query("SELECT Reve_ID, User_ID, Pat_ID, Reve_Name, Reve_Price, Reve_Type, Reve_Date FROM revenue WHERE Reve_Type='$_GET[reve]' ");
								}else{
									$result_revenue=mysql_query("SELECT Reve_ID, User_ID, Pat_ID, Reve_Name, Reve_Price, Reve_Type, Reve_Date FROM revenue ");
								}
							?>
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th >ลำดับ</th>
                                            <th >รายการ</th>
                                            <th >จำนวน(บาท)</th>
                                            <th >ประเภท</th>
                                            <th >ลงวันที่</th>
                                            <th >ดำเนินการ</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                            <?	$n=0;
								while(list($Reve_ID, $User_ID, $Pat_ID, $Reve_Name, $Reve_Price, $Reve_Type, $Reve_Date)=mysql_fetch_row($result_revenue)){ 
									$n++;
							?>
                                        <tr class="odd gradeX">
                                            <td class="center"><? echo $n; ?></td>
                                            <td><? echo $Reve_Name; ?></td>
                                            <td><? echo $Reve_Price; ?></td>
                                            <td><? if($Reve_Type==1){ echo "ค่ารักษา";}elseif($Reve_Type==2){ echo "ขายยา"; }else{ echo "อื่นๆ";} ?></td>
                                            <td><? echo $Reve_Date; ?></td>
                                            <td>
                                            <a href="index_panel.php?module=revenue&file=main_revenue&rid=<? echo $Reve_ID; ?>">
                                            	<button type="button" class="btn btn-info"><i class="fa fa-search-plus fa-fw"></i> รายละเอียด</button>
                                            </a>
                                            </td>
                                        </tr>
							<?
								}
							?>
                            <?	if($_GET[rid]!="" and $_GET[reve]!=""){
									$result_revenue1=mysql_query("SELECT Reve_ID, User_ID, Pat_ID, Reve_Name, Reve_Price, Reve_Type, Reve_Date FROM revenue WHERE Reve_ID='$_GET[rid]' and Reve_Type='$_GET[reve]' ");
									}else{
									$result_revenue1=mysql_query("SELECT Reve_ID, User_ID, Pat_ID, Reve_Name, Reve_Price, Reve_Type, Reve_Date FROM revenue WHERE Reve_ID='$_GET[rid]'");
								}
									list($Reve_ID, $User_ID, $Pat_ID, $Reve_Name, $Reve_Price, $Reve_Type, $Reve_Date)=mysql_fetch_row($result_revenue1);
                            		if($_GET[rid]!="" ){	
									$result_user=mysql_query("SELECT User_Title, User_Name, User_Lastname FROM user WHERE User_ID='$User_ID' ");
									list($User_Title, $User_Name, $User_Lastname)=mysql_fetch_row($result_user);
									
									$result_pat=mysql_query("SELECT Pat_Title, Pat_Name, Pat_Lastname FROM patient WHERE Pat_ID='$Pat_ID' ");
									list($Pat_Title, $Pat_Name, $Pat_Lastname)=mysql_fetch_row($result_pat);
									?>
                            		<tfoot>
                                        <tr class="odd gradeX">
                                            <th colspan="6">
                                            	<span style="color:#F00;">**</span>
												รายได้มาจาก : 
												<a href="index_panel.php?module=doctor&file=show_doctor&uid=<? echo $User_ID; ?>"><? echo $User_Title," ",$User_Name," ",$User_Lastname;?></a>
                                                <? if($Reve_Type==1){ echo "รักษาให้";}elseif($Reve_Type==2){ echo "ขายยาให้"; }else{ echo "ได้ลงรายการ",$Reve_Name;} ?>
                                                <a href="index_panel.php?module=patient&file=show_patient&pid=<? echo $Pat_ID; ?>"><? echo $Pat_Title," ",$Pat_Name," ",$Pat_Lastname;?></a>
                                                เป็นจำนวนเงิน <? echo $Reve_Price;?> บาท
                                            </th>
                                        </tr>
                            		</tfoot>
							<?	}	?>
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