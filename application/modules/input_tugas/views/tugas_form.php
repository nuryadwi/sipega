<div class="col-lg-12">
    <div class="flash-success" data-flashdata="<?= $this->session->flashdata('message2'); ?>"></div>
    <div class="flash-failed" data-flashdata="<?= $this->session->flashdata('message'); ?>"></div>
</div>
<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title"><?=$c_judul;?></h4>
                <a href="<?php echo base_url('input_tugas')?>" class="btn btn-primary btn-sm">Tugas Jabatan</a> &nbsp;
                <a href="<?php echo base_url('input_tugas/tambahan')?>" class="btn btn-primary btn-sm">Tugas Tambahan</a>
            </div>
            <div class="card-body">
                <div class="card-description">
                    <p>Input Tugas Jabatan</p>
                </div>
                <form autocomplete="off" action="<?php echo base_url('input_tugas/saveTugas')?>" class="form-horizontal" enctype="multipart/form-data" method="post">
                
                    <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">Pilih Kegiatan</label>
                        <div class="col-sm-8">
                            <select name="skp_id" class="form-control data-skp" id="skp_id" value="">
                                <option disabled selected>Select</option>
                                <?php foreach($skpdata as $skp) { ?>
                                <option value="<?=$skp['skp_id']?>"><?=$skp['kegiatan']?></option>
                                <?php } ?>
                            </select>
                            <code><?=form_error('skp_id')?></code>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">Tanggal Pelaksanaan</label>
                        <div class="col-sm-3">
                            <input type="date" name="tanggal" class="form-control">
                            <code><?=form_error('tanggal')?></code>
                        </div>
                        <label class="col-sm-1 col-form-label">Waktu</label>
                        <div class="col-sm-2">
                            <input type="time" name="start_time" class="form-control">
                            <code><?=form_error('start_time')?></code>
                        </div>
                        <div class="col-sm-2">
                            <input type="time" name="end_time" class="form-control">
                            <code><?=form_error('end_time')?></code>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">Hasil /Output</label>
                        <div class="col-sm-2">
                            <input type="text" name="output" class="form-control" >
                            <code><?=form_error('output')?></code>
                        </div>
                        <div class="col-sm-2">
                            <input type="text" name="satuan" id="satuan" class="form-control" readonly >
                            <code><?=form_error('satuan')?></code>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">Dolumen</label>
                        <div class="col-sm-2">
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input type="radio" class="form-check-input" name="tab" onclick="show1();" value="0">
                                    Tidak Ada
                                </label>
                            </div> 
                        </div>
                        <div class="col-sm-2">    
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input type="radio" class="form-check-input" name="tab" onclick="show2();" value="1">
                                    Ada Dokumen
                                </label>
                          </div>
                        </div>
                        <code><?php echo form_error('tab')?></code>
                    </div>
                    <div class="form-group row">
                    <label for="" class="col-sm-3 col-form-label">&nbsp;</label>
                        <div id="div" class="col-sm-5" style="display:none">
                        <input type="file" name="files" id="files" class="form-control" value="">
                            <label class="control-label"><span style="color:red;">(*)</span> silahkan archive (zip) terlebih dahulu jika file lebih dari satu</label>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">&nbsp;</label>
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                            <button type="reset" class="btn btn-sm btn-warning"><i class="ti-reload"></i> Clear</button>
                            <button type="submit" class="btn btn-sm btn-primary" name="save"><i class="ti-save"></i> Save</button>
                        </div>
                    </div>
                </form>
            </div>
            
        </div>
    </div>
</div>

<script type="text/javascript"> 
    $(document).on("change",".data-skp", function() {
        var skp_id = $(this).val();
        $.ajax({
            url: "<?php echo base_url('input_tugas/cari')?>",
            data: "&skp_id="+skp_id,
        }).done(function(data){
            var hasil = JSON.parse(data);

            $.each(hasil, function(key,val){
                document.getElementById('skp_id').value=val.skp_id;
                document.getElementById('satuan').value=val.satuan;
            });
        });
    });
    function show1(){
    document.getElementById('div').style.display ='none';
    }
    function show2(){
        document.getElementById('div').style.display = 'block';
    }
</script>