jQuery(document).ready(function($){

    var addButton     = document.getElementsByClassName( 'image-upload-button' ),
        deleteButton  = document.getElementsByClassName( 'image-delete-button' ),
        hidden        = document.getElementsByClassName( 'img-hidden-field' ),
        uploadField   = document.getElementsByClassName( 'upload_field' ),
        customUploads = '';


    // Поворот стрелочки и открытие поля upload_field
    $(document).on('click', '.img_more', function(e){
        e.stopPropagation()
        $(this).toggleClass('spin');
        $(this).parents('.con_teiner').find('.upload_field').slideToggle();
        $(this).parents('.con_teiner').find('.glob_photo').toggleClass('glob_photo_exp');
    });


    // Открытие поля upload_field при нажатии поля glob_photo
    $(document).on('click', '.glob_photo', function(){
        $(this).parents('.con_teiner').find('.upload_field').slideToggle();
        $(this).parents('.con_teiner').find('.glob_photo').toggleClass('glob_photo_exp');
    });


    // Отмена прокрута страницы при нажатии на стрелочку и крестик
    $(document).on('click', 'a.hold_on', function(e){
        e.preventDefault();
    });


    // Удаление нового блока
    $(document).on('click', '.img_close', function(){
        $(this).parents('.con_teiner').remove();
    });


    // Добавление нового поля con_teiner
    var number = 1;
    $('.add_photo_button').click(function(){
        number++
        var add_div;
        add_div = '<div class="con_teiner">';
            add_div += '<div class="photo_'+number+' glob_photo">';
                    add_div += '<span class="photo_number">Photo</span>';
                    add_div += '<span class="photo_header">';
                        add_div += '<a href="#" class="img_more hold_on">&#9660;</a>';
                        add_div += '<a href="#" class="img_close hold_on">&#215;</a>';
                    add_div += '</span>';
            add_div += '</div>';
            add_div += '<div class="upload_field">';
                add_div += '<img class="image-tag" style="width:100%;">';
                add_div += '<input type="hidden" class="img-hidden-field" name="custom_image_data[]">';
                add_div += '<input type="button" class="button image-upload-button wp_media" value="Add Image">';
                add_div += '<input type="button" class="button image-delete-button" value="Remove Image">';
            add_div += '</div>';
            add_div += '<br />';
        add_div += '</div>';
        $('.global_div').append(add_div);
        return false;
    });


    // Добаление объекта wp.media
    var customUploader = wp.media({
        title: 'Select an Image',
        button: {
            text: 'Use this Image'
        },
        multiple: false
    });


    // Добавление поля загрузки изображения при нажатии на кнопку image-upload-button
    $(document).on('click', '.image-upload-button', function(){
        if ( customUploader ) {
            customUploader.open();
        }
    });


    // Функция видимости поля загрузки изображения
    var toggleVisibility = function( action ) {
        if ( 'ADD' === action ) {
            $(this).parents('.upload_field').find('.image-upload-button').css('display', 'none');
            $(this).parents('.upload_field').find('.image-delete-button').css('display', 'inline');
            $(this).parents('.upload_field').find('.image-tag').css( 'style', 'width: 100%;' );
        }
        if ( 'DELETE' === action ) {
            $(this).parents('.upload_field').find('.image-upload-button').css('display', 'inline');
            $(this).parents('.upload_field').find('.image-delete-button').css('display', 'none');
            $(this).parents('.upload_field').find('.image-tag').css( 'style', 'width: 0;' );
        }
    };


    // Функция загрузки изображения
    $(document).on('click', '.image-upload-button', function(){
        var this_img = $(this).parent().find('img'),
            this_hidden = $(this).parent().find('.img-hidden-field');
        customUploader.on( 'select', function(){
            var attachment = customUploader.state().get('selection').first().toJSON();
            $(this_img).attr( 'src', attachment.url );
            $(this_hidden).attr('value',  attachment.url );
            $(this).parents('.upload_field').find('.image-tag').css( 'style', 'width: 100%;' );
            toggleVisibility( 'ADD' );
            this_hidden = '';
            this_img = '';
        });
    })


    // Функция удаления изображения
    $(document).on('click','.image-delete-button', function(){
        $(this).parents('.upload_field').find('.image-tag').removeAttr( 'src' );
        $(this).parents('.upload_field').find('.img-hidden-field').removeAttr( 'value' );
        toggleVisibility( 'DELETE' );
    })





});
