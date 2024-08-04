window.addEventListener("load", () => {

    console.log(botmanChatWidget);
    setTimeout(() => {
    botmanChatWidget.whisper("start");
    botmanChatWidget.close();
    }, 1000); 
    });