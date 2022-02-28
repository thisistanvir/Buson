<?php
$image = get_field('image', 'option');
$title = get_field('title', 'option');
$description = get_field('description', 'option');
$button_text = get_field('button_text', 'option');
$button_url = get_field('button_url', 'option');
?>

<!-- We Trusted Start-->
<div class="we-trusted-area trusted-padding">
    <div class="container">
        <div class="row d-flex align-items-end">
            <div class="col-xl-7 col-lg-7">
                <div class="trusted-img">
                    <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['title']; ?>">
                </div>
            </div>
            <div class="col-xl-5 col-lg-5">
                <div class="trusted-caption">
                    <h2><?php echo $title; ?></h2>
                    <p><?php echo $description; ?></p>
                    <a href="<?php echo $button_url; ?>" class="btn trusted-btn"><?php echo $button_text; ?></a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- We Trusted End-->