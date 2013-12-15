<?php

class Post extends EMongoDocument
{
    public $title;
    public $content;
    public $creation_timestamp;
    public $last_modified_timestamp;
    public $author_id;

    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }

    public function collectionName()
    {
        return 'posts';
    }

    public function getAuthor()
    {
        return User::model()->findByPk($this->author_id);
    }
}
