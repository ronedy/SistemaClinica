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

        #tabla-recetas{
            text-align: left;
            border: 1px solid;
        }

        #tabla-recetas,
        #tabla-recetas th,
        #tabla-recetas td,
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
        <h1>RECETA</h1>
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
    <p>
        Fecha de la cita:
    </p>
    <table id="tabla-recetas" style="width: 100%; background-color: lightblue;">
        <tbody>
            <tr >
                <td style="padding: 10px; text-align: justify; white-space: wrap;">
                    {{ $cita->fecha_atendida ? date('d/m/Y', strtotime($cita->fecha_atendida) ) : '' }}
                </td>
            </tr>
        </tbody>
    </table>
    <p>
        Motivo de la consulta:
    </p>
    <table id="tabla-recetas" style="width: 100%; background-color: lightblue;">
        <tbody>
            <tr >
                <td style="padding: 10px; text-align: justify; white-space: wrap;">
                    {{ $cita->motivo ?? '' }}
                </td>
            </tr>
        </tbody>
    </table>
    <p>
        Receta:
    </p>
    <table id="tabla-recetas" style="width: 100%; background-color: lightblue;">
        <tbody>
            <tr>
                <td style="padding: 10px; text-align: justify; white-space: wrap;">
                    {{ $cita->receta ?? '' }}
                </td>
            </tr>
        </tbody>
    </table>
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
