<?php $this->extends('layout'); ?>

<?php $this->setYield('title', 'web panel'); ?>

<?php $this->section('sources'); ?>
    <link rel="stylesheet" href="public/main.css" />
    <script src="public/web-panel.mod.js"></script>
<?php $this->endSection(); ?>

<?php $this->section('html'); ?>
    <div class="no-display-on-movil display-flex content-wpi standar-height-wpi">
        <div class="item-wpi full-height-wpi lateral-menu-wpi">
            <div>
                <?php foreach ($this->viewData['services'] as $service) { ?>
                    <div 
                        id="service-card-<?= $service->id; ?>" 
                        class="service-card-wpi" 
                        <?php if (file_exists('public/images/services/serv-'.$service->id.'.jpg')) { ?>
                            style="--img-src: url('./images/services/serv-<?= $service->id; ?>.jpg');"
                            bg-actived
                        <?php } ?>
                    >
                    <!-- -->
                        <div style="
                            --alpha-color-card: <?= $service->cssColors->rgba; ?>
                        ">
                            <div class="display-flex full-height-wpi-100">
                                <div class="content-service-card-wpi display-flex">
                                    <div class="padding-left-30-wpi margin-auto full-width-wpi">
                                        <h1 class="padding-bottom-10-wpi"><?= $service->name; ?></h1>
                                        <span><?= $service->sumary; ?></span>
                                    </div>
                                </div>
                                <div class="button-service-card-wpi">
                                    <button type="button" onclick="WPM.setFormConfig('<?= base64_encode(json_encode($service)); ?>');">
                                        Ingresar ->
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
        <div class="item-wpi full-height-wpi">
            <div class="full-height-wpi display-flex">
                <div class="margin-auto form-box-wpi">
                    <form method="post" class="form-content-wpi">
                        <div class="wpi-form-container">
                            <img id="wpi-img-logo" src="" alt="El logo va aqui" width="90%" />
                        </div>
                        <div class="wpi-form-container">
                            <h1 id="wpi-form-title">
                                <span class="wpi-outlet">
                                    Seleccione un servicio
                                </span>
                            </h1>
                        </div>
                        <div class="wpi-form-container">
                            <div class="display-block-wpi">
                                <label for="wpi-idempresa">Empresa: </label>
                            </div>
                            <div class="display-block-wpi">
                                <select name="idempresa" id="wpi-idempresa" class="select-wpi">
                                    <option value="">Seleccione</option>
                                </select>
                            </div>
                        </div>
                        <div class="wpi-form-container">
                            <div class="display-block-wpi">
                                <label for="wpi-idlocal">Local: </label>
                            </div>
                            <div class="display-block-wpi">
                                <select name="idlocal" id="wpi-idlocal" class="select-wpi">
                                    <option value="">Seleccione</option>
                                </select>
                            </div>
                        </div>
                        <div class="wpi-form-container">
                            <br>
                            <label for="btn-submit-wpi" class="btn-wpi">
                                Ingresar
                            </label>
                            <input type="submit" id="btn-submit-wpi" value="" style="display: none !important;">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php $this->endSection(); ?>

<?php $this->section('js'); ?>
<?php $this->endSection(); ?>