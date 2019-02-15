<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=320, initial-scale=1.0, user-scalable=no">
    <title>Document</title>
    <style>
        body {
            margin: 0;
        }

        div {
            background: #000;
            color: #fff;
            font-size: 30px;
            text-align: center;
        }

        .block {
            height: 50px;
            border-bottom: 4px solid #ccc;
        }

        #first  { width: 100px; }
        #second { width: 200px; }
        #third  { width: 300px; }
        #fourth { width: 320px; }
        #log { font-size: 16px; }
    </style>
</head>
<body>
<div id="first" class="block">100px</div>
<div id="second" class="block">200px</div>
<div id="third" class="block">300px</div>
<div id="fourth" class="block">320px</div>
<div id="log"></div>
<script>
    function log(content) {
        var logContainer = document.getElementById('log');
        var p = document.createElement('p');
        p.textContent = content;
        logContainer.appendChild(p);
    }

    log('body width:' + document.body.clientWidth)
    log(document.querySelector('[name="viewport"]').content)
</script>
</body>
</html>