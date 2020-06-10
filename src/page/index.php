<?php
$name = isset($name) ? $name : '';

echo sprintf('hello %s', htmlspecialchars($name, ENT_QUOTES));

