<?php
header("Content-disposition: attachment; filename=rekapinputopd".date('d-m-Y').".xls");
header("Content-type: Application/exe");
header("Content-Transfer-Encoding: binary");
?><html>
<head><title>Rekap Kegiatan</title></head>
<body>

<table width='268px' border='1' cellpadding='2' cellspacing='1' align='center'>
  	<tr BGCOLOR ='#CCCCCC' repeat>
		<td align='center'>#</td>
		<td align='center'>OPD</td>
		<td align='center'>Kode Rekening</td>
		<td align='center'>Kegiatan</td>
		<td align='center'>Anggaran Induk</td>
		<td align='center'>Anggaran Perubahan</td>
		<td align='center'>Jumlah Data</td>
	</tr>
    
    <?php
      if(is_object($laporan) || is_array($laporan)) :
      $no = 1;
      foreach ($laporan as $row) :
    ?>
                
  	<tr>
		<td>$no</td>
		<td>
            <?php
              foreach ($nama_opd as $rowB) :
                  if($row->Kd_Urusan == $rowB->Kd_Urusan && $row->Kd_Bidang == $rowB->Kd_Bidang && $row->Kd_Unit == $rowB->Kd_Unit &&  $row->Kd_Sub == $rowB->Kd_Sub) :
                  echo $rowB->Nm_Sub_Unit;
                  endif;
              endforeach;
            ?>
        </td>
		<td>
		    <?php         
              foreach ($nama_kegiatan as $rowC) :
                if($row->kd_urusan == $rowC->kd_urusan && $row->kd_bidang == $rowC->kd_bidang && $row->kd_prog == $rowC->kd_prog && $row->kd_keg == $rowC->kd_keg) :
                  echo $rowC->nama;
                  break;
                endif;
              endforeach;
            ?>
		</td>
		<td>aaaaaaaaa</td>=
		<td>$row->total_induk</td>
		<td>$row->total_perubahan</td>
		<td>$row->jumlah_data</td>
	</tr>
	
	<?php
        $no ++;
        endforeach;
      endif;
    ?>

</table>
</body></html>
