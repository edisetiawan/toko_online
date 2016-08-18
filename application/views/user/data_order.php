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
	
<link href="<?php echo base_url();?>lightbox/css/lightbox.css" rel="stylesheet" />
<script src="<?php echo base_url();?>lightbox/js/jquery-1.11.0.min.js"></script>
<script src="<?php echo base_url();?>lightbox/js/lightbox.min.js"></script>

</head>

<body>
	<header id="header">
		<?php echo $this->load->view('user/header');?>
	</header>
<section id="cart_items">
	<div class="container">
		<div class="heading">
			<h3>Riwayat Pembelian</h3>
			
		</div>
			<div class="table-responsive cart_info">
				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<td class="image">Nota</td>
							<td class="description">Tanggal</td>
							<td class="price">Total Harga</td>
							<td class="quantity">Pembayaran</td>
							<td class="total">Status Order</td>
							<td></td>
						</tr>
					</thead>
					<tbody>
						<?php $i=1;?>
						<?php foreach($order as $row):?>
						<tr>
							<td class="cart_product">
								<?php echo $row->no_order;?>
							</td>
							<td class="cart_description">
								<?php echo $row->tgl_order;?>
							</td>
							<td class="cart_price">
								<span class="cart_total_price">
									<?php echo $this->fungsi->rupiah($row->tagihan);?></span>
							</td>
							<td class="cart_quantity">
								<?php if($row->metode == 1){?>
									<span>Transfer Bank</span>
								<?php }else{?>
									<span>Bayar Ditempat</span>
								<?php }?>
							</td>
							<td class="cart_total">
								<?php if($row->status_order == 1){?>
									Menunggu
								<?php }elseif($row->status_order == 2){?>
									Sudah Dikirim
								<?php }else{?>
									Batal
								<?php }?>
							</td>
							<td>
								<div class="btn-group">
								<a class="btn btn-default" href="<?php echo site_url('order_pesanan/detil_order/'.$row->id_order);?>"><i class="fa fa-print"></i> Detil</a>
								<?php if($row->metode == 1 and $row->status_bayar == "Kurang"){?>
								<a class="btn btn-danger" href="<?php echo site_url('pembayaran/bayar_order/'.$row->id_bayar);?>"><i class="fa fa-credit-card"></i> Bayar</a>
								<?php }else{?>
								<button disabled="disabled" class="btn btn-success"><i class="fa fa-credit-card"></i> Lunas</button>
								<?php }?>
								</div>
							</td>
						</tr>
						<?php endforeach;?>
						
					</tbody>
				</table>
			</div>
			<div class="row">
				<ul class="pagination">
					<li><?php echo $this->pagination->create_links();?></li>
				</ul>							
			</div>
	</div>
</section>
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
