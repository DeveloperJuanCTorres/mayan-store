@php
    use Illuminate\Support\Str;
@endphp
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">

    <title>
        Pedido #{{ $orden->id }}
    </title>

    <style>

        * {
            box-sizing: border-box;
        }

        body {

            font-family: DejaVu Sans, sans-serif;
            color: #1a1a1a;
            margin: 0;
            padding: 18px 40px 20px;
            font-size: 12px;
            line-height: 1.4;
            background: #ffffff;

        }

        .top-line {

            width: 100%;
            height: 5px;
            background: linear-gradient(
                90deg,
                #000000,
                #444444,
                #999999
            );

            margin-bottom: 22px;

        }

        .header {

            width: 100%;
            margin-bottom: 24px;

        }

        .logo {
            width: 200px;
        }

        .company {

            text-align: right;

        }

        .company h1 {

            margin: 0;
            font-size: 26px;
            letter-spacing: 1px;
            font-weight: bold;

        }

        .company p {

            margin: 3px 0;
            color: #777;
            font-size: 10px;

        }

        .badge {

            display: inline-block;
            background: #111;
            color: white;
            padding: 6px 12px;
            border-radius: 30px;
            font-size: 9px;
            letter-spacing: 2px;
            text-transform: uppercase;
            margin-top: 10px;

        }

        .section {

            margin-bottom: 18px;

        }

        .section-title {

            font-size: 10px;
            letter-spacing: 3px;
            text-transform: uppercase;
            color: #888;
            margin-bottom: 10px;
            border-bottom: 1px solid #ececec;
            padding-bottom: 8px;

        }

        .client-box {

            background: #fafafa;
            border: 1px solid #ececec;
            border-radius: 12px;
            padding: 16px 18px;

        }

        .client-grid {

            width: 100%;
            border-collapse: collapse;

        }

        .client-grid td {

            width: 50%;
            padding: 5px 8px 5px 0;
            vertical-align: top;

        }

        .client-item {

            margin-bottom: 4px;

        }

        .label {

            display: block;
            font-size: 9px;
            text-transform: uppercase;
            letter-spacing: 1.5px;
            color: #888;
            margin-bottom: 2px;

        }

        .value {

            font-size: 11px;
            color: #111;
            font-weight: bold;

        }

        .products {

            width: 100%;
            border-collapse: collapse;
            margin-top: 8px;

        }

        .products thead {

            background: #111;
            color: white;

        }

        .products th {

            padding: 12px 10px;
            font-size: 9px;
            text-transform: uppercase;
            letter-spacing: 2px;

        }

        .products td {

            padding: 13px 10px;
            border-bottom: 1px solid #ececec;

        }

        .products tbody tr:nth-child(even) {

            background: #fafafa;

        }

        .text-center {

            text-align: center;

        }

        .text-right {

            text-align: right;

        }

        .summary {

            width: 320px;
            margin-left: auto;
            margin-top: 20px;
            background: #fafafa;
            border: 1px solid #ececec;
            border-radius: 14px;
            padding: 16px 20px;

        }

        .summary table {

            width: 100%;

        }

        .summary td {

            padding: 7px 0;

        }

        .summary .label {

            color: #777;
            font-size: 10px;

        }

        .summary .amount {

            text-align: right;
            font-weight: bold;

        }

        .total-row td {

            border-top: 1px solid #dcdcdc;
            padding-top: 12px;
            font-size: 18px;
            font-weight: bold;
            color: #000;

        }

        .footer {

            margin-top: 35px;
            text-align: center;
            color: #888;
            font-size: 9px;
            border-top: 1px solid #ececec;
            padding-top: 14px;
            line-height: 1.6;

        }

        .thankyou {

            font-size: 12px;
            color: #111;
            margin-bottom: 6px;
            letter-spacing: 1px;

        }

    </style>

</head>

