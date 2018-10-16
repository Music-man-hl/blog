<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App{
/**
 * App\Tag
 *
 * @property int $id
 * @property string $name
 * @property int $article_num
 * @property int $search_num
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Article[] $articles
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Tag whereArticleNum($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Tag whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Tag whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Tag whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Tag whereSearchNum($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Tag whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class Tag extends \Eloquent {}
}

namespace App{
/**
 * App\User
 *
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @mixin \Eloquent
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $password
 * @property string|null $website
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereWebsite($value)
 * @property string|null $email_verified_at
 * @property string|null $photo
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User wherePhoto($value)
 */
	class User extends \Eloquent {}
}

namespace App{
/**
 * App\Count
 *
 * @property int $id
 * @property string $key
 * @property string|null $name
 * @property string|null $intro
 * @property int $value
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Count whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Count whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Count whereIntro($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Count whereKey($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Count whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Count whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Count whereValue($value)
 * @mixin \Eloquent
 */
	class Count extends \Eloquent {}
}

namespace App{
/**
 * App\Comment
 *
 * @property int $id
 * @property int $article_id
 * @property int $parent_id
 * @property string $content
 * @property string|null $name
 * @property string|null $email
 * @property string|null $website
 * @property string|null $avatar
 * @property string|null $ip
 * @property string|null $city
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property int $user_id
 * @property string|null $target_name
 * @property-read \App\Article $article
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Comment[] $reply
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Comment whereArticleId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Comment whereAvatar($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Comment whereCity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Comment whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Comment whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Comment whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Comment whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Comment whereIp($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Comment whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Comment whereParentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Comment whereTargetName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Comment whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Comment whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Comment whereWebsite($value)
 * @mixin \Eloquent
 * @property string $contents
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Comment whereContents($value)
 */
	class Comment extends \Eloquent {}
}

namespace App{
/**
 * App\Visit
 *
 * @mixin \Eloquent
 * @property int $id
 * @property string $ip
 * @property string|null $path
 * @property string|null $page
 * @property string|null $title
 * @property string|null $city
 * @property int $user_id
 * @property string|null $client
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Visit whereCity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Visit whereClient($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Visit whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Visit whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Visit whereIp($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Visit wherePage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Visit wherePath($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Visit whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Visit whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Visit whereUserId($value)
 */
	class Visit extends \Eloquent {}
}

namespace App{
/**
 * App\Picture
 *
 * @property int $id
 * @property int $user_id
 * @property int $category
 * @property string $title
 * @property string $url
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Picture whereCategory($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Picture whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Picture whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Picture whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Picture whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Picture whereUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Picture whereUserId($value)
 */
	class Picture extends \Eloquent {}
}

namespace App{
/**
 * App\Article
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Comment[] $comments
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Tag[] $tags
 * @mixin \Eloquent
 * @property int $id
 * @property string $title
 * @property string|null $cover
 * @property string|null $content
 * @property int $is_top
 * @property int $is_hidden
 * @property int $view
 * @property int $comment
 * @property \Illuminate\Support\Carbon $created_at
 * @property \Illuminate\Support\Carbon $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Article whereComment($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Article whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Article whereCover($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Article whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Article whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Article whereIsHidden($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Article whereIsTop($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Article whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Article whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Article whereView($value)
 * @property string|null $last_view
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Article isPublic()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Article orderByTop()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Article whereLastView($value)
 */
	class Article extends \Eloquent {}
}

