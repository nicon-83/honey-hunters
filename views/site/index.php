<?php include ROOT . '/views/layouts/header.php'; ?>
	
	<section class="forms">
		<div class="container">
			<div class="row">
				<div class="contact_icon col-xs-4 col-xs-offset-4 col-sm-3 col-sm-offset-4">
					<img src="../../template/images/contact_icon.png" alt="">
				</div>
			</div>
			<div class="row inputs">
				<form method="post" class="form">
					<div class="col-sm-5 part-left">
						<p>Имя <span>*</span><input title="Имя" class="col-xs-12" type="text" name="name"></p>
						<p>E-Mail <span>*</span><input title="E-Mail" class="col-xs-12" type="email" name="email"></p>
					</div>
					<div class="col-sm-6 col-sm-offset-1 part-right">
						<p>Комментарий <span>*</span></p>
						<textarea class="col-xs-12" name="text" maxlength="400"></textarea>
					</div>
				</form>
				<button id="add-comment" type="submit">Записать</button>
			</div>
		</div>
	</section>
	<section class="comments">
		<div class="container">
			<div class="row">
				<h3 class="col-xs-12">Выводим комментарии</h3>
			</div>
			<div class="row comments-container" id="comments-item">
				
				<?php foreach ($comments as $comment): ?>
					<div class="comment_wrap col-xs-12 col-sm-6 col-md-4 col-lg-3">
						<div class="item">
							<p class="name"><?php echo $comment['name']; ?></p>
							<p class="email"><?php echo $comment['email']; ?></p>
							<p class="text"><?php echo $comment['text']; ?></p>
							<p class="date"><?php echo $comment['date']; ?></p>
						</div>
					</div>
				<?php endforeach; ?>
			
			</div>
		</div>
	</section>

<?php include ROOT . '/views/layouts/footer.php'; ?>