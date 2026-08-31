<!DOCTYPE html>
<html lang="pt-BR">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>CSTL - Voluntários</title>

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

            border-bottom:
                1px solid
                rgba(255, 255, 255, 0.12);
        }

        .marca {
            display: flex;
            align-items: center;
            gap: 12px;

            color: white;
            text-decoration: none;
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

            color:
                rgba(255, 255, 255, 0.72);

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

            color:
                rgba(255, 255, 255, 0.5);

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

            color:
                rgba(255, 255, 255, 0.82);

            text-decoration: none;

            font-size: 14px;

            transition:
                background 0.2s ease,
                color 0.2s ease;
        }

        .menu-item:hover {
            background:
                rgba(255, 255, 255, 0.09);

            color: white;
        }

        .menu-item.ativo {
            background:
                rgba(1, 193, 212, 0.18);

            color: white;
        }

        .menu-icone {
            width: 30px;
            height: 30px;

            display: flex;
            align-items: center;
            justify-content: center;

            border-radius: 7px;

            background:
                rgba(255, 255, 255, 0.08);

            font-size: 15px;
        }

        .menu-item.ativo .menu-icone {
            background: var(--turquesa);
        }

        /* =====================================================
           USUÁRIO
        ===================================================== */

        .sidebar-footer {
            margin-top: auto;

            padding: 18px;

            border-top:
                1px solid
                rgba(255, 255, 255, 0.10);
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

            max-width: 155px;

            overflow: hidden;

            text-overflow: ellipsis;

            white-space: nowrap;

            font-size: 13px;
        }

        .usuario-info span {
            display: block;

            margin-top: 3px;

            color:
                rgba(255, 255, 255, 0.58);

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

            border-bottom:
                1px solid var(--borda);

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
           CONTEÚDO
        ===================================================== */

        .conteudo {
            width: 100%;

            max-width: 1400px;

            margin: 0 auto;

            padding: 35px;
        }

        /* =====================================================
           CABEÇALHO
        ===================================================== */

        .cabecalho {
            display: flex;

            justify-content: space-between;

            align-items: center;

            gap: 20px;

            margin-bottom: 25px;
        }

        .titulo-pagina h2 {
            margin: 0;

            color: var(--azul);

            font-size: 25px;
        }

        .titulo-pagina p {
            margin: 6px 0 0;

            color: var(--texto-secundario);

            font-size: 13px;
        }

        /* =====================================================
           BOTÃO NOVO
        ===================================================== */

        .botao {
            display: inline-flex;

            align-items: center;

            justify-content: center;

            gap: 8px;

            padding: 12px 18px;

            border-radius: 9px;

            background: var(--azul);

            color: white;

            text-decoration: none;

            font-size: 14px;

            font-weight: bold;

            box-shadow:
                0 4px 10px
                rgba(46, 86, 100, 0.15);

            transition:
                background 0.2s ease,
                transform 0.15s ease,
                box-shadow 0.2s ease;
        }

        .botao:hover {
            background: var(--azul-escuro);

            transform: translateY(-1px);

            box-shadow:
                0 6px 14px
                rgba(46, 86, 100, 0.20);
        }

        /* =====================================================
           MENSAGEM DE SUCESSO
        ===================================================== */

        .sucesso {
            display: flex;

            align-items: center;

            gap: 10px;

            background: var(--sucesso-fundo);

            color: var(--sucesso);

            border:
                1px solid
                #BBE8C8;

            padding: 13px 16px;

            border-radius: 9px;

            margin-bottom: 20px;

            font-size: 13px;

            font-weight: 600;
        }

        .sucesso-icone {
            width: 24px;
            height: 24px;

            display: flex;

            align-items: center;

            justify-content: center;

            border-radius: 50%;

            background: white;

            font-size: 13px;
        }

        /* =====================================================
           TABELA
        ===================================================== */

        .tabela-container {
            background: var(--branco);

            border:
                1px solid var(--borda);

            border-radius: 15px;

            overflow: hidden;

            box-shadow:
                0 4px 16px
                rgba(46, 86, 100, 0.06);
        }

        .tabela-topo {
            padding: 20px 22px;

            border-bottom:
                1px solid var(--borda);

            display: flex;

            justify-content: space-between;

            align-items: center;
        }

        .tabela-topo h3 {
            margin: 0;

            color: var(--azul);

            font-size: 16px;
        }

        .tabela-topo span {
            color: var(--texto-secundario);

            font-size: 12px;
        }

        .tabela-scroll {
            overflow-x: auto;
        }

        table {
            width: 100%;

            min-width: 800px;

            border-collapse: collapse;
        }

        th,
        td {
            padding: 15px 18px;

            text-align: left;

            border-bottom:
                1px solid #EDF1F2;
        }

        th {
            background: #F8FBFC;

            color: #617178;

            font-size: 11px;

            font-weight: 700;

            text-transform: uppercase;

            letter-spacing: 0.5px;
        }

        td {
            color: var(--texto);

            font-size: 13px;
        }

        tbody tr {
            transition:
                background 0.15s ease;
        }

        tbody tr:hover {
            background: #F8FCFD;
        }

        tbody tr:last-child td {
            border-bottom: none;
        }

        .nome-funcionario {
            display: flex;

            align-items: center;

            gap: 11px;

            font-weight: 600;
        }

        .avatar-tabela {
            width: 36px;
            height: 36px;

            flex-shrink: 0;

            display: flex;

            align-items: center;

            justify-content: center;

            border-radius: 50%;

            background:
                rgba(1, 193, 212, 0.10);

            color: var(--turquesa-escuro);

            font-size: 12px;

            font-weight: bold;
        }

        .cpf {
            font-family: monospace;

            color: #56666C;

            font-size: 12px;
        }

        .email {
            color: #56666C;
        }

        /* =====================================================
           STATUS
        ===================================================== */

        .status {
            display: inline-flex;

            align-items: center;

            gap: 6px;

            padding: 6px 10px;

            border-radius: 20px;

            font-size: 11px;

            font-weight: bold;
        }

        .status::before {
            content: "";

            width: 6px;
            height: 6px;

            border-radius: 50%;
        }

        .ativo {
            background: var(--sucesso-fundo);

            color: var(--sucesso);
        }

        .ativo::before {
            background: #22C55E;
        }

        .inativo {
            background: var(--erro-fundo);

            color: var(--erro);
        }

        .inativo::before {
            background: var(--rosa);
        }

        /* =====================================================
           AÇÕES
        ===================================================== */

        .acoes {
            display: flex;

            align-items: center;

            gap: 7px;

            flex-wrap: wrap;
        }

        .botao-editar,
        .botao-excluir {
            display: inline-flex;

            align-items: center;

            justify-content: center;

            gap: 5px;

            padding: 7px 11px;

            border-radius: 7px;

            font-size: 11px;

            font-weight: bold;

            cursor: pointer;

            transition: 0.2s ease;
        }

        .botao-editar {
            background:
                rgba(1, 193, 212, 0.10);

            color: var(--turquesa-escuro);

            text-decoration: none;

            border:
                1px solid
                rgba(1, 193, 212, 0.18);
        }

        .botao-editar:hover {
            background:
                rgba(1, 193, 212, 0.17);
        }

        .botao-excluir {
            background: var(--erro-fundo);

            color: var(--erro);

            border:
                1px solid
                rgba(252, 155, 180, 0.35);
        }

        .botao-excluir:hover {
            background: #FFE1E8;
        }

        /* =====================================================
           VAZIO
        ===================================================== */

        .vazio {
            padding: 55px 30px;

            text-align: center;

            color: var(--texto-secundario);
        }

        .vazio-icone {
            width: 55px;
            height: 55px;

            margin: 0 auto 12px;

            display: flex;

            align-items: center;

            justify-content: center;

            border-radius: 50%;

            background:
                rgba(1, 193, 212, 0.08);

            color: var(--turquesa-escuro);

            font-size: 22px;
        }

        .vazio strong {
            display: block;

            color: var(--azul);

            margin-bottom: 5px;

            font-size: 14px;
        }

        .vazio span {
            font-size: 12px;
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
           RESPONSIVO
        ===================================================== */

        @media (max-width: 900px) {

            .sidebar {
                width: 225px;
            }

            .principal {
                width: calc(100% - 225px);

                margin-left: 225px;
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

            .cabecalho {
                flex-direction: column;

                align-items: stretch;

                gap: 15px;
            }

            .botao {
                width: 100%;
            }
        }

        @media (max-width: 500px) {

            .conteudo {
                padding: 15px;
            }

            .topo {
                padding: 14px 15px;
            }

            .titulo-pagina h2 {
                font-size: 21px;
            }

            .tabela-topo {
                padding: 17px;
            }

            th,
            td {
                padding: 13px;
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

                    <strong>
                        CSTL
                    </strong>

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
                class="menu-item ativo"
            >

                <span class="menu-icone">
                    👥
                </span>

                <span>
                    Voluntários
                </span>

            </a>


            <a
                href="{{ route('relatorios.index') }}"
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
         PRINCIPAL
    ====================================================== -->

    <div class="principal">


        <header class="topo">

            <div class="topo-titulo">

                <h1>
                    Voluntários
                </h1>

                <p>
                    Gerenciamento de voluntários da CSTL
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


        <main class="conteudo">


            <!-- =================================================
                 CABEÇALHO
            ================================================== -->

            <div class="cabecalho">

                <div class="titulo-pagina">

                    <h2>
                        Voluntários
                    </h2>

                    <p>
                        Consulte e gerencie os voluntários
                        cadastrados no sistema.
                    </p>

                </div>


                <a
                    href="{{ route('funcionarios.create') }}"
                    class="botao"
                >
                    + Novo voluntário
                </a>

            </div>


            <!-- =================================================
                 MENSAGEM
            ================================================== -->

            @if (session('sucesso'))

                <div class="sucesso">

                    <span class="sucesso-icone">
                        ✓
                    </span>

                    <span>
                        {{ session('sucesso') }}
                    </span>

                </div>

            @endif


            <!-- =================================================
                 TABELA
            ================================================== -->

            <div class="tabela-container">


                <div class="tabela-topo">

                    <h3>
                        Lista de voluntários
                    </h3>

                    <span>

                        {{ $funcionarios->count() }}

                        {{ $funcionarios->count() === 1 ? 'voluntário' : 'voluntários' }}

                    </span>

                </div>


                <div class="tabela-scroll">


                    <table>

                        <thead>

                            <tr>

                                <th>
                                    Voluntário
                                </th>

                                <th>
                                    CPF
                                </th>

                                <th>
                                    E-mail
                                </th>

                                <th>
                                    Status
                                </th>

                                <th>
                                    Ações
                                </th>

                            </tr>

                        </thead>


                        <tbody>


                            @forelse ($funcionarios as $funcionario)


                                <tr>


                                    <td>

                                        <div class="nome-funcionario">

                                            <div class="avatar-tabela">

                                                {{ strtoupper(substr($funcionario->nome ?? 'S', 0, 1)) }}

                                            </div>


                                            <span>

                                                {{ $funcionario->nome ?? 'Sem nome' }}

                                            </span>

                                        </div>

                                    </td>


                                    <td>

                                        <span class="cpf">

                                            {{ $funcionario->cpf }}

                                        </span>

                                    </td>


                                    <td>

                                        <span class="email">

                                            {{ $funcionario->user?->email ?? '-' }}

                                        </span>

                                    </td>


                                    <td>

                                        @if ($funcionario->ativo)

                                            <span class="status ativo">
                                                Ativo
                                            </span>

                                        @else

                                            <span class="status inativo">
                                                Inativo
                                            </span>

                                        @endif

                                    </td>


                                    <td>

                                        <div class="acoes">


                                            <a
                                                href="{{ route('funcionarios.edit', $funcionario) }}"
                                                class="botao-editar"
                                            >
                                                ✏️ Editar
                                            </a>


                                            <form
                                                method="POST"
                                                action="{{ route('funcionarios.destroy', $funcionario) }}"
                                                onsubmit="return confirm('Tem certeza que deseja excluir este voluntário?');"
                                                style="display: inline;"
                                            >

                                                @csrf

                                                @method('DELETE')


                                                <button
                                                    type="submit"
                                                    class="botao-excluir"
                                                >
                                                    🗑️ Excluir
                                                </button>

                                            </form>


                                        </div>

                                    </td>


                                </tr>


                            @empty


                                <tr>

                                    <td
                                        colspan="5"
                                        class="vazio"
                                    >

                                        <div class="vazio-icone">
                                            👥
                                        </div>


                                        <strong>
                                            Nenhum voluntário cadastrado
                                        </strong>


                                        <span>
                                            Cadastre o primeiro voluntário
                                            usando o botão acima.
                                        </span>

                                    </td>

                                </tr>


                            @endforelse


                        </tbody>

                    </table>

                </div>

            </div>


            <div class="rodape">

                CSTL — Casa Santa Teresinha

            </div>


        </main>

    </div>

</div>

</body>

</html>