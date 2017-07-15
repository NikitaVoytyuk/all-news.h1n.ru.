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
            <br>
            <br>
        
            <hr>
			<?php if($products): ?>
				<?php foreach($products as $product): ?>
					<a href="<?=PATH?>product/<?=$product['id']?>"><?=$product['title']?></a><br>
				<?php endforeach; ?>

				<?php if( $count_pages > 1 ): ?>
					<div class="pagination"><?=$pagination?></div>
				<?php endif; ?>
				
			<?php else: ?>
				<p>Здесь товаров нет!</p>
			<?php endif; ?>
		</div>
	</div>
    <script>var path = "<?=PATH?>"</script>
	<script src="<?=PATH?>views/js/jquery-1.9.0.min.js"></script>
    <script src="<?=PATH?>views/js/jquery-ui-1.10.4.custom.min.js"></script>
	<script src="<?=PATH?>views/js/jquery.cookie.js"></script>
	
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