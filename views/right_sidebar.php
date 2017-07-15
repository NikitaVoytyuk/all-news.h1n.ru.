<? if (isset($goods)):?>
    <div class="wrapper_body">
        <div class="cbm_wrap ">
            <?php foreach($goods2 as $product): ?>
            <a href="#" class="old-price"><h1><?=$product['name']?></h1>
                <img src="<?=PATH?>uploads/<?=$product['image']?>">
                <p class="price">Цена: <?=$product['price']?></p>
                <div class="discond">
                        <span>-10%: WACMPsr0bE<br>Новая цена:
                            <?=$product['price_with_discond']?></span>
             </div>
            </a><hr>
       
        <?php endforeach; ?>
    </div>
    </div>
<?endif;?>