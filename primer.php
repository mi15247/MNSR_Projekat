<?php

	$veza = mysqli_connect("localhost", "student", "abcdef", "mstud");
	if(mysqli_connect_errno()){
		die("Problem sa povezivanjem: ".mysqli_connect_error());
	}
	
	$ime = $_GET['ime'];
	$prezime = $_GET['prezime'];
	$upit = "select datum_rodjenja from dosije where ime='$ime' and prezime='$prezime' ";
	$rezultat = mysqli_query($veza, $upit) or die("Problem prilikom izvrsavanja upita: ".mysqli_error($veza));
	$broj_pojavljivanja = mysqli_num_rows($rezultat);
	
	if($broj_pojavljivanja == 0){
		echo "Nema studenata koji se zovu $ime $prezime";
	}
	else{
		echo "<ul>";
		for($i = 0; $i < $broj_pojavljivanja; $i++){
			$red = mysqli_fetch_assoc($rezultat);
			echo "<li>";
			echo $red['ime']['prezime']['datum_rodjenja'];
			echo "</li>";
		}
		echo "</ul>";
	}
	
	mysqli_close($veza);
?>