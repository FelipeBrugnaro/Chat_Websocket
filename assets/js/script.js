const conn = new WebSocket('ws://localhost:8080');    
    
$("#formchat").submit((e) => {
    e.preventDefault();

    const message  = $("input[name='message']");
    const username = $("input[name='username']");

    if (message.val() !== '') {
        const data = {
            "username": username.val(), 
            "message" : message.val()
        };
        conn.send(JSON.stringify(data));
        showMessage('user', JSON.stringify(data));
        message.val("");
    }
});

function showMessage(user, data) {
    data = JSON.parse(data);
    if (user == 'user') {
        var img_src = "assets/imgs/dog_image.png";
    } else if (user == 'other') {
        var img_src = "assets/imgs/cat_image.png";
    }

    const username = data.username;
    const message  = data.message;

    const content = $(".content");

    content.append('<div class="'+user+'"><img src="'+img_src+'"><div class="text"><h5>'+username+'</h5><p>'+message+'</p></div></div>');
    content.animate({scrollTop: content.prop("scrollHeight")}, 1);
    
}

conn.onmessage = function(e) {
    showMessage('other', e.data);
};