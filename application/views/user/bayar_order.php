<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
    <link href="<?php echo base_url();?>Eshopper/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>Eshopper/css/font-awesome.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>Eshopper/css/prettyPhoto.css" rel="stylesheet">
    <link href="<?php echo base_url();?>Eshopper/css/price-range.css" rel="stylesheet">
    <link href="<?php echo base_url();?>Eshopper/css/animate.css" rel="stylesheet">
	<link href="<?php echo base_url();?>Eshopper/css/main.css" rel="stylesheet">
	<link href="<?php echo base_url();?>Eshopper/css/responsive.css" rel="stylesheet">
    
	<link rel="shortcut icon" href="<?php echo base_url();?>Eshopper/images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo base_url();?>Eshopper/images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo base_url();?>Eshopper/images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo base_url();?>Eshopper/images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="<?php echo base_url();?>Eshopper/images/ico/apple-touch-icon-57-precomposed.png">
	

<link rel="stylesheet" href="<?php echo base_url();?>public/js/themes/base/jquery.ui.all.css">
	<script src="<?php echo base_url();?>public/js/jquery-1.8.2.js"></script>
	<script src="<?php echo base_url();?>public/js/ui/jquery.ui.core.js"></script>
	<script src="<?php echo base_url();?>public/js/ui/jquery.ui.widget.js"></script>
	<script src="<?php echo base_url();?>public/js/ui/jquery.ui.datepicker.js"></script>
	<script>
	$(function() {
		$( "#datepicker" ).datepicker();
	});
	</script>
</head>

<body>
	<header id="header">
		<?php echo $this->load->view('user/header');?>
	</header>

	<div class="container">
		<div class="heading">
			<h3>Konfirmasi Pembayaran</h3>
		</div>

			<?php echo form_open_multipart('pembayaran/bayar_order'); ?>
                <div class="box-body">
				  	<div class="row">
						<div class="col-md-12">
						<table width="90%">
							<tr>
								<td>
								<div class="form-group">
								  <label class="col-sm-4 control-label">No Order</label>
								  <div class="col-sm-5">
								  <?php $id_order = $pembayaran['id_order'];
								  
								  $detil = $this->db->query("select * from tbl_order where id_order = '$id_order' ");?>
								  <?php foreach($detil->result() as $row):?>
									<input type="text" readonly=""required="required" value="<?php echo $row->no_order;?>" class="form-control">
								  <?php endforeach;?>
									<input type="hidden" name="id_order" value="<?php echo $pembayaran['id_order'];?>" />
									
									
								  <font color="#FF0000"><?php echo form_error('no_order');?></font>
			
								  </div>
								</div>
								<br />&nbsp;
								
								<div class="form-group">
								  <label class="col-sm-4 control-label">Tagihan</label>
								  <div class="col-sm-5">
									<input type="text" readonly=""required="required" value="<?php echo $this->fungsi->rupiah($pembayaran['tagihan']);?>" class="form-control">
									<input type="hidden" name="tagihan" value="<?php echo $pembayaran['tagihan'];?>" />
								  <font color="#FF0000"><?php echo form_error('tagihan');?></font>
			
								  </div>
								</div>
								<br />&nbsp;
								
								<div class="form-group">
								  <label class="col-sm-4 control-label">Bayar</label>
								  <div class="col-sm-5">
									<input type="text" readonly=""required="required" value="<?php echo $this->fungsi->rupiah($pembayaran['jml_bayar']);?>" class="form-control">		
								  </div>
								</div>
								<br />&nbsp;
								
								<div class="form-group">
									<label class="col-sm-4 control-label">Kekurangan</label>
									<div class="col-sm-5">
									<?php $kekurangan = $pembayaran['tagihan'] - $pembayaran['jml_bayar'] ;?>
										<input type="text" readonly=""required="required" value="<?php echo $this->fungsi->rupiah($kekurangan);?>" class="form-control">
									</div>
								</div>
								<br />	
								</td>
								<td valign="top">
								<div class="form-group">
								  <label class="col-sm-4 control-label">No Transfer / Bayar</label>
								  <div class="col-sm-5">
									<input type="text" name="no_transfer"required="required" value="<?php echo $pembayaran['no_transfer'];?>" class="form-control">
									
								  <font color="#FF0000"><?php echo form_error('no_transfer');?></font>
			
								  </div>
								</div>
								<br />&nbsp;
								
								<div class="form-group">
								  <label class="col-sm-4 control-label">Bukti Transfer</label>
								  <table width="50%">
									<tr>
								  <div class="col-sm-0">							  
										<td>
										&nbsp;&nbsp;&nbsp;
											<?php if($pembayaran['image'] == ""){?>
										  <?php }else{?>
										  <img src="<?php echo base_url().$pembayaran['image'];?>"width="40" height="30" />
										  <?php }?>
										</td>
										<td valign="bottom">
								  <?php echo form_upload('image');?>	
										</td>
								  </div>
									</tr>
								</table>
								</div>
								

								<div class="form-group">
								  <label class="col-sm-4 control-label">Tgl Transfer / Bayar</label>
								  <div class="col-sm-5">
									<input type="text" id="datepicker" name="tgl_bayar"required="required" value="<?php echo $pembayaran['tgl_bayar'];?>" class="form-control">		
									<div id="datepicker"></div>
								  </div>
								</div>
								<br />&nbsp;

								<div class="form-group">
									<label class="col-sm-4 control-label">Jml Bayar</label>
									<div class="col-sm-5">
									<input type="text" name="jml_bayar"required="required" value="<?php echo $pembayaran['jml_bayar'];?>" class="form-control">
										
									</div>
								</div>
								<br />	
								</td>
							</tr>
							<tr>
								<td colspan="2">
									<br />
							<button type="submit" class="btn btn-success "><i class="fa fa-save"></i> &nbsp; Simpan</button>
							<a href="<?php echo site_url('order_pesanan/index');?>" class="btn btn-default add-to-cart"><i class="fa fa-eye"></i> Batal</a>
									
								</td>
							</tr>
						</table>
						</div>
					</div>
				</div>
			<?php form_close();?>		
				
	</div>

	<footer id="footer">
		<?php echo $this->load->view('user/footer');?>
	</footer>
	

  
    <script src="<?php echo base_url();?>Eshopper/js/jquery.js"></script>
	<script src="<?php echo base_url();?>Eshopper/js/bootstrap.min.js"></script>
	<script src="<?php echo base_url();?>Eshopper/js/jquery.scrollUp.min.js"></script>
	<script src="<?php echo base_url();?>Eshopper/js/price-range.js"></script>
    <script src="<?php echo base_url();?>Eshopper/js/jquery.prettyPhoto.js"></script>
    <script src="<?php echo base_url();?>Eshopper/js/main.js"></script>

</body>
</html>
