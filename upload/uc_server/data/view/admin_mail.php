<?php if(!defined('UC_ROOT')) exit('Access Denied');?>
<?php include $this->gettpl('header');?>

<script src="js/common.js" type="text/javascript"></script>
<div class="container">
	<h3 class="marginbot">
		<a href="admin.php?m=feed&a=ls" class="sgbtn">�¼��б�</a>
		<?php if($user['allowadminnote'] || $user['isfounder']) { ?><a href="admin.php?m=note&a=ls" class="sgbtn">֪ͨ�б�</a><?php } ?>
		<?php if($user['allowadminlog'] || $user['isfounder']) { ?><a href="admin.php?m=log&a=ls" class="sgbtn">��־�б�</a><?php } ?>
		�ʼ�����
	</h3>
	<?php if($status == 2) { ?>
		<div class="correctmsg"><p>�ʼ��б�ɹ����¡�</p></div>
	<?php } ?>
	<div class="mainbox">
		<?php if($maillist) { ?>
			<form action="admin.php?m=mail&a=ls" method="post">
			<input type="hidden" name="formhash" value="<?php echo FORMHASH;?>">
			<table class="datalist" onmouseover="addMouseEvent(this);" style="table-layout:fixed">
				<tr>
					<th width="60"><input type="checkbox" name="chkall" id="chkall" onclick="checkall('delete[]')" class="checkbox" /><label for="chkall">ɾ��</label></th>
					<th width="130">�ʼ�����</th>
					<th width="60">������</th>
					<th width="80">����ʱ��</th>
					<th width="140">ʧ�ܴ���</th>
					<th width="100">��Դ</th>
					<th width="60">����</th>
				</tr>
				<?php foreach((array)$maillist as $mail) {?>
					<tr>
						<td><input type="checkbox" name="delete[]" value="<?php echo $mail['mailid'];?>" class="checkbox" /></td>
						<td><?php echo $mail['subject'];?></td>
						<td><a href="mailto:<?php echo $mail['email'];?>"><?php if($mail['username']) { ?><?php echo $mail['username'];?><?php } else { ?>����<?php } ?></td>
						<td><?php echo $mail['dateline'];?></td>
						<td><?php echo $mail['failures'];?></td>
						<td><?php echo $mail['appname'];?></td>
						<td><a href="admin.php?m=mail&a=send&mailid=<?php echo $mail['mailid'];?>">�ʼ�����</a></td>
					</tr>
				<?php } ?>
				<tr class="nobg">
					<td><input type="submit" value="�� ��" class="btn" /></td>
					<td class="tdpage" colspan="<?php echo count($applist) + 4;?>"><?php echo $multipage;?></td>
				</tr>
			</table>
			</form>
		<?php } else { ?>
			<div class="mail">
				<p class="i">Ŀǰû����ؼ�¼!</p>
			</div>
		<?php } ?>
	</div>
</div>

<?php include $this->gettpl('footer');?>