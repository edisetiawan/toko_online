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
				url:"<?php echo site_url('member/ambil_pesan');?>",    
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
					url:"<?php echo site_url('member/kirim_chat');?>",    
					data: 'pesan=' + pesan + '&user=' + user ,        
					success: function(data){                 
			  			$('#isi_chat').html(data);
					}  
		 		});
		 });
		  
		setInterval(function(){
			tampildata();},1000);
	});
</script>

</head>

<body>
<div class="row">
	<div class="col-sm-12">
		<div class="box box-warning direct-chat direct-chat-warning">
			<div class="box-header" style="background-color:#FF9900">
				<h3 class="box-title" style="color:#FFFFFF;">Komentar</h3>
				<div class="box-tools pull-right">
					<button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
				</div>
			</div>
			<div class="box-body">
				<div class="tab-pane fade active in" id="reviews" >
					<ul>
						<li><a href=""><i class="fa fa-clock-o"></i><?php echo date('H:i:s');?></a></li>
						<li><a href=""><i class="fa fa-calendar-o"></i><?php echo date('d M Y');?></a></li>
					</ul>
										
					<div class="body">
						<div class="direct-chat-messages "id="isi_chat"></div>
					</div>
				</div>
				<div class="col-sm-12">
					<form action="<?php site_url('member/komentar');?>" method="post">
						<div class="col-sm-11">
						<input type="text" id="pesan" name="pesan" class="form-control" />
						</div>
						<input value="<?php echo $this->session->userdata('nama_lengkap');?>" type="hidden" id="user" name="user" >
						<button type="submit" id="kirim"class="btn btn-warning">Send</button>
					</form>
					<br>
				</div>
				
			</div>
		</div>
	</div>
</div>
</body>
</html>
