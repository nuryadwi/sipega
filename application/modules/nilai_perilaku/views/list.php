
<div class="table-reponsive">
    <table class="table table-bordered">
        <thead>
            <tr class="bg-secondary">
                <th width="2%">No</th>
                <th width="5%">Tanggal</th>
                <th width="30%">Uraian</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            $i = 1;
            foreach($nilai_perilaku as $np) { ?>
            <tr>
                <td rowspan="4"><?=$i++?></td>
                <td rowspan="1"><?=format_date($np->periode_start).' s/d '.format_date($np->periode_end)?></td>
                <td>
                <p>Penilaian perilaku kerja adalah sebagai berikut:</p>
                    <ul>
                        <li>Orientasi Pelayanan = <?=$np->pelayanan.' ('.cek_nilai($np->pelayanan).')';?></li>
                        <li>Integritas = <?=$np->integritas.' ('.cek_nilai($np->pelayanan).')';?></li>
                        <li>Komitmen = <?=$np->komitmen.' ('.cek_nilai($np->komitmen).')';?></li>
                        <li>Disiplin = <?=$np->disiplin.' ('.cek_nilai($np->disiplin).')';?></li>
                        <li>Kerjasama = <?=$np->kerjasama.' ('.cek_nilai($np->kerjasama).')';?></li>
                    
                        <li>Kepemimpinan = 
                            <?php 
                                if(!$np->kepemimpinan){
                                    echo "-";
                                }else{
                                    echo $np->kepemimpinan.' '.cek_nilai($np->kepemimpinan);
                                }
                            ?>
                        </li>
                    </ul>
                </td>
            </tr>

            <tr>
                
                <td colspan="1" align="right">Jumlah</td>
                <td colspan='1'><?=$np->jumlah?></td>
            </tr>
            <tr>
                <td colspan="1" align="right">Nilai rata-rata</td>
                <td colspan='1'><?=$np->nilai_perilaku?></td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
    <div class="card-body">
        keterangan
    </div>
</div>