function RefreshPage() {
    location.reload();
  }

function DeleteAlert(kd_peminjaman) {
    Swal.fire({
      title: 'Yakin Ingin Menghapus?',
      text: "Anda Tidak Akan Bisa Mengembalikan Data Ini!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Hapus Wae Lah!'
    }).then((result) => {
      if (result.isConfirmed) {
        Swal.fire(
            'Data Terhapus!',
            'na ul awas nyesel!',
            'success'
          ).then((result) => {
            if (result.isConfirmed) {
                window.location.href = `proces/hapus.php?kd_peminjaman=${kd_peminjaman}`;
            }
          })
       
      }
    });
}





function AlertCreate() {
    Swal.fire(
        'SUKSES!',
        'Data Berhasil Ditambahkan!',
        'success'
      ).then((result) => {
        if (result.isConfirmed) {
          // Jalankan fungsi untuk mengirimkan formulir
          submitForm();
        }
      });
}

function AlertUpdate() {
    Swal.fire(
        'Wokeh Sip!',
        'Data Berhasil Diupdate!',
        'success'
      ).then((result) => {
        if (result.isConfirmed) {
          // Jalankan fungsi untuk mengirimkan formulir
          submitFormUpdate();
        }
      });
}

function submitForm() {
    var form = document.getElementById('formProduk');
    var formData = new FormData(form);
    
    var xhr = new XMLHttpRequest();
    xhr.open('POST', '../../admin/produk.php', true);
    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && xhr.status == 200) {
            // Handle response jika diperlukan
            console.log(xhr.responseText);
        }
    };
    xhr.send(formData);
    return false;
    }
    // Jalankan pengiriman formulir
function submitFormUpdate() {
    // Ambil elemen form menggunakan ID atau selektor lain
    var form = document.getElementById('formPeminjamanUpdate');
  
    // Jalankan pengiriman formulir
    form.submit();
  }