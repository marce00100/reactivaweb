<?php

// namespace App\Http\Controllers\ModuloPriorizacion;

// use Symfony\Component\HttpFoundation\File\UploadedFile;
// 
namespace App\Http\Controllers\Administracion;
use App\Http\Controllers\MasterController;
use Illuminate\Http\Request;

class TableroController extends MasterController
{
    public $carpeta;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    
    public function showPivot()
    {
        return view('administracion.tablero');
    }


    public function menusTablero()
    {
        $user = \Auth::user();
        $id_rol = $user->id_rol;
        $listaMenus = collect(\DB::select("SELECT m.id, m.cod_str, m.nombre,  m.descripcion, 
                                            m.nivel, m.tipo, m.orden, m.id_dash_config  --, c.variable_estadistica, c.configuracion
                                            FROM  dash_menu m JOIN dash_menu_rol mr ON m.id = mr.id_dash_menu  AND m.activo AND mr.id_rol = {$id_rol}
                                            -- LEFT JOIN dash_config c ON m.id_dash_config = c.id
                                            ORDER BY m.cod_str
                                "));

        $nodosMenu = $listaMenus->where('nivel',1)->sortBy('orden')->values();

        foreach ($nodosMenu as $nivel1) {
            $codigo = $nivel1->cod_str;
            $nombre = $nivel1->nombre;
            $niveles2 = $listaMenus->where('nivel', '2')->filter(function($item, $key) use ($codigo, $nombre){
                if(substr($item->cod_str, 0, 2) == $codigo)
                {
                    $item->padre = $nombre;
                    return $item;
                }

            })->sortBy('orden')->values();

            $nivel1->hijos = $niveles2;
            foreach ($niveles2 as $nivel2) {
                $cod2 = $nivel2->cod_str;
                $nombre = $nivel2->nombre;
                $niveles3 =  $listaMenus->where('nivel', '3')->filter(function($item, $key) use ($cod2, $nombre){
                    if(substr($item->cod_str, 0, 4) == $cod2)
                    {
                        $item->padre = $nombre;
                        return $item;
                    }
                    // return (substr($item->cod_str, 0, 4) == $cod2);
                })->sortBy('orden')->values();

                $nivel2->hijos = $niveles3;
            }
        }


        /* INSERTA LAS VISTAS COMO SUBMENUS  NO EJECUTAR*/
        // $tablas = collect(\DB::connection('dbestadistica')->select("select table_name from information_schema.tables 
        //     where table_schema='public' and table_type='VIEW'
        //     and table_name ilike '%v_ve%'  and table_name >'v_ve0067' "));
        //                         // return response()->json($tablas); 
        //                         $hu = '';
        // for($i = 0; $i< $tablas->count(); $i++) {
        //     $nombre = $tablas[$i]->table_name;
        //     // $cod = $i<9 ? '0' . ($i +1) : $i+1 ;
        //     $cod = 68 + $i;
        //     $cod_str = '1101' . $cod;
        //     $orden = 268 + $i +1;
        //     $id = $cod +102;
        //     $hu .=  "insert into dash_menu(id, cod_str, nombre, descripcion, nivel, tipo, orden, activo) 
        //         values ({$id}, '{$cod_str}', '{$nombre}', '{$nombre}', 3, 'link', {$orden},   true   )";
        //     \DB::select("insert into dash_menu(cod_str, nombre, descripcion, nivel, tipo, orden, activo) 
        //         values ('{$cod_str}', '{$nombre}', '{$nombre}', 3, 'link', {$orden},   true   )");
        // }
             
        return response()->json([
            'mensaje' => 'ok' .  (($user->permisos_abm == 'true') ? "_success" : "_access"  ),
            'perabm' => $user->permisos_abm,
            'nodosMenu'=> $nodosMenu,
        ]);
    }

    /**
     * Obtiene el dash_config -> configuracion del menu 
     * @param  Request $req = {id_dash_config : id}
     * @return object con la configuracion y los datos vinculados a este
     */
    public function datosVarEst(Request $req) 
    {
        // $id_dash_config = $req->id_dash_config;
        // $configs = collect(\DB::select("SELECT  * FROM dash_config WHERE  id = {$id_dash_config} "));

        // if($configs->count() <= 0)
        //     return response()->json(['mensaje'=> "No existe una configuracion con  id_dash_config aosciado actualmente al menu "]);

        // $config = $configs->first();
        // $obj =  json_decode($config->configuracion);
        $json_dashconfig_configuracion = '{"id_variable_estadistica":"1",
"campo_agregacion":"valor_defecto",
"condicion_sql":" pobreza_moderada IS NOT NULL ",
"campos_disponibles":[
    "r_departamento as departamento","rubro","dia","mes","gestion"
],
"sets_predefinidos":[
    {
        "etiqueta":"Pobreza moderada","imagen":"2",
        "x":["gestion"],"y":["departamento"],
        "agregacion":"% participación en columna (suma)","filtros":[],
        "grafico":{"tipo":"column-stacked"},"index":0
    }
]
}';

        $obj =  json_decode($json_dashconfig_configuracion);
        $tabla_vista            = 'SELECT p.nombre AS rubro, e.anonimato, r1.nombre AS departamento, r2.nombre AS id_municipio, 
i.fecha, DATE_FORMAT(i.fecha, "%d") as dia, DATE_FORMAT(i.fecha, "%m") as mes, DATE_FORMAT(i.fecha, "%Y") as gestion,
i.indice_riesgo, i.proximidad_fisica, i.exposicion_enfermedad, i.trabajo_ambiente_cerrado, i.contacto_con_otros,
1 as valor_defecto
FROM empresas e 
LEFT JOIN parametros p ON e.id_rubro = p.id AND p.dominio = "rubro" AND p.activo
LEFT JOIN regiones r1 ON e.id_departamento = r1.id AND r1.activo 
LEFT JOIN regiones r2 ON e.id_municipio = r2.id AND r2.activo 
LEFT JOIN empresas_indice_riesgo i ON i.id_empresa = e.id  
WHERE e.activo';

        // $campo_agregacion       = $obj->campo_agregacion;
        // $condicion_sql          = $obj->condicion_sql;
        // Obtiene los campos con sus alias
        // $campos_disponibles_select = implode(', ', $obj->campos_disponibles);
        // Para el group by se le quitan los alias
        // $campos_originales_groupby = collect($obj->campos_disponibles)
                                // ->map(function($item, $key){
                                //     return stripos($item, ' as ') ?  substr($item, 0, stripos($item, ' as ')) : $item;
                                // })->implode(', ');

        // $qrySelect = $qryCondicion = $qryGroupBy = '';

        // $tablas = collect(\DB::connection("dbestadistica")->select("select table_name from information_schema.tables 
        //                         where table_schema='public' and table_type='VIEW'
        //                         and table_name ilike '%{$tabla_vista}%' "));
        // if($tablas->count()<=0)
        //    return response()->json([ 'mensaje' => "No existe ninguna tabla o vista que coincida con {$tabla_vista}"]) ;

        // $tabla = $tablas->first()->table_name;

        // $qrySelect = "SELECT {$campos_disponibles_select}, SUM( {$campo_agregacion} ) AS valor
        //             FROM {$tabla} 
        //             WHERE 1 = 1 " ; 

        // $qryCondicion = trim($condicion_sql) == '' ? '' : ' AND ' . $condicion_sql . ' ' ;

        // $qryGroupBy = " GROUP BY {$campos_originales_groupby} ";
        //       // ORDER BY t_ano, {$campos_disponibles} " ;

        // $query = $qrySelect . $qryCondicion . $qryGroupBy;


        try
        {
            $collection  =   collect(\DB::select($tabla_vista));   
        }
        catch (\Exception $e)
        {
            $collection = array();
        }

        // try {
        //     $unidadesMedida = collect(\DB::connection('dbestadistica')->select("
        //         SELECT valor_unidad_medida, valor_defecto_um, valor_tipo FROM {$tabla} LIMIT 1"))->first();
        // }

        // catch(\Exception $e)
        // {

        //     $unidadesMedida = '_';
        // }
        // $indicador = collect(\DB::connection('pgsql')->select("
        //             SELECT * FROM spie_indicadores where id = {$id_indicador} "))->first();

        // $metasPeriodo = collect(\DB::connection('pgsql')->select("
        //             SELECT to_char(fecha, 'YYYY')::int as gestion, meta_del_periodo 
        //             FROM spie_indicadores_metas 
        //             WHERE id_indicador = {$id_indicador}
        //             ORDER BY fecha"));
        
        $unidadesMedida = '_';

        return Response()->json([ 
                    'mensaje'   => 'ok',
                    'collection'=> $collection,
                    'unidad_medida' => $unidadesMedida,
                    // 'indicador' => $indicador,
                    // 'metas'     => $metasPeriodo,
                    'query'     => $tabla_vista,
                    'configuracionObj' => $obj
        ]);

    }

    
    public function archivosExtVarEst(Request $req)
    {
        $id_dash_config = $req->id_dash_config;
        $archivos_ext = \DB::select("SELECT a.id as id_archivo, a.nombre,  a.descripcion, c.id_dash_config, c.id as id_dash_config_archivo 
                                        FROM archivos a, dash_config_archivo c 
                                        WHERE a.id = c.id_archivo AND c.id_dash_config = {$id_dash_config} ");
        return response()->json([
            'data' => $archivos_ext,
        ]);
    }


    /*---------------------------------------------------------------------------
    | Guarda el JSON de configuracion
     */
    public function guardaConfiguracion(Request $req)
    {
        $id_dach_menu = $req->id_dash_menu;
        $configuracionString = str_replace("'", "''", $req->configuracionString);
        $dash_menu = collect(\DB::select("SELECT * from dash_menu where id = {$id_dach_menu} " ));
        $id_config = $dash_menu->first()->id_dash_config;

        \DB::select(" UPDATE dash_config set configuracion = '{$configuracionString}'    where id = {$id_config}");

        return response()->json([
            "mensaje"=>"ok"
        ]);


    }

    /*------------------------------------------------------------------------------------------------
    | Verifica si ya existe el archivo archivos $req->files = [obj1, obj2], cada elemento
    | tiene la forma obj={id:1, nombre:'file1.txt'}
     */
    
    public function verificaArchivos(Request $req)
    {
        $newFiles = [];
        if($req->files){ 
            $archivosBD = collect(\DB::select("SELECT nombre from archivos "));

            $newFiles = collect($req->files)->diff($archivosBD); 
        }
        return response()->jason(['data' => $newFiles]);
    }

    /* ----------------------------------------------------------------------------------
    | Guarda los archivos enviados 
     */
    public function saveAnnexedFiles(Request $req)
    {
        $id_dash_config = $req->id_dash_config;

        if($req->archivos_anexos){

            /* en archivos_anexos vienen solo los archivos que se quearon despues de eliminar .Es una lista */

            $olds = collect(\DB::select ("SELECT ca.id, a.nombre from dash_config_archivo ca, archivos a 
                                    where ca.id_archivo = a.id AND  ca.id_dash_config = {$id_dash_config}"));
            foreach ($olds as $old) {
                $existe = 0;
                foreach ($req->archivos_anexos as $n) {
                    $existe = $old->nombre == $n['url'] ? 1 : $existe;
                }
                if($existe == 0) 
                    \DB::table('dash_config_archivo')->where('id', $old->id )->delete();
            }
        }
        if($req->archivo_nuevo){ 
            $file=$req->archivo_nuevo;

            $nombreArchivo = $file->getClientOriginalName();
            // $tipo   = $file->getMimeType();
            $extension = $file->getClientOriginalExtension();
            $ruta_archivo_temp = $file->getPathName();
            // $size = $file->getSize();
            // $nombreArchivoSystem = uniqid('ORG-');
            $target = $this->carpeta . $nombreArchivo;

            if(move_uploaded_file($ruta_archivo_temp,$target)){

                $msgFile="Archivo subido correctamente";

                $id_archivo = \DB::table('archivos')->insertGetId([
                    'nombre' => $nombreArchivo,
                    'extension' => $extension,
                    'ruta'=> $target,
                    'descripcion' => $req->descripcion,
                    'created_at' => \Carbon\Carbon::now(-4),
                    'user_id'=> \Auth::user()->id
                ]);
                \DB::table('dash_config_archivo')->insert([
                    'id_archivo' => $id_archivo,
                    'id_dash_config' => $id_dash_config,
                ]);
            }else{
                $msgFile = "Error al subir el Archivo";
            }

            return response()->json(
                ['mensaje'=>$msgFile,
                'nom'=>$file->getClientOriginalName(),
                'nombre' => $file->getClientOriginalName(),
                'extension' => $file->getClientOriginalExtension(),
                'ruta' => $file->getPathName(),
                'size' => $file->getSize(),
                'nombre_UI'=> uniqid('ORG-'),
            ]);
        }

       return response()->json(['data' => 'no hay']);
    }

}
