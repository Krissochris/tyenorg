<?php

return [
    'modules' => [
        /**
         * Example:
         * VendorA\ModuleX\Providers\ModuleServiceProvider::class,
         * VendorB\ModuleY\Providers\ModuleServiceProvider::class
         *
         */

        \GriffonTech\User\Providers\ModuleServiceProvider::class,
        \GriffonTech\Course\Providers\ModuleServiceProvider::class,
        \GriffonTech\Core\Providers\ModuleServiceProvider::class,
        \GriffonTech\Tutor\Providers\ModuleServiceProvider::class,
        \GriffonTech\Admin\Providers\ModuleServiceProvider::class,
        \GriffonTech\Blog\Providers\ModuleServiceProvider::class,
        \GriffonTech\Testimony\Providers\ModuleServiceProvider::class,
        \GriffonTech\Faq\Providers\ModuleServiceProvider::class,
    ]
];