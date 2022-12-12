


function like(id ,tipo,pageid){

    

    fetch("http://localhost/API/content.php", {
			method: "POST",
			headers: {
			"Content-Type": "application/x-www-form-urlencoded; charset=UTF-8",
			},
            body: `like=${id}&tipo=${tipo}&pageid=${pageid}`,
		})
		.then((response) => ( window.location.href = pageid));
		
       
       
        

}


