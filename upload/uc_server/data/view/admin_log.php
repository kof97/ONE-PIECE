<?php if(!defined('UC_ROOT')) exit('Access Denied');?>
<?php include $this->gettpl('header');?>

<div class="container">
	<h3 class="marginbot">		
		<a href="admin.php?m=feed&a=ls" class="sgbtn">�¼��б�</a>
		<?php if($user['allowadminnote'] || $user['isfounder']) { ?><a href="admin.php?m=note&a=ls" class="sgbtn">֪ͨ�б�</a><?php } ?>
		��־�б�
		<a href="admin.php?m=mail&a=ls" class="sgbtn">�ʼ�����</a>
	</h3>
	<div class="mainbox">
		<?php if($loglist) { ?>
			<table class="datalist">
				<tr>
					<th>������</th>
					<th>IP</th>
					<th>ʱ��</th>
					<th>����</th>
					<th>���� </th>
				</tr>
				<?php foreach((array)$loglist as $log) {?>
					<tr>
						<td><strong><?php echo $log[1];?></strong></td>
						<td><?php echo $log[2];?></td>
						<td><?php echo $log[3];?></td>
						<td><?php echo $log[4];?></td>
						<td><?php echo $log[5];?></td>
					</tr>
				<?php } ?>
				<tr class="nobg">
					<td class="tdpage" colspan="5"><?php echo $multipage;?></td>
				</tr>
			</table>
		<?php } else { ?>
			<div class="note">
				<p class="i">Ŀǰû����ؼ�¼!</p>
			</div>
		<?php } ?>
	</div>
</div>

<?php include $this->gettpl('footer');?>