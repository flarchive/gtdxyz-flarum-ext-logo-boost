<?php

namespace Gtdxyz\LogoBoost\Controller;

use Flarum\Settings\SettingsRepositoryInterface;
use Illuminate\Contracts\Filesystem\Factory;
use Intervention\Image\Image;
use Intervention\Image\ImageManager;
use Psr\Http\Message\UploadedFileInterface;
use Flarum\Api\Controller\UploadImageController;

class UploadSwitchController extends UploadImageController
{
    protected $filePathSettingKey = 'gtdxyz-logo-boost-switch_path';

    protected $filenamePrefix = 'gtdxyz-logo-boost-switch';

    /**
     * @var ImageManager
     */
    protected $imageManager;

    public function __construct(SettingsRepositoryInterface $settings, Factory $filesystemFactory, ImageManager $imageManager)
    {
        parent::__construct($settings, $filesystemFactory);

        $this->uploadDir = $filesystemFactory->disk('flarum-logo-boost');
        $this->imageManager = $imageManager;
    }

    /**
     * {@inheritdoc}
     */
    protected function makeImage(UploadedFileInterface $file): Image
    {
        $encodedImage = $this->imageManager->make($file->getStream()->getMetadata('uri'))->heighten(60, function ($constraint) {
            $constraint->upsize();
        })->encode('png');

        return $encodedImage;
    }
}
