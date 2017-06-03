<?php include ROOT . '/views/layouts/header.php'; ?>


<section>
    <div class="container">
        <div class="row">

            <div class="col-lg-12 text-center">
				<?php

/*------------------------------------------------------------------------

1. Reversing an array

------------------------------------------------------------------------*/
            $arr = ["h","e","l","l","o"];

            /*--------------------------------------------
              "for" loop
             -------------------------------------------*/
            $method_1 = function ($arr) {
                $arr_rev = [];

                for ($i = count($arr)-1; $i >= 0 ; $i--) {
                    $arr_rev[] = $arr[$i];
                }
                return $arr_rev;
            };

            /*--------------------------------------------
              "unshift" fnc
             --------------------------------------------*/
            $method_2 = function ($arr) {
                $arr_rev = [];

                for ($i = 0; $i < count($arr) ; $i++) {
                    array_unshift($arr_rev, $arr[$i]);
                }
                return $arr_rev;
            };

            /*--------------------------------------------
              "krsort" fnc
             --------------------------------------------*/
            $method_3 = function ($arr) {
                $arr_rev = $arr;
                krsort($arr_rev);
                return $arr_rev;
            };

            echo "<h3>1. Reversing an array</h3>";

            echo join(" ", $arr) . " &nbsp; - (initial)" . "<br><br>";
            echo join(" ", $method_1($arr)) . " &nbsp; - (\"for\" loop)" . "<br><br>";
            echo join(" ", $method_2($arr)) . " &nbsp; - (\"unshift\" function)" . "<br><br>";
            echo join(" ", $method_3($arr)) . " &nbsp; - (\"krsort\" function)" . "<br><br>";


				?>

                <pre class="text-left">
            $arr = ["h","e","l","l","o"];

            /*--------------------------------------------
              "for" loop
             --------------------------------------------*/
            $method_1 = function ($arr) {
                $arr_rev = [];

                for ($i = count($arr)-1; $i >= 0 ; $i--) {
                    $arr_rev[] = $arr[$i];
                }
                return $arr_rev;
            };

            /*--------------------------------------------
              "unshift" fnc
             --------------------------------------------*/
            $method_2 = function ($arr) {
                $arr_rev = [];

                for ($i = 0; $i < count($arr) ; $i++) {
                    array_unshift($arr_rev, $arr[$i]);
                }
                return $arr_rev;
            };

            /---------------------------------------------
              "krsort" fnc
             --------------------------------------------*/
            $method_3 = function ($arr) {
                $arr_rev = $arr;
                krsort($arr_rev);
                return $arr_rev;
            };
                </pre>
            </div>
        </div>
    </div>
</section>

<?php include ROOT . '/views/layouts/footer.php'; ?>