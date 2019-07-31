<?php
    setlocale(LC_TIME, 'id_ID');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SIAP PRINT: Realisasi Fisik</title>
    <style>
        table, tr, td, th{
            border: 2px solid black;
            border-collapse: collapse;
            padding: 6px;
        }
    </style>
</head>
<body>
    <div id='header-laporan'>
    <center><h2>
        LAPORAN REALISASI FISIK<br/>
        <?php echo $data['nama_opd']; ?><br/>
    </h2>
    <h3>
    <?php echo date('M', strtotime($data['fetch']['rf']['tgl'])) .", " . date('Y', strtotime($data['fetch']['rf']['tgl'])); ?>
    </h3><br/>
    </center>
    </div>
    <table style='width: 100%;'>
        <!-- Table header -->
        <tr>
            <th rowspan='2'>No.</th>
            <th rowspan='2'>Program</th>
            <th rowspan='2'>Uraian Kegiatan</th>
            <th rowspan='2'>Indikator</th>
            <th rowspan='2'>Satuan</th>
            <th colspan='3'>Kinerja</th>
            <th colspan='3'>Keuangan</th>
            <th rowspan='2'>Keterangan</th>
        </tr>
        <tr>
            <th>Target</th><th>Realisasi</th><th>%</th>
            <th>Anggaran</th><th>Realisasi</th><th>%</th>
        </tr>
        <tr>
            <th>1</th><th>2</th><th>3</th><th>4</th><th>5</th><th>6</th><th>7</th><th>8</th>
            <th>9</th><th>10</th><th>11</th><th>12</th>
        </tr>
        <!-- End of Table Header -->
        <!-- Table Contents -->
        <?php
            $counter = 0;
            foreach($data['fetch']['prog'] as $prog){ 
                $prog_rowspan = 2*sizeof($data['fetch']['kg'][$prog['kode_program']])+1;
                $counter += 1;
                $capaian_realisasi_kinerja = "";
                $capaian_realisasi_keuangan = "";
                if(isset($prog['capaian_realisasi_kinerja'])) $capaian_realisasi_kinerja = $prog['capaian_realisasi_kinerja'];
                if(isset($prog['capaian_realisasi_keuangan'])) $capaian_realisasi_keuangan = $prog['capaian_realisasi_keuangan'];
                echo "
                    <tr>
                        <td rowspan='$prog_rowspan'>$counter</td>
                        <td rowspan='$prog_rowspan'>". ucwords($prog['nama_program'])."</td>
                        <td></td>
                        <td>". $prog['capaian_indikator'] . "</td>
                        <td>$prog[capaian_satuan]</td>
                        <td>$prog[capaian_target_ppas_final]</td>
                        <td>$capaian_realisasi_kinerja</td>
                        <td>persen???</td>
                        <td>$prog[capaian_anggaran_keuangan]</td>
                        <td>$capaian_realisasi_keuangan</td>
                        <td>persen???</td>
                        <td rowspan='$prog_rowspan'></td>
                    </tr>
                ";
                foreach($data['fetch']['kg'][$prog['kode_program']] as $kg){
                    $keluaran_realisasi_kinerja = "";
                    $realisasi_keuangan = "";
                    $hasil_realisasi_kinerja = "";
                    // $hasil_realisasi_keuangan = "";
                    if(isset($kg['keluaran_realisasi_kinerja'])) $keluaran_realisasi_kinerja = $kg['keluaran_realisasi_kinerja'];
                    if(isset($kg['realisasi_keuangan'])) $realisasi_keuangan = $kg['realisasi_keuangan'];
                    if(isset($kg['hasil_realisasi_kinerja'])) $hasil_realisasi_kinerja = $kg['hasil_realisasi_kinerja'];
                    // if(isset($kg['hasil_realisasi_keuangan'])) $hasil_realisasi_keuangan = $kg['hasil_realisasi_keuangan'];
                    echo "
                        <tr>
                            <td rowspan='2'>". ucwords($kg['nama_kegiatan']). "</td>
                            <td rowspan='2'><strong><u>Output:</u></strong> ".ucwords($kg['keluaran_indikator'])."
                                <br/><br/>
                                <strong><u>Outcome:</u></strong> ". ucwords($kg['hasil_indikator'])."</td>
                            <td>$kg[keluaran_satuan]</td>
                            <td>$kg[keluaran_target_ppas_final]</td>
                            <td>$keluaran_realisasi_kinerja</td>
                            <td>persen???</td>
                            <td rowspan='2'>$kg[pagu_ppas_final]</td>
                            <td rowspan='2'>$realisasi_keuangan</td>
                            <td rowspan='2'>persen???</td>
                        </tr>
                        <tr>
                            <td>$kg[hasil_satuan]</td>
                            <td>$kg[hasil_target_ppas_final]</td>
                            <td>$hasil_realisasi_kinerja</td>
                            <td>persen???</td>
                        </tr>
                    ";  
                }
            }
        ?>
        <!-- End of Table Contents -->
    </table>
    <div id='footer-laporan'></div>
</body>
</html>