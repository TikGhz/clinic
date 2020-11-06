            <?
				$sql_ht="SELECT Tre_ID, Pat_ID, User_ID, Tre_Date, Tre_Symptoms, Tre_Examination, Tre_Diagnosis, Tre_Remedy, Tre_Dispensing, Tre_Appoint, Tre_Status FROM hist_treatment WHERE Tre_ID='$_GET[tid]' LIMIT 0,10 ";
				$result_ht=mysql_query($sql_ht) or die (mysql_error());
				list($Tre_ID, $Pat_ID, $User_ID, $Tre_Date, $Tre_Symptoms, $Tre_Examination, $Tre_Diagnosis, $Tre_Remedy, $Tre_Dispensing, $Tre_Appoint, $Tre_Status)=mysql_fetch_row($result_ht);
				
				$result_patient=mysql_query("SELECT Pat_Title, Pat_Name, Pat_Lastname FROM patient WHERE Pat_ID='$Pat_ID' ");
				list($Pat_Title, $Pat_Name, $Pat_Lastname)=mysql_fetch_row($result_patient);
				
				$sql_show_doctor="SELECT User_ID, User_Title, User_Name, User_Lastname, User_Department, User_Address, User_Tel, User_Email, User_Photo FROM user WHERE User_ID='$User_ID' ";
				$result_show_doctor=mysql_query($sql_show_doctor) or die (mysql_error());
				list($User_ID, $User_Title, $User_Name, $User_Lastname, $User_Department, $User_Address, $User_Tel, $User_Email, $User_Photo)=mysql_fetch_row($result_show_doctor);
			?>
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">ประวัติการรักษา</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->

            <div class="row">
                <div class="col-lg-12">
				<?	echo gatAlert(); ?>
                    <div class="panel">
                            <div class="row">
                                <div class="col-lg-3">
                                	<div style="padding-left: 8px; padding-right: 8px; box-shadow: 0px 0px 5px 0px #CCCCCC;  margin-bottom: 16px; padding: 20px;">
                                		<h4>
										<a href="index_panel.php?module=doctor&file=show_doctor&uid=<? echo $User_ID; ?>">
										<? echo $User_Name," ",$User_Lastname; ?>
                                        </a>
                                        </h4>
                                    	<div class="text-center">
                                        	<img src="image/profile/<? echo $User_Photo; ?>" width="200" height="200" class="img-thumbnail">
                                        </div>
                                        
                                        <hr>
                                        
                                        <div class="profile-details">
                                            <ul class="fa-ul">
                                                <li><i class="fa-li fa fa-tasks"></i>ตำแหน่ง: <span>ทันตแพย์</span></li>
                                                <li><i class="fa-li fa fa-suitcase"></i>แผนก: <span><? echo $User_Department; ?></span></li>
                                                <li><i class="fa-li fa fa-envelope"></i>อีเมล์: <span><? echo $User_Email; ?></span></li>
                                                <li><i class="fa-li fa fa-mobile"></i>มือถือ: <span><? echo $User_Tel; ?></span></li>
                                                <li><i class="fa-li fa fa-home"></i>ที่อยู่: <span><? echo $User_Address; ?></span></li>
                                            </ul>
										</div>
                                        
                                        <hr>
									</div>
                                </div>
                                <!-- /.col-lg-3 (nested) -->
                				<div class="col-lg-9">
									<div style="box-shadow: 0px 0px 5px 0px #CCCCCC; ">
										<div id="profile">
											<div class="panel-body">

												<div style="padding-bottom:0px; margin-bottom:20px; font-size:20px; border-bottom: 1px solid #ddd; ">
													<h4>ข้อมูลการรักษา 
                                                    <a href="index_panel.php?module=patient&file=show_patient&pid=<? echo $Pat_ID; ?>">
													<? echo $Pat_Title,"",$Pat_Name," ",$Pat_Lastname; ?>
                                                    </a>
                                                    </h4>
												</div>
                                                    
														<div class="row profile-user-info">
															<div class="col-sm-12">
                                                            	<div class="profile-user-details clearfix">
                                                                    <div class="profile-user-details-label">อาการ:</div>
                                                                    <div class="profile-user-details-value"><? echo $Tre_Symptoms; ?>&nbsp;</div>
                                                                </div>
                                                                <div class="profile-user-details clearfix">
                                                                    <div class="profile-user-details-label">ตรวจร่างกาย:</div>
                                                                    <div class="profile-user-details-value"><? echo $Tre_Examination; ?>&nbsp;</div>
                                                                </div>
                                                                <div class="profile-user-details clearfix">
                                                                    <div class="profile-user-details-label">วินิจฉัยโรค:</div>
                                                                    <div class="profile-user-details-value"><? echo $Tre_Diagnosis; ?>&nbsp;</div>
                                                                </div>
                                                                <div class="profile-user-details clearfix">
                                                                    <div class="profile-user-details-label">การรักษา:</div>
                                                                    <div class="profile-user-details-value"><? echo $Tre_Remedy; ?>&nbsp;</div>
                                                                </div>
                                                                <div class="profile-user-details clearfix">
                                                                    <div class="profile-user-details-label">ใบนัด:</div>
                                                                    <div class="profile-user-details-value"><? echo $Tre_Appoint; ?>&nbsp;</div>
                                                                </div>
                                                                <?
																$sql_hd="SELECT * FROM hist_dispense WHERE Hist_ID='$_GET[tid]' ";
																$result_hd=mysql_query($sql_hd) or die (mysql_error());
																list($Hist_ID, $User_ID, $Pat_ID, $Hist_Total)=mysql_fetch_row($result_hd);
																
																$sql_hd_d="SELECT * FROM hist_dispense_detail WHERE Hist_ID='$_GET[tid]' ORDER BY Hist_ID DESC";
																$result_hd_d=mysql_query($sql_hd_d) or die (mysql_error());
																?>
                                                                <div class="profile-user-details clearfix">
                                                                    <div class="profile-user-details-label">จ่ายยา:</div>
                                                                    <div class="profile-user-details-value">
                                                                    <table width="100%" border="0" cellspacing="0" cellpadding="0" class="table table-bordered table-hover">
                                                                    <thead>
                                                                        <tr>
                                                                            <th class="text-center">ชื่อผลิตภัณฑ์</th>
                                                                            <th class="text-center">จำนวน</th>
                                                                            <th class="text-center">ราคาขาย</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <? while(list($Hist_ID, $Drug_ID, $Hist_d_Unit, $Hist_d_Price)=mysql_fetch_row($result_hd_d)){
																		$result_drug=mysql_query("SELECT Drug_Name FROM drug WHERE Drug_ID='$Drug_ID' ");
																		list($Drug_Name)=mysql_fetch_row($result_drug);
																		$dtotal+=($Hist_d_Unit*$Hist_d_Price);
																	?>
                                                                      <tr>
                                                                        <td class="text-center"><? echo $Drug_Name; ?>&nbsp;</td>
                                                                        <td class="text-center"><? echo $Hist_d_Unit; ?>&nbsp;</td>
                                                                        <td class="text-center"><? echo $Hist_d_Price; ?>&nbsp;</td>
                                                                      </tr>
                                                                    <? }?>
                                                                    </table>
                                                                    </div>
                                                                </div>
                                                                <div class="profile-user-details clearfix">
                                                                    <div class="profile-user-details-label">ค่ายา:</div>
                                                                    <div class="profile-user-details-value"><? echo $dtotal; ?> บาท&nbsp;</div>
                                                                </div>
                                                                <div class="profile-user-details clearfix">
                                                                    <div class="profile-user-details-label">ค่ารักษา:</div>
                                                                    <div class="profile-user-details-value"><? echo $Hist_Total-$dtotal; ?> บาท&nbsp;</div>
                                                                </div>
                                                                <div class="profile-user-details clearfix">
                                                                    <div class="profile-user-details-label">รวมทั้งหมด:</div>
                                                                    <div class="profile-user-details-value"><? echo $Hist_Total; ?> บาท&nbsp; </div>
                                                                </div>
                                                            </div>
														</div>
												
											</div>
										</div>
									</div>
                                </div>
                            
                            
                            </div>
                            <!-- /.row (nested) -->

                    </div>
                    <!-- /.panel -->
                </div>
                
                <!-- /.col-lg-12 -->
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
                </div>-->
            