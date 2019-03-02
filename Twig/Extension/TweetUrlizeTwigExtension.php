<?php

namespace Knp\Bundle\LastTweetsBundle\Twig\Extension;

use Knp\Bundle\LastTweetsBundle\Helper\TweetUrlizeHelper;

class TweetUrlizeTwigExtension extends \Twig_Extension
{
    private $helper;

    public function __construct(TweetUrlizeHelper $helper)
    {
        $this->helper = $helper;
    }

    public function getFilters()
    {
        return [
            new \Twig_Filter(
                'knp_tweet_urlize',
                [$this, 'filterTweet'],
                [
                    'pre_escape' => 'html',
                    'is_safe' => ['html']
                ]
            ),
        ];
    }

    public function filterTweet($text)
    {
        return TweetUrlizeHelper::urlize($text);
    }

    public function getName()
    {
        return 'knp_tweet_urlize';
    }
}
