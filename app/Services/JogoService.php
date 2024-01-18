<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;

class JogoService {

    public function listarJogosPlataformas()
    {
        $jogosPlataformas = DB::table('jogo_plataforma')
            ->join('jogos', 'jogo_plataforma.jogo_id', '=', 'jogos.id')
            ->join('plataformas', 'jogo_plataforma.plataforma_id', '=', 'plataformas.id')
            ->select(
                'jogos.id as jogos_id',
                'plataformas.id as plataformas_id',
                'jogos.nome as nome_jogo',

                // ou adiciona na view <td>{{ $jogo->jogo_finalizado == 1 ? 'Sim' : 'Não' }}</td>
                DB::raw("CASE WHEN jogos.jogo_finalizado = 1 THEN 'Sim' ELSE 'Não' END AS jogo_finalizado"),
                'plataformas.nome as nome_plataforma'
            )
            ->get();  
            
        return $jogosPlataformas;
    }

    public function editarJogo($id)
    {
      $jogo = DB::table('jogo_plataforma')
            ->join('jogos', 'jogo_plataforma.jogo_id', '=', 'jogos.id')
            ->join('plataformas', 'jogo_plataforma.plataforma_id', '=', 'plataformas.id')
            ->select('jogos.nome as nome_jogo', 'jogos.id as jogo_id', 'jogos.jogo_finalizado', 'plataformas.id as plataforma_id')
            ->where('jogo_plataforma.jogo_id', $id)
            ->first(); // Use o método 'first' para obter um único resultado
            
        return $jogo;
    }

}