function check_filtre(checkBox, id_text) {
	var text = document.getElementById(id_text);
  // If the checkbox is checked, display the output text
  
  if (typeof checkBox == "string"){
  	var checkBox = document.getElementById(checkBox);
  }


  if (checkBox.checked == true){
     text.style.display = "block";
  } else {
     text.style.display = "none";
  }
}
