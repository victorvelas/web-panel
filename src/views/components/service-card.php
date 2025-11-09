<div id="service-card-<?= $this->viewData['service']->id; ?>" class="service-card-wpi">
    <div class="display-flex">
        <div class="content-service-card-wpi">
            <h3><?= $this->viewData['service']->name; ?></h3>
            <small><?= $this->viewData['service']->sumary; ?></small>
        </div>
        <div class="button-service-card-wpi">
            <button>
                Ingresar ->
            </button>
        </div>
    </div>
</div>