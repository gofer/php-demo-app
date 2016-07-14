<?php $this->setLayoutVar('title', $status['user_name']); ?>

<?php echo $this->render('status/status', array('status' => $status)); ?>

<?php if($session->isAuthenticated() && $user['id'] === $status['user_id']): ?>
<form action="<?php echo $base_url; ?>/status/unpost" method="post" onsubmit="return confirm('本当に削除しますか？');">
	<input type="hidden" name="_token" value="<?php echo $_token; ?>">
	<input type="hidden" name="id" value="<?php echo $id; ?>">
	<input type="submit" value="この投稿を削除">
</form>
<?php endif; ?>
