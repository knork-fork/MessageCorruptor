<?php

/**
 * Get a JSON set of corrupted versions of sample message for defined percentages of corruption.
 * 
 * Allowed corruption percentages: 0-100 (0 being plain text and 100 totally unreadable)
 */

require_once("src/MessageCorruptor.php");
$messageCorruptor = new MessageCorruptor();

// Return scrambled messages for following corruption percentages:
$percentages = Array(0, 1, 2, 5, 10, 15, 20, 30, 40, 100);

$message = "This is a message that will be scrambled.";

$corruptedSet = json_encode($messageCorruptor->corruptMessage($message, $percentages));

/*
Example of output:

{
    "0":"This is a message that will be scrambled.",
    "1":"This is a messagv that will be scrambled.",
    "2":"This is a messhge that will be scrambled.",
    "5":"This is a messTge that will be scrambred.",
    "10":"This is a message that wlil bl scrambeed.",
    "15":"Teis ie a mshsags that will be scrambled.",
    "20":"This is a mebsage nNat will Ie srDamblKd.",
    "30":"vhis ws a messagA tfat wIlU bN s rLrbledD",
    "40":"Tlis iH g JGscage shat xiQf SA scramblldK",
    "100":"vZ W UM Q trvIJNd Gyqa wxVD Jm l hEHxKhlm"
}
*/