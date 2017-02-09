<?php

use Illuminate\Database\Seeder;
use App\Estado;

class EstadosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      if ( Estado::count() == 0 ) {
        DB::table('estados')->insert([
          'nome' => 'Ceara',
          'sigla' => 'CE',
          'historico' => 'O Ceará é uma das 27 unidades federativas do Brasil. Está situado no norte da Região Nordeste e tem por limites o Oceano Atlântico a norte e nordeste, Rio Grande do Norte e Paraíba a leste, Pernambuco ao sul e Piauí a oeste. Sua área total é de 148 920,472 km²,ou 9,37% da área do Nordeste e 1,74% da superfície do Brasil. A população do estado estimada para o ano de 2015 foi de 8.904.459 habitantes, conferindo ao território a oitava colocação entre as unidades federativas mais populosas.'
        ]);

        DB::table('estados')->insert([
          'nome' => 'Paraná',
          'sigla' => 'PR',
          'historico' => 'O Paraná é uma das 27 unidades federativas do Brasil, localizado ao norte da Região Sul, da qual é o único a ter área limítrofe com estados de outras regiões.'
        ]);
      }
    }
}
