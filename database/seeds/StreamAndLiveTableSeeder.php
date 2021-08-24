<?php

use Illuminate\Database\Seeder;

class StreamAndLiveTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //直播流数据
        DB::table('stream') -> insert([
            'stream_name'		=>		'sh09',
            'status'			=>		'2',//永久禁播
        ]);
        DB::table('stream') -> insert([
            'stream_name'		=>		'test',
            'status'			=>		'3',//限时禁播
            'permited_at'		=>		strtotime('2022-08-18 10:52')
        ]);
        DB::table('stream') -> insert([
            'stream_name'		=>		'sh09/sh09',
            'status'			=>		'1',//正常
        ]);
        //直播课程表数据
        DB::table('live') -> insert([
            'live_name'		=>		'北京PHP58期基础班直播课程',
            'profession_id'	=>		'1',
            'stream_id'		=>		3,
            'cover_img'		=>		'/statics/cover.jpg',
            'description'	=>		'该课程是主要为了php58期基础班课程直播，以供远程同学听课',
            'begin_at'		=>		strtotime(date('2021-8-23 00:00:00')),
            'end_at'		=>		strtotime(date('2021-8-25 18:00:00')),
        ]);
        
        DB::table('live') -> insert([
            'live_name'		=>		'北京PHP58期就业班直播课程',
            'profession_id'	=>		'2',
            'stream_id'		=>		3,
            'cover_img'		=>		'/statics/cover.jpg',
            'description'	=>		'该课程是主要为了php58期就业班课程直播，以供远程同学听课',
            'begin_at'		=>		strtotime(date('2021-8-23 00:00:00')),
            'end_at'		=>		strtotime(date('2021-8-25 18:00:00')),
        ]);
    }
}
