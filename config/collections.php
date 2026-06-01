<?php

/**
 * Content shape for Anyo at Disenyo — Architectural Services.
 *
 * The public brochure pages (Home / Work / Services / About / Contact) are
 * rendered from hand-authored Twig templates. To give each a stable public
 * URL without seeding database entries, the four inner pages are modelled as
 * collections that expose a `list_template`: PebbleStack registers the list
 * path (e.g. /work, /services) and renders that template even with zero
 * entries. The `projects` collection additionally carries typed fields so the
 * firm can add real portfolio entries from the admin later; the Work template
 * renders those entries when present and falls back to a curated showcase.
 *
 * Field types: text, textarea, markdown, slug, boolean, number, select,
 * datetime, url.
 */

return [

    'pages' => [
        'label'          => 'Pages',
        'label_singular' => 'Page',
        'icon'           => 'file',
        'route'          => '/{slug}',
        'template'       => 'page.twig',
        'order_by'       => 'updated_at DESC',
        'fields' => [
            'title'            => ['type' => 'text', 'required' => true, 'label' => 'Title'],
            'slug'             => ['type' => 'slug', 'required' => true, 'label' => 'Slug', 'help' => 'URL path, lowercase letters, numbers, dashes.'],
            'body'             => ['type' => 'markdown', 'label' => 'Body', 'help' => 'Markdown supported.'],
            'meta_description' => ['type' => 'textarea', 'label' => 'Meta description', 'help' => 'Used in <meta name="description">. ~160 chars.'],
        ],
    ],

    // Portfolio. Powers the Work page (/work) and the Home featured strip.
    'projects' => [
        'label'          => 'Projects',
        'label_singular' => 'Project',
        'icon'           => 'image',
        'route'          => '/work/{slug}',
        'template'       => 'project.twig',
        'list_template'  => 'work.twig',
        'order_by'       => 'updated_at DESC',
        'list_limit'     => 100,
        'fields' => [
            'title'       => ['type' => 'text', 'required' => true, 'label' => 'Project name'],
            'slug'        => ['type' => 'slug', 'required' => true, 'label' => 'Slug'],
            'location'    => ['type' => 'text', 'label' => 'Location', 'help' => 'e.g. Batangas City'],
            'year'        => ['type' => 'number', 'label' => 'Year'],
            'category'    => ['type' => 'select', 'label' => 'Category', 'options' => ['Residential', 'Commercial', 'Renovation', 'Planning']],
            'cover_image' => ['type' => 'url', 'label' => 'Cover image', 'help' => 'URL from /admin/media'],
            'description' => ['type' => 'textarea', 'label' => 'Description'],
            'featured'    => ['type' => 'boolean', 'label' => 'Show on home page'],
        ],
    ],

    // Static brochure pages, routed via their list_template (no entry needed).
    'services' => [
        'label'          => 'Services Page',
        'label_singular' => 'Services Page',
        'icon'           => 'layers',
        'route'          => '/services/{slug}',
        'template'       => 'page.twig',
        'list_template'  => 'services.twig',
        'order_by'       => 'updated_at DESC',
        'fields' => [
            'title' => ['type' => 'text', 'required' => true, 'label' => 'Title'],
            'slug'  => ['type' => 'slug', 'required' => true, 'label' => 'Slug'],
            'body'  => ['type' => 'markdown', 'label' => 'Body'],
        ],
    ],

    'about' => [
        'label'          => 'About Page',
        'label_singular' => 'About Page',
        'icon'           => 'info',
        'route'          => '/about/{slug}',
        'template'       => 'page.twig',
        'list_template'  => 'about.twig',
        'order_by'       => 'updated_at DESC',
        'fields' => [
            'title' => ['type' => 'text', 'required' => true, 'label' => 'Title'],
            'slug'  => ['type' => 'slug', 'required' => true, 'label' => 'Slug'],
            'body'  => ['type' => 'markdown', 'label' => 'Body'],
        ],
    ],

    'contactpage' => [
        'label'          => 'Contact Page',
        'label_singular' => 'Contact Page',
        'icon'           => 'mail',
        'route'          => '/contact/{slug}',
        'template'       => 'page.twig',
        'list_template'  => 'contact.twig',
        'order_by'       => 'updated_at DESC',
        'fields' => [
            'title' => ['type' => 'text', 'required' => true, 'label' => 'Title'],
            'slug'  => ['type' => 'slug', 'required' => true, 'label' => 'Slug'],
            'body'  => ['type' => 'markdown', 'label' => 'Body'],
        ],
    ],

    // Public submission endpoint at POST /forms/contact (kept for the admin
    // inbox). The public Contact page primarily posts to Formspree per the
    // brief, with this as a self-hosted fallback if the user wires it up.
    'contact' => [
        'label'          => 'Contact',
        'label_singular' => 'Submission',
        'is_form'        => true,
        'fields' => [
            'name'         => ['type' => 'text', 'required' => true, 'label' => 'Name'],
            'contact'      => ['type' => 'text', 'required' => true, 'label' => 'Contact number'],
            'location'     => ['type' => 'text', 'label' => 'Location'],
            'project_type' => ['type' => 'select', 'label' => 'Project type', 'options' => ['New home', 'Renovation', 'Commercial', 'Planning / permits', 'Not sure yet']],
            'message'      => ['type' => 'textarea', 'required' => true, 'label' => 'Message'],
        ],
    ],

];
