            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">ข่าวประกาศ <a href="index_panel.php?module=news&file=form_news"><button type="button" class="btn btn-primary">เพิ่มข้อมูลข่าวประกาศ</button></a></h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                	<!--Function Alert-->
                    <?	echo gatAlert(); ?>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                        	<i class="fa fa-users fa-fw"></i>
                            ข้อมูลข่าวประกาศ
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                            <?
								$result_news=mysql_query("SELECT News_ID, News_Title, News_Detail, News_Image, News_Date FROM news ");
							?>
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>รหัส</th>
                                            <th>หัวข้อ</th>
                                            <th width="15%">รูปปก</th>
                                            <th>วัน/เวลา</th>
                                            <th>ดำเนินการ</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                            <?
								while(list($News_ID, $News_Title, $News_Detail, $News_Image, $News_Date)=mysql_fetch_row($result_news)){ 
							?>
                                        <tr class="odd gradeX">
                                            <td class="center"><? echo $News_ID; ?></td>
                                            <td><? echo $News_Title; ?></td>
                                            <td><img src="image/news/<? echo $News_Image; ?>" height="50%"></td>
                                            <td><? echo $News_Date; ?></td>
                                            <td>
                                            <a href="index_panel.php?module=news&file=show_news&nid=<? echo $News_ID; ?>">
                                            	<button type="button" class="btn btn-info"><i class="fa fa-search-plus fa-fw"></i> เรียกดู</button>
                                            </a>
                                            <a href="index_panel.php?module=news&file=edit_news&nid=<? echo $News_ID; ?>">
                                            	<button type="button" class="btn btn-success"><i class="fa fa-pencil-square-o fa-fw"></i> แก้ไข</button>
                                            </a>
                                            <a href="index_panel.php?module=news&file=delete_news&nid=<? echo $News_ID; ?>">
                                				<button type="button" class="btn btn-danger"><i class="fa fa-trash-o fa-fw"></i> ลบ</button>
                                            </a>
                                            </td>
                                        </tr>
							<?
								}
							?>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>