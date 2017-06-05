<?php include ROOT . '/views/layouts/header.php'; ?>

<section>
    <div class="container">
        <div class="row">

            <h3>User cabinet</h3>
            
            <h4>Hi, <?php echo $user['name'];?>!</h4>
			<?=	$user['role'] == 'admin' ? '<a href="/admin"><h1>Admin panel</h1></a>' : ''; ?>

            <ul>
                <li><a href="/cabinet/edit">Редактировать данные</a></li>
                <!--<li><a href="/cabinet/history">Список покупок</a></li>-->
            </ul>
            
        </div>
    </div>
</section>

<?php include ROOT . '/views/layouts/footer.php'; ?>