<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>CSTL - Relatórios</title>

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
            background:
                linear-gradient(
                    135deg,
                    #eef8fa 0%,
                    #f7fbfc 50%,
                    #eaf5f7 100%
                );
            color: var(--texto);
        }

        /* =====================================================
           LAYOUT
        ===================================================== */

        .layout {
            min-height: 100vh;
            display: flex;
        }

        /* =====================================================
           SIDEBAR
        ===================================================== */

        .sidebar {
            width: 255px;
            min-height: 100vh;
            position: fixed;
            left: 0;
            top: 0;
            bottom: 0;
            z-index: 100;
            background: var(--azul);
            color: white;
            display: flex;
            flex-direction: column;
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
            font-size: 10px;
            text-transform: uppercase;
            letter-spacing: 0.7px;
        }

        /* =====================================================
           MENU
        ===================================================== */

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

        /* =====================================================
           RODAPÉ SIDEBAR
        ===================================================== */

        .sidebar-footer {
            margin-top: auto;
            padding: 18px;
            border-top: 1px solid rgba(255, 255, 255, 0.10);
        }

        .usuario-sidebar {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .avatar {
            width: 38px;
            height: 38px;
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
            max-width: 155px;
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

        /* =====================================================
           PRINCIPAL
        ===================================================== */

        .principal {
            width: calc(100% - 255px);
            margin-left: 255px;
            min-height: 100vh;
        }

        /* =====================================================
           TOPO
        ===================================================== */

        .topo {
            min-height: 76px;
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

        /* =====================================================
           MENU MOBILE
        ===================================================== */

        .menu-mobile {
            display: none;
            width: 40px;
            height: 40px;
            align-items: center;
            justify-content: center;
            border: none;
            background: var(--azul);
            color: white;
            border-radius: 8px;
            font-size: 18px;
            cursor: pointer;
        }

        /* =====================================================
           CONTEÚDO
        ===================================================== */

        .conteudo {
            width: 100%;
            max-width: 1400px;
            margin: 0 auto;
            padding: 35px;
        }

        /* =====================================================
           CABEÇALHO DA PÁGINA
        ===================================================== */

        .cabecalho-pagina {
            margin-bottom: 28px;
            background:
                linear-gradient(
                    135deg,
                    #FFFFFF 0%,
                    #F5FBFC 100%
                );
            border: 1px solid var(--borda);
            border-radius: 16px;
            padding: 28px 30px;
            position: relative;
            overflow: hidden;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 20px;
        }

        .cabecalho-pagina::after {
            content: "";
            position: absolute;
            right: -45px;
            top: -65px;
            width: 180px;
            height: 180px;
            border-radius: 50%;
            background: rgba(1, 193, 212, 0.08);
        }

        .cabecalho-texto {
            position: relative;
            z-index: 1;
        }

        .cabecalho-pagina h2 {
            margin: 0 0 7px;
            color: var(--azul);
            font-size: 24px;
        }

        .cabecalho-pagina p {
            margin: 0;
            color: var(--texto-secundario);
            font-size: 14px;
        }

        .voltar {
            position: relative;
            z-index: 2;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 10px 15px;
            border-radius: 8px;
            background: rgba(1, 193, 212, 0.10);
            color: var(--turquesa-escuro);
            text-decoration: none;
            font-size: 13px;
            font-weight: bold;
            white-space: nowrap;
            transition: 0.2s ease;
        }

        .voltar:hover {
            background: rgba(1, 193, 212, 0.18);
        }

        /* =====================================================
           FILTROS
        ===================================================== */

        .filtros {
            background: var(--branco);
            border: 1px solid var(--borda);
            border-radius: 14px;
            padding: 22px;
            box-shadow: 0 3px 12px rgba(46, 86, 100, 0.05);
            margin-bottom: 28px;
        }

        .filtros-cabecalho {
            display: flex;
            align-items: center;
            gap: 12px;
            margin-bottom: 20px;
        }

        .filtros-icone {
            width: 40px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 10px;
            background: rgba(1, 193, 212, 0.10);
            color: var(--turquesa-escuro);
            font-size: 18px;
        }

        .filtros-cabecalho h3 {
            margin: 0;
            color: var(--azul);
            font-size: 17px;
        }

        .filtros-cabecalho p {
            margin: 3px 0 0;
            color: var(--texto-secundario);
            font-size: 11px;
        }

        .filtros-grid {
            display: grid;
            grid-template-columns:
                1.4fr
                1fr
                1fr
                1.2fr;
            gap: 16px;
        }

        .campo {
            display: flex;
            flex-direction: column;
            gap: 7px;
        }

        .campo label {
            color: var(--texto);
            font-size: 12px;
            font-weight: 600;
        }

        .campo input,
        .campo select {
            width: 100%;
            height: 40px;
            padding: 8px 11px;
            border: 1px solid var(--borda);
            border-radius: 8px;
            background: #FBFDFD;
            color: var(--texto);
            font-family: Arial, Helvetica, sans-serif;
            font-size: 13px;
            transition:
                border-color 0.2s ease,
                box-shadow 0.2s ease;
        }

        .campo input:hover,
        .campo select:hover {
            border-color: rgba(1, 193, 212, 0.45);
        }

        .campo input:focus,
        .campo select:focus {
            outline: none;
            border-color: var(--turquesa);
            box-shadow: 0 0 0 3px rgba(1, 193, 212, 0.10);
        }

        .botoes {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-top: 20px;
            padding-top: 18px;
            border-top: 1px solid #EEF2F3;
            flex-wrap: wrap;
        }

        .botao {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 7px;
            min-height: 39px;
            border: none;
            border-radius: 8px;
            padding: 9px 16px;
            font-family: Arial, Helvetica, sans-serif;
            font-size: 13px;
            font-weight: bold;
            cursor: pointer;
            text-decoration: none;
            transition:
                transform 0.2s ease,
                background 0.2s ease,
                box-shadow 0.2s ease;
        }

        .botao:hover {
            transform: translateY(-1px);
        }

        .botao-filtrar {
            background: var(--azul);
            color: white;
        }

        .botao-filtrar:hover {
            background: var(--azul-escuro);
            box-shadow: 0 5px 12px rgba(46, 86, 100, 0.15);
        }

        .botao-limpar {
            background: #F0F4F5;
            color: var(--texto-secundario);
        }

        .botao-limpar:hover {
            background: #E5ECEE;
            color: var(--texto);
        }

        .botao-excel {
            background: rgba(1, 193, 212, 0.10);
            color: var(--turquesa-escuro);
        }

        .botao-excel:hover {
            background: rgba(1, 193, 212, 0.18);
        }

        .botao-imprimir {
            background: #F0F4F5;
            color: var(--texto);
        }

        .botao-imprimir:hover {
            background: #E5ECEE;
        }

        /* =====================================================
           CARDS
        ===================================================== */

        .cards {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 18px;
            margin-bottom: 28px;
        }

        .card {
            background: var(--branco);
            border: 1px solid var(--borda);
            border-radius: 14px;
            padding: 22px;
            box-shadow: 0 3px 12px rgba(46, 86, 100, 0.05);
            transition:
                transform 0.2s ease,
                box-shadow 0.2s ease;
        }

        .card:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 22px rgba(46, 86, 100, 0.09);
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
            background: rgba(1, 193, 212, 0.10);
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

        /* =====================================================
           TABELA
        ===================================================== */

        .secao-cabecalho {
            margin-bottom: 18px;
        }

        .secao-cabecalho h3 {
            margin: 0;
            color: var(--azul);
            font-size: 18px;
        }

        .secao-cabecalho p {
            margin: 5px 0 0;
            color: var(--texto-secundario);
            font-size: 12px;
        }

        .tabela-container {
            background: var(--branco);
            border: 1px solid var(--borda);
            border-radius: 14px;
            box-shadow: 0 3px 12px rgba(46, 86, 100, 0.05);
            overflow: hidden;
        }

        .tabela-scroll {
            width: 100%;
            overflow-x: auto;
        }

        table {
            width: 100%;
            min-width: 1000px;
            border-collapse: collapse;
        }

        thead {
            background: var(--azul);
            color: white;
        }

        th {
            padding: 14px 13px;
            text-align: left;
            font-size: 11px;
            font-weight: bold;
            white-space: nowrap;
            border: none;
        }

        td {
            padding: 13px;
            border-bottom: 1px solid #EEF2F3;
            color: var(--texto);
            font-size: 12px;
            vertical-align: middle;
        }

        tbody tr {
            transition: background 0.15s ease;
        }

        tbody tr:hover {
            background: #F7FBFC;
        }

        tbody tr:last-child td {
            border-bottom: none;
        }

        .id {
            color: var(--texto-secundario);
            font-weight: 600;
            width: 60px;
        }

        .funcionario {
            font-weight: 600;
            color: var(--azul);
        }

        .cpf {
            white-space: nowrap;
            color: var(--texto-secundario);
        }

        .chave {
            max-width: 270px;
            word-break: break-all;
            font-family:
                Consolas,
                "Courier New",
                monospace;
            font-size: 11px;
            color: var(--texto-secundario);
        }

        .mensagem {
            max-width: 300px;
            line-height: 1.4;
            color: var(--texto-secundario);
        }

        .data {
            white-space: nowrap;
            color: var(--texto-secundario);
            font-size: 11px;
        }

        /* =====================================================
           STATUS
        ===================================================== */

        .status {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            min-width: 75px;
            padding: 5px 10px;
            border-radius: 999px;
            font-size: 10px;
            font-weight: bold;
            letter-spacing: 0.2px;
        }

        .status-sucesso {
            background: var(--sucesso-fundo);
            color: var(--sucesso);
        }

        .status-erro {
            background: var(--erro-fundo);
            color: var(--erro);
        }

        .status-outro {
            background: #F0F4F5;
            color: var(--texto-secundario);
        }

        /* =====================================================
           VAZIO
        ===================================================== */

        .vazio {
            text-align: center;
            padding: 55px 30px;
            color: var(--texto-secundario);
        }

        .vazio-icone {
            width: 55px;
            height: 55px;
            margin: 0 auto 14px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            background: rgba(1, 193, 212, 0.10);
            color: var(--turquesa-escuro);
            font-size: 23px;
        }

        .vazio strong {
            display: block;
            margin-bottom: 5px;
            color: var(--azul);
            font-size: 14px;
        }

        .vazio span {
            font-size: 12px;
        }

        /* =====================================================
           RODAPÉ TABELA
        ===================================================== */

        .rodape-tabela {
            padding: 15px 20px;
            color: var(--texto-secundario);
            font-size: 11px;
            background: #FBFDFD;
            border-top: 1px solid #EEF2F3;
        }

        .rodape-tabela strong {
            color: var(--azul);
        }

        /* =====================================================
           RODAPÉ
        ===================================================== */

        .rodape {
            padding: 28px 0 5px;
            text-align: center;
            color: #8A989D;
            font-size: 11px;
        }

        /* =====================================================
           RESPONSIVO
        ===================================================== */

        @media (max-width: 1150px) {
            .sidebar {
                width: 225px;
            }

            .principal {
                width: calc(100% - 225px);
                margin-left: 225px;
            }

            .cards {
                grid-template-columns: repeat(2, 1fr);
            }

            .filtros-grid {
                grid-template-columns: repeat(2, 1fr);
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
                padding: 15px 20px;
                gap: 15px;
            }

            .menu-mobile {
                display: flex;
            }

            .usuario-topo {
                display: none;
            }

            .conteudo {
                padding: 20px;
            }

            .cabecalho-pagina {
                padding: 24px;
                align-items: flex-start;
                flex-direction: column;
            }

            .voltar {
                width: 100%;
            }

            .cards {
                grid-template-columns: 1fr;
            }

            .filtros-grid {
                grid-template-columns: 1fr;
            }

            .botoes {
                align-items: stretch;
            }

            .botao {
                flex: 1 1 auto;
            }
        }

        @media (max-width: 450px) {
            .topo {
                padding: 14px 15px;
            }

            .topo-titulo h1 {
                font-size: 16px;
            }

            .topo-titulo p {
                font-size: 11px;
            }

            .conteudo {
                padding: 15px;
            }

            .cabecalho-pagina {
                padding: 21px;
            }

            .cabecalho-pagina h2 {
                font-size: 20px;
            }

            .filtros {
                padding: 18px;
            }

            .card {
                padding: 19px;
            }

            .botoes {
                flex-direction: column;
            }

            .botao {
                width: 100%;
            }
        }

        /* =====================================================
           IMPRESSÃO
        ===================================================== */

        @media print {
            @page {
                size: landscape;
                margin: 10mm;
            }

            body {
                background: white;
            }

            .sidebar {
                display: none !important;
            }

            .principal {
                width: 100%;
                margin-left: 0;
            }

            .topo {
                min-height: auto;
                padding: 10px 0;
                background: white;
                border-bottom: 2px solid var(--azul);
            }

            .topo-direita {
                display: none;
            }

            .menu-mobile {
                display: none !important;
            }

            .conteudo {
                max-width: none;
                padding: 10px 0;
            }

            .cabecalho-pagina {
                background: white;
                border: none;
                border-radius: 0;
                padding: 10px 0;
                margin-bottom: 15px;
            }

            .cabecalho-pagina::after {
                display: none;
            }

            .voltar,
            .filtros,
            .botoes,
            .rodape {
                display: none !important;
            }

            .cards {
                grid-template-columns: repeat(4, 1fr);
                gap: 8px;
            }

            .card {
                box-shadow: none;
                border: 1px solid #ddd;
                padding: 10px;
                border-radius: 8px;
            }

            .card:hover {
                transform: none;
            }

            .card-icone {
                display: none;
            }

            .numero {
                font-size: 20px;
            }

            .secao-cabecalho {
                margin-bottom: 10px;
            }

            .tabela-container {
                box-shadow: none;
                border-radius: 0;
                border: 1px solid #ddd;
                overflow: visible;
            }

            .tabela-scroll {
                overflow: visible;
            }

            table {
                min-width: 0;
                width: 100%;
            }

            th,
            td {
                font-size: 9px;
                padding: 6px;
            }

            .chave {
                max-width: none;
            }

            .mensagem {
                max-width: none;
            }

            .rodape-tabela {
                display: none;
            }

            thead {
                background: var(--azul) !important;
                color: white !important;
                -webkit-print-color-adjust: exact;
                print-color-adjust: exact;
            }

            .status-sucesso {
                background: var(--sucesso-fundo) !important;
                color: var(--sucesso) !important;
                -webkit-print-color-adjust: exact;
                print-color-adjust: exact;
            }

            .status-erro {
                background: var(--erro-fundo) !important;
                color: var(--erro) !important;
                -webkit-print-color-adjust: exact;
                print-color-adjust: exact;
            }
        }
    </style>
</head>

<body>

<div class="layout">

    <!-- =====================================================
         SIDEBAR
    ====================================================== -->

    <aside class="sidebar">

        <div class="sidebar-top">

            <a
                href="{{ route('dashboard') }}"
                class="marca"
            >
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
                Administração
            </div>

            <a
                href="{{ route('dashboard') }}"
                class="menu-item"
            >
                <span class="menu-icone">
                    🏠
                </span>

                <span>
                    Início
                </span>
            </a>

            <a
                href="{{ route('funcionarios.index') }}"
                class="menu-item"
            >
                <span class="menu-icone">
                    👥
                </span>

                <span>
                    Funcionários
                </span>
            </a>

            <a
                href="{{ route('relatorios.index') }}"
                class="menu-item ativo"
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
                    {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                </div>

                <div class="usuario-info">

                    <strong>
                        {{ auth()->user()->name }}
                    </strong>

                    <span>
                        Administrador
                    </span>

                </div>

            </div>

        </div>

    </aside>


    <!-- =====================================================
         ÁREA PRINCIPAL
    ====================================================== -->

    <div class="principal">

        <!-- =================================================
             TOPO
        ================================================== -->

        <header class="topo">

            <div class="topo-titulo">

                <h1>
                    Relatórios
                </h1>

                <p>
                    Gestão e consulta das notas cadastradas
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
                    {{ auth()->user()->name }}
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


        <!-- =================================================
             CONTEÚDO
        ================================================== -->

        <main class="conteudo">

            <!-- =================================================
                 CABEÇALHO
            ================================================== -->

            <section class="cabecalho-pagina">

                <div class="cabecalho-texto">

                    <h2>
                        Relatórios
                    </h2>

                    <p>
                        Consulte, filtre e exporte as notas cadastradas no sistema.
                    </p>

                </div>

                <a
                    href="{{ route('dashboard') }}"
                    class="voltar"
                >
                    ← Voltar ao Dashboard
                </a>

            </section>


            <!-- =================================================
                 FILTROS
            ================================================== -->

            <section class="filtros">

                <div class="filtros-cabecalho">

                    <div class="filtros-icone">
                        🔎
                    </div>

                    <div>

                        <h3>
                            Filtros
                        </h3>

                        <p>
                            Refine os resultados do relatório.
                        </p>

                    </div>

                </div>

                <form
                    method="GET"
                    action="{{ route('relatorios.index') }}"
                >

                    <div class="filtros-grid">

                        <!-- FUNCIONÁRIO -->

                        <div class="campo">

                            <label for="funcionario_id">
                                Funcionário
                            </label>

                            <select
                                name="funcionario_id"
                                id="funcionario_id"
                            >

                                <option value="">
                                    Todos os funcionários
                                </option>

                                @foreach ($funcionarios as $funcionario)

                                    <option
                                        value="{{ $funcionario->id }}"
                                        {{ request('funcionario_id') == $funcionario->id ? 'selected' : '' }}
                                    >
                                        {{ $funcionario->nome ?? $funcionario->name ?? 'Sem nome' }}
                                    </option>

                                @endforeach

                            </select>

                        </div>


                        <!-- DATA INICIAL -->

                        <div class="campo">

                            <label for="data_inicio">
                                Data inicial
                            </label>

                            <input
                                type="date"
                                name="data_inicio"
                                id="data_inicio"
                                value="{{ request('data_inicio') }}"
                            >

                        </div>


                        <!-- DATA FINAL -->

                        <div class="campo">

                            <label for="data_fim">
                                Data final
                            </label>

                            <input
                                type="date"
                                name="data_fim"
                                id="data_fim"
                                value="{{ request('data_fim') }}"
                            >

                        </div>


                        <!-- STATUS -->

                        <div class="campo">

                            <label for="status">
                                Status
                            </label>

                            <select
                                name="status"
                                id="status"
                            >

                                <option
                                    value=""
                                    {{ request('status') == '' ? 'selected' : '' }}
                                >
                                    Todos os status
                                </option>

                                <option
                                    value="sucesso"
                                    {{ request('status') == 'sucesso' ? 'selected' : '' }}
                                >
                                    Sucesso
                                </option>

                                <option
                                    value="erro"
                                    {{ request('status') == 'erro' ? 'selected' : '' }}
                                >
                                    Erro
                                </option>

                            </select>

                        </div>

                    </div>


                    <!-- BOTÕES -->

                    <div class="botoes">

                        <button
                            type="submit"
                            class="botao botao-filtrar"
                        >
                            🔎 Filtrar
                        </button>

                        <a
                            href="{{ route('relatorios.index') }}"
                            class="botao botao-limpar"
                        >
                            ✕ Limpar filtros
                        </a>

                        <a
                            href="{{ route('relatorios.exportar', request()->query()) }}"
                            class="botao botao-excel"
                        >
                            📊 Exportar Excel
                        </a>

                        <button
                            type="button"
                            class="botao botao-imprimir"
                            onclick="window.print()"
                        >
                            🖨️ Imprimir
                        </button>

                    </div>

                </form>

            </section>


            <!-- =================================================
                 INDICADORES
            ================================================== -->

            <section class="cards">

                <!-- TOTAL -->

                <div class="card">

                    <div class="card-topo">

                        <h3>
                            Notas encontradas
                        </h3>

                        <div class="card-icone">
                            📄
                        </div>

                    </div>

                    <div class="numero">
                        {{ $notas->count() }}
                    </div>

                    <div class="card-rodape">
                        Notas conforme os filtros selecionados
                    </div>

                </div>


                <!-- SUCESSO -->

                <div class="card">

                    <div class="card-topo">

                        <h3>
                            Sucesso
                        </h3>

                        <div class="card-icone">
                            ✓
                        </div>

                    </div>

                    <div class="numero">
                        {{ $notas->where('status', 'sucesso')->count() }}
                    </div>

                    <div class="card-rodape">
                        Registros processados com sucesso
                    </div>

                </div>


                <!-- ERROS -->

                <div class="card card-erro">

                    <div class="card-topo">

                        <h3>
                            Erros
                        </h3>

                        <div class="card-icone">
                            !
                        </div>

                    </div>

                    <div class="numero">
                        {{ $notas->where('status', 'erro')->count() }}
                    </div>

                    <div class="card-rodape">
                        Registros que precisam de atenção
                    </div>

                </div>


                <!-- FUNCIONÁRIOS -->

                <div class="card">

                    <div class="card-topo">

                        <h3>
                            Funcionários
                        </h3>

                        <div class="card-icone">
                            👥
                        </div>

                    </div>

                    <div class="numero">
                        {{ $funcionarios->count() }}
                    </div>

                    <div class="card-rodape">
                        Funcionários cadastrados
                    </div>

                </div>

            </section>


            <!-- =================================================
                 TABELA
            ================================================== -->

            <section>

                <div class="secao-cabecalho">

                    <h3>
                        Notas cadastradas
                    </h3>

                    <p>
                        Resultado detalhado dos registros encontrados.
                    </p>

                </div>


                <div class="tabela-container">

                    @if ($notas->count() > 0)

                        <div class="tabela-scroll">

                            <table>

                                <thead>

                                    <tr>

                                        <th>
                                            ID
                                        </th>

                                        <th>
                                            Funcionário
                                        </th>

                                        <th>
                                            CPF
                                        </th>

                                        <th>
                                            Chave NFP
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

                                    @foreach ($notas as $nota)

                                        <tr>

                                            <td class="id">
                                                {{ $nota->id }}
                                            </td>

                                            <td class="funcionario">
                                                {{ $nota->funcionario?->nome
                                                    ?? $nota->funcionario?->name
                                                    ?? 'Sem nome' }}
                                            </td>

                                            <td class="cpf">
                                                {{ $nota->funcionario?->cpf
                                                    ?? 'Não informado' }}
                                            </td>

                                            <td class="chave">
                                                {{ $nota->chave }}
                                            </td>

                                            <td>

                                                @if ($nota->status === 'sucesso')

                                                    <span class="status status-sucesso">
                                                        SUCESSO
                                                    </span>

                                                @elseif ($nota->status === 'erro')

                                                    <span class="status status-erro">
                                                        ERRO
                                                    </span>

                                                @else

                                                    <span class="status status-outro">
                                                        {{ strtoupper($nota->status ?? 'NÃO INFORMADO') }}
                                                    </span>

                                                @endif

                                            </td>

                                            <td class="mensagem">
                                                {{ $nota->mensagem ?? '-' }}
                                            </td>

                                            <td class="data">

                                                @if ($nota->data_cadastro)

                                                    {{ \Carbon\Carbon::parse($nota->data_cadastro)->format('d/m/Y H:i:s') }}

                                                @else

                                                    -

                                                @endif

                                            </td>

                                        </tr>

                                    @endforeach

                                </tbody>

                            </table>

                        </div>


                        <div class="rodape-tabela">

                            Exibindo

                            <strong>
                                {{ $notas->count() }}
                            </strong>

                            nota(s) no relatório.

                        </div>

                    @else

                        <div class="vazio">

                            <div class="vazio-icone">
                                🔎
                            </div>

                            <strong>
                                Nenhuma nota encontrada
                            </strong>

                            <span>
                                Não existem registros para os filtros selecionados.
                            </span>

                        </div>

                    @endif

                </div>

            </section>


            <!-- =================================================
                 RODAPÉ
            ================================================== -->

            <div class="rodape">
                CSTL — Casa Santa Teresinha
            </div>

        </main>

    </div>

</div>

</body>
</html>