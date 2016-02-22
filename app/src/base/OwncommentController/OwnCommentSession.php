<?php

namespace Me\base\OwncommentController;

class OwnCommentSession implements \Anax\DI\IInjectionAware
{
    use \Anax\DI\TInjectable;

    public function addSessionComment($comment)
    {
        $comments = $this->session->get($comment['type'], []);
        $comments[] = $comment;
        $this->session->set($comment['type'], $comments);
    }


    public function getSessionComment($thisComments)
    {
        return $this->session->get($thisComments, []);
    }


    public function deleteSession($thisType)
    {
        $this->session->set($thisType, []);
    }


    public function changeComment($thisComment, $thisType)
    {
        $comments = $this->session->get($thisType, []);

        $comments[$thisComment['savethis']] = [
          'name' => $thisComment['name'],
          'email' => $thisComment['email'],
          'content' => $thisComment['content'],
          'created' => $comments[$thisComment['savethis']]['created'],
          'updated' => $thisComment['updated'],
        ];

        $this->session->set($thisType, $comments);
    }


    public function removeThis($thisComment, $thisType)
    {
        $comments = $this->session->get($thisType, []);
        unset($comments[$thisComment]);
        $this->session->set($thisType, $comments);
    }

}