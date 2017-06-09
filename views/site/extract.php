
<section>
    <div class="container">
        <div class="row">

            <div class="col-lg-12 text-center">

				<?php

    /*------------------------------------------------------------------------

    2. Getting a domain

    ------------------------------------------------------------------------*/
    $url = "http://site.ru/folder/page.html";
    $url1 = "http://sub.site.ru/folder/page.html";
    $url2 = "http://some.strange_domain-really.tk/folder/page.html";

    class Url
    {
        static function domain($url){
            preg_match('/(?:http(s)?(?::\/\/))(www\.)?([a-zA-Z0-9-_\.?]+)/', $url, $matches);
            return $matches[3];
        }
    }

    echo "<h3>2. Extract a domain</h3>";

    echo "<b>" . Url::domain($url) . "</b>" . " &nbsp; (from &nbsp; $url)" . "<br><br>";
    echo "<b>" . Url::domain($url1) . "</b>" . " &nbsp; (from &nbsp; $url1)" . "<br><br>";
    echo "<b>" . Url::domain($url2) . "</b>" . " &nbsp; (from &nbsp; $url2)" . "<br><br>";


				?>
                <pre class="text-left">
    class Url
    {
        static function domain($url){
            preg_match('/(?:http(s)?(?::\/\/))(www\.)?([a-zA-Z0-9-_\.?]+)/', $url, $matches);
            return $matches[3];
        }
    }
                </pre>
            </div>
        </div>
    </div>
</section>