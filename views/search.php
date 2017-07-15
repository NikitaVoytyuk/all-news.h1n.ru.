<?php require_once 'header.php'?>

<div class="wrapper"> <!-- class="page-wrap" -->

    <div class="content"> <!-- class="content" -->

        <div class="sidebar">
            <?php require_once 'sidebar.php'; ?>
        </div>
        <br>
        <br>
        <br>
        <br>
        <?php if(isset($result_search) && is_array($result_search) ): ?>
            <?php foreach($result_search as $product): ?>
                <div class="product"> <!-- class="product" -->
                    <h4><a href="<?=PATH?>product/<?=$product['id']?>"><?=$product['title']?></a></h4>
                </div> <!-- class="product" -->
            <?php endforeach; ?>
            <?php if( $count_pages > 1 ): ?>
                <ul class="pagination">
                    <?=$pagination?>
                </ul>
            <?php endif;?>
                <?elseif (isset($result_search)&& is_array($result_search)):?>
                    <?php foreach($result_search as $category): ?>
                        <div class="product"> <!-- class="product" -->
                            <h4><a href="<?=PATH?>category/<?=$category['id']?>"><?=$category['title']?></a></h4>
                        </div> <!-- class="product" -->
                    <?php endforeach; ?>
        <?php else: ?>
            <p><b><?php if (isset($result_search)) echo $result_search;?></b></p>
        <?php endif; ?>


    </div> <!-- class="content" -->



</div> <!-- class="page-wrap" -->
<script>var path = "<?=PATH?>"</script>
<script src="<?=PATH?>views/js/jquery-1.9.0.min.js"></script>
<script src="<?=PATH?>views/js/jquery-ui-1.10.4.custom.min.js"></script>
<script src="<?=PATH?>views/js/jquery.cookie.js"></script>

<script>
    $(document).ready(function(){
        $("#perpage").change(function(){
            var perPage = this.value; // $(this).val()
            $.cookie('per_page', perPage, {expires:7, path:'/'});
            window.location = location.href;
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
