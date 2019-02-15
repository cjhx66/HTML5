<?php
    mkdir("沉静幻想");
    function create_folders($dir) {
        return is_dir($dir) or (create_folders(dirname($dir)) and mkdir($dir, 0777));
    }
?>