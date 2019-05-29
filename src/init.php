<?php

if (!defined('ABSPATH')) {
    exit;
}

function publication_block_assets() {
    wp_enqueue_style(
        'publication_block-cgb-style-css',
        plugins_url('dist/blocks.style.build.css', __DIR__),
        ['wp-editor'],
        filemtime( plugin_dir_path( __DIR__ ) . 'dist/blocks.style.build.css' )
    );
    // click handler
    wp_enqueue_script(
        'publication_block-js',
        plugins_url('/src/block/main.js', __DIR__),
        [],
        filemtime(plugin_dir_path(__DIR__) . 'src/block/main.js')
    );
}

add_action('enqueue_block_assets', 'publication_block_assets');

function publication_block_editor_assets() {
    wp_enqueue_script(
        'publication_block-js',
        plugins_url('/dist/blocks.build.js', __DIR__),
        ['wp-blocks', 'wp-i18n', 'wp-element', 'wp-editor'],
      filemtime( plugin_dir_path( __DIR__ ) . 'dist/blocks.build.js' )
    );

    wp_enqueue_style(
        'publication_block-editor-css', // Handle.
        plugins_url('dist/blocks.editor.build.css', __DIR__),
        ['wp-edit-blocks'],
      filemtime( plugin_dir_path( __DIR__ ) . 'dist/blocks.editor.build.css' )
    );
}

add_action('enqueue_block_editor_assets', 'publication_block_editor_assets');

register_block_type('klarity/klarity-publication-block', [
    'render_callback' => 'render_publication',
    'attributes' => [
        'category' => [
            'type' => 'string',
            'default' => '',
        ],
        'title' => [
            'type' => 'string',
            'default' => '',
        ],
        'description' => [
            'type' => 'string',
            'default' => '',
        ],
        'button_left_text' => [
            'type' => 'string',
            'default' => 'Download',
        ],
        'button_left_text_color' => [
            'type' => 'string',
            'default' => '#ffffff',
        ],
        'button_left_url' => [
            'type' => 'string',
            'default' => '',
        ],
        'button_left_background_color' => [
            'type' => 'string',
            'default' => '#808080',
        ],
        'button_right_text' => [
            'type' => 'string',
            'default' => 'Share',
        ],
        'button_right_text_color' => [
            'type' => 'string',
            'default' => '#ffffff',
        ],
        'button_right_url' => [
            'type' => 'string',
            'default' => '',
        ],
        'button_right_background_color' => [
            'type' => 'string',
            'default' => '#808080',
        ],
    ]
]);

