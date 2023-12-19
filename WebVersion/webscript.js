// initialising necessary html elements
const longitudeposttemp = document.getElementById("longitudetemp");
const latitudeposttemp = document.getElementById("latitudetemp");
const messageInput = document.querySelector("#message-input");
const usernameInput = document.querySelector("#username-input");
const sendbtn = document.querySelector("#send-button");


//locate user and insert location data into an invisible form so when te message is send the website get the position.
if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition((position) => {
        let lat = position.coords.latitude;
        let long = position.coords.longitude;
        
        latitudeposttemp.value = lat;
        sessionStorage.setItem("latitude-autosave", lat);
        
        longitudeposttemp.value = long;
        sessionStorage.setItem("longitude-autosave", long);
    });
}


function uploadSessionItem(element, itemName) {
    const storedValue = sessionStorage.getItem(itemName);
    if (storedValue) {
        element.value = storedValue;
    }
}



// Keep username and message after refresh
function uploadAutosaves() {
    var dict = {
        messageInput: "message-autosave",
        usernameInput: "username-autosave",
        latitudeposttemp: "latitude-autosave",
        longitudeposttemp: "longitude-autosave"
    };
    for (var element in dict) {
        var itemName = dict [element];
        uploadSessionItem(element, itemName)
    }
    /*
    if (sessionStorage.getItem("message-autosave")) {
        messageInput.value = sessionStorage.getItem("message-autosave");
    }
    if (sessionStorage.getItem("username-autosave")) {
        usernameInput.value = sessionStorage.getItem("username-autosave");
    }
    if (sessionStorage.getItem("latitude-autosave")) {
        latitudeposttemp.value = sessionStorage.getItem("latitude-autosave");
    }
    if (sessionStorage.getItem("longititude-autosave")) {
        longitudeposttemp.value = sessionStorage.getItem("longititude-autosave");
    }*/
}


window.onload = () => {
    uploadAutosaves();
};


messageInput.addEventListener("keyup", () => {
    sessionStorage.setItem("message-autosave", messageInput.value);
    sessionStorage.setItem("focused-input", "messageInput");
});


usernameInput.addEventListener("keyup", () => {
    sessionStorage.setItem("username-autosave", usernameInput.value);
    sessionStorage.setItem("focused-input", "usernameInput");
});

sendbtn.addEventListener("click", () => {
    sessionStorage.setItem("message-autosave", "");
});


//automatically submit an invisible form to reload page and keep POST values
var auto_refresh = setInterval(submitform, 10000);


function submitform() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition((position) => {
            let lat = position.coords.latitude;
            let long = position.coords.longitude;
            
            var latitudepost = document.getElementById("test2");
            latitudepost.value = lat;
             
            var longitudepost = document.getElementById("test3");
            longitudepost.value = long;
            //if (not user_is_typing){
            document.getElementById("reload").submit();
            //}
        });
    }
}


// Keep scroll position after reloading, and keep focusing on the input, despite the refresh
document.addEventListener("DOMContentLoaded", function(e) { 
    var scrollpos = localStorage.getItem("scroll-pos");
    if (scrollpos) {
        window.scrollTo(0, scrollpos);
    }
    var activeElementName = localStorage.getItem("active-element");
    if (activeElementName) {
        if (activeElementName === messageInput.id) {
            messageInput.focus();
        }
        else if (activeElementName === usernameInput.id) {
            usernameInput.focus();
        }
    }
});


window.onbeforeunload = function(e) {
    localStorage.setItem("scroll-pos", window.scrollY);
    localStorage.setItem("active-element", document.activeElement.id);
};

