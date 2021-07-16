<?php
    return [
        'parameter_banjir' => [
            'curah_hujan' => [
                'sedang' => [
                    'batas_bawah' => 100,
                    'batas_atas' => 200,
                ],
                'rendah' => [
                    'operator' => '<=',
                    'nominal' => 100
                ],
                'tinggi' => [
                    'operator' => '>',
                    'nominal' => 200
                ]
            ],
            'riwayat_banjir' => [
                'sedang' => [
                    'batas_bawah' => 1,
                    'batas_atas' => 1,
                ],
                'rendah' => [
                    'operator' => '=',
                    'nominal' => 0
                ],
                'tinggi' => [
                    'operator' => '>',
                    'nominal' => 2
                ]
            ],
            'kapasitas_drainase' => [
                'sedang' => [
                    'batas_bawah' => 5000,
                    'batas_atas' => 6399,
                ],
                'rendah' => [
                    'operator' => '<',
                    'nominal' => 5000
                ],
                'tinggi' => [
                    'operator' => '>',
                    'nominal' => 6399
                ]
            ],
            'kepadatan_penduduk' => [
                'sedang' => [
                    'batas_bawah' => 20200,
                    'batas_atas' => 40349,
                ],
                'rendah' => [
                    'batas_bawah' => 50,
                    'batas_atas' => 20200,
                ],
                'tinggi' => [
                    'operator' => '>=',
                    'nominal' => 40350
                ]
            ],

        ],
        'parameter_longsor' => [
            'curah_hujan' => [
                'sedang' => [
                    'batas_bawah' => 100,
                    'batas_atas' => 200,
                ],
                'rendah' => [
                    'operator' => '<=',
                    'nominal' => 100
                ],
                'tinggi' => [
                    'operator' => '>',
                    'nominal' => 200
                ]
            ],
            'riwayat_longsor' => [
                'sedang' => [
                    'batas_bawah' => 1,
                    'batas_atas' => 1,
                ],
                'rendah' => [
                    'operator' => '=',
                    'nominal' => 0
                ],
                'tinggi' => [
                    'operator' => '>',
                    'nominal' => 2
                ]
            ],
            'kemiringan_lahan' => [
                'sedang' => [
                    'batas_bawah' => 16,
                    'batas_atas' => 25,
                ],
                'rendah' => [
                    'operator' => '<',
                    'nominal' => 8
                ],
                'tinggi' => [
                    'operator' => '>',
                    'nominal' => 45
                ]
            ],
        ],
        'parameter_kekeringan' => [
            'jumlah_penduduk' => [
                'sedang' => [
                    'batas_bawah' => 2001,
                    'batas_atas' => 3000,
                ],
                'rendah' => [
                    'operator' => '<=',
                    'nominal' => 2000
                ],
                'tinggi' => [
                    'operator' => '>',
                    'nominal' => 3000
                ]
            ],
            'riwayat_kekeringan' => [
                'sedang' => [
                    'batas_bawah' => 1,
                    'batas_atas' => 1,
                ],
                'rendah' => [
                    'operator' => '=',
                    'nominal' => 0
                ],
                'tinggi' => [
                    'operator' => '>',
                    'nominal' => 2
                ]
            ],
            'jarak_sumber' => [
                'sedang' => [
                    'batas_bawah' => 1.1,
                    'batas_atas' => 2,
                ],
                'rendah' => [
                    'operator' => '<=',
                    'nominal' => 1
                ],
                'tinggi' => [
                    'operator' => '>',
                    'nominal' => 2
                ]
            ],
        ],
        'parameter_puting_beliung' => [
            'curah_hujan' => [
                'sedang' => [
                    'batas_bawah' => 100,
                    'batas_atas' => 200,
                ],
                'rendah' => [
                    'operator' => '<=',
                    'nominal' => 100
                ],
                'tinggi' => [
                    'operator' => '>',
                    'nominal' => 200
                ]
            ],
            'riwayat_puting_beliung' => [
                'sedang' => [
                    'batas_bawah' => 1,
                    'batas_atas' => 1,
                ],
                'rendah' => [
                    'operator' => '=',
                    'nominal' => 0
                ],
                'tinggi' => [
                    'operator' => '>',
                    'nominal' => 2
                ]
            ],
        ],
    ];
?>
