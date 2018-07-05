<?php

/**
 * Description of class-wtst-page-builder-structures
 *
 * @author Paweł
 */
class wtst_page_builder_structures {
    
    public static function get_structure_cnf($structType, $cnf = []) {
        if(!isset(self::$structures[$structType])) {
            return false;
        }
        $struct = self::$structures[$structType];
        if(!isset($struct['default-cnf'])) {
            return false;
        }
        foreach($struct['default-cnf'] as $key => $defValue) {
            if(!isset($cnf[$key])) {
                $cnf[$key] = $defValue;
            }
        }
        return $cnf;
    }
    
    public static function get_structure_code($structType, $codeType, $cnf, $objCounter) {
        if(!isset(self::$structures[$structType])) {
            return false;
        }
        $struct = self::$structures[$structType];
        if(!isset($struct['show'][$codeType])) {
            return false;
        }
        $fileToInc = $struct['dir'].DS.$struct['show'][$codeType];
        if(!file_exists($fileToInc)) {
            return false;
        }
        $structData = self::$structures[$structType];
        $cnf = self::get_structure_cnf($structType, $cnf);
        ob_start();
        include $fileToInc;
        $html = ob_get_clean();
        return $html;
    }
    
    public static function get_structure_data($structType) {
        if(!isset(self::$structures[$structType])) {
            return false;
        }
        return self::$structures[$structType];
    }
    
    protected static $cnf = [
        'datafile' => 'info.json',
    ];
    
    protected static $structures = [];
    
    public static function hook($directory) {
        if (!is_dir($directory)) {
            return false;
        }
        $infoFile = $directory.DS.self::$cnf['datafile'];
        if (!file_exists($infoFile)) {
            return false;
        }
        
        $data = json_decode(file_get_contents($infoFile), true);
        if ($data == null) {
            return false;
        }
        
        if(!isset($data['name'])) {
            return false;
        }
        
        $data['dir'] = $directory;
        $data['url'] = plugin_dir_url( $infoFile );

        self::$structures[$data['name']] = $data;
    }
    
    public static function get_structures() {
        return self::$structures;
    }
    
}
