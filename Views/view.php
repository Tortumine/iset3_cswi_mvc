<?php
/**
 * Created by PhpStorm.
 * User: Tortumine
 * Date: 17-08-17
 * Time: 11:54
 */
class View {
    private $file;
    private $title;

    public function __construct($action) {
        $this->file = "Views/view_" . $action . ".php";
    }
    public function generate($data) {
        $content = $this->gen_file($this->file, $data);
        $view = $this->gen_file('Views/layout.php',array('title' => $this->title, 'content' => $content));
        echo $view;
    }
    private function gen_file($file, $data) {
        if (file_exists($file))
        {
            extract($data);
            ob_start();
            require $file;
            return ob_get_clean();
        }
        else {
            throw new Exception("404 File '$file' not found");
        }
    }
}