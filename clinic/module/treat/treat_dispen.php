<?
	$result_treatment=mysql_query("SELECT Tre_ID, Pat_ID, User_ID, Tre_Dispensing, Tre_Appoint FROM treatment WHERE Tre_ID='$_GET[case_id]' ");
	list($Tre_ID, $Pat_ID1, $User_ID1, $Tre_Dispensing, $Tre_Appoint)=mysql_fetch_row($result_treatment);
									
	$result_pat=mysql_query("SELECT Pat_ID, Pat_Title, Pat_Name, Pat_Lastname FROM patient WHERE Pat_ID='$Pat_ID1' ");
	list($Pat_ID, $Pat_Title, $Pat_Name, $Pat_Lastname)=mysql_fetch_row($result_pat);
								
	$result_user=mysql_query("SELECT User_ID, User_Title,	User_Name, User_Lastname FROM user WHERE User_ID='$User_ID1' ");
	list($User_ID, $User_Title, $User_Name, $User_Lastname)=mysql_fetch_row($result_user);
?>
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">รายละเอียดใบนัดและการจ่ายยา</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                	<!--Function Alert-->
                    <?	echo gatAlert(); ?>
                    
                    
                    <div class="col-lg-8">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                        	<i class="fa fa-graduation-cap"></i>
                            ข้อมูลการจ่ายยา
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="row">
                            
                            	
                                <div class="col-lg-12" id="cal">
                                    	<div class="form-group">
                                        <label><i class="fa fa-home"></i> หมอสั่งจ่ายยา :</label>
                                        <textarea class="form-control" rows="1" name="a_detail" readonly><? echo $Tre_Dispensing; ?></textarea>
                                        </div>
                                        
                                        <div class="form-group">
											<?
                                                $result_drug=mysql_query("SELECT Drug_ID, Drug_Name, Drug_Unit, Drug_Price FROM drug");
                                                list($Drug_ID, $Drug_Name, $Drug_Unit, $Drug_Price)=mysql_fetch_row($result_drug);
                                            ?>
