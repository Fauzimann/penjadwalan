<!-- Main Footer -->
<footer class="main-footer text-center">
    <div class="d-flex justify-content-center">
        <div class="bg-white" style="width: 200px; height: 120px; border: 5px solid var(--bg-primary); border-radius: 30px; text-align: center; padding-top: 10px;">
            <img src="https://diskominfo.jabarprov.go.id/dev2021/img/logo_diskom.svg" alt="" style="height: 50%;">
        </div>
    </div>
</footer>

</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script> -->
<!-- jQuery -->
<script src="<?= BASE_URL ?>assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?= BASE_URL ?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE -->
<script src="<?= BASE_URL ?>assets/dist/js/adminlte.js"></script>

<!-- OPTIONAL SCRIPTS -->
<script src="<?= BASE_URL ?>assets/plugins/chart.js/Chart.min.js"></script>

<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?= BASE_URL ?>assets/dist/js/pages/dashboard3.js"></script>

<!-- form validation -->
<script src="<?= BASE_URL . 'assets/node_modules/bootstrap-validator/dist/validator.min.js'; ?>"></script>
<!-- DataTables  & Plugins -->
<script src="<?= BASE_URL ?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?= BASE_URL ?>assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?= BASE_URL ?>assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?= BASE_URL ?>assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="<?= BASE_URL ?>assets/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?= BASE_URL ?>assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="<?= BASE_URL ?>assets/plugins/jszip/jszip.min.js"></script>
<script src="<?= BASE_URL ?>assets/plugins/pdfmake/pdfmake.min.js"></script>
<script src="<?= BASE_URL ?>assets/plugins/pdfmake/vfs_fonts.js"></script>
<script src="<?= BASE_URL ?>assets/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="<?= BASE_URL ?>assets/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="<?= BASE_URL ?>assets/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<script src="<?= BASE_URL ?>assets/fullcalendar/lib/main.min.js"></script>
<!-- custom js -->
<script src="<?= BASE_URL . 'assets/js/custom.js'; ?>" type="text/javascript" charset="utf-8"></script>
<!-- fontawesome -->
<script src="<?= BASE_URL . 'assets/js/all.min.js'; ?>" type="text/javascript" charset="utf-8"></script>
<!-- sweetaler 2 -->
<script src="<?= BASE_URL . 'assets/js/sweetalert2.all.min.js' ?>"></script>
<!-- custom file input -->
<script src="<?= BASE_URL . 'assets/node_modules/bs-custom-file-input/dist/bs-custom-file-input.min.js' ?>">
</script>
<!-- gijgo datepicker -->
<script src="<?= BASE_URL . 'assets/node_modules/datepicker/js/bootstrap-datepicker.min.js' ?>"></script>
<!-- select auto complete -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/tarekraafat-autocomplete.js/10.2.7/autoComplete.min.js"></script>

