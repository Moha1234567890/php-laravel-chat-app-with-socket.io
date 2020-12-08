var app = require('express')();
var http = require('http').Server(app);
var io = require('socket.io')(http);

http.listen(8005, function() {
    console.log('listing to port 8000 now');
});


io.on('connection', function (socket) {

    socket.on("user_connected", function (user_id) {
        //users[user_id] = socket.id;
        //io.emit('updateUserStatus', users);
        console.log("user connected " + user_id);
    });
});