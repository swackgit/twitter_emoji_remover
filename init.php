<?php class twitter_emoji_remover extends Plugin {
        private $host;
        function about() {
                return array(1.0,
                        "remove higher quality emojis using the alt versions",
                        "swack");
        }
        function init($host) {
                $this->host = $host;
                $host->add_hook($host::HOOK_ARTICLE_FILTER, $this);
        }
        function hook_article_filter($article) {

			$subject = $article["content"];
            $pattern = '/(<img class.*?alt="?)(.*)(" title.*1em;">)/';
            $replacement = '$2';

            $article["content"] = preg_replace($pattern,$replace,$subject);

        return $article;
        }
        function api_version() {
                return 2;
        }
}
