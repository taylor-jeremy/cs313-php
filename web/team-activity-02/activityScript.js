function buttonClick() {
	alert("Clicked!");
}

function changeColor() {
	var color = document.getElementById("background").value;

	document.getElementById("first-div").style.background = color;
}

document.getElementById("changeColor").addEventListener("click", changeBackground, false);

/*$(document).ready(function(){
	var color = document.getElementById("background").value;
	$("#changeColor").click(function(){
		$("#first-div").css("background", color);
	});
});*/