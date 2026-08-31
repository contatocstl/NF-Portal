// =========================================
// CONTROLE NFP
// captura.js
// =========================================

function capturarChave() {
    const inputs = document.querySelectorAll("input");

    for (const input of inputs) {
        const valor = input.value?.trim() || "";
        const somenteNumeros = valor.replace(/\D/g, "");

        if (somenteNumeros.length === 44) {
            return somenteNumeros;
        }
    }

    return null;
}

function verificarChave() {
    const chave = capturarChave();

    if (!chave) {
        return;
    }

    const chaveAtual = sessionStorage.getItem(
        "controle_nfp_chave_pendente"
    );

    // Já é a mesma chave
    if (chaveAtual === chave) {
        return;
    }

    console.log(
        "CONTROLE NFP - Chave capturada:",
        chave
    );

    sessionStorage.setItem(
        "controle_nfp_chave_pendente",
        chave
    );

    console.log(
        "CONTROLE NFP - Chave pendente salva:",
        chave
    );
}

// =========================================
// EVENTOS
// =========================================

// Digitação manual
document.addEventListener("input", () => {
    verificarChave();
});

// Teclado
document.addEventListener("keyup", () => {
    verificarChave();
});

// Alteração do campo
document.addEventListener("change", () => {
    verificarChave();
});

// Colagem
document.addEventListener("paste", () => {
    setTimeout(() => {
        verificarChave();
    }, 50);
});

// =========================================
// VERIFICAÇÃO CONTÍNUA
// =========================================

// Algumas páginas antigas (como essa do NFP)
// alteram o valor do input sem disparar corretamente
// o evento "input". Por isso verificamos periodicamente.

setInterval(() => {
    verificarChave();
}, 300);

// =========================================
// INICIALIZAÇÃO
// =========================================

window.addEventListener("load", () => {
    console.log(
        "CONTROLE NFP - Módulo de captura carregado."
    );

    verificarChave();
});