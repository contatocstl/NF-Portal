<!DOCTYPE html>
<html lang="pt-BR">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>CSTL - Painel Administrativo</title>

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


        .layout {
            min-height: 100vh;

            display: flex;
        }


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

            color:
                rgba(255, 255, 255, 0.72);

            font-size: 10px;

            text-transform: uppercase;

            letter-spacing: 0.7px;
        }


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


        .principal {
            width: calc(100% - 255px);

            margin-left: 255px;

            min-height: 100vh;
        }


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


        .conteudo {
            width: 100%;

            max-width: 1400px;

            margin: 0 auto;

            padding: 35px;
        }


        .boas-vindas {
            margin-bottom: 28px;

            background:
                linear-gradient(
                    135deg,
                    #FFFFFF 0%,
                    #F5FBFC 100%
                );

            border:
                1px solid var(--borda);

            border-radius: 16px;

            padding: 28px 30px;

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

            background:
                rgba(1, 193, 212, 0.08);
        }


        .boas-vindas h2 {
            margin: 0 0 7px;

            color: var(--azul);

            font-size: 24px;
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


        .cards {
            display: grid;

            grid-template-columns:
                repeat(4, 1fr);

            gap: 18px;

            margin-bottom: 28px;
        }


        .card {
            background: var(--branco);

            border:
                1px solid var(--borda);

            border-radius: 14px;

            padding: 22px;

            box-shadow:
                0 3px 12px
                rgba(46, 86, 100, 0.05);

            transition:
                transform 0.2s ease,
                box-shadow 0.2s ease;
        }


        .card:hover {
            transform: translateY(-2px);

            box-shadow:
                0 8px 22px
                rgba(46, 86, 100, 0.09);
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

            background:
                rgba(1, 193, 212, 0.10);

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


        .secao {
            margin-top: 5px;
        }


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


        .menu-acoes {
            display: grid;

            grid-template-columns:
                repeat(2, 1fr);

            gap: 18px;
        }


        .menu-card {
            display: flex;

            align-items: center;

            gap: 17px;

            padding: 22px;

            background: var(--branco);

            border:
                1px solid var(--borda);

            border-radius: 14px;

            text-decoration: none;

            color: var(--texto);

            box-shadow:
                0 3px 12px
                rgba(46, 86, 100, 0.05);

            transition:
                transform 0.2s ease,
                box-shadow 0.2s ease,
                border-color 0.2s ease;
        }


        .menu-card:hover {
            transform: translateY(-2px);

            border-color:
                rgba(1, 193, 212, 0.45);

            box-shadow:
                0 8px 22px
                rgba(46, 86, 100, 0.09);
        }


        .menu-card-icone {
            width: 50px;
            height: 50px;

            flex-shrink: 0;

            display: flex;

            align-items: center;
            justify-content: center;

            border-radius: 12px;

            background:
                rgba(1, 193, 212, 0.10);

            color: var(--turquesa-escuro);

            font-size: 21px;
        }


        .menu-card-texto {
            flex: 1;
        }


        .menu-card-texto strong {
            display: block;

            color: var(--azul);

            font-size: 15px;
        }


        .menu-card-texto span {
            display: block;

            margin-top: 5px;

            color: var(--texto-secundario);

            font-size: 12px;

            line-height: 1.4;
        }


        .menu-card-seta {
            color: var(--turquesa);

            font-size: 20px;
        }


        .rodape {
            padding: 28px 0 5px;

            text-align: center;

            color: #8A989D;

            font-size: 11px;
        }


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


        @media (max-width: 1150px) {

            .sidebar {
                width: 225px;
            }

            .principal {
                width: calc(100% - 225px);

                margin-left: 225px;
            }

            .cards {
                grid-template-columns:
                    repeat(2, 1fr);
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

            .cards {
                grid-template-columns: 1fr;
            }

            .menu-acoes {
                grid-template-columns: 1fr;
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

            .boas-vindas {
                padding: 22px;
            }

            .boas-vindas h2 {
                font-size: 20px;
            }

            .card {
                padding: 19px;
            }

            .menu-card {
                padding: 18px;
            }

        }

    </style>

</head>


<body>


<div class="layout">


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
                href="{{ route('funcionarios.index') }}"
                class="menu-item"
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


    <div class="principal">


        <header class="topo">


            <div class="topo-titulo">

                <h1>
                    Painel Administrativo
                </h1>

                <p>
                    Gestão da Casa Santa Teresinha
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


            <section class="boas-vindas">


                <h2>

                    Olá,
                    <span class="destaque">
                        {{ auth()->user()->name }}
                    </span>!

                </h2>


                <p>
                    Bem-vindo ao painel administrativo da
                    Casa Santa Teresinha.
                </p>


            </section>


            <section class="cards">


                <div class="card">


                    <div class="card-topo">

                        <h3>
                            Total de notas
                        </h3>

                        <div class="card-icone">
                            📄
                        </div>

                    </div>


                    <div class="numero">
                        {{ \App\Models\Nota::count() }}
                    </div>


                    <div class="card-rodape">
                        Notas cadastradas no sistema
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
                        {{ \App\Models\Nota::whereDate('data_cadastro', today())->count() }}
                    </div>


                    <div class="card-rodape">
                        Registros realizados hoje
                    </div>


                </div>


                <div class="card">


                    <div class="card-topo">

                        <h3>
                            Voluntários
                        </h3>

                        <div class="card-icone">
                            👥
                        </div>

                    </div>


                    <div class="numero">
                        {{ \App\Models\Funcionario::count() }}
                    </div>


                    <div class="card-rodape">
                        Voluntários cadastrados
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
                        {{ \App\Models\Nota::where('status', 'erro')->count() }}
                    </div>


                    <div class="card-rodape">
                        Registros que precisam de atenção
                    </div>


                </div>


            </section>


            <section class="secao">


                <div class="secao-cabecalho">

                    <h3>
                        Acessos rápidos
                    </h3>

                    <p>
                        Acesse rapidamente as principais áreas
                        administrativas do sistema.
                    </p>

                </div>


                <div class="menu-acoes">


                    <a
                        href="{{ route('funcionarios.index') }}"
                        class="menu-card"
                    >

                        <div class="menu-card-icone">
                            👥
                        </div>


                        <div class="menu-card-texto">

                            <strong>
                                Voluntários
                            </strong>

                            <span>
                                Cadastre, edite e gerencie
                                os voluntários da instituição.
                            </span>

                        </div>


                        <div class="menu-card-seta">
                            →
                        </div>

                    </a>


                    <a
                        href="{{ route('relatorios.index') }}"
                        class="menu-card"
                    >

                        <div class="menu-card-icone">
                            📊
                        </div>


                        <div class="menu-card-texto">

                            <strong>
                                Relatórios
                            </strong>

                            <span>
                                Consulte e exporte os relatórios
                                das notas cadastradas.
                            </span>

                        </div>


                        <div class="menu-card-seta">
                            →
                        </div>

                    </a>


                </div>


            </section>


            <div class="rodape">

                CSTL — Casa Santa Teresinha

            </div>


        </main>


    </div>


</div>


</body>

</html>