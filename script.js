$(document).ready(function(){

    // like and unlike click
    // $(".like, .unlike").click(function(){
    $(".like, .unlike").on('click', function(){
        var id = this.id;   // Getting Button id
        var split_id = id.split("_");
console.log(id);
        var text = split_id[0];
        var ideas_number = split_id[1];  // postid

        // Finding click type
        var type = 0;
        if(text == "like"){
            type = 1;
        }else{
            type = 0;
        }

        // AJAX Request
        $.ajax({
            url: 'likeunlike.php',
            type: 'post',
            data: {ideas_number:ideas_number,type:type},
            dataType: 'json',
            success: function(data){
                var likes = data['likes'];
                var unlikes = data['unlikes'];

                $("#likes_"+ideas_number).text(likes);        // setting likes
                $("#unlikes_"+ideas_number).text(unlikes);    // setting unlikes

                if(type == 1){
                    $("#like_"+ideas_number).css("color","#ffa449");
                    $("#unlike_"+ideas_number).css("color","lightseagreen");
                }

                if(type == 0){
                    $("#unlike_"+ideas_number).css("color","#ffa449");
                    $("#like_"+ideas_number).css("color","lightseagreen");
                }

            }
        });

    });

});