<script>
       document.addEventListener('DOMContentLoaded', function () {

                var events = [];
                if (!!scheds) {
            Object.keys(scheds).map(k => {
                var row = scheds[k]
                events.push({ id: row.id, title: row.judul_kegiatan, start: row.mulai, end: row.selesai });
            })
        }
        var date = new Date()
        var d = date.getDate(),
            m = date.getMonth(),
            y = date.getFullYear()
                var calendarEl = document.getElementById('calendar');
                var calendar = new FullCalendar.Calendar(calendarEl, {
                    headerToolbar: {
                left: 'prev,next today',
                right: 'dayGridMonth,dayGridWeek,list',
                center: 'title',
            },
            selectable: true,
            themeSystem: 'bootstrap',
            //Random default events
            events: events,
            eventClick: function(info) {
                var _details = $('#event-details-modal')
                var id = info.event.id
                if (!!scheds[id]) {
                    _details.find('#judul_kegiatan').text(scheds[id].judul_kegiatan)
                    _details.find('#id').text(scheds[id].id)
                    _details.find('#namajenis').text(scheds[id].namajenis)
                    _details.find('#mulai').text(scheds[id].sdate)
                    _details.find('#selesai').text(scheds[id].edate)
                    _details.find('#edit,#delete').attr('data-id', id)

//                   var tolakButton = _details.find('#tolak'); // Use .find() instead of .querySelector()

//                     console.log(scheds[id].status_tolak);
// if (tolakButton.length > 0) {
//     if (scheds[id].status_tolak == 1) {
//         tolakButton.hide(); 
//     } else {
//         tolakButton.show(); 
//     }
// } else {
//     console.log("Elemen dengan ID 'tolak' tidak ditemukan.");
// }


                    _details.modal('show')
                    document.getElementById("id_jadwal").value = scheds[id].id
                    document.getElementById("id_hadir").value = scheds[id].id
                } else {
                    alert("Event is undefined");
                }
            },
            eventDidMount: function(info) {
                // Do Something after events mounted
            },
            editable: true

                });
    
                calendar.render();

                 // Form reset listener
        $('#schedule-form').on('reset', function() {
            $(this).find('input:hidden').val('')
            $(this).find('input:visible').first().focus()
        })

        // Edit Button
        $('#edit').click(function() {
            var id = $(this).attr('data-id')
            if (!!scheds[id]) {
                var _form = $('#schedule-form')
                console.log(String(scheds[id].mulai), String(scheds[id].mulai).replace(" ", "\\t"))
                _form.find('[name="id"]').val(id)
                _form.find('[name="judul_kegiatan"]').val(scheds[id].judul_kegiatan)
                _form.find('[name="lokasi"]').val(scheds[id].lokasi)
                _form.find('[name="mulai"]').val(String(scheds[id].mulai).replace(" ", "T"))
                _form.find('[name="selesai"]').val(String(scheds[id].selesai).replace(" ", "T"))
                _form.find('[name="deskripsi"]').val(String(scheds[id].deskripsi).replace(" ", "T"))
                _form.find('[name="id_kegiatan"]').val(String(scheds[id].id_kegiatan).replace(" ", "T"))
                _form.find('[name="jenis_permohonan"]').val(String(scheds[id].jenis_permohonan).replace(" ", "T"))
                _form.find('[name="stat"]').val(String(scheds[id].stat).replace(" ", "T"))
                _form.find('[name="instansi"]').val(String(scheds[id].instansi).replace(" ", "T"))
                _form.find('[name="pic"]').val(String(scheds[id].pic).replace(" ", "T"))
                $('#event-details-modal').modal('hide')
                _form.find('[name="judul_kegiatan"]').focus()
            } else {
                alert("Event is undefined");
            }
        })

        // Delete Button / Deleting an Event
        $('#delete').click(function() {
            var id = $(this).attr('data-id')
            if (!!scheds[id]) {
                var _conf = confirm("Apakah anda yakin ?");
                if (_conf === true) {
                    location.href = "?page=agenda&action=delete&id=" + id;
                }
            } else {
                alert("Event is undefined");
            }
        })

            });
</script>

