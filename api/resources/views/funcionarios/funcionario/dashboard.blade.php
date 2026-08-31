<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>CSTL - Casa Santa Teresinha</title>

    <style>
        * {
            box-sizing: border-box;
        }

        :root {
            --azul: #2E5664;
            --azul-escuro: #244653;
            --turquesa: #01C1D4;
            --turquesa-escuro: #00A9BA;
            --rosa: #FC9BB4;
            --rosa-claro: #FFF1F4;
            --fundo: #EFEDEA;
            --branco: #FFFFFF;
            --texto: #263B42;
            --texto-secundario: #6B7280;
            --borda: #E1E8EA;
            --sucesso: #166534;
            --sucesso-fundo: #DCFCE7;
            --erro: #B4233C;
            --erro-fundo: #FFF1F3;
        }

        html,
        body {
            margin: 0;
            padding: 0;
            min-height: 100%;
        }

        body {
            font-family: Arial, Helvetica, sans-serif;
            background: var(--fundo);
            color: var(--texto);
        }

        /* =========================
           LAYOUT PRINCIPAL
        ========================= */

        .layout {
            min-height: 100vh;
            display: flex;
        }

        /* =========================
           MENU LATERAL
        ========================= */

        .sidebar {
            width: 255px;
            min-height: 100vh;
            background: var(--azul);
            color: white;
            display: flex;
            flex-direction: column;
            position: fixed;
            left: 0;
            top: 0;
            bottom: 0;
            z-index: 100;
        }

        .sidebar-top {
            padding: 25px 22px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.12);
        }

        .marca {
            display: flex;
            align-items: center;
            gap: 12px;
            text-decoration: none;
            color: white;
        }

        .marca img {
            width: 55px;
            height: 55px;
            object-fit: contain;
            background: white;
            border-radius: 12px;
            padding: 5px;
        }

        .marca-texto {
            display: flex;
            flex-direction: column;
        }

        .marca-texto strong {
            font-size: 17px;
            line-height: 1.2;
        }

        .marca-texto span {
            margin-top: 3px;
            color: rgba(255, 255, 255, 0.72);
            font-size: 11px;
            text-transform: uppercase;
            letter-spacing: 0.7px;
        }

        /* =========================
           MENU
        ========================= */

        .menu {
            padding: 25px 14px;
        }

        .menu-titulo {
            padding: 0 10px 10px;
            color: rgba(255, 255, 255, 0.5);
            font-size: 11px;
            font-weight: bold;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .menu-item {
            display: flex;
            align-items: center;
            gap: 12px;
            width: 100%;
            padding: 12px 13px;
            margin-bottom: 5px;
            border-radius: 9px;
            color: rgba(255, 255, 255, 0.82);
            text-decoration: none;
            font-size: 14px;
            transition:
                background 0.2s ease,
                color 0.2s ease;
        }

        .menu-item:hover {
            background: rgba(255, 255, 255, 0.09);
            color: white;
        }

        .menu-item.ativo {
            background: rgba(1, 193, 212, 0.18);
            color: white;
        }

        .menu-icone {
            width: 30px;
            height: 30px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 7px;
            background: rgba(255, 255, 255, 0.08);
            font-size: 15px;
        }

        .menu-item.ativo .menu-icone {
            background: var(--turquesa);
        }

        /* =========================
           USUÁRIO
        ========================= */

        .sidebar-footer {
            margin-top: auto;
            padding: 18px;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
        }

        .usuario-sidebar {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .avatar {
            width: 38px;
            height: 38px;
            flex-shrink: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            background: var(--turquesa);
            color: white;
            border-radius: 50%;
            font-size: 14px;
            font-weight: bold;
        }

        .usuario-info {
            min-width: 0;
        }

        .usuario-info strong {
            display: block;
            max-width: 150px;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
            font-size: 13px;
        }

        .usuario-info span {
            display: block;
            margin-top: 3px;
            color: rgba(255, 255, 255, 0.58);
            font-size: 11px;
        }

        /* =========================
           ÁREA PRINCIPAL
        ========================= */

        .principal {
            width: calc(100% - 255px);
            margin-left: 255px;
            min-height: 100vh;
        }

        /* =========================
           TOPO
        ========================= */

        .topo {
            height: 76px;
            padding: 0 35px;
            background: var(--branco);
            border-bottom: 1px solid var(--borda);
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .topo-titulo h1 {
            margin: 0;
            color: var(--texto);
            font-size: 18px;
        }

        .topo-titulo p {
            margin: 4px 0 0;
            color: var(--texto-secundario);
            font-size: 12px;
        }

        .topo-direita {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .usuario-topo {
            color: var(--texto);
            font-size: 14px;
            font-weight: 600;
        }

        .logout {
            border: none;
            padding: 9px 15px;
            border-radius: 8px;
            background: var(--erro-fundo);
            color: var(--erro);
            font-size: 13px;
            font-weight: bold;
            cursor: pointer;
            transition: 0.2s ease;
        }

        .logout:hover {
            background: #FFE0E6;
        }

        /* =========================
           CONTEÚDO
        ========================= */

        .conteudo {
            width: 100%;
            max-width: 1400px;
            margin: 0 auto;
            padding: 35px;
        }

        /* =========================
           BOAS-VINDAS
        ========================= */

        .boas-vindas {
            margin-bottom: 28px;
            background:
                linear-gradient(
                    135deg,
                    #FFFFFF 0%,
                    #F5FBFC 100%
                );
            border: 1px solid var(--borda);
            border-radius: 16px;
            padding: 27px 30px;
            position: relative;
            overflow: hidden;
        }

        .boas-vindas::after {
            content: "";
            position: absolute;
            right: -45px;
            top: -65px;
            width: 180px;
            height: 180px;
            border-radius: 50%;
            background: rgba(1, 193, 212, 0.08);
        }

        .boas-vindas h2 {
            margin: 0 0 7px;
            color: var(--azul);
            font-size: 23px;
        }

        .boas-vindas p {
            margin: 0;
            color: var(--texto-secundario);
            font-size: 14px;
        }

        .destaque {
            color: var(--turquesa-escuro);
            font-weight: bold;
        }

        /* =========================
           CARDS
        ========================= */

        .cards {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 18px;
            margin-bottom: 28px;
        }

        .card {
            background: var(--branco);
            border: 1px solid var(--borda);
            border-radius: 14px;
            padding: 22px;
            box-shadow:
                0 3px 12px rgba(46, 86, 100, 0.05);
            transition:
                transform 0.2s ease,
                box-shadow 0.2s ease;
        }

        .card:hover {
            transform: translateY(-2px);
            box-shadow:
                0 8px 22px rgba(46, 86, 100, 0.09);
        }

        .card-topo {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 18px;
        }

        .card h3 {
            margin: 0;
            color: var(--texto-secundario);
            font-size: 13px;
            font-weight: 600;
        }

        .card-icone {
            width: 40px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 10px;
            background: rgba(1, 193, 212, 0.1);
            color: var(--turquesa-escuro);
            font-size: 18px;
        }

        .card-erro .card-icone {
            background: var(--rosa-claro);
            color: var(--erro);
        }

        .numero {
            color: var(--azul);
            font-size: 32px;
            font-weight: 700;
            line-height: 1;
        }

        .card-rodape {
            margin-top: 9px;
            color: #9AA7AB;
            font-size: 11px;
        }

        /* =========================
           SEÇÃO HISTÓRICO
        ========================= */

        .secao {
            background: var(--branco);
            border: 1px solid var(--borda);
            border-radius: 14px;
            padding: 25px;
            box-shadow:
                0 3px 12px rgba(46, 86, 100, 0.05);
        }

        .secao-cabecalho {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 15px;
            margin-bottom: 20px;
        }

        .secao h3 {
            margin: 0;
            color: var(--azul);
            font-size: 18px;
        }

        .secao-descricao {
            margin: 5px 0 0;
            color: var(--texto-secundario);
            font-size: 12px;
        }

        /* =========================
           TABELA
        ========================= */

        .tabela-container {
            overflow-x: auto;
            border: 1px solid var(--borda);
            border-radius: 10px;
        }

        table {
            width: 100%;
            min-width: 720px;
            border-collapse: collapse;
        }

        th,
        td {
            padding: 14px 15px;
            text-align: left;
            border-bottom: 1px solid var(--borda);
        }

        tr:last-child td {
            border-bottom: none;
        }

        th {
            background: #F6F9FA;
            color: var(--azul);
            font-size: 11px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.4px;
        }

        td {
            color: #4B5B60;
            font-size: 13px;
            vertical-align: middle;
        }

        tbody tr {
            transition: background 0.15s ease;
        }

        tbody tr:hover {
            background: #FAFCFC;
        }

        /* =========================
           STATUS
        ========================= */

        .status {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 6px 10px;
            border-radius: 20px;
            font-size: 11px;
            font-weight: 700;
        }

        .status::before {
            content: "";
            width: 6px;
            height: 6px;
            border-radius: 50%;
        }

        .status-sucesso {
            background: var(--sucesso-fundo);
            color: var(--sucesso);
        }

        .status-sucesso::before {
            background: #22C55E;
        }

        .status-erro {
            background: var(--erro-fundo);
            color: var(--erro);
        }

        .status-erro::before {
            background: var(--rosa);
        }

        .chave {
            max-width: 260px;
            font-family: Consolas, Monaco, monospace;
            font-size: 11px;
            color: var(--azul);
            word-break: break-all;
        }

        .vazio {
            text-align: center;
            padding: 35px !important;
            color: var(--texto-secundario);
        }

        /* =========================
           BOTÃO NFP
        ========================= */

        .acoes {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 20px;
            margin-top: 22px;
        }

        .botao-nfp {
            display: inline-flex;
            align-items: center;
            gap: 9px;
            background: var(--azul);
            color: white;
            padding: 12px 18px;
            border-radius: 9px;
            text-decoration: none;
            font-size: 13px;
            font-weight: 700;
            transition:
                background 0.2s ease,
                transform 0.15s ease;
        }

        .botao-nfp:hover {
            background: var(--azul-escuro);
            transform: translateY(-1px);
        }

        .botao-nfp .seta {
            color: var(--turquesa);
            font-size: 16px;
        }

        /* =========================
           MOBILE
        ========================= */

        .menu-mobile {
            display: none;
        }

        @media (max-width: 1000px) {

            .sidebar {
                width: 220px;
            }

            .principal {
                width: calc(100% - 220px);
                margin-left: 220px;
            }

            .cards {
                grid-template-columns: 1fr 1fr;
            }
        }

        @media (max-width: 750px) {

            .sidebar {
                display: none;
            }

            .principal {
                width: 100%;
                margin-left: 0;
            }

            .topo {
                height: auto;
                padding: 17px 20px;
                gap: 15px;
            }

            .topo-direita {
                gap: 8px;
            }

            .usuario-topo {
                display: none;
            }

            .menu-mobile {
                display: flex;
                width: 40px;
                height: 40px;
                align-items: center;
                justify-content: center;
                background: var(--azul);
                color: white;
                border: none;
                border-radius: 8px;
                font-size: 18px;
                cursor: pointer;
            }

            .conteudo {
                padding: 20px;
            }

            .cards {
                grid-template-columns: 1fr;
            }

            .boas-vindas {
                padding: 22px;
            }

            .secao {
                padding: 18px;
            }

            .secao-cabecalho {
                align-items: flex-start;
                flex-direction: column;
            }

            .acoes {
                align-items: stretch;
                flex-direction: column;
            }

            .botao-nfp {
                justify-content: center;
            }
        }

        @media (max-width: 450px) {

            .topo-titulo h1 {
                font-size: 16px;
            }

            .topo-titulo p {
                font-size: 11px;
            }

            .conteudo {
                padding: 15px;
            }

            .boas-vindas h2 {
                font-size: 20px;
            }

            .card {
                padding: 19px;
            }
        }
    </style>
</head>

<body>

<div class="layout">

    <!-- =========================
         MENU LATERAL
    ========================== -->

    <aside class="sidebar">

        <div class="sidebar-top">

            <a href="#" class="marca">

                <img
                    src="{{ asset('images/logo.png') }}"
                    alt="Casa Santa Teresinha"
                >

                <div class="marca-texto">

                    <strong>CSTL</strong>

                    <span>
                        Casa Santa Teresinha
                    </span>

                </div>

            </a>

        </div>

        <nav class="menu">

            <div class="menu-titulo">
                Menu
            </div>

            <a
                href="#"
                class="menu-item ativo"
            >
                <span class="menu-icone">
                    🏠
                </span>

                <span>
                    Início
                </span>
            </a>

            <a
                href="#"
                class="menu-item"
            >
                <span class="menu-icone">
                    📄
                </span>

                <span>
                    Minhas notas
                </span>
            </a>

            <a
                href="#"
                class="menu-item"
            >
                <span class="menu-icone">
                    📊
                </span>

                <span>
                    Relatórios
                </span>
            </a>

        </nav>

        <div class="sidebar-footer">

            <div class="usuario-sidebar">

                <div class="avatar">
                    {{ strtoupper(substr($funcionario->nome ?? 'V', 0, 1)) }}
                </div>

                <div class="usuario-info">

                    <strong>
                        {{ $funcionario->nome ?? 'Voluntário' }}
                    </strong>

                    <span>
                        Voluntário
                    </span>

                </div>

            </div>

        </div>

    </aside>

    <!-- =========================
         ÁREA PRINCIPAL
    ========================== -->

    <div class="principal">

        <header class="topo">

            <div class="topo-titulo">

                <h1>
                    Área do Voluntário
                </h1>

                <p>
                    Sistema de controle e acompanhamento
                </p>

            </div>

            <button
                type="button"
                class="menu-mobile"
                aria-label="Abrir menu"
            >
                ☰
            </button>

            <div class="topo-direita">

                <span class="usuario-topo">
                    {{ $funcionario->nome ?? 'Voluntário' }}
                </span>

                <form
                    method="POST"
                    action="{{ route('logout') }}"
                >

                    @csrf

                    <button
                        type="submit"
                        class="logout"
                    >
                        Sair
                    </button>

                </form>

            </div>

        </header>

        <main class="conteudo">

            <!-- =========================
                 BOAS-VINDAS
            ========================== -->

            <section class="boas-vindas">

                <h2>

                    Olá,

                    <span class="destaque">
                        {{ $funcionario->nome ?? 'Voluntário' }}
                    </span>!

                </h2>

                <p>
                    Bem-vindo ao sistema da Casa Santa Teresinha.
                    Aqui você pode acompanhar suas notas e atividades.
                </p>

            </section>

            <!-- =========================
                 CARDS
            ========================== -->

            <section class="cards">

                <div class="card">

                    <div class="card-topo">

                        <h3>
                            Minhas notas
                        </h3>

                        <div class="card-icone">
                            📄
                        </div>

                    </div>

                    <div class="numero">
                        {{ $minhasNotas }}
                    </div>

                    <div class="card-rodape">
                        Total de notas cadastradas
                    </div>

                </div>

                <div class="card">

                    <div class="card-topo">

                        <h3>
                            Notas hoje
                        </h3>

                        <div class="card-icone">
                            📅
                        </div>

                    </div>

                    <div class="numero">
                        {{ $notasHoje }}
                    </div>

                    <div class="card-rodape">
                        Registros realizados hoje
                    </div>

                </div>

                <div class="card card-erro">

                    <div class="card-topo">

                        <h3>
                            Notas com erro
                        </h3>

                        <div class="card-icone">
                            !
                        </div>

                    </div>

                    <div class="numero">
                        {{ $notasComErro }}
                    </div>

                    <div class="card-rodape">
                        Registros que precisam de atenção
                    </div>

                </div>

            </section>

            <!-- =========================
                 HISTÓRICO
            ========================== -->

            <section class="secao">

                <div class="secao-cabecalho">

                    <div>

                        <h3>
                            Histórico de notas
                        </h3>

                        <p class="secao-descricao">
                            Acompanhe os últimos registros realizados no sistema.
                        </p>

                    </div>

                </div>

                <div class="tabela-container">

                    <table>

                        <thead>

                            <tr>

                                <th>
                                    Chave
                                </th>

                                <th>
                                    Status
                                </th>

                                <th>
                                    Mensagem
                                </th>

                                <th>
                                    Data
                                </th>

                            </tr>

                        </thead>

                        <tbody>

                            @forelse ($historico as $nota)

                                <tr>

                                    <td class="chave">
                                        {{ $nota->chave }}
                                    </td>

                                    <td>

                                        @if ($nota->status === 'sucesso')

                                            <span class="status status-sucesso">
                                                Sucesso
                                            </span>

                                        @else

                                            <span class="status status-erro">
                                                Erro
                                            </span>

                                        @endif

                                    </td>

                                    <td>
                                        {{ $nota->mensagem ?? '-' }}
                                    </td>

                                    <td>
                                        {{ $nota->data_cadastro?->format('d/m/Y H:i:s') ?? '-' }}
                                    </td>

                                </tr>

                            @empty

                                <tr>

                                    <td
                                        colspan="4"
                                        class="vazio"
                                    >
                                        Nenhuma nota registrada ainda.
                                    </td>

                                </tr>

                            @endforelse

                        </tbody>

                    </table>

                </div>

                <div class="acoes">

                    <a
                        href="https://portal.fazenda.sp.gov.br/servicos/nfp"
                        target="_blank"
                        rel="noopener noreferrer"
                        class="botao-nfp"
                    >

                        <span>
                            Acessar site da NFP
                        </span>

                        <span class="seta">
                            ↗
                        </span>

                    </a>

                </div>

            </section>

        </main>

    </div>

</div>

</body>

</html>