<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
<!-- onLoad="window.print()"-->
</head>

<body onLoad="window.print()">

<table  style="border:1px; border-style:outset;">
	<tr style="margin-bottom:10px;">
		<td valign="top"><img src="<?php echo base_url();?>public/logo.png"height="80" /></td>
		<td colspan="3" align="center" valign="top">
			<font size="5" style="font-family:"Brush Script MT" "><b>Gemini Futsal</b></font><br />
			<font size="-1">Jl. Raya Kandangan Temanggung, <br />
			Temanggung Jawa Tengah (56286)<br />
			Tlp : 0856-2169-9944, <br />
			</font>
		</td>
	</tr>
	<tr>
		<td valign="top" colspan="4"><hr /></td>
	</tr>
	<?php foreach($nota_sewa as $row):?>
	<tr>
		<td colspan="2" valign="top"> 
		<font size="-1">
			<table width="100%">
				<tr>
				<td>
					No Sewa<br /> 
					Tgl Sewa <br />
					Durasi
				</td> 
				<td>
					:<br />
					:<br />
					:
				</td> 
				<td>
					<?php echo $row->no_sewa;?><br />
					<?php echo $row->tgl_sewa;?><br />
					<?php echo $row->durasi;?> Jam
				</td>
				</tr>
			</table>
		</font>
		</td>
		<td colspan="2" align="right">
		<font size="2" class="pull-right">
			<table width="100%" style="padding-left:70px;">
				<tr>
				<td>
					Atasnama <br />
					Telp<br />
					Nama Tim
				</td> 
				<td>
					: <br />
					:<br />
					:
				</td> 
				<td>
					<?php echo $row->nama_lengkap;?><br />
					<?php echo $row->no_telp;?><br />
					<?php echo $row->nama_tim;?>
				</td>
				</tr>
				
			</table>
		</font>
		</td>
		
	</tr>
	<tr>
		<td valign="top" colspan="4"><hr /></td>
	</tr>
	<?php endforeach;?>
	<tr>
		<th>Jam Mulai</th>
		<th>Jam Selesai</th>
		<th>Harga</th>
		<th>Subtotal</th>
	</tr>
	
<?php
    $total = 0;
?>
	<?php foreach($detil_sewa as $row):?>
	
	<tr>
		<td style="padding-bottom:5px"><?php echo $row->jam_mulai;?></td>
		<td align="center"><?php echo $row->jam_selesai;?></td>
		<td align="right"><?php echo $this->fungsi->rupiah($row->harga);?></td>
		<td align="right">
			<?php $subtotal =  $row->harga;?>
			<?php echo $this->fungsi->rupiah($subtotal);?>
		</td>
	</tr>
	<?php $total = $total + $subtotal; ?>
	<?php endforeach?>
	<?php $tagihan = $total;?>
	<tr>
		<td colspan="4">&nbsp;</td>
	</tr>
	<tr>
		<td style="padding-bottom:15px"align="right" colspan="3">Total Tagihan </td>
		<td style="padding-bottom:15px"align="right"><?php echo $this->fungsi->rupiah($tagihan);?></td>
	</tr>
	
	<tr>
		<td colspan="4"><p>&nbsp;</p></td>
	</tr>
	<tr>
		<td colspan="2" align="center">&nbsp;
			
		</td>
		<td colspan="2" align="center" valign="bottom">
			<p>(_________________)</p>
		</td>
	</tr>
	<tr>
		<td style="border-top:inset;" colspan="4" align="center">
			<p>
			Terima kasih Atas Kunjungan Anda
			</p>
		</td>
	</tr>
</table>
</body>
</html>
