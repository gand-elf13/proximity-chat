const sendButton = document.querySelector("#send-button");
sendButton.addEventListener("click", function(event) {
	event.preventDefault();
	createMessage();
});


function createMessage() {
	const p = document.createElement("p");
	const spanUsername = document.createElement("span");
	spanUsername.classList.add("username");
	const usernameTextNode = document.createTextNode("Username-NEW: ");	
	spanUsername.appendChild(usernameTextNode);
	
	const spanMessage = document.createElement("span");
	spanMessage.classList.add("message");
	
	
	p.appendChild(spanUsername);
	const chatbox = document.querySelector("#chatbox");
	chatbox.appendChild(p);
}