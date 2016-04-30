
	function delete_discount(id, store){

		if (confirm('Are you sure you want to delete this discount?')) {
			var link = "delete_discount.php?id=" + id + "&store=" + store;
			window.location = link;
		}
	}

	function delete_store(id){

		if (confirm('Are you sure you want to delete this store?' + id)) {
			var link = "delete_store.php?id=" + id;
			window.location = link;
		}
	}

	function delete_code(code, discount, store){

		if (confirm('Are you sure you want to delete this code?')) {
			var link = "delete_code.php?code=" + code + "&discount=" + discount + "&store=" + store;
			window.location = link;
		}
	}