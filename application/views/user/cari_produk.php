<link rel="stylesheet" href="<?php echo base_url();?>public/js/themes/base/jquery.ui.all.css">

	<script src="<?php echo base_url();?>public/js/ui/jquery.ui.core.js"></script>
	<script src="<?php echo base_url();?>public/js/ui/jquery.ui.widget.js"></script>
	<script src="<?php echo base_url();?>public/js/ui/jquery.ui.datepicker.js"></script>
<!--<script src="<?php echo base_url();?>public/js/jquery-1.8.2.js"></script>-->

<script type="text/javascript">
	$(function() {
		$("#datepicker").datepicker({
			dateFormat:'yy-mm-dd'
		});
	});
</script>

				<div class="features_items">
					
					<h2 class="title text-center">Features Items</h2>
					<div class="row">
					<?php $offset=$this->uri->segment(4)?>
				  	<?php if(count($hasil_cari->result_array()) >0){
						foreach($hasil_cari->result() as $row){?>
						<div class="col-sm-3">
							<div class="product-image-wrapper">
								<div class="single-products">
										<div class="productinfo text-center">
										<a class="example-image-link"href="<?php echo base_url().$row->image;?>"data-lightbox="example-1"data-title="<?php echo $row->nama_produk;?>">
											<img style=" height:180px; width:auto;" src="<?php echo base_url().$row->image;?>" alt="" /></a>
											<h2><?php echo $this->fungsi->rupiah($row->harga);?></h2>
											<p><?php echo $row->nama_produk;?></p>
											<div class="row">
											<table width="80%" align="center">
												<tr>
												<td>
											<form action="<?php echo site_url('cart/add_cart');?>" method="post">
												<input type="hidden" name="id_produk" value="<?php echo $row->id_produk;?>" />
												<input type="hidden" name="nama_produk" value="<?php echo $row->nama_produk;?>"/>								
												<input type="hidden"name="harga" value="<?php echo $row->harga;?>" />
												<input type="hidden" name="banyak" value="1" />
											<?php if($this->session->userdata('id_level') == 3){?>
											<button type="submit" class="btn btn-success "><i class="fa fa-shopping-cart"></i>  &nbsp;&nbsp; Beli</button>
											<?php }else{?>
											<a class="btn btn-success" href="<?php echo site_url('member/login');?>" onclick="alert('Anda Belum login sebagai Member !')"><i class="fa fa-shopping-cart"></i>&nbsp;&nbsp; Beli</a>
											<?php }?>
											</form>
												</td>
												<td>
											<form action="<?php echo site_url('home/detil_produk');?>" method="post" name="form1">
											<input type="hidden" name="id_produk" value="<?php echo $row->id_produk;?>" />
											<button type="submit" onclick="document.form1.submit();return false" class="btn btn-default"><i class="fa fa-eye"></i> Detil</button>
											</form>
												</td>
												</tr>
											</table>
											</div>
										</div>
										
								</div>
							</div>
						</div>
						<?php }
					}else{
						echo '<font color="red">Data Tidak ditemukan</font>';
					}?>
					</div>
							<div class="row">
								<ul class="pagination">
									<li><?php echo $this->pagination->create_links();?></li>
								</ul>							
							</div>
					
				</div><!--features_items-->
					
					<div class="recommended_items"><!--recommended_items-->
						<h2 class="title text-center">recommended items</h2>
						
						<div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
							<div class="carousel-inner">
								<div class="item active">	
								
								<?php foreach($terbaru as $row):?>
									<div class="col-sm-4">
										<div class="product-image-wrapper">
											<div class="single-products">
												<div class="productinfo text-center">
													<a class="example-image-link"href="<?php echo base_url().$row->image;?>"data-lightbox="example-1"data-title="<?php echo $row->nama_produk;?>">
											<img style="width:80px;" src="<?php echo base_url().$row->image;?>" alt="" /></a>
													<h2><?php echo $this->fungsi->rupiah($row->harga);?></h2>
													<p><?php echo $row->nama_produk;?></p>
													<form action="<?php echo site_url('cart/add_cart');?>" method="post">
													<input type="hidden" name="id_produk" value="<?php echo $row->id_produk;?>" />
													<input type="hidden" name="nama_produk" value="<?php echo $row->nama_produk;?>"/>								
													<input type="hidden"name="harga" value="<?php echo $row->harga;?>" />
													<input type="hidden" name="banyak" value="1" />
													<?php if($this->session->userdata('id_level') == 3){?>
													<button type="submit" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
													
													<?php }else{?>
													<a class="btn btn-default add-to-cart" href="<?php echo site_url('member/login');?>" onclick="alert('Anda Belum login sebagai Member !')"><i class="fa fa-shopping-cart"></i>Add to cart</a>
													<?php }?>
													</form>
												</div>
												
											</div>
										</div>
									</div>
								<?php endforeach;?>
									
								</div>
								<div class="item">	
								<?php foreach($terbaru as $row):?>
									<div class="col-sm-4">
										<div class="product-image-wrapper">
											<div class="single-products">
												<div class="productinfo text-center">
													<a class="example-image-link"href="<?php echo base_url().$row->image;?>"data-lightbox="example-1"data-title="<?php echo $row->nama_produk;?>">
											<img style="width:80px;" src="<?php echo base_url().$row->image;?>" alt="" /></a>
													<h2><?php echo $this->fungsi->rupiah($row->harga);?></h2>
													<p><?php echo $row->nama_produk;?></p>
													<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
												</div>
												
											</div>
										</div>
									</div>
								<?php endforeach;?>
									
								</div>
							</div>
							 <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
								<i class="fa fa-angle-left"></i>
							  </a>
							  <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
								<i class="fa fa-angle-right"></i>
							  </a>			
						</div>
					</div><!--/recommended_items-->

