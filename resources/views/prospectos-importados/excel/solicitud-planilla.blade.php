<!DOCTYPE html>
<html>
    <head>
        <style>
            th, td {
                border: 1px solid #000;
                width: 150px;
                text-align: center;
            }
            th {
                background-color: #99CCFF;
            }
        </style>
    </head>
    <body>
        @foreach ($data->productos_solicitud_prospecto as $item)
            <pre>{{ json_encode($item->obs, JSON_PRETTY_PRINT) }}</pre>
        @endforeach
        <table>
            <tr>
                <th colspan="7" style="font:bold">PLANILLA SOLICITUD PARA PROVEEDORES IMPORTADOS</th>
            </tr>
        </table>
        <br><br>
        <table>
            <tr>
                <th>NAME OF SUPPLIER</th>
                <th>{{ $data->nombre_proveedor }}</th>
            </tr>
            <tr>
                <th>Date</th>
                <th>{{ date('d-m-Y') }}</th>
            </tr>
        </table>
        <br><br>
        <table>
            <thead>
                <tr>
                    <th align="center" style="background-color:#99CCFF;text-aling: center ;border: 1px solid #0000;width:150px">UPC or EAN code</th>
                    <th align="center" style="background-color:#99CCFF;text-aling: center ;border: 1px solid #0000;width:150px">Name of the product</th>
                    <th align="center" style="background-color:#99CCFF;text-aling: center ;border: 1px solid #0000;width:150px">Observation</th>
                    <th align="center" style="background-color:#99CCFF;text-aling: center ;border: 1px solid #0000;width:150px">Origin CLAIM</th>
                    <th align="center" style="background-color:#99CCFF;text-aling: center ;border: 1px solid #0000;width:150px">Ley 20,606_ 2019</th>
                    <th align="center" style="background-color:#99CCFF;text-aling: center ;border: 1px solid #0000;width:150px">Categoría alimento</th>
                    <th align="center" style="background-color:#99CCFF;text-aling: center ;border: 1px solid #0000;width:150px">Grasas trans de origen aceites hidrogenados</th>
                    @foreach ($nutrient_headers as $nutrient => $present)
                        <th align="center" style="background-color:#99CCFF;text-aling: center ;border: 1px solid #0000;width:150px">{{ ucfirst(str_replace('_', ' ', $nutrient)) }}</th>
                    @endforeach
                    @foreach ($other_field_headers as $label => $present)
                        @if ($present)
                            <th align="center" style="background-color:#99CCFF;text-aling: center ;border: 1px solid #0000;width:150px">{{ $label }}</th>
                        @endif
                    @endforeach
                </tr>
            </thead>
            <tbody>
                @foreach ($data->productos_solicitud_prospecto as $item)
                    <tr>
                        <td style="border: 1px solid #0000;width:150px;">{{ $item->upc_bar_code }}</td>
                        <td style="border: 1px solid #0000;width:150px;">{{ $item->product_name }}</td>
                        <td style="border: 1px solid #0000;width:150px;">{{ $item->comments }}</td>
                        <td style="border: 1px solid #0000;width:150px;">{{ $item->claims_origin }}</td>
                        <td style="border: 1px solid #0000;width:150px;">Agregar sellos</td>
                        <td style="border: 1px solid #0000;width:150px;">Alimento</td>
                        <td style="border: 1px solid #0000;width:150px;">{{ $item->trans_fats_hydrogenated_origin }}</td>
                        @foreach ($nutrient_headers as $nutrient => $present)
                            <td style="border: 1px solid #0000;width:150px;">
                                {{ !empty($item->obs->{$nutrient}) ? 'X' : (!empty($item->obs->{$nutrient . '_reconstitued'}) ? 'X' : '') }}
                                {{-- !empty($item->obs->{$nutrient}) ? $item->obs->{$nutrient} : (!empty($item->obs->{$nutrient . '_reconstitued'}) ? $item->obs->{$nutrient . '_reconstitued'} : '') --}}
                            </td>
                        @endforeach
                        @foreach ($other_field_headers as $label => $present)
                            @if ($present)
                                @php
                                    $field = $other_fields[$label] ?? null;
                                    if (is_array($field)) {
                                        $value = array_reduce($field, function ($carry, $subField) use ($item) {
                                            return $carry ?: (!empty($item->obs->{$subField}) ? $item->obs->{$subField} : null);
                                        }, null);
                                    } else {
                                        #$value = !empty($item->obs->{$field}) ? $item->obs->{$field} : '';
                                        $value = 'X'; #: '';
                                    }
                                @endphp
                                <td style="border: 1px solid #0000;width:150px;">{{ (!empty($value) ? 'X' : '') }}</td>
                            @endif
                        @endforeach
                    </tr>
                @endforeach
            </tbody>
        </table>
    </body>
</html>