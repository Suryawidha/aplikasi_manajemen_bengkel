<?php
include_once 'header.php';
?>

<?php include'connection.php' ?>

        <div class="row">
          <div class="col-xs-12 col-sm-12 col-md-2">
            <?php
            include_once 'sidebar.php';
            ?>
          </div>
          <div class="col-xs-12 col-sm-12 col-md-10">
          <ol class="breadcrumb">
            <li><a href="index.php"><span class="fa fa-home"></span> Beranda</a></li>
            
          </ol>
           <div id="chartdiv" style="width: 100%; height: 400px; background-color: #FFFFFF;" ></div>
            <!--<div id="chartContainer" style="height: 400px; width: 100%;"></div>-->
          <br/>
            
            <!--DATA LOG ADMIN-->
            <div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-bar-chart-o fa-fw"></i> Info Admin</h3>
            </div>
            <div class="panel-body">

                <div class="row">
                    <div class="col-md-6">

                        <table class="table">
                            <tbody>
                            <tr>
                                <th>Username</th>
                                <th>:</th>
                                <td><?php echo $_SESSION["username"]?></td>
                            </tr>
                            <tr>
                                <th>Nama Lengkap</th>
                                <th>:</th>
                                <td><?php echo $_SESSION["nama_pengguna"] ?></td>
                            </tr>
                            
                            </tbody>
                        </table>

                    </div>
                    <div class="col-md-6">


                        <table class="table">
                            <tbody>
                            <tr>
                                <th>Last Login</th>
                                <th>:</th>
                                <td><?php echo date('d-m-Y'); ?></td>
                            </tr>
                            <tr>
                                <th>IP Address</th>
                                <th>:</th>
                                <td><?php echo $_SERVER["REMOTE_ADDR"]; ?></td>
                            </tr>
                            <tr>
                                <th>Server</th>
                                <th>:</th>
                                <td><?php echo $_SERVER['SERVER_NAME']; ?></td>
                            </tr>
                            <tr>
                                <th>Browser</th>
                                <th>:</th>
                                <td><?php echo $_SERVER["HTTP_USER_AGENT"]; ?></td>
                            </tr>
                            </tbody>
                        </table>

                    </div>
                </div>

            </div>
        </div>
    </div>
                
            
        </div>
        </div>
        
        <footer class="text-center">&copy; HALLO DAP</footer>
    </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery-1.11.3.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
    <script src="js/highcharts.js"></script>
    <script src="js/exporting.js"></script>
    <script src="js/canvasjs.min.js"></script>
    <script src="js/amcharts.js"></script>
    <script src="js/serial.js"></script>
    <script type="text/javascript">
            AmCharts.makeChart("chartdiv",
                {
                    "type": "serial",
                    "categoryField": "date",
                    "dataDateFormat": "YYYY-MM-DD HH:NN:SS",
                    //"pathToImages": "http://cdn.amcharts.com/lib/3/images/",
                    "categoryAxis": {
                        "minPeriod": "ss",
                        "parseDates": true
                    },
                    "chartCursor": {
                        "enabled": true,
                        "categoryBalloonDateFormat": "JJ:NN"
                    },
                    "chartScrollbar": {
                        "enabled": true
                    },
                    "trendLines": [],
                    "graphs": [
                        {
                            "fillAlphas": 0.7,
                            "id": "AmGraph-1",
                            "lineAlpha": 0,
                            "title": "Total",
                            "valueField": "column-1"
                        }
                    ],
                    "guides": [],
                    "valueAxes": [
                        {
                            "id": "ValueAxis-1",
                            "title": "Total"
                        }
                    ],
                    "allLabels": [],
                    "balloon": {},
                    "legend": {
                        "enabled": true
                    },
                    "titles": [
                        {
                            "id": "Title-1",
                            "size": 15,
                            "text": "Data Transaksi"
                        }
                    ],
                    "dataProvider": [
                        <?php include'connection.php';
                        $data = mysqli_query($connection, "SELECT * from b_transaksi order by no_nota asc");
                        while($row=mysqli_fetch_array($data)){
                            echo '
                            {
                                "column-1": '.$row['total'].',
                                "date": "'.$row['tgl_beli'].'"
                            },
                            ';
                        }
                        ?>
                        
                    ]
                }
            );
        </script>
    </body>
</html>