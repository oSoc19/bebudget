<?php
    function haalJavascriptOp($js)
    {
        return "<script src=\"" . base_url("assets/js/" . $js) . "\"></script>";
    }

    function haalCssOp($css)
    {
        return "<link rel=\"stylesheet\" href=\"" . base_url("assets/css/" . $css) . "\" />";
    }
