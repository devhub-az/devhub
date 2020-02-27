<?php

use Illuminate\Database\Migrations\Migration;

class CreatePostsView extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement('CREATE VIEW post_records as select `posts`.`id` AS `id`,`posts`.`body` AS `body`,`posts`.`name` AS `name`,`posts`.`author_id` AS `author_id`,(sum((`post_votes`.`status` = 1)) - sum((`post_votes`.`status` = 0))) AS `rating`,sum((`post_votes`.`status` = 1)) AS `upvotes`,sum((`post_votes`.`status` = 0)) AS `downvotes`,count(`post_votes`.`id`) AS `votes`,count(`favorites`.`id`) AS `favorites`,count((`comments`.`post_id` = `posts`.`id`)) AS `comments_count`,`posts`.`created_at` AS `created_at` from (((`posts` join `post_votes` on((`posts`.`id` = `post_votes`.`post_id`))) left join `comments` on((`posts`.`id` = `comments`.`post_id`))) left join `favorites` on((`posts`.`id` = `favorites`.`following_id`))) group by `posts`.`id` order by `rating` desc');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement( 'DROP VIEW post_records' );
    }
}
