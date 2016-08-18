<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Home | E-Shopper</title>
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
<?php 
		if(isset($_SESSION['pos']) ){
			$id_biaya		= $_SESSION['pos']['id_biaya'];
			$metode			= $_SESSION['pos']['metode'];
		}else{
			$id_biaya ='';
			$metode	='';
		}
	?>
	<header id="header">
		<?php echo $this->load->view('user/header');?>
	</header>
	<?php echo form_open('cart/update_keranjang'); ?>
	<section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="#">Home</a></li>
				  <li class="active">Shopping Cart</li>
				</ol>
			</div>
			<div class="table-responsive cart_info">
				
				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<td class="image">Item</td>
							<td class="description"></td>
							<td class="price">Harga</td>
							<td class="quantity">Jumlah</td>
							<td class="total">Total</td>
							<td></td>
						</tr>
					</thead>
					<tbody>
					<?php if($this->cart->total_items() > 0): ?>
					<?php $i = 1; ?>
					<?php foreach($this->cart->contents() as $items): ?>
						<tr>
							<td class="cart_product">
								<?php $id= $items['id'];
									$kode=$this->db->query("select * from tbl_produk where id_produk = $id");?>
								<?php foreach($kode->result_array() as $row):?>
								<img style="height:60px;" src="<?php echo base_url().$row['image'];?>" alt="">
								<?php endforeach;?>
							</td>
							<td class="cart_description">
								<h4><?php echo $items['name'];?></h4>
								<?php $id= $items['id'];
									$kode=$this->db->query("select * from tbl_produk where id_produk = $id");?>
									<?php foreach($kode->result_array() as $row):?>
								<p><?php echo $row['produk_sku'];?></p>
									<?php endforeach;?>
							</td>
							<td class="cart_price">
								<p><?php echo $this->cart->format_number($items['price']); ?></p>
							</td>
							<td class="cart_quantity">
								<div class="cart_quantity_button">
									<?php echo form_hidden('rowid[]', $items['rowid']); ?>
									
							  <?php /*echo form_input(array('name' => 'qty[]', 'value' => $items['qty'], 'maxlength' => '3', 'size' => '2','class'=>'cart_quantity_input')); */?>
							  
									<input class="cart_quantity_input" type="text" name="qty[]" value="<?php echo $items['qty'];?>" autocomplete="off" size="2" onkeyup="this.form.submit()">
								</div>
							</td>
							<td class="cart_total">
								<p class="cart_total_price">Rp <?php echo $this->cart->format_number($items['subtotal']); ?></p>
							</td>
							<td class="cart_delete">
								<a class="cart_quantity_delete " onclick="return confirm('Anda Yakin ?')"href="<?php echo base_url(); ?>cart/hapus_keranjang/<?php echo $items['rowid']; ?>"><i class="fa fa-times"></i></a>
							</td>
						</tr>
						<?php $i++; ?>
					<?php endforeach; ?>
						<tr>
					<?php echo form_close()?>
						</tr>
				<?php endif;?>
					<?php if($this->cart->total_items() < 1):?>
						<tr>
							<td colspan="5">No item in your cart.</td>
						</tr>
					<?php endif;?>				
					</tbody>
				</table>
				
				
			</div>
		</div>
	</section> <!--/#cart_items-->
	<?php echo form_close();?>
	<section id="do_action">
		<div class="container">
			<div class="heading">
				<h3>Ikuti Langkah Selanjutnya</h3>
				<p>Pilih metode Pembayaran dan pengiriman untuk pesanan anda.</p>
			</div>
			<div class="row">
				<div class="col-sm-6">
					<div class="chose_area">
						<?php echo form_open('cart/biaya_kirim')?>
						<ul class="user_option">
							<li>
								<input name="metode" type="radio" value="1"<?php if($metode == 1)echo 'checked';?> />
								<label>Transfer Bank</label>
							</li>
							<li>
								<input name="metode" type="radio" value="2" <?php if($metode == 2)echo 'checked';?>/>
								<label>Pembayaran Ditempat</label>
							</li>
						</ul>
						
						<ul class="user_info">
							<li class="single_field">
								<label>Pilih Kota</label>
								<?php $query = $this->db->query("SELECT * FROM tbl_biaya_kirim ORDER BY nama_kota ASC");?>
								<select name="id_biaya" onChange="this.form.submit()">
									<option value="">Pilih Kota Tujuan</option>
									<?php foreach($query->result() as $bk):?>
									<option value="<?php echo $bk->id_biaya;?>"
									<?php if($this->session->userdata('sesi_kotakirim') == $bk->id_biaya)echo 'selected';?> >
										<?php echo $bk->nama_kota;?>
									</option>
									<?php endforeach ?>
								</select>
							</li>
						</ul>
						<?php echo form_close()?>
					</div>
				</div>
				<div class="col-sm-6">
				<form action="<?php echo site_url('order_pesanan/add_order');?>" method="post">
					<div class="total_area">
					
					  <?php if(!empty ($nota)){
								foreach($nota as $row):
									$kode = $row->no_order + 1;
								endforeach;
							}else{
								$kode = 1;
							}
							$hasil = str_pad($kode,7,"0", STR_PAD_LEFT) ;
							$no_nota = $hasil;?>
						<?php 				
							$id = $this->session->userdata('id_order');
						?>
						<ul>
							<li>No Order
								<span>NO-<?php echo $no_nota;?></span>
								<input name="metode" type="hidden" value="<?php echo $metode;?>" />
								
								<input type="hidden" name="no_order" value="NO-<?php echo $no_nota;?>" />
							</li> 
							<li>Sub Total 
								<span>
									<?php $totalbelanja = $this->cart->total();
										echo $this->fungsi->rupiah($totalbelanja);
									  $this->session->set_userdata('sesi_totalbelanja', $totalbelanja);
									  ?>
					  			</span>
							</li>
							<li>Biaya Kirim <span><?php echo $this->fungsi->rupiah($this->session->userdata('sesi_biayakirim'));?></span>
							<input type="hidden" name="kode_biaya" value="<?php echo $this->session->userdata('id_biaya');?>" />
							</li>
							<li>Total 
								<span>
									<?php $total = $this->cart->total() + $this->session->userdata('sesi_biayakirim');
										echo $this->fungsi->rupiah($total);
										$this->session->set_userdata('tot_tagihan',$total);
									?>
								</span>
								<input type="hidden" name="tagihan" value="<?php echo $total;?>" />
							</li>
						</ul>
							<a class="btn btn-default update" href="<?php echo site_url('member/index');?>">Lanjut Belanja</a>
							<button type="submit" class="btn btn-default check_out">Selesai Belanja</button>
							
					</div>
				</form>
				</div>
				
			</div>
			
		</div>
	</section>
	<footer id="footer"><!--Footer-->
		<?php echo $this->load->view('user/footer');?>
	</footer><!--/Footer-->
	

  
    <script src="<?php echo base_url();?>Eshopper/js/jquery.js"></script>
	<script src="<?php echo base_url();?>Eshopper/js/bootstrap.min.js"></script>
	<script src="<?php echo base_url();?>Eshopper/js/jquery.scrollUp.min.js"></script>
	<script src="<?php echo base_url();?>Eshopper/js/price-range.js"></script>
    <script src="<?php echo base_url();?>Eshopper/js/jquery.prettyPhoto.js"></script>
    <script src="<?php echo base_url();?>Eshopper/js/main.js"></script>

</body>
</html>
