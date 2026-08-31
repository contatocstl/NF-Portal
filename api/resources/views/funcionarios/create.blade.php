<!DOCTYPE html>
<html lang="pt-BR">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>CSTL - Novo Voluntário</title>

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
            --borda: #D5E0E3;
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

            background: var(--azul);
            color: white;

            display: flex;
            flex-direction: column;

            z-index: 100;
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
            max-width: 1100px;

            margin: 0 auto;

            padding: 35px;
        }

        /* =====================================================
           CABEÇALHO
        ===================================================== */

        .cabecalho {
            margin-bottom: 25px;
        }

        .cabecalho h2 {
            margin: 0;

            color: var(--azul);

            font-size: 25px;
        }

        .cabecalho p {
            margin: 7px 0 0;

            color: var(--texto-secundario);

            font-size: 13px;
        }

        /* =====================================================
           FORMULÁRIO
        ===================================================== */

        .formulario {
            background: var(--branco);

            border:
                1px solid var(--borda);

            border-radius: 15px;

            box-shadow:
                0 4px 16px
                rgba(46, 86, 100, 0.06);

            overflow: hidden;
        }

        .formulario-topo {
            padding: 21px 25px;

            border-bottom:
                1px solid var(--borda);

            background: #FBFDFD;
        }

        .formulario-topo h3 {
            margin: 0;

            color: var(--azul);

            font-size: 16px;
        }

        .formulario-topo p {
            margin: 5px 0 0;

            color: var(--texto-secundario);

            font-size: 12px;
        }

        .formulario-corpo {
            padding: 25px;
        }

        .grid {
            display: grid;

            grid-template-columns:
                repeat(2, minmax(0, 1fr));

            gap: 20px;
        }

        .campo {
            min-width: 0;
        }

        .campo-completo {
            grid-column: 1 / -1;
        }

        label {
            display: block;

            margin-bottom: 7px;

            color: var(--azul);

            font-size: 13px;
            font-weight: 700;
        }

        .obrigatorio {
            color: var(--rosa);

            margin-left: 2px;
        }

        input {
            display: block;

            width: 100%;

            padding: 12px 13px;

            border:
                1px solid var(--borda);

            border-radius: 9px;

            background: white;
            color: var(--texto);

            font-family: Arial, Helvetica, sans-serif;
            font-size: 14px;

            transition:
                border-color 0.2s ease,
                box-shadow 0.2s ease,
                background 0.2s ease;
        }

        input::placeholder {
            color: #9AA8AD;
        }

        input:hover {
            border-color: #9AAFB5;
        }

        input:focus {
            outline: none;

            border-color: var(--turquesa);

            background: white;

            box-shadow:
                0 0 0 3px
                rgba(1, 193, 212, 0.12);
        }

        .ajuda {
            display: block;

            margin-top: 6px;

            color: #8A989D;

            font-size: 11px;
        }

        /* =====================================================
           ERROS
        ===================================================== */

        .erros {
            margin-bottom: 22px;

            padding: 14px 16px;

            background: var(--erro-fundo);
            color: var(--erro);

            border:
                1px solid
                rgba(252, 155, 180, 0.35);

            border-left:
                4px solid var(--rosa);

            border-radius: 9px;

            font-size: 13px;
            line-height: 1.5;
        }

        .erros strong {
            color: #922038;
        }

        .erros ul {
            margin: 7px 0 0;

            padding-left: 20px;
        }

        /* =====================================================
           BOTÕES
        ===================================================== */

        .botoes {
            display: flex;

            justify-content: flex-end;
            align-items: center;

            gap: 10px;

            margin-top: 28px;

            padding-top: 22px;

            border-top:
                1px solid #EDF1F2;
        }

        .botao-cancelar,
        .botao-cadastrar {
            display: inline-flex;

            align-items: center;
            justify-content: center;

            min-height: 43px;

            padding: 11px 18px;

            border-radius: 9px;

            font-size: 13px;
            font-weight: bold;

            text-decoration: none;

            cursor: pointer;

            transition:
                background 0.2s ease,
                transform 0.15s ease,
                box-shadow 0.2s ease;
        }

        .botao-cancelar {
            background: #F2F5F6;

            color: #56666C;

            border:
                1px solid #E0E7E9;
        }

        .botao-cancelar:hover {
            background: #E8EEF0;
        }

        .botao-cadastrar {
            border: none;

            background: var(--azul);
            color: white;

            box-shadow:
                0 4px 10px
                rgba(46, 86, 100, 0.15);
        }

        .botao-cadastrar:hover {
            background: var(--azul-escuro);

            transform: translateY(-1px);

            box-shadow:
                0 6px 14px
                rgba(46, 86, 100, 0.20);
        }

        .botao-cadastrar:active {
            transform: translateY(0);
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
           MOBILE
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

            .grid {
                grid-template-columns: 1fr;
            }

            .campo-completo {
                grid-column: auto;
            }
        }

        @media (max-width: 500px) {

            .topo {
                padding: 14px 15px;
            }

            .conteudo {
                padding: 15px;
            }

            .cabecalho h2 {
                font-size: 21px;
            }

            .formulario-corpo {
                padding: 20px;
            }

            .formulario-topo {
                padding: 18px 20px;
            }

            .botoes {
                flex-direction: column-reverse;
                align-items: stretch;
            }

            .botao-cancelar,
            .botao-cadastrar {
                width: 100%;
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
                    Novo voluntário
                </h1>

                <p>
                    Cadastro de acesso ao sistema CSTL
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

            <div class="cabecalho">

                <h2>
                    Novo Voluntário
                </h2>

                <p>
                    Preencha os dados abaixo para cadastrar
                    um novo voluntário.
                </p>

            </div>

            <!-- =================================================
                 FORMULÁRIO
            ================================================== -->

            <div class="formulario">

                <div class="formulario-topo">

                    <h3>
                        Dados do voluntário
                    </h3>

                    <p>
                        Todos os campos marcados com
                        <strong>*</strong> são obrigatórios.
                    </p>

                </div>

                <div class="formulario-corpo">

                    @if ($errors->any())

                        <div class="erros">

                            <strong>
                                Corrija os seguintes erros:
                            </strong>

                            <ul>

                                @foreach ($errors->all() as $erro)

                                    <li>
                                        {{ $erro }}
                                    </li>

                                @endforeach

                            </ul>

                        </div>

                    @endif

                    <form
                        method="POST"
                        action="{{ route('funcionarios.store') }}"
                    >

                        @csrf

                        <div class="grid">

                            <!-- NOME -->

                            <div class="campo campo-completo">

                                <label for="nome">

                                    Nome completo

                                    <span class="obrigatorio">
                                        *
                                    </span>

                                </label>

                                <input
                                    type="text"
                                    id="nome"
                                    name="nome"
                                    value="{{ old('nome') }}"
                                    placeholder="Digite o nome completo"
                                    autocomplete="name"
                                    required
                                >

                            </div>

                            <!-- CPF -->

                            <div class="campo">

                                <label for="cpf">

                                    CPF

                                    <span class="obrigatorio">
                                        *
                                    </span>

                                </label>

                                <input
                                    type="text"
                                    id="cpf"
                                    name="cpf"
                                    maxlength="11"
                                    value="{{ old('cpf') }}"
                                    placeholder="Somente números"
                                    inputmode="numeric"
                                    required
                                >

                                <span class="ajuda">
                                    Digite apenas os 11 números do CPF.
                                </span>

                            </div>

                            <!-- EMAIL -->

                            <div class="campo">

                                <label for="email">

                                    E-mail de acesso

                                    <span class="obrigatorio">
                                        *
                                    </span>

                                </label>

                                <input
                                    type="email"
                                    id="email"
                                    name="email"
                                    value="{{ old('email') }}"
                                    placeholder="exemplo@empresa.com"
                                    autocomplete="email"
                                    required
                                >

                            </div>

                            <!-- SENHA -->

                            <div class="campo">

                                <label for="password">

                                    Senha

                                    <span class="obrigatorio">
                                        *
                                    </span>

                                </label>

                                <input
                                    type="password"
                                    id="password"
                                    name="password"
                                    placeholder="Digite uma senha"
                                    autocomplete="new-password"
                                    required
                                >

                                <span class="ajuda">
                                    A senha deve possuir pelo menos 6 caracteres.
                                </span>

                            </div>

                            <!-- CONFIRMAR SENHA -->

                            <div class="campo">

                                <label for="password_confirmation">

                                    Confirmar senha

                                    <span class="obrigatorio">
                                        *
                                    </span>

                                </label>

                                <input
                                    type="password"
                                    id="password_confirmation"
                                    name="password_confirmation"
                                    placeholder="Digite a senha novamente"
                                    autocomplete="new-password"
                                    required
                                >

                            </div>

                        </div>

                        <!-- BOTÕES -->

                        <div class="botoes">

                            <a
                                href="{{ route('funcionarios.index') }}"
                                class="botao-cancelar"
                            >
                                ← Voltar
                            </a>

                            <button
                                type="submit"
                                class="botao-cadastrar"
                            >
                                ✓ Cadastrar voluntário
                            </button>

                        </div>

                    </form>

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