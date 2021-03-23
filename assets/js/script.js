const conn = new WebSocket('ws://localhost:8080');    
    
$("#formchat").submit((e) => {
    e.preventDefault();

    const message  = $("input[name='message']");
    const username = $("input[name='username']");
    const image    = $("input[name='image']");

    if (message.val() !== '') {
        const data = {
            "username": username.val(), 
            "message" : message.val(),
            "image"   : image.val()
        };
        conn.send(JSON.stringify(data));
        showMessage('user', JSON.stringify(data));
        message.val("");
    }
});

function showMessage(user, data) {
    data = JSON.parse(data);

    const username = data.username;
    const message  = data.message;
    const image    = data.image;
    
    if(image === ""){
        image = "assets/imgs/dog_image.png"
    }

    const content = $(".content");

    content.append('<div class="'+user+'"><img src="'+image+'"><div class="text"><h5>'+username+'</h5><p>'+message+'</p></div></div>');
    content.animate({scrollTop: content.prop("scrollHeight")}, 1);
    
}

conn.onmessage = function(e) {
    showMessage('other', e.data);
};