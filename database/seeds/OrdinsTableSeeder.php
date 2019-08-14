<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class OrdinsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * SHOW COLUMNS FROM t_rsdir_app //列出表字段
     * SHOW FULL COLUMNS FROM t_rsdir_app//列出字段及详情
     * SHOW INDEX FROM t_rsdir_app  //列出表索引
     *
     * 一。创建新的数据迁移
     * php artisan make:migration create_users_table
     * --table 和 --create 选项可以用于指定表名以及该迁移是否要创建一个新的数据表
     * php artisan make:migration create_users_table --create=users
     * php artisan make:migration add_votes_to_users_table --table=users
     * 二。运行迁移：
     * php artisan migrate(若使用Homestead虚拟机，则在虚拟机中运行)
     * 三。创建数据填充:
     * php artisan make:seeder UsersTableSeeder
     * 四。运行填充器：
     * 1。composer dump-autoload
     * 2.php artisan db:seed
     * php artisan db:seed --class=UsersTableSeeder(若使用Homestead虚拟机，则在虚拟机中运行)
     * @return void
     */
    public function run()
    {
        //
        DB::table('ordins')->insert([
            'username'=>str_random(10),
            'email'=>'2943823468@qq.com',
            'password'=>bcrypt('xucaiqin'),

        ]);

    }
}
