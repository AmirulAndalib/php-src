--TEST--
enchant_broker_get_error() function
--CREDITS--
marcosptf - <marcosptf@yahoo.com.br>
--EXTENSIONS--
enchant
--FILE--
<?php
$broker = enchant_broker_init();
if (is_object($broker)) {
    echo("OK\n");
    $enchantErr = enchant_broker_get_error($broker);

    if ("" == $enchantErr) {
        echo("OK\n");
    } else {
        echo("enchant failed ==>" . $enchantErr);
    }
} else {
    echo("init failed\n");
}
echo "OK\n";
?>
--EXPECT--
OK
OK
OK
