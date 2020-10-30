<!doctype html>
<html>
    <head>
        <style>
            body {
                background-color: #fff !important; 
            }
            .titulo-relatorio {
                text-align: center; 
                width: 100%; 
            }
            .cabecalho {
                display: inline-block;
                width: 100%; 
            }
            .periodo {
                /* background-color: green;  */
                width: 33%; 
                float: left;
            }
            .logo {
                /* background-color: pink;  */
                float: left;
                width: 33%;
            }
            .logo img {
                /* background-color: blue;  */
                width: 150px;
                display: block;
                margin-left: auto;
                margin-right: auto
            }
            .grid-flex {
                display: flex;
            }
            .veiculo-itens {
                width: 50%;
                float: left; 
            }
            .text-center {
                text-align: center !important;
            }
            .text-right {
                text-align: right !important;
            }
            h4 {
                color: #9a83b3 !important;
                margin-bottom: 15px !important;
            }
            .diarias-itens {
                width: 20%;
                float: left;
            }
            .veiculo, .diarias, .debitos-creditos, .lancamentos-futuros {
                margin: 10px;
            }
        </style>
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    </head>
    <body>
        <div class="cabecalho">
            <div class="titulo-relatorio">
                <h4>RELATÓRIO</h4>
            </div>
            <div class="periodo">
                <span>PERÍODO</span>
                <h5>Referente ou pedido realizado dia {{ $pedido['data_pedido'] }}</h5>
            </div>
        </div>
        <hr style="clear:both;">
        <div class="conteudo">
            <div class="veiculo">
                <div class="titulo-relatorio">
                    <h4>DADOS:</h4>
                </div>
                <div class="grid-flex text-center">
                    <div class="veiculo-itens" >
                        <span>NOME CLIENTE</span>
                        <h5>{{ $cliente['nome'] }}</h5>
                    </div>
                    <div class="veiculo-itens">
                        <span>EMAIL</span>
                        <h5>{{ $cliente['email'] }}</h5>
                    </div>
                </div>
            </div>
            <hr style="clear:both;">
            <div class="diarias">
                <div class="titulo-relatorio">
                    <h4>PEDIDO</h4>
                </div>
                <div class="grid-flex text-center">
                    <div class="diarias-itens">
                        <span>DATA PEDIDO</span>
                        <h5>{{ $pedido['data_pedido'] }}</h5>
                    </div>
                    <div class="diarias-itens">
                        <span>OBSERVAÇÂO</span>
                        <h5>{{ $pedido['observacao'] }}</h5>
                    </div>
                    <div class="diarias-itens">
                        <span>FORMA PAGAMENTO</span>
                        <h5>{{ $pedido['forma_pagamento']['descricao'] }}</h5>
                    </div>
                </div>
            </div>
            <hr style="clear:both;">
            <div class="debitos-creditos">
                <div class="titulo-relatorio">
                    <h4>PRODUTOS</h4>
                </div>
                <div>
                    <table style="width:100%;" class="table table-hover">
                        <thead>
                        <tr>
                            <th>NOME</th>
                            <th>COR</th>
                            <th class="text-center">TAMANHO</th>
                            <th class="text-center">QUANTIDADE</th>
                            <th class="text-center">VALOR</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach ($pedido['produtos'] as $ped)
                            <tr >
                                <td>{{ $ped['nome'] }}</td>
                                <td>{{ $ped['cor'] }}</td>
                                <td class="text-center">{{ $ped['tamanho'] }}</td>
                                <td class="text-center">{{ $ped['pivot']['quantidade'] }}</td>
                                <td class="text-center">{{ $ped['valor_total'] }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        <table class="table">
            <thead>
                <tr>
                    <th width="11%"></th>
                    <th width="67%"></th>
                    <th width="12%" class="text-center"></th>
                    <th width="12%" class="text-center"></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td colspan="2"><h3>VALOR TOTAL:</h3></td>
                    <td class="text-center" style="color:  rgb(248, 59, 59); width: 10rem" colspan="2"><h3>{{$pedido['valor_total_pedido']}}</h3> </td>
                </tr>
            </tbody>
            </table>
        </div>
    </body>
</html>
