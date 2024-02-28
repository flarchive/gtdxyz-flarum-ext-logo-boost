<?php

namespace Gtdxyz\LogoBoost;

use Flarum\Extend;
use Illuminate\Contracts\Filesystem\Factory;
use Flarum\Foundation\Paths;
use Flarum\Http\UrlGenerator;
use Flarum\User\User;
use Flarum\Api\Serializer\UserSerializer;
use Flarum\User\Event\Saving as UserSaving;

return [
    (new Extend\Frontend('forum'))
        ->js(__DIR__.'/js/dist/forum.js')
        ->css(__DIR__.'/less/forum.less'),                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                   
                                                                                                                                           
    (new Extend\Frontend('admin'))
        ->js(__DIR__.'/js/dist/admin.js'),

    new Extend\Locales(__DIR__ . '/locale'),

    (new Extend\Filesystem())
        ->disk('flarum-logo-boost',function (Paths $paths, UrlGenerator $url) {
            return [
                'root'   => "$paths->public/assets/logo-boost",
                'url'    => $url->to('forum')->path('assets/logo-boost')
            ];
        }),
    
    (new Extend\Settings())
        ->default('gtdxyz-logo-boost-display_path', '')
        ->default('gtdxyz-logo-boost-switch_path', '')
        ->serializeToForum('gtdxyz-logo-boost-displayUrl', 'gtdxyz-logo-boost-display_path',function($raw){
            
            return $raw?resolve(Factory::class)->disk('flarum-logo-boost')->url($raw):'';
        })
        ->serializeToForum('gtdxyz-logo-boost-switchUrl', 'gtdxyz-logo-boost-switch_path',function($raw){
            
            return $raw?resolve(Factory::class)->disk('flarum-logo-boost')->url($raw):'';
        }),

    (new Extend\Routes('api'))
        ->post('/gtdxyz-logo-boost-display', 'logo-boost-display', Controller\UploadDisplayController::class)
        ->post('/gtdxyz-logo-boost-switch', 'logo-boost-switch', Controller\UploadSwitchController::class)
        ->delete('/gtdxyz-logo-boost-display', 'logo-boost-display.delete', Controller\DeleteDisplayController::class)
        ->delete('/gtdxyz-logo-boost-switch', 'logo-boost-switch.delete', Controller\DeleteSwitchController::class),
];
