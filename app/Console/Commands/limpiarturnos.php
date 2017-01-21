<?php
namespace App\Console\Commands;
use Illuminate\Console\Command;
use App\Tiket;
use App\Folios;

class limpiarturnos extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:limpiar';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Limpiar turnos que hallan quedado pendientes el dia de ayer';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $folio = Tiket::where('estado','0')->update(['estado' => '3']);
        $folio = Folios::where('tipo','=','pagos')->update(['numero'=>'1']);
        $folio = Folios::where('tipo','=','aclaraciones')->update(['numero'=>'1']);
        $this->info ('Se ha dado por terminado los turnos en espera de todas las sucursales');
        $this->info ('Se han limpiado los numeros de todas las sucursales');
    }
}
