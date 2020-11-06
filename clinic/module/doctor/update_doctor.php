<?
	if($_POST[u_idcard]=="" || $_POST[u_username]=="" || $_POST[u_password]==""){//ตรวจสอบค่าว่างทั้งหมด
		$_SESSION[warning]="กรุณากรอกข้อมูลทันตแพทย์ให้ครบด้วยค่ะ.";
		echo "<script type='text/javascript'>window.location='index_panel.php?module=doctor&file=edit_doctor&uid=$_POST[uid]';</script>";
	}else{
		$add_time=date("Y-m-d : H:i:s");
		
		$u_photo = $_FILES['u_photo']['name'];
		if($u_photo !=""){ // อัพโหลดรูปประจำตัว
			$imageupload = $_FILES['u_photo']['tmp_name'];
			$imageupload_name = $_FILES['u_photo']['name'];
			$path = "image/profile";
			$newwidth=200; // กำหนดความกว้างของรูป
			
			if($imageupload){
				$arraypic = explode(".",$imageupload_name);
				$filename = strtolower($arraypic[0]);
				$filetype = strtolower($arraypic[1]);
					if($filetype=="jpg" || $filetype=="jpeg" || $filetype=="png" || $filetype=="gif"){
					
						if($filetype=="jpg" || $filetype=="jpeg"){
							$src = imagecreatefromjpeg($imageupload);
						}
						else if($filetype=="png"){
							$src = imagecreatefrompng($imageupload);
						}
						else if($filetype=="gif"){
							$src = imagecreatefromgif($imageupload);
						}
						
						list($width,$height)=getimagesize($imageupload);
						$newheight=($height/$width)*$newwidth;
						$tmp=imagecreatetruecolor($newwidth,$newheight);
						imagecopyresampled($tmp,$src,0,0,0,0,$newwidth,$newheight,$width,$height);
					
						if($filetype=="jpg" || $filetype=="jpeg"){
							imagejpeg($tmp,$path."/".$filename.".".$filetype);
						}
						else if($filetype=="png"){
							imagepng($tmp,$path."/".$filename.".".$filetype);
						}
						else{
							imagegif($tmp,$path."/".$filename.".".$filetype);
						}
					
					}else {
						echo "<div><center><h3>ERROR : ไม่สามารถ Upload รูปภาพได้</h3></center></div>";
					}
				$u_photo_pix=$filename.".".$filetype;  // ตัวแปรใช้เก็บในฐานข้อมูลของคำสั่ง sql insert
				$u_photo_pix=",User_Photo='$u_photo_pix'";
			}
		}
		
		$u_prof_photo = $_FILES['u_prof_photo']['name'];
		if($u_prof_photo !=""){ // อัพโหลดใบประกอบวิชาชีพ
			$imageupload = $_FILES['u_prof_photo']['tmp_name'];
			$imageupload_name = $_FILES['u_prof_photo']['name'];
			$path = "image/professional";
			$newwidth=200; // กำหนดความกว้างของรูป
			
			if($imageupload){
				$arraypic = explode(".",$imageupload_name);
				$filename = strtolower($arraypic[0]);
				$filetype = strtolower($arraypic[1]);
					if($filetype=="jpg" || $filetype=="jpeg" || $filetype=="png" || $filetype=="gif"){
					
						if($filetype=="jpg" || $filetype=="jpeg"){
							$src = imagecreatefromjpeg($imageupload);
						}
						else if($filetype=="png"){
							$src = imagecreatefrompng($imageupload);
						}
						else if($filetype=="gif"){
							$src = imagecreatefromgif($imageupload);
						}
						
						list($width,$height)=getimagesize($imageupload);
						$newheight=($height/$width)*$newwidth;
						$tmp=imagecreatetruecolor($newwidth,$newheight);
						imagecopyresampled($tmp,$src,0,0,0,0,$newwidth,$newheight,$width,$height);
					
						if($filetype=="jpg" || $filetype=="jpeg"){
							imagejpeg($tmp,$path."/".$filename.".".$filetype);
						}
						else if($filetype=="png"){
							imagepng($tmp,$path."/".$filename.".".$filetype);
						}
						else{
							imagegif($tmp,$path."/".$filename.".".$filetype);
						}
					
					}else {
						echo "<div><center><h3>ERROR : ไม่สามารถ Upload รูปภาพได้</h3></center></div>";
					}
				$u_prof_photo_pix=$filename.".".$filetype; // ตัวแปรใช้เก็บในฐานข้อมูลของคำสั่ง sql insert
				$u_prof_photo_pix="User_Prof_photo='$u_prof_photo_pix', ";
			}
		}
		
		$birthday=$_POST[u_year]."-".$_POST[u_day]."-".$_POST[u_month];
						$sql="UPDATE user SET			User_ID_Card='$_POST[u_idcard]', 
																	User_Username='$_POST[u_username]', 
																	User_Password='$_POST[u_password]', 
																	User_Gender='$_POST[u_gender]', 
																	User_Title='$_POST[u_title]', 
																	User_Name='$_POST[u_name]', 
																	User_Lastname='$_POST[u_lastname]', 
																	User_Nickame='$_POST[u_nickname]', 
																	User_Birthday='$birthday', 
																	User_Religion='$_POST[u_religion]', 
																	User_Blood='$_POST[u_blood]', 
																	User_Department='$_POST[u_department]', 
																	$u_prof_photo_pix 
																	User_Address='$_POST[u_address]', 
																	User_Tel='$_POST[u_tel]', 
																	User_Email='$_POST[u_email]', 
																	User_Salary='$_POST[u_salary]'
																	$u_photo_pix
																	
													WHERE User_ID='$_POST[uid]' 
										";
		if(mysql_query($sql) or die (mysql_error())){
			$_SESSION[success]="แก้ไขข้อมูลทันตแพทย์สำเร็จแล้ว";
			echo "<script type='text/javascript'>window.location='index_panel.php?module=doctor&file=show_doctor&uid=$_POST[uid]';</script>";
		}
		else{
			$_SESSION[error]="ไม่สามารถแก้ข้อมูลทันตแพทย์ได้";
			echo "<script type='text/javascript'>window.location='index_panel.php?module=doctor&file=edit_doctor&uid=$_POST[uid]';</script>";
		}

	}
?>