<?php
session_start();

include __DIR__ . '/site/admin/header.php';
include __DIR__ . '/site/admin/db.class.php';

    $db = new db("index");
    session_start();
?>

<style>
body {
    background: #0a0a0a;
    color: #e0e0e0;
}

h3 {
    color: #00f7ff;
    text-shadow: 0 0 10px #00f7ff, 0 0 20px #00f7ff, 0 0 30px #00f7ff;
    border-color: #00f7ff !important;
}

.accordion-button {
    background: #111;
    color: #0ff !important;
    border: none;
    font-weight: bold;
    text-shadow: 0 0 8px #0ff;
}

.accordion-button:not(.collapsed) {
    background: #0ff22f33;
    color: #fff;
    box-shadow: 0 0 15px #0ff;
}

.accordion-body {
    background: #0f0f0f;
    color: #cfcfcf;
    border-left: 2px solid #0ff;
    border-right: 2px solid #0ff;
    box-shadow: inset 0 0 10px #0ff55f;
}

.btn-success {
    background: #00ff88;
    border: 1px solid #00ffcc;
    color: #000;
    font-weight: bold;
    text-shadow: 0 0 5px #fff;
    box-shadow: 0 0 12px #00ffcc;
}

.btn-success:hover {
    background: #00ffaa;
    box-shadow: 0 0 20px #00ffcc;
}

iframe {
    border: 2px solid #00f7ff !important;
    box-shadow: 0 0 15px #00f7ff;
}

</style>

<div class="row mb-5">
    <div class="col-12">
        <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
        
    </div>
</div>

<div class="row">
    <aside class="col-8">
        
        <h3 class="pb-2 mb-4 fst-italic border-bottom border-secondary">FAQ</h3>
        <div class="justify-content-evenly">

            <div class="accordion accordion-flush" id="a1">
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#flush-collapse1" aria-expanded="false"
                            aria-controls="flush-collapse1">
                            Karaokê com comida?
                        </button>
                    </h2>
                    <div id="flush-collapse1" class="accordion-collapse collapse" data-bs-parent="#a1">
                        <div class="accordion-body">
                           Tem sim!
                        </div>
                    </div>
                </div>

                <div class="accordion-item mt-2">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#flush-collapse2" aria-expanded="false"
                            aria-controls="flush-collapse2">
                            Sou de menor, posso participar?
                        </button>
                    </h2>
                    <div id="flush-collapse2" class="accordion-collapse collapse" data-bs-parent="#a1">
                        <div class="accordion-body">
                            Dependendo da Playlist sim!
                        </div>
                    </div>
                </div>

                <div class="accordion-item mt-2">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#flush-collapse3" aria-expanded="false"
                            aria-controls="flush-collapse3">
                            Onde fica?
                        </button>
                    </h2>
                    <div id="flush-collapse3" class="accordion-collapse collapse" data-bs-parent="#a1">
                        <div class="accordion-body">
                            Rua Carolina, 902 D, Paraíso
                        </div>
                    </div>
                </div>

                <div class="accordion-item mt-2">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#flush-collapse4" aria-expanded="false"
                            aria-controls="flush-collapse4">
                            Qual o horário de funcionamento?
                        </button>
                    </h2>
                    <div id="flush-collapse4" class="accordion-collapse collapse" data-bs-parent="#a1">
                        <div class="accordion-body">
                            DAs 18h às 02h.
                        </div>
                    </div>
                </div>

                <div class="accordion-item mt-2">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#flush-collapse5" aria-expanded="false"
                            aria-controls="flush-collapse5">
                            Para menos de idade o horário muda?
                        </button>
                    </h2>
                    <div id="flush-collapse5" class="accordion-collapse collapse" data-bs-parent="#a1">
                        <div class="accordion-body">
                            Sim, 18h-23h
                        </div>
                    </div>
                </div>

                <div class="accordion-item mt-2">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#flush-collapse6" aria-expanded="false"
                            aria-controls="flush-collapse6">
                            Posso ter mais que uma sala?
                        </button>
                    </h2>
                    <div id="flush-collapse6" class="accordion-collapse collapse" data-bs-parent="#a1">
                        <div class="accordion-body">
                            Dependendo da disponibilidade das salas, sim.
                        </div>
                    </div>
                </div>
            </div>
          
        </div>
    </aside>

    <div class="col-4">
        <h3 class="pb-2 mb-4 fst-italic border-bottom border-secondary">Localização</h3>

        <iframe width="370" height="350"
            src="https://www.openstreetmap.org/export/embed.html?bbox=-52.66605377197266%2C-27.157073194169662%2C-52.54159927368164%2C-27.071354789865012&amp;layer=mapnik">
        </iframe><br />

        <small>
            <a class="btn btn-success" href="https://www.openstreetmap.org/#map=13/-27.11422/-52.60383">
                Ver mapa ampliado
            </a>
        </small>
    </div>
</div>

<?php include __DIR__ . '/site/admin/footer.php'; ?>
?>
