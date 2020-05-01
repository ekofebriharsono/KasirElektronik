<?php
include 'koneksi.php';



// if (isset($_GET['id_user']) {
//   $id = $_GET['id_user'];
//   mysqli_query($conn, "DELETE FROM user WHERE kode = '$id'");
//
//   header('user.php');
// }

// if (isset($_POST['tambahdata'])) {
//
// //   session_start();
// // $namacustomer = $_POST['namacustomer'];
// //   $_SESSION['namacustomer'] = $namacustomer;
//
// header("Location:../pilihbarang.php");
// }


if (isset($_POST['tambah'])) {
  $id = rand(999,90000);
  $nama_kategori= $_POST['nama_kategori'];

  $nama= $_POST['nama_barang'];
  $tipe= $_POST['tipe'];
  $harga= $_POST['harga_jual'];
  $jumlah= $_POST['jumlah'];
  $total = $harga * $jumlah;
 session_start();

 $_SESSION['namacustomer'] = $namacustomer;
  $perintah = "SELECT * FROM Dpenjualan WHERE nama_kategori = '$nama_kategori' AND tipe = '$tipe'";
   $hasil = mysqli_query($conn,$perintah);
   $row = mysqli_fetch_array($hasil);
   if ($row['nama_kategori'] == $nama_kategori AND $row['tipe'] == $tipe) {

     mysqli_query($conn, "UPDATE Dpenjualan SET
        jumlah='$jumlah' WHERE  nama_kategori = '$nama_kategori' AND tipe = '$tipe'");
         header("Location:../Tpenjualan.php");
 }else {
   mysqli_query($conn, "INSERT INTO Dpenjualan (id_dummy, nama_kategori, nama, tipe, harga, jumlah, total) VALUES (
     '$id','$nama_kategori','$nama','$tipe','$harga','$jumlah','$total')");

 header("Location:../Tpenjualan.php");
 }



} elseif (isset($_POST['tambahpem'])) {
  $id = rand(999,90000);
  $nama_kategori= $_POST['nama_kategori'];
  $nama= $_POST['nama_barang'];
  $tipe= $_POST['tipe'];
  $harga= $_POST['harga_jual'];
  $jumlah= $_POST['jumlah'];
  $total = $harga * $jumlah;
 session_start();

 $_SESSION['namacustomer'] = $namacustomer;
  $perintah = "SELECT * FROM Dpembelian WHERE nama_kategori = '$nama_kategori' AND tipe = '$tipe'";
   $hasil = mysqli_query($conn,$perintah);
   $row = mysqli_fetch_array($hasil);
   if ($row['nama_kategori'] == $nama_kategori AND $row['tipe'] == $tipe) {

     mysqli_query($conn, "UPDATE Dpembelian SET
        jumlah='$jumlah' WHERE  nama_kategori = '$nama_kategori' AND tipe = '$tipe'");
         header("Location:../Tpenjualan.php");
 }else {
   mysqli_query($conn, "INSERT INTO Dpembelian (id_dm_pem, nama_kategori, nama, tipe, harga, jumlah, total) VALUES (
     '$id','$nama_kategori','$nama','$tipe','$harga','$jumlah','$total')");

 header("Location:../Tpembelian.php");
 }



}
elseif (isset($_POST['totalpembayaran'])) {

  $sql = mysqli_query($conn,"SELECT COUNT(nama) as nama FROM Tpenjualan");
  while ($row = mysqli_fetch_array($sql)) {
      $id = "TP0";
      $maseko2 = $row['nama'];
  }
  $maseko = 0;


  if ($maseko2>=10) {
    $idtransaksi =  $id.($maseko + $maseko2);
  }
  else {
      $idtransaksi =  $id.$maseko . $maseko2;
  }
  $nama = $_POST['nama'];
  $diskon = $_POST['diskon'];
  $namacustomer = $_POST['namacustomer'];
  $tanggal = $_POST['tanggal'];
  $harga = $_POST['harga'];
  //$hargadiskon = $harga * $diskon;
  //$namacustomer = "maseko";
  $tipe = $_POST['tipe'];
  $jumlah = $_POST['jumlah'];
  $notelp = $_POST['notelp'];
  $alamat = $_POST['alamat'];

  $total = $_POST['total'];
  // $tanggal = date("Y/m/d");
  $totalpembayaran = $_POST['totalpembayarancus'];
  $jumlahuang = $_POST['jumlahuang'];
  $kembalian = $jumlahuang - $totalpembayaran;
 //$x = 0;
  $jumlah_dipilih = count($nama);

//mysqli_query($conn,"INSERT INTO item (id_item,id_transaksi,nama_item,tipe,harga_item,jumlah_item,total) values('$id','$idtransaksi','$nama[$x]','$tipe[$x]','$harga[$x]','$jumlah[$x]','$total[$x]')");
  for($x=0;$x<$jumlah_dipilih;$x++){
  //  echo $nama[$x] .$tipe[$x].$jumlah[$x].$harga[$x].$total[$x]. '<br>';
  $id = rand(999,9000) . $x;
//echo $jumlah_dipilih;
  mysqli_query($conn,"INSERT INTO item (id_item,id_transaksi,nama_item,tipe,harga_item,jumlah_item,total,tanggal) values('$id','$idtransaksi','$nama[$x]','$tipe[$x]','$harga[$x]','$jumlah[$x]','$total[$x]','$tanggal')");
//  echo $id."   ". $nama[$x]."   " .$tipe[$x]."   ".$jumlah[$x]."   ".$harga[$x]."   ".$total[$x]. '<br>';

  $perintah = "SELECT * FROM barang WHERE nama_barang = '$nama[$x]' AND tipe = '$tipe[$x]'";
  $hasil = mysqli_query($conn,$perintah);
  $row = mysqli_fetch_array($hasil);

  $masekoo = $row['penjualan'];
  $masekoo = $masekoo + $jumlah[$x];

  $stokawal = $row['stok'];
  $sisastok = $stokawal - $jumlah[$x];

  mysqli_query($conn,"UPDATE barang SET stok='$sisastok', penjualan='$masekoo' WHERE nama_barang = '$nama[$x]' AND tipe = '$tipe[$x]'");


  }

mysqli_query($conn,"INSERT INTO Tpenjualan (id_transaksi,nama,notelp,alamat,total,tanggal,jumlahuang,diskon) VALUES('$idtransaksi','$namacustomer','$notelp','$alamat','$totalpembayaran','$tanggal','$jumlahuang','$diskon')");
 mysqli_query($conn, "DELETE FROM Dpenjualan");
header("Location:../Tpenjualan.php");
}
elseif (isset($_POST['totalpembayaranpem'])) {

  $sql = mysqli_query($conn,"SELECT COUNT(nama) as nama FROM Tpembelian");
  while ($row = mysqli_fetch_array($sql)) {
      $id = "TR0";
      $maseko2 = $row['nama'];
  }
  $maseko = 0;


  if ($maseko2>=10) {
    $idtransaksi =  $id.($maseko + $maseko2);
  }
  else {
    $idtransaksi =  $id.$maseko . $maseko2;
  }


  $nama = $_POST['nama'];
  $diskon = $_POST['diskon'];
  $namacustomer = $_POST['namacustomer'];
  $tanggal = $_POST['tanggal'];
  $harga = $_POST['harga'];
  //$hargadiskon = $harga * $diskon;
  //$namacustomer = "maseko";
  $tipe = $_POST['tipe'];
  $jumlah = $_POST['jumlah'];
  $notelp = $_POST['notelp'];
  $alamat = $_POST['alamat'];

  $total = $_POST['total'];
  // $tanggal = date("Y/m/d");
  $totalpembayaran = $_POST['totalpembayarancus'];
  $jumlahuang = $_POST['jumlahuang'];
  $kembalian = $jumlahuang - $totalpembayaran;
 //$x = 0;
  $jumlah_dipilih = count($nama);

//mysqli_query($conn,"INSERT INTO item (id_item,id_transaksi,nama_item,tipe,harga_item,jumlah_item,total) values('$id','$idtransaksi','$nama[$x]','$tipe[$x]','$harga[$x]','$jumlah[$x]','$total[$x]')");
  for($x=0;$x<$jumlah_dipilih;$x++){
  //  echo $nama[$x] .$tipe[$x].$jumlah[$x].$harga[$x].$total[$x]. '<br>';
  $id = rand(999,9000) . $x;
//echo $jumlah_dipilih;
  mysqli_query($conn,"INSERT INTO item_pem (id_item_pem,id_pembelian,nama_item,tipe,harga_item,jumlah_item,total,tanggal) values('$id','$idtransaksi','$nama[$x]','$tipe[$x]','$harga[$x]','$jumlah[$x]','$total[$x]','$tanggal')");
//  echo $id."   ". $nama[$x]."   " .$tipe[$x]."   ".$jumlah[$x]."   ".$harga[$x]."   ".$total[$x]. '<br>';

  $perintah = "SELECT * FROM barang WHERE nama_barang = '$nama[$x]' AND tipe = '$tipe[$x]'";
  $hasil = mysqli_query($conn,$perintah);
  $row = mysqli_fetch_array($hasil);
  $masekoo = $row['pembelian'];
  $masekoo = $masekoo + $jumlah[$x];


  $stokawal = $row['stok'];
  $sisastok = $stokawal + $jumlah[$x];

  mysqli_query($conn,"UPDATE barang SET stok='$sisastok', pembelian='$masekoo' WHERE nama_barang = '$nama[$x]' AND tipe = '$tipe[$x]'");


  }

mysqli_query($conn,"INSERT INTO Tpembelian (id_pembelian,nama,notelp,alamat,total,tanggal,jumlahuang,diskon) VALUES('$idtransaksi','$namacustomer','$notelp','$alamat','$totalpembayaran','$tanggal','$jumlahuang','$diskon')");
 mysqli_query($conn, "DELETE FROM Dpembelian");
header("Location:../Tpembelian.php");
}

elseif (isset($_POST['tambahdata'])) {
  $namacustomer = $_POST['namacustomer'];
  $jumlahuang = $_POST['jumlahuang'];
  $diskon = $_POST['diskon'];
  $tanggal = $_POST['tanggal'];
  $notelp = $_POST['notelp'];
  $alamat = $_POST['alamat'];
  session_start();
  $_SESSION['nama_cus'] = $namacustomer;
  $_SESSION['jumlahuang'] = $jumlahuang;
  $_SESSION['diskon'] = $diskon;
  $_SESSION['tanggal'] = $tanggal;
  $_SESSION['notelp'] = $notelp;
  $_SESSION['alamat'] = $alamat;
  header("location:../pilihbarang.php");
}

elseif (isset($_POST['tambahdatapem'])) {
  $namacustomer = $_POST['namacustomer'];
  $jumlahuang = $_POST['jumlahuang'];
  $diskon = $_POST['diskon'];
  $tanggal = $_POST['tanggal'];
  $notelp = $_POST['notelp'];
  $alamat = $_POST['alamat'];
  session_start();
  $_SESSION['nama_ad'] = $namacustomer;
  $_SESSION['jumlahuang_ad'] = $jumlahuang;
  $_SESSION['diskon_ad'] = $diskon;
  $_SESSION['tanggal_ad'] = $tanggal;
  $_SESSION['notelp_ad'] = $notelp;
  $_SESSION['alamat_ad'] = $alamat;
  header("location:../pilihpembelian.php");
}

elseif (isset($_POST['filter'])) {
  header("Location:../Lpenjualanfilter.php");
}



else {

  $username = $_POST['username'];
  $password = $_POST['password'];

  $perintah = "select * from user WHERE username = '$username' AND password = '$password'";
   $hasil = mysqli_query($conn,$perintah);
   $row = mysqli_fetch_array($hasil);
   if ($row['username'] == $username AND $row['password'] == $password) {

   session_start(); // memulai fungsi session
   $_SESSION['username'] = $username;
   $_SESSION['nama_user'] = $row['nama_user'];
   $_SESSION['nama_cus'] = "";
   $_SESSION['jumlahuang'] = "";
   $_SESSION['diskon'] = "";
   $_SESSION['tanggal'] = "";
   $_SESSION['notelp'] = "";
   $_SESSION['alamat'] = "";

   $_SESSION['nama_ad'] = "";
   $_SESSION['jumlahuang_ad'] = "";
   $_SESSION['diskon_ad'] ="";
   $_SESSION['tanggal_ad'] = "";
   $_SESSION['notelp_ad'] ="";
   $_SESSION['alamat_ad'] ="";


   if ($row['status'] == "gudang") {
     $_SESSION['status'] = "gudang";
   } elseif ($row['status'] == "kasir") {
    $_SESSION['status'] = "kasir";
  }else {
    $_SESSION['status'] = "superuser";
  }
   header("location:../dashboard.php"); // jika berhasil login, maka masuk ke file home.php
   }
   else {
   echo "Gagal Masuk"; // jika gagal, maka muncul teks gagal masuk
   }

  //  $data = [
  //    "kategori" => $_POST['kategori'],
  //    "nama" => $_POST['nama']
  //  ];
   //
  //  $data = [
  //    "kategori" => [
  //      "ASUS", "TOSHIBA"
  //    ],
  //    "nama" => [
  //
  //    ]
  //  ]
  //  $data = json_encode($data);
  //  json_decode()
}

//SELECT COUNT(nama_kolom) FROM nama_table




 ?>
