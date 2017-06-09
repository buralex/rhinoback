    <div class="page-buffer"></div>
</div>

<footer id="footer" class="page-footer"><!--Footer-->
    <div class="footer-bottom">
        <div class="container">
            <div class="row">
                <p class="pull-left">Copyright © 2017</p>
                <p class="pull-right">Alexandr Burlachenko</p>
            </div>
        </div>
    </div>
</footer><!--/Footer-->

<script src="/template/js/jquery.js"></script>
<script src="/template/js/bootstrap.min.js"></script>
<script src="/template/js/jquery.scrollUp.min.js"></script>
<script src="/template/js/auto-complete.js"></script>
<script src="/template/js/main.js"></script>


<?php if ( preg_match("~^library~", trim($_SERVER['REQUEST_URI'], '/')) ) : ?>
    <script src="/template/js/library.js"></script>
<?php endif; ?>

<?php if ( preg_match("~^library/book~", trim($_SERVER['REQUEST_URI'], '/')) ) : ?>
    <script src="/template/js/library-book.js"></script>
<?php endif; ?>

<?php if ( preg_match("~^library/author~", trim($_SERVER['REQUEST_URI'], '/')) ) : ?>
    <script src="/template/js/library-author.js"></script>
<?php endif; ?>

</body>
</html>