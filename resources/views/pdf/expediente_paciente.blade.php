<html>
<head>
    <style>
        .page-break {
            page-break-after: always;
        }

        @page {
/*            margin: 0cm 0cm;*/
            font-family: Arial;
        }

        #tabla-paciente
        {
            width: 100%; /* Ancho de la tabla al 100% del contenedor */
            border: 1px solid black; /* Borde para la tabla */

            border-spacing: 1em 0.5em;
            padding: 0 2em 1em 0;
        }

        #tabla-paciente td,
        {
          height: 1.1em;
          vertical-align: middle;
        }

        #tabla-antecedentes
        {
            width: 100%; /* Ancho de la tabla al 100% del contenedor */
            border: 1px solid black; /* Borde para la tabla */
        }

        #tabla-antecedentes td,
        {
          height: 1.1em;
          vertical-align: middle;
        }

        #tabla-antecedentes-gineco
        {
            width: 100%; /* Ancho de la tabla al 100% del contenedor */
            border: 1px solid black; /* Borde para la tabla */
        }

        #tabla-antecedentes-gineco td,
        {
          vertical-align: middle;
        }

        #tabla-control-parental{
            text-align: center;
            border: 1px solid;
        }

        #tabla-control-parental,
        #tabla-control-parental th,
        #tabla-control-parental td,
        {
            border: 1px solid black;
            border-collapse: collapse;
        }
    </style>
