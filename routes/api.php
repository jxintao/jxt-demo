<?php
$api = app('Dingo\Api\Routing\Router');
$api->version('v1', function ($api) {
    $api->group(['namespace' => 'App\Http\Controllers'], function ($api) {

        // 获取用户token
        $api->get('token/{id}', 'AuthController@getToken')->name('auth.token.show');

        $api->group(['middleware' => 'api.auth'], function ($api) {

            // 评论-列表
            $api->get('comments', 'CommentsController@index')->name('comments.index');
            // 评论-创建
            $api->post('comments', 'CommentsController@store')->name('comments.store');
            // 评论-详情
            $api->get('comments/{id}', 'CommentsController@show')->name('comments.show');
            // 评论-修改
            $api->put('comments/{id}', 'CommentsController@update')->name('comments.update');
            // 评论-删除
            $api->delete('comments/{id}', 'CommentsController@destroy')->name('comments.destroy');

            // 评论-收藏
            $api->post('comments/{id}/favorite', 'CommentsController@favor')->name('comments.favor');
            // 评论-取消收藏
            $api->delete('comments/{id}/favorite', 'CommentsController@disfavor')->name('comments.disfavor');
            // 用户收藏的评论
            $api->get('comments/favorites', 'CommentsController@favorites')->name('comments.favorites');

            // 评论-点赞
            $api->post('comments/{id}/praise', 'CommentsController@praise')->name('comments.praise');
            // 评论-取消点赞
            $api->delete('comments/{id}/praise', 'CommentsController@dispraise')->name('comments.dispraise');
            // 用户点赞的评论
            $api->get('comments/praises', 'CommentsController@praises')->name('comments.praises');




        });

    });

});
