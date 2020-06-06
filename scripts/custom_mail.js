(function($){
    $(document).ready(()=>{
        $("#contact").submit((e)=>{
            e.preventDefault();
            let name=$("#name").val();
            let email=$("#email").val();
            let subject=$("#subject").val();
            let comments=$("#comments").val();
            let phone = $("#phone").val();

            console.log("phhone "+phone);

            $.post({
                url:myAjax.ajaxurl,
                data : {
                    type:"post",
                    dataType:"json",
                    action: "custom_form_submit", 
                    nonce: myAjax.nonce,
                    name:name,
                    email:email,
                    phone:phone,
                    subject:subject,
                    comments:comments,
                    
                },
            }).then((res)=>{
                let send_status = "";
                if(res.data.msg != "" ){
                    send_status = "<div class='notification closeable success'>"+res.data.msg+"</div>";
                }else{
                    send_status = "<div class='notification closeable error'>"+res.data.error+"</div>";
                }
                $("#contact-message").css('display','block').html(send_status).delay(6000).fadeOut(300);

            });
    
            return false;
            
        });
    });
})(jQuery);