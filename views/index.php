<?require_once 'header.php'?>
<br>
<br>
<div class="jumbotron">
    <div class="container">
        <div id="slider-wrap">
            <div id="slider">
                <?php if(isset($get_last_news)): ?>
                    <?php foreach($get_last_news as $get_last): ?>
                        <div class="slide">
                            <div><p><?=$get_last['title']?></p></div>
                            <a href="<?=PATH?>product/<?=$get_last['id']?>"><br>
                            <img src="uploads/<?=$get_last['image_url']?>">
                            </a>
                        </div>

                    <?php endforeach; ?>
                <?endif;?>
            </div>
        </div>
        <script>
            /*
             Настройки скрипта:
             hwSlideSpeed - Скорость анимации перехода слайда.
             hwTimeOut - время до автоматического перелистывания слайдов.
             hwNeedLinks - включает или отключает показ ссылок "следующий - предыдущий". Значения true или false
             */
            (function ($) {
                var hwSlideSpeed = 700;
                var hwTimeOut = 3000;
                var hwNeedLinks = true;

                $(document).ready(function(e) {
                    $('.slide').css(
                        {"position" : "absolute",
                            "top":'0', "left": '0'}).hide().eq(0).show();
                    var slideNum = 0;
                    var slideTime;
                    slideCount = $("#slider .slide").size();
                    var animSlide = function(arrow){
                        clearTimeout(slideTime);
                        $('.slide').eq(slideNum).fadeOut(hwSlideSpeed);
                        if(arrow == "next"){
                            if(slideNum == (slideCount-1)){slideNum=0;}
                            else{slideNum++}
                        }
                        else if(arrow == "prew")
                        {
                            if(slideNum == 0){slideNum=slideCount-1;}
                            else{slideNum-=1}
                        }
                        else{
                            slideNum = arrow;
                        }
                        $('.slide').eq(slideNum).fadeIn(hwSlideSpeed, rotator);
                        $(".control-slide.active").removeClass("active");
                        $('.control-slide').eq(slideNum).addClass('active');
                    }
                    if(hwNeedLinks){
                        var $linkArrow = $('<a id="prewbutton" href="#">&lt;</a><a id="nextbutton" href="#">&gt;</a>')
                            .prependTo('#slider');
                        $('#nextbutton').click(function(){
                            animSlide("next");
                            return false;
                        })
                        $('#prewbutton').click(function(){
                            animSlide("prew");
                            return false;
                        })
                    }
                    var $adderSpan = '';
                    $('.slide').each(function(index) {
                        $adderSpan += '<span class = "control-slide">' + index + '</span>';
                    });
                    $('<div class ="sli-links">' + $adderSpan +'</div>').appendTo('#slider-wrap');
                    $(".control-slide:first").addClass("active");
                    $('.control-slide').click(function(){
                        var goToNum = parseFloat($(this).text());
                        animSlide(goToNum);
                    });
                    var pause = false;
                    var rotator = function(){
                        if(!pause){slideTime = setTimeout(function(){animSlide('next')}, hwTimeOut);}
                    }
                    $('#slider-wrap').hover(
                        function(){clearTimeout(slideTime); pause = true;},
                        function(){pause = false; rotator();
                        });
                    rotator();
                });
            })(jQuery);

        </script>
    </div>
</div>

<div class="wrapper">
    <div class="sidebar">
        <?php require_once 'sidebar.php'; ?>
    </div>
    <div class="right-sidebar">
        <?php require_once 'right_sidebar.php'; ?>
    </div>
    <div class="content">
        <div id="modal-layer">
            <div id="modal">
                <form method="post" class="response">
                    <h4><b>Подписаться на новости:</b></h4>
                    <div>
                        <input type="text" name="login" id="login" placeholder="Логин"><br>
                        <input type="text" name="email" id="email" placeholder="Email"><br>
                        <button type="submit">Подписаться</button>
                        <span class="cross-times">&times;</span>
                    </div>
                </form>
            </div>
        </div>

        <div class="row">
            <div class="col-md-5">
                <h2><a href="<?=PATH?>category/1">Политические новости Украины</a></h2>
                <?php if($get_last_news_par1): ?>
                    <?php foreach($get_last_news_par1 as $get_last_par1): ?>
                        <a href="<?=PATH?>product/<?=$get_last_par1['id']?>"><?=$get_last_par1['title']?></a><br>
                    <?php endforeach; ?>
                <?endif;?>
            </div>

            <div class="col-md-5">
                <h2><a href="<?=PATH?>category/2">Экономические новости Украины</a></h2>
                <?php if($get_last_news_par2): ?>
                    <?php foreach($get_last_news_par2 as $get_last_par2): ?>
                        <a href="<?=PATH?>product/<?=$get_last_par2['id']?>"><?=$get_last_par2['title']?></a><br>
                    <?php endforeach; ?>
                <?endif;?>
            </div>

            <div class="col-md-5">
                <h2><a href="<?=PATH?>category/5">Новости Германии</a></h2>
                <?php if($get_last_news_par5): ?>
                    <?php foreach($get_last_news_par5 as $get_last_par5): ?>
                        <a href="<?=PATH?>product/<?=$get_last_par5['id']?>"><?=$get_last_par5['title']?></a><br>
                    <?php endforeach; ?>
                <?endif;?>
            </div>

            <div class="col-md-5">
                <h2><a href="<?=PATH?>category/6">Новости Германии</a></h2>
                <?php if($get_last_news_par6): ?>
                    <?php foreach($get_last_news_par6 as $get_last_par6): ?>
                        <a href="<?=PATH?>product/<?=$get_last_par6['id']?>"><?=$get_last_par6['title']?></a><br>
                    <?php endforeach; ?>
                <?endif;?>
            </div>

            <div class="col-md-5">
                <h2><a href="<?=PATH?>category/">Новости </a></h2>
                <?php if($get_last_news_par7): ?>
                    <?php foreach($get_last_news_par7 as $get_last_par7): ?>
                        <a href="<?=PATH?>product/<?=$get_last_par7['id']?>"><?=$get_last_par7['title']?></a><br>
                    <?php endforeach; ?>
                <?endif;?>
            </div>
            <div class="col-md-5">
                <h2>Топ 5 комментаторов</h2>
                <?php if($get_commentators): ?>
                    <?php foreach($get_commentators as $get_commentator): ?>
                        <a href="#"><?=$get_commentator['comment_author']?></a><br>
                        <?php endforeach; ?>
                <?endif;?>
            </div>
        </div>
    </div>
</div>
<script>var path = "<?=PATH?>"</script>
<script src="<?=PATH?>views/js/jquery-1.9.0.min.js"></script>
<script src="<?=PATH?>views/js/jquery-ui-1.10.4.custom.min.js"></script>
<script src="<?=PATH?>views/js/jquery.cookie.js"></script>
<script>

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
    });
</script>

    <script>
        function showModal() {
            $('#modal-layer').fadeIn('slow').on('click', function() {
                setTimeout(showModal, 15000);
            });
            $('.cross-times').on('click', function(){
                $('#modal-layer').hide();
            });
        }
        setTimeout(showModal, 15000);
    </script>
<script>
    var refresh = false;
    $( window ).on("beforeunload", function( event ) {
        var msg = "Все несохраненные данные будут утеряна!";
        if ( $( event.target.activeElement ).is("a") || refresh === true ) {
            return;
        }
        return msg;
    });
</script>
<script src="<?=PATH?>views/js/workscrips.js"></script>
</body>
</html>