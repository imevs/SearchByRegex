<?php

class Parser {

    protected $patterns = array(
        'url' => '/^(https?:\/\/)([\da-z\.-]+).*/',
        'links' => "/<a(?:[^>]*)href=\"(https?[^\"]*)\"(?:[^>]*)>(?:[^<]*)<\/a>/is",
        'images' => "/<img(?:[^>]*)src=\"(https?[^\"]*)\"(?:[^>]*)>/is",
        'text' => '',
    );

    function validate($url) {
        $preg_match = preg_match($this->patterns['url'], $url);
        return $preg_match;
    }

    function loadByUrl($url) {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $result = curl_exec($ch);
        curl_close($ch);
        return $result;
    }

    function parse($url, $searchType, $value) {
        $result = array( 'errors' => array(), 'results' => array() );

        if (!$url) {
            return $result;
        }
        if (!$this->validate($url)) {
            $result['errors'] = array('not valid url parameter');
            return $result;
        }
        if (!in_array($searchType, array_keys($this->patterns))) {
            $result['errors'] = array('empty search type parameter');
            return $result;
        }

        $page = $this->loadByUrl($url);
        $pattern = $this->getPattern($searchType, $value);
        preg_match_all($pattern, $page, $matches);

        $result['results'] = $matches[1];
        return $result;
    }

    /**
     * @param $searchType
     * @param $value
     * @return string
     */
    public function getPattern($searchType, $value)
    {
        return $searchType == 'text'
            ? '/((' . $value . '))/is'
            : $this->patterns[$searchType];
    }
}