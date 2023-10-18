<div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <?php 
                $querycount = mysqli_query($conn,"SELECT COUNT(id) as count FROM jadwal");
                if(mysqli_num_rows($querycount) < 0){
                  $count = 0;
                } else{
                  $getdata = mysqli_fetch_assoc($querycount);
                  $count = $getdata['count'];
                }

                ?>
                
                <h3><?= $count ?></h3>

                <p>Agenda/Jadwal</p>
              </div>
              <div class="icon">
                <i class="ion ion-calendar"></i>
              </div>
              <a href="?page=agenda" class="small-box-footer">Selengkapnya <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
              <?php 
                $querycount = mysqli_query($conn,"SELECT COUNT(id_kegiatan) as count FROM jenis_kegiatan");
                if(mysqli_num_rows($querycount) < 0){
                  $count = 0;
                } else{
                  $getdata = mysqli_fetch_assoc($querycount);
                  $count = $getdata['count'];
                }

                ?>

                <h3><?= $count ?></h3>

                <p>Jenis Kegiatan</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="?page=jeniskegiatan" class="small-box-footer">Selengkapnya <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
              <?php 
                $querycount = mysqli_query($conn,"SELECT COUNT(id) as count FROM user where level <> 'Admin'");
                if(mysqli_num_rows($querycount) < 0){
                  $count = 0;
                } else{
                  $getdata = mysqli_fetch_assoc($querycount);
                  $count = $getdata['count'];
                }

                ?>

                <h3><?= $count ?></h3>


                <p>User Terdaftar</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="#" class="small-box-footer">Selengkapnya<i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
              <?php 
                $querycount = mysqli_query($conn,"SELECT COUNT(id) as count FROM request");
                if(mysqli_num_rows($querycount) < 0){
                  $count = 0;
                } else{
                  $getdata = mysqli_fetch_assoc($querycount);
                  $count = $getdata['count'];
                }

                ?>

                <h3><?= $count ?></h3>

                <p>Request Jadwal</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="?page=request" class="small-box-footer">Selengkapnya <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>