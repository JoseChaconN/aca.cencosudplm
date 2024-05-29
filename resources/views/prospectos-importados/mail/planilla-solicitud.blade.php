<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Información Faltante Requerida</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
        }
        .button {
            display: inline-block;
            padding: 10px 20px;
            margin: 10px 0;
            background-color: #007BFF;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }
        .button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <h1>Información Faltante Requerida para la Solicitud de Prospecto</h1>
    
    <p>Estimado/a {{ $data['data']->responsable_comercial->name.' '.$data['data']->responsable_comercial->last_name }},</p>
    
    <p>Esperamos que este mensaje le encuentre bien. Nos estamos comunicando con usted para informarle que hemos revisado la solicitud de prospecto de productos y <br>hemos notado que falta información esencial que es necesaria para continuar con el proceso.</p>
    
    <h2>Detalles de la información faltante:</h2>
    @foreach ($data['data']->productos_solicitud_prospecto as $item)
        <h3>{{ $item->product_name_comercial }}</h3>
        <ul>
            @foreach ($data['nutrient_headers'] as $nutrient => $present)
                @if (!empty($item->obs->{$nutrient}) || !empty($item->obs->{$nutrient . '_reconstitued'}))
                    <li>
                        {{ ucfirst(str_replace('_', ' ', $nutrient)) }} : {{ !empty($item->obs->{$nutrient}) ? $item->obs->{$nutrient} : (!empty($item->obs->{$nutrient . '_reconstitued'}) ? $item->obs->{$nutrient . '_reconstitued'} : '') }}    
                    </li>
                @endif
            @endforeach
            @foreach ($data['other_field_headers'] as $label => $present)
                @if ($present)
                    @php
                        $field = $data['other_fields'][$label] ?? null;
                        if (is_array($field)) {
                            $value = array_reduce($field, function ($carry, $subField) use ($item) {
                                return $carry ?: (!empty($item->obs->{$subField}) ? $item->obs->{$subField} : null);
                            }, null);
                        } else {
                            $value = !empty($item->obs->{$field}) ? $item->obs->{$field} : '';
                        }
                    @endphp
                    @if (!empty($value))
                        <li>{{ $label }} : {{ $value }}</li>
                    @endif
                @endif
            @endforeach
        </ul>
    @endforeach
    
    <p>Le solicitamos amablemente que revise los documentos adjuntos y complemente la información faltante a la brevedad posible. Es crucial completar estos datos para evitar retrasos <br>en el procesamiento de la solicitud y para cumplir con nuestras normativas internas.</p>
    
    <p>Adjunto encontrará un resumen de los productos y la información que falta.</p>
    
    <p>Apreciamos su pronta respuesta a este asunto y quedamos a su disposición para cualquier consulta o aclaración que pueda tener. Puede responder a este correo electrónico directamente.</p>
    
    <p>Agradecemos de antemano su colaboración y esfuerzo para resolver esta situación.</p>
    
    <p>Saludos cordiales,</p>
    <p>Equipo de Calidad Aca Importados.</p>
</body>
</html>
