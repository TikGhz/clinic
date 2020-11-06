<?
	if($_POST[u_idcard]=="" || $_POST[u_username]=="" || $_POST[u_password]==""){//ตรวจสอบค่าว่างทั้งหมด
		$_SESSION[warning]="กรุณากรอกข้อมูลทันตแพทย์ให้ครบด้วยค่ะ.";
		echo "<script type='text/javascript'>window.location='index_panel.php?module=news&file=edit_news&nid=$_POST[nid]';</script>";
	}else{
		$add_time=date("Y-m-d : H:i:s");
		
		$n_image = $_FILES['n_image']['name'];
		if($n_image !=""){ // อัพโหลดรูปประจำตัว
			$imageupload = $_FILES['n_image']['tmp_name'];
			$imageupload_name = $_FILES['n_image']['name'];
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
				$n_image_pix=$filename.".".$filetype;  // ตัวแปรใช้เก็บในฐานข้อมูลของคำสั่ง sql insert
				$n_image_pix=",User_Photo='$n_image_pix'";
			}
		}
		
						$sql="UPDATE news SET			News_Title='$_POST[u_idcard]', 
																	News_Detail='$_POST[u_username]', 
																	$n_image_pix
																	
													WHERE News_ID='$_POST[nid]' 
										";
		if(mysql_query($sql) or die (mysql_error())){
			$_SESSION[success]="แก้ไขข้อมูลข่าวประกาศสำเร็จแล้ว";
			echo "<script type='text/javascript'>window.location='index_panel.php?module=news&file=main_news';</script>";
		}
		else{
			$_SESSION[error]="ไม่สามารถแก้ไขข้อมูลข่าวประกาศได้";
			echo "<script type='text/javascript'>window.location='index_panel.php?module=news&file=edit_news&nid=$_POST[nid]';</script>";
		}

	}
?>