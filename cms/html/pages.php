<?php $site_page = getPage($pages,$id) ?>

<h1 class="page-header"><?php echo $site_page->name ?></h1>

<?php if($site_page->description) :?>
    <div class="panel panel-info">
        <?php echo $site_page->description ?>
    </div>
<?php endif;?>