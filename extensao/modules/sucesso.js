// =========================================
// CONTROLE NFP
// sucesso.js
// =========================================

const MENSAGEM_SUCESSO =
    "Doação registrada com sucesso. Aguardando processamento pelo sistema.";

function converterDataNfpParaLaravel(data, hora) {
    const partesData = data.split("/");
    const partesHora = hora.split(":");

    if (
        partesData.length !== 3 ||
        partesHora.length !== 3
    ) {
        return null;
    }

    const dia = partesData[0];
    const mes = partesData[1];
    const ano = partesData[2];

    return `${ano}-${mes}-${dia} ${hora}`;
}

async function processarSucesso() {
    const texto = document.body?.innerText || "";

    if (!texto.includes(MENSAGEM_SUCESSO)) {
        return;
    }

    if (window.controleNfpSucessoProcessado) {
        return;
    }

    const chave = sessionStorage.getItem(
        "controle_nfp_chave_pendente"
    );

    if (!chave) {
        console.error(
            "CONTROLE NFP - Não encontrei a chave pendente."
        );
        return;
    }

    window.controleNfpSucessoProcessado = true;

    console.log(
        "CONTROLE NFP - CONFIRMAÇÃO ENCONTRADA!"
    );

    console.log(
        "CONTROLE NFP - Chave da nota confirmada:",
        chave
    );

    const encontrada = texto.match(
        /\b(\d{2}\/\d{2}\/\d{4})\s+(\d{2}:\d{2}:\d{2})\b/
    );

    let dataSucesso = null;

    if (encontrada) {
        dataSucesso = converterDataNfpParaLaravel(
            encontrada[1],
            encontrada[2]
        );

        console.log(
            "CONTROLE NFP - Data da confirmação na NFP:",
            `${encontrada[1]} ${encontrada[2]}`
        );

        console.log(
            "CONTROLE NFP - Data convertida para API:",
            dataSucesso
        );
    }

    const dados = {
        cpf: "50547820879",
        chave: chave,
        status: "sucesso",
        mensagem: MENSAGEM_SUCESSO,
        data_cadastro:
            dataSucesso || new Date().toISOString()
    };

    console.log(
        "CONTROLE NFP - Enviando confirmação para API:",
        dados
    );

    const resultado = await enviarNota(dados);

    console.log(
        "CONTROLE NFP - Resultado da API:",
        resultado
    );

    if (resultado.success) {
        console.log(
            "CONTROLE NFP - NOTA REGISTRADA NO LARAVEL!"
        );

        sessionStorage.removeItem(
            "controle_nfp_chave_pendente"
        );

        sessionStorage.setItem(
            "controle_nfp_chave",
            chave
        );

        console.log(
            "CONTROLE NFP - Chave pendente removida."
        );
    } else {
        console.error(
            "CONTROLE NFP - Laravel recusou a nota:",
            resultado
        );

        window.controleNfpSucessoProcessado = false;
    }
}

console.log(
    "CONTROLE NFP - Módulo de sucesso carregado."
);

processarSucesso();

const observer = new MutationObserver(() => {
    processarSucesso();
});

observer.observe(document.body, {
    childList: true,
    subtree: true
});