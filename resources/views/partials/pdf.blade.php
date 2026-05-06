<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Pedido #{{ $orden->id }}</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            font-family: DejaVu Sans, sans-serif;
            color: #222;
            font-size: 12px;
            margin: 0;
            padding: 30px;
        }

        .header {
            width: 100%;
            margin-bottom: 30px;
        }

        .logo {
            width: 180px;
        }

        .empresa {
            text-align: right;
        }

        .empresa h2 {
            margin: 0;
            font-size: 22px;
        }

        .empresa p {
            margin: 4px 0;
            color: #666;
            font-size: 11px;
        }

        .pedido-box {
            margin-top: 20px;
            background: #f5f5f5;
            padding: 15px;
            border-radius: 8px;
        }

        .pedido-box h3 {
            margin: 0 0 10px;
            font-size: 18px;
        }

        .cliente {
            margin-top: 30px;
            margin-bottom: 30px;
        }

        .cliente h4 {
            margin-bottom: 10px;
            font-size: 14px;
        }

        .cliente p {
            margin: 4px 0;
            color: #555;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        table thead {
            background: #111;
            color: white;
        }

        table th {
            padding: 12px;
            font-size: 11px;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        table td {
            padding: 12px;
            border-bottom: 1px solid #e5e5e5;
        }

        .text-center {
            text-align: center;
        }

        .text-right {
            text-align: right;
        }

        .total-box {
            width: 320px;
            margin-left: auto;
            margin-top: 30px;
        }

        .total-box table td {
            border: none;
            padding: 8px 0;
        }

        .total-final {
            font-size: 18px;
            font-weight: bold;
            border-top: 2px solid #111;
            padding-top: 10px;
        }

        .footer {
            margin-top: 70px;
            text-align: center;
            font-size: 11px;
            color: #777;
            border-top: 1px solid #ddd;
            padding-top: 20px;
        }
    </style>
</head>

<body>

    <!-- HEADER -->
    <table class="header">
        <tr>

            <td width="50%">
                <img
                    class="logo"
                    src="{{ public_path('img/logo-factura.png') }}"
                >
            </td>

            <td width="50%" class="empresa">

                <h2>{{ $business->name ?? 'Mi Empresa' }}</h2>

                <p>
                    Pedido #PPP1-{{ $orden->id }}
                </p>

                <p>
                    Fecha:
                    {{ \Carbon\Carbon::now()->format('d/m/Y') }}
                </p>

            </td>

        </tr>
    </table>

    <!-- CLIENTE -->
    <div class="cliente">

        <h4>DATOS DEL CLIENTE</h4>

        <p>
            <strong>Nombre:</strong>
            {{ $orden->name }}
        </p>

        <p>
            <strong>Teléfono:</strong>
            {{ $orden->telefono }}
        </p>

        <p>
            <strong>Email:</strong>
            {{ $orden->email }}
        </p>

        <p>
            <strong>Dirección:</strong>
            {{ $orden->direccion }}
        </p>

        <p>
            <strong>Departamento:</strong>
            {{ $orden->departamento }}
        </p>

        <p>
            <strong>Distrito:</strong>
            {{ $orden->distrito }}
        </p>

        @if($orden->referencia)

        <p>
            <strong>Referencia:</strong>
            {{ $orden->referencia }}
        </p>

        @endif

    </div>

    <!-- TABLA -->
    <table>

        <thead>
            <tr>
                <th width="10%">Cant.</th>
                <th>Producto</th>
                <th width="20%">P. Unitario</th>
                <th width="20%">Subtotal</th>
            </tr>
        </thead>

        <tbody>

            @foreach($items as $item)

            <tr>

                <td class="text-center">
                    {{ $item->qty }}
                </td>

                <td>
                    {{ $item->name }}
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

    <!-- TOTAL -->
    <div class="total-box">

        <table>

            <tr>
                <td>
                    Subtotal
                </td>

                <td class="text-right">
                    S/. {{ number_format($total / 1.18, 2) }}
                </td>
            </tr>

            <tr>
                <td>
                    IGV (18%)
                </td>

                <td class="text-right">
                    S/. {{ number_format($total - ($total / 1.18), 2) }}
                </td>
            </tr>

            <tr class="total-final">
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

        Gracias por su pedido.

        <br><br>

        Este documento fue generado automáticamente.

    </div>

</body>

</html>