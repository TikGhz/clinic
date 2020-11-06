            <div class="row">
                <div class="col-lg-12 hidden-print">
                    <h1 class="page-header"></h1>
                </div>
            </div>
            <p>
              <!-- /.row -->
            </p>            
            <div class="row" style="opacity: 1; -webkit-transform: translateY(0px); transform: translateY(0px);">
                <div class="col-lg-12">
                	<div class="table-responsive">
            <table width="100%" border="0" cellspacing="0" cellpadding="0" style="font-family: 'Open Sans', sans-serif;">
              <tr>
                <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td width="70%" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td valign="top"><div class="clearfix"><h2 class="pull-left">ใบเสร็จรับเงิน</h2></div></td>
                      </tr>
                      <tr>
                        <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                          <tr>
                            <td width="20%"><img src="image/profile.png" width="75" height="75"></td>
                            <td width="80%"><h4>คลินิกทันตกรรมทันตแพทย์ทองฉัตร</h4>99/4, ถ.ลำพูน-ลี้ ต.บ้านโฮ่ง อ.บ้านโฮ่ง ลำพูน 51000 <br>ประเทศไทย โทร +66 53 550 029</td>
                          </tr>
                        </table></td>
                      </tr>
                    </table></td>
                    <td width="30%" align="right" valign="bottom">
                    <table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-left:5px;">
                        <?	$add_time=date("Y-m-d");	
								list($year,$month,$day)=explode("-","$add_time");
						?>
                      <tr>
                        <td width="50%">เลขที่</td>
                        <td width="50%"><? echo ($year+543),"",$_GET[hid];?></td>
                      </tr>
                      <tr>
                        <td>วันที่ชำระ</td>
                        <td><? echo $day,"/",$month,"/",($year+543);?></td>
                      </tr>
                      <tr>
                        <td>รหัสแพทย์</td>
                        <td>P001</td>
                      </tr>
                      <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                      </tr>
                    </table></td>
                  </tr>
                </table></td>
              </tr>
              <tr>
                <td><br>
                <table class="table" style="border-bottom:1px solid #ddd;">
                  <thead style="border-top:1px solid #ddd;">
                    <tr>
                      <th class="text-center"><span>#</span></th>
                      <th>รายการ</th>
                      <th class="text-center"><span>ประเภท</span></th>
                      <th class="text-center"><span>จำนวน</span></th>
                      <th class="text-center"><span>ราคาต่อชิ้น</span></th>
                      <th class="text-center"><span>รวม</span></th>
                    </tr>
                  </thead>
                  <tbody>
                  <?
				  $result_dispense_detail=mysql_query("SELECT Hist_ID, Drug_ID, Hist_d_Unit, Hist_d_Price, Hist_d_Date FROM hist_dispense_detail WHERE Hist_ID='$_GET[hid]' ORDER BY Hist_ID ASC");
				  $sum=0;
				  while(list($Hist_ID, $Drug_ID, $Hist_d_Unit, $Hist_d_Price, $Hist_d_Date)=mysql_fetch_row($result_dispense_detail)){
					  
					  $sql_dispense="SELECT Hist_ID, User_ID, Pat_ID, Hist_Total FROM hist_dispense WHERE Hist_ID='$Hist_ID' ";
					  $result_dispense=mysql_query($sql_dispense)or die (mysql_error());
					  list($Hist_ID1, $User_ID, $Pat_ID, $Hist_Total)=mysql_fetch_row($result_dispense);
					  
					  $result_drug=mysql_query("SELECT Drug_Name, Drug_Type_ID, Drug_Price FROM drug WHERE Drug_ID='$Drug_ID' ");
					  list($Drug_Name, $Drug_Type_ID, $Drug_Price)=mysql_fetch_row($result_drug);
									
					  $result_drug_type=mysql_query("SELECT Drug_Type_ID, Drug_Type_Name FROM drug_type WHERE Drug_Type_ID='$Drug_Type_ID' ");
					  list($Drug_Type_ID, $Drug_Type_Name)=mysql_fetch_row($result_drug_type)
									
				  ?>
                    <tr>
                      <td class="text-center"> <? echo $Hist_ID; ?> </td>
                      <td> <? echo $Drug_ID; ?> </td>
                      <td class="text-center"> <? echo $Drug_Type_Name; ?> </td>
                      <td class="text-center"> <? echo $Hist_d_Unit; ?> </td>
                      <td class="text-center"> ฿ <? echo $Drug_Price; ?> </td>
                      <td class="text-center"> ฿ <? echo $Hist_d_Price; ?> </td>
                    </tr>
                  <?	
				  	 $GLOBALS['sum']+=$Hist_d_Price;
				  }	
				  ?>
                  </tbody>
                  <tfoot>
                  	<tr>
                      <td class="text-right" colspan="5"> ค่ารักษา </td>
                      <td class="text-center"> ฿ <? echo number_format($Hist_Total-$sum,2, '.', ''); ?> </td>
                    </tr>
                  	<tr>
                      <td class="text-right" colspan="5" style="border:0px solid #ddd;"> ยอดรวม </td>
                      <td class="text-center" style="border:0px solid #ddd;"> ฿ <? echo $Hist_Total; ?> </td>
                    </tr>
                    <tr>
                      <td class="text-right" colspan="5" style="border:0px solid #ddd;"> ภาษี (7%) </td>
                      <td class="text-center" style="border:0px solid #ddd;"> ฿ <? echo $total=($Hist_Total*7)/100; ?> </td>
                    </tr>
                    <tr>
                      <td class="text-right" colspan="5" style="border:0px solid #ddd;"> รวมทั้งหมด </td>
                      <td class="text-center" style="border:0px solid #ddd;"> ฿ <? echo $Hist_Total+$total; ?> </td>
                    </tr>
                  </tfoot>
                </table>
                </td>
              </tr>
              <tr>
                <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr><br>
                    <td width="50%" valign="bottom"><div>ผู้รับ</div> <div style="border-bottom:1px solid #ddd; width:60%; margin-left:35px;"></div></td>
                    <td width="50%" valign="bottom"><div>ลูกค้า</div> <div style="border-bottom:1px solid #ddd; width:60%; margin-left:45px;"></div></td>
                  </tr>
                </table></td>
              </tr>
            </table>
            		</div>
            	</div>
            </div>