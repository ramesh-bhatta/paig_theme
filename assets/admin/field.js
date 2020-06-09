(function ($) {
    $(document).ready(() => {
        $("#add_services").click((e) => {
            e.preventDefault();
            let last_index = ("#services-block").lastIndexOf();
            console.log(last_index);
            add_new_item(last_index);

        });
    });


    function add_new_item() {
        let html = '<div class="service-item w-1/3"> ';
        html+='<div class="shadow p-2">';
        html += '<input type="text" name="service_title[]" value="" /> <br>';
        html += '<input type="file" name="service_image_icon[]" /><br>';
        html += '<textarea  name="service_content[]" value="" ></textarea><br>'
        html += '</div>';
        html += '</div>';

        $("#services-block").append(html);
    }
})(jQuery);