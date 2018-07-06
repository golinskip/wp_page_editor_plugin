<?php
class wtst_page_builder_database
{

    const DB_VERSION = '1.0';

    protected $wpdb = null;
    protected $collate;
    protected $tName = [
        'layout' => 'wtst_pb_layout',
        'version' => 'wtst_pb_layout_version'
    ];
    
    protected $cache = [];

    public function loadContent($type, $type_id) {
        if(isset($this->cache[$type][$type_id])) {
            return $this->cache[$type][$type_id]; 
        }
        $data = $this->wpdb->get_row( "
            SELECT * FROM " . $this->tName['layout'] . " l
            LEFT JOIN " . $this->tName['version'] . " v ON  v.id = l.version_id
            WHERE l.type = '". esc_sql($type)."' AND l.type_id = '".esc_sql($type_id)."'
            LIMIT 1;
            " );
        if ($data == null){
            return [0, "{}"];
        } else {
            if(!isset($this->cache[$type])) {
                $this->cache[$type] = [];
            }
            $this->cache[$type][$type_id] = [
                $data->enabled,
                $data->content
            ];
            return $this->cache[$type][$type_id];
        }
    }
    
    public function enable($type, $type_id, $flag = 1) {
        $this->wpdb->update(
                $this->tName['layout'], array(
                    'enabled' => $flag,
                ), array('type' => $type, 'type_id' => $type_id), array('%d'), array('%d')
        );
    }
    
    public function isEnabled($type, $type_id) {
        $return = $this->wpdb->get_var( "SELECT enabled FROM ".$this->tName['layout']." WHERE type = '". esc_sql($type)."' AND type_id = '".esc_sql($type_id)."';" );
        if($return === null) return -1;
        else return $return;
    }
    
    public function saveContent($type, $type_id, $content, $enabled) {
        $dataLayout = $this->wpdb->get_row( "
            SELECT l.id as id, l.version_id, v.version_no as version_no  FROM " . $this->tName['layout'] . " l
            LEFT JOIN " . $this->tName['version'] . " v ON  v.id = l.version_id
            WHERE l.type = '". esc_sql($type)."' AND l.type_id = '".esc_sql($type_id)."'
            LIMIT 1;
            " );
        if($dataLayout == null) {
            $this->wpdb->insert(
                    $this->tName['layout'], array(
                        'type' => esc_sql($type),
                        'type_id' => esc_sql($type_id),
                        'version_id' => 0,
                        'user_id' => get_current_user_id(),
                        'created' => current_time('mysql'),
                        'enabled' => $enabled?1:0,
                    )
            );
            $layoutId = $this->wpdb->insert_id;
            $lastVersion = 0;
        } else {
            $layoutId = $dataLayout->id;
            $lastVersion = (int)$dataLayout->version_no;
        }
        $updateRows = [
            'enabled' => $enabled?1:0,
        ];
        
        if($enabled) {
            $this->wpdb->insert(
                    $this->tName['version'], array(
                        'layout_id' => $layoutId,
                        'version_no' => ($lastVersion+1),
                        'content' => $content,
                        'user_id' => get_current_user_id(),
                        'created' => current_time('mysql'),
                    )
            );

            $versionId = $this->wpdb->insert_id;
            $updateRows['version_id'] = $versionId;
        }
        
        $this->wpdb->update(
                $this->tName['layout'], $updateRows, array('id' => $layoutId), ['%d', '%d'], ['%d', '%d']
        );
    }

    public function installTable() {
        require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );

        $sqlA = "CREATE TABLE IF NOT EXISTS " . $this->tName['layout'] . " (
          id mediumint(9) NOT NULL AUTO_INCREMENT,
          type varchar(16) NOT NULL,
          type_id INT DEFAULT 0,
          version_id INT,
          user_id INT NOT NULL,
          created datetime DEFAULT '0000-00-00 00:00:00' NOT NULL,
          enabled BOOL,
          PRIMARY KEY  (id)
        ) " . $this->collate . ";";
        //ALTER TABLE `wp_wtst_pb_layout` ADD `enabled` BOOLEAN NOT NULL AFTER `created`;
            
        $sqlB = "CREATE TABLE IF NOT EXISTS " . $this->tName['version'] . " (
          id mediumint(9) NOT NULL AUTO_INCREMENT,
          layout_id mediumint(9) NOT NULL,
          version_no INT NOT NULL,
          content TEXT,
          user_id INT NOT NULL,
          created datetime DEFAULT '0000-00-00 00:00:00' NOT NULL,
          PRIMARY KEY  (id)
        ) " . $this->collate . ";";
        dbDelta($sqlA);
        dbDelta($sqlB);

        add_option('wtst_pb_db_version', self::DB_VERSION);
    }

    public function installData() {
        $exists = $this->wpdb->get_var( "SELECT COUNT(*) FROM ".$this->tName['layout']." WHERE type = 'frontpage';" );
        if($exists > 0)  {
            return true;
        }
        
        $this->wpdb->insert(
                $this->tName['layout'], array(
                    'type' => 'frontpage',
                    'type_id' => 0,
                    'version_id' => 0,
                    'user_id' => get_current_user_id(),
                    'created' => current_time('mysql'),
                )
        );

        $layoutId = $this->wpdb->insert_id;

        $this->wpdb->insert(
                $this->tName['version'], array(
                    'layout_id' => $layoutId,
                    'version_no' => 1,
                    'content' => '{"cnf":[],"sec":[{"cnf":{"fullwidth":true},"col":[{"cnf":{"size":12},"obj":[{"type":"slider","cnf":{"foto":{"0":"http:\/\/via.placeholder.com\/1280x600","1":"http:\/\/via.placeholder.com\/1900x600","speed":1}}}]}]},{"cnf":{"fullwidth":false},"col":[{"cnf":{"size":4},"obj":[{"type":"image","cnf":{"urlType":1,"url":"http:\/\/via.placeholder.com\/1280x600","layout":"rounded"}},{"type":"text","cnf":{"val":"Lorem ipsum dolor suit ament"}}]},{"cnf":{"size":4},"obj":[{"type":"image","cnf":{"urlType":1,"url":"http:\/\/via.placeholder.com\/1280x600","layout":"rounded"}},{"type":"text","cnf":{"val":"Lorem ipsum dolor suit ament"}}]},{"cnf":{"size":4},"obj":[{"type":"image","cnf":{"urlType":1,"url":"http:\/\/via.placeholder.com\/1280x600","layout":"rounded"}},{"type":"text","cnf":{"val":"Lorem ipsum dolor suit ament"}}]}]}]}',
                    'user_id' => get_current_user_id(),
                    'created' => current_time('mysql'),
                )
        );

        $versionId = $this->wpdb->insert_id;

        $this->wpdb->update(
                $this->tName['layout'], array(
                    'version_id' => $versionId,
                ), array('id' => $layoutId), array('%d'), array('%d')
        );
    }

    public function install() {
        $this->installTable();
        $this->installData();
    }

    public function __construct() {
        global $wpdb;
        $this->wpdb = $wpdb;
        $this->collate = $this->wpdb->get_charset_collate();
        foreach ($this->tName as $key => $value) {
            $this->tName[$key] = $this->wpdb->prefix . $value;
        }
    }

}