<script>
    // Setup datatables 
    $(document).ready(function () {

        //init custom file input
        bsCustomFileInput.init()

          // peramalan obat
             $("#peramalan #id_obat").on("change", function () {
            let id_obat = $(this).val()
            let periode = $("#periode").val()

            // console.log(id_bahan_baku, periode)

            $.ajax({
                url: "<?= BASE_URL . ('admin/Apoteker/peramalan/json_peramalan.php') ?>",
                type: 'POST',
                data: {
                    id_obat: id_obat,
                },
                error: function (xhr, textStatus, error) {
                    console.log(xhr.responseText);
                    console.log(xhr.statusText);
                    // console.log(textStatus);
                    // console.log(error); 

                    Swal.fire({
                        title: title,
                        text: 'Penjualan tidak tersedia',
                        icon: 'error'
                    })
                },
                success: function (data) {

                    let bulan = parseInt(data.bulan)
                    let tahun = parseInt(data.tahun)

                    if (bulan == 12) {
                        tahun += 1
                        bulan = 1
                    } else {
                        bulan += 1
                    }

                    if (bulan < 10) {
                        bulan = "0" + bulan
                    }

                    let periode_selanjutnya = tahun + "-" + bulan

                    $("#periode").val("")
                    $("#periode").attr('max', periode_selanjutnya)
                }
            });
        })


        //obat
        $("#obat").DataTable()
        $("#obat").on('click', '.remove', function () {
            var id = $(this).data('id');
            var nama = $(this).data('nama');
            hapusdata('Obat', "?page=obat&action=deletedata&id=", id, nama)
        })

        //pengguna
        $("#pengguna").DataTable()
        $("#pengguna").on('click', '.remove', function () {
            var id = $(this).data('id');
            var nama = $(this).data('nama');
            hapusdata('Data Pengguna', "?page=pengguna&action=deletedata&id=", id, nama)
        })

         
         $("#jeniskegiatan").DataTable()
        $("#jeniskegiatan").on('click', '.remove', function () {
            var id = $(this).data('id');
            var nama = $(this).data('nama');
            hapusdata('Data Jenis Kegiatan', "?page=jeniskegiatan&action=deletedata&id=", id, nama)
        })

        $("#request").DataTable()
        $("#request").on('click', '.remove', function () {
            var id = $(this).data('id');
            var nama = $(this).data('nama');
            hapusdata('Data Request', "?page=request&action=deletedata&id=", id, nama)
        })


        //jenis-obat
        $("#jenis-obat").DataTable()
        $("#jenis-obat").on('click', '.remove', function () {
            var id = $(this).data('id');
            var nama = $(this).data('nama');
            hapusdata('Jenis Obat', "?page=jenis-obat&action=deletedata&id=", id,
                nama)
        })

        //supplier
        $("#supplier").DataTable()
        $("#supplier").on('click', '.remove', function () {
            var id = $(this).data('id');
            var nama = $(this).data('nama');
            hapusdata('Data Supplier', "?page=supplier&action=deletedata&id=", id, nama)
        })

        //obat-masuk
        $("#obat-masuk").DataTable()
        $("#obat-masuk").on('click', '.remove', function () {
            var id = $(this).data('id');
            var nama = $(this).data('nama');
            hapusdata('Data Obat Masuk', "?page=obat-masuk&action=deletedata&id=", id, nama)
        })

        //bahanbakumasuk
        $("#penjualan").DataTable()
        $("#penjualan").on('click', '.remove', function () {
            var id = $(this).data('id');
            var nama = $(this).data('nama');
            hapusdata('Data Penjualan', "?page=penjualan&action=deletedata&id=", id,
                nama)
        })

        //bahanbakukeluar
        $("#bahanbakukeluar").DataTable()
        $("#bahanbakukeluar").on('click', '.remove', function () {
            var id = $(this).data('id');
            var nama = $(this).data('nama');
            hapusdata('Data Bahan Baku Masuk', "?page=bahanbakukeluar&action=deletedata&id=",
                id, nama)
        })

        //permintaanbahanbaku
        $("#permintaanbahanbaku").DataTable()
        $("#permintaanbahanbaku").on('click', '.remove', function () {
            var id = $(this).data('id');
            var nama = $(this).data('nama');
            hapusdata('Data Permintaan Bahan Baku', "?page=permintaanbahanbaku&action=deletedata&id=",
                id, nama)
        })

        //stokopnamebahan
        $("#stokopnamebahan").DataTable()
        $("#stokopnamebahan").on('click', '.remove', function () {
            var id = $(this).data('id');
            var nama = $(this).data('nama');
            hapusdata('Data Stok Bahan Baku', "?page=stokopnamebahan&action=deletedata&id=", id,
                nama)
        })

        //barangjadimasuk
        $("#barangjadimasuk").DataTable()
        $("#barangjadimasuk").on('click', '.remove', function () {
            var id = $(this).data('id');
            var nama = $(this).data('nama');
            hapusdata('Data Barang Jadi Masuk', "?page=barangjadimasuk&action=deletedata&id=",
                id, nama)
        })

        //stokopnamebarang
        $("#stokopnamebarang").DataTable()
        $("#stokopnamebarang").on('click', '.remove', function () {
            var id = $(this).data('id');
            var nama = $(this).data('nama');
            hapusdata('Data Stok Barang Jadi', "?page=stokopnamebarang&action=deletedata&id=",
                id, nama)
        })

        //barangjadikeluar
        $("#barangjadikeluar").DataTable()
        $("#barangjadikeluar").on('click', '.remove', function () {
            var id = $(this).data('id');
            var nama = $(this).data('nama');
            hapusdata('Data Barang Jadi Keluar', "?page=barangjadikeluar&action=deletedata&id=",
                id, nama)
        })

        //peramalanbahanbaku
        $("#peramalanbahanbaku").DataTable()

        //pengadaanbahanbaku
        $("#pengadaanbahanbaku").DataTable()

        //barangjadi
        $("#barangjadi").DataTable()


        // sweetalert
        const flashdata = $('.flash-data').data('flashdata');
        const title = $('.flash-data').data('title');
        const type = $('.flash-data').data('type');

        if (flashdata) {
            Swal.fire({
                title: title,
                text: flashdata,
                icon: type
            })
        }

        // Setup datatables
        $.fn.dataTableExt.oApi.fnPagingInfo = function (oSettings) {
            return {
                "iStart": oSettings._iDisplayStart,
                "iEnd": oSettings.fnDisplayEnd(),
                "iLength": oSettings._iDisplayLength,
                "iTotal": oSettings.fnRecordsTotal(),
                "iFilteredTotal": oSettings.fnRecordsDisplay(),
                "iPage": Math.ceil(oSettings._iDisplayStart / oSettings._iDisplayLength),
                "iTotalPages": Math.ceil(oSettings.fnRecordsDisplay() / oSettings._iDisplayLength)
            };
        };


    });
</script>
</body>

</html>