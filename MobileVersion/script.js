const sendButton = document.querySelector("#send-button");
sendButton.addEventListener("click", function(event) {
	event.preventDefault();
	createMessage();
});


function addMessage(usernameText, messageText) {
	const spanUsername = document.createElement("span");
	spanUsername.classList.add("username");
	const usernameTextNode = document.createTextNode(usernameText + ": ");	
	spanUsername.appendChild(usernameTextNode);
	
	const spanMessage = document.createElement("span");
	spanMessage.classList.add("message");
	const messageTextNode = document.createTextNode(messageText);
	spanMessage.appendChild(messageTextNode);
	
	const p = document.createElement("p");
	p.appendChild(spanUsername);
	p.appendChild(spanMessage);

	const chatbox = document.querySelector("#chatbox");
	chatbox.appendChild(p);
}


function createMessage() {
	const usernameInput = document.querySelector("#username-input");
	const messageInput = document.querySelector("#message-input");
	const username = usernameInput.value;
	const message = messageInput.value;
	if ((username.trim().length !== 0) && (message.trim().length !== 0)) {
		addMessage(username, message)
	}
}