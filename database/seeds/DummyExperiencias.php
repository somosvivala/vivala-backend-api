<?php

use Illuminate\Database\Seeder;

class DummyExperiencias extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $experiencias = factory(App\Models\Experiencia::class, 3)->create();
        $experiencias->each(function ($exp) {
            $exp->blocosDescricao()->saveMany(
                factory(App\Models\BlocoDescricao::class, 3)
                ->make()
            );
        });

        $this->command->info('## 3 EXPERIENCIAS CRIADAS!');
    }
}
