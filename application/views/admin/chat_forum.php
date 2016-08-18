<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
<script>    
		$(document).ready(function(){
		
		function tampildata(){
		   $.ajax({
			type:"POST",
			url:"<?php echo site_url('admin/home/ambil_pesan');?>",    
			success: function(data){                 
					 $('#isi_chat').html(data);
			}  
		   });
        }
  
  
		 $('#kirim').click(function(){
		   var pesan = $('#pesan').val(); 
		   var user = $('#user').val(); 
		   $.ajax({
			type:"POST",
			url:"<?php echo site_url('admin/home/kirim_chat');?>",    
			data: 'pesan=' + pesan + '&user=' + user,        
			success: function(data){                 
			  $('#isi_chat').html(data);
			}  
		   });
		  });
		  
		  
		  setInterval(function(){
					 tampildata();},1000);
		});
	</script>
	<style>
	  #isi_chat{height:400px;}
	</style>

</head>

<body>
<section class="content-header">
	<h1>
    	Forum
        <small>Group</small>
	</h1>
</section>
		
<section class="content">
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					<table width="100%">
						<tr>
							<td><h3 class="panel-title">Kotak Percakapan</h3></td>
							<td align="right">User Login : <?php echo $this->session->userdata('nama_lengkap');?></td>
						</tr>
					</table>
				</div>
				<div class="box-body">
					<div class="tab-pane fade active in" id="reviews" >
						<div class="body">
						<div class="direct-chat-messages" id="isi_chat">
													
						</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-12">			
				<div class="form-group">
					<div class="col-sm-2">
						<input placeholder="nama" value="<?php echo $this->session->userdata('nama_lengkap');?>" type="text" id="user" readonly="" class="form-control">
					</div>
					<div class="col-sm-8">
						
						<input placeholder="pesan" type="text" id="pesan" class="form-control">
					</div>
					<div class="col-sm-2">
						<input type="button" value="kirim" id="kirim" class="btn btn-info">
					</div>
				</div>
			</div>
		</div>
	</div><!-- /.row (main row) -->
</section><!-- /.content -->
</body>
</html>
