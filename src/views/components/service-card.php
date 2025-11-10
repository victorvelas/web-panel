<div 
    id="service-card-<?= $this->viewData['service']->id; ?>" 
    class="service-card-wpi" 
    <?php if (file_exists('public/images/services/serv-'.$this->viewData['service']->id.'.jpg')) { ?>
        style="--img-src: url('./images/services/serv-<?= $this->viewData['service']->id; ?>.jpg');"
        bg-actived
    <?php } ?>
>
<!-- -->
    <div style="
        --alpha-color-card: <?= $this->viewData['service']->cssColors->rgba; ?>
    ">
        <div class="display-flex full-height-wpi-100">
            <div class="content-service-card-wpi display-flex">
                <div class="padding-left-30-wpi margin-auto full-width-wpi">
                    <h1 class="padding-bottom-10-wpi"><?= $this->viewData['service']->name; ?></h1>
                    <span><?= $this->viewData['service']->sumary; ?></span>
                </div>
            </div>
            <div class="button-service-card-wpi">
                <button type="button" onclick="WPM.setFormConfig('<?= base64_encode(json_encode($this->viewData['service'])); ?>');">
                    Ingresar ->
                </button>
            </div>
        </div>
    </div>
</div>