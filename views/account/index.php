<?php $this->setLayoutVar('title', 'アカウント'); ?>

<header><h2>アカウント</h2></header>

<p>
ユーザID:
	<a href="<?php echo $base_url . '/user/' . $this->escape($user['user_name']); ?>">
		<strong><?php echo $this->escape($user['user_name']); ?></strong>
	</a>
</p>

<ul>
	<li><a href="<?php echo $base_url; ?>">ホーム</a></li>
	<li><a href="<?php echo $base_url; ?>/account/signout">ログアウト</a></li>
</ul>

<header><h3>フォロー中</h3></header>

<?php if(count($followings) > 0): ?>
<ul>
	<?php foreach($followings as $following): ?>
	<li>
		<a href="<?php echo $base_url . '/user/' . $this->escape($following['user_name']); ?>">
			<?php echo $this->escape($following['user_name']); ?>
		</a>
	</li>
	<?php endforeach; ?>
</ul>
<?php endif; ?>
