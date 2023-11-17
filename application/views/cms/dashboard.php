<!-- Sparkline -->
<script src="<?= base_url('assets/cms/') ?>plugins/sparklines/sparkline.js"></script>
<!-- ChartJS -->
<script src="<?= base_url('assets/cms/') ?>plugins/chart.js/Chart.min.js"></script>
<div class="container-fluid">  
    <div class="row">
        
        <div class="col-12 col-sm-6 col-md-3">
            <a href="<?= base_url('cms/list-artikel')?>" class="text-dark">
            <div class="info-box">
              <span class="info-box-icon bg-info elevation-1"><i class="fas fa-newspaper"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Artikel</span>
                    <span class="info-box-number" id="jumlah_artikel">
                    </span>
                </div>
              <!-- /.info-box-content -->
            </div>
            </a>
            <!-- /.info-box -->
        </div>
        <div class="col-12 col-sm-6 col-md-3">
            <a href="<?= base_url('cms/list-portfolio')?>" class="text-dark">
            <div class="info-box">
              <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-images"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Portfolio</span>
                    <span class="info-box-number" id="jumlah_portfolio">
                    </span>
                </div>
              <!-- /.info-box-content -->
            </div>
            </a>
            <!-- /.info-box -->
        </div>
        <div class="col-12 col-sm-6 col-md-3">
            <a href="<?= base_url('cms/list-team')?>" class="text-dark">
            <div class="info-box">
              <span class="info-box-icon bg-primary elevation-1"><i class="fas fa-user-tie"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Team</span>
                    <span class="info-box-number" id="jumlah_team">
                    </span>
                </div>
              <!-- /.info-box-content -->
            </div>
            </a>
            <!-- /.info-box -->
        </div>
        <div class="col-12 col-sm-6 col-md-3">
            <a href="<?= base_url('cms/list-faq')?>" class="text-dark">
            <div class="info-box">
              <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-question"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">FAQ</span>
                    <span class="info-box-number" id="jumlah_faq">
                    </span>
                </div>
              <!-- /.info-box-content -->
            </div>
            </a>
            <!-- /.info-box -->
        </div>
    </div>

<script>
    

    $(document).ready(function(){
        $(".table-jumlah").DataTable()
        loadAlldata()
    })

    function loadAlldata(){
        $.ajax({
            url:`${base_url}cms/get-data-dashboard`,
            type:'get',
            dataType:"json",
            success:function(response){
                // var graphOrder = response.data.order;
                // loadGraph(graphOrder.jumlah,graphOrder.bulan, graphOrder.isDate ? "Tanggal" : "Bulan")
                $("#jumlah_artikel").text(response.data.artikel)
                $("#jumlah_portfolio").text(response.data.portfolio)
                $("#jumlah_team").text(response.data.team)
                $("#jumlah_faq").text(response.data.faq)
            }
        })
    }



   
</script>