<script>    
	$(document).ready(function(){
		function tampildata(){
		   $.ajax({
			type:"POST",
			url:"<?php echo site_url('home/tampil_komen');?>",    
			success: function(data){                 
				$('#isi_komentar').html(data);
			}  
		   });
        }
		setInterval(function(){
			tampildata();},1000);
	});
</script>				
<?php 
		if(isset($_SESSION['pos']) ){
			$id_produk		= $_SESSION['pos']['id_produk'];
			$nama_lengkap	= $_SESSION['pos']['nama_lengkap'];
			$email			= $_SESSION['pos']['email'];
		}else{
			$id_produk 		='';
			$nama_lengkap	='';
			$email			='';
		}
	?>
	
				<?php foreach($detil as $row):?>
				<?php $id_produk = $row->id_produk;?>
					<div class="product-details">
						<div class="col-sm-5">
							<div class="view-product">
								<img src="<?php echo base_url().$row->image;?>" alt="" />
								<h3>ZOOM</h3>
							</div>
						</div>
						<div class="col-sm-7">
							<div class="product-information"><!--/product-information-->
								<img src="images/product-details/new.jpg" class="newarrival" alt="" />
								<h2><?php echo $row->nama_produk;?></h2>
								<p>ID: <?php echo $row->produk_sku;?></p>
								<img src="images/product-details/rating.png" alt="" />
								<span>
									<span><?php echo $this->fungsi->rupiah($row->harga);?></span>
									<label>Quantity:</label>
									<input type="text" readonly="" value="<?php echo $row->jml;?>" />
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
								</span>
								<p><b>Availability:</b> In Stock</p>
								<p><b>Condition:</b> New</p>
								<p><b>Brand:</b> Demo-Toko</p>
								  <div class="social-sharing is-clean" data-permalink="http://sampleolshop.890m.com/home/">
									<a target="_blank" href="http://www.facebook.com/sharer.php?u=http://sampleolshop.890m.com/home/" class="share-facebook">
									  <span class="icon icon-facebook" aria-hidden="true"></span>
									  <span class="share-title">Share</span>
									</a>
									<a target="_blank" href="http://twitter.com/share?url=http://sampleolshop.890m.com/home/&amp;text=jQuery%20social%20media%20buttons%20with%20share%20counts%20on%20GitHub&amp;via=cshold" class="share-twitter">
									  <span class="icon icon-twitter" aria-hidden="true"></span>
									  <span class="share-title">Tweet</span>
									</a>
									<a target="_blank" href="http://plus.google.com/share?url=http://labs.carsonshold.com/social-sharing-buttons" class="share-google">
									  <span class="icon icon-google" aria-hidden="true"></span>
									  <span class="share-title">+1</span>
									</a>
								  </div>
							</div>
						</div>
					</div>
					<?php endforeach;?>
					<div class="row">
						<div class="col-sm-10">
							<div class="contact-form">
								<h2 class="title text-center">Komentar</h2>
								<div class="direct-chat-messages ">
								<?php 
									$tgl=date('Y-m-d');
									$query= $this->db->query("SELECT * FROM tbl_komentar WHERE tgl_komen LIKE'%$tgl%' 
										AND id_produk LIKE'%$id_produk%'
										ORDER BY id_komentar DESC
									");
								?>
								<?php foreach($query->result() as $row):?>
									<div class="direct-chat-msg col-sm-6  pull-left">
										<div class="direct-chat-info clearfix">
											<span class="direct-chat-name pull-left"><?php echo $row->nama_lengkap;?></span>
											<span class="direct-chat-emails pull-right"><?php echo $row->email;?></span>
										</div>
										<img class="direct-chat-img" src="<?php echo base_url();?>AdminLTE/dist/img/user1-128x128.jpg" alt="message user image">
										<div class="direct-chat-text">
											<?php echo $row->isi_komentar;?>
										</div>
									</div>
									<br />
								<?php endforeach;?>	
									<div class="direct-chat-msg right col-sm-7 pull-right" >
										<div class="direct-chat-info clearfix">
											<span class="direct-chat-name pull-left">$r[admin]</span>
											<span class="direct-chat-timestamp pull-right">$r[waktu]</span>
										</div>
										<img class="direct-chat-img" src="<?php echo base_url();?>AdminLTE/dist/img/user3-128x128.jpg" alt="message user image">
										<div class="direct-chat-text" style="background-color:#FF9900; color:#FFFFFF;">
											$r[pesan] 
										</div>
									</div>
								</div>
								<div class="status alert alert-success" style="display: none"></div>
								<form id="main-contact-form" class="contact-form row" name="contact-form" method="post" action="<?php echo site_url('home/add_komentar');?>">
									<div class="form-group col-md-6">
										<input type="text" name="nama_lengkap" class="form-control" required="required" placeholder="Name">
										<input type="hidden" name="id_produk" value="<?php echo $id_produk;?>" />
									</div>
									<div class="form-group col-md-6">
										<input type="email" name="email" class="form-control" required="required" placeholder="Email">
									</div>
									
									<div class="form-group col-md-12">
										<textarea name="isi_komentar" id="message" required="required" class="form-control" rows="5" placeholder="Your Message Here"></textarea>
									</div>                        
									<div class="form-group col-md-12">
										<input type="submit" name="kirim" class="btn btn-primary pull-right" value="Submit">
									</div>
								</form>
							</div>
						</div>
					</div>
					<p><br>&nbsp;</p>
					<div class="recommended_items">
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
													<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
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
					</div>
					
