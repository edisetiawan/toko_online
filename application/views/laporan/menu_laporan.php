<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
<script type="text/javascript">
	$(function() {
		$("#datepicker1").datepicker({
			dateFormat:'yy-mm-dd',
			changeMonth:true,
			changeYear:true,
		});
		$("#datepicker2").datepicker({
			dateFormat:'yy-mm-dd',
			changeMonth:true,
			changeYear:true,
		});
		$("#datepicker3").datepicker({
			dateFormat:'yy-mm-dd',
			changeMonth:true,
			changeYear:true,
		});
		$("#datepicker4").datepicker({
			dateFormat:'yy-mm-dd',
			changeMonth:true,
			changeYear:true,
		});
	});
</script>
<link rel="stylesheet" href="<?php echo base_url();?>public/js/themes/base/jquery.ui.all.css">

	<script src="<?php echo base_url();?>public/js/ui/jquery.ui.core.js"></script>
	<script src="<?php echo base_url();?>public/js/ui/jquery.ui.widget.js"></script>
	<script src="<?php echo base_url();?>public/js/ui/jquery.ui.datepicker.js"></script>

	<!--<script src="<?php echo base_url();?>public/js/jquery-1.8.2.js"></script>-->
</head>

<body>

<section class="content-header">
    <h1>
        Laporan
    </h1>
</section>

        <!-- Main content -->
<section class="content">
	<div class="row">
    	<div class="col-xs-6">
        	<div class="box">
            	<div class="box-header">
                	<h3 class="box-title">Laporan Transaksi</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
					<form class="form-horizontal"action="<?php echo site_url('admin/laporan/lap_order');?>" method="post">
					<div class="row">
							<div class="form-group">
								<label class="col-sm-3 control-label">Status Sewa</label>
								<div class="col-sm-4">
									<select name="status_order" class="form-control">
										<option value="none">--Pilih Status--</option>
										<option value="1">Menunggu</option>
										<option value="2">Dikirim</option>
										<option value="3">Dibatalkan</option>
									</select>
									<font color="#FF0000"><?php echo form_error('status_order');?></font>
								</div>
							</div>

							<div class="form-group">
								<label class="col-sm-3 control-label">Tgl Awal</label>
								<div class="col-sm-5">
									<input type="text" id="datepicker1" class="form-control" name="tgl_awal1">
									<font color="#FF0000"><?php echo form_error('tgl_awal1');?></font>
								</div>
							</div>
							
							<div class="form-group">
								<label class="col-sm-3 control-label">Tgl Akhir</label>
								<div class="col-sm-5">
									<input type="text" id="datepicker2" class="form-control" name="tgl_akhir1">
									<font color="#FF0000"><?php echo form_error('tgl_akhir1');?></font>
								</div>
							</div>
							<br />&nbsp;
							<div class="form-group">
								<label class="col-sm-3 control-label">&nbsp;</label>
								<div class="col-sm-8">
									<button type="submit" name="btn" class="btn btn-info"> Cetak</button>
								</div>
							</div>
					</div>
					</form>
				</div>
			</div>
		</div>
		
	</div>
</section>

</body>
</html>
