<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
</head>

<body onLoad="window.print()">
<?php
 $offset = 1;
    $total = 0;
?>

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
		<td valign="top" colspan="2">
			<font size="-1">
			<table width="100%">
				<tr>
				<td>
					No Sewa<br /> 
					Tgl Sewa <br />
					Jam Mulai
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
			<font size="-1">
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
	<?php endforeach;?>
	<tr>
		<td valign="top" colspan="4"><hr /></td>
	</tr>
	<tr>
		<th>Jam Mulai</th>
		<th>Jam Selesai</th>
		<th>Harga</th>
		<th>Subtotal</th>
	</tr>
	
	<?php foreach($detil_sewa as $row):?>
	<tr>
		<td style="padding-bottom:5px"><?php echo $row->jam_mulai;?></td>
		<td align="center"><?php echo $row->jam_selesai;?></td>
		<td align="right"><?php echo $this->fungsi->rupiah($row->harga);?></td>
		<td align="right">
			<?php $subtotal = $row->harga;?>
			<?php echo $this->fungsi->rupiah($subtotal);?>
		</td>
	</tr>
	<?php $total = $total + $subtotal; ?>
	<?php endforeach?>
	
	<tr>
		<td style="padding-bottom:15px"align="right" colspan="3">Total Tagihan </td>
		<td style="padding-bottom:15px"align="right"><?php echo $this->fungsi->rupiah($total);?></td>
	</tr>
	
	<?php foreach($nota_pembayaran as $row):?>
	<tr>
		<td style="padding-bottom:15px"align="right" colspan="3">Jml Bayar </td>
		<td style="padding-bottom:15px"align="right"><?php echo $this->fungsi->rupiah($row->jml_bayar);?></td>
	</tr>
	<?php
		$tagihan =$row->tagihan;
		$bayar = $row->jml_bayar;
		$kekurangan = $tagihan - $bayar;
	?>
	<tr>
		<td style="padding-bottom:15px"align="right" colspan="3">Kekurangan </td>
		<td style="padding-bottom:15px"align="right"><?php echo $this->fungsi->rupiah($kekurangan);?></td>
	</tr>
	<?php endforeach;?>
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