</head>
{{-- <body> --}}
<main>
    <div style="font-weight: bolder; font-size: 0.5em; text-align: center;">
        <h1>CLINICA DE GINECOLOGIA</h1>
        <h1>DRA. MISHEL FLORIAN</h1>
        <h2>EXPEDIENTE DEL PACIENTE</h2>
    </div>
    <br />
    <table id="tabla-paciente" style="width: 100%;">
        <colgroup>
            <col width="5%"><col width="5%">
            <col width="5%"><col width="5%">
            <col width="5%"><col width="5%">
            <col width="5%"><col width="5%">
            <col width="5%"><col width="5%">
            <col width="5%"><col width="5%">
            <col width="5%"><col width="5%">
            <col width="5%"><col width="5%">
            <col width="5%"><col width="5%">
            <col width="5%"><col width="5%">
        </colgroup>
        <tbody>
            <tr>
                <td colspan="1" style="font-weight: bolder;">Nombre:</td>
                <td colspan="9" style="border-bottom: 1px solid black;">{{ $paciente->obtenerNombreCompletado() ?? '' }}</td>
                <td colspan="1" style="font-weight: bolder;">Edad:</td>
                <td colspan="4" style="border-bottom: 1px solid black;">{{ $paciente->edad_actual ?? '' }}</td>
                <td colspan="1" style="font-weight: bolder;">Alfabeto:</td>
                <td colspan="4" style="border-bottom: 1px solid black;">{{ $paciente->alfabeta ?? '' }}</td>
            </tr>
            <tr>
                <td colspan="1" style="font-weight: bolder;">Domicilio:</td>
                <td colspan="8" style="border-bottom: 1px solid black;">{{ $paciente->direccion ?? '' }}</td>
                <td colspan="2" style="font-weight: bolder;">Estado Civil:</td>
                <td colspan="4" style="border-bottom: 1px solid black;">{{ $paciente->estado_civil ?? '' }}</td>
                <td colspan="1" style="font-weight: bolder;">Tel:</td>
                <td colspan="4" style="border-bottom: 1px solid black;">{{ $paciente->telefono ?? '' }}</td>
            </tr>
        </tbody>
    </table>
    <br />
    <div class="page-break"></div>
    <div>
        @php $i = 1 @endphp
        @php $total = count($citas) @endphp
        @foreach($citas as $cita)
            @if ( $i++ > 1 )
                <div class="page-break"></div>
            @endif
            @php
                $antecedente = $cita->citaAntecedente;
                $antecedenteGineco = $cita->citaAntecedenteGineicoObstretico;
                $controlParental = $cita->citaControlParental;
            @endphp
            <h1>Cita # {{ $total-- }} [ {{ $cita->id }} ]</h1>
            <h2>Fecha atendida: {{  $cita->fecha_atendida ? date('d/m/Y H:i', strtotime($cita->fecha_atendida)) : '' }}</h2>
            <table style="width: 100%;">
                <tr>
                    <td style="width: 50%">
                        <table id="tabla-antecedentes" style="height: 200px;">
                            <colgroup>
                                <col width="5%"><col width="5%">
                                <col width="5%"><col width="5%">
                                <col width="5%"><col width="5%">
                                <col width="5%"><col width="5%">
                                <col width="5%"><col width="5%">
                                <col width="5%"><col width="5%">
                                <col width="5%"><col width="5%">
                                <col width="5%"><col width="5%">
                                <col width="5%"><col width="5%">
                                <col width="5%"><col width="5%">
                            </colgroup>
                            <tbody>
                                <tr>
                                    <td colspan="20" ><p style="font-weight: bolder;">ANTECEDENTES</p></td>
                                </tr>
                                <tr>
                                    <td colspan="5" style="font-weight: bolder:">Medicos:</td>
                                    <td colspan="15" style="border-bottom: 1px solid black;">{{ $antecedente->medicos ?? '' }}</td>
                                </tr>
                                <tr>
                                    <td colspan="5" style="font-weight: bolder:">Quirugicos:</td>
                                    <td colspan="15" style="border-bottom: 1px solid black;">{{ $antecedente->quirurgicos ?? '' }}</td>
                                </tr>
                                <tr>
                                    <td colspan="5" style="font-weight: bolder:">Alergicos:</td>
                                    <td colspan="15" style="border-bottom: 1px solid black;">{{ $antecedente->alergicos ?? '' }}</td>
                                </tr>
                                <tr>
                                    <td colspan="5" style="font-weight: bolder:">Traumáticos:</td>
                                    <td colspan="15" style="border-bottom: 1px solid black;">{{ $antecedente->traumaticos ?? '' }}</td>
                                </tr>
                                <tr>
                                    <td colspan="5" style="font-weight: bolder:">Familiares:</td>
                                    <td colspan="15" style="border-bottom: 1px solid black;">{{ $antecedente->familiares ?? '' }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                    <td style="width: 50%">
                        <table id="tabla-antecedentes-gineco" style="height: 200px;">
                            <colgroup>
                                <col width="5%"><col width="5%">
                                <col width="5%"><col width="5%">
                                <col width="5%"><col width="5%">
                                <col width="5%"><col width="5%">
                                <col width="5%"><col width="5%">
                                <col width="5%"><col width="5%">
                                <col width="5%"><col width="5%">
                                <col width="5%"><col width="5%">
                                <col width="5%"><col width="5%">
                                <col width="5%"><col width="5%">
                            </colgroup>
                            <tbody>
                                <tr>
                                    <td colspan="20" ><p style="font-weight: bolder;">ANTECEDENTES GINECO-OBSTÉTRICOS</p></td>
                                </tr>
                                <tr>
                                    <td colspan="1" style="font-weight: bolder:">G:</td>
                                    <td colspan="2" style="border-bottom: 1px solid black;">{{ $antecedenteGineco->g ?? '' }}</td>
                                    <td colspan="1" style="font-weight: bolder:">P:</td>
                                    <td colspan="2" style="border-bottom: 1px solid black;">{{ $antecedenteGineco->p ?? '' }}</td>
                                    <td colspan="1" style="font-weight: bolder:">Ab:</td>
                                    <td colspan="2" style="border-bottom: 1px solid black;">{{ $antecedenteGineco->ab ?? '' }}</td>
                                    <td colspan="1" style="font-weight: bolder:">C:</td>
                                    <td colspan="2" style="border-bottom: 1px solid black;">{{ $antecedenteGineco->c ?? '' }}</td>
                                    <td colspan="1" style="font-weight: bolder:">Hv:</td>
                                    <td colspan="2" style="border-bottom: 1px solid black;">{{ $antecedenteGineco->hv ?? '' }}</td>
                                    <td colspan="1" style="font-weight: bolder:">Hm:</td>
                                    <td colspan="2" style="border-bottom: 1px solid black;">{{ $antecedenteGineco->hm ?? '' }}</td>
                                </tr>
                                <tr>
                                    <td colspan="3" style="font-weight: bolder:">Menarquía:</td>
                                    <td colspan="7" style="border-bottom: 1px solid black;">{{ $antecedenteGineco->menarquia ?? '' }}</td>
                                    <td colspan="3" style="font-weight: bolder:">Ciclos:</td>
                                    <td colspan="7" style="border-bottom: 1px solid black;">{{ $antecedenteGineco->ciclos ?? '' }}</td>
                                </tr>
                                <tr>
                                    <td colspan="3" style="font-weight: bolder:">FUR:</td>
                                    <td colspan="7" style="border-bottom: 1px solid black;">{{ $antecedenteGineco->fur ?? '' }}</td>
                                    <td colspan="3" style="font-weight: bolder:">FPP:</td>
                                    <td colspan="7" style="border-bottom: 1px solid black;">{{ $antecedenteGineco->fpp ?? '' }}</td>
                                </tr>
                                <tr>
                                    <td colspan="1" style="font-weight: bolder:">Pap:</td>
                                    <td colspan="6" style="border-bottom: 1px solid black;">{{ $antecedenteGineco->pap ?? '' }}</td>
                                    <td colspan="1" style="font-weight: bolder:">ETS:</td>
                                    <td colspan="5" style="border-bottom: 1px solid black;">{{ $antecedenteGineco->ets ?? '' }}</td>
                                    <td colspan="2" style="font-weight: bolder:">No.Parejas:</td>
                                    <td colspan="5" style="border-bottom: 1px solid black; text-align: right;">{{ $antecedenteGineco->no_parejas ?? '' }}</td>
                                </tr>
                                <tr>
                                    <td colspan="2" style="font-weight: bolder:">Grupo Rh:</td>
                                    <td colspan="6" style="border-bottom: 1px solid black;">{{ $antecedenteGineco->grupo_rh ?? '' }}</td>
                                    <td colspan="1" style="font-weight: bolder:">PF:</td>
                                    <td colspan="4" style="border-bottom: 1px solid black;">{{ $antecedenteGineco->pf ?? '' }}</td>
                                    <td colspan="2" style="font-weight: bolder:">Coitarquia:</td>
                                    <td colspan="5" style="border-bottom: 1px solid black;">{{ $antecedenteGineco->coitarquia ?? '' }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
            </table>
            <br />
            <table id="tabla-control-parental" style="width: 100%;">
                <colgroup>
                    <col width="5%"><col width="5%">
                    <col width="5%"><col width="5%">
                    <col width="5%"><col width="5%">
                    <col width="5%"><col width="5%">
                    <col width="5%"><col width="5%">
                    <col width="5%"><col width="5%">
                    <col width="5%"><col width="5%">
                    <col width="5%"><col width="5%">
                    <col width="5%"><col width="5%">
                    <col width="5%"><col width="5%">
                </colgroup>
                <tbody>
                    <tr>
                        <td colspan="4" style="font-weight: bolder; min-width: 100px;">Fecha de consulta</td>
                        <td colspan="4" style="min-width: 100px;">{{ $cita->fecha_atendida ? date('d/m/Y', strtotime($cita->fecha_atendida) ) : '' }}</td>
                        <td colspan="3" style="min-width: 50px;"></td>
                        <td colspan="3" style="min-width: 50px;"></td>
                        <td colspan="2" style="min-width: 50px;"></td>
                        <td colspan="2" style="min-width: 50px;"></td>
                        <td colspan="2" style="min-width: 50px;"></td>
                    </tr>
                    <tr>
                        <td colspan="4" style="font-weight: bolder;">Edad Gestacional</td>
                        <td colspan="4">{{ $controlParental->edad_gestacional ?? '' }}</td>
                        <td colspan="3"></td>
                        <td colspan="3"></td>
                        <td colspan="2"></td>
                        <td colspan="2"></td>
                        <td colspan="2"></td>
                    </tr>
                    <tr>
                        <td colspan="4" style="font-weight: bolder;">Presión arterial (mm/hg)</td>
                        <td colspan="4">{{ $controlParental->presion_arterial ?? '' }}</td>
                        <td colspan="3"></td>
                        <td colspan="3"></td>
                        <td colspan="2"></td>
                        <td colspan="2"></td>
                        <td colspan="2"></td>
                    </tr>
                    <tr>
                        <td colspan="4" style="font-weight: bolder;">Altura uterina</td>
                        <td colspan="4">{{ $controlParental->altura_uterina ?? '' }}</td>
                        <td colspan="3"></td>
                        <td colspan="3"></td>
                        <td colspan="2"></td>
                        <td colspan="2"></td>
                        <td colspan="2"></td>
                    </tr>
                    <tr>
                        <td colspan="4" style="font-weight: bolder;">Presentación</td>
                        <td colspan="4">{{ $controlParental->presentacion ?? '' }}</td>
                        <td colspan="3"></td>
                        <td colspan="3"></td>
                        <td colspan="2"></td>
                        <td colspan="2"></td>
                        <td colspan="2"></td>
                    </tr>
                    <tr>
                        <td colspan="4" style="font-weight: bolder;">FCF</td>
                        <td colspan="4">{{ $controlParental->fcf ?? '' }}</td>
                        <td colspan="3"></td>
                        <td colspan="3"></td>
                        <td colspan="2"></td>
                        <td colspan="2"></td>
                        <td colspan="2"></td>
                    </tr>
                    <tr>
                        <td colspan="4" style="font-weight: bolder;">Peso</td>
                        <td colspan="4">{{ $controlParental->peso ?? '' }}</td>
                        <td colspan="3"></td>
                        <td colspan="3"></td>
                        <td colspan="2"></td>
                        <td colspan="2"></td>
                        <td colspan="2"></td>
                    </tr>
                    <tr>
                        <td colspan="4" style="font-weight: bolder;">Ultrasonido</td>
                        <td colspan="4">{{ $controlParental->ultrasonido ?? '' }}</td>
                        <td colspan="3"></td>
                        <td colspan="3"></td>
                        <td colspan="2"></td>
                        <td colspan="2"></td>
                        <td colspan="2"></td>
                    </tr>
                    <tr>
                        <td colspan="4" style="font-weight: bolder;">Vacunas</td>
                        <td colspan="4">{{ $controlParental->vacunas ?? '' }}</td>
                        <td colspan="3"></td>
                        <td colspan="3"></td>
                        <td colspan="2"></td>
                        <td colspan="2"></td>
                        <td colspan="2"></td>
                    </tr>
                </tbody>
            </table>
            <br />
            <p>Observaciones: <em>{{  $cita->observacion ?? '' }}</em></p>
            <p>Fecha: <em>{{  $cita->fecha_atendida ? date('d/m/Y', strtotime($cita->fecha_atendida)) : '' }}</em></p>
            <p>Motivo de la consulta: <em style="text-decoration: underline;">{{ $cita->motivo ?? '' }}</em></p>
        @endforeach
    </div>
</main>
{{-- </body> --}}
</html>

<script type="text/php">
    if ( isset($pdf) ) {
        $pdf->page_script('
            $font = $fontMetrics->get_font("Arial, Helvetica, sans-serif", "normal");
            $pdf->text(270, 730, "Página $PAGE_NUM de $PAGE_COUNT", $font, 10);
        ');
    }
</script>
