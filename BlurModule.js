function getRandom(array) {
    return array[Math.floor(Math.random() * array.length)];    
}


function blur(initialMessage, percent) {
    let blurredMessage = "";
    const BLURRED = ["@", "&", "#", ";", "!", "*", "µ", "£", "$", "€", ",", "'", '"', "`", "~", "^", "à", "é", "ê", "â", "ù"];
    for (let char of initialMessage) {
        const RAND = Math.random();
        if (RAND <= percent) {
            blurredMessage += getRandom(BLURRED);
        } else {
            blurredMessage += char;
        }
    }
    return blurredMessage;
}