<?php
$umask = 0012;
$perm  = 0777;
printf(
    "umask: %04o perm: %04o result: %04o\n",
    $umask,
    $perm,
    $perm & (0777 - $umask)
);
