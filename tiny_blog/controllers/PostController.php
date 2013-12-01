<?php

class PostController extends CController
{
    public $layout = false;

    private $_pageMessages;



    /**
     * Render the creating post form.
     */
    public function actionCreateGet()
    {
        Yii::app()->user->loginRequired();
        $this->render('create', array(
            'ngApp' => 'tinyBlogApp',
            'messages' => $this->_pageMessages ? $this->_pageMessages : array(),
        ));
    }

    /**
     * Creates a new post.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreatePost()
    {
        $submitTime = time();
        Yii::app()->user->loginRequired();
        try
        {
            if(!isset($_POST['CreateForm']))
                throw new CHttpException(400, '');
            $form = new PostForm;
            $form->attributes = $_POST['CreateForm'];
            if(!$form->validate())
                throw new SiteException(array('fields' => $form->errors));

            $content = static::contentPurifier()->purify($form->content);
            $posts = Yii::app()->mongoDatabase->posts;
            $posts->insert(array(
                'title' => $form->title,
                'content' => $content,
                'create_time' => $submitTime,
                'update_time' => $submitTime,
                'author_id' => Yii::app()->user->id,
            ));
            $this->redirect(array('site/index'));
        }
        catch(SiteException $e)
        {
            $this->_pageMessages = $e->data;
            $this->actionCreateGet();
        }
    }



    protected static function contentPurifier()
    {
        $p = new CHtmlPurifier();
        $p->options = array(
            'HTML.Allowed' =>
                'a[title | href] ,b, blockquote, code, del, dd, dl, dt, em, ' .
                'h1, h2, h3, i, img[title | alt | src | width | height], ' .
                'kbd, li, ol, p, pre, sup, sub, strong, ul, br, hr, div, span',
            'URI.AllowedSchemes' =>
                array('http' => true, 'https' => true),
        );
        return $p;
    }
}
