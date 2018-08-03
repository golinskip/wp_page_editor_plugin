<?php

/**
 * Description of class-wtst-page-builder-converter
 *
 * @author Paweł
 */
class wtst_page_builder_converter {

    public function backend_to_object($input) {
        $outData = ['cnf' => [], 'sec' => []];

        $xmldoc = new DOMDocument();
        $xmldoc->loadHTML('<?xml encoding="utf-8" ?>' .stripslashes(stripslashes($input)));
        $feeditem = $xmldoc->getElementsByTagName('div');
        $rootNodde = $feeditem->item(0);
        $secNodes = $this->__get_elements_by_class($rootNodde, 'div', 'pb-sec');

        $secCnt = 0;
        if (count($secNodes) > 0) {
            foreach ($secNodes as $secNode) {
                $outData['sec'][$secCnt] = [];
                $secConfig = @json_decode($secNode->getAttribute('data-config'), true);
                $outData['sec'][$secCnt]['cnf'] = $secConfig;
                $outData['sec'][$secCnt]['col'] = [];
                $colNodes = $this->__get_elements_by_class($secNode, 'div', 'pb-col');
                $colCnt = 0;
                if (count($colNodes) > 0) {
                    foreach ($colNodes as $colNode) {
                        $outData['sec'][$secCnt]['col'][$colCnt] = [];
                        $colConfig = @json_decode($colNode->getAttribute('data-config'), true);
                        $outData['sec'][$secCnt]['col'][$colCnt]['cnf'] = $colConfig;
                        $outData['sec'][$secCnt]['col'][$colCnt]['obj'] = [];
                        $objNodes = $this->__get_elements_by_class($colNode, 'div', 'pb-obj');
                        $objCnt = 0;
                        if (count($objNodes) > 0) {
                            foreach ($objNodes as $objNode) {
                                $outData['sec'][$secCnt]['col'][$colCnt]['obj'][$objCnt] = [];
                                $objConfig = @json_decode($objNode->getAttribute('data-config'), true);
                                $objType = $objNode->getAttribute('data-type');
                                $outData['sec'][$secCnt]['col'][$colCnt]['obj'][$objCnt]['type'] = $objType;
                                $outData['sec'][$secCnt]['col'][$colCnt]['obj'][$objCnt]['cnf'] = $objConfig;
                                $objCnt++;
                            }
                        }
                        $colCnt++;
                    }
                }
                $secCnt++;
            }
        }
        return $outData;
    }

    protected function __get_elements_by_class(&$parentNode, $tagName, $className) {
        $nodes = array();

        $childNodeList = $parentNode->getElementsByTagName($tagName);
        for ($i = 0; $i < $childNodeList->length; $i++) {
            $temp = $childNodeList->item($i);
            $clss = explode(" ",$temp->getAttribute('class'));
            if(count($clss) > 0) {
                foreach($clss as $cls) {
                    if($cls === $className) {
                        $nodes[] = $temp;
                    }
                }
            }
        }

        return $nodes;
    }

