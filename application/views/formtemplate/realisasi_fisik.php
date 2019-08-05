 <!-- page content -->

 <div class="">
     <div class="page-title">
         <div class="title_left">
             <!-- <h3>Reset Password</h3> -->
         </div>

     </div>
     <div class="clearfix"></div>
     <div class="row">
         <div class="col-md-12 col-sm-12 col-xs-12">
             <div class="x_panel">
                 <div class="x_title">
                     <h2>Realisasi Fisik</h2>

                     <div class="clearfix"></div>
                 </div>
                 <div class="x_content">
                     <br />
                     <div class="clearfix"></div>

                     <div class="">
                         <div class="col-md-12 col-sm-12 col-xs-12">
                             <div class="x_panel">
                                 <div class="x_content">
                                     <a href='<?php if (isset($data['id_laporan'])) echo base_url("opd/p/$data[formname]/$data[id_laporan]"); ?>' target='_blank'><button class="btn btn-primary"><i class="fa fa-print"></i> PRINT</button></a>
                                     <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" action='<?php echo base_url("opd/e/$data[formname]/$data[id_laporan]"); ?>' method="post">
                                         <input value="updateapi" type="hidden" name="nama_tabel">
                                         <button type="submit" class="btn btn-warning" onclick="return confirm('Update data dari SIPP?');"><i class="fa fa-refresh"></i> Refresh</button>
                                     </form>
                                     <div class="" role="tabpanel" data-example-id="togglable-tabs">
                                         <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                                             <li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Realisasi Fisik</a>
                                             </li>
                                             <li role="presentation" class=""><a href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Program</a>
                                             </li>
                                             <li role="presentation" class=""><a href="#tab_content3" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="false">Kegiatan</a>
                                             </li>
                                         </ul>
                                         <div id="myTabContent" class="tab-content">
                                             <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">
                                                 <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" action='<?php echo base_url('admin/submit'); ?>' method="post">
                                                     <input value="realisasi_fisik" type="hidden" name="nama_tabel">
                                                     <div class="form-group">
                                                         <label for="tgl" class="control-label col-md-3 col-sm-3 col-xs-12">Bulan & Tahun</label>
                                                         <div class="col-md-6 col-sm-6 col-xs-12">
                                                             <!-- <input disabled id="tgl" class="form-control col-md-7 col-xs-12" type="date" name="tgl"> -->
                                                             <h3><?php echo date('M', strtotime($data['fetch']['rf']['tgl'])) . ", " . date('Y', strtotime($data['fetch']['rf']['tgl'])); ?></h3>
                                                         </div>
                                                     </div>
                                                     <div class="ln_solid"></div>
                                                 </form>

                                             </div>
                                             <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">
                                                 <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" action='<?php echo base_url("opd/e/$data[formname]/$data[id_laporan]"); ?>' method="post">
                                                     <input value="program" type="hidden" name="nama_tabel">
                                                     <?php foreach ($data['fetch']['prog'] as $prog) { ?>
                                                         <input value="<?php echo ucwords($prog['kode_program']); ?>" type="hidden" class="form-control col-md-7 col-xs-12" name="kode_program[]">
                                                         <div class="form-group">
                                                             <label for="kode_program" class="control-label col-md-3 col-sm-3 col-xs-12">Kode Program</label>
                                                             <div class="col-md-6 col-sm-6 col-xs-12">
                                                                 <input value="<?php echo ucwords($prog['kode_program']); ?>" disabled class="form-control col-md-7 col-xs-12" type="text" name="kode_program[]">
                                                             </div>
                                                         </div>

                                                         <div class="form-group">
                                                             <label for="nama_program" class="control-label col-md-3 col-sm-3 col-xs-12">Nama Program</label>
                                                             <div class="col-md-6 col-sm-6 col-xs-12">
                                                                 <input value="<?php echo ucwords($prog['nama_program']); ?>" disabled class="form-control col-md-7 col-xs-12" type="text" name="nama_program[]">
                                                             </div>
                                                         </div>
                                                         <div class="form-group">
                                                             <label for="capaian_indikator" class="control-label col-md-3 col-sm-3 col-xs-12">Indikator Capaian</label>
                                                             <div class="col-md-6 col-sm-6 col-xs-12">
                                                                 <input value="<?php echo ucwords($prog['capaian_indikator']); ?>" disabled class="form-control col-md-7 col-xs-12" type="text" name="capaian_indikator[]">
                                                             </div>
                                                         </div>
                                                         <div class="form-group">
                                                             <label for="capaian_target_ppas_final" class="control-label col-md-3 col-sm-3 col-xs-12">Target Capaian Kinerja (<?php echo $prog['capaian_satuan']; ?>)</label>
                                                             <div class="col-md-6 col-sm-6 col-xs-12">
                                                                 <input value="<?php echo ucwords($prog['capaian_target_ppas_final']); ?>" disabled class="form-control col-md-7 col-xs-12" type="text" name="capaian_target_ppas_final[]">
                                                             </div>
                                                         </div>
                                                         <div class="form-group">
                                                             <label for="capaian_realisasi_kinerja" class="control-label col-md-3 col-sm-3 col-xs-12">Realisasi Capaian Kinerja (<?php echo $prog['capaian_satuan']; ?>)</label>
                                                             <div class="col-md-6 col-sm-6 col-xs-12">
                                                                 <input value="<?php if (isset($prog['capaian_realisasi_kinerja'])) echo ucwords($prog['capaian_realisasi_kinerja']); ?>" class="form-control col-md-7 col-xs-12" type="text" name="capaian_realisasi_kinerja[]">
                                                             </div>
                                                         </div>
                                                         <div class="form-group">
                                                             <label for="capaian_anggaran_keuangan" class="control-label col-md-3 col-sm-3 col-xs-12">Anggaran Capaian Keuangan</label>
                                                             <div class="col-md-6 col-sm-6 col-xs-12">
                                                                 <input value="<?php echo $prog['capaian_anggaran_keuangan']; //ucwords($prog['capaian_target']); 
                                                                                ?>" disabled class="form-control col-md-7 col-xs-12" type="text" name="capaian_anggaran_keuangan[]">
                                                             </div>
                                                         </div>
                                                         <div class="form-group">
                                                             <label for="capaian_realisasi_keuangan" class="control-label col-md-3 col-sm-3 col-xs-12">Realisasi Capaian Keuangan</label>
                                                             <div class="col-md-6 col-sm-6 col-xs-12">
                                                                 <input value="<?php if (isset($prog['capaian_realisasi_keuangan'])) echo ucwords($prog['capaian_realisasi_keuangan']); ?>" class="form-control col-md-7 col-xs-12" type="text" name="capaian_realisasi_keuangan[]">
                                                             </div>
                                                         </div>
                                                         <?php echo "<br/><br/>";
                                                        } ?>
                                                     <div class="ln_solid"></div>
                                                     <div class="form-group">
                                                         <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                                         <button style="position: fixed; bottom: 28px; right: 48px;font-size:20px;  width: 100px;" type="submit" class="btn btn-success" >Submit</button>
                                                         </div>
                                                     </div>
                                                 </form>

                                             </div>
                                             <div role="tabpanel" class="tab-pane fade" id="tab_content3" aria-labelledby="profile-tab">
                                                 <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" action='<?php echo base_url("opd/e/$data[formname]/$data[id_laporan]"); ?>' method="post">
                                                     <input value="kegiatan" type="hidden" name="nama_tabel">
                                                     <?php foreach ($data['fetch']['kg'] as $kg) { ?>
                                                         <h2><?php echo ucwords(reset($kg)['nama_program']); ?></h2>

                                                         <?php
                                                            foreach ($kg as $data) {
                                                                ?>
                                                             <input value="<?php echo ucwords($data['kode_kegiatan']); ?>" type="hidden" class="form-control col-md-7 col-xs-12" name="kode_kegiatan[]">
                                                             <div style="border-style:solid; padding:25px;">
                                                                 <div class="form-group">
                                                                     <label for="kode_kegiatan" class="control-label col-md-3 col-sm-3 col-xs-12">Kode Kegiatan</label>
                                                                     <div class="col-md-6 col-sm-6 col-xs-12">
                                                                         <input value="<?php echo ucwords($data['kode_kegiatan']); ?>" disabled class="form-control col-md-7 col-xs-12" type="text" name="kode_kegiatan[]">
                                                                     </div>
                                                                 </div>

                                                                 <div class="form-group">
                                                                     <label for="nama_kegiatan" class="control-label col-md-3 col-sm-3 col-xs-12">Nama Kegiatan</label>
                                                                     <div class="col-md-6 col-sm-6 col-xs-12">
                                                                         <input value="<?php echo $data['nama_kegiatan']; ?>" disabled class="form-control col-md-7 col-xs-12" type="text" name="kode_kegiatan[]">
                                                                     </div>
                                                                 </div>

                                                                 <!-- Tambah dibawah sini field lainnya -->
                                                                 <div class="form-group">
                                                                     <label for="pagu_ppas_final" class="control-label col-md-3 col-sm-3 col-xs-12">Pagu PPAS Final</label>
                                                                     <div class="col-md-6 col-sm-6 col-xs-12">
                                                                         <input value="<?php echo $data['pagu_ppas_final']; ?>" disabled class="form-control col-md-7 col-xs-12" type="text" name="pagu_ppas_final[]">
                                                                     </div>
                                                                 </div>

                                                                 <div class="form-group">
                                                                     <label for="keluaran_indikator" class="control-label col-md-3 col-sm-3 col-xs-12">Keluaran Indikator</label>
                                                                     <div class="col-md-6 col-sm-6 col-xs-12">
                                                                         <input value="<?php echo $data['keluaran_indikator']; ?>" disabled class="form-control col-md-7 col-xs-12" type="text" name="keluaran_indikator[]">
                                                                     </div>
                                                                 </div>

                                                                 <div class="form-group">
                                                                     <label for="keluaran_target_ppas_final" class="control-label col-md-3 col-sm-3 col-xs-12">Keluaran Target PPAS Final</label>
                                                                     <div class="col-md-6 col-sm-6 col-xs-12">
                                                                         <input value="<?php echo $data['keluaran_target_ppas_final']; ?>" disabled class="form-control col-md-7 col-xs-12" type="text" name="keluaran_target_ppas_final[]">
                                                                     </div>
                                                                 </div>

                                                                 <div class="form-group">
                                                                     <label for="keluaran_realisasi_kinerja" class="control-label col-md-3 col-sm-3 col-xs-12">Keluaran Realisasi Kinerja (<?php echo $data['keluaran_satuan']; ?>)</label>
                                                                     <div class="col-md-6 col-sm-6 col-xs-12">
                                                                         <input value="<?php if (isset($data['keluaran_realisasi_kinerja'])) echo ucwords($data['keluaran_realisasi_kinerja']); ?>" class="form-control col-md-7 col-xs-12" type="text" name="keluaran_realisasi_kinerja[]">
                                                                     </div>
                                                                 </div>

                                                                 <div class="form-group">
                                                                     <label for="keluaran_realisasi_kinerja_persen" class="control-label col-md-3 col-sm-3 col-xs-12">Keluaran Realisasi Kinerja Persen</label>
                                                                     <div class="col-md-6 col-sm-6 col-xs-12">
                                                                         <input value="<?php echo $data['keluaran_realisasi_kinerja_persen']; ?>" disabled class="form-control col-md-7 col-xs-12" type="text" name="keluaran_realisasi_kinerja_persen[]">
                                                                     </div>
                                                                 </div>

                                                                 <div class="form-group">
                                                                     <label for="keluaran_satuan" class="control-label col-md-3 col-sm-3 col-xs-12">Keluaran Satuan</label>
                                                                     <div class="col-md-6 col-sm-6 col-xs-12">
                                                                         <input value="<?php echo $data['keluaran_satuan']; ?>" disabled class="form-control col-md-7 col-xs-12" type="text" name="keluaran_satuan[]">
                                                                     </div>
                                                                 </div>

                                                                 <div class="form-group">
                                                                     <label for="hasil_indikator" class="control-label col-md-3 col-sm-3 col-xs-12">Hasil Indikator</label>
                                                                     <div class="col-md-6 col-sm-6 col-xs-12">
                                                                         <input value="<?php echo $data['hasil_indikator']; ?>" disabled class="form-control col-md-7 col-xs-12" type="text" name="hasil_indikator[]">
                                                                     </div>
                                                                 </div>

                                                                 <div class="form-group">
                                                                     <label for="hasil_target_ppas_final" class="control-label col-md-3 col-sm-3 col-xs-12">Hasil Target PPAS Final</label>
                                                                     <div class="col-md-6 col-sm-6 col-xs-12">
                                                                         <input value="<?php echo $data['hasil_target_ppas_final']; ?>" disabled class="form-control col-md-7 col-xs-12" type="text" name="hasil_target_ppas_final[]">
                                                                     </div>
                                                                 </div>

                                                                 <div class="form-group">
                                                                     <label for="realisasi_keuangan" class="control-label col-md-3 col-sm-3 col-xs-12">Realisasi Keuangan (<?php echo $data['keluaran_satuan']; ?>)</label>
                                                                     <div class="col-md-6 col-sm-6 col-xs-12">
                                                                         <input value="<?php if (isset($data['realisasi_keuangan'])) echo ucwords($data['realisasi_keuangan']); ?>" class="form-control col-md-7 col-xs-12" type="number" name="realisasi_keuangan[]">
                                                                     </div>
                                                                 </div>

                                                                 <div class="form-group">
                                                                     <label for="realisasi_keuangan_persen" class="control-label col-md-3 col-sm-3 col-xs-12">Realisasi Keuangan Persen</label>
                                                                     <div class="col-md-6 col-sm-6 col-xs-12">
                                                                         <input value="<?php echo $data['realisasi_keuangan_persen']; ?>" disabled class="form-control col-md-7 col-xs-12" type="text" name="realisasi_keuangan_persen[]">
                                                                     </div>
                                                                 </div>

                                                                 <div class="form-group">
                                                                     <label for="hasil_realisasi_kinerja" class="control-label col-md-3 col-sm-3 col-xs-12">Hasil Realisasi Kinerja (<?php echo $data['keluaran_satuan']; ?>)</label>
                                                                     <div class="col-md-6 col-sm-6 col-xs-12">
                                                                         <input value="<?php if (isset($data['hasil_realisasi_kinerja'])) echo ucwords($data['hasil_realisasi_kinerja']); ?>" class="form-control col-md-7 col-xs-12" type="text" name="hasil_realisasi_kinerja[]">
                                                                     </div>
                                                                 </div>

                                                                 <div class="form-group">
                                                                     <label for="hasil_realisasi_kinerja_persen" class="control-label col-md-3 col-sm-3 col-xs-12">Hasil Realisasi Kinerja Persen</label>
                                                                     <div class="col-md-6 col-sm-6 col-xs-12">
                                                                         <input value="<?php echo $data['hasil_realisasi_kinerja_persen']; ?>" disabled class="form-control col-md-7 col-xs-12" type="text" name="hasil_realisasi_kinerja_persen[]">
                                                                     </div>
                                                                 </div>

                                                                 <div class="form-group">
                                                                     <label for="hasil_satuan" class="control-label col-md-3 col-sm-3 col-xs-12">Hasil Satuan</label>
                                                                     <div class="col-md-6 col-sm-6 col-xs-12">
                                                                         <input value="<?php echo $data['hasil_satuan']; ?>" disabled class="form-control col-md-7 col-xs-12" type="text" name="hasil_satuan[]">
                                                                     </div>
                                                                 </div>
                                                             </div>

                                                             <?php echo "<br/>";
                                                            }
                                                            echo "<br/><br/>";
                                                        } ?>
                                                     <div class="ln_solid"></div>
                                                     <div class="form-group">
                                                         <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                                         <button style="position: fixed; bottom: 28px; right: 48px;font-size:20px;  width: 100px;" type="submit" class="btn btn-success" >Submit</button>
                                                         </div>
                                                     </div>
                                                 </form>

                                             </div>
                                         </div>
                                     </div>

                                 </div>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
         </div>



         <!-- /page content -->