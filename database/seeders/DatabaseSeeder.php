<?php

namespace Database\Seeders;

use App\Models\Admin\User;
use App\Models\Admin\Setting;
use App\Models\Admin\Style;
use App\Models\Menu;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name'      => 'Umaedi',
            'username'  => 'umaedi',
            'email'     => 'admin@gmail.com',
            'password'  => bcrypt('12345678'),
            'phone'     => '12345678',
            'address'   => 'Bandar Lampung City',
            'isAdmin'   => 1
        ]);

        Setting::create([
            'idadm'         => 1,
            'googlecode'    => bcrypt('12345678'),
            'judul'         => 'Setting',
            'deskripsi'     => 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Expedita, eveniet!',
            'logo'          => 'bidem.png',
            'alamat'        => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quaerat, similique.',
            'telp'          => '12345678',
            'telp2'          => '12345678',
            'email'         => 'developbidme@gmail.com',
            'metatag'       => 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Perferendis dolor unde vitae,',
            'footer'        => 'Lorem ipsum dolor sit amet.',
            'fb'            => 'bidme.official',
            'twitter'       => 'bidme.official',
            'google'        => bcrypt('12345678'),
            'youtube'       => 'bidmeyoutube',
            'linked'        => 'bidme.official',
            'metadesc'      => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Reprehenderit, dicta!',
            'metakey'       => bcrypt('12345678'),
            'maps'          => bcrypt('12345678')
        ]);

        Style::create([
            'theme'     => 'boxed-layout',
            'style'     => 'blue',
            'font'      => 'Ubuntu',
            'bg'        => 'bg-1.jpg',
            'preloader' => '1.gif',
        ]);

        Menu::create([
            'id_parent'     => 1,
            'nama_menu'     => 'Home',
            'order_menu'    => 1,
            'link'          => 'bidme.com',
        ]);

        Menu::create([
            'id_parent'     => 2,
            'nama_menu'     => 'About',
            'order_menu'    => 2,
            'link'          => 'bidme.com',
        ]);

        Menu::create([
            'id_parent'     => 3,
            'nama_menu'     => 'Contact',
            'order_menu'    => 3,
            'link'          => 'bidme.com',
        ]);
    }
}
