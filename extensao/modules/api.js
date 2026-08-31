// =========================================
// CONTROLE NFP
// api.js
// Comunicação com Laravel
// =========================================

const API_URL = "http://127.0.0.1:8000/api";

async function enviarNota(dados) {
    try {

        const resposta = await fetch(`${API_URL}/notas`, {
            method: "POST",
            headers: {
                "Content-Type": "application/json"
            },
            body: JSON.stringify(dados)
        });

        const resultado = await resposta.json();

        console.log("Resposta da API:", resultado);

        // =====================================
        // Nota cadastrada com sucesso
        // =====================================
        if (resposta.ok) {
            return {
                success: true,
                message: resultado.message,
                nota: resultado.nota
            };
        }

        // =====================================
        // Nota já existe (HTTP 409)
        // =====================================
        if (resposta.status === 409) {
            console.warn(
                "CONTROLE NFP - Nota já cadastrada."
            );

            return {
                success: false,
                duplicate: true,
                message: "Esta nota já está cadastrada.",
                nota: resultado.nota
            };
        }

        // =====================================
        // Outros erros do Laravel
        // =====================================
        return {
            success: false,
            message: resultado.message || "Erro ao registrar a nota.",
            errors: resultado.errors || null
        };

    } catch (erro) {

        console.error(
            "Erro ao enviar nota para a API:",
            erro
        );

        return {
            success: false,
            offline: true,
            message: "Não foi possível conectar com a API."
        };
    }
}