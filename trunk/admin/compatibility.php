<?php
if (!function_exists('scandir')) {
    /**
     * scandir for PHP4
     *
     * @param string $dir
     * @return array $files
     */
    function scandir($dir) {
        $dh  = opendir($dir);

        $files = array();
        while (false !== ($filename = readdir($dh))) {
            $files[] = $filename;
        }

        return $files;
    }
}
