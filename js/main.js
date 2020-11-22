

function AddToCart(add_product_code) {

	var xmlhttp = new XMLHttpRequest();

	xmlhttp.onreadystatechange = function () {
		if (this.readyState == 4 && this.status == 200){
			if (this.responseText == 0) {
				document.getElementById('iconCart').innerHTML = 0;
			}else{
				document.getElementById('iconCart').innerHTML = this.responseText;
			}
			// alert(this.responseText);
		}
	}

	xmlhttp.open('GET', '/casestudy2/cart/cartProcess.php?add_product_code=' + add_product_code, true);
	xmlhttp.send();
}

function changeAmount(change_product_code) {
	// alert("ok");
	var xmlhttp = new XMLHttpRequest();
	xmlhttp.onreadystatechange = function () {
		if (this.readyState == 4 && this.status == 200){
			if (this.responseText == 0) {
				document.getElementById('iconCart').innerHTML = 0;
			}else{
				document.getElementById('iconCart').innerHTML = this.responseText;
			}
			$("#table").load(window.location.href + " #table ");
		}
	}

	xmlhttp.open('GET', '/casestudy2/cart/cartProcess.php?change_product_code=' + change_product_code, true);
	xmlhttp.send();
}

function removeProduct(remove_product_code) {
	// alert(remove_product_code);
	var xmlhttp = new XMLHttpRequest();
	xmlhttp.onreadystatechange = function () {
		if (this.readyState == 4 && this.status == 200){
			if (this.responseText == 0) {
				document.getElementById('iconCart').innerHTML = 0;
			}else{
				document.getElementById('iconCart').innerHTML = this.responseText;
			}
			$("#table").load(window.location.href + " #table ");
		}
	}
	
	xmlhttp.open('GET', '/casestudy2/cart/cartProcess.php?remove_product_code=' + remove_product_code, true);
	xmlhttp.send();
}