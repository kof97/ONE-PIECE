<?php if(!defined('IN_DISCUZ')) exit('Access Denied'); hookscriptoutput('misc_stat');
0
|| checktplrefresh('./template/default/home/misc_stat.htm', './template/default/common/stat.htm', 1425393464, '1', './data/template/1_1_home_misc_stat.tpl.php', './template/default', 'home/misc_stat')
;?>
<?php $_G['home_tpl_titles'] = array('����ͳ��');?><?php include template('common/header'); ?><div id="pt" class="bm cl">
<div class="z">
<a href="./" class="nvhm" title="��ҳ"><?php echo $_G['setting']['bbname'];?></a><em>&rsaquo;</em>
<a href="misc.php?mod=stat">վ��ͳ��</a><em>&rsaquo;</em>
����ͳ��
</div>
</div>

<div id="ct" class="ct2_a wp cl">
<div class="mn">
<div class="bm bw0">
<h1 class="mt">����ͳ��</h1>
<form method="get" action="misc.php?mod=stat&amp;op=trend">
<table cellspacing="0" cellpadding="0" class="dt bm mbw">
<caption>
<h2>ͳ�Ʒ���</h2>
<p class="pbm xg1">վ������ͳ��ϵͳ�����¼վ��ÿ�յķ�չ�ſ���ͨ��ÿ�յ����Ʊ仯��Ϊվ����Ӫվ���ṩ��ѧ�����ݻ��� </p>
</caption>
<tr class="tbmu">
<th>��������:</th>
<td>
<a href="misc.php?mod=stat&amp;op=trend"<?php echo $actives['all'];?>>�ۺϸſ�</a> &nbsp;<?php if(is_array($cols['login'])) foreach($cols['login'] as $value) { ?><label<?php echo $actives[$value];?>><input type="checkbox" name="types[]" value="<?php echo $value;?>" class="pc" <?php if(in_array($value, $_GET['types'])) { ?> checked="checked"<?php } ?> /><?php echo lang('spacecp', "do_stat_$value");?></label> &nbsp;
<?php } ?>
</td>
</tr>
<tr class="tbmu">
<th><?php echo $_G['setting']['navs']['2']['navname'];?>:</th>
<td><?php if(is_array($cols['forum'])) foreach($cols['forum'] as $value) { ?><label<?php echo $actives[$value];?>><input type="checkbox" name="types[]" value="<?php echo $value;?>" class="pc" <?php if(in_array($value, $_GET['types'])) { ?> checked="checked"<?php } ?> /><?php echo lang('spacecp', "do_stat_$value");?></label> &nbsp;
<?php } ?>
</td>
</tr>
<tr class="tbmu">
<th>Ⱥ��:</th>
<td><?php if(is_array($cols['tgroup'])) foreach($cols['tgroup'] as $value) { ?><label <?php echo $actives[$value];?>><input type="checkbox" name="types[]" value="<?php echo $value;?>" class="pc" <?php if(in_array($value, $_GET['types'])) { ?> checked="checked"<?php } ?> /><?php echo lang('spacecp', "do_stat_$value");?></label> &nbsp;
<?php } ?>
</td>
</tr>
<tr class="tbmu">
<th>��԰:</th>
<td><?php if(is_array($cols['home'])) foreach($cols['home'] as $value) { ?><label<?php echo $actives[$value];?>><input type="checkbox" name="types[]" value="<?php echo $value;?>" class="pc" <?php if(in_array($value, $_GET['types'])) { ?> checked="checked"<?php } ?> /><?php echo lang('spacecp', "do_stat_$value");?></label> &nbsp;
<?php } ?>
</td>
</tr>

<!--tr class="tbmu">
<th>��Ϣ����:</th>
<td><?php if(is_array($cols['comment'])) foreach($cols['comment'] as $value) { ?><label<?php echo $actives[$value];?>><input type="checkbox" name="types[]" value="<?php echo $value;?>" class="pc" <?php if(in_array($value, $_GET['types'])) { ?> checked="checked"<?php } ?> /><?php echo lang('spacecp', "do_stat_$value");?></label> &nbsp;
<?php } ?>
</td>
</tr-->
<tr class="tbmu">
<th>����:</th>
<td><?php if(is_array($cols['space'])) foreach($cols['space'] as $value) { ?><label<?php echo $actives[$value];?>><input type="checkbox" name="types[]" value="<?php echo $value;?>" class="pc" <?php if(in_array($value, $_GET['types'])) { ?> checked="checked"<?php } ?> /><?php echo lang('spacecp', "do_stat_$value");?></label> &nbsp;
<?php } ?>
</td>
</tr>
<tr class="tbmu">
<th>ͳ������:</th>
<td>
<script src="<?php echo $_G['setting']['jspath'];?>calendar.js?<?php echo VERHASH;?>" type="text/javascript"></script>
<input type="text" name="primarybegin" class="px" value="<?php echo $primarybegin;?>" onclick="showcalendar(event, this, false)"/> - <input type="text" name="primaryend" class="px" value="<?php echo $primaryend;?>" onclick="showcalendar(event, this, false)" />
<label><input type="checkbox" name="merge" value="1" class="pc" <?php if(!empty($merge)) { ?> checked="checked"<?php } ?> />�ϲ�ͳ��</label>
<button type="submit" class="pn pnc"><strong>�鿴</strong></button>
</td>
</tr>
</table>
<input type="hidden" name="type" value="<?php echo $_GET['type'];?>" />
<input type="hidden" name="mod" value="stat" />
<input type="hidden" name="op" value="trend" />
</form>
<table cellspacing="0" cellpadding="0" width="100%">
<?php if($type=='all') { ?>
<caption>
<h2>�ۺϸſ�</h2>
<p class="xg1">���￴������վ����ۺϸſ���չͳ��(��Ҫ����ͳ�� 2 ������Ч)</p>
</caption>
<tr>
<td>
<ul class="ptn pbm xl">
<li>�����û���ָ����ÿ����ʱ�վ��Ψһ�û�����һ���û����ʶ�Σ�Ҳֻ��һ��</li>
  									<li><?php echo $_G['setting']['navs']['2']['navname'];?>��ָ����ÿ�췢�����⡢ͶƱ��������͡����ۡ���Ʒ����������������� </li>
									<li>Ⱥ�飺ָ����ÿ�촴��<?php echo $_G['setting']['navs']['3']['navname'];?>��<?php echo $_G['setting']['navs']['3']['navname'];?>���⡢<?php echo $_G['setting']['navs']['3']['navname'];?>������������ </li>
									<li>��԰��ָ����ÿ�췢����¼����־��ͼƬ�����⡢ͶƱ���������ͻ������۵������� </li>
									<li>������ָ����ÿ���û�֮�以�����ԡ����к��͵�<?php echo $_G['setting']['navs']['4']['navname'];?>��Ӧ�ı�̬���������� </li>
</ul>
</td>
</tr>
<?php } else { ?>
<caption>
<h2><?php if(is_array($_GET['types'])) foreach($_GET['types'] as $key => $type) { ?>&nbsp;<?php echo lang('spacecp', "do_stat_$type");?>&nbsp;
<?php } ?>
</h2>
</caption>
<?php } ?>
<tr><td>
<script type="text/javascript">
document.write(AC_FL_RunContent(
'width', '100%', 'height', '300',
'src', '<?php echo STATICURL;?>image/common/stat.swf?<?php echo $statuspara;?>',
'quality', 'high', 'wmode', 'transparent'
));
</script>
</td></tr>
</table>

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