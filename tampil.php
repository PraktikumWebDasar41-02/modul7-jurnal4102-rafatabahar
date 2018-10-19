<?php  
	$koneksi = mysqli_connect('localhost','root','','jurnal-rafata');

	if (isset($_GET['nim'])) {
		mysqli_query($koneksi, "DELETE FROM mahasiswa WHERE nim = '".$_GET['nim']."' ");
		header("Location:tampil.php");
	}

?>
<a href="form.php">Input data baru</a><br>

<form method="post">
	Cari: <input type="text" name="cari">
	<input type="submit" name="submit_cari" value="cari">	
</form><br>

<table border="1">
	<thead>
		<td>NO</td>
		<td>NIM</td>
		<td>Nama</td>
		<td>Program Studi</td>
		<td>Aksi</td>
	</thead>
	<tbody>
		<?php  
			$hasil;
			if (isset($_POST['submit_cari'])) {
				$hasil = mysqli_query($koneksi, "SELECT * FROM mahasiswa WHERE nim LIKE '%".$_POST['cari']."%' ");
			}else{
				$hasil = mysqli_query($koneksi, "SELECT * FROM mahasiswa");			
			}

			$i = 1;
			while ($row = mysqli_fetch_array($hasil)) {
				echo "<tr>";
				echo "<td>$i</td>";
				echo "<td>".$row['nim']."</td>";
				echo "<td>".$row['nama']."</td>";
				echo "<td>".$row['prodi']."</td>";
				echo "<td><a href='tampil.php?nim=".$row['nim']."'>Hapus</a></td>";
				echo "</tr>";				
				$i++;
			}
			
		?>
	</tbody>
</table>