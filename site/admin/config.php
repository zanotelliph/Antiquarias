<?php
if (!defined('ADMIN_BASE_PATH')) {
    $forcedBase = '/Antiquarias/site/admin';
    define('ADMIN_BASE_PATH', $forcedBase);
}

if (!defined('ADMIN_BASE_PATH')) {
    $defaultBase = '/site/admin';
    $pattern = '#(.*?/site/admin)#i';

    $guess = '';

    $docRoot = isset($_SERVER['DOCUMENT_ROOT']) ? realpath($_SERVER['DOCUMENT_ROOT']) : '';
    $adminDir = realpath(__DIR__);

    if ($docRoot && $adminDir) {
        $docRoot = str_replace('\\', '/', $docRoot);
        $adminDir = str_replace('\\', '/', $adminDir);

        $docRootTrim = rtrim($docRoot, '/');
        $docRootLower = strtolower($docRootTrim);
        $adminLower = strtolower($adminDir);

        if (strpos($adminLower, $docRootLower) === 0) {
            $guess = substr($adminDir, strlen($docRootTrim));
            $guess = $guess ? '/' . ltrim($guess, '/') : '/';
        }
    }

    if (!$guess) {
        $scriptFilename = str_replace('\\', '/', $_SERVER['SCRIPT_FILENAME'] ?? '');
        if ($docRoot && $scriptFilename) {
            $docRootClean = rtrim(str_replace('\\', '/', $docRoot), '/');
            if (strpos(strtolower($scriptFilename), strtolower($docRootClean)) === 0) {
                $relativeScript = substr($scriptFilename, strlen($docRootClean));
                $relativeScript = '/' . ltrim($relativeScript, '/');
                if (($pos = stripos($relativeScript, '/site/admin')) !== false) {
                    $guess = substr($relativeScript, 0, $pos + strlen('/site/admin'));
                }
            }
        }
    }

    if (!$guess) {
        $requestUri = $_SERVER['REQUEST_URI'] ?? '';
        if ($requestUri) {
            $path = parse_url($requestUri, PHP_URL_PATH);
            if ($path && preg_match($pattern, $path, $matches)) {
                $guess = $matches[1];
            }
        }
    }

    if (!$guess) {
        $scriptName = $_SERVER['SCRIPT_NAME'] ?? '';
        if ($scriptName && preg_match($pattern, $scriptName, $matches)) {
            $guess = $matches[1];
        }
    }

    if (!$guess) {
        $projectFolder = basename(dirname(__DIR__, 2));
        if (!empty($projectFolder)) {
            $guess = '/' . trim($projectFolder, '/') . '/site/admin';
        }
    }

    $configuredBase = getenv('ADMIN_BASE_PATH');
    if ($configuredBase) {
        $guess = $configuredBase;
    }

    $base = $guess ?: $defaultBase;

    $base = rtrim($base, '/');
    if ($base === '') {
        $base = '/';
    }

    define('ADMIN_BASE_PATH', $base);
}

