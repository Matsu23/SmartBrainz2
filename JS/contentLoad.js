
let x=0;

window.onscroll = function() {loadScroll(window.innerHeight,window.scrollY,document.body.scrollHeight)};
function loadScroll(wheight,wScrollY,bodyOffSetHeight){
	
	/*alert(document.documentElement.scrollTop);*/
	
	 if ((wheight + wScrollY) >= bodyOffSetHeight) {
		
		 const result=document.getElementById("result");
        alert('fim da pagina');
		x+=5;
		const elm = document.createElement("div");
		fetch("http://localhost/API/timeline.php", {
			method: "POST",
			headers: {
			"Content-Type": "application/x-www-form-urlencoded; charset=UTF-8",
			},
			body: `counter=${x}`,
		})
		.then((response) => response.text())
		.then((res) => (elm.innerHTML += res));
		
		
		
		result.appendChild(elm);

		
		
		
    }
	

	
}






