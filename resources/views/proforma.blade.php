<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reçu de paiement</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <style>
      @page {
        size: A4;
        margin: 0;
      }
      body {
        font-family: 'Arial Narrow';
        font-size: 12pt;
        padding-top: 100px;
        padding-left: 50px;
        padding-right: 50px;
        background-image: url({{ $dataPDF['bg'] }});
        background-size: cover;
        background-repeat: no-repeat;
        background-position: center center;
      }
      table.devTable {
        width: 100% !important;
        border: 1px solid #000;
        border-collapse: collapse;
      }
      table.devTable th, table.devTable td {
        padding: 5px;
        border-spacing: 0;
        border: 1px solid #000;
      }
      table.noborder {
        width: 100% !important;
        border: none !important;
        border-collapse: collapse;
      }
      table.noborder td {
        border: none !important;
      }
      h1 {
        font-size: 18pt;
        text-decoration: underline;
      }
      h2 {
        font-size: 14pt;
      }
      .cart-img {
        width: 50px;
        margin: auto;
      }
      .cart-img img {
        width: 100%;
      }
    </style>
  </head>
  <body>
    <table class="noborder">
      <tbody>
        <tr><th class="text-center"><h1>FACTURE PROFORMA</h1></th></tr>
      </tbody>
    </table>
    <table class="devTable" style="margin: 10px 0 30px;">
      <tr>
        <th>CLIENT</th>
        <th>DEVIS</th>
      </tr>
      <tr>
        <td>
          Nom et prénoms : <strong>{{ $dataPDF['username'] }}</strong><br>
          Contact : <strong>{{ $dataPDF['number'] }}</strong><br>
          Email : <strong>{{ $dataPDF['email'] }}</strong>
        </td>
        <td>
          Date : {{ $dataPDF['datepay'] }}<br><br>
          Devis N° {{ $dataPDF['numrecu'] }}
        </td>
      </tr>
    </table>
    <table class="devTable">
      <tr>
        <th width="10%" class="text-center">Images</th>
        <th width="25%" class="text-center">Types</th>
        <th width="50%" class="text-center">Articles</th>
        <th width="15%" class="text-center">Quantité</th>
      </tr>
      @foreach($query as $data)
        <tr>
          <td style="text-align:center;">
            <div class="cart-img">
              <img src="assets/img/shops/{{ $data['code'] }}/{{ $data['filename'] }}" alt="{{ $data['submenu'] }}">
            </div>
          </td>
          <td>{{ $data['menu'] }}</td>
          <td>{{ $data['submenu'] }}</td>
          <td style="text-align:center;">{{ $data['quantity'] }}</td>
        </tr>
      @endforeach
      <tr>
        <th style="text-align:right;" colspan="3">TOTAL ARTICLE</th>
        <th style="text-align:center;">{{ $total }}</th>
      </tr>
    </table>
  </body>
</html>
