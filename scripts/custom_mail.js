(function($){
    $(document).ready(()=>{
        $("#contact").submit((e)=>{
            e.preventDefault();
            let name=$("#name").val();
            let email=$("#email").val();
            let subject=$("#subject").val();
            let comments=$("#comments").val();
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
                    comments:comments,
                    
                },
            }).then((res)=>{
    
            });
    
            return false;
            
        });
    });
})(jQuery);