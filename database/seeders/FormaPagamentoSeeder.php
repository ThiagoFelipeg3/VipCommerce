<?php

namespace Database\Seeders;

use App\Models\FormaPagamento;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FormaPagamentoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        DB::table('forma_pagamento')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1');

        DB::table('forma_pagamento')->insert([
            [
                'codigo_forma_pagamento' => FormaPagamento::DINHEIRO,
                'descricao' => 'dinheiro'
            ],
            [
                'codigo_forma_pagamento' => FormaPagamento::CARTAO,
                'descricao' => 'cartão'
            ],
            [
                'codigo_forma_pagamento' => FormaPagamento::CHEQUE,
                'descricao' => 'cheque'
            ],
        ]);
    }
}