    /**
     * 
     * @param type $input
     */
    public function object_to_backend($input, $enabled) {
        global $defaultCnf;
        $objCounter = 0;
        $out = '<div class="pb-canvas">';
        $out .= '<button id="pb-save" class="button button-primary">' . __('Save', 'wtst') . '<span class="dashicons dashicons-yes"></span></button>';
        $out .= '<button id="pg-sec-add" class="pb-sec-add" >' . __('Add section', 'wtst') . '<span class="dashicons dashicons-plus"></span></button>';
        $out .= '<button id="pb-disable" class="button">' . __('Disable', 'wtst') . '<span class="dashicons dashicons-arrow-down"></span></button>';
        $out .= '<button id="pb-enable" class="button">' . __('Enable', 'wtst') . '<span class="dashicons dashicons-arrow-up"></span></button>';
        $out .= '<div id="pb-canvas-content">';
        if (isset($input['sec']) && is_array($input['sec']))
            foreach ($input['sec'] as $curSection) {
                $curSectionConfig = isset($curSection['cnf']) ? $curSection['cnf'] : $defaultCnf['sec'];
                $out .= $this->__backend_sec_header($curSectionConfig);
                if (isset($curSection['col']) && is_array($curSection['col']))
                    foreach ($curSection['col'] as $curCol) {
                        $curColConfig = isset($curCol['cnf']) ? $curCol['cnf'] : $defaultCnf['col'];
                        $out .= $this->__backend_col_header($curColConfig);
                        if (isset($curCol['obj']) && is_array($curCol['obj']))
                            foreach ($curCol['obj'] as $curObj) {
                                $objCounter++;
                                $curObjConfig = isset($curObj['cnf']) ? $curObj['cnf'] : $defaultCnf['obj'];
                                $type = isset($curObj['type']) ? $curObj['type'] : '';
                                $structureData = wtst_page_builder_structures::get_structure_data($type);
                                $out .= $this->__backend_obj_header($type, $structureData['title'], $curObjConfig);
                                $out .= wtst_page_builder_structures::get_structure_code($curObj['type'], 'backend-preview', $curObj['cnf'], $objCounter);
                                $out .= '</div></div>';
                            }
                        $out .= '</div></div>';
                    }
                $out .= '</div></div>';
            }
        $out .= '</div>';
        $out .= '<input type="hidden" id="pb-is-enabled" value="'.$enabled.'">';
        $out .= '<input type="hidden" name="pb-prototype-sec" value="' . htmlspecialchars($this->__backend_sec_header([])) . '</div></div>' . '"/>';
        $out .= '<input type="hidden" name="pb-prototype-col" value="' . htmlspecialchars($this->__backend_col_header([])) . '</div></div>' . '"/>';
        $out .= '<input type="hidden" name="pb-prototype-obj" value="' . htmlspecialchars($this->__backend_obj_header('', __('New object', 'wtst'), [])) . '</div></div>' . '"/>';
        $out .= '<div id="pb-dialog" title=""></div>';
        $out .= '';
        return $out;
    }

    protected function __backend_sec_header($config) {
        global $defaultCnf;
        $config = ($config != null)?$config:$defaultCnf['sec'];
        $out = '<div class="pb-sec" data-config="' . htmlspecialchars(json_encode($config)) . '">';
        $out .= '<div class="pb-sec-header">
                    <span class="pb-icon dashicons dashicons-move left pb-sec-mover"></span>
                    <span class="pb-icon dashicons dashicons-trash     pb-sec-remove"></span>
                    <span class="pb-icon dashicons dashicons-admin-page pb-sec-duplicate"></span>
                    <span class="pb-icon dashicons dashicons-edit      pb-sec-edit"></span>
                    <span class="pb-icon dashicons dashicons-plus      pb-col-add"></span>
                </div>
                <div class="pb-sec-body">';
        return $out;
    }

    protected function __backend_col_header($config) {
        global $defaultCnf;
        $config = ($config != null)?$config:$defaultCnf['col'];
        $colSize = (isset($config['size'])) ? $config['size'] : $defaultCnf['col']['size'];
        if($colSize == 13) $colSize = 12;
        $out  = '<div class="pb-col pb-col-' . $colSize . '" data-config="' . htmlspecialchars(json_encode($config)) . '">';
        $out .= '<div class="pb-col-header">
                    <span class="pb-icon dashicons dashicons-move  pb-col-mover"></span>
                    <span class="pb-icon dashicons dashicons-trash pb-col-remove"></span>
                    <span class="pb-icon dashicons dashicons-admin-page pb-col-duplicate"></span>
                    <span class="pb-icon dashicons dashicons-edit  pb-col-edit"></span>
                    <span class="pb-icon dashicons dashicons-plus  pb-obj-add"></span>
                </div>
                <div class="pb-col-body">';
        return $out;
    }

    protected function __backend_obj_header($type, $title, $config) {
        $out = '';
        $out .= '<div class="pb-obj" data-type="' . $type . '" data-config="' . htmlspecialchars(json_encode($config)) . '">';
        $out .= '<div class="pb-obj-header">
                    <span class="pb-obj-title">'.$title.'</span>
                    <span class="pb-icon dashicons dashicons-move left pb-obj-mover"></span>
                    <span class="pb-icon dashicons dashicons-trash     pb-obj-remove"></span>
                    <span class="pb-icon dashicons dashicons-admin-page pb-obj-duplicate"></span>
                    <span class="pb-icon dashicons dashicons-edit      pb-obj-edit"></span>
                </div>
                <div class="pb-obj-body">';
        return $out;
    }

}
