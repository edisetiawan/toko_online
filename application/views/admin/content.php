<meta http-equiv="refresh" content="30; url=<?php $_SERVER['PHP_SELF']; ?>">
      
	    <section class="content-header">
          <h1>
            Dashboard
            <small>Control panel</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
         
          <div class="row">
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-blue">
                <div class="inner">
                  <?php $query=$this->db->query("Select Count(tgl_order)AS jml_order From tbl_order where tgl_order = CURDATE()");?>
				<?php foreach($query->result() as $row):?>
                  <h3><?php echo $row->jml_order;?>
				  	<i class="glyphicon glyphicon-list pull-right"></i> 
				  </h3>
				<?php endforeach;?>
                  <p>Order Pesanan</p>
                </div>
                <div class="icon">
                  <i class="ion ion-bag"></i>
                </div>
                <a href="<?php echo site_url('admin/order_pesanan/index');?>" class="small-box-footer">Detil <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
            
            <div class="col-lg-3 col-xs-6">
              <div class="small-box bg-green">
                <div class="inner">
                 <?php $query=$this->db->query("Select Count(tgl_bayar)AS jml_pembayar From tbl_pembayaran where tgl_bayar = CURDATE() AND id_order NOT IN('0') ");?>
				<?php foreach($query->result() as $row):?>
                  <h3><?php echo $row->jml_pembayar;?>
				  		<i class="glyphicon glyphicon-credit-card pull-right"></i>
				  </h3>
				<?php endforeach;?>
                  <p>Pembayaran </p>
                </div>
                <div class="icon">
                  <i class="ion ion-credit-card"></i>
                </div>
                <a href="<?php echo site_url('admin/pembayaran/index');?>" class="small-box-footer">Detil <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
          </div><!-- /.row -->
          <!-- Main row -->
		  
        </section>
