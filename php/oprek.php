<?php
include 'koneksi.php';

$sql = mysqli_query($conn,"SELECT COUNT(nama) as nama FROM Tpembelian");
while ($row = mysqli_fetch_array($sql)) {
    $id = "TR0";
    $maseko2 = $row['nama'];
}
$maseko = 0;


if ($maseko2>=10) {
  echo $id.($maseko + $maseko2);
}
else {
  echo $id.$maseko . $maseko2;
}


 ?>
