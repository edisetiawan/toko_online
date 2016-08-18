<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
<script type="text/javascript">
	$(function() {
		$("#datepicker").datepicker({
			dateFormat:'yy-mm-dd'
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
         Pembayaran
    </h1>
</section>

        <!-- Main content -->
<section class="content">
	<div class="row">
       <div class="col-md-12">
           <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Edit Pembayaran</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
			<form class="form-horizontal" action="" method="post">
                <div class="box-body">
				  	<div class="row">
						<div class="col-md-12">
						<table width="90%">
							<tr>
								<td>
								<div class="form-group">
								  <label class="col-sm-4 control-label">No ORder</label>
								  <div class="col-sm-5">
									<input type="text" readonly=""required="required" value="<?php echo $pembayaran->no_order;?>" class="form-control">
									<input type="hidden" name="id_order" value="<?php echo $pembayaran->id_order;?>" />
									
									
								  <font color="#FF0000"><?php echo form_error('no_order');?></font>
			
								  </div>
								</div>
								<br />
								
								<div class="form-group">
								  <label class="col-sm-4 control-label">Tagihan</label>
								  <div class="col-sm-5">
									<input type="text" readonly=""required="required" value="<?php echo $this->fungsi->rupiah($pembayaran->tagihan);?>" class="form-control">
									<input type="hidden" name="tagihan" value="<?php echo $pembayaran->tagihan;?>" />
								  <font color="#FF0000"><?php echo form_error('tagihan');?></font>
			
								  </div>
								</div>
								<br />
								
								<div class="form-group">
								  <label class="col-sm-4 control-label">Bayar</label>
								  <div class="col-sm-5">
									<input type="text" readonly=""required="required" value="<?php echo $this->fungsi->rupiah($pembayaran->jml_bayar);?>" class="form-control">		
								  </div>
								</div>
								<br />
								
								<div class="form-group">
									<label class="col-sm-4 control-label">Kekurangan</label>
									<div class="col-sm-5">
									<?php $kekurangan = $pembayaran->tagihan - $pembayaran->jml_bayar ;?>
										<input type="text" readonly=""required="required" value="<?php echo $this->fungsi->rupiah($kekurangan);?>" class="form-control">
									</div>
								</div>
								<br />	
								</td>
								<td valign="top">
								<?php if($pembayaran->metode == 1){?>
								<div class="form-group">
								  <label class="col-sm-4 control-label">No Transfer / Bayar</label>
								  <div class="col-sm-5">
									<input type="text" name="no_transfer"required="required" value="<?php echo $pembayaran->no_transfer;?>" class="form-control">
									
								  <font color="#FF0000"><?php echo form_error('no_transfer');?></font>
			
								  </div>
								</div>
								<br />
								
								<div class="form-group">
								  <label class="col-sm-4 control-label"></label>
								  <div class="col-sm-5">
								  	
								  </div>
								</div>
								<?php }else{?>
								
								<?php }?>
								<div class="form-group">
								  <label class="col-sm-4 control-label">Tgl Transfer / Bayar</label>
								  <div class="col-sm-5">
									<input type="text" id="datepicker" name="tgl_bayar"required="required" value="<?php echo $pembayaran->tgl_bayar;?>" class="form-control">		
								  </div>
								</div>
								<br />

								<div class="form-group">
									<label class="col-sm-4 control-label">Jml Bayar</label>
									<div class="col-sm-5">
									<input type="text" name="jml_bayar"required="required" value="<?php echo $pembayaran->jml_bayar?>" class="form-control">
										
									</div>
								</div>
								<br />	
								</td>
							</tr>
							<tr>
								<td colspan="2">
									<div class="box-footer">
										<button type="submit" class="btn btn-primary"> Simpan</button>
										<a href="<?php echo site_url('admin/pembayaran/index');?>" class="btn btn-danger">Batal</a>
									</div>
								</td>
							</tr>
						</table>
						</div>
					</div>
				</div>
			</form>
	        </div>
		</div>
	</div>
</section>
</body>
</html>
