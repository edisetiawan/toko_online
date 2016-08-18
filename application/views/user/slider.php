		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<div id="slider-carousel" class="carousel slide" data-ride="carousel">
						<ol class="carousel-indicators">
							<li data-target="#slider-carousel" data-slide-to="0" class="active"></li>
							<li data-target="#slider-carousel" data-slide-to="1"></li>
							<li data-target="#slider-carousel" data-slide-to="2"></li>
							<li data-target="#slider-carousel" data-slide-to="3"></li>
						</ol>
						
						<div class="carousel-inner">
							<?php $termurah = $this->db->query("select max(harga)as harga, nama_produk, image, keterangan 
									from tbl_produk where id_kategori = 2 
									");?>
							<?php foreach($termurah->result() as $row):?>
							<div class="item active">
								<div class="col-sm-8">
									<h1><span>E</span>-SHOPPER</h1>
									<h2><?php echo $row->nama_produk;?></h2>
									<p><?php echo word_limiter($row->keterangan,15);?></p>
									<button type="button" class="btn btn-default get">Get it now</button>
								</div>
								<div class="col-sm-4">
									<img style="height:380px;"src="<?php echo base_url().$row->image;?>"  alt="" /><br />
									<img style="height:62px;"src="<?php echo base_url();?>Eshopper/images/home/new.png" class="pricing" alt="" />
								</div>
							</div>
							<?php endforeach;?>
							
							<?php $promo = $this->db->query("select * from tbl_produk where id_kategori = 2 
									order by id_produk desc limit 3");?>
							<?php foreach($promo->result() as $row):?>
							<div class="item">
								<div class="col-sm-8">
									<h1><span>E</span>-SHOPPER</h1>
									<h2><?php echo $row->nama_produk;?></h2>
									<p><?php echo word_limiter($row->keterangan,15);?> </p>
									<button type="button" class="btn btn-default get">Get it now</button>
								</div>
								<div class="col-sm-4">
									<img style="height:380px;" src="<?php echo base_url().$row->image;?>" class="girl img-responsive" alt="" />
									<img style="height:62px;"src="<?php echo base_url();?>Eshopper/images/home/new.png" class="pricing" alt="" />
								</div>
							</div>
							<?php endforeach;?>
							
							
						</div>
						
						<a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
							<i class="fa fa-angle-left"></i>
						</a>
						<a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
							<i class="fa fa-angle-right"></i>
						</a>
					</div>
					
				</div>
			</div>
		</div>
