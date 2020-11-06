<?php
	mysql_connect("localhost","root","1234") or die(mysql_error());
	mysql_select_db("medical") or die(mysql_error());
	mysql_query("SET character_set_results=utf8") or die(mysql_error());
	mysql_query("SET character_set_client=utf8") or die(mysql_error());
	mysql_query("SET character_set_connection=utf8") or die(mysql_error());
	mysql_query("SET NAMES UTF8") or die(mysql_error());
	

	function fb_date($timestamp){
		$difference = time() - $timestamp;
		$periods = array("วินาที", "นาที", "ชั่วโมง");
		$starting=" เมื่อ ";
		$ending=" ที่แล้ว";
		if($difference<60){
			$j=0;
			$periods[$j].=($difference != 1)?"s":"";
			$difference=($difference==3 || $difference==4)?"a few ":$difference;
			$text = "$starting $difference $periods[$j] $ending";
		}elseif($difference<3600){
			$j=1;
			$difference=round($difference/60);
			$periods[$j].=($difference != 1)?"s":"";
			$difference=($difference==3 || $difference==4)?"a few ":$difference;
			$text = "$starting $difference $periods[$j] $ending";		
		}elseif($difference<86400){
			$j=2;
			$difference=round($difference/3600);
			$periods[$j].=($difference != 1)?"s":"";
			$difference=($difference != 1)?$difference:"about an ";
			$text = "$starting $difference $periods[$j] $ending";		
		}elseif($difference<172800){
			$difference=round($difference/86400);
			$periods[$j].=($difference != 1)?"s":"";
			$text = "เมื่อวานนี้ ".date("g:ia",$timestamp);								
		}else{
			if($timestamp<strtotime(date("Y-01-01 00:00:00"))){
				$text = date("l j, Y",$timestamp)." at ".date("g:ia",$timestamp);		
			}else{
				$text = date("l j",$timestamp)." at ".date("g:ia",$timestamp);			
			}
		}
		return $text;
	}
	
	function compareDate($date1,$date2) {
		$arrDate1 = explode("-",$date1);
		$arrDate2 = explode("-",$date2);
		$timStmp1 = mktime(0,0,0,$arrDate1[1],$arrDate1[2],$arrDate1[0]);
		$timStmp2 = mktime(0,0,0,$arrDate2[1],$arrDate2[2],$arrDate2[0]);

		return $timStmp1-$timStmp2;
	}
?>