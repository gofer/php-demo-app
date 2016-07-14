<?php $this->setLayoutVar('title', $user['user_name']) ?>

<header><h2><?php echo $this->escape($user['user_name']); ?></h2></header>

<?php if(!is_null($following)): ?>
<?php if($following): ?>
<p>フォローしています</p>
<form action="<?php echo $base_url; ?>/unfollow" method="post">
	<input type="hidden" name="_token2" value="<?php echo $this->escape($_token2); ?>">
	<input type="hidden" name="following_name" value="<?php echo $this->escape($user['user_name']); ?>">
	<input type="submit" value="アンフォローする">
</form>
<?php else: ?>
<form action="<?php echo $base_url; ?>/follow" method="post">
	<input type="hidden" name="_token1" value="<?php echo $this->escape($_token1); ?>">
	<input type="hidden" name="following_name" value="<?php echo $this->escape($user['user_name']); ?>">
	<input type="submit" value="フォローする">
</form>
<?php endif; ?>
<?php else: ?>
<p>そいつがお前だ。</p>
<?php endif; ?>

<article id="statuses">
	<?php foreach($statuses as $status): ?>
	<?php echo $this->render('status/status', array('status' => $status)); ?>
	<?php endforeach; ?>
</article>
