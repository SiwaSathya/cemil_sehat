<?php
function createproduk(){
        include "helper_function.php";
        include "dbcon.php";
            $idProduk = generateKode();
            $namaProduk = $_POST['nama_produk'];
            $hargaProduk = $_POST['harga'];
            $stokProduk = $_POST['stok_produk'];
            $gambar = $_FILES['gambar'];
            $deskripsi = $_POST['deskripsi'];
            $ukuranProduk = $_POST['ukuran_produk'];

            // proses pengolahan gambar
            $fileName = $gambar['name'];
            $fileTmp = $gambar['tmp_name'];

            $folder = '../data_file/';
            
            $destination = $folder . $fileName;
            if(move_uploaded_file($fileTmp, $destination)){
                $escapedIdProduk = $conn->real_escape_string($idProduk);
                $escapedNamaProduk = $conn->real_escape_string($namaProduk);
                $escapedHargaProduk = $conn->real_escape_string($hargaProduk);
                $escapedStokProduk = $conn->real_escape_string($stokProduk);
                $escapedFileName = $conn->real_escape_string($fileName);
                $escapedDeskripsi = $conn->real_escape_string($deskripsi);
                $escapedUkuranProduk = $conn->real_escape_string($ukuranProduk);

                $sql = "INSERT INTO `produk` (id_produk, nama_produk, harga, stok_produk, gambar_produk) VALUES ('$escapedIdProduk', '$escapedNamaProduk', '$escapedHargaProduk', '$escapedStokProduk', '$escapedFileName')";

                $result = mysqli_query($conn,$sql);

                $sql1 =  "INSERT INTO `produk` (id_produk, deskripsi_produk, ukuran_produk, gambar_produk) VALUES ('$escapedIdProduk', '$escapedDeskripsi', '$escapedUkuranProduk', '$escapedFileName')";

                $result = mysqli_query($conn,$sql1);

                if($result){
                    header("Location: ../admin/index.php");
                    exit;
                }else{
                    echo("gagal");
                }

              }
 }
?>