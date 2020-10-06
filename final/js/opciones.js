Swal.fire({
	 title: "Lo sentimos ",
	 html: "el cambio de contraseña ya se efectúo",
	 icon: "error"

}).then(() => {
	window.location='./recuperar.php';
});