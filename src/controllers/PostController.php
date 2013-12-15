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
        Yii::app()->user->loginRequiredThenGoBack();
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
        Yii::app()->user->loginRequiredThenGoBack();
        try
        {
            if(!isset($_POST['CreateForm']))
                throw new CHttpException(400, '');
            $form = new PostForm;
            $form->attributes = $_POST['CreateForm'];
            if(!$form->validate())
                throw new SiteException(array('fields' => $form->errors));

            $content = static::contentPurifier()->purify($form->content);
            $post = new Post();
            $post->title = $form->title;
            $post->content = $content;
            $post->creation_timestamp = $post->last_modified_timestamp = $submitTime;
            $post->author_id = Yii::app()->user->id;
            $post->save();

            $this->redirect(array('site/index'));
        }
        catch(SiteException $e)
        {
            $this->_pageMessages = $e->data;
            $this->actionCreateGet();
        }
    }

    public function actionList()
    {
        try
        {
            $page = Utilities::parseInt(Yii::app()->request->getParam('page'));
            $pageSize = Yii::app()->params['pageSize'];

            $criteria = new EMongoCriteria();
            $criteria->sort = array('creation_timestamp' => -1);
            $queryInfo = array(
                'model' => Post::model(),
                'criteria' => $criteria,
            );
            $paginationResult = new MongoPagination($pageSize, $page, $queryInfo);

            $this->render('list', array(
                'result' => $paginationResult,
                'ngApp' => 'tinyBlogApp',
            ));
        }
        catch()
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
