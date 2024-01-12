<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">    
    <title>Document</title>
    <style>
        .new-page{
            page-break-after: always;
        }
        .header{
            margin-left: -12%;
            margin-top:-6%;
            width: 120%;
            height: auto;
        }
        tr.spaceUnder>td {
            padding-bottom: 1em;
        }
        @page {
            margin-left: 15px;
            margin-right: 15px;
        }
        .two-columns {
            width: 100%;
        }
        .left-columns-td {
            width: 70%;
            /*border: 1px solid #000; /* Borde para visualización */
            vertical-align: top;
        }
        .right-columns-td {
            width: 30%;
            /*border: 1px solid #000; /* Borde para visualización */
            vertical-align: top;
        }
        .full-columns-td {
            width: 100%;
            /*border: 1px solid #000; /* Borde para visualización */
            vertical-align: top;
            
        }
        .table-data{
            font-size: 13px;
        }
    </style>   
</head>
<body style="font-family: helvetica;margin:0px">
    <img src="{{public_path('/img/header-pdf.png')}}" class="header" alt="">
    <h3 style="margin-top:-7%;color:white;">{{$data->nombre_producto}}</h3>
    <div class="section">
        <table class="table-data two-columns">
            <tr>
                <td class="left-columns-td">
                    <table cellspacing="10">
                        <tr class="spaceUnder">
                            <td><b>Fecha de Cierre:</b> {{!empty($data->fecha_cierre) ? date('d-m-Y',strtotime($data->fecha_cierre)) : '' }}</td>
                        </tr>
                        <tr class="spaceUnder">
                            <td><b>Proveedor:</b> {{$proveedor->nombre}}</td>
                            <td><b>Marca:</b> {{$data->marca}}</td>
                        </tr>
                        <tr class="spaceUnder">
                            <td><b>Sección:</b> {{$data->seccion}}</td>
                            <td><b>Vida Útil:</b> {{$data->vida_util_producto.' '.$data->tiempo_vida_util_producto}}</td>
                        </tr>
                        <tr class="spaceUnder">
                            <td><b>Análisis de Rotulación Alimentos</b></td>
                        </tr>
                        <tr class="spaceUnder">
                            <td><b>Código de Barra:</b> {{$data->codigo_barra}}</td>
                            <td><b>País de Origen:</b> {{$data->pais->nombre}}</td>
                        </tr>
                        <tr class="spaceUnder">
                            <td><b>Nombre del Alimento:</b> {{$data->nombre_producto}}</td>
                            <td><b>Fecha de Vencimiento/Duración:</b> {{$data->fecha_venc_dura}}</td>
                        </tr>
                        <tr class="spaceUnder">
                            <td><b>Nombre del Fabricante:</b> {{$data->nombre_fabricante}}</td>
                            <td><b>Contenido Neto:</b> {{$data->cont_neto}}</td>
                        </tr>
                        <tr class="spaceUnder">
                            <td><b>Nombre y domicilio del importador:</b> {{$data->nombre_domicilio_importador}}</td>
                            <td><b>Indicaciones de uso:</b> {{$data->indica_uso}}</td>
                        </tr>
                        <tr class="spaceUnder">
                            <td><b>Domicilio del proveedor:</b> {{$data->domicilio_prov}}</td>
                            <td><b>Fecha de Elaboración o envasado/lote:</b> {{$data->fecha_elab_envase}}</td>
                        </tr>
                        <tr class="spaceUnder">
                            <td><b>Instrucciones de almacenamiento:</b> {{$data->instru_almacena}}</td>
                        </tr>
                    </table>
                </td>
                <td class="right-columns-td">
                    <table>
                        @if(!empty($data->getMedia('imagenes_producto')))
                            @foreach ($data->getMedia('imagenes_producto') as $item)
                                <img src="{{$item->getUrl()}}" style="max-height: auto;max-width: 200px;">
                                <br>
                                <br>
                            @endforeach
                        @endif
                    </table>
                </td>
            </tr>
            <tr>
                <td class="full-columns-td" colspan="2">
                    <table cellspacing="10">
                        <tr class="spaceUnder">
                            <td><b>Ingredientes:</b> {{$data->ingredientes}}</td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
    </div>
    <div class="new-page"></div>
    <img src="{{public_path('/img/header-pdf.png')}}" class="header" alt="">
    <h3 style="margin-top:-7%;color:white;">{{$data->nombre_producto}}</h3>
    <div class="section">
        <table class="table-data two-columns">
            <tr>
                <td class="left-columns-td">
                    <table cellspacing="10">
                        <tr class="spaceUnder">
                            <td colspan="2"><b>Información Nutricional y Análisis Características Organolépticas</td>
                        </tr>
                        <tr class="spaceUnder">
                            <td>
                                @if(!empty($data->getMedia('imagenes_nutricional_producto')))
                                    @foreach ($data->getMedia('imagenes_nutricional_producto') as $item)
                                        <img src="{{$item->getUrl()}}" style="max-height: auto;max-width: 250px;">                                        
                                    @endforeach
                                @endif
                            </td>
                            <td style="vertical-align: top">
                                <b>Apariencia:</b> NE
                                <br><br>
                                <b>Sabor:</b> NE
                                <br><br>
                                <b>Color:</b> NE
                                <br><br>
                                <b>Aroma:</b> NE
                                <br><br>
                                <b>Textura:</b> NE
                            </td>
                        </tr>
                    </table>
                </td>
                <td class="right-columns-td">
                    <table cellspacing="10">
                        @if ($data->alto_calorias == 'sí')
                            <tr>
                                <td><img src="{{public_path('/img/calorias.png')}}" style="max-height: auto;max-width: 100px;"></td>
                            </tr>
                        @endif
                        @if ($data->alto_grasas_saturadas == 'sí')
                            <tr>
                                <td><img src="{{public_path('/img/saturadas.png')}}" style="max-height: auto;max-width: 100px;"></td>
                            </tr>
                        @endif
                        @if ($data->alto_azucares == 'sí')
                            <tr>
                                <td><img src="{{public_path('/img/azucares.png')}}" style="max-height: auto;max-width: 100px;"></td>
                            </tr>
                        @endif
                        @if ($data->alto_sodio == 'sí')
                            <tr>
                                <td><img src="{{public_path('/img/sodio.png')}}" style="max-height: auto;max-width: 100px;"></td>
                            </tr>
                        @endif
                    </table>
                </td>
            </tr>
            <tr>
                <td class="full-columns-td" colspan="2">
                    <table cellspacing="10">
                        <tr class="spaceUnder">
                            <td><b>Observaciones Disco Pare Ley 20.606:</b> {{$data->disco_obs}}</td>
                        </tr>
                        <tr>
                            <td><b>Características Físicas y Certificaciones</b></td>
                        </tr>
                        <tr>
                            <td>Dimensiones: NA</td>
                        </tr>
                        <tr>
                            <td>Rendimiento: NA</td>
                        </tr>
                        <tr>
                            <td><b>Conclusiones: </b>{{ $data->estado_cl === 2 ? 'Aprobado' : ($data->estado_cl === 3 ? 'Rechazado' : 'Pendiente') }}</td>
                        </tr>
                        <tr>
                            <td>{{$data->observacion_solicitud}}</td>
                        </tr>
                        <tr>
                            <td><b>Datos Contacto Proveedor</b></td>
                        </tr>
                        <tr>
                            <td><b>Nombre Empresa: </b>{{$data->nombre_fabricante}}</td>
                        </tr>
                        @foreach ($proveedor->contactos_comercial as $item)
                            <tr>
                                <td><b>Nombre Contacto Comercial: </b>{{$item->nombre}}</td>
                                <td><b>E-mail: </b>{{$item->email}}</td>
                                <td><b>Teléfono: </b>{{$item->telefono}}</td>
                            </tr>
                        @endforeach
                    </table>
                </td>
            </tr>
        </table>
    </div>
    <div class="new-page"></div>
    <img src="{{public_path('/img/header-pdf.png')}}" class="header" alt="">
    <h3 style="margin-top:-7%;color:white;">{{$data->nombre_producto}}</h3>
    <div class="section">
        <table>
            <tr>
                <td><b>Certificaciones</b></td>
            </tr>
            @if (empty($data->certificaciones))
                <tr>
                    <td>El producto no tiene certificaciones asociadas.</td>
                </tr>
            @endif
            @foreach ($data->certificaciones as $item)
                <tr><td>* {{$item->documento->nombre}}</td></tr>
            @endforeach
        </table>
    </div>
</body>