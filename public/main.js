$(function (){
    $('#main_form').on('submit',function(sub){
        sub.preventDefault();

        $.ajax({
            url:$(this).attr('action'),
            method:$(this).attr('method'),
            data: new FormData(this),
            processData:false,
            dataType:'json',
            contentType:false,
            beforeSend:function(){
                $(document).find('span.error-text').text();
            },
            success:function(data){
             if (data.status == 0){
                 $.each(data.error,function (text,value){
                    $('span.'+text+'_error').text(value[0]);
                 });
             }else{
                $('#main_form')[0].reset();
                alert(data.msg);
             }
            }
        });
    });
});
