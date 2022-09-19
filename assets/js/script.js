var pedido = []

function removerItem(id) {
    const span = document.getElementById(`quantidade-do-item-${id}`)
    const spanValue = parseInt(span.textContent)

    if (spanValue > 0) {
        removerLancheDoPedido(id)
        span.innerHTML = spanValue - 1
    }

    calcularTotal()
}

function removerLancheDoPedido(id) {
    const index = pedido.map(function(item) {
        return item.id;
    }).indexOf(id)

    pedido.splice(index, 1)
}

function addItem(id, nome, preco) {
    const span = document.getElementById(`quantidade-do-item-${id}`)
    const spanValue = parseInt(span.textContent)

    span.innerHTML = spanValue + 1

    const item = {
        "id": id,
        "nome": nome,
        "preco": preco
    }

    pedido.push(item)
    
    calcularTotal()
}

function calcularTotal() {
    const totalH2 = document.getElementById("total")
    let total = 0

    pedido.forEach(item => {
        total += parseFloat(item.preco)
    })
 
    totalH2.innerHTML="R$ " + total.toFixed(2)
}

function fazerPedido() {
    const textoPedido = "Olá, gostaria de fazer o seguinte pedido: "
    let lanches = []

    pedido.forEach(item => {
        lanches.push(item.nome)
    });

    let lanchesComQuantidade = lanches.reduce((quantidade, item) => (quantidade[item] = quantidade[item] + 1 || 1, quantidade), {});
    lanchesComQuantidade = JSON.stringify(lanchesComQuantidade).replace("{", "")
    lanchesComQuantidade = lanchesComQuantidade.replace("}", "")

    let mensagem = textoPedido + lanchesComQuantidade

    window.location.href = `https://wa.me/5548991343954?text=${mensagem}`
}

function mostrarPedido() {
    const divTexto = document.getElementById("visualizar-meu-pedido")
    divTexto.innerHTML = ""

    pedido.forEach((lanche) => {
        let divDetalhes = document.createElement('div');
        let divNomeDoLanche = document.createElement('div');
        let divPreco = document.createElement('div');

        divNomeDoLanche.innerHTML = lanche.nome
        divPreco.innerHTML = "R$" + lanche.preco

        divDetalhes.classList.add("d-flex")
        divDetalhes.classList.add("justify-content-between")

        divDetalhes.appendChild(divNomeDoLanche)
        divDetalhes.appendChild(divPreco)

        divTexto.appendChild(divDetalhes)
    })
}