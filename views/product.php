<?php defined("CATALOG") or die("Access denied"); ?>
<?require_once 'header.php'?>
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
			<br>
			<hr>
        <div class="center-content">
                <?php if( isset($_SESSION['auth']['user']) ): ?>
                        <?php if(isset($get_one_product)): ?>
                            <h1 class="product_title"><?=$get_one_product['title']?></h1>
                                    <div class="img-product">
                                        <img src="<?=PATH;?>uploads/<?=$get_one_product['image_url']?>" align="left" style="width: 200px" alt=""></div>
                                    <div class="product-txt">
                                        <?=$get_one_product['text'] ?>
                                        <br>
                                        <?php if(isset($get_tags)): ?>
                                        <?php foreach($get_tags as $get_tag): ?>
                                            <p>Теги:<a href="<?=$get_tag['id']?>"><?=str_replace(',',' ',$get_tag['keywords']);?></a></p>
                                      <?php endforeach; ?>
                                        <?endif;?>
                                    </div>
                                    <div class="clr"></div>
                                    <div class="product-inf">
                                        Дата публикации: <?=$get_one_product['date']?><br>
                                    </div>
                                    <div class="clr"></div>

                        <?php else: ?>
                            Такого товара нет
                        <?php endif; ?>
                <? else :?>
                        <h1 class="product_title"><?=$get_one_product['title']?></h1>
                        <div class="img-product"><img src="<?=PATH;?>uploads/<?=$get_one_product['image_url']?>" align="left" style="width: 200px" " alt="" /></div>
                        <div class="product-txt">
                            <?=$low_text ."..."; ?>
                        </div>
                <?endif;?>
    <hr>
    <h3 class="count">Отзывы к статье (<?=$count_comments?>)</h3>

    <ul class="comments">
        <?php echo $comments; ?>
    </ul>

    <button class="open-form">Добавить отзыв</button>

    <div id="form-wrap">
        <form action="<?=PATH?>add_comment" method="post" class="form">
        <?php if( isset($_SESSION['auth']['user']) ): ?>
            <p style="display:none;">
                <label for="comment-author">Имя:</label>
                <input type="text" name="comment-author" id="comment-author" value="<?=htmlspecialchars($_SESSION['auth']['user'])?>">
            </p>
        <?php else: ?>
            <p>
                <label for="comment-author">Имя:</label>
                <input type="text" name="comment-author" id="comment-author">
            </p>
        <?php endif; ?>

            <p>
                <label for="comment-text">Текст:</label>
                <textarea name="comment-text" id="comment-text" cols="30" rows="5"></textarea>
            </p>

            <input type="hidden" id="parent" name="parent" value="0">

            <!-- <p class="submit">
                <input type="submit" value="Добавить отзыв" name="submit">
            </p> -->
        </form>
    </div>
</div>
<div id="loader"><span></span></div>
<div id="errors"></div>
    </div>
    <br>
    <br>
    <br>
    <br>
    <script>var path = "<?=PATH?>"</script>
	<script src="<?=PATH?>views/js/jquery-ui-1.10.3.custom.min.js"></script>
	<script src="<?=PATH?>views/js/jquery.cookie.js"></script>
    <script src="<?=PATH?>views/js/jquery-ui-1.10.4.custom.min.js"></script>
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
$(document).ready(function(){
    $('#navbar ul li').hover(
        function () {
            $('ul:first', this).slideDown(150);
        },
        function () {
            $('ul:first', this).slideUp(150);
        },
    );

$('#errors').dialog({
	autoOpen: false,
	width: 450,
	modal: true,
	title: 'Сообщение об ошибке',
	show: {effect: 'slide', duration: 700},
	hide: {effect: 'explode', duration: 700},
});

$('#form-wrap').dialog({
	autoOpen: false,
	width: 450,
	modal: true,
	title: 'Добавление сообщения',
	resizable: false,
	draggable: false,
	show: {effect: 'slide', duration: 700},
	hide: {effect: 'explode', duration: 700},
	buttons: {
		"Добавить отзыв": function(){
			var commentAuthor = $.trim($('#comment-author').val());
			var commentText = $.trim($('#comment-text').val());
			var parent = $('#parent').val();
			var productId = <?=$id?>;
			if(commentText == '' || commentAuthor == ''){
				alert('Все поля обязательны к заполнению');
				return;
			}
			$('#comment-text').val('');
			$(this).dialog('close');
			$.ajax({
				url: '<?=PATH?>add_comment',
				type: 'POST',
				data: {commentAuthor: commentAuthor, commentText: commentText, parent: parent, productId: productId},
				beforeSend: function(){
					$('#loader').fadeIn();
				},
				success: function(res){
					var result = JSON.parse(res);
					if(result.answer == 'Комментарий добавлен!'){
						// если комментарий добавлен
						var showComent = '<li class="new-comment" id="comment-' + result.id + '">' + result.code + '</li>';
						if(parent == 0){
							// если это не ответ
							$('ul.comments').append(showComent);
						}else{
							// если ответ
							// находим родителя li
							var parentComment = $this.closest('li');
							// смотрим, есть ли ответы
							var childs = parentComment.children('ul');
							if(childs.length){
								// если ответы есть
								childs.append(showComent);
							}else{
								// если ответов пока нет
								parentComment.append('<ul>' + showComent + '</ul>');
							}
						}
						$('#comment-' + result.id).delay(1000).show('shake', 1000);
					}else{
						// если комментарий не добавлен
						$('#errors').text(result.answer);
						$('#errors').delay(1000).queue(function(){
							$(this).dialog('open');
							$(this).dequeue();
						});
						/*$('#errors').delay(1000).queue(function(next){
							$(this).dialog('open');
							next();
						});*/
					}
				},
				error: function(){
					alert("Ошибка!");
				},
				complete: function(){
					$('#loader').delay(1000).fadeOut();
				}
			});
		},
		"Отмена": function(){
			$(this).dialog('close');
			$('#comment-text').val('');
		}
	}
});
$('.open-form').click(function(){
	$('#form-wrap').dialog('open');
	var parent = $(this).children().attr('data');
	$this = $(this);
	if(!parseInt(parent)) parent = 0;
	$('input[name="parent"]').val(parent);
});
});
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
</body>
</html>