<?php

if (! function_exists('parsedown')) {
    /**
     * Parse a string in Parsedown/markdown
     *
     * @param string $str
     * @return string
     */
    function parsedown($str)
    {
        return resolve('parsedown')->text($str);
    }
}
