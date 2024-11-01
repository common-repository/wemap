<?php
class Admin_Wemap_Interface {
    public function __construct ($version, $name) {
        $this->name = $name;
        $this->version = $version;
        $this->meta_box = new Admin_Wemap_Meta_Box($version, $name);
        // new Shortcode_Wemap();
        add_action('admin_enqueue_scripts', array($this, 'wemap_admin_scripts'));
    }

    public function wemap_admin_scripts() {
        wp_enqueue_style($this->name . '-admin', plugins_url('assets/css/admin.css', dirname(__FILE__)), false, $this->version);
    }
}
?>
