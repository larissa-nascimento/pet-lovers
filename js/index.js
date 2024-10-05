document.querySelectorAll('.btn-add-cart').forEach(button => {
    button.addEventListener('click', () => {
        alert('Produto adicionado ao carrinho!');
    });
});


let index = 0;

function mudarImagem(direction) {
    const imagens = document.querySelector('.imagens');
    const totalImagens = imagens.children.length;

    index += direction;

    if (index >= totalImagens) {
        index = 0;
    } else if (index < 0) {
        index = totalImagens - 1;
    }

    imagens.style.transform = `translateX(${-index * 100}%)`;
}
