
<?php
// koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "db_deadline") or die('gagal koneksi');

// Detail Aplikasi
function query($query)
{
	global $conn;
	$result = mysqli_query($conn, $query);
	$rows = [];
	while ($row =  mysqli_fetch_assoc($result)) {
		$rows[] = $row;
	}

	return $rows;
}

// registrasi
function registrasi($data)
{
	global $conn;

	$gmail = strtolower(stripslashes($data["user_gmail"]));
	$password = mysqli_real_escape_string($conn, $data["password"]);
	$password2 = mysqli_real_escape_string($conn, $data["con_password"]);


	// cek konfirmasi password
	if ($password !== $password2) {
		echo "<script>
				alert('konfirmasi password tidak sesuai!');
			</script>";
		return false;
	}

	// enkripsi password
	$password = password_hash($password, PASSWORD_DEFAULT);
	$gmail = filter_input(INPUT_POST, 'user_gmail', FILTER_VALIDATE_EMAIL);

	// tambahkan user baru ke database
	mysqli_query($conn, "INSERT INTO tb_users VALUES('', '$gmail', '$password')");

	return mysqli_affected_rows($conn);
}
?>