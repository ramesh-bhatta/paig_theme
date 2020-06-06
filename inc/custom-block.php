<?php
function slug_post_type_template()
{
    $page_type_object = get_post_type_object('page');

    $page_type_object->template = [
        array('core/heading', array(
//            'align' => 'left',
            'placeholder' => 'What We Do',
        )),
        array('core/paragraph'),
        array('paig/heading', array(
//            'align' => 'left',
            'placeholder' => 'What We Offer',
            'value'=>'What We Offer'
        )),
        array('core/columns', array(), array(
            array('core/column', array(), array(
                array('core/image', array()),
                array('core/paragraph', array(
                    'placeholder' => 'Add a inner paragraph'
                )),
            )),
            array('core/column', array(), array(
                array('core/image', array()),
                array('core/paragraph', array(
                    'placeholder' => 'Add a inner paragraph'
                )),
            )),
        )),
        array('core/heading', array(
//            'align' => 'left',
            'placeholder' => 'Why We Choose'
        )),
        array('core/image', array(//            'align' => 'left',
        )),
        array('core/paragraph')
    ];
    $page_type_object->template_lock = 'all';
}

add_action('init', 'slug_post_type_template');

/**
 * Enqueue block editor JavaScript and CSS
 */
function jsforwpblocks_editor_scripts()
{

    // Make paths variables so we don't write em twice ;)
    $blockPath = '/inc/gutenberg/blocks.js';
//    $editorStylePath = '/assets/css/blocks.editor.css';

    // Enqueue the bundled block JS file
    wp_enqueue_script(
        'jsforwp-blocks-js',
        get_stylesheet_directory_uri().$blockPath,
        ['wp-blocks', 'wp-element', 'wp-components', 'wp-i18n'],
        filemtime(get_stylesheet_directory() . $blockPath)
    );

//    // Enqueue optional editor only styles
//    wp_enqueue_style(
//        'jsforwp-blocks-editor-css',
//        plugins_url($editorStylePath, __FILE__),
//        ['wp-blocks', 'wp-element', 'wp-components', 'wp-i18n'],
//        filemtime(plugin_dir_path(__FILE__) . $editorStylePath)
//    );

}

// Hook scripts function into block editor hook
add_action('enqueue_block_editor_assets', 'jsforwpblocks_editor_scripts');