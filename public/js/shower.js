// var socket = io('192.168.56.101:3000');
var socket = io('37.139.3.121:3000');

var length = true
if(devices.length = 0){
    var length = false
}

new Vue({
    el: '.shower',

    data:{
        devices:devices,
        length:length,
    },

    ready:function(){
        socket.on('shower-channel:App\\Events\\ShowerStateEvent', function(data){
            var baseUrl = document.location.origin;
            $.get(baseUrl + "/api/state/"+data.koten_id , function(data){
                this.devices = data;
            }.bind(this));
        }.bind(this));
    }
})