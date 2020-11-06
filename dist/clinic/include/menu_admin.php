<ul class="nav" id="side-menu">
	<li class="sidebar-search">
		<div class="input-group custom-search-form">
			<input type="text" class="form-control" placeholder="Search...">
			<span class="input-group-btn">
				<button class="btn btn-default" type="button">
					<i class="fa fa-search"></i>
				</button>
			</span>
		</div>
		<!-- /input-group -->
	</li>
    <?	if($_SESSION[login_type]=="1"){ //ผู้ดูแลระบบ	?>
    
    <li>
		<a  href="index_panel.php"><i class="fa fa-dashboard fa-fw"></i> ส่วนหลัก</a>
	</li>
	<li class="">
		<a href="#"><i class="fa fa-edit fa-fw"></i> จัดการข้อมูล<span class="fa arrow"></span></a>
		<ul class="nav nav-second-level">
			<li><a href="index_panel.php?module=doctor&file=main_doctor"><span class="badge pull-right">42</span>จัดการข้อมูลทันตแพทย์</a></li>
			<li><a href="index_panel.php?module=employee&file=main_employee">จัดการข้อมูลพนักงาน</a></li>
			<li><a href="index_panel.php?module=patient&file=main_patient">จัดการข้อมูลผู้ป่วย</a></li>
			<li><a href="index_panel.php?module=drug&file=main_drug">จัดการข้อมูลคลังเวชภัณฑ์</a></li>
			<li><a href="index_panel.php?module=drug_type&file=main_drug_type">จัดการประเภทเวชภัณฑ์</a></li>
			<li><a href="index_panel.php?module=appoint&file=main_appoint">จัดการนัดหมาย</a></li>
			<li><a href="index_panel.php?module=order&file=main_order">จัดการการจัดซื้อ</a></li>
			<li><a href="index_panel.php?module=revenue&file=main_revenue">จัดการรายได้</a></li>
			<li><a href="index_panel.php?module=salary&file=main_salary">จัดการเงินเดือน</a></li>
		</ul>
	</li>
	<li class="">
		<a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> รายงานข้อมูล<span class="fa arrow"></span></a>
		<ul class="nav nav-second-level">
			<li class="active"><a href="index_panel.php?module=report&file=report_appoint">รายงานนัดหมาย</a></li>
			<li><a href="index_panel.php?module=report&file=report_drug">รายงานคลังเวชภัณฑ์</a></li>
			<li><a href="index_panel.php?module=report&file=report_purchaser">รายงานจัดซื้อเวชภัณฑ์</a></li>
			<li><a href="index_panel.php?module=report&file=report_dispense">รายงานสั่งจ่ายยา</a></li>
            <li><a href="index_panel.php?module=report&file=report_treatment">รายงานการรักษา</a></li>
			<li><a href="index_panel.php?module=report&file=report_revenue">รายงานรายรับ</a></li>
			<li><a href="index_panel.php?module=report&file=report_cost">รายงานรายจ่าย</a></li>
		</ul>
	</li>
    
    <?	}elseif($_SESSION[login_type]=="2"){ //เจ้าของกิจการ	?>
    
    <!--เจ้าของกิจการ-->
    <li class="active">
		<a  href="index_panel.php" class="active"><i class="fa fa-dashboard fa-fw"></i> เจ้าของกิจการ</a>
	</li>
    <li>
		<a href="#"><i class="fa fa-edit fa-fw"></i> จัดการข้อมูล<span class="fa arrow"></span></a>
		<ul class="nav nav-second-level">
			<li><a href="index_panel.php?module=drug&file=main_drug">จัดการข้อมูลคลังเวชภัณฑ์</a></li>
			<li><a href="index_panel.php?module=order&file=main_order">จัดการการจัดซื้อ</a></li>
		</ul>
	</li>
	<li>
		<a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> รายงานข้อมูล<span class="fa arrow"></span></a>
		<ul class="nav nav-second-level">
			<li><a href="index_panel.php?module=report&file=report_drug">รายงานคลังเวชภัณฑ์</a></li>
			<li><a href="index_panel.php?module=report&file=report_purchaser">รายงานจัดซื้อเวชภัณฑ์</a></li>
			<li><a href="index_panel.php?module=report&file=report_revenue">รายงานรายรับ</a></li>
			<li><a href="index_panel.php?module=report&file=report_cost">รายงานรายจ่าย</a></li>
            <li><a href="index_panel.php?module=report&file=report_treatment">รายงานการรักษา</a></li>
		</ul>
	</li>
    <li>
		<a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> จัดการหน้าเว็บ<span class="fa arrow"></span></a>
		<ul class="nav nav-second-level">
			<li class="active"><a href="index_panel.php?module=news&file=main_news">จัดการข่าวประกาศ</a></li>
            <li><a href="index_panel.php?module=contact&file=main_contact">จัดการหน้าติดต่อ</a></li>
            <li><a href="index_panel.php?module=setting&file=edit_setting">ตั้งค่าระบบ</a></li>
		</ul>
	</li>
    
    <?	}elseif($_SESSION[login_type]=="3"){ //ทันตแพทย์	?>
    
    <!--ทันตแพทย์-->
	<li>
		<a href="#"><i class="fa fa-edit fa-fw"></i> ทันตแพทย์ : การรักษา<span class="fa arrow"></span></a>
		<ul class="nav nav-second-level">
			<li><a class="active" href="index_panel.php?module=patient&file=check_patient"><span class="badge pull-right">42</span>ตรวจผู้ป่วย</a></li>
			<li><a href="index_panel.php?module=patient&file=main_patient">ประวัติผู้ป่วย</a></li>
			<li><a href="../fullcalendar.php">ตารางนัดหมาย</a></li>
		</ul>
	</li>
	<li>
		<a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> รายงานข้อมูล<span class="fa arrow"></span></a>
		<ul class="nav nav-second-level">
			<li class="active"><a href="index_panel.php?module=report&file=report_appoint">รายงานนัดหมาย</a></li>
			<li><a href="index_panel.php?module=report&file=report_dispense">รายงานสั่งจ่ายยา</a></li>
			<li><a href="index_panel.php?module=report&file=report_drug">รายงานคลังเวชภัณฑ์</a></li>
		</ul>
	</li>
    
    <?	}elseif($_SESSION[login_type]=="4"){ //พนักงาน	?>
    
    <!--พนักงาน-->
	<li>
		<a href="#"><i class="fa fa-edit fa-fw"></i> หน้าที่ประจำวัน<span class="fa arrow"></span></a>
		<ul class="nav nav-second-level">
			<li><a class="active" href="index_panel.php?module=patient&file=main_quere"><span class="badge pull-right">42</span>คิวข้อมูลผู้ป่วย</a></li>
			<li><a href="index_panel.php?module=patient&file=main_patient">ข้อมูลผู้ป่วย</a></li>
			<li><a href="index_panel.php?module=drug&file=main_drug">ข้อมูลคลังเวชภัณฑ์</a></li>
            <li><a href="index_panel.php?module=order&file=main_order">จัดการการจัดซื้อ</a></li>
			<li><a href="index_panel.php?module=room&file=main_room">จัดการห้องตรวจ</a></li>
            <li><a href="index_panel.php?module=treat&file=main_treat_dispen">ใบนัดและจ่ายยา</a></li>
            <li><a href="index_panel.php?module=receipt&file=main_receipt">พิมพ์ใบเสร็จ</a></li>
		</ul>
	</li>
    <li>
		<a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> รายงาน<span class="fa arrow"></span></a>
		<ul class="nav nav-second-level">
			<li><a href="index_panel.php?module=report&file=report_appoint">รายงานนัดหมาย</a></li>
		</ul>
	</li>
    
    <?	}elseif($_SESSION[login_type]=="5"){ //สมาชิก	?>
    
    <?	}else{}?>
</ul>
