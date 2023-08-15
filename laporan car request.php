<?php
$host = "dbcar";
$user = "sumitomo";
$pass = "sumitomo";
$database = "request_car";
$mysqli = new mysqli($host, $user, $pass, $database);
if ($mysqli->connect_errno) {
	trigger_error("Failed to connect to MYSQL: " . $mysqli, E_USER_NOTICE);
}
$filename = "Data_Car_Request-(" . date('d-m-Y') . ").xls";
header("content-disposition: attachment; filename=$filename");
header("content-type: application/vdn.ms-excel");
?>
<h2 align="center"> Data Laporan Car Request </h2>
<table border="1">
	<tr>
		<th>No</th>
		<th>NIK</th>
		<th>Nama</th>
		<th>Section</th>
		<th>Posisi</th>
		<th>Tujuan</th>
		<th>Keberangkatan</th>
		<th>Alasan</th>
		<th>Status Manager</th>
		<th>Status GA</th>
	
	</tr>
	<?php
	$mahasiswa = $mysqli->query("SELECT * FROM data ");
	$no = 0;
	while ($m = $mahasiswa->fetch_assoc()) {
		$no++;
	?>
		<tr>
			<th scope="row"><?= $no; ?></th>
			<td><?= $m["nik"]; ?></td>
			<td><?= $m["nama"]; ?></td>
			<td><?= $m["section"]; ?></td>
			<td><?= $m["posisi"]; ?></td>
			<td><?= $m["tujuan"]; ?></td>
			<td><?= $m["keberangkatan"]; ?></td>
			<td><?= $m["alasan"]; ?></td>
			<td><?= $m["status_manager"]; ?></td>
            <td><?= $m["status_ga"]; ?></td>
			
		<?php } ?>
		</tr>
</table>
