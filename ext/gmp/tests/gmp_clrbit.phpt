--TEST--
gmp_clrbit() basic tests
--EXTENSIONS--
gmp
--FILE--
<?php

$n = gmp_init(0);
gmp_clrbit($n, 0);
var_dump(gmp_strval($n));

$n = gmp_init(-1);
try {
    gmp_clrbit($n, -1);
} catch (\ValueError $e) {
    echo $e->getMessage() . \PHP_EOL;
}
var_dump(gmp_strval($n));

$n = gmp_init("1000000");
try {
    gmp_clrbit($n, -1);
} catch (\ValueError $e) {
    echo $e->getMessage() . \PHP_EOL;
}
var_dump(gmp_strval($n));

$n = gmp_init("1000000");
gmp_clrbit($n, 3);
var_dump(gmp_strval($n));

$n = gmp_init("238462734628347239571823641234");
gmp_clrbit($n, 3);
gmp_clrbit($n, 5);
gmp_clrbit($n, 20);
var_dump(gmp_strval($n));

$n = array();
try {
    gmp_clrbit($n, 3);
} catch (TypeError $e) {
    echo $e->getMessage(), "\n";
}

echo "Done\n";
?>
--EXPECTF--
string(1) "0"
gmp_clrbit(): Argument #2 ($index) must be between 0 and %d * %d
string(2) "-1"
gmp_clrbit(): Argument #2 ($index) must be between 0 and %d * %d
string(7) "1000000"
string(7) "1000000"
string(30) "238462734628347239571822592658"
gmp_clrbit(): Argument #1 ($num) must be of type GMP, array given
Done
