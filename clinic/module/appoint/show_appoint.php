            <div class="row">
                <div class="col-lg-12 hidden-print">
                    <h1 class="page-header"></h1>
                </div>
            </div>
            <p>
              <!-- /.row -->
            </p>
	<?	$add_time=date("Y-m-d H:i:s");	
			list($add_time1,$add_time2)=explode(" ","$add_time");
			list($year,$month,$day)=explode("-","$add_time1");
			list($hour,$minute,$second)=explode(":","$add_time2");
			
			$result_appoint=mysql_query("SELECT App_ID, User_ID, Pat_ID, App_Detail, App_Time, App_Status, App_Date FROM appointment WHERE App_ID='$_GET[aid]' ORDER BY App_ID ASC");
			list($App_ID, $User_ID1, $Pat_ID1, $App_Detail, $App_Time, $App_Status, $App_Date)=mysql_fetch_row($result_appoint);
									
			$sql_doctor="SELECT * FROM user WHERE User_ID='$User_ID1' ";
			$result_doctor=mysql_query($sql_doctor) or die (mysql_error());
			list($User_ID, $User_ID_Card, $User_Username, $User_Password, $User_Gender, $User_Title, $User_Name, $User_Lastname, $User_Nickame, $User_Birthday, $User_Religion, $User_Blood, $User_Department, $User_Prof_photo, $User_Address, $User_Tel, $User_Email, $User_Salary, $User_Photo, $User_Type_ID)=mysql_fetch_row($result_doctor);
								
			$sql_pat="SELECT Pat_ID, Pat_ID_Card, Pat_Gender, Pat_Title, Pat_Name, Pat_Lastname, Pat_Birthday, Pat_Religion, Pat_Blood, Pat_Address, Pat_Tel, Pat_Career, Pat_Total_Cost, Pat_Date FROM patient WHERE Pat_ID='$Pat_ID1' ";
			$result_pat=mysql_query($sql_pat);
			list($Pat_ID, $Pat_ID_Card, $Pat_Gender, $Pat_Title, $Pat_Name, $Pat_Lastname, $Pat_Birthday, $Pat_Religion, $Pat_Blood, $Pat_Address, $Pat_Tel, $Pat_Career, $Pat_Total_Cost, $Pat_Date)=mysql_fetch_row($result_pat);
	?>
<table width="100%" border="0" cellspacing="0" cellpadding="0" style="font-family:THSarabunNew;">
              <tr>
                <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td width="25%" rowspan="2" valign="bottom"><img src="image/profile.png" width="75" height="75"></td>
                    <td width="50%" align="center"><h2>ใบนัดผู้ป่วย</h2></td>
                    <td width="25%">&nbsp;</td>
                  </tr>
                  <tr>
                    <td align="center">คลินิกทันตกรรมทันตแพทย์ทองฉัตร</td>
                    <td>&nbsp;</td>
                  </tr>
                  <tr>
                    <td colspan="3" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td colspan="3"><hr></td>
                      </tr>
                      <tr>
                          <td width="35%">ใบเลขที่ <b><i><? echo ($year+543),"-",$App_ID ?></i></b></td>
                        <td>ชื่อ-สกุล <b><i><? if($Pat_ID1==$Pat_ID){ echo $Pat_Title,"",$Pat_Name," ",$Pat_Lastname; } ?></i></b></td>
                          <td width="35%">นัดพบแพทย์ <b><i><? if($User_ID1==$User_ID){ echo $User_Title,"",$User_Name," ",$User_Lastname; } ?></i></b></td>
                      </tr>
                        <tr><? list($year_time,$month_time,$day_time)=explode("-","$App_Time")?>
                          <td height="35">วันที่นัด <b><i><?	echo date($day_time)," ", $thaimonth[date($month_time)-1] , " ",date($year_time)+543;	?></i></b></td>
                          <td>เวลานัด 08.00 น.</td>
                          <td>ที่ห้องตรวจ</td>
                        </tr>
                        <tr>
                          <td>คลินิก ทันตกรรมทันตแพทย์ทองฉัตร</td>
                          <td>โทร. 053-550-029</td>
                          <td>&nbsp;</td>
                        </tr>
                      </table>
                    </td>
                  </tr>
                </table></td>
              </tr>
              <tr>
                <td><hr>
                  <table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td width="50%">นัดมาเพื่อ <? echo 	$App_Detail?></td>
                    <td width="50%">การเตรียมตัว</td>
                  </tr>
                  <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                  </tr>
                </table></td>
              </tr>
              <tr>
                <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td colspan="2" rowspan="2" align="center">**โปรดนำใบนัดและบัตรผู้ป่วยมาด้วยทุกครั้ง **</td>
                    <td width="40%" height="35"><div style="float:left;">ลงชื่อ</div><div style="float:right;">ผู้นัด</div></td>
                  </tr>
                  <tr>
                    <td height="35" align="center">
                    <div style="float:left; margin-left:40px;">(</div> 
					<? if($User_ID1==$User_ID){ echo $User_Title,"",$User_Name," ",$User_Lastname; } ?>
                    <div style="float:right; margin-right:40px;">)</div>
                    </td>
                  </tr>
                </table>
                  <table width="100%" border="0" cellspacing="0" cellpadding="0">

                    <tr>
                      <td width="33%" height="35">คลินิก ทันตกรรมทันตแพทย์ทองฉัตร</td>
                      <td width="33%">วันที่สั่งนัด </td>
                      <td width="33%">วันที่พิมพ์ <? echo $day,"/",$month,"/",($year+543)," ",$hour,":",$minute;?></td>
                    </tr>
                </table></td>
              </tr>
            </table>