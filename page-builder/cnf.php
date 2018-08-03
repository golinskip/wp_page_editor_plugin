<?php

$defaultCnf = [
    'sec' => [
        'anchor' => '',
        'transparent' => cnf_opts::YES,
        'width' => cnf_opts::COL_WIDTH_LL,
        'height' => cnf_opts::HEIGHT_AUTO,
        'bgcolor' => '',
        'bgimage' => '',
        'scrollify' => cnf_opts::NO,
        'bgstyle' => cnf_opts::BG_STYLE_CENTER,
        'parallax_speed' => 0,
        'padding_top' => 0,
        'padding_bottom' => 0,
        'txtstyle' => cnf_opts::TXT_STYLE_DARK,
    ],
    'col' => [
        'size' => '6',
        'transparent' => cnf_opts::YES,
        'bgcolor' => '',
        'bgimage' => '',
        'bgstyle' => cnf_opts::BG_STYLE_CENTER,
        'txtstyle' => cnf_opts::TXT_STYLE_DEFAULT,
        'margin' => cnf_opts::YES,
    ],
    'obj' => [
        'config' => [
            'margin_left' => [
                'type' => 'number',
                'caption' => 'Margin Left',
                'default' => '0',
                'tab' => 'Spacing'
            ],
            'margin_right' => [
                'type' => 'number',
                'caption' => 'Margin Right',
                'default' => '0',
                'tab' => 'Spacing'
            ],
            'margin_top' => [
                'type' => 'number',
                'caption' => 'Margin Top',
                'default' => '0',
                'tab' => 'Spacing'
            ],
            'margin_bottom' => [
                'type' => 'number',
                'caption' => 'Margin Bottom',
                'default' => '0',
                'tab' => 'Spacing'
            ],
            'margin_unit' => [
                'type' => 'options',
                'options' => [
                    'px' => 'Pixels',
                    'vh' => 'Percent'
                ],
                'caption' => "Margin unit",
                'tab' => 'Spacing'
            ],
            'padding_left' => [
                'type' => 'number',
                'caption' => 'Padding Left (px)',
                'default' => '0',
                'tab' => 'Spacing'
            ],
            'padding_right' => [
                'type' => 'number',
                'caption' => 'Padding Right (px)',
                'default' => '0',
                'tab' => 'Spacing'
            ],
            'padding_top' => [
                'type' => 'number',
                'caption' => 'Padding Top (px)',
                'default' => '0',
                'tab' => 'Spacing'
            ],
            'padding_bottom' => [
                'type' => 'number',
                'caption' => 'Padding Bottom (px)',
                'default' => '0',
                'tab' => 'Spacing'
            ],
            'padding_unit' => [
                'type' => 'options',
                'options' => [
                    'px' => 'Pixels',
                    'vh' => 'Percent'
                ],
                'caption' => "Padding unit",
                'tab' => 'Spacing'
            ],
            'aos_animation' => [
                'type' => 'options',
                'caption' => 'Animation on show',
                'options' => [
                    'none' => "No animation",
                    'fade-up' => "Fade up",
                    'fade-down' => "Fade down",
                    'fade-right' => "Fade right",
                    'fade-left' => "Fade left",
                    'fade-up-left' => "Fade up left",
                    'fade-up-right' => "Fade up right",
                    'fade-down-left' => "Fade down left",
                    'fade-down-right' => "Fade down right",
                    'flip-up' => "Flip up",
                    'flip-down' => "Flip down",
                    'flip-left' => "Flip left",
                    'flip-right' => "Flip right",
                    'zoom-in' => "Zoom in",
                    'zoom-in-left' => "Zoom in left",
                    'zoom-in-right' => "Zoom in right",
                    'zoom-in-up' => "Zoom in up",
                    'zoom-in-down' => "Zoom in down",
                    'zoom-out' => "Zoom out",
                    'zoom-out-left' => "Zoom out left",
                    'zoom-out-right' => "Zoom out right",
                    'zoom-out-up' => "Zoom out up",
                    'zoom-out-down' => "Zoom out down",
                ],
                'default' => 'none',
                'tab' => 'Animation'
            ],
            'aos_duration' => [
                'type' => 'number',
                'caption' => 'Duration',
                'default' => '500',
                'tab' => 'Animation'
            ],
            'aos_delay' => [
                'type' => 'number',
                'caption' => 'Delay',
                'default' => '0',
                'tab' => 'Animation'
            ],
        ]
    ],
];
$optionsCnf = [
    'sec' => [
        'width' => [
            cnf_opts::COL_WIDTH_LL => __('Full width', 'wtst'),
            cnf_opts::COL_WIDTH_LW => __('Tiny width with full width background', 'wtst'),
            cnf_opts::COL_WIDTH_WW => __('Tiny width', 'wtst'),
        ],
        'height' => [
            cnf_opts::HEIGHT_AUTO => __('Auto', 'wtst'),
            cnf_opts::HEIGHT_FULL => __('100%', 'wtst'),
            cnf_opts::HEIGHT_75 =>   __('75%', 'wtst'),
            cnf_opts::HEIGHT_50 =>   __('50%', 'wtst'),
            cnf_opts::HEIGHT_25 =>   __('25%', 'wtst'),
        ],
        'scrollify' => [
            cnf_opts::YES => __("Yes", 'wtst'),
            cnf_opts::NO =>  __("No", 'wtst'),
        ],
        'transparent' => [
            cnf_opts::YES => __("Yes", 'wtst'),
            cnf_opts::NO =>  __("No", 'wtst'),
        ],
        'bgstyle' => [
            cnf_opts::BG_STYLE_CENTER =>     __('Centered', 'wtst'),
            cnf_opts::BG_STYLE_TOP_LEFT =>   __('Top left', 'wtst'),
            cnf_opts::BG_STYLE_COVER =>      __('Cover', 'wtst'),
            cnf_opts::BG_STYLE_REPEAT =>     __('Repeat', 'wtst'),
            cnf_opts::BG_STYLE_BOTTOM =>     __('Bottom', 'wtst'),
            cnf_opts::BG_STYLE_PARALLAX =>   __('Parallax', 'wtst'),
        ],
        'txtstyle' => [
            cnf_opts::TXT_STYLE_LIGHT =>   __('Light', 'wtst'),
            cnf_opts::TXT_STYLE_DARK =>    __('Dark', 'wtst'),
        ],
        'txtstyle' => [
            cnf_opts::TXT_STYLE_DEFAULT=>  __('Default', 'wtst'),
            cnf_opts::TXT_STYLE_LIGHT =>   __('Light', 'wtst'),
            cnf_opts::TXT_STYLE_DARK =>    __('Dark', 'wtst'),
        ],
    ],
    'col' => [
        'size' => [
            '1' => '1/12',
            '2' => '2/12',
            '3' => '3/12',
            '4' => '4/12',
            '5' => '5/12',
            '6' => '6/12',
            '7' => '7/12',
            '8' => '8/12',
            '9' => '9/12',
            '10' => '10/12',
            '11' => '11/12',
            '12' => '12/12',
        ],
        'transparent' => [
            cnf_opts::YES => __("Yes", 'wtst'),
            cnf_opts::NO => __("No", 'wtst'),
        ],
        'margin' => [
            cnf_opts::YES => __("Yes", 'wtst'),
            cnf_opts::NO =>  __("No", 'wtst'),
        ],
        'bgstyle' => [
            cnf_opts::BG_STYLE_CENTER =>   __('Centered', 'wtst'),
            cnf_opts::BG_STYLE_TOP_LEFT => __('Top left', 'wtst'),
            cnf_opts::BG_STYLE_COVER =>    __('Cover', 'wtst'),
            cnf_opts::BG_STYLE_REPEAT =>   __('Repeat', 'wtst'),
            cnf_opts::BG_STYLE_BOTTOM =>   __('Bottom', 'wtst'),
        ],
        'txtstyle' => [
            cnf_opts::TXT_STYLE_DEFAULT=>  __('Default', 'wtst'),
            cnf_opts::TXT_STYLE_LIGHT =>   __('Light', 'wtst'),
            cnf_opts::TXT_STYLE_DARK =>    __('Dark', 'wtst'),
        ],
    ]
];

class cnf_opts {
    const COL_WIDTH_LL = 2;
    const COL_WIDTH_LW = 1;
    const COL_WIDTH_WW = 0;
    
    const YES = 1;
    const NO  = 0;
    
    const BG_STYLE_CENTER   = 0;
    const BG_STYLE_TOP_LEFT = 1;
    const BG_STYLE_COVER    = 2;
    const BG_STYLE_REPEAT   = 3;
    const BG_STYLE_BOTTOM   = 4;
    const BG_STYLE_PARALLAX = 5;
    
    const TXT_STYLE_DEFAULT = 0;
    const TXT_STYLE_LIGHT = 1;
    const TXT_STYLE_DARK = 2;
    
    const HEIGHT_AUTO = 0;
    const HEIGHT_FULL = 1;
    const HEIGHT_75 = 2;
    const HEIGHT_50 = 3;
    const HEIGHT_25 = 4;
}
