var socket = io('192.168.56.101:3000');

console.log(koten_id);
console.log(device);
new Vue({
    el: '.shower',

    data:{
        device:device,
    },

    ready:function(){
        socket.on('shower-channel:App\\Events\\ShowerStateEvent', function(data){
            console.log(koten_id);
            console.log(data);
            if(koten_id == data.koten_id)
            {
                var baseUrl = document.location.origin;
                $.get(baseUrl + "/api/calstate/"+device_id , function(data){
                    this.device = data;
                    console.log(this.device);
                }.bind(this));
            }
        }.bind(this));
    }
})