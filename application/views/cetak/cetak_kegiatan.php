<?php
header("Content-disposition: attachment; filename=rekapmonitoring".date('d-m-Y').".xls");
header("Content-type: Application/exe");
header("Content-Transfer-Encoding: binary");
?><html>
<head><title>Rekap Kegiatan</title></head>
<body>

<div class="row">
	<div class="col-xs-12">
      <h4>
        <?php
          echo "Tahun " . $data_kegiatan->tahun;
        ?> 
      </h4>
      <h4>
        <?php
          echo $data_kegiatan->kd_urusan . $data_kegiatan->kd_bidang . $data_kegiatan->kd_unit . $data_kegiatan->kd_sub . " - " . $nama_opd->nama;
        ?> 
      </h4>
      <h4>
        <?php
          echo $data_kegiatan->kd_urusan . $data_kegiatan->kd_bidang . $data_kegiatan->kd_unit . $data_kegiatan->kd_sub . $data_kegiatan->kd_prog . $data_kegiatan->kd_keg . " - " . $nama_kegiatan->nama;
        ?> 
      </h4>
	</div>
</div>

<table width='268px' border='1' cellpadding='2' cellspacing='1' align='center'>
  	<tr BGCOLOR ='#CCCCCC' repeat>
		<td align='center'>#</td>
		<td align='center'>Kode Rekening</td>
		<td align='center'>Uraian</td>
		<td align='center'>B1</td>
		<td align='center'>B2</td>
		<td align='center'>B3</td>
		<td align='center'>B4</td>
		<td align='center'>B5</td>
		<td align='center'>B6</td>
		<td align='center'>B7</td>
		<td align='center'>B8</td>
		<td align='center'>B9</td>
		<td align='center'>B10</td>
		<td align='center'>B11</td>
		<td align='center'>B12</td>
		<td align='center'>Total</td>
	</tr>
    
    <?php
      if(is_object($laporan) || is_array($laporan)) :
      $no = 1;
      foreach ($laporan as $row) :
    ?>
                
  	<tr>
		<td>1</td>
		<td>aaaaaaaaa</td>
		<td>aaaaaaaaa</td>
		<td>aaaaaaaaa</td>
		<td>aaaaaaaaa</td>
		<td>aaaaaaaaa</td>
		<td>aaaaaaaaa</td>
		<td>aaaaaaaaa</td>
		<td>aaaaaaaaa</td>
		<td>aaaaaaaaa</td>
		<td>aaaaaaaaa</td>
		<td>aaaaaaaaa</td>
		<td>aaaaaaaaa</td>
		<td>aaaaaaaaa</td>
		<td>aaaaaaaaa</td>
		<td>aaaaaaaaa</td>
	</tr>
	
	<?php
        $no ++;
        endforeach;
      endif;
    ?>

</table>
</body></html>
