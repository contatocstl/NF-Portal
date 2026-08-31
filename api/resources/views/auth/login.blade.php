<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>CSTL - Casa Santa Teresinha</title>

    <style>
        * {
            box-sizing: border-box;
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
            min-height: 100vh;

            display: flex;
            align-items: center;
            justify-content: center;

            padding: 30px;
        }

        .login-container {
            width: 100%;
            max-width: 430px;

            background: #ffffff;

            padding: 42px 40px 38px;

            border-radius: 18px;

            box-shadow:
                0 20px 50px rgba(46, 86, 100, 0.14),
                0 4px 12px rgba(46, 86, 100, 0.06);

            border: 1px solid rgba(46, 86, 100, 0.08);
        }

        .titulo {
            text-align: center;
            margin-bottom: 30px;
        }

        .logo {
            display: block;

            width: 190px;
            max-width: 100%;
            height: auto;

            margin: 0 auto 22px;
        }

        .titulo h1 {
            margin: 0;

            color: #2E5664;

            font-size: 25px;
            font-weight: 700;

            letter-spacing: 0.3px;
        }

        .titulo h2 {
            margin: 5px 0 0;

            color: #01AFC2;

            font-size: 14px;
            font-weight: 600;

            letter-spacing: 0.8px;
            text-transform: uppercase;
        }

        .titulo p {
            margin: 12px 0 0;

            color: #6b7280;

            font-size: 14px;
            line-height: 1.5;
        }

        .erros {
            background: #fff4f6;

            color: #a61b35;

            padding: 13px 15px;

            border-left: 4px solid #FC9BB4;

            border-radius: 8px;

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

        .campo {
            margin-bottom: 18px;
        }

        label {
            display: block;

            margin-bottom: 7px;

            color: #2E5664;

            font-size: 14px;
            font-weight: 700;
        }

        input {
            display: block;

            width: 100%;

            padding: 13px 14px;

            border: 1px solid #cbd8dc;

            border-radius: 9px;

            background: #ffffff;

            color: #263b42;

            font-size: 15px;

            transition:
                border-color 0.2s ease,
                box-shadow 0.2s ease,
                background 0.2s ease;
        }

        input::placeholder {
            color: #9aa8ad;
        }

        input:hover {
            border-color: #9aafb5;
        }

        input:focus {
            outline: none;

            border-color: #01C1D4;

            background: #ffffff;

            box-shadow:
                0 0 0 3px rgba(1, 193, 212, 0.12);
        }

        button {
            width: 100%;

            margin-top: 8px;

            padding: 14px 16px;

            border: none;

            border-radius: 9px;

            background: #2E5664;

            color: #ffffff;

            font-size: 16px;
            font-weight: 700;

            cursor: pointer;

            box-shadow:
                0 5px 12px rgba(46, 86, 100, 0.18);

            transition:
                background 0.2s ease,
                transform 0.15s ease,
                box-shadow 0.2s ease;
        }

        button:hover {
            background: #244653;

            box-shadow:
                0 7px 16px rgba(46, 86, 100, 0.22);
        }

        button:active {
            transform: translateY(1px);
        }

        button:focus-visible {
            outline: 3px solid rgba(1, 193, 212, 0.25);
            outline-offset: 2px;
        }

        .rodape {
            margin-top: 25px;

            text-align: center;

            color: #8a989d;

            font-size: 12px;

            line-height: 1.5;
        }

        @media (max-width: 600px) {
            body {
                padding: 18px;
            }

            .login-container {
                max-width: 100%;

                padding: 34px 24px 30px;

                border-radius: 15px;
            }

            .logo {
                width: 165px;
            }

            .titulo h1 {
                font-size: 22px;
            }
        }

        @media (max-width: 380px) {
            body {
                padding: 12px;
            }

            .login-container {
                padding: 28px 20px;
            }
        }
    </style>
</head>

<body>

    <main class="login-container">

        <div class="titulo">

            <img
                src="{{ asset('images/logo.png') }}"
                alt="Casa Santa Teresinha"
                class="logo"
            >

            <h1>CSTL</h1>

            <h2>Casa Santa Teresinha</h2>

            <p>
                Faça login para continuar
            </p>

        </div>

        @if ($errors->any())

            <div class="erros">

                <strong>Erro ao entrar:</strong>

                <ul>
                    @foreach ($errors->all() as $erro)
                        <li>{{ $erro }}</li>
                    @endforeach
                </ul>

            </div>

        @endif

        <form method="POST" action="{{ route('login') }}">

            @csrf

            <div class="campo">

                <label for="email">
                    E-mail
                </label>

                <input
                    type="email"
                    id="email"
                    name="email"
                    value="{{ old('email') }}"
                    placeholder="Digite seu e-mail"
                    autocomplete="email"
                    required
                    autofocus
                >

            </div>

            <div class="campo">

                <label for="password">
                    Senha
                </label>

                <input
                    type="password"
                    id="password"
                    name="password"
                    placeholder="Digite sua senha"
                    autocomplete="current-password"
                    required
                >

            </div>

            <button type="submit">
                Entrar
            </button>

        </form>

        <div class="rodape">
            CSTL — Casa Santa Teresinha
        </div>

    </main>

</body>
</html>