<?php if(!defined('IN_DISCUZ')) exit('Access Denied'); hookscriptoutput('stat_memberlist');
0
|| checktplrefresh('./template/default/forum/stat_memberlist.htm', './template/default/common/stat.htm', 1425393463, '1', './data/template/1_1_forum_stat_memberlist.tpl.php', './template/default', 'forum/stat_memberlist')
;?><?php include template('common/header'); ?><div id="pt" class="bm cl">
<div class="z">
<a href="./" class="nvhm" title="��ҳ"><?php echo $_G['setting']['bbname'];?></a><em>&rsaquo;</em>
<a href="misc.php?mod=stat">վ��ͳ��</a><em>&rsaquo;</em>
��Ա�б�
</div>
</div>
<div id="ct" class="ct2_a wp cl">
<div class="mn">
<div class="bm bw0">
<div class="cl">
<form method="post" action="misc.php?mod=stat&amp;op=memberlist" class="mbm y">
<input type="hidden" name="formhash" value="<?php echo FORMHASH;?>" />
<input type="text" name="srchmem" class="px vm" size="15" />
&nbsp;<button type="submit" class="pn vm"><em>����</em></button>
</form>
<h1 class="mt">��Ա�б�</h1>
</div>
<table summary="��Ա�б�" class="dt bm">
<tr>
<th><a href="misc.php?mod=stat&amp;op=memberlist&amp;order=username<?php if(!$_GET['asc']) { ?>&amp;asc=1<?php } ?>" class="showmenu">�û���</a></th>
<th><a href="misc.php?mod=stat&amp;op=memberlist&amp;order=uid<?php if(!$_GET['asc']) { ?>&amp;asc=1<?php } ?>" class="showmenu">UID</a></th>
<th><a href="misc.php?mod=stat&amp;op=memberlist&amp;order=gender<?php if(!$_GET['asc']) { ?>&amp;asc=1<?php } ?>" class="showmenu">�Ա�</a></th>
<th><a href="misc.php?mod=stat&amp;op=memberlist&amp;order=regdate<?php if(!$_GET['asc']) { ?>&amp;asc=1<?php } ?>" class="showmenu">ע������</a></th>
<th><a href="misc.php?mod=stat&amp;op=memberlist&amp;order=lastvisit<?php if(!$_GET['asc']) { ?>&amp;asc=1<?php } ?>" class="showmenu">�ϴη���</a></th>
<th><a href="misc.php?mod=stat&amp;op=memberlist&amp;order=posts<?php if(!$_GET['asc']) { ?>&amp;asc=1<?php } ?>" class="showmenu">����</a></th>
<th><a href="misc.php?mod=stat&amp;op=memberlist&amp;order=credits<?php if(!$_GET['asc']) { ?>&amp;asc=1<?php } ?>" class="showmenu">����</a></th>
</tr><?php if(is_array($memberlist)) foreach($memberlist as $member) { ?><tr class="<?php echo swapclass('alt'); ?>">
<td><a href="home.php?mod=space&amp;uid=<?php echo $member['uid'];?>" class="xw1"><?php echo $member['username'];?></a></td>
<td><?php echo $member['uid'];?></td>
<td><?php if($member['gender'] == '1') { ?>��<?php } elseif($member['gender'] == 2) { ?>Ů<?php } else { ?>&nbsp;<?php } ?></td>
<td><?php echo $member['regdate'];?></td>
<td><?php echo $member['lastvisit'];?></td>
<td><?php echo $member['posts'];?></td>
<td><?php echo $member['credits'];?></td>
</tr>
<?php } ?>
</table>
<?php if(!empty($multipage)) { ?><div class="pgs cl"><?php echo $multipage;?></div><?php } ?>
</div>
</div><div class="appl">
<div class="tbn">
<h2 class="mt bbda">վ��ͳ��</h2>
<ul>
<li class="cl<?php if($op == 'basic') { ?> a<?php } ?>"><a href="misc.php?mod=stat&amp;op=basic">�����ſ�</a></li>
<li class="cl<?php if($op == 'forumstat') { ?> a<?php } ?>"><a href="misc.php?mod=stat&amp;op=forumstat">���ͳ��</a></li>
<li class="cl<?php if($op == 'team') { ?> a<?php } ?>"><a href="misc.php?mod=stat&amp;op=team">�����Ŷ�</a></li>
<?php if($_G['setting']['modworkstatus']) { ?>
<li class="cl<?php if($op == 'modworks') { ?> a<?php } ?>"><a href="misc.php?mod=stat&amp;op=modworks">����ͳ��</a></li>
<?php } if($_G['setting']['memliststatus']) { ?>
<li class="cl<?php if($op == 'memberlist') { ?> a<?php } ?>"><a href="misc.php?mod=stat&amp;op=memberlist">��Ա�б�</a></li>
<?php } if($_G['setting']['updatestat']) { ?>
<li class="cl<?php if($op == 'trend') { ?> a<?php } ?>"><a href="misc.php?mod=stat&amp;op=trend">����ͳ��</a></li>
<?php } ?>
</ul>
</div>
</div></div><?php include template('common/footer'); ?>