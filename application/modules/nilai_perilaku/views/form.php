
<label>Mohon untuk menginputkan rentang nilai antara 0-100</label>


<form autocomplete="off" class="forms-sample" action="<?php echo site_url('nilai_perilaku/saving');?>" enctype="multipart/form-data" method="post">
    <input type="hidden" name="user_id" value="<?=$user_id?>">
    
    <div class="form-group" style="display:none">
        <?php echo dropdown_dinamis('id_tahun', 'tb_tahun', 'tahun', 'id_tahun',$tahun,'DESC') ?>
    </div>
    
    <div class="form-group row">
        <label for="" class="col-sm-2 col-form-label">Orientai Pelayanan</label>
        <div class="col-sm-5">
            <input type="decimal" name="pelayanan" value="" min="0" max="100" id="pelayanan" class="form-control" placeholder="">
            <code><?=form_error('pelayanan')?></code>
        </div>
        <div class="col-sm-3">
            <label class="col-form-label pelayanan"></label>
        </div>
    </div>
    <div class="form-group row">
        <label for="" class="col-sm-2 col-form-label">Integritas</label>
        <div class="col-sm-5">
            <input type="number" name="integritas" value="" min="0" max="100" id="integritas" class="form-control" placeholder="">
            <code><?=form_error('integritas')?></code>
        </div>
        <div class="col-sm-3">
            <label class="col-form-label integritas"></label>
        </div>
    </div>
    <div class="form-group row">
        <label for="" class="col-sm-2 col-form-label">Komitmen</label>
        <div class="col-sm-5">
            <input type="number" name="komitmen" value="" min="0" max="100" id="komitmen" class="form-control" placeholder="">
            <code><?=form_error('komitmen')?></code>
        </div>
        <div class="col-sm-3">
            <label class="col-form-label komitmen"></label>
        </div>
    </div>
    <div class="form-group row">
        <label for="" class="col-sm-2 col-form-label">Disiplin</label>
        <div class="col-sm-5">
            <input type="number" name="disiplin" value="" min="0" max="100" id="disiplin" class="form-control" placeholder="">
            <code><?=form_error('disiplin')?></code>
        </div>
        <div class="col-sm-3">
            <label class="col-form-label disiplin"></label>
        </div>
    </div>
    <div class="form-group row">
        <label for="" class="col-sm-2 col-form-label">Kerjasama</label>
        <div class="col-sm-5">
            <input type="number" name="kerjasama" value="" min="0" max="100" id="kerjasama" class="form-control" placeholder="">
            <code><?=form_error('kerjasama')?></code>
        </div>
        <div class="col-sm-3">
            <label class="col-form-label kerjasama"></label>
        </div>
    </div>
    <div class="form-group row">
        <label for="" class="col-sm-2 col-form-label">Kepemimpinan</label>
        <div class="col-sm-5">
            <input type="number" name="kepemimpinan" value="" min="0" max="100" id="kepemimpinan" class="form-control" placeholder="- Kosongkan Jika Bukan Kepala Bagian">
            <code><?=form_error('kepemimpinan')?></code>
        </div>
        <div class="col-sm-3">
            <label class="col-form-label kepemimpinan"></label>
        </div>
    </div>
    <div class="form-group row">
        <label for="" class="col-sm-2 col-form-label">&nbsp;</label>
        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
            <!-- <a href="<?=base_url();?>jabatan" class="btn btn-sm btn-warning"><i class="ti-back-left"></i> Back</i></a> -->
            
            <button type="submit" class="btn btn-sm btn-primary" name="save"><i class="ti-save"></i> Save</button>
        </div>
    </div>
</form>

<script>
$(function(){
    $(document).on("keyup","#pelayanan", function(){
        var curVal = $(this).val();
        var hasil = cek_nilai(curVal);
        $('.pelayanan').html( hasil );
    });
    $(document).on("keyup","#integritas", function(){
        var curVal = $(this).val();
        var hasil = cek_nilai(curVal);
        $('.integritas').html( hasil );
    });
    $(document).on("keyup","#komitmen", function(){
        var curVal = $(this).val();
        var hasil = cek_nilai(curVal);
        $('.komitmen').html( hasil );
    });
    $(document).on("keyup","#disiplin", function(){
        var curVal = $(this).val();
        var hasil = cek_nilai(curVal);
        $('.disiplin').html( hasil );
    });
    $(document).on("keyup","#kerjasama", function(){
        var curVal = $(this).val();
        var hasil = cek_nilai(curVal);
        $('.kerjasama').html( hasil );
    });
    $(document).on("keyup","#kepemimpinan", function(){
        var curVal = $(this).val();
        var hasil = cek_nilai(curVal);
        $('.kepemimpinan').html( hasil );
    });

    function cek_nilai(curVal) {
        if( !curVal ){
			return false;
		}
        if(curVal>90){
            return hasil = 'Amat baik';
        }else if(curVal > 76){
            return hasil = 'Baik';
        }else if(curVal>61){
            return hasil = 'Cukup';
        }else if(curVal > 51){
            return hasil = 'Sedang';
        }else if((curVal <50)){
            return hasil = 'Kurang';
        }
    }
});
</script>