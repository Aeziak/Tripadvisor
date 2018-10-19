let article = document.createElement("article");
		article.setAttribute("data-id", data.id);

		let p = document.createElement("p");
		p.innerHTML = data.value;
		p.addEventListener("dblclick", function(){
			updateProverbe(data.id);
		});

		let btn = document.createElement("button");
		btn.classList.add("deletebtn");
		btn.innerHTML = "X";
		btn.addEventListener("click", function(){
			deleteProverbe(data.id);
		});

		article.append(btn);
		article.append(p);
		document.getElementById("proverbes").appendChild(article);



let photos = document.getElementByClassName("photoHotel");
photos.foreach(function(){
	
});