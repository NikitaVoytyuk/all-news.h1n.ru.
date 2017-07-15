$(function() {
    $( window ).keydown(function( event ){
        //F5 or Ctrl+R
        if ( event.keyCode == 116 || ( event.ctrlKey && event.keyCode == 82 ) )
            refresh = true;
    });

    $(document).ready(function() {
        $('.button').click(function() {
            type = $(this).attr('data-type');
            $('.overlay-container').fadeIn(function() {
                window.setTimeout(function(){
                    $('.window-container.'+type).addClass('window-container-visible');
                }, 100);
            });
        });
        $('.close').click(function() {
            $('.overlay-container').fadeOut().end().find('.window-container').removeClass('window-container-visible');
        });
    });


    $("#perpage").change(function () {
        var perPage = this.value; // $(this).val()
        $.cookie('per_page', perPage, {expires: 7, path: '/'});
        window.location = location.href;
    });
    $('#navbar ul li').hover(
        function () {
            $('ul:first', this).slideDown(150);
        },
        function () {
            $('ul:first', this).slideUp(150);
        }
    );

    /*$(function () {
        $.widget("custom.catcomplete", $.ui.autocomplete, {
            _create: function () {
                this._super();
                this.widget().menu("option", "items", "> :not(.ui-autocomplete-category)");
            },
            _renderMenu: function (ul, items) {
                var that = this,
                    currentCategory = "";
                $.each(items, function (index, item) {
                    var li;
                    if (item.category != currentCategory) {
                        ul.append("<li class='ui-autocomplete-category'>" + item.category + "</li>");
                        currentCategory = item.category;
                    }
                    li = that._renderItemData(ul, item);
                    if (item.category) {
                        li.attr("aria-label", item.category + " : " + item.label);
                    }
                });
            }
        });*/

        $('#autocomplete').autocomplete({
            source: path + 'search/',
            minLength: 1,
            select: function (event, ui) {
                window.location = path + 'search/?search=' + encodeURIComponent(ui.item.value);
            }
        });


        $('#autocomplete').autocomplete({
            source: 'http://world-news.loc/search/',
            minLength: 1,
            select: function (event, ui) {
                console.log(ui.item.value);
            }
        });

        $('#forgot-link').click(function () {
            $('#auth').fadeOut(300, function () {
                $('#forgot').fadeIn();
            });
            return false;
        });

        $('#auth-link').click(function () {
            $('#forgot').fadeOut(300, function () {
                $('#auth').fadeIn();
            });
            return false;
        });
    });