<body>

    <div class="top-line"></div>

    <!-- HEADER -->
    <table class="header">

        <tr>

            <td width="70%">

                <img
                    class="logo"
                    src="{{ public_path('images/logo.png') }}"
                >

            </td>

            <td width="50%" class="company">

                <h1>
                    {{ $business->name ?? 'Mi Empresa' }}
                </h1>

                <p>
                    Pedido #PPP1-{{ $orden->id }}
                </p>

                <p>
                    {{ \Carbon\Carbon::now()->format('d/m/Y H:i') }}
                </p>

                <div class="badge">
                    Pedido Confirmado
                </div>

            </td>

        </tr>

    </table>

    <!-- CLIENTE -->
    <div class="section">

        <div class="section-title">
            Información del Cliente
        </div>

        <div class="client-box">

            <table class="client-grid">

                <tr>

                    <td>

                        <div class="client-item">

                            <span class="label">
                                Cliente
                            </span>

                            <span class="value">
                                {{ Str::upper($orden->name) }}
                            </span>

                        </div>

                    </td>

                    <td>

                        <div class="client-item">

                            <span class="label">
                                Teléfono
                            </span>

                            <span class="value">
                                {{ $orden->telefono }}
                            </span>

                        </div>

                    </td>

                </tr>

                <tr>

                    <td>

                        <div class="client-item">

                            <span class="label">
                                Email
                            </span>

                            <span class="value">
                                {{ Str::upper($orden->email) }}
                            </span>

                        </div>

                    </td>

                    <td>

                        <div class="client-item">

                            <span class="label">
                                Distrito
                            </span>

                            <span class="value">
                                {{ Str::upper($orden->distrito) }}
                            </span>

                        </div>

                    </td>

                </tr>

                <tr>

                    <td>

                        <div class="client-item">

                            <span class="label">
                                Departamento
                            </span>

                            <span class="value">
                                {{ Str::upper($orden->departamento) }}
                            </span>

                        </div>

                    </td>

                    <td>

                        <div class="client-item">

                            <span class="label">
                                Dirección
                            </span>

                            <span class="value">
                                {{ Str::upper($orden->direccion) }}
                            </span>

                        </div>

                    </td>

                </tr>

            </table>

        </div>

    </div>

    <!-- PRODUCTOS -->
    <div class="section">

        <div class="section-title">
            Detalle del Pedido
        </div>

        <table class="products">

            <thead>

                <tr>

                    <th width="12%">
                        Cant.
                    </th>

                    <th>
                        Producto
                    </th>

                    <th width="20%">
                        Precio
                    </th>

                    <th width="22%">
                        Subtotal
                    </th>

                </tr>

            </thead>

            <tbody>

                @foreach($items as $item)

                <tr>

                    <td class="text-center">
                        {{ $item->qty }}
                    </td>

                    <td>
                        {{ $item->name }} Codigo: {{($item->options->codigo_producto ?? 'N/A') }}
                    </td>

                    <td class="text-right">
                        S/. {{ number_format($item->price, 2) }}
                    </td>

                    <td class="text-right">
                        S/. {{ number_format($item->price * $item->qty, 2) }}
                    </td>

                </tr>

                @endforeach

            </tbody>

        </table>

    </div>

    <!-- TOTAL -->
    <div class="summary">

        <table>

            <tr>

                <td class="label">
                    Subtotal
                </td>

                <td class="amount">
                    S/. {{ number_format($total / 1.18, 2) }}
                </td>

            </tr>

            <tr>

                <td class="label">
                    IGV (18%)
                </td>

                <td class="amount">
                    S/. {{ number_format($total - ($total / 1.18), 2) }}
                </td>

            </tr>

            <tr class="total-row">

                <td>
                    Total
                </td>

                <td class="text-right">
                    S/. {{ number_format($total, 2) }}
                </td>

            </tr>

        </table>

    </div>

    <!-- FOOTER -->
    <div class="footer">

        <div class="thankyou">
            Gracias por confiar en nosotros
        </div>

        Este documento es únicamente de carácter informativo y tiene como propósito la visualización del pedido. No representa una confirmación de compra ni un compromiso contractual.
        <br>
        Los términos y condiciones definitivos serán establecidos una vez se formalice el pedido.

        <br><br>

        © {{ date('Y') }} {{ $business->name ?? 'Mi Empresa' }} · Todos los derechos reservados

    </div>

</body>

</html>