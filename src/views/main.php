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
                    <?= $service; ?>
                <?php } ?>
            </div>
        </div>
        <div class="item-wpi full-height-wpi" id="wpi-form-column">
            <div class="full-height-wpi display-flex">
                <div class="margin-auto form-box-wpi">
                    <form method="post" class="form-content-wpi wpi-standar-text-color">
                        <div class="wpi-form-container">
                            <img id="wpi-img-logo" src="" alt="El logo va aqui" width="90%" />
                        </div>
                        <div class="wpi-form-container">
                            <h1 id="wpi-form-title" class="text-center-wpi">
                                <span class="wpi-outlet text-center-wpi">
                                    Seleccione un servicio
                                </span>
                            </h1>
                            <br>
                            <hr>
                            <br>
                            <input type="hidden" name="idservicio" id="wpi-idservicio" />
                        </div>
                        <div class="wpi-form-container rw-wpi-empresa wpi-hidden">
                            <div class="display-block-wpi">
                                <label for="wpi-idempresa">Empresa: </label>
                            </div>
                            <div class="display-block-wpi">
                                <select name="idempresa" id="wpi-idempresa" class="select-wpi">
                                    <option value="">Seleccione</option>
                                </select>
                            </div>
                        </div>
                        <div class="wpi-form-container rw-wpi-local wpi-hidden">
                            <div class="display-block-wpi">
                                <label for="wpi-idlocal">Local: </label>
                            </div>
                            <div class="display-block-wpi">
                                <select name="idlocal" id="wpi-idlocal" class="select-wpi">
                                    <option value="">Seleccione</option>
                                </select>
                            </div>
                        </div>
                        <div class="wpi-form-container rw-wpi-otros wpi-hidden">
                            <div class="display-block-wpi">
                                <p>
                                    No se requieren de datos adicionales para acceder al servicio de <span class="alias-otro-servicio-wpi"></span>, por favor presione el boton para ingresar al sistema.
                                </p>
                            </div>
                        </div>
                        <div class="wpi-form-container base-wpi-message">
                            <div class="display-block-wpi">
                                <p class="margin-bottom-5-wpi">
                                    Por favor, elige uno de los servicios disponibles para activar el formulario de atención. 
                                </p>
                                <p class="margin-bottom-5-wpi">
                                    Aquí aparecerán los campos correspondientes una vez hayas elegido una opción.
                                </p>
                            </div>
                        </div>
                        <div class="wpi-form-container">
                            <br>
                            <label for="btn-submit-wpi" class="btn-wpi btn-submit-form" disabled>
                                Ingresar
                            </label>
                            <button type="button" onclick="WPM.setFormConfig(null);" class="btn-submit-form btn-wpi btn-wpi-base show-only-on-mobile" disabled>Seleccionar servicio</button>
                            <input type="submit" id="btn-submit-wpi" class="btn-submit-form" value="" style="display: none !important;" disabled />
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php $this->endSection(); ?>

<?php $this->section('js'); ?>
<?php $this->endSection(); ?>