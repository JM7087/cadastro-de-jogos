<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;

class JogoService
{

    public function listarJogosPlataformasCategorias()
    {
        $jogos = DB::table('jogo_plataforma')
            ->join('jogos', 'jogo_plataforma.jogo_id', '=', 'jogos.id')
            ->join('plataformas', 'jogo_plataforma.plataforma_id', '=', 'plataformas.id')
            ->join('jogo_categoria', 'jogos.id', '=', 'jogo_categoria.jogo_id')
            ->join('categorias', 'jogo_categoria.categoria_id', '=', 'categorias.id')
            ->selectRaw(
                'jogos.id as jogos_id,
            plataformas.id as plataformas_id,
            jogos.nome as nome_jogo,
            CASE WHEN jogos.jogo_finalizado = 1 THEN "Sim" ELSE "Não" END AS jogo_finalizado,          
            categorias.nome as nome_categoria,
            plataformas.nome as nome_plataforma'
            )
            ->orderBy('jogos.nome')
            ->paginate(6);

        return $jogos;
    }

    public function editarJogo($id)
    {
        $jogo = DB::table('jogo_plataforma')
            ->join('jogos', 'jogo_plataforma.jogo_id', '=', 'jogos.id')
            ->join('plataformas', 'jogo_plataforma.plataforma_id', '=', 'plataformas.id')
            ->join('jogo_categoria', 'jogos.id', '=', 'jogo_categoria.jogo_id')
            ->join('categorias', 'jogo_categoria.categoria_id', '=', 'categorias.id')
            ->select('jogos.nome as nome_jogo', 'jogos.id as jogo_id', 'jogos.jogo_finalizado', 'categorias.id as categoria_id', 'plataformas.id as plataforma_id')
            ->where('jogo_plataforma.jogo_id', $id)
            ->first(); // Use o método 'first' para obter um único resultado

        return $jogo;
    }

    public function consultarFiltrdaDeJogos($nomeJogo, $plataformaId, $jogoFinalizado, $categoriaId)
    {
        $jogos = DB::table('jogo_plataforma')
            ->join('jogos', 'jogo_plataforma.jogo_id', '=', 'jogos.id')
            ->join('plataformas', 'jogo_plataforma.plataforma_id', '=', 'plataformas.id')
            ->join('jogo_categoria', 'jogos.id', '=', 'jogo_categoria.jogo_id')
            ->join('categorias', 'jogo_categoria.categoria_id', '=', 'categorias.id')
            ->select(
                'jogos.id as jogos_id',
                'plataformas.id as plataformas_id',
                'jogos.nome as nome_jogo',
                'categorias.nome as nome_categoria',

                // ou adiciona na view <td>{{ $jogo->jogo_finalizado == 1 ? 'Sim' : 'Não' }}</td>
                DB::raw("CASE WHEN jogos.jogo_finalizado = 1 THEN 'Sim' ELSE 'Não' END AS jogo_finalizado"),
                'plataformas.nome as nome_plataforma'
            );

        if ($nomeJogo !== null) {
            $jogos->where('jogos.nome', 'LIKE', '%' . $nomeJogo . '%');
        }

        if ($jogoFinalizado !== null) {
            $jogos->where('jogos.jogo_finalizado', $jogoFinalizado);
        }

        if ($plataformaId !== null) {
            $jogos->where('plataformas.id', $plataformaId);
        }

        if ($categoriaId !== null) {
            $jogos->where('categorias.id', $categoriaId);
        }

        $result = $jogos->orderBy('jogos.nome')->paginate(6);

        return $result;
    }
}
