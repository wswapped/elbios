$("#reply-message").on('click', function(){
    msg = $("#reply-message-box").val()
    thread = $(this).data('thread')
    if(msg.toString().length>0){
        $.post('/api/index.php', {action:'cooperative_send_message', thread:thread, message:msg, writtenBy:'cooperative', doneBy:current_user}, function(data){
            if(data.status){
                location.reload();
            }else{
                alert("Problem trying to reply")
            }
        })
    }
})
function log(data){
    console.log(data)
}