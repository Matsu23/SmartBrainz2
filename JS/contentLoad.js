
let x=0;
window.onscroll = function() {loadScroll()};
function loadScroll(){
	/*alert(document.documentElement.scrollTop);*/
	
	 if ((window.innerHeight + window.scrollY) >= document.body.offsetHeight) {
		 const result=document.getElementById("result");
        alert('fim da pagina');
		x+=5;
		const elm = document.createElement("div");
		fetch("http://localhost/timeline.php", {
			method: "POST",
			headers: {
			"Content-Type": "application/x-www-form-urlencoded; charset=UTF-8",
			},
			body: `counter=${x}`,
		})
		.then((response) => response.text())
		.then((res) => (elm.innerHTML += res));
		
		
		
		result.appendChild(elm);
		
		
		alert(x);
		
    }
	
}


window.onload = function(){teste()};

function teste(){
	
	window.alert('erer');
}

