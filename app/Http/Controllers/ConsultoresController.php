<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Consultor;
use DB; use Khill\Lavacharts\Lavacharts;

class ConsultoresController extends Controller{
 	public function index(){
 		$consultores = Consultor::join('permissao_sistema as ps', 'cao_usuario.co_usuario', '=', 'ps.co_usuario')
 						->where('ps.co_sistema', '=', 1)
 						->where('ps.in_ativo', '=', 'S')
 						->where('ps.co_tipo_usuario', '<=', 2)
 						->orderBy('cao_usuario.no_usuario', 'ASC')
 						->select('cao_usuario.*')
 						->get();

 		return view('consultores.consultores')->with(compact('consultores'));
 	}

 	public function informe(Request $request){
 		$consultores = array();
 		$consultoresSinFacturas = array();
 		$totalGanancia = 0;
 		$costoFijoPromedio = 0;
 		$cont = 0;

 		foreach ($request->seleccion as $consultor){
 			$facturas = DB::table('cao_fatura as cf')
	 						->join('cao_os as co', 'cf.co_os', '=', 'co.co_os')
	 						->join('cao_usuario as cu', function ($join) use ($consultor) {
					            $join->on('co.co_usuario', '=', 'cu.co_usuario')
					                ->where('cu.co_usuario', '=', $consultor);
					        })->join('cao_salario as cs', 'cu.co_usuario', '=', 'cs.co_usuario')
					        ->whereMonth('cf.data_emissao', '=', $request->mes)
					        ->whereYear('cf.data_emissao', '=', $request->ano)
					        ->select(DB::raw('SUM(cf.valor - ( (cf.valor * cf.total_imp_inc) / 100)) as ganancia_neta'), DB::raw('SUM( (cf.valor - ( (cf.valor * cf.total_imp_inc) / 100) ) * cf.comissao_cn) / 100 as comision'), 'cu.no_usuario', 'cs.brut_salario as costo_fijo')
	 						->groupBy('cu.co_usuario')
	 						->first();

 			if ($facturas != null){
 				$cont++;

 				$consultores[] = array ($facturas->no_usuario, $facturas->ganancia_neta, $facturas->costo_fijo, $facturas->comision, ($facturas->ganancia_neta - ($facturas->costo_fijo + $facturas->comision)) );

 				$totalGanancia = $totalGanancia + $facturas->ganancia_neta;
 				$costoFijoPromedio = $costoFijoPromedio + $facturas->costo_fijo;
 			}else{
 				$infoConsultor = DB::table('cao_usuario')
 									->select('no_usuario')
 									->where('co_usuario', '=', $consultor)
 									->first();

 				$consultoresSinFacturas[] = $infoConsultor->no_usuario;
 			}
 		}

 		if ($request->tipo_reporte == 'Informe'){
 			return view('consultores.informe')->with(compact('consultores', 'consultoresSinFacturas'));
 		}else if ($request->tipo_reporte == 'Grafico'){
 			if ($cont > 0){
 				$costoFijoPromedio = $costoFijoPromedio / $cont;

				$desempeno = \Lava::DataTable();

				$desempeno->addStringColumn('Consultor')
				         ->addNumberColumn('Costo Fijo Promedio')
				         ->addNumberColumn('Ganancia Neta')
				         ->addNumberColumn('Costo Fijo Individual');

				foreach ($consultores as $consultor){
					$desempeno->addRow([$consultor[0], $costoFijoPromedio, $consultor[1], $consultor[2]]);

				}
				         
				\lava::ComboChart('Desempeño', $desempeno, [
				    'titleTextStyle' => [
				        'color'    => 'rgb(123, 65, 89)',
				        'fontSize' => 16
				    ],
				    'legend' => [
				        'position' => 'in'
				    ],
				    'seriesType' => 'bars',
				    'series' => [
				        0 => ['type' => 'line']
				    ]
				]);
 			}

 			return view('consultores.grafico')->with(compact('consultoresSinFacturas', 'cont'));
 		}else if ($request->tipo_reporte == 'Pizza'){
 			if ($cont > 0){
 				$ganancias = \Lava::DataTable();

				$ganancias->addStringColumn('Consultor')
				        ->addNumberColumn('Porentaje');

				foreach ($consultores as $consultor){
					$porcentaje = ( ($consultor[1] * 100) / $totalGanancia );
					$ganancias->addRow([$consultor[0], $porcentaje]);

				}

				\Lava::PieChart('Ganancias', $ganancias, [
				    'is3D'   => true
				    
				]);
 			}

 			return view('consultores.pizza')->with(compact('consultoresSinFacturas', 'cont'));
 		}
 	}
}
