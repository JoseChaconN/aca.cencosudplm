<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ListadoDocumentos;
use Spatie\Tags\Tag;

class ListadoDocumentosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $certificaciones_vencimiento = [
            ['nombre' => 'Rainforest Alliance', 'mostrar_prospecto' => '1', 'tipo_documento' => 1, 'file' => 1 , 'validar_vencimiento' => 1],
            ['nombre' => 'Global GAP/ Local GAP', 'mostrar_prospecto' => '1', 'tipo_documento' => 1, 'file' => 1 , 'validar_vencimiento' => 1],
            ['nombre' => 'FAIRTRADE', 'mostrar_prospecto' => '1', 'tipo_documento' => 1, 'file' => 1 , 'validar_vencimiento' => 1],
            ['nombre' => 'FAIR FOR LIFE', 'mostrar_prospecto' => '1', 'tipo_documento' => 1, 'file' => 1 , 'validar_vencimiento' => 1],
            ['nombre' => 'NON GMO', 'mostrar_prospecto' => '1', 'tipo_documento' => 1, 'file' => 1 , 'validar_vencimiento' => 1],
            ['nombre' => 'Marine Stewards Council (MSC)', 'mostrar_prospecto' => '1', 'tipo_documento' => 1, 'file' => 1 , 'validar_vencimiento' => 1],
            ['nombre' => 'Aquaculture Stewardship Council (ASC)', 'mostrar_prospecto' => '1', 'tipo_documento' => 1, 'file' => 1 , 'validar_vencimiento' => 1],
            ['nombre' => 'Dolphin Safe Fishing', 'mostrar_prospecto' => '1', 'tipo_documento' => 1, 'file' => 1 , 'validar_vencimiento' => 1],
            ['nombre' => 'Carbon Trist Standard', 'mostrar_prospecto' => '1', 'tipo_documento' => 1, 'file' => 1 , 'validar_vencimiento' => 1],
            ['nombre' => 'Roundtable on Sustainable palm oil (RSPO)', 'mostrar_prospecto' => '1', 'tipo_documento' => 1, 'file' => 1 , 'validar_vencimiento' => 1],
            ['nombre' => 'Veganos (V Label u Otros)', 'mostrar_prospecto' => '1', 'tipo_documento' => 1, 'file' => 1 , 'validar_vencimiento' => 1],
            ['nombre' => 'Forest Stewardship Council (FSC)', 'mostrar_prospecto' => '1', 'tipo_documento' => 1, 'file' => 1 , 'validar_vencimiento' => 1],
            ['nombre' => 'Programa para el reconocimiento de certificacion forestal (PEFC)', 'mostrar_prospecto' => '1', 'tipo_documento' => 1, 'file' => 1 , 'validar_vencimiento' => 1],
            ['nombre' => 'Climate Neutral Certified', 'mostrar_prospecto' => '1', 'tipo_documento' => 1, 'file' => 1 , 'validar_vencimiento' => 1],
            ['nombre' => 'Empresa B', 'mostrar_prospecto' => '1', 'tipo_documento' => 1, 'file' => 1 , 'validar_vencimiento' => 1],
            ['nombre' => 'SSP (Sustainable Shrimp Partnership)', 'mostrar_prospecto' => '1', 'tipo_documento' => 1, 'file' => 1 , 'validar_vencimiento' => 1],
            ['nombre' => 'AMFORI BSCI (Business Social Compliance Initiative)', 'mostrar_prospecto' => '1', 'tipo_documento' => 1, 'file' => 1 , 'validar_vencimiento' => 1],
            ['nombre' => 'SMETA (Auditoria de Comercio Etico)', 'mostrar_prospecto' => '1', 'tipo_documento' => 1, 'file' => 1 , 'validar_vencimiento' => 1],
            ['nombre' => 'BAP (Buenas practicas de acuicultura)', 'mostrar_prospecto' => '1', 'tipo_documento' => 1, 'file' => 1 , 'validar_vencimiento' => 1],
            ['nombre' => 'OEKOTEX', 'mostrar_prospecto' => '1', 'tipo_documento' => 1, 'file' => 1 , 'validar_vencimiento' => 1],
            ['nombre' => 'GMPC (US FDA CFSAN)', 'mostrar_prospecto' => '1', 'tipo_documento' => 1, 'file' => 1 , 'validar_vencimiento' => 1],
            ['nombre' => 'Otro (Prospecto', 'mostrar_prospecto' => '1', 'tipo_documento' => 1, 'file' => 1 , 'validar_vencimiento' => 1],
        ];
        ListadoDocumentos::insert($certificaciones_vencimiento);
        $certificaciones_fijas = [
            ['nombre' => 'Orgánico Validado en Chile', 'mostrar_prospecto' => '1', 'mostrar_auditoria' => NULL, 'tipo_documento' => 2, 'file' => 1, 'validar_vencimiento' => 1,'mostrar_prospecto_importados' => NULL],
            ['nombre' => 'Certificado Orgánico de Instalación', 'mostrar_prospecto' => '1', 'mostrar_auditoria' => '2', 'tipo_documento' => 2, 'file' => 1, 'validar_vencimiento' => 1,'mostrar_prospecto_importados' => NULL],
            ['nombre' => 'Certificado Orgánico Master', 'mostrar_prospecto' => '1', 'mostrar_auditoria' => '2', 'tipo_documento' => 2, 'file' => 1, 'validar_vencimiento' => 1,'mostrar_prospecto_importados' => NULL],
            ['nombre' => 'Certificado Orgánico Transacción', 'mostrar_prospecto' => '1', 'mostrar_auditoria' => NULL, 'tipo_documento' => 2, 'file' => 1, 'validar_vencimiento' => 1,'mostrar_prospecto_importados' => NULL],
            ['nombre' => 'Libre de Gluten', 'mostrar_prospecto' => '1', 'mostrar_auditoria' => NULL, 'tipo_documento' => 2, 'file' => 1, 'validar_vencimiento' => 1,'mostrar_prospecto_importados' => NULL],
            ['nombre' => 'Sin Lactosa', 'mostrar_prospecto' => '1', 'mostrar_auditoria' => NULL, 'tipo_documento' => 2, 'file' => 1, 'validar_vencimiento' => 1,'mostrar_prospecto_importados' => NULL],
            ['nombre' => 'Kosher', 'mostrar_prospecto' => '1', 'mostrar_auditoria' => NULL, 'tipo_documento' => 2, 'file' => 1, 'validar_vencimiento' => 1,'mostrar_prospecto_importados' => 1],
            ['nombre' => 'Jalal', 'mostrar_prospecto' => '1', 'mostrar_auditoria' => NULL, 'tipo_documento' => 2, 'file' => 1, 'validar_vencimiento' => 1,'mostrar_prospecto_importados' => 1],
            ['nombre' => 'Non GMO', 'mostrar_prospecto' => '1', 'mostrar_auditoria' => NULL, 'tipo_documento' => 2, 'file' => 1, 'validar_vencimiento' => 1,'mostrar_prospecto_importados' => 1],
            ['nombre' => 'Bienestar Animal', 'mostrar_prospecto' => '1', 'mostrar_auditoria' => NULL, 'tipo_documento' => 2, 'file' => 1, 'validar_vencimiento' => 1,'mostrar_prospecto_importados' => 1],
            ['nombre' => 'Vegano (Carta)', 'mostrar_prospecto' => '1', 'mostrar_auditoria' => NULL, 'tipo_documento' => 2, 'file' => 1, 'validar_vencimiento' => 1,'mostrar_prospecto_importados' => 1],
            ['nombre' => 'Clean label', 'mostrar_prospecto' => '1', 'mostrar_auditoria' => NULL, 'tipo_documento' => 2, 'file' => 1, 'validar_vencimiento' => 1,'mostrar_prospecto_importados' => 1],
            ['nombre' => 'Ecofriendly', 'mostrar_prospecto' => '1', 'mostrar_auditoria' => NULL, 'tipo_documento' => 2, 'file' => 1, 'validar_vencimiento' => 1,'mostrar_prospecto_importados' => 1],
            ['nombre' => 'Certificado BRC', 'mostrar_prospecto' => '1', 'mostrar_auditoria' => NULL, 'tipo_documento' => 2, 'file' => 1, 'validar_vencimiento' => 1,'mostrar_prospecto_importados' => 1],
            ['nombre' => 'Certificado HACCP', 'mostrar_prospecto' => '1', 'mostrar_auditoria' => NULL, 'tipo_documento' => 2, 'file' => 1, 'validar_vencimiento' => 1,'mostrar_prospecto_importados' => 1],
            ['nombre' => 'Certificado IFS', 'mostrar_prospecto' => '1', 'mostrar_auditoria' => NULL, 'tipo_documento' => 2, 'file' => 1, 'validar_vencimiento' => 1,'mostrar_prospecto_importados' => 1],
            ['nombre' => 'Certificado FSC22000', 'mostrar_prospecto' => '1', 'mostrar_auditoria' => NULL, 'tipo_documento' => 2, 'file' => 1, 'validar_vencimiento' => 1,'mostrar_prospecto_importados' => 1],
            ['nombre' => 'Carta Seremi', 'mostrar_prospecto' => '1', 'mostrar_auditoria' => NULL, 'tipo_documento' => 2, 'file' => 1, 'validar_vencimiento' => 1,'mostrar_prospecto_importados' => NULL],
            ['nombre' => 'Sin Soya', 'mostrar_prospecto' => '1', 'mostrar_auditoria' => NULL, 'tipo_documento' => 2, 'file' => 1, 'validar_vencimiento' => 1,'mostrar_prospecto_importados' => NULL],
            ['nombre' => 'Suplemento Deportistas', 'mostrar_prospecto' => '1', 'mostrar_auditoria' => NULL, 'tipo_documento' => 2, 'file' => 0, 'validar_vencimiento' => 1,'mostrar_prospecto_importados' => NULL],
            ['nombre' => 'Suplemento Nutricional', 'mostrar_prospecto' => '1', 'mostrar_auditoria' => NULL, 'tipo_documento' => 2, 'file' => 0, 'validar_vencimiento' => 1,'mostrar_prospecto_importados' => NULL],
            ['nombre' => 'Alto en Proteina', 'mostrar_prospecto' => '1', 'mostrar_auditoria' => NULL, 'tipo_documento' => 2, 'file' => 1, 'validar_vencimiento' => 1,'mostrar_prospecto_importados' => NULL],
            ['nombre' => 'Otro (Sostenibilidad)', 'mostrar_prospecto' => '1', 'mostrar_auditoria' => NULL, 'tipo_documento' => 2, 'file' => 1, 'validar_vencimiento' => 1,'mostrar_prospecto_importados' => NULL],
        ];
        ListadoDocumentos::insert($certificaciones_fijas);
        $documentos_solicitados_proveedor = [
            ['nombre' => 'Ficha Técnica', 'mostrar_prospecto' => '1', 'tipo_documento' => 3, 'file' => 1],
            ['nombre' => 'Rotulación (Pre visualisación de arte y etiquetado)', 'mostrar_prospecto' => '1', 'tipo_documento' => 3, 'file' => 1],
            ['nombre' => 'Análisis Microbiológico', 'mostrar_prospecto' => '1', 'tipo_documento' => 3, 'file' => 1],
            ['nombre' => 'Análisis Multiresiduos', 'mostrar_prospecto' => '1', 'tipo_documento' => 3, 'file' => 1],
            ['nombre' => 'Análisis Multiresiduos 2', 'mostrar_prospecto' => '1', 'tipo_documento' => 3, 'file' => 1],
            ['nombre' => 'Análisis de Migración', 'mostrar_prospecto' => '1', 'tipo_documento' => 3, 'file' => 1],
            ['nombre' => 'Resolución Sanitaria Importación', 'mostrar_prospecto' => '1', 'tipo_documento' => 3, 'file' => 1],
            ['nombre' => 'Credencial aplicador', 'mostrar_prospecto' => '1', 'tipo_documento' => 3, 'file' => 1],
            ['nombre' => 'CDA (Certficación acreditación aduanera):', 'mostrar_prospecto' => '1', 'tipo_documento' => 3, 'file' => 1],
            ['nombre' => 'Factura de Compra', 'mostrar_prospecto' => '1', 'tipo_documento' => 3, 'file' => 1],
            ['nombre' => 'Control de Plagas', 'mostrar_prospecto' => '1', 'tipo_documento' => 3, 'file' => 1],
            ['nombre' => 'Analisis agua de riego', 'mostrar_prospecto' => '1', 'tipo_documento' => 3, 'file' => 1],
        ];
        ListadoDocumentos::insert($documentos_solicitados_proveedor);
        $documentos_auditorias_visita_inspectivas = [
            ['nombre' => 'Auditorias', 'mostrar_prospecto' => null, 'tipo_documento' => null, 'file' => null],
            ['nombre' => 'Documentos Auditorias', 'mostrar_prospecto' => null, 'tipo_documento' => null, 'file' => null],
        ];
        ListadoDocumentos::insert($documentos_auditorias_visita_inspectivas);
        //////////////CERTIFICACIONES IMPORTADOS///////////////////////////
        $certificaciones_fijas_importados = [
            ['nombre' => 'Health', 'mostrar_prospecto_importados' => NULL, 'tipo_documento' => 2, 'file' => 1, 'validar_vencimiento' => NULL],
            ['nombre' => 'Free of AFP', 'mostrar_prospecto_importados' => 1, 'tipo_documento' => 2, 'file' => 1, 'validar_vencimiento' => NULL],
            ['nombre' => 'Hidroxianthracene', 'mostrar_prospecto_importados' => 1, 'tipo_documento' => 2, 'file' => 1, 'validar_vencimiento' => NULL],
            ['nombre' => 'Aloine', 'mostrar_prospecto_importados' => 1, 'tipo_documento' => 2, 'file' => 1, 'validar_vencimiento' => NULL],
            ['nombre' => 'Flow Chart', 'mostrar_prospecto_importados' => NULL, 'tipo_documento' => 2, 'file' => 1, 'validar_vencimiento' => NULL],
            ['nombre' => 'Label design', 'mostrar_prospecto_importados' => NULL, 'tipo_documento' => 2, 'file' => 1, 'validar_vencimiento' => NULL],
            ['nombre' => 'Health Certificate ( Conventional Foods) for SEREMI', 'mostrar_prospecto_importados' => 1, 'tipo_documento' => 2, 'file' => 1, 'validar_vencimiento' => NULL],
            ['nombre' => 'Health Certificate ( milk, beef, cheese, yoghurt, sausages) for SAG', 'mostrar_prospecto_importados' => 1, 'tipo_documento' => 2, 'file' => 1, 'validar_vencimiento' => NULL],
            ['nombre' => 'Phitosanitary  Certificate ( spices, fresh fruits, nuts, cereals, etc) for SAG', 'mostrar_prospecto_importados' => 1, 'tipo_documento' => 2, 'file' => 1, 'validar_vencimiento' => NULL],
            ['nombre' => 'Certificate of legal Origin ( fish and derivatives) for SERNAPESCA', 'mostrar_prospecto_importados' => 1, 'tipo_documento' => 2, 'file' => 1, 'validar_vencimiento' => NULL],
            ['nombre' => 'Organic Master Certificate', 'mostrar_prospecto_importados' => 1, 'tipo_documento' => 2, 'file' => 1, 'validar_vencimiento' => NULL],
            ['nombre' => 'Transactional Certificate', 'mostrar_prospecto_importados' => 1, 'tipo_documento' => 2, 'file' => 1, 'validar_vencimiento' => NULL],
            ['nombre' => 'Gluten Free', 'mostrar_prospecto_importados' => 1, 'tipo_documento' => 2, 'file' => 1, 'validar_vencimiento' => NULL],
            //['nombre' => 'Gluten Free ( Crossed out spike on main face)', 'mostrar_prospecto_importados' => 1, 'tipo_documento' => 2, 'file' => 1, 'validar_vencimiento' => NULL],
            //['nombre' => 'Gluten Free ( Crossed out spike on another face)', 'mostrar_prospecto_importados' => 1, 'tipo_documento' => 2, 'file' => 1, 'validar_vencimiento' => NULL],
            //['nombre' => 'Gluten Free ( It does not have a crossed out spike)', 'mostrar_prospecto_importados' => 1, 'tipo_documento' => 2, 'file' => 1, 'validar_vencimiento' => NULL],
            ['nombre' => 'Lactose Free', 'mostrar_prospecto_importados' => 1, 'tipo_documento' => 2, 'file' => 1, 'validar_vencimiento' => NULL],
            ['nombre' => 'Aloine', 'mostrar_prospecto_importados' => 1, 'tipo_documento' => 2, 'file' => 1, 'validar_vencimiento' => NULL],
            ['nombre' => 'Alcohol Free', 'mostrar_prospecto_importados' => 1, 'tipo_documento' => 2, 'file' => 1, 'validar_vencimiento' => NULL],
            ['nombre' => 'Certification Free of AFP ( American Foulbrood Bee) for Honey','mostrar_prospecto_importados' => 1, 'tipo_documento' => 2, 'file' => 1, 'validar_vencimiento' => NULL],
            ['nombre' => 'Termograph (**) For shipments with frozen and refrigerated foods, it´s mandatory','mostrar_prospecto_importados' => 1, 'tipo_documento' => 2, 'file' => 1, 'validar_vencimiento' => NULL],
            ['nombre' => 'Vegetarian certificate','mostrar_prospecto_importados' => 1, 'tipo_documento' => 2, 'file' => 1, 'validar_vencimiento' => NULL],
            ['nombre' => 'BPM certificate','mostrar_prospecto_importados' => 1, 'tipo_documento' => 2, 'file' => 1, 'validar_vencimiento' => NULL],
            ['nombre' => 'Other Certificate','mostrar_prospecto_importados' => 1, 'tipo_documento' => 2, 'file' => 1, 'validar_vencimiento' => NULL],
        ];
        ListadoDocumentos::insert($certificaciones_fijas_importados);

        $ListadoDocumentos = ListadoDocumentos::all();
        foreach ($ListadoDocumentos as $item) {
            Tag::findOrCreate($item->nombre);
            #Tag::create(['name' => $item->nombre]);
            $item->attachTag($item->nombre);
            if($item->tipo_documento == 2 || $item->tipo_documento == 1){
                $item->attachTag('Certificaciones');
            }
            if($item->tipo_documento == 3){
                $item->attachTag('Documentos Solicitados a Proveedor');
            }
            /*if($item->name == 'Auditorias'){
                $item->syncTags('Auditorias');
            }
            if($item->name == 'Documentos Auditorias'){
                $item->syncTags('Documentos Auditorias');
            }*/
        }

    }
}
