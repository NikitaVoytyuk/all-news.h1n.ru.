$(function(){
    $( 'textarea.editor' ).ckeditor();

    $('.cross-times').on('click', function(){
        $('#mes-edit').hide();
        $('#mes-edit .responce').empty();
    });

    $('.edit').each(function(){
        $(this).change(function(){
            var val = $(this).val();
            var title = $(this).attr('name');
            var url = $(this).parents('.zebra').data('table');
            console.log(val);
            console.log(title);
            updateField(val, title, url);
        });
    });

    $('.edit-keywords').change(function () {
        var id = $(this).data('id'),
            keywords = $(this).val(),
            url = $(this).parents('.zebra').data('table');
        updateField(id, keywords, url);
    });

    $('.del').on('click', function () {
        var id = $(this).data('id'),
            parent = $(this).closest('tr'),
            url = $(this).parents('.zebra').data('table');
        deleteRow(id,parent, url);
    });

    function deleteRow(id, parent, url){
        var res = confirm('Подтвердите удаление');
        if(!res) return false;

        $.ajax({
            url: path + url,
            type: 'GET',
            data: {id: id},
            beforeSend : function(){
                $('#loader').fadeIn();
            },
            success: function(res){
                var answer;
                if(res == 'OK'){
                    answer = 'Удалено';
                }else{
                    answer = 'Ошибка удаления';
                }
                $('#mes-edit .responce').text(answer);
                $('#mes-edit').delay(500).fadeIn(1000, function(){
                    if(res == 'OK') parent.hide();
                });
            },
            error: function(){
                alert('Ошибка!');
            },
            complete: function(){
                $('#loader').delay(500).fadeOut();
            }
        });
    }

    function updateField(val, title, url){
        if( !url ) url = '';
        $.ajax({
            url: path + url,
            type: 'GET',
            data: {val: val, title: title},
            beforeSend : function(){
                $('#loader').fadeIn();
            },
            success: function(res){
                $('#mes-edit .responce').text(res);
                $('#mes-edit').delay(500).fadeIn(1000);
            },
            error: function(){
                alert('Ошибка!');
            },
            complete: function(){
                $('#loader').delay(500).fadeOut();
            }
        });
    }
});