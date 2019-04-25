<?php

use Illuminate\Database\Seeder;

class ServiceCategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('service_categories')->insert([
            [
                'name' => 'Web Programing',
                'content' => 'Outsourcing & web design on demand, not only business requirements but also technical requirements and system...',
                'image' => 'web-outsourcing.jpg',
                'service_id' => 1,
            ],
            [
                'name' => 'Shopping website',
                'content' => 'Generate a shopping website base on existing template with the best price.',
                'image' => 'shopping-website.jpg',
                'service_id' => 1,
            ],
            [
                'name' => 'Portal',
                'content' => 'Design and develop CMS sites, Portals for education, business, medical...',
                'image' => 'cms-site.jpg',
                'service_id' => 1,
            ],
            [
                'name' => 'Real estate',
                'content' => 'Design and develop Websites for finding houses, real estate, house for rent...',
                'image' => 'bds-site.jpg',
                'service_id' => 1,
            ],
            [
                'name' => 'Web maintenance',
                'content' => 'Operating, maintenance, upgrade, repair, create more features... for exesting website.',
                'image' => 'website-maintenance.jpg',
                'service_id' => 1,
            ],
            [
                'name' => 'Website hosting',
                'content' => 'Operating, maintenance, upgrade, repair, create more features... for exesting website.',
                'image' => 'hosting-cloud.jpg',
                'service_id' => 1,
            ],
            [
                'name' => 'Game with cocos2d',
                'content' => 'Design, develop, publish, advertise mobile game in Cocos game engine.',
                'image' => 'game-cocos.jpg',
                'service_id' => 2,
            ],
            [
                'name' => 'Game with Unity',
                'content' => 'Design, develop, publish, advertise mobile game in Unity game engine.',
                'image' => 'game-unity.png',
                'service_id' => 2,
            ],
            [
                'name' => 'Integration with 3rd',
                'content' => 'Integrate game with advertise, social network, IAP... Publish game in IOS, Android, Windows Phone store.',
                'image' => 'game-admod.png',
                'service_id' => 2,
            ],
            [
                'name' => 'Cross Platform Application',
                'content' => 'Building mobile applications running on multiple platforms Xamarin, Ionic, ReactNative, NativeScript ...',
                'image' => 'cross-platform.jpg',
                'service_id' => 3,
            ],
        ]);
    }
}
