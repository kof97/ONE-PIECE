<?php if(!defined('IN_DISCUZ')) exit('Access Denied'); hookscriptoutput('stat_misc');
0
|| checktplrefresh('./template/default/forum/stat_misc.htm', './template/default/common/stat.htm', 1425393459, '1', './data/template/1_1_forum_stat_misc.tpl.php', './template/default', 'forum/stat_misc')
;?><?php include template('common/header'); ?><div id="pt" class="bm cl">
<div class="z">
<a href="./" class="nvhm" title="��ҳ"><?php echo $_G['setting']['bbname'];?></a><em>&rsaquo;</em>
<a href="misc.php?mod=stat">վ��ͳ��</a><em>&rsaquo;</em>
<?php if($op == 'views') { ?>
����ͳ��
<?php } elseif($op == 'agent') { ?>
�ͻ����
<?php } elseif($op == 'posts') { ?>
��������¼
<?php } elseif($op == 'modworks') { ?>
����ͳ��
<?php } elseif($op == 'forumstat') { ?>
���ͳ��
<?php } ?>
</div>
</div>

<div id="ct" class="ct2_a wp cl">
<div class="mn">
<?php if($op == 'views') { ?>
<div class="bm bw0">
<h1 class="mt">����ͳ��</h1>
<table summary="��������" class="dt bm">
<caption><h2 class="mbn">��������</h2></caption>
<?php echo $statsbar_week;?>
</table>

<table summary="ʱ������" class="dt bm">
<caption><h2 class="mbn">ʱ������</h2></caption>
<?php echo $statsbar_hour;?>
</table>
</div>
<?php } elseif($op == 'agent') { ?>
<div class="bm bw0">
<h1 class="mt">�ͻ����</h1>
<table summary="�ͻ����" class="dt bm">
<caption><h2 class="mbn">����ϵͳ</h2></caption>
<?php echo $statsbar_os;?>
</table>

<table summary="�����" class="dt bm">
<caption><h2 class="mbn">�����</h2></caption>
<?php echo $statsbar_browser;?>
</table>
</div>
<?php } elseif($op == 'posts') { ?>
<div class="bm bw0">
<h1 class="mt">��������¼</h1>
<table summary="ÿ���������Ӽ�¼" class="dt bm">
<caption><h2 class="mbn">ÿ���������Ӽ�¼</h2></caption>
<?php echo $statsbar_monthposts;?>
</table>

<table summary="ÿ���������Ӽ�¼" class="dt bm">
<caption><h2 class="mbn">ÿ���������Ӽ�¼</h2></caption>
<?php echo $statsbar_dayposts;?>
</table>
<?php } elseif($op == 'forumstat' && !$_GET['fid']) { ?>
<div class="bm bw0">
<h1 class="mt">���ͳ��</h1>
<table summary="!stats_forum_stat!" class="dt bm">
<tr>
<th class="xw1">�������</td>
<th class="xw1">������</td>
</tr><?php if(is_array($forums)) foreach($forums as $forum) { ?><tr class="<?php echo swapclass('alt'); ?>">
<td><a href="misc.php?mod=stat&amp;op=forumstat&amp;fid=<?php echo $forum['fid'];?>"><?php echo $forum['name'];?></a><?php if($forum['type'] == 'sub') { ?><span class="xg1"> (�Ӱ�)</span><?php } ?></td>
<td><?php echo $forum['posts'];?></td>
</tr>
<?php } ?>
</table>
</div>
<?php } elseif($op == 'forumstat' && $_GET['fid']) { ?>
<div class="bm bw0">
<h1 class="mt">���ͳ����־ - <?php echo $foruminfo['name'];?> - <?php echo $month;?></h1>
<script type="text/javascript">
document.write(AC_FL_RunContent(
'width', '100%', 'height', '300',
'src', '<?php echo STATICURL;?>image/common/stat.swf?<?php echo $statuspara;?>',
'quality', 'high'
));
</script>
<?php if($logs) { ?>
<table summary="���ͳ����־" class="dt bm mtw mbw">
<tr>
<th width="100">����</th>
<th>������</th>
</tr><?php if(is_array($logs)) foreach($logs as $log) { ?><tr>
<td><?php echo $log['logdate'];?></td>
<td><?php echo $log['value'];?></td>
</tr>
<?php } ?>
</table>
<?php } ?>

<table class="dt bm">
<caption><h2 class="mbn">��ʷ��¼ - <?php echo $foruminfo['name'];?></h2></caption>
<tr>
<th width="100">�·�</th>
<th>������</th>
</tr><?php if(is_array($monthlist)) foreach($monthlist as $month) { ?><tr>
<td><a href="misc.php?mod=stat&amp;op=forumstat&amp;fid=<?php echo $_GET['fid'];?>&amp;month=<?php echo $month;?>"><?php echo $month;?></a></td>
<td><?php echo $monthposts[$month];?></td>
</tr>
<?php } ?>
</table>
</div>
<?php } elseif($op == 'modworks' && $uid) { ?>
<div class="bm bw0">
<h1 class="mt">����ͳ�� - <?php echo $username;?></h1>
<h3><?php echo $username;?> �� <?php echo $starttime;?> �� <?php echo $endtime;?> �Ĺ���ͳ������ &nbsp; <a href="misc.php?mod=stat&amp;op=modworks&amp;exportexcel=1&amp;uid=<?php echo $uid;?>&amp;modworks_starttime=<?php echo $starttime;?>&amp;modworks_endtime=<?php echo $endtime;?>" class="xi2">[����]</a></h3>
<ul class="ttp cl"><?php if(is_array($monthlinks)) foreach($monthlinks as $link) { ?><?php echo $link;?>
<?php } ?>
<li>
<script src="<?php echo $_G['setting']['jspath'];?>calendar.js?<?php echo VERHASH;?>" type="text/javascript" type="text/javascript"></script>
<form action="misc.php?mod=stat&amp;op=modworks&amp;uid=<?php echo $uid;?>" method="post">
<input type="hidden" name="formhash" value="<?php echo FORMHASH;?>" />
ʱ�䷶Χ: <input type="text" name="modworks_starttime" class="px vm" size="10" onclick="showcalendar(event, this, false)" autocomplete="off" /> �� <input type="text" name="modworks_endtime" class="px vm" size="10" onclick="showcalendar(event, this, false)" autocomplete="off" />
<button type="submit" class="pn vm" name="modworkssubmit" value="true"><em>�鿴</em></button></td>
</form>
</li>
</ul>
<div class="cl">
<div class="stl">
<table class="dt bm">
<tr>
<th>ʱ��</th>
</tr><?php if(is_array($modactions)) foreach($modactions as $day => $modaction) { ?><tr class="<?php echo swapclass('alt'); ?>">
<td><?php echo $day;?></td>
</tr>
<?php } ?>
<tr>
<td>�ϼ�</td>
</tr>
</table>
</div>
<div class="str">
<table class="dt" style="width: 3000px;">
<tr><?php if(is_array($modactioncode)) foreach($modactioncode as $key => $val) { ?><th width="<?php echo $tdwidth;?>"><?php echo $val;?></th><?php } ?>
<th width="<?php echo $tdwidth;?>">�ϼ�</th>
</tr><?php unset($swapc);?><?php if(is_array($modactions)) foreach($modactions as $day => $modaction) { ?><tr class="<?php echo swapclass('alt'); ?>"><?php if(is_array($modactioncode)) foreach($modactioncode as $key => $val) { if($modaction[$key]['posts']) { ?><td title="����: <?php echo $modaction[$key]['posts'];?>"><?php echo $modaction[$key]['count'];?><?php } else { ?><td>&nbsp;<?php } ?></td>
<?php } ?>
<td><?php echo $modaction['total'];?></td>
</tr>
<?php } ?>
<tr><?php if(is_array($modactioncode)) foreach($modactioncode as $key => $val) { if($totalactions[$key]['posts']) { ?><td class="<?php echo $bgarray[$key];?>" title="����: <?php echo $totalactions[$key]['posts'];?>"><?php echo $totalactions[$key]['count'];?><?php } else { ?><td>&nbsp;<?php } ?></td>
<?php } ?>
<td><?php echo $totalactions['total'];?></td>
</tr>
</table>
</div>
</div>
</div>

<?php } elseif($op == 'modworks') { ?>
<div class="bm bw0">
<h1 class="mt">����ͳ�� - ȫ�������Ա</h1>
<h3><?php echo $starttime;?> �� <?php echo $endtime;?> �Ĺ���ͳ������ &nbsp; <a href="misc.php?mod=stat&amp;op=modworks&amp;exportexcel=1&amp;modworks_starttime=<?php echo $starttime;?>&amp;modworks_endtime=<?php echo $endtime;?>" class="xi2">[����]</a></h3>
<ul class="ttp cl"><?php if(is_array($monthlinks)) foreach($monthlinks as $link) { ?><?php echo $link;?>
<?php } ?>
<li>
<script src="<?php echo $_G['setting']['jspath'];?>calendar.js?<?php echo VERHASH;?>" type="text/javascript" type="text/javascript"></script>
<form action="misc.php?mod=stat&amp;op=modworks" method="post">
<input type="hidden" name="formhash" value="<?php echo FORMHASH;?>" />
ʱ�䷶Χ: <input type="text" name="modworks_starttime" class="px vm" size="10" onclick="showcalendar(event, this, false)" autocomplete="off" /> �� <input type="text" name="modworks_endtime" class="px vm" size="10" onclick="showcalendar(event, this, false)" autocomplete="off" />
<button type="submit" class="pn vm" name="modworkssubmit" value="true"><em>�鿴</em></button></td>
</form>
</li>
</ul>
<div class="cl">
<div class="stl">
<table class="dt bm">
<tr>
<th>�û���</th>
</tr><?php if(is_array($members)) foreach($members as $uid => $member) { ?><tr class="<?php echo swapclass('alt'); ?>">
<td><a href="misc.php?mod=stat&amp;op=modworks<?php if(isset($_GET['before'])) { ?>&amp;before=<?php echo $_GET['before'];?><?php } ?>&amp;uid=<?php echo $uid;?><?php if($starttime || $endtime) { ?>&amp;modworks_starttime=<?php echo $starttime;?>&amp;modworks_endtime=<?php echo $endtime;?><?php } ?>" title="�鿴��ϸ����ͳ��"><?php echo $member['username'];?></a></td>
</tr>
<?php } if($members) { ?>
<tr>
<td>�ϼ�</td>
</tr>
<?php } ?>
</table>
</div>

<div class="str">
<table class="dt" style="width: 3000px;">
<tr><?php if(is_array($modactioncode)) foreach($modactioncode as $key => $val) { ?><th width="<?php echo $tdwidth;?>"><?php echo $val;?></th><?php } ?>
<th width="<?php echo $tdwidth;?>">�ϼ�</th>
</tr><?php unset($swapc);?><?php if(is_array($members)) foreach($members as $uid => $member) { ?><tr class="<?php echo swapclass('alt'); ?>"><?php if(is_array($modactioncode)) foreach($modactioncode as $key => $val) { if($member[$key]['posts']) { ?><td title="����: <?php echo $member[$key]['posts'];?>"><?php echo $member[$key]['count'];?><?php } else { ?><td>&nbsp;<?php } ?></td>
<?php } ?>
<td><?php echo $member['total'];?></td>
</tr>
<?php } if($members) { ?>
<tr><?php if(is_array($modactioncode)) foreach($modactioncode as $key => $val) { if($total[$key]['posts']) { ?><td title="����: <?php echo $total[$key]['posts'];?>"><?php echo $total[$key]['count'];?><?php } else { ?><td>&nbsp;<?php } ?></td>
<?php } ?>
<td><?php echo $total['total'];?></td>
</tr>
<?php } ?>
</table>
</div>
</div>
</div>
<?php } ?>

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