<?php

namespace Core;

abstract class Controller {

    /**
     * @param $tpl - template name to render
     * @param $params - params passed to template
     */
    public function render($tpl,$params) {
        $config = Helpers::config();
        $baseUrl = $config->app->baseUrl;
        include Helpers::getFullPath('src/views/' . $tpl);
    }
    public function getFullPath($path) {
        return Helpers::getFullPath($path);
    }
}
