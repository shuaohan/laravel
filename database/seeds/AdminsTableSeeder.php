<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * 创建数据填充:php artisan make:seeder UsersTableSeeder
     * SHOW COLUMNS FROM t_rsdir_app //列出表字段
     * SHOW FULL COLUMNS FROM t_rsdir_app//列出字段及详情
     * SHOW INDEX FROM t_rsdir_app  //列出表索引
     * 运行填充器：
     * 1。composer dump-autoload
     * 2.php artisan db:seed
     * php artisan db:seed --class=UsersTableSeeder

     * @return void
     */
    public function run()
    {
        //
        DB::table('admins')->insert([
            'username'=>str_random(10),
            'email'=>'2943823468@qq.com',
            'password'=>bcrypt('xucaiqin'),
        ]);
    }
}
