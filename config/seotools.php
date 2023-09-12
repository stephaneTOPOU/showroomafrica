<?php
/**
 * @see https://github.com/artesaos/seotools
 */

return [
    'meta' => [
        /*
         * The default configurations to be used by the meta generator.
         */
        'defaults'       => [
            'title'        => "Annuaire Showroom Africa", // set false to total remove
            'titleBefore'  => "Showroom Africa", // Put defaults.title before page title, like 'It's Over 9000! - Dashboard'
            'description'  => "Bienvenue sur le site officiel de Showroom Africa, votre annuaire qui répertorie toutes les entreprises africaines....", // set false to total remove
            'separator'    => ' - ',
            'keywords'     => ["annuaire", "showroomafrica", "showroom africa", "annuaire showroom africa", "showroom","Togo","afrique", "entreprises", "professionnels","répertoire des professionnels","service", "devis", "offre", "emploi",],
            'canonical'    => "https://showroomafrica.com", // Set to null or 'full' to use Url::full(), set to 'current' to use Url::current(), set false to total remove
            'robots'       => "https://showroomafrica.com/robots.txt", // Set to 'all', 'none' or any combination of index/noindex and follow/nofollow
        ],
        /*
         * Webmaster tags are always added.
         */
        'webmaster_tags' => [
            'google'    => null,
            'bing'      => null,
            'alexa'     => null,
            'pinterest' => null,
            'yandex'    => null,
            'norton'    => null,
        ],

        'add_notranslate_class' => false,
    ],
    'opengraph' => [
        /*
         * The default configurations to be used by the opengraph generator.
         */
        'defaults' => [
            'title'       => "Annuaire Showroom Africa", // set false to total remove
            'description' => "Annuaire des entreprises et des professionnels en réseau pour une émergence économique du Togo et de l’Afrique. Guide pour l’investissement, l’annuaire showroom africa est une liste des sociétés répertoriées par secteurs d’activités. Pour faciliter les recherches, showroom africa positionne votre entreprise dans votre secteur et votre activité se retrouve booster .", // set false to total remove
            'url'         => "https://showroomafrica.com", // Set null for using Url::current(), set false to total remove
            'type'        => "website",
            'site_name'   => "Annuaire Showroom Africa",
            'images'      => ["https://showroomafrica.com/assets/images/showroom/logo.png"],
        ],
    ],
    'twitter' => [
        /*
         * The default values to be used by the twitter cards generator.
         */
        'defaults' => [
            'card'        => 'summary',
            'site'        => '@showroomafrica',
        ],
    ],
    'json-ld' => [
        /*
         * The default configurations to be used by the json-ld generator.
         */
        'defaults' => [
            'title'       => 'Annuaire Showroom Africa', // set false to total remove
            'description' => "Annuaire des entreprises et des professionnels en réseau pour une émergence économique du Togo et de l’Afrique. Guide pour l’investissement, l’annuaire showroom africa est une liste des sociétés répertoriées par secteurs d’activités. Pour faciliter les recherches, showroom africa positionne votre entreprise dans votre secteur et votre activité se retrouve booster .", // set false to total remove
            'url'         => 'https://showroomafrica.com', // Set to null or 'full' to use Url::full(), set to 'current' to use Url::current(), set false to total remove
            'type'        => 'WebPage',
            'images'      => ['https://showroomafrica.com/assets/images/showroom/logo.png'],
        ],
    ],
];
