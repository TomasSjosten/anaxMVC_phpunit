<?php

namespace Me\base\PresentationController;


class PresentationController
{
    use \Anax\DI\TInjectable;

    public function showThisAction($thisPresentation)
    {
        $this->theme->setVariable('title', $thisPresentation);

        $content = $this->fileContent->get('presentation/'.$thisPresentation.'.md');
        $content = $this->textFilter->doFilter($content, 'shortcode, markdown, nl2br');

        $byline = $this->fileContent->get('byline.md');
        $byline = $this->textFilter->doFilter($byline, 'shortcode, markdown');

        $this->views->add('me/page',
          [
            'content' => $content,
            'byline' => $byline,
          ]
        );
    }
}
