<!-- Sparkline -->
<script src="<?= base_url('assets/cms/') ?>plugins/sparklines/sparkline.js"></script>
<!-- ChartJS -->
<script src="<?= base_url('assets/cms/') ?>plugins/chart.js/Chart.min.js"></script>
<div class="container-fluid">  
   
    <div class="row">
        <div class="col-lg-6 col-md-6 col-12">
            <div class="card">
                <div class="card-header text-center">
                    <h3 class="card-title"><b>Kemarin</b></h3>
                </div>
                <div class="card-body">
                    <table class="table table-responsive table-bordered table-jumlah" width="100%">
                        <thead>
                            <tr>
                                <th width="1%">No.</th>
                                <th>Nama</th>
                                <th width="5%">Jumlah</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no=1; foreach ($lasts as $last): ?>
                            <tr>
                                <td><?= $no++ ?>.</td>
                                <td><?= $last->fullname ?></td>
                                <td><?= $last->jml ?></td>
                            </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-md-6 col-12">
            <div class="card">
                <div class="card-header text-center">
                    <h3 class="card-title"><b>Hari Ini</b></h3>
                </div>
                <div class="card-body">
                    <table class="table table-responsive table-bordered table-jumlah" width="100%">
                        <thead>
                            <tr>
                                <th width="1%">No.</th>
                                <th>Nama</th>
                                <th width="5%">Jumlah</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no=1; foreach ($nows as $now): ?>
                            <tr>
                                <td><?= $no++ ?>.</td>
                                <td><?= $now->fullname ?></td>
                                <td><?= $now->jml ?></td>
                            </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>



<script>
    

    $(document).ready(function(){
        $(".table-jumlah").DataTable()
    })

</script>