<?php
$query = mysqli_query($conn, "SELECT * from jadwal order by id DESC;");

?>

<!-- <div class="flash-data" data-flashdata=""></div> -->
<div class="col-10 mx-auto">


    <!-- show sweet alert -->
    <?php if (isset($_SESSION['message'])) : ?>
    <div class="flash-data" data-flashdata="<?= $_SESSION['message'] ?>" data-title="<?= $_SESSION['title'] ?>"
        data-type="<?= $_SESSION['type'] ?>"></div>
    <?php
        unset($_SESSION['message']);
        unset($_SESSION['title']);
        unset($_SESSION['type']);
    endif;
    ?>

    <div class="card card-accent-primary">
        <div class="card-header"><strong>Daftar Agenda</strong></div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered text-center" style="width:100%" id="request">
                    <thead>
                    <tr>
          <th scope="col">No</th>
          
          <th scope="col">Judul Kegiatan</th>
          <th scope="col">Mulai</th>
          <th scope="col">Selesai</th>
        
          <th scope="col">Status</th>
         

        
         
        </tr>
                    </thead>

                    <tbody>
                        <?php $i = 1;
                        while ($data = mysqli_fetch_assoc($query)) : ?>
                       
                        <tr id="<?= $data['id'] ?>">
                        <td><?= $i++ ?></td>
                         
                          
                            <td><?= $data['judul_kegiatan'] ?></td>
                            <td><?= $data['mulai'] ?></td>
                            <td><?= $data['selesai'] ?></td>
                        
                           
                            <td>
                                <a href="<?= BASE_URL . 'admin/?page=agenda&action=hadir&id_jadwal=' . $data['id']?>"
                                    class="btn btn-sm btn-success mt-1">Hadir</a>
                                
                                    <button type="button" class="btn btn-danger btn-sm mt-1" data-toggle="modal" data-target="#tolak<?php echo $data['id']; ?>">
                                    Tolak
                                    </button>
                                    

                            </td>
                           
                        </tr>

                        <div class="modal fade" id="tolak<?php echo $data['id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Alasan Tidak Hadir</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form method="POST" action="?page=agenda&action=tolak" class="d-inline">
                <div class="row mb-3">
                <input type="hidden" name="id_jadwal" value="<?= $data['id'] ?>">
                  <label for="inputText" class="col-sm-5 col-form-label">Alasan</label>
                  <div class="col-sm-12">
                   <textarea name="alasan" id="" class="form-control"></textarea>
                
                  </div>
                </div>

               
              
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Simpan</button>
      </div>
              </form>
      </div>
      
   
    </div>
  </div>
</div>

                        <?php endwhile ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

