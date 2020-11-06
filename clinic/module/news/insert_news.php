<?
	if($_POST[n_title]=="" || $_POST[n_detail]==""){//ตรวจสอบค่าว่างทั้งหมด
		$_SESSION[warning]="กรุณากรอกข้อมูลข่าวประกาศให้ครบด้วยค่ะ.";
		echo "<script type='text/javascript'>window.location='index_panel.php?module=news&file=form_news';</script>";
	}else{
		$add_time=date("Y-m-d : H:i:s");
		
		$n_image = $_FILES['n_image']['name'];
		if($n_image !=""){ // อัพโหลดรูปประจำตัว
			$imageupload = $_FILES['n_image']['tmp_name'];
			$imageupload_name = $_FILES['n_image']['name'];
			$path = "image/news";
			$newwidth=300; // กำหนดความกว้างของรูป
			
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
			}
		}elseif($n_image ==""){ // อัพโหลดรูปประจำตัว
			$n_image_pix="news.png";
		}
		
		$sql="INSERT INTO news VALUES(			'',
																	'$_POST[n_title]', 
																	'$_POST[n_detail]', 
																	'$n_image_pix', 
																	'$add_time'
															)";
		if(mysql_query($sql) or die (mysql_error())){
			$_SESSION[success]="เพิ่มข้อมูลข่าวประกาศสำเร็จแล้ว";
			echo "<script type='text/javascript'>window.location='index_panel.php?module=news&file=main_news';</script>";
		}
		else{
			$_SESSION[error]="ไม่สามารถเพิ่มข้อมูลข่าวประกาศได้";
			echo "<script type='text/javascript'>window.location='index_panel.php?module=news&file=form_news';</script>";
		}

	}
?>