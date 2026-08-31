<!DOCTYPE html>
<html lang="pt-BR">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>CSTL - Editar Usuário</title>

    <style>

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Arial, Helvetica, sans-serif;
            background:
                linear-gradient(
                    135deg,
                    #eef8fa 0%,
                    #f7fbfc 50%,
                    #eaf5f7 100%
                );
            color: #263b42;
            min-height: 100vh;
        }

        /* =========================
           TOPO
        ========================= */

        .topo {
            background: #2E5664;
            color: white;
            padding: 18px 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 3px 12px rgba(46, 86, 100, 0.15);
        }

        .topo h1 {
            margin: 0;
            font-size: 22px;
            letter-spacing: 0.3px;
        }

        .voltar-topo {
            color: white;
            text-decoration: none;
            font-size: 14px;
            font-weight: 600;
            padding: 8px 12px;
            border-radius: 7px;
            transition: 0.2s ease;
        }

        .voltar-topo:hover {
            background: rgba(255, 255, 255, 0.12);
        }

        /* =========================
           CONTEÚDO
        ========================= */

        .conteudo {
            width: 100%;
            max-width: 850px;
            margin: auto;
            padding: 35px 25px 50px;
        }

        .cabecalho {
            margin-bottom: 25px;
        }

        .cabecalho h2 {
            margin: 0 0 7px;
            color: #2E5664;
            font-size: 26px;
        }

        .cabecalho p {
            margin: 0;
            color: #6b7280;
            font-size: 14px;
        }

        /* =========================
           ERROS
        ========================= */

        .erros {
            background: #fff4f6;
            color: #a61b35;
            padding: 14px 16px;
            border-left: 4px solid #FC9BB4;
            border-radius: 9px;
            margin-bottom: 22px;
            font-size: 14px;
            line-height: 1.5;
        }

        .erros strong {
            color: #922038;
        }

        .erros ul {
            margin: 7px 0 0;
            padding-left: 20px;
        }

        /* =========================
           FORMULÁRIO
        ========================= */

        .formulario {
            background: #ffffff;
            padding: 32px;
            border-radius: 16px;
            box-shadow:
                0 15px 40px rgba(46, 86, 100, 0.10),
                0 3px 10px rgba(46, 86, 100, 0.05);
            border: 1px solid rgba(46, 86, 100, 0.07);
        }

        .campo {
            margin-bottom: 20px;
        }

        .campo label {
            display: block;
            margin-bottom: 7px;
            color: #2E5664;
            font-size: 14px;
            font-weight: 700;
        }

        .campo input,
        .campo select {
            width: 100%;
            height: 44px;
            padding: 9px 13px;
            border: 1px solid #cbd8dc;
            border-radius: 9px;
            background: #ffffff;
            color: #263b42;
            font-size: 14px;
            transition:
                border-color 0.2s ease,
                box-shadow 0.2s ease,
                background 0.2s ease;
        }

        .campo input:hover,
        .campo select:hover {
            border-color: #9aafb5;
        }

        .campo input:focus,
        .campo select:focus {
            outline: none;
            border-color: #01C1D4;
            box-shadow:
                0 0 0 3px rgba(1, 193, 212, 0.12);
        }

        .campo input::placeholder {
            color: #9aa8ad;
        }

        .ajuda {
            margin-top: 7px;
            color: #7b898e;
            font-size: 12px;
            line-height: 1.5;
        }

        .erro {
            margin-top: 6px;
            color: #b4233c;
            font-size: 13px;
        }

        /* =========================
           SEPARADORES
        ========================= */

        .separador {
            margin: 28px 0;
            border: 0;
            border-top: 1px solid #e1eaed;
        }

        .subtitulo {
            margin: 0 0 18px;
            color: #2E5664;
            font-size: 18px;
        }

        /* =========================
           INFORMAÇÃO DO PERFIL
        ========================= */

        .perfil-info {
            margin-top: 9px;
            padding: 13px 15px;
            border-radius: 9px;
            background: #eef9fb;
            border: 1px solid #d4f0f3;
            color: #35606b;
            font-size: 13px;
            line-height: 1.6;
        }

        .perfil-info strong {
            color: #2E5664;
        }

        /* =========================
           STATUS
        ========================= */

        .status {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .status input[type="checkbox"] {
            width: 18px;
            height: 18px;
            margin: 0;
            accent-color: #01AFC2;
            cursor: pointer;
        }

        .status label {
            margin: 0;
            color: #2E5664;
            font-weight: 600;
            cursor: pointer;
        }

        /* =========================
           BOTÕES
        ========================= */

        .botoes {
            display: flex;
            gap: 10px;
            margin-top: 28px;
            flex-wrap: wrap;
        }

        .botao {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            border: none;
            border-radius: 9px;
            padding: 12px 19px;
            font-size: 14px;
            font-weight: 700;
            cursor: pointer;
            text-decoration: none;
            transition:
                background 0.2s ease,
                transform 0.15s ease,
                box-shadow 0.2s ease;
        }

        .botao-salvar {
            background: #2E5664;
            color: #ffffff;
            box-shadow:
                0 5px 12px rgba(46, 86, 100, 0.18);
        }

        .botao-salvar:hover {
            background: #244653;
            box-shadow:
                0 7px 16px rgba(46, 86, 100, 0.22);
        }

        .botao-salvar:active {
            transform: translateY(1px);
        }

        .botao-cancelar {
            background: #e7eef0;
            color: #36525b;
        }

        .botao-cancelar:hover {
            background: #d9e4e7;
        }

        /* =========================
           RESPONSIVO
        ========================= */

        @media (max-width: 700px) {

            .topo {
                padding: 16px 20px;
                gap: 12px;
            }

            .topo h1 {
                font-size: 19px;
            }

            .conteudo {
                padding: 25px 18px 40px;
            }

            .cabecalho h2 {
                font-size: 23px;
            }

            .formulario {
                padding: 23px 20px;
                border-radius: 13px;
            }

            .botoes {
                flex-direction: column;
            }

            .botao {
                width: 100%;
            }
        }

        @media (max-width: 480px) {

            .topo {
                flex-direction: column;
                align-items: flex-start;
            }

            .voltar-topo {
                padding-left: 0;
            }

            .conteudo {
                padding: 20px 14px 35px;
            }
        }

    </style>

</head>

<body>

<header class="topo">

    <h1>
        CSTL — Casa Santa Teresinha
    </h1>

    <a
        href="{{ route('funcionarios.index') }}"
        class="voltar-topo"
    >
        ← Voltar aos usuários
    </a>

</header>


<main class="conteudo">

    <div class="cabecalho">

        <h2>
            Editar usuário
        </h2>

        <p>
            Atualize os dados do usuário abaixo.
        </p>

    </div>


    @if ($errors->any())

        <div class="erros">

            <strong>
                Verifique os dados informados:
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
        action="{{ route('funcionarios.update', $funcionario) }}"
        class="formulario"
    >

        @csrf

        @method('PUT')


        <!-- NOME -->

        <div class="campo">

            <label for="nome">
                Nome
            </label>

            <input
                type="text"
                name="nome"
                id="nome"
                value="{{ old('nome', $funcionario->nome) }}"
                maxlength="150"
                required
            >

            @error('nome')

                <div class="erro">
                    {{ $message }}
                </div>

            @enderror

        </div>


        <!-- CPF -->

        <div class="campo">

            <label for="cpf">
                CPF
            </label>

            <input
                type="text"
                name="cpf"
                id="cpf"
                value="{{ old('cpf', $funcionario->cpf) }}"
                maxlength="11"
                inputmode="numeric"
                required
            >

            <div class="ajuda">
                Informe somente os 11 números do CPF.
            </div>

            @error('cpf')

                <div class="erro">
                    {{ $message }}
                </div>

            @enderror

        </div>


        <!-- E-MAIL -->

        <div class="campo">

            <label for="email">
                E-mail
            </label>

            <input
                type="email"
                name="email"
                id="email"
                value="{{ old('email', $funcionario->user?->email) }}"
                required
            >

            @error('email')

                <div class="erro">
                    {{ $message }}
                </div>

            @enderror

        </div>


        <hr class="separador">


        <!-- PERFIL -->

        <h3 class="subtitulo">
            Perfil de acesso
        </h3>


        <div class="campo">

            <label for="role">
                Tipo de usuário
            </label>

            <select
                name="role"
                id="role"
                required
            >

                <option
                    value="funcionario"
                    {{ old('role', $funcionario->user?->role ?? 'funcionario') === 'funcionario' ? 'selected' : '' }}
                >
                    Usuário
                </option>

                <option
                    value="admin"
                    {{ old('role', $funcionario->user?->role ?? 'funcionario') === 'admin' ? 'selected' : '' }}
                >
                    Administrador
                </option>

            </select>


            <div class="perfil-info">

                <strong>Usuário:</strong>
                acesso somente à área do usuário.

                <br>

                <strong>Administrador:</strong>
                acesso ao painel administrativo, relatórios e gerenciamento de usuários.

            </div>


            @error('role')

                <div class="erro">
                    {{ $message }}
                </div>

            @enderror

        </div>


        <hr class="separador">


        <!-- SENHA -->

        <h3 class="subtitulo">
            Alterar senha
        </h3>


        <div class="campo">

            <label for="password">
                Nova senha
            </label>

            <input
                type="password"
                name="password"
                id="password"
                minlength="6"
                autocomplete="new-password"
            >

            <div class="ajuda">
                Deixe em branco para manter a senha atual.
            </div>

            @error('password')

                <div class="erro">
                    {{ $message }}
                </div>

            @enderror

        </div>


        <!-- CONFIRMAR SENHA -->

        <div class="campo">

            <label for="password_confirmation">
                Confirmar nova senha
            </label>

            <input
                type="password"
                name="password_confirmation"
                id="password_confirmation"
                minlength="6"
                autocomplete="new-password"
            >

        </div>


        <hr class="separador">


        <!-- STATUS -->

        <h3 class="subtitulo">
            Status do usuário
        </h3>


        <div class="campo">

            <div class="status">

                <input
                    type="hidden"
                    name="ativo"
                    value="0"
                >

                <input
                    type="checkbox"
                    name="ativo"
                    id="ativo"
                    value="1"
                    {{ old('ativo', $funcionario->ativo) ? 'checked' : '' }}
                >

                <label for="ativo">
                    Usuário ativo
                </label>

            </div>


            <div class="ajuda">
                Usuários inativos continuam cadastrados,
                mas ficam marcados como inativos no sistema.
            </div>


            @error('ativo')

                <div class="erro">
                    {{ $message }}
                </div>

            @enderror

        </div>


        <!-- BOTÕES -->

        <div class="botoes">

            <button
                type="submit"
                class="botao botao-salvar"
            >
                💾 Salvar alterações
            </button>


            <a
                href="{{ route('funcionarios.index') }}"
                class="botao botao-cancelar"
            >
                Cancelar
            </a>

        </div>

    </form>

</main>

</body>

</html>