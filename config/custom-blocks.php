<?php

// The 'global' fields we'll use on multiple blocks
$spacesField = [
    'field' => 'spaces',
    'display_name' => 'Add Vertical Space',
    'type' => 'select_dropdown',
    'required' => 0,
    'details' => [
        'options' => [
            'Bottom',
            'Top',
            'Top & Bottom',
            'None',
        ],
    ],
    'placeholder' => 0,
];

$animationsField = [
    'field' => 'animate',
    'display_name' => 'Animate this block (in)?',
    'type' => 'checkbox',
    'placeholder' => 'on',
    'required' => 0,
];
 
$blocks['callout'] = [
    'name' => 'Callout',
    'template' => 'voyager-page-blocks::blocks.callout',
    'fields' => [
        'size' => [
            'field' => 'size',
            'display_name' => 'Size (height) of section',
            'type' => 'select_dropdown',
            'required' => 1,
            'details' => [
                'options' => [
                    'Small',
                    'Medium',
                    'Large',
                    'Extra Large',
                ],
            ],
            'placeholder' => 0,
        ],
        'fade_background' => [
            'field' => 'fade_background',
            'display_name' => 'Fade out background',
            'type' => 'checkbox',
            'required' => 0,
        ],
        'br_1' => [
            'field' => 'br_1',
            'display_name' => 'Line Break',
            'partial' => 'break',
            'type' => 'break',
        ],
        'background_image' => [
            'field' => 'background_image',
            'display_name' => 'Background image',
            'type' => 'image',
            'required' => 1,
        ],
        'br_2' => [
            'field' => 'br_2',
            'display_name' => 'Line Break',
            'partial' => 'break',
            'type' => 'break',
        ],
        'title' => [
            'field' => 'title',
            'display_name' => 'Title',
            'type' => 'text',
            'required' => 0,
            'placeholder' => 'Changing the World!',
        ],
        'content' => [
            'field' => 'content',
            'display_name' => 'Content',
            'type' => 'text',
            'required' => 0,
            'placeholder' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam in dui mauris.',
        ],
        'br_3' => [
            'field' => 'br_3',
            'display_name' => 'Line Break',
            'partial' => 'break',
            'type' => 'break',
        ],
        'button_text' => [
            'field' => 'button_text',
            'display_name' => 'Button Text',
            'type' => 'text',
            'required' => 0,
            'placeholder' => '',
        ],
        'link' => [
            'field' => 'link',
            'display_name' => 'Link',
            'type' => 'text',
            'required' => 0,
            'placeholder' => '',
        ],
        'br_4' => [
            'field' => 'br_4',
            'display_name' => 'Line Break',
            'partial' => 'break',
            'type' => 'break',
        ],
        'spaces' => $spacesField,
        'animate' => $animationsField,
    ],
];