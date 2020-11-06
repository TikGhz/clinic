            <div class="row">
                <div class="col-lg-12 hidden-print">
                    <h1 class="page-header">รายงานคลังเวชภัณฑ์</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    
                    <div class="row hidden-print">
                        <div class="panel-body">
                            <div class="table-responsive">
                            <?
								$result_drug=mysql_query("SELECT Drug_ID, Drug_Name, Drug_Detail, Drug_Type_ID, Drug_Unit, Drug_Cost_Price, Drug_Price, Pur_ID, User_ID, Drug_Date FROM drug ORDER BY Drug_ID ASC");
								
	$thaiweek=array("วันอาทิตย์","วันจันทร์","วันอังคาร","วันพุธ","วันพฤหัส","วันศุกร์","วันเสาร์");
	$thaimonth=array("มกราคม","กุมภาพันธ์","มีนาคม","เมษายน","พฤษภาคม","      มิถุนายน","กรกฎาคม","สิงหาคม","กันยายน","ตุลาคม","พฤศจิกายน","ธันวาคม");
							?>
                            <div class="text-center">
								<h5>ประจำวันที่ <? echo $thaiweek[date("w")] ,"ที่",date(" j "), $thaimonth[date(" m ")-1] , " พ.ศ. ",date(" Y ")+543; ?></h5>
                            </div>
                                <table class="table table-striped table-bordered table-hover" style="border-left:0px;border-right:0px;">
                                    <thead style="border-bottom:1px solid #ddd;">
                                        <tr>
                                            <th class="text-center" width="5%" style="border:0px;">ลำดับ</th>
                                            <th class="text-center" width="10%" style="border:0px;">รหัส</th>
                                            <th class="text-center" width="30%" style="border:0px;">ชื่อผลิตภัณฑ์</th>
                                            <th class="text-center" width="10%" style="border:0px;">ประเภท</th>
                                            <th class="text-center" width="15%" style="border:0px;">จำนวน</th>
                                            <th class="text-center" width="15%" style="border:0px;">ราคาต้นทุน</th>
                                            <th class="text-center" width="15%" style="border:0px;">ราคาขาย</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                            <?	$i=0;
								while(list($Drug_ID, $Drug_Name, $Drug_Detail, $Drug_Type_ID, $Drug_Unit, $Drug_Cost_Price, $Drug_Price, $Pur_ID, $User_ID, $Drug_Date)=mysql_fetch_row($result_drug)){
									$i++;
									$Total_Cost_Price+=$Drug_Cost_Price;
									$Total_Price+=$Drug_Price;
							?>
                                        <tr class="odd gradeX">
                                            <td class="text-center" style="border:0px;"><? echo $i; ?></td>
                                            <td class="text-center" style="border:0px;"><? echo $Drug_ID; ?></td>
                                            <td style="border:0px;"><? echo $Drug_Name; ?></td>
                                            <td class="text-center" style="border:0px;"><? echo $Drug_Type_ID ?></td>
                                            <td class="text-center" style="border:0px;"><? echo $Drug_Unit; ?></td>
                                            <td class="text-right" style="border:0px;"><? echo $Drug_Cost_Price; ?></td>
                                            <td class="text-right" style="border:0px;"><? echo $Drug_Price; ?></td>
                                        </tr>
							<?
								}
							?>
                                    </tbody>
									<tfoot>
										<tr>
											<th colspan="5" class="text-center" style="border-left:0;">แสดงผลรวมของราคา</th>
											<th class="text-right" style="border-left:0;"><? echo $Total_Cost_Price; ?></th>
                                            <th class="text-right"><? echo $Total_Price; ?></th>
										</tr>
									</tfoot>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
					</div>
                    
                    <!--<div class="row visible-print-block">-->
                    <div class="row visible-print-block">
                        <div class="panel-body">
                            <div class="table-responsive">
                            <?
								$result_drug=mysql_query("SELECT Drug_ID, Drug_Name, Drug_Detail, Drug_Type_ID, Drug_Unit, Drug_Cost_Price, Drug_Price, Pur_ID, User_ID, Drug_Date FROM drug ORDER BY Drug_ID ASC");
								
	$thaiweek=array("วันอาทิตย์","วันจันทร์","วันอังคาร","วันพุธ","วันพฤหัส","วันศุกร์","วันเสาร์");
	$thaimonth=array("มกราคม","กุมภาพันธ์","มีนาคม","เมษายน","พฤษภาคม","      มิถุนายน","กรกฎาคม","สิงหาคม","กันยายน","ตุลาคม","พฤศจิกายน","ธันวาคม");
							?>
                            <div class="text-center">
                            	<h3>รายงานคลังเวชภัณฑ์</h3>
								<h5>ประจำวันที่ <? echo $thaiweek[date("w")] ,"ที่",date(" j "), $thaimonth[date(" m ")-1] , " พ.ศ. ",date(" Y ")+543; ?></h5>
                            </div>
                                <table class="table table-striped table-bordered table-hover" style="border-left:0px;border-right:0px;">
                                    <thead style="border-bottom:1px solid #ddd;">
                                        <tr>
                                            <th class="text-center" width="5%" style="border:0px;">ลำดับ</th>
                                            <th class="text-center" width="10%" style="border:0px;">รหัส</th>
                                            <th class="text-center" width="30%" style="border:0px;">ชื่อผลิตภัณฑ์</th>
                                            <th class="text-center" width="10%" style="border:0px;">ประเภท</th>
                                            <th class="text-center" width="15%" style="border:0px;">จำนวน</th>
                                            <th class="text-center" width="15%" style="border:0px;">ราคาต้นทุน</th>
                                            <th class="text-center" width="15%" style="border:0px;">ราคาขาย</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                            <?	$i=0;
								while(list($Drug_ID, $Drug_Name, $Drug_Detail, $Drug_Type_ID, $Drug_Unit, $Drug_Cost_Price, $Drug_Price, $Pur_ID, $User_ID, $Drug_Date)=mysql_fetch_row($result_drug)){
									$i++;
									$Total_Cost_Price+=$Drug_Cost_Price;
									$Total_Price+=$Drug_Price;
							?>
                                        <tr class="odd gradeX">
                                            <td class="text-center" style="border:0px;"><? echo $i; ?></td>
                                            <td class="text-center" style="border:0px;"><? echo $Drug_ID; ?></td>
                                            <td style="border:0px;"><? echo $Drug_Name; ?></td>
                                            <td class="text-center" style="border:0px;"><? echo $Drug_Type_ID ?></td>
                                            <td class="text-center" style="border:0px;"><? echo $Drug_Unit; ?></td>
                                            <td class="text-right" style="border:0px;"><? echo $Drug_Cost_Price; ?></td>
                                            <td class="text-right" style="border:0px;"><? echo $Drug_Price; ?></td>
                                        </tr>
							<?
								}
							?>
                                    </tbody>
									<tfoot>
										<tr>
											<th colspan="5" class="text-center" style="border-left:0;">แสดงผลรวมของราคา</th>
											<th class="text-right" style="border-left:0;"><? echo $Total_Cost_Price; ?></th>
                                            <th class="text-right"><? echo $Total_Price; ?></th>
										</tr>
									</tfoot>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
					</div>
                </div>
                <!-- /.col-lg-12 -->
            </div>