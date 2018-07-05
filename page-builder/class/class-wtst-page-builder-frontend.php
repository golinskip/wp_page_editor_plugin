<?php

class wtst_page_builder_frontend {
    

    protected $obj = null;
    protected $usedTypes = [];
    protected $objectArray = [];
    
    protected $allCss = "";
    protected $allJs = "";
    protected $frontendHtml = "";
    
    const OBJ_ID_PREFIX = "wtst-pg-obj-";

    public function load($type = '', $type_id = 0) {
        if ($this->obj === null) {
            $objectCounter = 0;
            if($type === ''){
                return false;
            }
            $wtst_page_builder_database = new wtst_page_builder_database();
            $inputData = $wtst_page_builder_database->loadContent($type, $type_id);
            if($inputData[0] == 0) {
                return false;
            }
            $obj = json_decode($inputData[1], true);
            global $defaultCnf;
            if (isset($obj['sec']) && is_array($obj['sec']) && count($obj['sec']) > 0) {
                for($i=0; $i<count($obj['sec']); $i++) {
                    // $obj['sec'][$i]
                    foreach($defaultCnf['sec'] as $key=>$val) {
                        if(!isset($obj['sec'][$i]['cnf'][$key])) {
                            $obj['sec'][$i]['cnf'][$key] = $val;
                        }
                    }
                    if (isset($obj['sec'][$i]['col']) && is_array($obj['sec'][$i]['col']) && count($obj['sec'][$i]['col']) > 0) {
                        for($j=0; $j<count($obj['sec'][$i]['col']); $j++) {
                            foreach($defaultCnf['col'] as $key=>$val) {
                                if(!isset($obj['sec'][$i]['col'][$j]['cnf'][$key])) {
                                    $obj['sec'][$i]['col'][$j]['cnf'][$key] = $val;
                                }
                            }
                            // $obj['sec'][$i]['col'][$j]
                            if (isset($obj['sec'][$i]['col'][$j]['obj']) && is_array($obj['sec'][$i]['col'][$j]['obj']) && count($obj['sec'][$i]['col'][$j]['obj']) > 0) {
                                //$obj['sec'][$i]['col'][$j]['obj'][$k]
                                for($k=0; $k<count($obj['sec'][$i]['col'][$j]['obj']); $k++) {
                                    $objectCounter++;
                                    $obj['sec'][$i]['col'][$j]['obj'][$k]['id'] = self::OBJ_ID_PREFIX.$objectCounter;
                                    $this->objectArray[] = $obj['sec'][$i]['col'][$j]['obj'][$k];
                                    if(!isset($this->usedTypes[$obj['sec'][$i]['col'][$j]['obj'][$k]['type']])) {
                                        $this->usedTypes[$obj['sec'][$i]['col'][$j]['obj'][$k]['type']] 
                                                = wtst_page_builder_structures::get_structure_data($obj['sec'][$i]['col'][$j]['obj'][$k]['type']) ;
                                    }
                                }
                            }
                        }
                    }
                }
            }
            $this->obj = $obj;
            include(__DIR__ . UP . DS . 'view' . DS . 'frontend.php');
            $this->frontendHtml = $frontendHtml;
            $this->allCss .= $frontendCss;
        }
        return $this->obj;
    }

    public function enqueAssets() {
        foreach($this->objectArray as $obj) {
            $cnf = $obj['cnf'];
            $type = $this->usedTypes[$obj['type']];
            ob_start();
                $cssFile= $type['dir'].DS.$type['assets']['css'];
                include($cssFile);
            $this->allCss.=ob_get_clean();
            ob_start();
                $jsFile = $type['dir'].DS.$type['assets']['js'];
                include($jsFile);
            $this->allJs.=ob_get_clean();
        }
        add_action( 'wp_footer', array($this, 'enqueue_script'), 9999 );
        add_action( 'wp_head', array($this, 'enqueue_style') );
    }
    
    public function enqueue_style() {
        echo '<style type="text/css">';
        echo $this->allCss;
        echo '</style>';
    }
    
    public function enqueue_script() {
        echo '<script type="text/javascript">';
        echo $this->allJs;
        echo '</script>';
    }

    public function getHTML() {
        return $this->frontendHtml;
    }

}
