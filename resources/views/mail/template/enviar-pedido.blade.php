<!doctype html>
<html>
    <head>
        <meta name="viewport" content="width=device-width">
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Relatório Semanal</title>
        <style>
          table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
          }

          td, th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
          }

          tr:nth-child(even) {
            background-color: #dddddd;
          }

          .texto {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
          }
        </style>
    </head>
    <body class="" style="background-color: #f6f6f6;font-family: sans-serif;-webkit-font-smoothing: antialiased;font-size: 14px;line-height: 1.4;margin: 0;padding: 0;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;">
      <div class="texto">
        <h2>Olá, {{ $nome }}</h2>
        <p>Este relatório é referente ao pedido no dia {{ $pedido['data_pedido'] }}</p>
      </div>
      <table>
        <tr>
          <th>Item</th>
          <th>Valor</th>
          <th>Quantidade</th>
        </tr>
        @foreach ($pedido['produtos'] as $pd)
        <tr>
          <td>{{ $pd['nome'] }}</td>
          <td>{{ $pd['valor'] }}</td>
          <td>{{ $pd['pivot']['quantidade'] }}</td>
        </tr>
        @endforeach
      </table>
    </body>
</html>