<?php defined("CATALOG") or die("Access denied"); ?>

<div class="form auth">
	<!-- авторизация -->
	<div id="auth">
		<?php if(!isset($_SESSION['auth']['user'])): ?>
		<form action="<?=PATH?>login" method="post">
			<p>
                <label for="login">Логин:</label>
                <input type="text" name="login" id="login">
            </p>
			<p>
				<label for="password">Пароль:</label>
				<input type="password" name="password" id="password">
			</p>
			<p class="submit">
				<input type="submit" value="Войти" name="log_in">
			</p>
		</form>
		<p><a href="<?=PATH?>reg">Регистрация</a> | <a id="forgot-link" href="#">Забыли пароль?</a></p>

		<?php if(isset($_SESSION['auth']['errors'])): ?>
			<div class="error"><?=$_SESSION['auth']['errors']?></div>
			<?php unset($_SESSION['auth']); ?>
		<?php endif; ?>

		<?php if(isset($_SESSION['auth']['ok'])): ?>
			<div class="ok"><?=$_SESSION['auth']['ok']?></div>
			<?php unset($_SESSION['auth']); ?>
		<?php endif; ?>

		<?php else: ?>
			<p>Добро пожаловать, <b><?=htmlspecialchars($_SESSION['auth']['user'])?></b></p>
			<p><a href="<?=PATH?>logout">Выход</a></p>
		<?php endif; ?>
	</div>
    <? if (isset($goods)):?>
    <div class="wrapper_body">
        <div class="cbm_wrap ">
            <?php foreach($goods as $product): ?>
                <a href="#" class="old-price"><h1><?=$product['name']?></h1>
                    <img src="<?=PATH?>uploads/<?=$product['image']?>">
                    <p class="price">Цена: <?=$product['price']?></p>
                    <div class="discond">
                        <span>Купо на скидку-10%: WACMPsr0bE<br>Новая цена:
                            <?=$product['price_with_discond']?></span>
                    </div>
                </a><hr>
                
            <?php endforeach; ?>
        </div>
    </div>
    <?endif;?>


    <!-- восстановление пароля -->
	<div id="forgot">
		<form action="<?=PATH?>forgot" method="post">
			<p>
				<label for="email">Email регистрации:</label>
				<input type="text" name="email" id="email">
			</p>
			<p class="submit">
				<input type="submit" value="Выслать пароль" name="fpass">
			</p>
		</form>
		<p><a id="auth-link" href="#">Вход на сайт</a></p>
	</div>
</div>
