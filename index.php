<?php
include "src/CasosDeUso/obtercardapio.php"; 
?>


<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fast food - Cardápio Online</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="style.css" rel="stylesheet">
</head>

<body>
    <main>
        <section id="cardapio">
            <div class="container">
                <h1 class="text-center mt-5 text-white">Cardapio Online</h1>
                <?php foreach($cardapios as $lanche) { ?>
                <div class="row mt-3 border border-1 p-3 shadow-lg rounded bg-white">
                    <div class="col-3">
                        <img width="100%" src="<?= $lanche->imagem ?>"alt="">
                    </div>
                    <div class="col-6">
                        <h4><?= $lanche->nome ?></h4>
                        <span><?= $lanche->descricao ?></span>
                        <h3><?= $lanche->preco ?></h3>                
                    </div>
                    <div class="col-3 d-flex gap-2">
                        <button onclick="removerItem('<?= $lanche->id ?>')" class="btn btn-danger rounded-circle btn-custom">-</button>
                        <button onclick="addItem('<?= $lanche->id ?>', '<?= $lanche->nome ?>', '<?= $lanche->preco ?>')" class="btn btn-success rounded-circle btn-custom">+</button>
                        <h2><span id="quantidade-do-item-<?= $lanche->id ?>" class="ms-3 badge bg-primary">0</span></h2>
                    </div>
                </div>
                <?php } ?>
            </div>
        </section>

        <section id="carrinho" class="fixed-bottom bg-white p-4 shadow-lg">
            <div class="container">
                <div class="d-flex justify-content-between"> 
                    <div> 
                        <span class="h3 text-black-50"> Total </span>
                    </div>
                    <div> <h2 id="total">R$ 0.00 </h2></div>
                </div>

                <div class="accordion accordion-flush" id="accordionFlushExample">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="flush-headingOne">
                        <button class="accordion-button collapsed bg-primary" onClick="mostrarPedido()" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                            <b class="text-white">Ver meu pedido</b>
                        </button>
                        </h2>
                        <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body" id="visualizar-meu-pedido"></div>
                        </div>
                    </div>
                </div>

                <button data-bs-toggle="modal" data-bs-target="#exampleModal" class="btn btn-success w-100 mt-3">Fazer Pedido. </button>
            </div>
        </section>


        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Observação</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <textarea class="form-control" name="" id="" cols="30" rows="10" placeholder="Caso necessário, coloque uma observação.. Ex.: Sem ervilha, milho"></textarea>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="button" onclick="fazerPedido()" class="btn btn-success">Confirmar o pedido</button>
                </div>
                </div>
            </div>
        </div>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/script.js"></script>
</body>
</html>