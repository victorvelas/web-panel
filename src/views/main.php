<?php $this->extends('layout'); ?>

<?php $this->setYield('title', 'web panel'); ?>

<?php $this->section('sources'); ?>
    <link rel="stylesheet" href="public/main.css" />
<?php $this->endSection(); ?>

<?php $this->section('html'); ?>
    <div class="no-display-on-movil display-flex content-wpi standar-height-wpi">
        <div class="item-wpi full-height lateral-menu-wpi">
            <div>
                <?php foreach ($this->viewData['services'] as $service) { ?>
                    <div id="service-card-<?= $service->id; ?>" class="service-card-wpi">
                        <div>
                            <div class="display-flex">
                                <div class="content-service-card-wpi">
                                    <h3><?= $service->name; ?></h3>
                                    <small><?= $service->sumary; ?></small>
                                </div>
                                <div class="button-service-card-wpi">
                                    <button>
                                        Ingresar ->
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
        <div class="item-wpi full-height">
            <div>
                <form action="/" method="post">

                </form>
            </div>
        </div>
    </div>
<?php $this->endSection(); ?>

<?php $this->section('js'); ?>
<?php $this->endSection(); ?>