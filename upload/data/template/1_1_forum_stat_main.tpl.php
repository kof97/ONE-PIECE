<?php if(!defined('IN_DISCUZ')) exit('Access Denied'); hookscriptoutput('stat_main');
0
|| checktplrefresh('./template/default/forum/stat_main.htm', './template/default/common/stat.htm', 1424772055, '1', './data/template/1_1_forum_stat_main.tpl.php', './template/default', 'forum/stat_main')
;?><?php include template('common/header'); ?><div id="pt" class="bm cl">
<div class="z">
<a href="./" class="nvhm" title="��ҳ"><?php echo $_G['setting']['bbname'];?></a><em>&rsaquo;</em> վ��ͳ��
</div>
</div>
<div id="ct" class="ct2_a wp cl">
<div class="mn">
<div class="bm bw0">
<h1 class="mt">�����ſ�</h1>
<table summary="��Աͳ��" class="dt bm mbw">
<caption><h2 class="mbn">��Աͳ��</h2></caption>
<tr>
<th width="16%">ע���Ա</th>
<td width="34%"><?php echo $members;?></td>
<th width="16%">������Ա</th>
<td width="34%"><?php echo $mempost;?></td>
</tr>
<tr>
<th>�����Ա</th>
<td><?php echo $admins;?></td>
<th>δ������Ա</th>
<td><?php echo $memnonpost;?></td>
</tr>
<tr>
<th>�»�Ա</th>
<td><?php echo $lastmember;?></td>
<th>������Առ����</th>
<td><?php echo $mempostpercent;?>%</td>
</tr>
<tr>
<th>������̳֮��</th>
<td><?php if($bestmemposts) { ?><?php echo $bestmem;?> <em title="������">(<?php echo $bestmemposts;?>)</em><?php } else { ?><em>��</em><?php } ?></td>
<th>ƽ��ÿ�˷�����</th>
<td><?php echo $mempostavg;?></td>
</tr>
</table>

<table summary="վ��ͳ��" class="dt bm">
<caption><h2 class="mbn">վ��ͳ��</h2></caption>
<tr>
<th width="150">�����</th>
<td width="60"><?php echo $forums;?></td>
<th width="150">ƽ��ÿ������������</th>
<td width="60"><?php echo $postsaddavg;?></td>
<th width="150">�����ŵİ��</th>
<td><a href="forum.php?mod=forumdisplay&amp;fid=<?php echo $hotforum['fid'];?>" target="_blank"><?php echo $hotforum['name'];?></a></td>
</tr>
<tr>
<th>������</th>
<td><?php echo $threads;?></td>
<th>ƽ��ÿ��ע���Ա��</th>
<td><?php echo $membersaddavg;?></td>
<th>������</th>
<td><?php echo $hotforum['threads'];?></td>
</tr>
<tr>
<th>������</th>
<td><?php echo $posts;?></td>
<th>��� 24 Сʱ����������</th>
<td><?php echo $postsaddtoday;?></td>
<th>������</th>
<td><?php echo $hotforum['posts'];?></td>
</tr>
<tr>
<th>ƽ��ÿ�����ⱻ�ظ�����</th>
<td><?php echo $threadreplyavg;?></td>
<th>��� 24 Сʱ������Ա��</th>
<td><?php echo $membersaddtoday;?></td>
<th>��̳��Ծָ��</th>
<td><?php echo $activeindex;?></td>
</tr>
</table>
<div class="notice">ͳ�������ѱ����棬�ϴ��� <?php echo $lastupdate;?> �����£��´ν��� <?php echo $nextupdate;?> ���и���</div>
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