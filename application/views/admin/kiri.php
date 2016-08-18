        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">
             <!--<img src="../../../AdminLTE/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image" />-->&nbsp;
            </div>
            <div class="pull-left info">
              <p><?php echo $this->session->userdata('nama_lengkap');?></p>
              <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
          </div>

          <ul class="sidebar-menu">
            <li class="header"><br>&nbsp;</li>
            <li class="active treeview">
              <a style="color:#FFFFFF;"href="<?php echo site_url('admin/home/index');?>">
                <i class="glyphicon glyphicon-home"></i> <span>Dashboard</span>
              </a>
            </li>
            <li class="treeview">
              <a style="color:#FFFFFF;"href="#">
                <i class="glyphicon glyphicon-file"></i> <span>Master</span>
                 <i class="fa fa-angle-left pull-right"></i>
              </a>
			 <?php $id_level = $this->session->userdata('id_level');?>
			  <?php if($id_level == 1){?>
              <ul class="treeview-menu">
                <li>
					<a style="color:#FFFFFF;" href="<?php echo site_url('admin/kategori/index');?>">
						<i class="fa fa-circle-o"></i> Kategori
					</a>
				</li>
				<li>
					<a style="color:#FFFFFF;"href="<?php echo site_url('admin/produk/index');?>">
				  		<i class="fa fa-circle-o"></i> Produk
					</a>
				</li>

              </ul>
			  <?php }else{?>
			  	<ul class="treeview-menu">
					<li>
					  <a style="color:#FFFFFF;"href="<?php echo site_url('admin/produk/index');?>">
						
						<span>Produk</span> <small class="label pull-right bg-green"></small>
					  </a>
					</li>
				</ul>
			  <?php }?>
            </li>
			<li><a style="color:#FFFFFF;"href="<?php echo site_url('admin/home/chat_forum');?>">
				<i class="glyphicon glyphicon-comment"></i>  Chat</a>
			</li>
            <li><a style="color:#FFFFFF;"href="<?php echo site_url('admin/order_pesanan/index');?>">
				<i class="glyphicon glyphicon-list"></i>  Order</a>
			</li>
			<li class="treeview">
              <a style="color:#FFFFFF;"href="<?php echo site_url('admin/pembayaran/index');?>">
                <i class="glyphicon glyphicon-credit-card"></i> 
				<span>Pembayaran</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
            </li>
            <li class="treeview">
              <a style="color:#FFFFFF;"href="">
                <i class="glyphicon glyphicon-book"></i>
                <span>Laporan</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
			  <?php $id_level = $this->session->userdata('id_level');?>
			  <?php if($id_level == 1){?>
              <ul class="treeview-menu">
                <li class="treeview">
					<a style="color:#FFFFFF;"href="">
						
						Grafik
						<i class="fa fa-angle-left pull-right"></i>
					</a>
					<ul class="treeview-menu">
						<li>
							<form name="form1" action="<?php echo site_url('admin/grafik/grafik_pendapatan');?>" method="post">
								<input type="hidden" name="tahun" value="<?php echo date('Y');?>" />
								<a href="#" onclick="document.form1.submit();return false" style="padding-left:14px;"><i class="fa fa-circle-o"></i> Grafik Pendapatan</a>
							</form>
						</li>
						<li style="padding-top:14px;">
							<form name="form2" action="<?php echo site_url('admin/grafik/grafik_penjualan');?>" method="post">
							<input type="hidden" name="tahun" value="<?php echo date('Y');?>" />
							
							<a style="padding-left:14px;"href="#" onclick="document.form2.submit();return false"><i class="fa fa-circle-o"></i> Grafik Penjualan</a>
							</form>
						</li>
					</ul>
				</li>
                <li><a style="color:#FFFFFF;"href="<?php echo site_url('admin/laporan/index');?>"><i class="fa fa-circle-o"></i> Laporan</a></li>
              </ul>
				<?php }else{?>
				<ul class="treeview-menu">
					 <li><a style="color:#FFFFFF;"href="<?php echo site_url('admin/laporan/index');?>"><i class="fa fa-circle-o"></i> Laporan</a></li>
				</ul>
				<?php }?>
            </li>

          </ul>
        </section>
