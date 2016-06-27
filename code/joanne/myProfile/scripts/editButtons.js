

/******************************/
/*This function changed the   */
/*name text to an input box.  */
/******************************/
function nameEdit(){
	var nameButton = document.getElementById("editName");
	var nameContainer = document.getElementById("nameText");
	var coolInfo = "meow is me";
	nameButton.onclick = function(){
		var inputName = document.createElement("input");
		inputName.setAttribute("type", "text");
		inputName.setAttribute("placeholder", coolInfo);
		inputName.setAttribute("id", "inputBox");
		nameContainer.appendChild(inputName);
		//document.body.insertBefore(inputName,nameContainer.firstChild);
		
		// source http://stackoverflow.com/questions/13396141/removing-text-from-inside-a-div
		$("#nameText").contents().filter(function () {
			return this.nodeType === 3; // Text nodes only
		}).remove();
		nameButton.remove();
		
		nameEnter();
		
	}
		
	
}


/************************/
/*This function changes */
/*the input box back to */
/*text when the enter   */
/*key is pressed        */
/************************/
function nameEnter(){
	var inputName = document.getElementById("inputBox");
	var nameContainer = document.getElementById("nameText");
	
	window.onkeydown = function(e){
			//if else is because some browsers support event some which
			if(e.event){
				pressed = e.keyCode;
			}else if(e.which){
				pressed = e.which;
			}
			if(pressed == 13){
				var editButton = document.createElement("img");
				editButton.setAttribute("id", "editName");
				editButton.setAttribute("src", "images/images/editButton.png");
				
				var placeholderName = "CoolKid";
				inputName.remove();
			
				
				nameContainer.innerHTML =placeholderName;
				nameContainer.appendChild(editButton);
				
				editButton.addEventListener("click", nameEdit(), false);
			}
			
		}
	
}





window.onload = function(){
	var onlyOneEdit = 0;
	nameEdit();
	
}