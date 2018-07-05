<?php

$pb_example['simple'] = [
    'cnf' => [// Konfiguracja całego szablonu
        'name' => 'Przykładowa strona'
    ],
    'sec' => [// tablica sekcji
        0 => [// Sekcja 1
            'cnf' => [
                'fullwidth' => true,
            ],
            'col' => [
                0 => [
                    'cnf' => [
                        'size' => 12
                    ],
                    'obj' => [
                        0 => [
                            'type' => 'slider',
                            'cnf' => [
                                'foto' => [
                                    'http://via.placeholder.com/1280x600',
                                    'http://via.placeholder.com/1900x600',
                                    'speed' => 1,
                                ],
                            ],
                        ],
                    ],
                ],
            ],
        ],
        1 => [// sekcja 2
            'cnf' => [// Ustawienia sekcji 1
                'fullwidth' => false // Czy na całą szerokość
            ],
            'col' => [// Tablica z kolumnami
                0 => [
                    'cnf' => [
                        'size' => 4 // Szerokość x/12 całej szerokości
                    ],
                    'obj' => [// Tablica obiektów
                        0 => [
                            'type' => 'image',
                            'cnf' => [
                                'urlType' => 1, // 1 - url, 0 - media ID
                                'url' => 'http://via.placeholder.com/1280x600',
                                'layout' => 'rounded' // 
                            ],
                        ],
                        1 => [
                            'type' => 'text',
                            'cnf' => [
                                'val' => 'Lorem ipsum dolor suit ament',
                            ],
                        ],
                    ],
                ],
                1 => [
                    'cnf' => [
                        'size' => 4 // Szerokość x/12 całej szerokości
                    ],
                    'obj' => [// Tablica obiektów
                        0 => [
                            'type' => 'image',
                            'cnf' => [
                                'urlType' => 1, // 1 - url, 0 - media ID
                                'url' => 'http://via.placeholder.com/1280x600',
                                'layout' => 'rounded'
                            ],
                        ],
                        1 => [
                            'type' => 'text',
                            'cnf' => [
                                'val' => 'Lorem ipsum dolor suit ament',
                            ],
                        ],
                    ],
                ],
                2 => [
                    'cnf' => [
                        'size' => 4 // Szerokość x/12 całej szerokości
                    ],
                    'obj' => [// Tablica obiektów
                        0 => [
                            'type' => 'image',
                            'cnf' => [
                                'urlType' => 1, // 1 - url, 0 - media ID
                                'url' => 'http://via.placeholder.com/1280x600',
                                'layout' => 'rounded'
                            ],
                        ],
                        1 => [
                            'type' => 'text',
                            'cnf' => [
                                'val' => 'Lorem ipsum dolor suit ament',
                            ],
                        ],
                    ],
                ],
            ],
        ],
    ],
];
