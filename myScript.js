function handleUpdateClick() {

	if (confirm("Are you sure want to continue?")) {
	
	appendText();
	updateColor();
	}
}

function appendText() {
	var value = document.getElementById("text").value;
	document.getElementById("result").innerHTML += value;
	
}

function updateColor() {
	var value = document.getElementById("color").value;
	document.getElementById("result").style.background = value;

}

function toggleVisibility() {
	
	if (document.getElementById("result").style.visibility == "hidden") {
	
		document.getElementById("result").style.visibility = "visible";

	}
	else {
		document.getElementById("result").style.visibility = "hidden";

	}
		
}