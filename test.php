<?php
    $arr = [
        '0' => [
            'first' => 12,
            'second' => 13,
            'third' => 14
        ],
        '1' => [
            'forth' => '15',
            'fifth' => 16,
            'sixth' => 17
        ]
    ];
    $num = 0;
    foreach($arr as $key => $a) {
        if($key == $num) {
            foreach($a as $key1 => $b) {
                if($key1 == 'second') {
                    print_r($arr[$key][$key1]);
                }
            }
        }
    }   
?>