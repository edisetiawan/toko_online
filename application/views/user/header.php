		<div class="header_top navbar-fixed-top">
			<div class="container">
				<div class="row">
					<div class="col-sm-6">
						<div class="contactinfo">
							<ul class="nav nav-pills">
								<li><a href="#"><i class="fa fa-phone"></i> +2 95 01 88 821</a></li>
								<li><a href="#"><i class="fa fa-envelope"></i> info@domain.com</a></li>
								<li><?php if($this->session->userdata('id_level') == 3){?>
									<a href="<?php echo site_url('member/chat_forum');?>"><i class="fa fa-comment"></i> Chatting</a>
									<?php }else{?>
										<a onclick="alert('Anda Belum login sebagai Member !')" href="<?php echo site_url('member/login');?>"><i class="fa fa-comment"></i> Chatting</a>
									<?php }?>
								</li>
							</ul>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="social-icons pull-right">
							<ul class="nav navbar-nav">
								<li><a href="#"><i class="fa fa-facebook"></i></a></li>
								<li><a href="#"><i class="fa fa-twitter"></i></a></li>
								<li><a href="#"><i class="fa fa-linkedin"></i></a></li>
								<li><a href="#"><i class="fa fa-dribbble"></i></a></li>
								<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header_top-->
		<p><br /></p>
		<div class="header-middle"><!--header-middle-->
			
			<div class="container">
				<div class="row">
					<div class="col-sm-4">
						<div class="logo pull-left">
							<a href="<?php echo site_url('home/index');?>"><img src="<?php echo base_url();?>Eshopper/images/home/logo.png" alt="" /></a>
						</div>
						
					</div>
					<div class="col-sm-8">
						<div class="shop-menu pull-right">
							<ul class="nav navbar-nav">
								<li><?php if($this->session->userdata('id_level') == 3){?>
									<a href="#"><i class="fa fa-user"></i> <?php echo $this->session->userdata('nama_lengkap');?></a>
									<?php }else{?>
									<a href="#"><i class="fa fa-user"></i> Account</a>
									<?php }?>
								</li>
								<li class="dropdown"><a href="#"><i class="fa fa-shopping-cart"></i> Keranjang</a></a>
                                    
									<ul role="menu" class="sub-menu">
                                        <li><?php if($this->session->userdata('id_level') == 3){?>
											<a style="background-color:#696763;" href="<?php echo site_url('cart/index');?>">Lihat Keranjang</a>
											<?php }else{?>
											<a style="background-color:#696763;" onclick="alert('Anda Belum login sebagai Member !')" href="<?php echo site_url('member/login');?>">Lihat Keranjang</a>
											<?php }?>
										</li>
										<li><?php if($this->session->userdata('id_level') == 3){?>
											<a style="background-color:#696763;"href="<?php echo site_url('order_pesanan/index');?>">Data Belanja</a></li>
											<?php }else{?>
											<a style="background-color:#696763;" onclick="alert('Anda Belum login sebagai Member !')" href="<?php echo site_url('member/login');?>">Data Belanja</a>
											<?php }?>
                                    </ul>
									
                                </li> 
								<li><?php if($this->session->userdata('id_level') == 3){?>
										<a href="<?php echo site_url('member/logout');?>"><i class="fa fa-lock"></i> Logout</a>
									<?php }else{?>
									<a href="<?php echo site_url('member/login');?>"><i class="fa fa-lock"></i> Login</a>
									<?php }?>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	
		<div class="header-bottom">
			<div class="container">
				<div class="row">
					<div class="col-sm-9">
						<div class="navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
						</div>
						<div class="mainmenu pull-left">
							<ul class="nav navbar-nav collapse navbar-collapse">
								<li><a href="<?php echo site_url('home/index');?>" class="active">Home</a></li>
								<li class="dropdown"><a href="#">Kategori<i class="fa fa-angle-down"></i></a>
								<?php $kategori = $this->db->query("select * from tbl_kategori order by nama_kategori asc");?>
                                    <ul role="menu" class="sub-menu">
										<?php foreach($kategori->result() as $row):?>
                                        <li><a href="<?php echo site_url('home/perkategori/'.$row->id_kategori);?>"><?php echo $row->nama_kategori;?></a></li>
										<?php endforeach;?>
										
                                    </ul>
                                </li> 
								<li class="dropdown"><a href="#">Profil<i class="fa fa-angle-down"></i></a>
                                    <ul role="menu" class="sub-menu">
                                        <li><a href="#">Blog List</a></li>
										<li><a href="#">Blog Single</a></li>
                                    </ul>
                                </li> 
								<li><a href="#">Contact</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-3">
						<div class=" pull-right">
							<form action="<?php echo site_url('home/cari_produk');?>" method="post">
							<table width="100%">
								<tr>
								<td>
							<input type="text" name="nama_produk" class="form-control" placeholder="Search"/>
								</td>
								<td>
							<button type="submit" class="btn btn-default" name="btn"><i class="fa fa-search"></i></button>
								</td>
								</tr>
							</table>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
