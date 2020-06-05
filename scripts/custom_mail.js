(function($){
    $(document).ready(()=>{
        let name=$("#name").val();
        let email=$("#email").val();
        let subject=$("#subject").val();
        let message=$("#comments").val();
        $("#contact").submit((e)=>{
            e.preventDefault();
            $.post({
                url:myAjax.ajaxurl,
                data : {
                    type:"post",
                    dataType:"json",
                    action: "custom_form_submit", 
                    nonce: myAjax.nonce,
                    name:name,
                    email:email,
                    subject:subject,
                    message:message,
                    
                },
            }).then((res)=>{
    
            });
    
            return false;
            
        });
    });
})(jQuery);