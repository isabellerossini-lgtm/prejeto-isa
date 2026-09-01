const selectProduto = document.getElementById('produto');
const inputQtd = document.getElementById('qtd');
const displayTotal = document.getElementById('valorTotal');

if (selectProduto && inputQtd && displayTotal) {
    function atualizarTotal() {
        const opt = selectProduto.options[selectProduto.selectedIndex];
        const preco = parseFloat(opt ? opt.getAttribute('data-p') : 0) || 0;
        const qtd = parseInt(inputQtd.value) || 0;
        const total = preco * qtd;
        displayTotal.innerText = `R$ ${total.toLocaleString('pt-BR', {minimumFractionDigits: 2})}`;
    }

    selectProduto.addEventListener('change', atualizarTotal);
    inputQtd.addEventListener('input', atualizarTotal);
    atualizarTotal();
}

let slideIndex = 0;

function mostrarSlide(index) {
    const slides = document.querySelectorAll('.carrossel-slides .slide');
    if (!slides.length) return;
    slideIndex = index;
    if (slideIndex >= slides.length) { slideIndex = 0; }
    if (slideIndex < 0) { slideIndex = slides.length - 1; }

    slides.forEach(slide => slide.classList.remove('ativo'));
    slides[slideIndex].classList.add('ativo');
}

function mudarSlide(direcao) {
    mostrarSlide(slideIndex + direcao);
}

// Inicializa e troca de foto automática a cada 4 segundos
mostrarSlide(slideIndex);
setInterval(() => { mudarSlide(1); }, 4000);