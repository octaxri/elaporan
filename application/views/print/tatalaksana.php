<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SIAP PRINT: Tatalaksana</title>
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
        LAPORAN HASIL PENGAMATAN TATALAKSANA<br/>
        <?php echo $data['nama_opd']; ?><br/>
    </h2></center>
    </div>
    <table style='width: 100%;'>
        <!-- Table header -->
        <tr>
            <th >No.</th>
            <th >Nama Perangkat Daerah</th>
            <th >Nilai Peserta Uji Kompetensi Ketatalaksanaan</th>
            <th >Nilai Hasil Uji Kompetensi x 40%</th>
            <th >SOP</th>
            <th >Tata Naskah Dinas</th>
            <th >Pakaian Dinas</th>
            <th >Hari dan Jam Kerja</th>
            <th >Nilai Penilaian Lapangan x 60%</th>
            <th >Jumlah Nilai</th>
            <th >Ket</th>
        </tr>
        <!-- End of Table Header -->
        <!-- Table Contents -->
        <?php
            $counter = 0;
            foreach($data['fetch']['topd'] as $topd){ 
                $counter += 1;
                echo "
                    <tr>
                        <td><center>$counter</center></td>
                        <td>". ucwords($topd['nama_opd'])."</td>
                        <td><center>$topd[uji_kompetensi]</center></td>
                        <td><center>???</center></td>
                        <td><center>$topd[sop]</center></td>
                        <td><center>$topd[tata_naskah_dinas]</center></td>
                        <td><center>$topd[pakaian_dinas]</center></td>
                        <td><center>$topd[jam_kerja]</center></td>
                        <td><center>???</center></td>
                        <td><center>???</center></td>
                        <td><center>$topd[ket]</center></td>
 
                    </tr>
                ";

            }
        ?>
        <!-- End of Table Contents -->
    </table>
    <div id='footer-laporan'></div>
</body>
</html>
