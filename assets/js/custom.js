//function swall alert hapus data
function hapusdata(title, url, id, nama) {
    Swal.fire({
        title: 'Apakah anda yakin?',
        text: "Ingin Menghapus Data " + nama,
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#db3325',
        cancelButtonColor: '#f5a732',
        confirmButtonText: "Hapus",
        cancelButtonText: "Kembali",
    }).then((result) => {
        if (result.value) {
            $.ajax({
                url: url + id,
                type: 'DELETE',
                error: function (xhr, textStatus, error) {
                    console.log(xhr.responseText);
                    console.log(xhr.statusText);
                    console.log(textStatus);
                    console.log(error);
                },
                success: function (data) {
                    $("#" + id).remove();
                    Swal.fire({
                        title: title,
                        text: 'Hapus Data Berhasil!',
                        icon: 'success'
                    })
                }
            });
        }
    })
}

function swalhref(link, titletext) {
    Swal.fire({
        title: 'Apakah anda yakin?',
        text: " " + titletext,
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Ya',
        cancelButtonText: 'Tidak'
    }).then((result) => {
        if (result.value) {
            window.location.href = link
        }
    })
}