<form role="form" method="post" action="index_panel.php?module=treat&file=cart_dispen&case_id=<? echo $_GET[case_id]; ?>" name="dispen" enctype="multipart/form-data" data-toggle="validator">
                                            <label><i class="fa fa-home"></i> เลือกรายการยา :</label>
                                                <select id="mySel" name="did" required OnChange="document.dispen.submit();">
                                                    <option value="">เลือกรายการยา</option>
                                            <?	while(list($Drug_ID, $Drug_Name, $Drug_Unit, $Drug_Price)=mysql_fetch_row($result_drug)){	?>
                                                    <option value="<? echo $Drug_ID; ?>"><? echo $Drug_Name; ?></option>
                                            <?	}	?>
                                                </select>
										</form>

                                        </div>
                                        <?	$cnt=count($_SESSION['sdid']);	?>
                                        <form action="index.php?module=treat&file=calculate&case_id=<? echo $_GET[case_id]; ?>" method="post" name="cal">
                                        <?	if($cnt>0){	?>
                                            <table width="100%" class="table table-striped table-bordered table-hover" align="center">
                                                  <tr>
                                                    <th width="12%">รหัสยา</th>
                                                    <th>ชื่อดอกไม้</th>
                                                    <th width="15%">ราคา</th>
                                                    <th width="15%">จำนวน</th>
                                                    <th width="15%">ราคารวม</th>
                                                    <th width="15%">ดำเนินการ</th>
                                                  </tr>
                                            <? for($i=0;$i<$cnt;$i++){ ?>
                                                  <tr>
                                                    <td><? echo $_SESSION['sdid'][$i]?></td>
                                                    <td><? echo $_SESSION['sd_name'][$i]?></td>
                                                    <td><? echo $_SESSION['sd_price'][$i]?></td>
                                                    <td>
                                                        <input type="text" class="form-control" name="sd_unit[]" value="<? echo $_SESSION['sd_unit'][$i] ?>"  OnChange="document.cal.submit();">
                                                    </td>
                                                    <td>
                                                        <? 	$_SESSION['sum'][$i]=$_SESSION['sd_price'][$i]*$_SESSION['sd_unit'][$i];
                                                                printf("%.2f",$_SESSION['sum'][$i]);
                                                        ?>
                                                     </td>
                                                     <td>
                                            <a href="index_panel.php?module=treat&file=calculate&case_id=<? echo $_GET[case_id]; ?>&del=<? echo $_SESSION['sdid'][$i]?>">
                                            	<button type="button" class="btn btn-danger">ลบรายการ</button>
                                            </a>
                                                     </td>
                                                  </tr>
                                            <? $total+=$_SESSION['sum'][$i]; 
                                               	 } ?>
                                                </table>
    									
                                        <div class="clear"></div>
                                        <?	}	?>
                                        
                                        <div class="form-group">
                                        <? if($_SESSION['total_revenue']=="" || $_SESSION['total_revenue']==0){ $_SESSION['total_revenue']=0;}	?>
                                        <label><i class="fa fa-home"></i> ค่ารักษารวม :</label>
                                    	<input class="form-control" name="total_revenue" OnChange="document.cal.submit();" value="<? echo $_SESSION['total_revenue'];?>">
                                        </div>
                                        
                                        </form>
                                        
                                        <div class="form-group">
                                        <? $_SESSION['all_revenue']=$total+$_SESSION['total_revenue']; ?>
                                        <label><i class="fa fa-home"></i> รวมเป็นเงินทั้งสิ้น : <? printf("%.2f",$_SESSION['all_revenue']);?> บาท</label> 
                                        </div>
                                </div>
                                <!-- /.col-lg-6 (nested) -->
                                
                            </div>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                    </div>
                    
                    <div class="col-lg-4">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                        	<i class="fa fa-users fa-fw"></i>
                            เพิ่มข้อมูลใบนัด
                        </div>
                        <div class="panel-body">
                            <div class="row">
                            
                            	<form role="form" method="post" action="index_panel.php?module=history&file=hist_dispense" enctype="multipart/form-data" data-toggle="validator">
                                <div class="col-lg-12">
						 <?	if($Tre_Appoint=="นัด"){	?>
                                	<div class="well">
                                        <div class="form-group">
                                        <label><i class="fa fa-home"></i> ทันตแพทย์ :</label>
										<? echo $User_Title," ",$User_Name," ",$User_Lastname; ?>
                                        </div>
                                        
                                        <div class="form-group">
                                        <label><i class="fa fa-home"></i> ผู้ป่วย :</label>
										<? echo $Pat_Title," ",$Pat_Name," ",$Pat_Lastname; ?>
                                        </div>
                                        
                                        <div class="form-group">
                                        <label><i class="fa fa-home"></i> สถานะใบนัด :</label> รอดำเนินการ
                                        </div>
                                        
                                        <label><i class="fa fa-home"></i> วันที่นัด :</label>
                                        <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-plus"></i></span>
                                            <input type="text" id="datetimepicker7" class="form-control" name="a_time" placeholder="วันที่นัด" required>
                                        </div>
                                        
                                    	<div class="form-group">
                                        <label><i class="fa fa-home"></i> รายละเอียดใบนัด :</label>
                                        <textarea class="form-control" rows="1" name="a_detail" required></textarea>
                                        </div>
                                        
                                        <div class="form-group">
                                        	<input type="hidden" class="form-control" name="pid" value="<? echo $Pat_ID; ?>" required>
                                            <input type="hidden" class="form-control" name="uid" value="<? echo $User_ID; ?>" required>
                                            <input type="hidden" class="form-control" name="tre_app" value="<? echo $Tre_Appoint; ?>" required>
                                            <input type="hidden" class="form-control" name="case_id" value="<? echo $_GET['case_id']; ?>" required>
                                            
                                            <button type="submit" class="btn btn-primary">บันทึก</button>
                                            <button type="reset" class="btn btn-danger">รีเซ็ท</button>
                                        </div>
                                        
									</div>
						 <?	}else{	?>
                                	<div class="well">
                                        <div class="form-group">
                                        <label><i class="fa fa-home"></i> ทันตแพทย์ :</label>
										<? echo $User_Title," ",$User_Name," ",$User_Lastname; ?>
                                        </div>
                                        
                                        <div class="form-group">
                                        <label><i class="fa fa-home"></i> ผู้ป่วย :</label>
										<? echo $Pat_Title," ",$Pat_Name," ",$Pat_Lastname; ?>
                                        </div>
                                        
                                        <div class="form-group">
                                        <label><i class="fa fa-home"></i> สถานะใบนัด :</label> ไม่มีการนัดหมาย
                                        </div>
                                        
                                        <div class="form-group">
                                        	<input type="hidden" class="form-control" name="pid" value="<? echo $Pat_ID; ?>" required>
                                            <input type="hidden" class="form-control" name="uid" value="<? echo $User_ID; ?>" required>
                                            <input type="hidden" class="form-control" name="tre_app" value="<? echo $Tre_Appoint; ?>" required>
                                            <input type="hidden" class="form-control" name="case_id" value="<? echo $_GET['case_id']; ?>" required>
                                            
                                            <button type="submit" class="btn btn-primary">บันทึก</button>
                                            <button type="reset" class="btn btn-danger">รีเซ็ท</button>
                                        </div>
                                        
									</div>
						 <?	}	?>
                                </div>
                                <!-- /.col-lg-6 (nested) -->
                                </form>
                                
                            </div>
                            <!-- /.row (nested) -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                </div>
                <!-- /.col-lg-12 -->
            </div>