function render_publication( $attributes ) {
    $category = $attributes['category'] ?? '';
    $title = $attributes['title'] ?? '';
    $description = $attributes['description'] ?? '';
    $button_left_text = $attributes['button_left_text'] ?? '';
    $button_left_text_color = $attributes['button_left_text_color'] ?? '';
    $button_left_url = $attributes['button_left_url'] ?? '';
    $button_left_background_color = $attributes['button_left_background_color'] ?? '';
    $button_right_text = $attributes['button_right_text'] ?? '';
    $button_right_text_color = $attributes['button_right_text_color'] ?? '';
    $button_right_url = $attributes['button_right_url'] ?? '';
    $button_right_background_color = $attributes['button_right_background_color'] ?? '';
	return "
        <div class='publication-card'>
            <div class='publication-inner'>
                <p class='publication-category'>$category</p>
                <h3 class='publication-title'>$title</h3>
                <p class='publication-description'>$description</p>
                <div class='publication-buttons'>
                    <div class='col-button'>
                        <a href='$button_left_url' target='_blank' style='color: $button_left_text_color!important; background-color: $button_left_background_color!important;' class='button'>$button_left_text</a>
                    </div>
                    <div class='col-button'>
                        <a href='$button_right_url' target='_blank' style='color: $button_right_text_color!important; background-color: $button_right_background_color!important;' class='button publication-share'>$button_right_text</a>
                        <div class='a2a_kit a2a_kit_size_32 addtoany_list container-publication-share'>
                            <a class='a2a_button_facebook' href='https://www.facebook.com/sharer.php?u=$button_right_url/&t=$title' title='Facebook' rel='nofollow noopener' target='_blank'>
                                <span class='a2a_svg a2a_s__default a2a_s_facebook' style='background-color: rgb(59, 89, 152);'>
                                    <svg focusable='false' xmlns='http://www.w3.org/2000/svg' viewBox='0 0 32 32'>
                                        <path fill='#FFF' d='M17.78 27.5V17.008h3.522l.527-4.09h-4.05v-2.61c0-1.182.33-1.99 2.023-1.99h2.166V4.66c-.375-.05-1.66-.16-3.155-.16-3.123 0-5.26 1.905-5.26 5.405v3.016h-3.53v4.09h3.53V27.5h4.223z'></path>
                                    </svg>
                                </span>
                                <span class='a2a_label'>Facebook</span>
                            </a>
                            <a class='a2a_button_twitter' href='https://twitter.com/intent/tweet?text=$title&url=$button_right_url' title='Twitter' rel='nofollow noopener' target='_blank'>
                                <span class='a2a_svg a2a_s__default a2a_s_twitter' style='background-color: rgb(85, 172, 238);'>
                                    <svg focusable='false' xmlns='http://www.w3.org/2000/svg' viewBox='0 0 32 32'>
                                        <path fill='#FFF' d='M28 8.557a9.913 9.913 0 0 1-2.828.775 4.93 4.93 0 0 0 2.166-2.725 9.738 9.738 0 0 1-3.13 1.194 4.92 4.92 0 0 0-3.593-1.55 4.924 4.924 0 0 0-4.794 6.049c-4.09-.21-7.72-2.17-10.15-5.15a4.942 4.942 0 0 0-.665 2.477c0 1.71.87 3.214 2.19 4.1a4.968 4.968 0 0 1-2.23-.616v.06c0 2.39 1.7 4.38 3.952 4.83-.414.115-.85.174-1.297.174-.318 0-.626-.03-.928-.086a4.935 4.935 0 0 0 4.6 3.42 9.893 9.893 0 0 1-6.114 2.107c-.398 0-.79-.023-1.175-.068a13.953 13.953 0 0 0 7.55 2.213c9.056 0 14.01-7.507 14.01-14.013 0-.213-.005-.426-.015-.637.96-.695 1.795-1.56 2.455-2.55z'></path>
                                    </svg>
                                </span>
                                <span class='a2a_label'>Twitter</span>
                            </a>
                            <a class='a2a_button_whatsapp' href='https://wa.me/?text=$title - $button_right_url' title='WhatsApp' rel='nofollow noopener' target='_blank'>
                                <span class='a2a_svg a2a_s__default a2a_s_whatsapp' style='background-color: rgb(18, 175, 10);'>
                                    <svg focusable='false' xmlns='http://www.w3.org/2000/svg' viewBox='0 0 32 32'>
                                        <path fill-rule='evenodd' clip-rule='evenodd' fill='#FFF' d='M16.21 4.41C9.973 4.41 4.917 9.465 4.917 15.7c0 2.134.592 4.13 1.62 5.832L4.5 27.59l6.25-2.002a11.241 11.241 0 0 0 5.46 1.404c6.234 0 11.29-5.055 11.29-11.29 0-6.237-5.056-11.292-11.29-11.292zm0 20.69c-1.91 0-3.69-.57-5.173-1.553l-3.61 1.156 1.173-3.49a9.345 9.345 0 0 1-1.79-5.512c0-5.18 4.217-9.4 9.4-9.4 5.183 0 9.397 4.22 9.397 9.4 0 5.188-4.214 9.4-9.398 9.4zm5.293-6.832c-.284-.155-1.673-.906-1.934-1.012-.265-.106-.455-.16-.658.12s-.78.91-.954 1.096c-.176.186-.345.203-.628.048-.282-.154-1.2-.494-2.264-1.517-.83-.795-1.373-1.76-1.53-2.055-.158-.295 0-.445.15-.584.134-.124.3-.326.45-.488.15-.163.203-.28.306-.47.104-.19.06-.36-.005-.506-.066-.147-.59-1.587-.81-2.173-.218-.586-.46-.498-.63-.505-.168-.007-.358-.038-.55-.045-.19-.007-.51.054-.78.332-.277.274-1.05.943-1.1 2.362-.055 1.418.926 2.826 1.064 3.023.137.2 1.874 3.272 4.76 4.537 2.888 1.264 2.9.878 3.43.85.53-.027 1.734-.633 2-1.297.266-.664.287-1.24.22-1.363-.07-.123-.26-.203-.54-.357z'></path>
                                    </svg>
                                </span>
                                <span class='a2a_label'>WhatsApp</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>";
}
