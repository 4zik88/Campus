var page = 2;
jQuery(function ($) {
    function appendPost(data, callback) {
        $.post(blog.ajaxurl, data, function (response) {
            if ($.trim(response) == '') {
                $('.blog-btn-more').hide();
            }
            $('.blog-cards').append(response);
            page++;
            data.page = page;
            $.post(blog.ajaxurl, data, function (response) {
                if ($.trim(response) == '') {
                    $('.blog-btn-more').hide();
                }
            });
        });
    }

    $('body').on('click', '.blog-btn-more', function () {
        tags=[];
        $('.tags_filter').each(function(){
            if($(this).hasClass('active')){
                tags.push($(this).attr('data-id'));
            }
        });
        var data = {
            action: 'load_posts_by_ajax',
            page: page,
            security: blog.security,
            tags:tags
        };
        appendPost(data);
    });

    $('body').find('#load_tags').on('click',function(e){
        e.preventDefault();
        var data = {
            'action': 'loadmoretags',

        };
        $.ajax({
            url:blog.ajaxurl,
            data:data,
            type:'POST',
            success:function(data){
                page++;
                $('.blog-panel').append(data);
                $('#load_tags').remove();
            }
        });
    });
});