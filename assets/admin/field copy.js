(function ($) {
    var wkMedia,btnContext;
    $(document).ready(() => {
        $( "#services-block" ).sortable({
            revert: true
        });
        //add new service block
        $("#add_services").click((e) => {
            e.preventDefault();
            let last_index = ("#services-block").lastIndexOf();
            console.log(last_index);
            add_new_item(last_index);

        });
        // btnContext=;
        $(document).on("click",'.wk-button',function(e) {
            e.preventDefault();
            // console.log("ok");
            btnContext=$(this);
            if(wkMedia){
                wkMedia.open();
                return;
            }
            wkMedia=view_media_files();
            wkMedia.on("select",select_media_file);
            wkMedia.open();
        });

        $(document).on("click",'.remove-service',function(e) {
            e.preventDefault();
            let parent=$(this).closest(".service-item");
            $(parent).remove();
        });







    });

    function add_new_item(prefixClass) {
        let html = '<div class="service-item w-1/3"> ';
            html+='<div class="mx-2">';
                html+=' <div class="bg-gray-100 shadow-md p-2">';
                    html+='<div class="shadow p-2">';
                        html+='<div class="mb-2 text-right">';
                            html += '<span class="dashicons dashicons-dismiss remove-service text-red-500"></span>';
                        html += '</div>';
                        html+='<div class="mb-2">';
                            html += '<input class="w-full" type="text" name="service_title[]" value="" />';
                        html += '</div>';
                        html+='<div class="mb-2">';
                            html += '<input type="hidden" class="paig-img-url" name="service_image_icon[]" />';
                            html +='<img class="service_img hidden" src="" width="100%" height="200px" style="object-fit:cover;" />';
                            html += '<button class="wk-button w-full py-2">Upload Image</button>';
                        html+="</div>";
                        html+='<div class="mb-2">';
                            html += '<textarea class="w-full" name="service_content[]" value="" ></textarea>';
                        html+="</div>";
                    html += '</div>';
                html += '</div>';
            html += '</div>';
        html += '</div>';

        $("#services-block").append(html);
    }

    function view_media_files(){
        return wp.media.frames.file_frame = wp.media({
            title: 'Select media',
            button: {
            text: 'Select media'
          }, multiple: false });
    }

    function select_media_file(){
        var attachment = wkMedia.state().get('selection').first().toJSON();
        // console.log(btnContext);
        let btnParent=btnContext.parent();
        //Add Hidden URL to save
        $(btnParent).find(".paig-img-url").val(attachment.url);
        //display image in the service div
        let service_img=$(btnParent).find(".service_img");
        service_img.attr("src",attachment.url);
        //remove hidden for add service
        service_img.removeClass("hidden");
        //Add Edit text
        $(btnContext).html("Edit Image");
    }

})(jQuery);