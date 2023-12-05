var sendButton = document.getElementById("send-button");
sendButton.addEventListener("onclick", onSentButtonClicked());
function onSentButtonClicked() {
	sendButton.value = "Sent!";
}