<?php if(!defined('UC_ROOT')) exit('Access Denied');?>
<?php include $this->gettpl('header');?>

<script src="js/common.js" type="text/javascript"></script>
<div class="container">
	<h3 class="marginbot">
		<a href="admin.php?m=feed&a=ls" class="sgbtn">�¼��б�</a>
		֪ͨ�б�
		<?php if($user['allowadminlog'] || $user['isfounder']) { ?><a href="admin.php?m=log&a=ls" class="sgbtn">��־�б�</a><?php } ?>
		<a href="admin.php?m=mail&a=ls" class="sgbtn">�ʼ�����</a>
	</h3>
	<?php if($status == 2) { ?>
		<div class="correctmsg"><p>֪ͨ�б�ɹ����¡�</p></div>
	<?php } ?>
	<div class="mainbox">
		<?php if($notelist) { ?>
			<form action="admin.php?m=note&a=ls" method="post">
			<input type="hidden" name="formhash" value="<?php echo FORMHASH;?>">
			<table class="datalist" onmouseover="addMouseEvent(this);" style="table-layout:fixed">
				<tr>
					<th width="60"><input type="checkbox" name="chkall" id="chkall" onclick="checkall('delete[]')" class="checkbox" /><label for="chkall">ɾ��</label></th>
					<th width="130">����</th>
					<th width="60">֪ͨ����</th>
					<th width="50">����</th>
					<th width="140">���֪ͨʱ��</th>
					<?php foreach((array)$applist as $app) {?>
						<?php if($app['recvnote']) { ?>
							<th width="100"><?php echo $app['name'];?></th>
						<?php } ?>
					<?php } ?>
				</tr>
				<?php foreach((array)$notelist as $note) {?>
					<?php $debuginfo = dhtmlspecialchars(str_replace(array("\n", "\r", "'"), array('', '', "\'"), $note['getdata'].$note['postdata2'])); ?>
					<tr>
						<td><input type="checkbox" name="delete[]" value="<?php echo $note['noteid'];?>" class="checkbox" /></td>
						<td><strong><?php echo $note['operation'];?></strong></td>
						<td><?php echo $note['totalnum'];?></td>
						<td><a href="###" onclick="alert('<?php echo $debuginfo;?>');">�鿴</a></td>
						<td><?php echo $note['dateline'];?></td>
						<?php foreach((array)$applist as $appid => $app) {?>
							<?php if($app['recvnote']) { ?>
								<td><?php echo $note['status'][$appid];?></td>
							<?php } ?>
						<?php }?>
					</tr>
				<?php } ?>
				<tr class="nobg">
					<td><input type="submit" value="�� ��" class="btn" /></td>
					<td class="tdpage" colspan="<?php echo count($applist) + 4;?>"><?php echo $multipage;?></td>
				</tr>
			</table>
			</form>
		<?php } else { ?>
			<div class="note">
				<p class="i">Ŀǰû����ؼ�¼!</p>
			</div>
		<?php } ?>
	</div>
</div>

<?php include $this->gettpl('footer');?>