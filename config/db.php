<?php

if (YII_ENV_DEV && file_exists('db-dev.php')) {
    return require 'db-dev.php';
} else {
    return require 'db-prod.php';
}
