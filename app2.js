var app = require('express')();
var http = require('http').Server(app);
var io = require('socket.io')(http);

app.get('/', function(req, res){
  res.sendFile(__dirname + '/webmessenger.html');
});

io.on('connection', function(socket){
  console.log('a user connected');
});
io.on('connection', function(socket){
    socket.on('chat message', function(msg){
      console.log('message: ' + msg);
    });
  });

http.listen(443,'107.180.63.56', function(){
  console.log('listening on *:443');
});