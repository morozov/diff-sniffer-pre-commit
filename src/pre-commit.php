<?php

/**
 * Pre-commit hook entry point
 *
 * PHP version 5
 *
 * @category  DiffSniffer
 * @package   DiffSniffer
 * @author    Sergei Morozov <morozov@tut.by>
 * @copyright 2017 Sergei Morozov
 * @license   http://mit-license.org/ MIT Licence
 * @link      http://github.com/morozov/diff-sniffer-pre-commit
 */

use DiffSniffer\Application;
use DiffSniffer\Command\PreCommit;

// not all git commands which do commit internally accept the --no-verify flag,
// so this will be a bulletproof way to disable verification when needed
if (!empty($_SERVER['DIFF_SNIFFER_NO_VERIFY'])) {
    exit();
}

require __DIR__ . '/bootstrap.php';

return (new Application())->run(new PreCommit(), $_SERVER['argv']);
