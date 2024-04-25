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
        .image-data{
            max-width: 500px;
            height: auto;
        }
        tr.spaceUnder>td {
            /*padding-bottom: 1em;*/
            border: 1px solid #000; /* Borde para visualización */
        }
        .bg-cencosud{
            background-color: #3399FF;
            color: #ffff;
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
    <h3 style="margin-top:-7%;color:white;">{{$producto->product_name}}</h3>
    <div class="section">
        <table class="table-data" cellspacing="0" cellpadding="8" style="width: 100%">
            <tr class="">
                <td><h3>1.- PRODUCT INFORMATION</h3></td>
            </tr>
            <tr class="spaceUnder">
                <td><b>SAP:</b>{{$producto->sap}}</td>
            </tr>
            <tr class="spaceUnder">
                <td><b>Product Name(*):</b>{{ $producto->product_name }}</td>
            </tr>
            <tr class="spaceUnder">
                <td><b>Nombre producto español:</b>{{ $producto->product_name_spanish }}</td>
            </tr>
            <tr class="spaceUnder">
                <td><b>Claims origin:</b>{{ $producto->claims_origin }}</td>
            </tr>
            <tr class="spaceUnder">
                <td><b>Comments:</b>{{ $producto->comments }}</td>
            </tr>
            <tr class="spaceUnder">
                <td><b>Name and organic certifying number:</b>{{ $producto->name_organic_certifying_number }}</td>
            </tr>
            <tr class="spaceUnder">
                <td><b>Plant number o Factory (SAG)(**):</b>{{ $producto->plant_number_factory }}</td>
            </tr>
            <tr class="spaceUnder">
                <td><b>Net weight(*):</b>{{ $producto->net_weight }}</td>
            </tr>
            <tr class="spaceUnder">
                <td><b>Drained weight(**):</b>{{ $producto->drained_weight }}</td>
            </tr>
            <tr class="spaceUnder">
                <td><b>Units per packaging(*):</b>{{ $producto->units_x_packaging }}</td>
            </tr>
            <tr class="spaceUnder">
                <td><b>Country of origin(*):</b>{{ $producto->country }}</td>
            </tr>
            <tr class="spaceUnder">
                <td><b>Milking country:</b>{{ $producto->milking_country }}</td>
            </tr>
            <tr class="spaceUnder">
                <td><b>To indicate the type expiration date used ( Expiration date and lot number or elaboration and expiration date or date of elaboration and shelf life)(*):</b>{{ $producto->expiration_date }}</td>
            </tr>
            <tr class="spaceUnder">
                <td><b>Name and adress manufacturer(*):</b>{{ $producto->name_adress_manufacturer }}</td>
            </tr>
            <tr class="spaceUnder">
                <td><b>Shelf life(*):</b>{{ $producto->shelf_life }}</td>
            </tr>
            <tr class="spaceUnder">
                <td><b>UPC or Bar Code(*):</b>{{ $producto->upc_bar_code }}</td>
            </tr>
            <tr class="spaceUnder">
                <td><b>Storage conditions(*) :</b>{{ $producto->storage_conditions }}</td>
            </tr>
            <tr class="spaceUnder">
                <td><b>Method of preparation(**):</b>{{ $producto->method_preparation }}</td>
            </tr>
            <tr class="spaceUnder">
                <td><b>Name of supplier(*):</b>{{ $producto->name_supplier }}</td>
            </tr>
            <tr class="spaceUnder">
                <td><b>Ingredients(*):</b>{{ $producto->ingredients }}</td>
            </tr>
            @if (!empty($producto->porcent_organic_ingredients))                
                <tr class="spaceUnder">
                    <td><b>For organic products, indicate % of organic ingredients:</b>{{ $producto->porcent_organic_ingredients }}</td>
                </tr>
            @endif
            @if (!empty($producto->porcent_characterizing_ingredients))                
                <tr class="spaceUnder">
                    <td><b>Indicate % characterizing ingredients:</b>{{ $producto->porcent_characterizing_ingredients }}</td>
                </tr>
            @endif
            @if (!empty($producto->name_additive))                
                <tr class="spaceUnder">
                    <td><b>To indicate name additive:</b>{{ $producto->name_additive }}</td>
                </tr>
            @endif
            @if (!empty($producto->porcent_additive))                
                <tr class="spaceUnder">
                    <td><b>To indicate quantity of additive ( ppm or %) (**):</b>{{ $producto->porcent_additive }}</td>
                </tr>
            @endif
            @if (!empty($producto->quantity_additive))                
                <tr class="spaceUnder">
                    <td><b>To indicate quantity of additive ( (**):</b>{{ $producto->quantity_additive }}</td>
                </tr>
            @endif
            @if (!empty($producto->indicate_additive_code))                
                <tr class="spaceUnder">
                    <td><b>To indicate additive code SIN ( CODEX):</b>{{ $producto->indicate_additive_code }}</td>
                </tr>
            @endif
            @if (!empty($producto->indicate_additive_functionality))                
                <tr class="spaceUnder">
                    <td><b>To indicate additive functionality ( CODEX):</b>{{ $producto->indicate_additive_functionality }}</td>
                </tr>
            @endif
            @if (!empty($producto->vegetable_oil_fat_used))                
                <tr class="spaceUnder">
                    <td><b>To indicate type fo vegetable oil or fat used(**):</b>{{ $producto->vegetable_oil_fat_used }}</td>
                </tr>
            @endif
            @if (!empty($producto->trans_fats_hydrogenated_origin))                
                <tr class="spaceUnder">
                    <td><b>indicate if there are trans fats of hydrogenated origin:</b>{{ $producto->trans_fats_hydrogenated_origin }}</td>
                </tr>
            @endif
            @if (!empty($producto->spices_herbs_used))                
                <tr class="spaceUnder">
                    <td><b>To Indicate names of spices and herbs used (**):</b>{{ $producto->spices_herbs_used }}</td>
                </tr>
            @endif
            @if (!empty($producto->quantity_sweetener_per_100_gr_ml))                
                <tr class="spaceUnder">
                    <td><b>To indicate quantity of sweetener per 100 grams or ml of CYCLAMAT, ASPARTAME, SUCRALOSE, ACESULFAM K, SACHARINE, STEVIA, ALITAME ( mg) (**):</b>{{ $producto->quantity_sweetener_per_100_gr_ml }}</td>
                </tr>
            @endif
            @if (!empty($producto->flavourings_aroma_natural_artificial))                
                <tr class="spaceUnder">
                    <td><b>To indicate if flavourings or aroma used are natural or artificial (**):</b>{{ $producto->flavourings_aroma_natural_artificial }}</td>
                </tr>
            @endif
            @if (!empty($producto->quantity_x_m_s_g))                
                <tr class="spaceUnder">
                    <td><b>To indicate quantity of xilitol, maltitol, sorbitol, glicerol (g/100g) (**):</b>{{ $producto->quantity_x_m_s_g }}</td>
                </tr>
            @endif
            @if (!empty($producto->quantity_caffeine))                
                <tr class="spaceUnder">
                    <td><b>To indicate quantity of caffeine (mg/100g) used (**):</b>{{ $producto->quantity_caffeine }}</td>
                </tr>
            @endif
            @if (!empty($producto->any_extract_used))                
                <tr class="spaceUnder">
                    <td><b>If there's any extract used, to indicate function, chemical process and name of the component extracted (**):</b>{{ $producto->any_extract_used }}</td>
                </tr>
            @endif
            @if (!empty($producto->origin_gelatin))                
                <tr class="spaceUnder">
                    <td><b>To indicate origin of gelatin used   ( Pork or Bovine) (**):</b>{{ $producto->origin_gelatin }}</td>
                </tr>
            @endif
            @if (!empty($producto->brix_final_product))                
                <tr class="spaceUnder">
                    <td><b>To indicate  ° Brix of the final product (customs requirement):</b>{{ $producto->brix_final_product }}</td>
                </tr>
            @endif
            @if (!empty($producto->brix_final_product_without_added_sugar))                
                <tr class="spaceUnder">
                    <td><b>To indicate  ° Brix of the final product without added sugar(**):</b>{{ $producto->brix_final_product_without_added_sugar }}</td>
                </tr>
            @endif
            @if (!empty($producto->brix_fruit_greater_proportion_drink))                
                <tr class="spaceUnder">
                    <td><b>To indicate ° Brix of the fruit that is in greater proportion in the drink(**):</b>{{ $producto->brix_fruit_greater_proportion_drink }}</td>
                </tr>
            @endif
            @if (!empty($producto->names_colourings))                
                <tr class="spaceUnder">
                    <td><b>To indicate names of colourings used (**):</b>{{ $producto->names_colourings }}</td>
                </tr>
            @endif
            @if (!empty($producto->minimum_porcent_cocoa_solids))                
                <tr class="spaceUnder">
                    <td><b>To indicate minimum % of cocoa solids used (**):</b>{{ $producto->minimum_porcent_cocoa_solids }}</td>
                </tr>
            @endif
            @if (!empty($producto->porcent_cocoa_butter_cocoa_mass))                
                <tr class="spaceUnder">
                    <td><b>To indicate the % of cocoa butter  from recipe and as part of cocoa mass (**):</b>{{ $producto->porcent_cocoa_butter_cocoa_mass }}</td>
                </tr>
            @endif
        </table>
        {{-- <table class="table-data two-columns">
            <tr>
                <td class="left-columns-td">
                    <table cellspacing="10">
                        <tr class="">
                            <td><h3>1.- PRODUCT INFORMATION</h3></td>
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
                            <td><b>Nombre del Alimento:</b> {{$producto->product_name}}</td>
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
        </table> --}}
    </div>
    <div class="new-page"></div>
    <img src="{{public_path('/img/header-pdf.png')}}" class="header" alt="">
    <h3 style="margin-top:-7%;color:white;">{{$producto->product_name}}</h3>
    <div class="section">
        {{-- <table class="table-data two-columns">
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
        </table> --}}
        <table class="table-data" cellspacing="0" cellpadding="8" style="width: 100%">
            <tr class="">
                <td><h3>2.- ALLERGEN INFORMATION(*)</h3></td>
            </tr>
            <tr class="spaceUnder">
                <td></td>
                <td><b>YES</b></td>
                <td><b>NO</b></td>
                <td></td>
            </tr>
            <tr class="spaceUnder">
                <td><b>Does this item or its process line contain potential allergens?:</b></td>
                <td>{{ ($producto->contain_potential_allergens == 'sí') ? 'X' : ''; }}</td>
                <td>{{ ($producto->contain_potential_allergens == 'no') ? 'X' : ''; }}</td>
                <td></td>
            </tr>            
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr class="spaceUnder">
                <td></td>
                <td><b>YES</b></td>
                <td><b>NO</b></td>
                <td>Please list</td>
            </tr>
            <tr class="spaceUnder">
                <td><b>Cereals with gluten</b></td>
                <td>{{ ($producto->cereals_gluten == 'SI') ? 'X' : '' }}</td>
                <td>{{ ($producto->cereals_gluten == 'NO') ? 'X' : '' }}</td>
                <td>{{ $producto->cereals_gluten_list }}</td>
            </tr>
            <tr class="spaceUnder">
                <td><b>Crustacean and products</b></td>
                <td>{{ ($producto->crustacean_products == 'SI') ? 'X' : '' }}</td>
                <td>{{ ($producto->crustacean_products == 'NO') ? 'X' : '' }}</td>
                <td>{{ $producto->crustacean_products_list }}</td>
            </tr>
            <tr class="spaceUnder">
                <td><b>Egg and derivatives</b></td>
                <td>{{ ($producto->egg_derivatives == 'SI') ? 'X' : '' }}</td>
                <td>{{ ($producto->egg_derivatives == 'NO') ? 'X' : '' }}</td>
                <td>{{ $producto->egg_derivatives_list }}</td>
            </tr>
            <tr class="spaceUnder">
                <td><b>Fish and derivatives</b></td>
                <td>{{ ($producto->fish_derivatives == 'SI') ? 'X' : '' }}</td>
                <td>{{ ($producto->fish_derivatives == 'NO') ? 'X' : '' }}</td>
                <td>{{ $producto->fish_derivatives_list }}</td>
            </tr>
            <tr class="spaceUnder">
                <td><b>Peanuts, Soy  and derivatives</b></td>
                <td>{{ ($producto->peanuts_soy_derivatives == 'SI') ? 'X' : '' }}</td>
                <td>{{ ($producto->peanuts_soy_derivatives == 'NO') ? 'X' : '' }}</td>
                <td>{{ $producto->peanuts_soy_derivatives_list }}</td>
            </tr>
            <tr class="spaceUnder">
                <td><b>milk and dairy derivatives</b></td>
                <td>{{ ($producto->milk_dairy_derivatives == 'SI') ? 'X' : '' }}</td>
                <td>{{ ($producto->milk_dairy_derivatives == 'NO') ? 'X' : '' }}</td>
                <td>{{ $producto->milk_dairy_derivatives_list }}</td>
            </tr>
            <tr class="spaceUnder">
                <td><b>Nuts and derivatives</b></td>
                <td>{{ ($producto->nuts_derivatives == 'SI') ? 'X' : '' }}</td>
                <td>{{ ($producto->nuts_derivatives == 'NO') ? 'X' : '' }}</td>
                <td>{{ $producto->nuts_derivatives_list }}</td>
            </tr>
            <tr class="spaceUnder">
                <td><b>Sulfites And derivatives (concentrations of more than 10mg)</b></td>
                <td>{{ ($producto->sulfites_derivatives == 'SI') ? 'X' : '' }}</td>
                <td>{{ ($producto->sulfites_derivatives == 'NO') ? 'X' : '' }}</td>
                <td>{{ $producto->sulfites_derivatives_list }}</td>
            </tr>
        </table>
        
    </div>
    <div class="new-page"></div>
    <img src="{{public_path('/img/header-pdf.png')}}" class="header" alt="">
    <h3 style="margin-top:-7%;color:white;">{{$producto->product_name}}</h3>
    <div class="section">
        <table class="table-data" cellspacing="0" cellpadding="8" style="width: 100%">
            <tr class="">
                <td><h3>3.- CERTIFICATES</h3></td>
            </tr>
            @if (!empty($adjunto_certificaciones_fijas_producto))
                <tr>
                    <td></td>
                    <td><b>YES</b></td>
                </tr>
            @endif
            @forelse ($adjunto_certificaciones_fijas_producto as $item)
                <tr class="spaceUnder">
                    <td><b>{{ $item['name'] }}</b></td>
                    <td>X</td>
                </tr>
            @empty
               
            @endforelse
            {{-- <tr class="spaceUnder">
                <td><b>Health Certificate ( Conventional Foods) for SEREMI</b></td>
                <td></td>
                <td></td>
            </tr>
            <tr class="spaceUnder">
                <td><b>Health Certificate ( milk, beef, cheese, yoghurt, sausages) for SAG</b></td>
                <td></td>
                <td></td>
            </tr>
            <tr class="spaceUnder">
                <td><b>Phitosanitary  Certificate ( spices, fresh fruits, nuts, cereals, etc) for SAG</b></td>
                <td></td>
                <td></td>
            </tr>
            <tr class="spaceUnder">
                <td><b>Certificate of legal Origin ( fish and derivatives) for SERNAPESCA</b></td>
                <td></td>
                <td></td>
            </tr>
            <tr class="spaceUnder">
                <td><b>Organic Master Certificate</b></td>
                <td></td>
                <td></td>
            </tr>
            <tr class="spaceUnder">
                <td><b>Transactional Certificate</b></td>
                <td></td>
                <td></td>
            </tr>
            <tr class="spaceUnder">
                <td><b>Gluten Free</b></td>
                <td></td>
                <td></td>
            </tr>
            <tr class="spaceUnder">
                <td><b>Gluten Free ( Crossed out spike on main face)</b></td>
                <td></td>
                <td></td>
            </tr>
            <tr class="spaceUnder">
                <td><b>Gluten Free ( Crossed out spike on another face)</b></td>
                <td></td>
                <td></td>
            </tr>
            <tr class="spaceUnder">
                <td><b>Gluten Free ( It does not have a crossed out spike)</b></td>
                <td></td>
                <td></td>
            </tr>
            <tr class="spaceUnder">
                <td><b>Lactose Free</b></td>
                <td></td>
                <td></td>
            </tr>
            <tr class="spaceUnder">
                <td><b>Aloine</b></td>
                <td></td>
                <td></td>
            </tr>
            <tr class="spaceUnder">
                <td><b>Alcohol Free</b></td>
                <td></td>
                <td></td>
            </tr>
            <tr class="spaceUnder">
                <td><b>HACCP certificate</b></td>
                <td></td>
                <td></td>
            </tr>
            <tr class="spaceUnder">
                <td><b>BPM certificate</b></td>
                <td></td>
                <td></td>
            </tr>
            <tr class="spaceUnder">
                <td><b>Kosher certificate</b></td>
                <td></td>
                <td></td>
            </tr>
            <tr class="spaceUnder">
                <td><b>Jalal certificate</b></td>
                <td></td>
                <td></td>
            </tr>
            <tr class="spaceUnder">
                <td><b>Non GMO certificate</b></td>
                <td></td>
                <td></td>
            </tr>
            <tr class="spaceUnder">
                <td><b>Animal Welfare certificate</b></td>
                <td></td>
                <td></td>
            </tr>
            <tr class="spaceUnder">
                <td><b>Vegan certificate</b></td>
                <td></td>
                <td></td>
            </tr>
            <tr class="spaceUnder">
                <td><b>Vegetarian certificate</b></td>
                <td></td>
                <td></td>
            </tr>
            <tr class="spaceUnder">
                <td><b>Clean label</b></td>
                <td></td>
                <td></td>
            </tr>
            <tr class="spaceUnder">
                <td><b>Ecofriendly</b></td>
                <td></td>
                <td></td>
            </tr>
            <tr class="spaceUnder">
                <td><b>BRC Certificate</b></td>
                <td></td>
                <td></td>
            </tr>
            <tr class="spaceUnder">
                <td><b>IFS Certificate</b></td>
                <td></td>
                <td></td>
            </tr>
            <tr class="spaceUnder">
                <td><b>FSC22000 Certificate</b></td>
                <td></td>
                <td></td>
            </tr>
            <tr class="spaceUnder">
                <td><b>Other Certificate</b></td>
                <td></td>
                <td></td>
            </tr>
            <tr class="spaceUnder">
                <td><b>Certification Free of AFP ( American Foulbrood Bee) for Honey</b></td>
                <td></td>
                <td></td>
            </tr>
            <tr class="spaceUnder">
                <td><b>Termograph (**) For shipments with frozen and refrigerated foods, it´s mandatory</b></td>
                <td></td>
                <td></td>
            </tr> --}}
        </table>
        {{-- <table>
            <tr>
                <td><b>Certificaciones</b></td>
            </tr>
            @if (empty($data->certificaciones))
                <tr>
                    <td>El producto no tiene certificaciones asociadas.</td>
                </tr>
            @endif
            
        </table> --}}
    </div>
    <div class="new-page"></div>
    <img src="{{public_path('/img/header-pdf.png')}}" class="header" alt="">
    <h3 style="margin-top:-7%;color:white;">{{$producto->product_name}}</h3>
    <div class="section">
        <table class="table-data" cellspacing="0" cellpadding="8" style="width: 100%">
            <tr class="">
                <td><h3>4.- MICROBIOLOGICAL LIMITS(*)</h3></td>
            </tr>
            <tr class="spaceUnder">
                <td></td>
                <td><b>Indicate results</b></td>
            </tr>
            @if (!empty($producto->total_plate_count))
                <tr class="spaceUnder">
                    <td><b>Total Plate Count</b></td>
                    <td>{{ $producto->total_plate_count }}</td>
                </tr>    
            @endif
            @if (!empty($producto->coliform))
                <tr class="spaceUnder">
                    <td><b>Coliform</b></td>
                    <td>{{ $producto->coliform }}</td>
                </tr>    
            @endif
            @if (!empty($producto->e_coli))
                <tr class="spaceUnder">
                    <td><b>E. Coli</b></td>
                    <td>{{ $producto->e_coli }}</td>
                </tr>    
            @endif
            @if (!empty($producto->e_coli_100))
                <tr class="spaceUnder">
                    <td><b>E. coli in 100ml</b></td>
                    <td>{{ $producto->e_coli_100 }}</td>
                </tr>    
            @endif
            @if (!empty($producto->e_coli_0157_h7))
                <tr class="spaceUnder">
                    <td><b>E. Coli 0157:H7</b></td>
                    <td>{{ $producto->e_coli_0157_h7 }}</td>
                </tr>    
            @endif
            @if (!empty($producto->campylobacter))
                <tr class="spaceUnder">
                    <td><b>Campylobacter</b></td>
                    <td>{{ $producto->campylobacter }}</td>
                </tr>    
            @endif
            @if (!empty($producto->bacillus_cereus))
                <tr class="spaceUnder">
                    <td><b>Bacillus cereus</b></td>
                    <td>{{ $producto->bacillus_cereus }}</td>
                </tr>    
            @endif
            @if (!empty($producto->staphylococcus))
                <tr class="spaceUnder">
                    <td><b>Staphylococcus aureus</b></td>
                    <td>{{ $producto->staphylococcus }}</td>
                </tr>    
            @endif
            @if (!empty($producto->clostridium_perfringens))
                <tr class="spaceUnder">
                    <td><b>Clostridium perfringens</b></td>
                    <td>{{ $producto->clostridium_perfringens }}</td>
                </tr>    
            @endif
            @if (!empty($producto->listeria_monocytogenes))
                <tr class="spaceUnder">
                    <td><b>Listeria Monocytogenes</b></td>
                    <td>{{ $producto->listeria_monocytogenes }}</td>
                </tr>    
            @endif
            @if (!empty($producto->enterobacteria))
                <tr class="spaceUnder">
                    <td><b>Enterobacteria</b></td>
                    <td>{{ $producto->enterobacteria }}</td>
                </tr>    
            @endif
            @if (!empty($producto->mold))
                <tr class="spaceUnder">
                    <td><b>Mold</b></td>
                    <td>{{ $producto->mold }}</td>
                </tr>    
            @endif
            @if (!empty($producto->yeast))
                <tr class="spaceUnder">
                    <td><b>Yeast</b></td>
                    <td>{{ $producto->yeast }}</td>
                </tr>    
            @endif
            @if (!empty($producto->mold_count))
                <tr class="spaceUnder">
                    <td><b>Mold count</b></td>
                    <td>{{ $producto->mold_count }}</td>
                </tr>    
            @endif
            @if (!empty($producto->yeast_count))
                <tr class="spaceUnder">
                    <td><b>Yeast count</b></td>
                    <td>{{ $producto->yeast_count }}</td>
                </tr>    
            @endif
            @if (!empty($producto->salmonella_25))
                <tr class="spaceUnder">
                    <td><b>Salmonella in 25g</b></td>
                    <td>{{ $producto->salmonella_25 }}</td>
                </tr>    
            @endif
            @if (!empty($producto->salmonella_50))
                <tr class="spaceUnder">
                    <td><b>Salmonella in 50g</b></td>
                    <td>{{ $producto->salmonella_50 }}</td>
                </tr>    
            @endif
            @if (!empty($producto->lactobacillus))
                <tr class="spaceUnder">
                    <td><b>Lactobacillus</b></td>
                    <td>{{ $producto->lactobacillus }}</td>
                </tr>    
            @endif
            @if (!empty($producto->aerobic_anaerobic_mesophilic_microorganisms))
                <tr class="spaceUnder">
                    <td><b>aerobic and anaerobic mesophilic microorganisms</b></td>
                    <td>{{ $producto->aerobic_anaerobic_mesophilic_microorganisms }}</td>
                </tr>    
            @endif
            @if (!empty($producto->aerobic_anaerobic_thermophilic_microorganisms))
                <tr class="spaceUnder">
                    <td><b>Aerobic and anaerobic thermophilic microorganisms</b></td>
                    <td>{{ $producto->aerobic_anaerobic_thermophilic_microorganisms }}</td>
                </tr>    
            @endif
            @if (!empty($producto->thermophilic_commercial_sterility))
                <tr class="spaceUnder">
                    <td><b>Thermophilic(commercial sterility)</b></td>
                    <td>{{ $producto->thermophilic_commercial_sterility }}</td>
                </tr>    
            @endif
            @if (!empty($producto->anaerobic_spores_reducing_sulfites))
                <tr class="spaceUnder">
                    <td><b>Anaerobic spores reducing sulfites</b></td>
                    <td>{{ $producto->anaerobic_spores_reducing_sulfites }}</td>
                </tr>    
            @endif
            @if (!empty($producto->cronobacter_10g))
                <tr class="spaceUnder">
                    <td><b>Cronobacter spp in 10g</b></td>
                    <td>{{ $producto->cronobacter_10g }}</td>
                </tr>    
            @endif

        </table>
    </div>
    <div class="new-page"></div>
    <img src="{{public_path('/img/header-pdf.png')}}" class="header" alt="">
    <h3 style="margin-top:-7%;color:white;">{{$producto->product_name}}</h3>
    <div class="section">
        <table class="table-data" cellspacing="0" cellpadding="8" style="width: 100%">
            <tr class="">
                <td><h3>5.- CHEMICAL VALUES(*)</h3></td>
            </tr>
            @if (!empty($producto->ph))
                <tr class="spaceUnder">
                    <td><b>pH:</b></td>
                    <td>{{ $producto->ph }}</td>
                </tr>
            @endif
            @if (!empty($producto->porcent_aw))
                <tr class="spaceUnder">
                    <td><b>aw ( water activity) %:</b></td>
                    <td>{{ $producto->porcent_aw }}</td>
                </tr>
            @endif
        </table>
        <table class="table-data" cellspacing="0" cellpadding="8" style="width: 100%">
            <tr class="">
                <td><h3>6.- TYPE OF PACKAGING(*)</h3></td>
            </tr>
            @if (!empty($producto->type_primary_packaging))
                <tr class="spaceUnder">
                    <td><b>Type of primary packaging used:</b></td>
                    <td>{{ $producto->type_primary_packaging }}</td>
                </tr>
            @endif
            @if (!empty($producto->type_secundary_packaging))
                <tr class="spaceUnder">
                    <td><b>Type of secundary packaging used:</b></td>
                    <td>{{ $producto->type_secundary_packaging }}</td>
                </tr>
            @endif
            @if (!empty($producto->type_controls_sealing_air_tightness_primary_packaging))
                <tr class="spaceUnder">
                    <td><b>Indicate type of controls used in sealing or air tightness of primary packaging:</b></td>
                    <td>{{ $producto->type_controls_sealing_air_tightness_primary_packaging }}</td>
                </tr>
            @endif
        </table>
        {{-- <table>
            <tr>
                <td><b>Certificaciones</b></td>
            </tr>
            @if (empty($data->certificaciones))
                <tr>
                    <td>El producto no tiene certificaciones asociadas.</td>
                </tr>
            @endif
            
        </table> --}}
    </div>
    @if (empty($producto->home_measure_reconstitued) && empty($producto->serving_size_reconstitued) && empty($producto->servings_per_container_reconstitued))
        <div class="new-page"></div>
        <img src="{{public_path('/img/header-pdf.png')}}" class="header" alt="">
        <h3 style="margin-top:-7%;color:white;">{{$producto->product_name}}</h3>
        <div class="section">
            <table class="table-data" cellspacing="0" cellpadding="8" style="width: 100%">
                <tr class="">
                    <td><h3>9.- NUTRITIONAL INFORMATION(*)</h3></td>
                </tr>
                <tr>
                    <td><b>Product type:</b>{{ ($producto->product_type == 'ml') ? 'LIQUIDO' : ''; }}{{ ($producto->product_type == 'gr') ? 'SOLIDO' : ''; }}</td>
                </tr>
            </table>
            <table class="table-data" cellspacing="0" cellpadding="8" style="width: 100%">
                <tr class="spaceUnder bg-cencosud">
                    <td><b>Sello alto en</b></td>
                    <td><b>Si/No/No Aplica</b></td>
                </tr>
                <tr class="spaceUnder">
                    <td>Alto en calorías</td>
                    <td>
                        @if ($producto->alto_en_calorias == 1)
                            No Aplica
                        @else
                            {{ (($producto->product_type == 'ml' && $producto->energy_100 > $sellos_alto_en['alto_en_calorias_liquido']) || ($producto->product_type == 'gr' && $producto->energy_100 > $sellos_alto_en['alto_en_calorias_solido'])) ? 'SI' : 'NO' }}
                        @endif
                    </td>               
                </tr>
                <tr class="spaceUnder">
                    <td>Alto en azúcares totales</td>
                    <td>
                        @if ($producto->alto_en_azucares == 1)
                            No Aplica
                        @else
                            {{ (($producto->product_type == 'ml' && $producto->total_sugars_100 > $sellos_alto_en['alto_en_azucares_liquido']) || ($producto->product_type == 'gr' && $producto->total_sugars_100 > $sellos_alto_en['alto_en_azucares_solido'])) ? 'SI' : 'NO' }}
                        @endif
                    </td>
                </tr>
                <tr class="spaceUnder">
                    <td>Alto en sodio</td>
                    <td>
                        @if ($producto->alto_en_sodio == 1)
                            No Aplica
                        @else
                            {{ (($producto->product_type == 'ml' && $producto->sodium_100 > $sellos_alto_en['alto_en_sodio_liquido']) || ($producto->product_type == 'gr' && $producto->sodium_100 > $sellos_alto_en['alto_en_sodio_solido'])) ? 'SI' : 'NO' }}
                        @endif
                    </td>
                </tr>
                <tr class="spaceUnder">
                    <td>Alto en grasas saturadas</td>
                    <td>
                        @if ($producto->alto_en_grasas == 1)
                            No Aplica
                        @else
                            {{ (($producto->product_type == 'ml' && $producto->satured_fat_100 > $sellos_alto_en['alto_en_grasas_liquido']) || ($producto->product_type == 'gr' && $producto->satured_fat_100 > $sellos_alto_en['alto_en_grasas_solido'])) ? 'SI' : 'NO' }}
                        @endif
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                </tr>
            </table>
            <table class="table-data" cellspacing="0" cellpadding="8" style="width: 100%">
                <tr class="spaceUnder bg-cencosud">
                    <td colspan="3"><b>NUTRITIONAL FACTS</b></td>
                </tr>
                <tr class="spaceUnder">
                    <td><b>Home measure:</b>{{ $producto->home_measure }}</td>
                    <td rowspan="3"><b>100 g or ml</b></td>
                    <td rowspan="3"><b>1 serving</b></td>
                </tr>
                <tr class="spaceUnder">
                    <td><b>Serving size:</b>{{ $producto->serving_size }}</td>
                </tr>
                <tr class="spaceUnder">
                    <td><b>Servings per Container:</b>{{ $producto->servings_per_container }}</td>
                </tr>
                @if (!empty($energy_100) || !empty($energy_serving))
                    <tr class="spaceUnder">
                        <td>Energy ( kcal)</td>
                        <td>{{ $producto->energy_100 }}</td>
                        <td>{{ $producto->energy_serving }}</td>
                    </tr>
                @endif
                @if (!empty($producto->proteins_100) || !empty($producto->proteins_serving))
                    <tr class="spaceUnder">
                        <td>Proteins (g)</td>
                        <td>{{ $producto->proteins_100 }}</td>
                        <td>{{ $producto->proteins_serving }}</td>
                    </tr>    
                @endif
                
                @if (!empty($producto->total_fat_100) || !empty($producto->total_fat_serving))
                    <tr class="spaceUnder">
                        <td>Total fat (g)</td>
                        <td>{{ $producto->total_fat_100 }}</td>
                        <td>{{ $producto->total_fat_serving }}</td>
                    </tr>    
                @endif
                
                @if (!empty($producto->satured_fat_100) || !empty($producto->satured_fat_serving))
                    <tr class="spaceUnder">
                        <td>Satured fat (g)</td>
                        <td>{{ $producto->satured_fat_100 }}</td>
                        <td>{{ $producto->satured_fat_serving }}</td>
                    </tr>    
                @endif
                
                @if (!empty($producto->trans_fat_100) || !empty($producto->trans_fat_serving))
                    <tr class="spaceUnder">
                        <td>Trans fat (g)</td>
                        <td>{{ $producto->trans_fat_100 }}</td>
                        <td>{{ $producto->trans_fat_serving }}</td>
                    </tr>    
                @endif
                
                @if (!empty($producto->monosatured_fat_100) || !empty($producto->monosatured_fat_serving))
                    <tr class="spaceUnder">
                        <td>Monosatured fat (g)</td>
                        <td>{{ $producto->monosatured_fat_100 }}</td>
                        <td>{{ $producto->monosatured_fat_serving }}</td>
                    </tr>    
                @endif
                
                @if (!empty($producto->polyunsatured_fat_100) || !empty($producto->polyunsatured_fat_serving))
                    <tr class="spaceUnder">
                        <td>Polyunsatured fat (g)</td>
                        <td>{{ $producto->polyunsatured_fat_100 }}</td>
                        <td>{{ $producto->polyunsatured_fat_serving }}</td>
                    </tr>    
                @endif
                
                @if (!empty($producto->cholesterol_100) || !empty($producto->cholesterol_serving))
                    <tr class="spaceUnder">
                        <td>Cholesterol (mg)</td>
                        <td>{{ $producto->cholesterol_100 }}</td>
                        <td>{{ $producto->cholesterol_serving }}</td>
                    </tr>    
                @endif
                
                @if (!empty($producto->available_carbohydrates_100) || !empty($producto->available_carbohydrates_serving))
                    <tr class="spaceUnder">
                        <td>Available carbohydrates(g)</td>
                        <td>{{ $producto->available_carbohydrates_100 }}</td>
                        <td>{{ $producto->available_carbohydrates_serving }}</td>
                    </tr>    
                @endif
                
                @if (!empty($producto->total_sugars_100) || !empty($producto->total_sugars_serving))
                    <tr class="spaceUnder">
                        <td>Total Sugars (g)</td>
                        <td>{{ $producto->total_sugars_100 }}</td>
                        <td>{{ $producto->total_sugars_serving }}</td>
                    </tr>    
                @endif
                
                @if (!empty($producto->sucrose_100) || !empty($producto->sucrose_serving))
                    <tr class="spaceUnder">
                        <td>Sucrose (g)</td>
                        <td>{{ $producto->sucrose_100 }}</td>
                        <td>{{ $producto->sucrose_serving }}</td>
                    </tr>    
                @endif
                
                @if (!empty($producto->lactos_100) || !empty($producto->lactos_serving))
                    <tr class="spaceUnder">
                        <td>Lactose(g)</td>
                        <td>{{ $producto->lactos_100 }}</td>
                        <td>{{ $producto->lactos_serving }}</td>
                    </tr>    
                @endif
                
                @if (!empty($producto->poliols_100) || !empty($producto->poliols_serving))
                    <tr class="spaceUnder">
                        <td>Poliols (g)</td>
                        <td>{{ $producto->poliols_100 }}</td>
                        <td>{{ $producto->poliols_serving }}</td>
                    </tr>    
                @endif
                
                @if (!empty($producto->total_dietary_fiber_100) || !empty($producto->total_dietary_fiber_serving))
                    <tr class="spaceUnder">
                        <td>Total Dietary fiber (g)</td>
                        <td>{{ $producto->total_dietary_fiber_100 }}</td>
                        <td>{{ $producto->total_dietary_fiber_serving }}</td>
                    </tr>    
                @endif
                
                @if (!empty($producto->soluble_fiber_100) || !empty($producto->soluble_fiber_serving))
                    <tr class="spaceUnder">
                        <td>Soluble fiber (g)</td>
                        <td>{{ $producto->soluble_fiber_100 }}</td>
                        <td>{{ $producto->soluble_fiber_serving }}</td>
                    </tr>    
                @endif
                
                @if (!empty($producto->insoluble_fiber_100) || !empty($producto->insoluble_fiber_serving))
                    <tr class="spaceUnder">
                        <td>Insoluble fiber (g)</td>
                        <td>{{ $producto->insoluble_fiber_100 }}</td>
                        <td>{{ $producto->insoluble_fiber_serving }}</td>
                    </tr>    
                @endif
                
                @if (!empty($producto->sodium_100) || !empty($producto->sodium_serving))
                    <tr class="spaceUnder">
                        <td>Sodium (mg)</td>
                        <td>{{ $producto->sodium_100 }}</td>
                        <td>{{ $producto->sodium_serving }}</td>
                    </tr>    
                @endif
            </table>
        </div>
    @endif
    @if (!empty($producto->home_measure_reconstitued) || !empty($producto->serving_size_reconstitued) || !empty($producto->servings_per_container_reconstitued))
        <div class="new-page"></div>
        <img src="{{public_path('/img/header-pdf.png')}}" class="header" alt="">
        <h3 style="margin-top:-7%;color:white;">{{$producto->product_name}}</h3>
        <div class="section">
            <table class="table-data" cellspacing="0" cellpadding="0" style="width: 100%">
                <tr class="">
                    <td><h3>9.- NUTRITIONAL INFORMATION FOR RECONSTITUTED PRODUCTS(*)</h3></td>
                </tr>
                <tr>
                    <td><b>Product type:</b>{{ ($producto->product_type == 'ml') ? 'LIQUIDO' : ''; }}{{ ($producto->product_type == 'gr') ? 'SOLIDO' : ''; }}</td>
                </tr>
            </table>
            <table class="table-data" cellspacing="0" cellpadding="8" style="width: 100%">
                <tr class="spaceUnder bg-cencosud">
                    <td><b>Sello alto en</b></td>
                    <td><b>Si/No/No Aplica</b></td>
                </tr>
                <tr class="spaceUnder">
                    <td>Alto en calorías</td>
                    <td>
                        @if ($producto->alto_en_calorias == 1)
                            No Aplica
                        @else
                            {{ (($producto->product_type == 'ml' && $producto->energy_100_reconstitued > $sellos_alto_en['alto_en_calorias_liquido']) || ($producto->product_type == 'gr' && $producto->energy_100_reconstitued > $sellos_alto_en['alto_en_calorias_solido'])) ? 'SI' : 'NO' }}
                        @endif
                    </td>               
                </tr>
                <tr class="spaceUnder">
                    <td>Alto en azúcares totales</td>
                    <td>
                        @if ($producto->alto_en_azucares == 1)
                            No Aplica
                        @else
                            {{ (($producto->product_type == 'ml' && $producto->total_sugars_100_reconstitued > $sellos_alto_en['alto_en_azucares_liquido']) || ($producto->product_type == 'gr' && $producto->total_sugars_100_reconstitued > $sellos_alto_en['alto_en_azucares_solido'])) ? 'SI' : 'NO' }}
                        @endif
                    </td>
                </tr>
                <tr class="spaceUnder">
                    <td>Alto en sodio</td>
                    <td>
                        @if ($producto->alto_en_sodio == 1)
                            No Aplica
                        @else
                            {{ (($producto->product_type == 'ml' && $producto->sodium_100_reconstitued > $sellos_alto_en['alto_en_sodio_liquido']) || ($producto->product_type == 'gr' && $producto->sodium_100_reconstitued > $sellos_alto_en['alto_en_sodio_solido'])) ? 'SI' : 'NO' }}
                        @endif
                    </td>
                </tr>
                <tr class="spaceUnder">
                    <td>Alto en grasas saturadas</td>
                    <td>
                        @if ($producto->alto_en_grasas == 1)
                            No Aplica
                        @else
                            {{ (($producto->product_type == 'ml' && $producto->satured_fat_100_reconstitued > $sellos_alto_en['alto_en_grasas_liquido']) || ($producto->product_type == 'gr' && $producto->satured_fat_100_reconstitued > $sellos_alto_en['alto_en_grasas_solido'])) ? 'SI' : 'NO' }}
                        @endif
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                </tr>
            </table>
            <table class="table-data" cellspacing="0" cellpadding="8" style="width: 100%">
                <tr class="spaceUnder bg-cencosud">
                    <td colspan="4"><b>NUTRITIONAL FACTS</b></td>
                </tr>
                <tr class="spaceUnder">
                    <td><b>Home measure:</b>{{ $producto->home_measure_reconstitued }}</td>
                    <td rowspan="3"><b>100 g or ml</b></td>
                    <td rowspan="3"><b>100g or ml reconstituted</b></td>
                    <td rowspan="3"><b> 1 serving reconstituted</b></td>
                </tr>
                <tr class="spaceUnder">
                    <td><b>Serving size:</b>{{ $producto->serving_size_reconstitued }}</td>
                </tr>
                <tr class="spaceUnder">
                    <td><b>Servings per Container:</b>{{ $producto->servings_per_container_reconstitued }}</td>
                </tr>
                @if (!empty($producto->energy_100_reconstitued) || !empty($producto->energy_serving_reconstitued) || !empty($producto->energy_serving_reconstitued_r))
                    <tr class="spaceUnder">
                        <td>Energy ( kcal)</td>
                        <td>{{ $producto->energy_100_reconstitued }}</td>
                        <td>{{ $producto->energy_serving_reconstitued }}</td>
                        <td>{{ $producto->energy_serving_reconstitued_r }}</td>
                    </tr>
                @endif
                @if (!empty($producto->proteins_100_reconstitued) || !empty($producto->proteins_serving_reconstitued) || !empty($producto->proteins_serving_reconstitued_r))
                    <tr class="spaceUnder">
                        <td>Proteins (g)</td>
                        <td>{{ $producto->proteins_100_reconstitued }}</td>
                        <td>{{ $producto->proteins_serving_reconstitued }}</td>
                        <td>{{ $producto->proteins_serving_reconstitued_r }}</td>
                    </tr>
                @endif
                @if (!empty($producto->total_fat_100_reconstitued) || !empty($producto->total_fat_serving_reconstitued) || !empty($producto->total_fat_serving_reconstitued_r))
                    <tr class="spaceUnder">
                        <td>Total fat (g)</td>
                        <td>{{ $producto->total_fat_100_reconstitued }}</td>
                        <td>{{ $producto->total_fat_serving_reconstitued }}</td>
                        <td>{{ $producto->total_fat_serving_reconstitued_r }}</td>
                    </tr>
                @endif
                @if (!empty($producto->satured_fat_100_reconstitued) || !empty($producto->satured_fat_serving_reconstitued) || !empty($producto->satured_fat_serving_reconstitued_r))
                    <tr class="spaceUnder">
                        <td>Satured fat (g)</td>
                        <td>{{ $producto->satured_fat_100_reconstitued }}</td>
                        <td>{{ $producto->satured_fat_serving_reconstitued }}</td>
                        <td>{{ $producto->satured_fat_serving_reconstitued_r }}</td>
                    </tr>
                @endif
                @if (!empty($producto->trans_fat_100_reconstitued) || !empty($producto->trans_fat_serving_reconstitued) || !empty($producto->trans_fat_serving_reconstitued_r))
                    <tr class="spaceUnder">
                        <td>Trans fat (g)</td>
                        <td>{{ $producto->trans_fat_100_reconstitued }}</td>
                        <td>{{ $producto->trans_fat_serving_reconstitued }}</td>
                        <td>{{ $producto->trans_fat_serving_reconstitued_r }}</td>
                    </tr>
                @endif
                @if (!empty($producto->monosatured_fat_100_reconstitued) || !empty($producto->monosatured_fat_serving_reconstitued) || !empty($producto->monosatured_fat_serving_reconstitued_r))
                    <tr class="spaceUnder">
                        <td>Monosatured fat (g)</td>
                        <td>{{ $producto->monosatured_fat_100_reconstitued }}</td>
                        <td>{{ $producto->monosatured_fat_serving_reconstitued }}</td>
                        <td>{{ $producto->monosatured_fat_serving_reconstitued_r }}</td>
                    </tr>
                @endif
                @if (!empty($producto->polyunsatured_fat_100_reconstitued) || !empty($producto->polyunsatured_fat_serving_reconstitued) || !empty($producto->polyunsatured_fat_serving_reconstitued_r))
                    <tr class="spaceUnder">
                        <td>Polyunsatured fat (g)</td>
                        <td>{{ $producto->polyunsatured_fat_100_reconstitued }}</td>
                        <td>{{ $producto->polyunsatured_fat_serving_reconstitued }}</td>
                        <td>{{ $producto->polyunsatured_fat_serving_reconstitued_r }}</td>
                    </tr>
                @endif
                @if (!empty($producto->cholesterol_100_reconstitued) || !empty($producto->cholesterol_serving_reconstitued) || !empty($producto->cholesterol_serving_reconstitued_r))
                    <tr class="spaceUnder">
                        <td>Cholesterol (mg)</td>
                        <td>{{ $producto->cholesterol_100_reconstitued }}</td>
                        <td>{{ $producto->cholesterol_serving_reconstitued }}</td>
                        <td>{{ $producto->cholesterol_serving_reconstitued_r }}</td>
                    </tr>
                @endif
                @if (!empty($producto->total_carbohydrate_100_reconstitued) || !empty($producto->total_carbohydrate_serving_reconstitued) || !empty($producto->total_carbohydrate_serving_reconstitued_r))
                    <tr class="spaceUnder">
                        <td>Total Carbohydrate (g)</td>
                        <td>{{ $producto->total_carbohydrate_100_reconstitued }}</td>
                        <td>{{ $producto->total_carbohydrate_serving_reconstitued }}</td>
                        <td>{{ $producto->total_carbohydrate_serving_reconstitued_r }}</td>
                    </tr>
                @endif
                @if (!empty($producto->available_carbohydrates_100_reconstitued) || !empty($producto->available_carbohydrates_serving_reconstitued) || !empty($producto->available_carbohydrates_serving_reconstitued_r))
                    <tr class="spaceUnder">
                        <td>Available carbohydrates(g)</td>
                        <td>{{ $producto->available_carbohydrates_100_reconstitued }}</td>
                        <td>{{ $producto->available_carbohydrates_serving_reconstitued }}</td>
                        <td>{{ $producto->available_carbohydrates_serving_reconstitued_r }}</td>
                    </tr>
                @endif
                @if (!empty($producto->total_sugars_100_reconstitued) || !empty($producto->total_sugars_serving_reconstitued) || !empty($producto->total_sugars_serving_reconstitued_r))
                    <tr class="spaceUnder">
                        <td>Total Sugars (g)</td>
                        <td>{{ $producto->total_sugars_100_reconstitued }}</td>
                        <td>{{ $producto->total_sugars_serving_reconstitued }}</td>
                        <td>{{ $producto->total_sugars_serving_reconstitued_r }}</td>
                    </tr>
                @endif
                @if (!empty($producto->sucrose_100_reconstitued) || !empty($producto->sucrose_serving_reconstitued) || !empty($producto->sucrose_serving_reconstitued_r))
                    <tr class="spaceUnder">
                        <td>Sucrose (g)</td>
                        <td>{{ $producto->sucrose_100_reconstitued }}</td>
                        <td>{{ $producto->sucrose_serving_reconstitued }}</td>
                        <td>{{ $producto->sucrose_serving_reconstitued_r }}</td>
                    </tr>
                @endif
                @if (!empty($producto->lactos_100_reconstitued) || !empty($producto->lactos_serving_reconstitued) || !empty($producto->lactos_serving_reconstitued_r))
                    <tr class="spaceUnder">
                        <td>Lactose(g)</td>
                        <td>{{ $producto->lactos_100_reconstitued }}</td>
                        <td>{{ $producto->lactos_serving_reconstitued }}</td>
                        <td>{{ $producto->lactos_serving_reconstitued_r }}</td>
                    </tr>
                @endif
                @if (!empty($producto->poliols_100_reconstitued) || !empty($producto->poliols_serving_reconstitued) || !empty($producto->poliols_serving_reconstitued_r))
                    <tr class="spaceUnder">
                        <td>Poliols (g)</td>
                        <td>{{ $producto->poliols_100_reconstitued }}</td>
                        <td>{{ $producto->poliols_serving_reconstitued }}</td>
                        <td>{{ $producto->poliols_serving_reconstitued_r }}</td>
                    </tr>
                @endif
                @if (!empty($producto->total_dietary_fiber_100_reconstitued) || !empty($producto->total_dietary_fiber_serving_reconstitued) || !empty($producto->total_dietary_fiber_serving_reconstitued_r))
                    <tr class="spaceUnder">
                        <td>Total Dietary fiber (g)</td>
                        <td>{{ $producto->total_dietary_fiber_100_reconstitued }}</td>
                        <td>{{ $producto->total_dietary_fiber_serving_reconstitued }}</td>
                        <td>{{ $producto->total_dietary_fiber_serving_reconstitued_r }}</td>
                    </tr>
                @endif
                @if (!empty($producto->soluble_fiber_100_reconstitued) || !empty($producto->soluble_fiber_serving_reconstitued) || !empty($producto->soluble_fiber_serving_reconstitued_r))
                    <tr class="spaceUnder">
                        <td>Soluble fiber (g)</td>
                        <td>{{ $producto->soluble_fiber_100_reconstitued }}</td>
                        <td>{{ $producto->soluble_fiber_serving_reconstitued }}</td>
                        <td>{{ $producto->soluble_fiber_serving_reconstitued_r }}</td>
                    </tr>
                @endif
                @if (!empty($producto->insoluble_fiber_100_reconstitued) || !empty($producto->insoluble_fiber_serving_reconstitued) || !empty($producto->insoluble_fiber_serving_reconstitued_r))
                    <tr class="spaceUnder">
                        <td>Insoluble fiber (g)</td>
                        <td>{{ $producto->insoluble_fiber_100_reconstitued }}</td>
                        <td>{{ $producto->insoluble_fiber_serving_reconstitued }}</td>
                        <td>{{ $producto->insoluble_fiber_serving_reconstitued_r }}</td>
                    </tr>
                @endif
                @if (!empty($producto->sodium_100_reconstitued) || !empty($producto->sodium_serving_reconstitued) || !empty($producto->sodium_serving_reconstitued_r))
                    <tr class="spaceUnder">
                        <td>Sodium (mg)</td>
                        <td>{{ $producto->sodium_100_reconstitued }}</td>
                        <td>{{ $producto->sodium_serving_reconstitued }}</td>
                        <td>{{ $producto->sodium_serving_reconstitued_r }}</td>
                    </tr>
                @endif
            </table>
        </div>
    @endif
    <div class="new-page"></div>
    <img src="{{public_path('/img/header-pdf.png')}}" class="header" alt="">
    <h3 style="margin-top:-7%;color:white;">{{$producto->product_name}}</h3>
    <div class="section">
        <table class="table-data" cellspacing="0" cellpadding="6" style="width: 100%">
            <tr class="">
                <td><h3>10.- VITAMINS AND MINERALS (*)</h3></td>
            </tr>
            <tr class="spaceUnder">
                <td><b>VITAMINS</b></td>
                <td><b>100 g or ml<b></td>
                <td>*</td>
            </tr>
            @if (!empty($producto->vitamin_a_100) || !empty($producto->vitamin_a_serving))
                <tr class="spaceUnder">
                    <td>Vitamin A (ug)</td>
                    <td>{{ $producto->vitamin_a_100 }}</td>
                    <td>{{ (!empty($producto->vitamin_a_serving) ? number_format($producto->vitamin_a_serving/$vitaminas['A']*100,1,',','.') : null) }}</td>
                </tr>
            @endif
            @if (!empty($producto->vitamin_c_100) || !empty($producto->vitamin_c_serving))
                <tr class="spaceUnder">
                    <td>Vitamin C ( mg)</td>
                    <td>{{ $producto->vitamin_c_100 }}</td>
                    <td>{{ (!empty($producto->vitamin_c_serving)) ? number_format($producto->vitamin_c_serving/$vitaminas['C']*100,1,',','.') : null }}</td>
                </tr>
            @endif
            @if (!empty($producto->vitamin_d_100) || !empty($producto->vitamin_d_serving))
                <tr class="spaceUnder">
                    <td>Vitamin D (ug)</td>
                    <td>{{ $producto->vitamin_d_100 }}</td>
                    <td>{{ (!empty($producto->vitamin_d_serving)) ? number_format($producto->vitamin_d_serving/$vitaminas['D']*100,1,',','.') : null }}</td>
                </tr>
            @endif
            @if (!empty($producto->vitamin_e_100) || !empty($producto->vitamin_e_serving))
                <tr class="spaceUnder">
                    <td>Vitamin E (mg)</td>
                    <td>{{ $producto->vitamin_e_100 }}</td>
                    <td>{{ (!empty($producto->vitamin_e_serving)) ? number_format($producto->vitamin_e_serving/$vitaminas['E']*100,1,',','.') : null }}</td>
                </tr>
            @endif
            @if (!empty($producto->vitamin_b1_100) || !empty($producto->vitamin_b1_serving))
                <tr class="spaceUnder">
                    <td>Vitamin B1 ( mg)</td>
                    <td>{{ $producto->vitamin_b1_100 }}</td>
                    <td>{{ (!empty($producto->vitamin_b1_serving)) ? number_format($producto->vitamin_b1_serving/$vitaminas['B1']*100,1,',','.') : null }}</td>
                </tr>
            @endif
            @if (!empty($producto->vitamin_b2_100) || !empty($producto->vitamin_b2_serving))
                <tr class="spaceUnder">
                    <td>Vitamin B2 (mg)</td>
                    <td>{{ $producto->vitamin_b2_100 }}</td>
                    <td>{{ (!empty($producto->vitamin_b2_serving)) ? number_format($producto->vitamin_b2_serving/$vitaminas['B2']*100,1,',','.') : null }}</td>
                </tr>
            @endif
            @if (!empty($producto->niacin_100) || !empty($producto->niacin_serving))
                <tr class="spaceUnder">
                    <td>Niacin ( mg)</td>
                    <td>{{ $producto->niacin_100 }}</td>
                    <td>{{ (!empty($producto->niacin_serving)) ? number_format($producto->niacin_serving/$vitaminas['niacina']*100,1,',','.') : null }}</td>
                    
                </tr>
            @endif
            @if (!empty($producto->vitamin_b6_100) || !empty($producto->vitamin_b6_serving))
                <tr class="spaceUnder">
                    <td>Vitamin B6 (mg)</td>
                    <td>{{ $producto->vitamin_b6_100 }}</td>
                    <td>{{ (!empty($producto->vitamin_b6_serving)) ? number_format($producto->vitamin_b6_serving/$vitaminas['B6']*100,1,',','.') : null }}</td>
                   
                </tr>
            @endif
            @if (!empty($producto->folic_acid_100) || !empty($producto->folic_acid_serving))
                <tr class="spaceUnder">
                    <td>Folic acid (ug)</td>
                    <td>{{ $producto->folic_acid_100 }}</td>
                    <td>{{ (!empty($producto->folic_acid_serving)) ? number_format($producto->folic_acid_serving/$vitaminas['folato']*100,1,',','.') : null }}</td>
                    
                </tr>
            @endif
            @if (!empty($producto->vitamin_b12_100) || !empty($producto->vitamin_b12_serving))
                <tr class="spaceUnder">
                    <td>Vitamin B12 (ug)</td>
                    <td>{{ $producto->vitamin_b12_100 }}</td>
                    <td>{{ (!empty($producto->vitamin_b12_serving)) ? number_format($producto->vitamin_b12_serving/$vitaminas['B12']*100,1,',','.') : null }}</td>
                    
                </tr>
            @endif
            @if (!empty($producto->pantothenic_acid_100) || !empty($producto->pantothenic_acid_serving))
                <tr class="spaceUnder">
                    <td>Pantothenic acid (mg)</td>
                    <td>{{ $producto->pantothenic_acid_100 }}</td>
                    <td>{{ (!empty($producto->pantothenic_acid_serving)) ? number_format($producto->pantothenic_acid_serving/$vitaminas['pantotenico']*100,1,',','.') : null }}</td>
                    
                </tr>
            @endif
            @if (!empty($producto->biotin_100) || !empty($producto->biotin_serving))
                <tr class="spaceUnder">
                    <td>Biotin (ug)</td>
                    <td>{{ $producto->biotin_100 }}</td>
                    <td>{{ (!empty($producto->biotin_serving)) ? number_format($producto->biotin_serving/$vitaminas['biotina']*100,1,',','.') : null }}</td>
                    
                </tr>
            @endif
            @if (!empty($producto->choline_100) || !empty($producto->choline_serving))
                <tr class="spaceUnder">
                    <td>Choline (mg)</td>
                    <td>{{ $producto->choline_100 }}</td>
                    <td>{{ (!empty($producto->choline_serving)) ? number_format($producto->choline_serving/$vitaminas['colina']*100,1,',','.') : null }}</td>
                    
                </tr>
            @endif
            @if (!empty($producto->vitamin_k_100) || !empty($producto->vitamin_k_serving))
                <tr class="spaceUnder">
                    <td>Vitamin K (ug)</td>
                    <td>{{ $producto->vitamin_k_100 }}</td>
                    <td>{{ (!empty($producto->vitamin_k_serving)) ? number_format($producto->vitamin_k_serving/$vitaminas['K']*100,1,',','.') : null }}</td>
                   
                </tr>
            @endif
            @if (!empty($producto->betacarotene_100) || !empty($producto->betacarotene_serving))
                <tr class="spaceUnder">
                    <td>Betacarotene (mg)</td>
                    <td>{{ $producto->betacarotene_100 }}</td>
                    <td>{{ (!empty($producto->betacarotene_serving)) ? number_format($producto->betacarotene_serving/$vitaminas['betacaroteno']*100,1,',','.') : null }}</td>
                    
                </tr>
            @endif
            <tr class="spaceUnder">
                <td><b>MINERALS</b></td>
                <td><b>100 g or ml<b></td>
                <td>*</td>
            </tr>
            @if (!empty($producto->calcium_100) || !empty($producto->calcium_serving))
                <tr class="spaceUnder">
                    <td>Calcium (mg)</td>
                    <td>{{ $producto->calcium_100 }}</td>
                    <td>{{ (!empty($producto->calcium_serving)) ? number_format($producto->calcium_serving/$vitaminas['calcio']*100,1,',','.') : null }}</td>
                    
                </tr>
            @endif
            @if (!empty($producto->chromium_100) || !empty($producto->chromium_serving))
                <tr class="spaceUnder">
                    <td>Chromium (ug)</td>
                    <td>{{ $producto->chromium_100 }}</td>
                    <td>{{ (!empty($producto->chromium_serving)) ? number_format($producto->chromium_serving/$vitaminas['cromo']*100,1,',','.') : null }}</td>
                   
                </tr>
            @endif
            @if (!empty($producto->copper_100) || !empty($producto->copper_serving))
                <tr class="spaceUnder">
                    <td>Copper (mg)</td>
                    <td>{{ $producto->copper_100 }}</td>
                    <td>{{ (!empty($producto->copper_serving)) ? number_format($producto->copper_serving/$vitaminas['cobre']*100,1,',','.') : null }}</td>
                    
                </tr>
            @endif
            @if (!empty($producto->yodo_100) || !empty($producto->yodo_serving))
                <tr class="spaceUnder">
                    <td>Yodo (ug)</td>
                    <td>{{ $producto->yodo_100 }}</td>
                    <td>{{ (!empty($producto->yodo_serving)) ? number_format($producto->yodo_serving/$vitaminas['yodo']*100,1,',','.') : null }}</td>
                    
                </tr>
            @endif
            @if (!empty($producto->iron_100) || !empty($producto->iron_serving))
                <tr class="spaceUnder">
                    <td>Iron ( mg)</td>
                    <td>{{ $producto->iron_100 }}</td>
                    <td>{{ (!empty($producto->iron_serving)) ? number_format($producto->iron_serving/$vitaminas['hierro']*100,1,',','.') : null }}</td>
                   
                </tr>
            @endif
            @if (!empty($producto->magnesium_100) || !empty($producto->magnesium_serving))
                <tr class="spaceUnder">
                    <td>Magnesium (mg)</td>
                    <td>{{ $producto->magnesium_100 }}</td>
                    <td>{{ (!empty($producto->magnesium_serving)) ? number_format($producto->magnesium_serving/$vitaminas['magnesio']*100,1,',','.') : null }}</td>
                    
                </tr>
            @endif
            @if (!empty($producto->manganese_100) || !empty($producto->manganese_serving))
                <tr class="spaceUnder">
                    <td>Manganese ( mg)</td>
                    <td>{{ $producto->manganese_100 }}</td>
                    <td>{{ (!empty($producto->manganese_serving)) ? number_format($producto->manganese_serving/$vitaminas['manganeso']*100,1,',','.') : null }}</td>
                    
                </tr>
            @endif
            @if (!empty($producto->molybdenum_100) || !empty($producto->molybdenum_serving))
                <tr class="spaceUnder">
                    <td>Molybdenum ( ug)</td>
                    <td>{{ $producto->molybdenum_100 }}</td>
                    <td>{{ (!empty($producto->molybdenum_serving)) ? number_format($producto->molybdenum_serving/$vitaminas['molibdeno']*100,1,',','.') : null }}</td>
                    
                </tr>
            @endif
            @if (!empty($producto->phosphorus_100) || !empty($producto->phosphorus_serving))
                <tr class="spaceUnder">
                    <td>Phosphorus (mg)</td>
                    <td>{{ $producto->phosphorus_100 }}</td>
                    <td>{{ (!empty($producto->phosphorus_serving)) ? number_format($producto->phosphorus_serving/$vitaminas['fosforo']*100,1,',','.') : null }}</td>
                   
                </tr>
            @endif
            @if (!empty($producto->zinc_100) || !empty($producto->zinc_serving))
                <tr class="spaceUnder">
                    <td>Zinc ( mg)</td>
                    <td>{{ $producto->zinc_100 }}</td>
                    <td>{{ (!empty($producto->zinc_serving)) ? number_format($producto->zinc_serving/$vitaminas['zinc']*100,1,',','.') : null }}</td>
                   
                </tr>
            @endif
            @if (!empty($producto->selenium_100) || !empty($producto->selenium_serving))
                <tr class="spaceUnder">
                    <td>Selenium (ug)</td>
                    <td>{{ $producto->selenium_100 }}</td>
                    <td>{{ (!empty($producto->selenium_serving)) ? number_format($producto->selenium_serving/$vitaminas['selenio']*100,1,',','.') : null }}</td>
                   
                </tr>
            @endif

        </table>
    </div>
    <div class="new-page"></div>
    <img src="{{public_path('/img/header-pdf.png')}}" class="header" alt="">
    <h3 style="margin-top:-7%;color:white;">{{$producto->product_name}}</h3>
    <div class="section">
        <table class="table-data" cellspacing="0" cellpadding="6" style="width: 100%">
            <tr class="">
                <td><h3>11.- MULTIRESIDUE STATEMENT(**)</h3></td>
            </tr>
            <tr class="spaceUnder bg-cencosud">
                <td><b>MYCOTOXIN</b></td>
                <td><b>Indicate results<b></td>
            </tr>
            @if (!empty($producto->total_aflatoxins))
                <tr class="spaceUnder">
                    <td>Total Aflatoxins  (B1, B2, G1, G2)(ppb)</td>
                    <td>{{ $producto->total_aflatoxins }}</td>
                </tr>
            @endif
            @if (!empty($producto->aflatoxina_m1))
                <tr class="spaceUnder">
                    <td>Aflatoxina M1 ( ppb)</td>
                    <td>{{ $producto->aflatoxina_m1 }}</td>
                </tr>
            @endif
            @if (!empty($producto->zearalenone))
                <tr class="spaceUnder">
                    <td>Zearalenone ( ppb)</td>
                    <td>{{ $producto->zearalenone }}</td>
                </tr>
            @endif
            @if (!empty($producto->patulin))
                <tr class="spaceUnder">
                    <td>Patulin ( ppb)</td>
                    <td>{{ $producto->patulin }}</td>
                </tr>
            @endif
            @if (!empty($producto->ochratoxin))
                <tr class="spaceUnder">
                    <td>Ochratoxin ( ppb)</td>
                    <td>{{ $producto->ochratoxin }}</td>
                </tr>
            @endif
            @if (!empty($producto->deoxynivalenol))
                <tr class="spaceUnder">
                    <td>Deoxynivalenol ( ppb)</td>
                    <td>{{ $producto->deoxynivalenol }}</td>
                </tr>
            @endif
            @if (!empty($producto->fumonisinas))
                <tr class="spaceUnder">
                    <td>Fumonisinas ( ppb)</td>
                    <td>{{ $producto->fumonisinas }}</td>
                </tr>
            @endif
            <tr class="spaceUnder bg-cencosud">
                <td><b>HEAVY METALS</b></td>
                <td><b>Indicate results<b></td>
            </tr>
            @if (!empty($producto->zn))
                <tr class="spaceUnder">
                    <td>Zn ( mg/ kg final product)</td>
                    <td>{{ $producto->zn }}</td>
                </tr>
            @endif
            @if (!empty($producto->pb))
                <tr class="spaceUnder">
                    <td>Pb ( mg/ kg final product)</td>
                    <td>{{ $producto->pb }}</td>
                </tr>
            @endif
            @if (!empty($producto->cd))
                <tr class="spaceUnder">
                    <td>Cd ( mg/ kg final product)</td>
                    <td>{{ $producto->cd }}</td>
                </tr>
            @endif
            @if (!empty($producto->hg))
                <tr class="spaceUnder">
                    <td>Hg ( mg/ kg final product)</td>
                    <td>{{ $producto->hg }}</td>
                </tr>
            @endif
            @if (!empty($producto->sn))
                <tr class="spaceUnder">
                    <td>Sn ( mg/ kg final product)</td>
                    <td>{{ $producto->sn }}</td>
                </tr>
            @endif
            @if (!empty($producto->cu))
                <tr class="spaceUnder">
                    <td>Cu ( mg/ kg final product)</td>
                    <td>{{ $producto->cu }}</td>
                </tr>
            @endif
            @if (!empty($producto->ars))
                <tr class="spaceUnder">
                    <td>Ar ( mg/ kg final product</td>
                    <td>{{ $producto->ars }}</td>
                </tr>
            @endif
            @if (!empty($producto->se))
                <tr class="spaceUnder">
                    <td>Se ( mg/ kg final product</td>
                    <td>{{ $producto->se }}</td>
                </tr>
            @endif
            <tr class="spaceUnder bg-cencosud" >
                <td><b>VETERINARY DRUGS ANS OTHERS</b></td>
                <td><b>Indicate results<b></td>
            </tr>
            @if (!empty($producto->chloramphenicol))
                <tr class="spaceUnder">
                    <td>chloramphenicol(ug/kg)</td>
                    <td>{{ $producto->chloramphenicol }}</td>
                </tr>
            @endif
            @if (!empty($producto->sulfonamides))
                <tr class="spaceUnder">
                    <td>sulfonamides(ug/kg)</td>
                    <td>{{ $producto->sulfonamides }}</td>
                </tr>
            @endif
            @if (!empty($producto->tetracycline))
                <tr class="spaceUnder">
                    <td>tetracycline ( ug/kg)</td>
                    <td>{{ $producto->tetracycline }}</td>
                </tr>
            @endif
            @if (!empty($producto->quinolones))
                <tr class="spaceUnder">
                    <td>quinolones ( ug/kg)</td>
                    <td>{{ $producto->quinolones }}</td>
                </tr>
            @endif
            @if (!empty($producto->macrolides))
                <tr class="spaceUnder">
                    <td>macrolides ( ug/kg)</td>
                    <td>{{ $producto->macrolides }}</td>
                </tr>
            @endif
            @if (!empty($producto->betalactams))
                <tr class="spaceUnder">
                    <td>betalactams ug/kg)</td>
                    <td>{{ $producto->betalactams }}</td>
                </tr>
            @endif
            @if (!empty($producto->amphenicols))
                <tr class="spaceUnder">
                    <td>amphenicols ( ug/kg)</td>
                    <td>{{ $producto->amphenicols }}</td>
                </tr>
            @endif
            @if (!empty($producto->steroids))
                <tr class="spaceUnder">
                    <td>steroids (ug/kg)</td>
                    <td>{{ $producto->steroids }}</td>
                </tr>
            @endif
            @if (!empty($producto->zeranol))
                <tr class="spaceUnder">
                    <td>zeranol ( ug/kg)</td>
                    <td>{{ $producto->zeranol }}</td>
                </tr>
            @endif
            @if (!empty($producto->pesticides))
                <tr class="spaceUnder">
                    <td>pesticides ( mg/kg)</td>
                    <td>{{ $producto->pesticides }}</td>
                </tr>
            @endif
            @if (!empty($producto->dioxin_furan))
                <tr class="spaceUnder">
                    <td>dioxin/ furan ( pg EQT/OMS/g fat)</td>
                    <td>{{ $producto->dioxin_furan }}</td>
                </tr>
            @endif
        </table>
    </div>
    <div class="new-page"></div>
    <img src="{{public_path('/img/header-pdf.png')}}" class="header" alt="">
    <h3 style="margin-top:-7%;color:white;">{{$producto->product_name}}</h3>
    <div class="section">
        <table class="table-data" cellspacing="0" cellpadding="6" style="width: 100%">
            <tr class="">
                <td><h3>12.- FLOW CHART</h3></td>
            </tr>
            <tr>
                <td>
                    @if (!empty($flow_chart_data))
                        @if ($flow_chart_data['type'] == 'image/png' || $flow_chart_data['type'] == 'image/jpeg')
                            <img src="{{$flow_chart_data['url']}}" class="image-data" alt="">
                        @else
                            El formato del archivo guardado no es una imagen.
                        @endif            
                    @endif
                </td>
            </tr>
            <tr class="">
                <td><h3>15.- LABEL DESIGN(*): Please send in a pdf file</h3></td>
            </tr>
            <tr>
                <td>
                    @if (!empty($label_design_data))
                        @if ($label_design_data['type'] == 'image/png' || $label_design_data['type'] == 'image/jpeg')
                            <img src="{{$label_design_data['url']}}" class="image-data" alt="">
                        @else
                            El formato del archivo guardado no es una imagen.
                        @endif            
                    @endif
                </td>
            </tr>
        </table>
    </div>
    <div class="new-page"></div>
    <img src="{{public_path('/img/header-pdf.png')}}" class="header" alt="">
    <h3 style="margin-top:-7%;color:white;">{{$producto->product_name}}</h3>
    <div class="section">
        <table class="table-data" cellspacing="0" cellpadding="6" style="width: 100%">
            <tr class="">
                <td><h3>TABLA DE REVISIONES</h3></td>
            </tr>
            <tr class="spaceUnder">
                <td style="background-color: #C0C0C0"><b>Numero de Revisión</b></td>
                <td style="background-color: #C0C0C0"><b>Fecha de revisión</b></td>
                <td style="background-color: #C0C0C0"><b>Descripción del cambio</b></td>
            </tr>
            <tr class="spaceUnder">
                <td>{{ $producto->version }}</td>
                <td>{{\Carbon\Carbon::parse($producto->created_at)->format('d-m-Y')}}</td>
                <td>{{ $producto->version_description }}</td>
            </tr>
            @foreach ($producto->versiones as $item)
                <tr class="spaceUnder">
                    <td>{{ $item->version }}</td>
                    <td>{{\Carbon\Carbon::parse($item->created_at)->format('d-m-Y')}}</td>
                    <td>{{ $item->version_description }}</td>
                </tr>
            @endforeach
        </table>
    </div>
</body>