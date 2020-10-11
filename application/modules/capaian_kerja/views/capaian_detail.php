<div class="col-lg-12">
    <div class="flash-success" data-flashdata="<?= $this->session->flashdata('message2'); ?>"></div>
    <div class="flash-failed" data-flashdata="<?= $this->session->flashdata('message'); ?>"></div>
</div>
<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title"><?=$c_judul;?></h4>
               
            </div>
            <div class="card-body">
                <h4 align="center">PENILAIAN SASARAN KINERJA</h4>
                <p>Jangka waktu penilaian</p>
                <p><?=$periode?></p>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th rowspan="2" width="1%">A.</td>
                                <th rowspan="2" width="20%"style="text-align: center;">Kegiatan</td>
                                <th colspan="4" style="text-align: center;">Target</td>
                                <th colspan="1"></td>
                                <th colspan="3" style="text-align: center;">Realiasai</td>
                                <th rowspan="2">Perhitungan</th>
                                <th rowspan="2">NilaiCapaian</th>
                            </tr>
                            <tr>
                                <td width="">Kuant/Output</th>
                                <td width="">Satuan</th>
                                <td width="">Kualitas/Mutu</th>
                                <td width="">Waktu</th>
                                <td style="background: ;"></th>
                                <td width="">Kuant/Output</th>
                                <td width="">kualitas/Mutu</th>
                                <td width="">Waktu</th>
                                
                            </tr> 
                        </thead>
                        <!-- Isi Tugas SKP -->
                        <tbody>
                            <?php
                            $no =1;
                            foreach($skp as $s) : ?>
                            <tr>
                                <td><?=$no++?></td>
                                <td><?=$s->kegiatan; ?></td>
                                <td><?=$s->kuantitas; ?></td>
                                <td><?=$s->satuan; ?></td>
                                <td><?=$s->kualitas; ?></td>
                                <td><?=$s->waktu.' Bulan'; ?></td>
                                <td style="background: ;"></td>
                                <td><?=$s->realisasi.' '.$s->satuan;?></td>
                                <td><?=$s->kualitas_re; ?></td>
                                <td><?=$s->waktu_re?></td>
                                <td><?=round($s->total_hitung,2)?></td>
                                <td><?=round($s->nilai_capaian_skp,2)?></td>
                            </tr>
                            <?php endforeach ?>
                        </tbody>
                        <thead>
                            <tr>
                                <th>B.</th>
                                <th colspan="10">Tugas tambahan</th>
                                <th></th>
                            </tr>
                        </thead>
                        <!-- Isi Tugas Tambahan -->
                        <tbody>
                            <tr>
                                <th>&nbsp;</th>
                                <td colspan="10">
                                    <ol>
                                        <?php foreach($task as $ts) :?>
                                        <li><?=$ts->kegiatan?></li>
                                        <?php endforeach?>
                                    </ol>
                                    
                                </td>
                                <td><?=$jml_task?></td>
                            </tr>
                            
                        </tbody>
                        <thead>
                            <tr>
                                <th colspan="11"><center>Nilai Capaian SKP</center></th>
                                <th>
                                    <?php if(!$nilai_capaian){
                                        echo "00.00";
                                    }else {
                                        echo $nilai_capaian;
                                    }
                                    ?>
                                </th>
                            </tr>
                        </thead>
                    </table>
                </div>
                <div class="card-body">
                <form action="<?php echo base_url('capaian_kerja/process')?>" class="form-horizontal" method="post">
                    <input type="hidden" name="user_id" value="<?=$user_id?>">
                    <?php foreach($skp as $s) { ?>
                    <input type="hidden" name="nilai_skp[]" value="<?=round($s->nilai_capaian_skp,2)?>">
                    <?php } ?>
                    
                    <input type="hidden" name="jml_task" value="<?=$jml_task?>">
                    <div class="btn-group" role="group" aria-label="Basic example">
                        <button type="submit" name="proses" class="btn btn-inverse-primary"><i class="ti-settings"></i> Proses</button>
                </form>
                        <a href="<?php echo base_url('capaian_kerja/reset_nilai/').$user_id?>" class="btn btn-inverse-warning tombol-hapus"><i class="ti-reload"></i> Reset</a>

                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<!-- <script>
$(function () {

    $(document).on("click",".btn-submit", function(){
        $.ajax({
            url: "<?php echo site_url('capaian_kerja/process'); ?>",
            type: "post",
            dataType: "json",
            data: $('#formCapaian').serialize(),
            beforeSend: function() {
                $('.btn-submit').addClass('btn-loading');
            }
        }).done(function(response) {
            setTimeout(function() {
                $('.btn-submit').removeClass('btn-loading');
                if( response.status == 1 ) {
                    //alertSuccess(response.message);
                    console.log(response.message);
                }else{
                    alertError(response.message);
                }
            }, 3000)  
        })
    })
});
</script> -->