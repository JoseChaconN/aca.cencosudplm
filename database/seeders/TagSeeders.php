<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Tags\Tag;

class TagSeeders extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Tag::create(['name' => 'Certificaciones']);
        Tag::create(['name' => 'Documentos Solicitados a Proveedor']);
        /*Tag::insert(
            ['name' => 'Certificaciones'],
            ['name' => 'Documentos Solicitados a Proveedor']
            / *['name' => 'PDF Prospecto'],
            ['name' => 'Rainforest Alliance'],
            ['name' => 'Global GAP/ Local GAP'],
            ['name' => 'FAIRTRADE'],
            ['name' => 'FAIR FOR LIFE'],
            ['name' => 'NON GMO'],
            ['name' => 'Marine Stewards Council (MSC)'],
            ['name' => 'Aquaculture Stewardship Council (ASC)'],
            ['name' => 'Dolphin Safe Fishing'],
            ['name' => 'Carbon Trist Standard'],
            ['name' => 'Roundtable on Sustainable palm oil (RSPO)'],
            ['name' => 'Veganos (V Label u Otros)'],
            ['name' => 'Forest Stewardship Council (FSC)'],
            ['name' => 'Programa para el reconocimiento de certificacion forestal (PEFC)'],
            ['name' => 'Climate Neutral Certified'],
            ['name' => 'Empresa B'],
            ['name' => 'SSP (Sustainable Shrimp Partnership)'],
            ['name' => 'AMFORI BSCI (Business Social Compliance Initiative)'],
            ['name' => 'SMETA (Auditoria de Comercio Etico)'],
            ['name' => 'BAP (Buenas practicas de acuicultura)'],
            ['name' => 'OEKOTEX'],
            ['name' => 'GMPC (US FDA CFSAN)'],
            ['name' => 'Orgánico Validado en Chile'],
            ['name' => 'Certificado Orgánico de Instalación'],
            ['name' => 'Certificado Orgánico Master'],
            ['name' => 'Certificado Orgánico Transacción'],
            ['name' => 'Kosher'],
            ['name' => 'Jalal'],
            ['name' => 'Bienestar Animal'],
            ['name' => 'Vegano (Carta)'],
            ['name' => 'Clean label'],
            ['name' => 'Ecofriendly'],
            ['name' => 'Certificado BRC'],
            ['name' => 'Certificado HACCP'],
            ['name' => 'Certificado IFS'],
            ['name' => 'Certificado FSC22000'],
            ['name' => 'Carta Seremi'],
            ['name' => 'Sin Soya'],
            ['name' => 'Suplemento Deportistas'],
            ['name' => 'Suplemento Nutricional'],
            ['name' => 'Alto en Proteina'],
            ['name' => 'Otro (Prospecto'],
            ['name' => 'Otro (Sostenibilidad)'],
            ['name' => 'Ficha Técnica'],
            ['name' => 'Rotulación (Pre visualisación de arte y etiquetado)'],
            ['name' => 'Análisis Microbiológico'],
            ['name' => 'Análisis Multiresiduos'],
            ['name' => 'Análisis Multiresiduos 2'],
            ['name' => 'Análisis de Migración'],
            ['name' => 'Resolución Sanitaria Importación'],
            ['name' => 'Credencial aplicador'],
            ['name' => 'CDA (Certficación acreditación aduanera):'],
            ['name' => 'Factura de Compra'],
            ['name' => 'Control de Plagas'],
            ['name' => 'Analisis agua de riego'],
            ['name' => 'Auditorias'],
            ['name' => 'Documentos Auditorias']* /
        );*/
    }
}
