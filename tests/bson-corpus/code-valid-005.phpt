--TEST--
Javascript Code: three-byte UTF-8 (☆)
--DESCRIPTION--
Generated by scripts/convert-bson-corpus-tests.php

DO NOT EDIT THIS FILE
--FILE--
<?php

require_once __DIR__ . '/../utils/tools.php';

$bson = hex2bin('190000000261000D000000E29886E29886E29886E298860000');

// BSON to Canonical BSON
echo bin2hex(fromPHP(toPHP($bson))), "\n";

// BSON to Canonical extJSON
echo json_canonicalize(toExtendedJSON($bson)), "\n";

$json = '{"a" : "\\u2606\\u2606\\u2606\\u2606"}';

// extJSON to Canonical extJSON
echo json_canonicalize(toExtendedJSON(fromJSON($json))), "\n";

// extJSON to Canonical BSON
echo bin2hex(fromJSON($json)), "\n";

?>
===DONE===
<?php exit(0); ?>
--EXPECT--
190000000261000d000000e29886e29886e29886e298860000
{"a":"\u2606\u2606\u2606\u2606"}
{"a":"\u2606\u2606\u2606\u2606"}
190000000261000d000000e29886e29886e29886e298860000
===DONE===