<aside id="bottom">
    <?php var_dump(of_get_option('user_name'));?>

    <div class="semicircle">
        <div class="container">
            <div class="row">
                <?php if(is_active_sidebar('sidebar_bottom')) : ?>
                <?php dynamic_sidebar('sidebar_bottom') ?>
                <?php endif ?>
            </div>
        </div>
    </div>
</aside>