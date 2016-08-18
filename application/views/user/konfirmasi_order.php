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
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
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
<?php
 $offset = 1;
    $total = 0;
?>

	<div class="container">
		<div class="heading">
			<h3>Konfirmasi Order</h3>
		</div>
		<div class="register-req">
			<p>Order anda akan segera kami proses, segera lakukan pembayaran sesuai metode pembayaran yang anda pilih</p>
		</div>
		<div class="review-payment">
			<h2>Detil Order</h2>
		</div>
			<div class="table-responsive cart_info">
				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<td class="image">Item</td>
							<td class="description"></td>
							<td class="price">Harga</td>
							<td class="quantity">Jumlah</td>
							<td class="total">Sub Total</td>
						</tr>
					</thead>
					<tbody>
						<?php $i=1;?>
						<?php foreach($detil_belanja as $row):?>
						<tr>
							<td class="cart_product">
								<a href=""><img style="height:60px;" src="<?php echo base_url().$row->image;?>" alt=""></a>
							</td>
							<td class="cart_description">
								<h4><a href=""><?php echo $row->nama_produk;?></a></h4>
								<p>ID: <?php echo $row->produk_sku;?></p>
							</td>
							<td class="cart_price">
								<p><?php echo $this->fungsi->rupiah($row->harga);?></p>
							</td>
							<td class="cart_quantity">
								<div class="cart_quantity_button">
									<input class="cart_quantity_input" type="text" disabled="disabled" name="quantity" value="<?php echo $row->jml_order;?>" autocomplete="off" size="2">
								</div>
							</td>
							<td class="cart_total">
								<p class="cart_total_price">
									<?php $subtotal = $row->harga * $row->jml_order;?>
									<?php $total = $total + $subtotal;?>
									<?php $biaya = $row->biaya;?>
									<?php echo $this->fungsi->rupiah($subtotal);?>
								</p>
							</td>
						</tr>
						<?php endforeach;?>
						<tr>
							<td colspan="3">
								<?php $pembayaran=$this->db->query("select MAX(id_order)AS id_order, metode from tbl_pembayaran");?>
								<div class="register-req">
									<?php foreach($pembayaran->result() as $row):?>
									<p>Metode Pembayaran yang dipilih : 
										<?php if($row->metode == 1){?>
											<span>Transfer Bank </span>
										<?php }else{?>
											<span>Bayar Ditempat</span>
										<?php }?>
									</p>
									<p>
										<?php if($row->metode == 1){?>
											<span>Segera Lakukan Transfer ke Bank Mandiri </span><br />
											<span>No Rek : </span><br />
											<span>Atasnama : </span>
										<?php }else{?>
											<span>Embayaran dilakukan apabila barang telah sampai ditempat anda</span>
										<?php }?>
									</p>
									<?php endforeach;?>
								</div>
							</td>
							<td colspan="2">
								<table class="table table-condensed total-result">
									<tr>
										<td>Sub Total</td>
										<td>
											<?php echo $this->fungsi->rupiah($total);?>
										</td>
									</tr>
									<tr class="shipping-cost">
										<td>Biaya Kirim</td>
										<td><?php echo $this->fungsi->rupiah($biaya);?></td>										
									</tr>
									<tr>
										<td>Total Belanja</td>
										<td><span><?php echo $this->fungsi->rupiah($total + $biaya);?></span></td>
									</tr>
								</table>
							</td>
						</tr>
					</tbody>
				</table>
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
