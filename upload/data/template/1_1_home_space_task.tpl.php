<?php if(!defined('IN_DISCUZ')) exit('Access Denied'); hookscriptoutput('space_task');
0
|| checktplrefresh('./template/default/home/space_task.htm', './template/default/home/space_task_list.htm', 1425469455, '1', './data/template/1_1_home_space_task.tpl.php', './template/default', 'home/space_task')
|| checktplrefresh('./template/default/home/space_task.htm', './template/default/home/space_task_detail.htm', 1425469455, '1', './data/template/1_1_home_space_task.tpl.php', './template/default', 'home/space_task')
;?><?php include template('common/header'); ?><div id="pt" class="bm cl">
<div class="z">
<a href="./" class="nvhm" title="��ҳ"><?php echo $_G['setting']['bbname'];?></a> <em>&rsaquo;</em>
<a href="home.php?mod=task">����</a>
</div>
</div>

<div id="ct" class="ct2_a wp cl">
<div class="mn">
<div class="bm bw0">
<?php if(empty($do)) { ?><h1 class="mt">
<img src="<?php echo STATICURL;?>image/feed/task.gif" alt="����" class="vm" />
<?php if($_GET['item'] == "doing") { ?>�����е�����
<?php } elseif($_GET['item'] == "done") { ?>����ɵ�����
<?php } elseif($_GET['item'] == "failed") { ?>ʧ�ܵ�����
<?php } else { ?>������<?php } ?>
</h1>
<div class="ptm">
<?php if($tasklist) { ?>
<table cellspacing="0" cellpadding="0" width="100%"><?php if(is_array($tasklist)) foreach($tasklist as $task) { ?><tr>
<td width="80" class="bbda"><img src="<?php echo $task['icon'];?>" width="64" height="64" alt="<?php echo $task['name'];?>" /></td>
<td class="bbda ptm pbm">
<h3 class="xs2 xi2"><a href="home.php?mod=task&amp;do=view&amp;id=<?php echo $task['taskid'];?>"><?php echo $task['name'];?></a> <span class="xs1 xg2 xw0">(����: <a href="home.php?mod=task&amp;do=view&amp;id=<?php echo $task['taskid'];?>#parter"><?php echo $task['applicants'];?></a> )</span></h3>
<p class="xg2"><?php echo $task['description'];?></p>
<?php if($_GET['item'] == 'doing') { ?>
<div class="pbg mtm mbm">
<div class="pbr" style="width: <?php if($task['csc']) { ?><?php echo $task['csc'];?>%<?php } else { ?>8px<?php } ?>;"></div>
<div class="xs0">����� <span id="csc_<?php echo $task['taskid'];?>"><?php echo $task['csc'];?></span>%</div>
</div>
<?php } ?>
</td>
<td class="xi1 bbda hm" width="200">
<?php if($task['reward'] == 'credit') { ?>
���� <?php echo $_G['setting']['extcredits'][$task['prize']]['title'];?> <?php echo $task['bonus'];?> <?php echo $_G['setting']['extcredits'][$task['prize']]['unit'];?>
<?php } elseif($task['reward'] == 'magic') { ?>
���� <?php echo $listdata[$task['prize']];?> <?php echo $task['bonus'];?> ��
<?php } elseif($task['reward'] == 'medal') { ?>
ѫ�� <?php echo $listdata[$task['prize']];?> <?php if($task['bonus']) { ?>��Ч�� <?php echo $task['bonus'];?> �� <?php } } elseif($task['reward'] == 'invite') { ?>
������ <?php echo $task['prize'];?> ��Ч�� <?php echo $task['bonus'];?> ��
<?php } elseif($task['reward'] == 'group') { ?>
�û��� <?php echo $listdata[$task['prize']];?> <?php if($task['bonus']) { ?> <?php echo $task['bonus'];?> �� <?php } } ?>
</td>
<td width="120" class="bbda">
<?php if($_GET['item'] == 'new') { if($task['noperm']) { ?>
<a href="javascript:;" onclick="doane(event);showDialog('�����ڵ��û����޷����������')"><img src="<?php echo STATICURL;?>image/task/disallow.gif" title="�����ڵ��û����޷����������" alt="disallow" /></a>
<?php } elseif($task['appliesfull']) { ?>
<a href="javascript:;" onclick="doane(event);showDialog('��������')"><img src="<?php echo STATICURL;?>image/task/disallow.gif" title="��������" alt="disallow" /></a>
<?php } else { ?>
<a href="home.php?mod=task&amp;do=apply&amp;id=<?php echo $task['taskid'];?>"><img src="<?php echo STATICURL;?>image/task/apply.gif" alt="apply" /></a>
<?php } } elseif($_GET['item'] == 'doing') { ?>
<p><a href="home.php?mod=task&amp;do=draw&amp;id=<?php echo $task['taskid'];?>"><img src="<?php echo STATICURL;?>image/task/<?php if($task['csc'] >=100) { ?>reward.gif<?php } else { ?>rewardless.gif<?php } ?>"  alt="" /></a></p>
<?php } elseif($_GET['item'] == 'done') { ?>
<p style="white-space:nowrap">����� <?php echo $task['dateline'];?>
<?php if($task['period'] && $task['t']) { ?><br /><?php if($task['allowapply']) { ?><a href="home.php?mod=task&amp;do=apply&amp;id=<?php echo $task['taskid'];?>">���ڿ����ٴ�����</a><?php } else { ?><?php echo $task['t'];?> ������ٴ�����<?php } } ?></p>
<?php } elseif($_GET['item'] == 'failed') { ?>
<p style="white-space:nowrap">ʧ���� <?php echo $task['dateline'];?>
<?php if($task['period'] && $task['t']) { ?><br /><?php if($task['allowapply']) { ?><a href="home.php?mod=task&amp;do=apply&amp;id=<?php echo $task['taskid'];?>">���ڿ����ٴ�����</a><?php } else { ?><?php echo $task['t'];?>�������������<?php } } ?></p>
<?php } ?>
</td>
</tr>
<?php } ?>
</table>
<?php } else { ?>
<p class="emp"><?php if($_GET['item'] == 'new') { ?>����������������������ɺ�����ٴ����룬�����ע <?php } elseif($_GET['item'] == 'doing') { ?>���޽����е������뵽������������ <?php } else { ?>��������<?php } ?></p>
<?php } ?>
</div><?php } elseif($do == 'view') { ?><h1 class="mt cl">
<img src="<?php echo STATICURL;?>image/feed/task.gif" alt="����" class="vm" /> ��������
</h1>
<?php if($task['endtime']) { ?><p class="xg2">��ǰ��������ʱ��Ϊ <?php echo $task['endtime'];?>�����ں������������������</p><?php } ?>
<div>
<table cellpadding="0" cellspacing="0" class="tfm">
<tr>
<td width="80"><img src="<?php echo $task['icon'];?>" alt="Icon" width="64" height="64" /></td>
<td class="bbda">
<h1 class="xs2 ptm pbm"><?php echo $task['name'];?></h1>
<?php if($task['period']) { ?>
<div class="xg1">
<?php if($task['periodtype'] == 0) { ?>
( ÿ�� <?php echo $task['period'];?> Сʱ��������һ�� )
<?php } elseif($task['periodtype'] == 1) { ?>
( ÿ <?php echo $task['period'];?> ����������һ�� )
<?php } elseif($task['periodtype'] == 2) { $periodweek = $_G['lang']['core']['weeks'][$task[period]];?>( ÿ�� <?php echo $periodweek;?> ��������һ�� )
<?php } elseif($task['periodtype'] == 3) { ?>
( ÿ�� <?php echo $task['period'];?> ����������һ�� )
<?php } ?>
</div>
<?php } ?>
<div><?php echo $task['description'];?></div>
</td>
</tr>
<tr>
<td>&nbsp;</td>
<td>
<table cellpadding="0" cellspacing="0" class="tfm">
<tr>
<th class="bbda">����</th>
<td class="bbda xi1">
<?php if($task['reward'] == 'credit') { ?>
���� <?php echo $_G['setting']['extcredits'][$task['prize']]['title'];?> <?php echo $task['bonus'];?> <?php echo $_G['setting']['extcredits'][$task['prize']]['unit'];?>
<?php } elseif($task['reward'] == 'magic') { ?>
���� <?php echo $task['rewardtext'];?> <?php echo $task['bonus'];?> ��
<?php } elseif($task['reward'] == 'medal') { ?>
ѫ�� <?php echo $task['rewardtext'];?> <?php if($task['bonus']) { ?>��Ч�� <?php echo $task['bonus'];?> �� <?php } } elseif($task['reward'] == 'invite') { ?>
������ <?php echo $task['prize'];?> ��Ч�� <?php echo $task['bonus'];?> ��
<?php } elseif($task['reward'] == 'group') { ?>
�û��� <?php echo $task['rewardtext'];?> <?php if($task['bonus']) { ?> <?php echo $task['bonus'];?> �� <?php } } else { ?>
��
<?php } ?>
</td>
</tr>
<?php if($task['viewmessage']) { ?>
<tr>
<th class="bbda">&nbsp;</th>
<td class="bbda"><?php echo $task['viewmessage'];?></td>
</tr>
<?php } else { ?>
<tr>
<th class="bbda">��ɴ�������������</th>
<td class="bbda">
<?php if($taskvars['complete']) { ?>
<ul><?php if(is_array($taskvars['complete'])) foreach($taskvars['complete'] as $taskvar) { ?><li><?php echo $taskvar['name'];?> : <?php echo $taskvar['value'];?></li>
<?php } ?>
</ul>
<?php } else { ?>
<p>����</p>
<?php } ?>
</td>
<?php } ?>
<tr>
<th class="bbda">�����������������</th>
<td class="bbda">
<?php if($task['applyperm'] || $task['relatedtaskid'] || $task['tasklimits'] || $taskvars['apply']) { ?>
<ul>
<li><?php if($task['grouprequired']) { ?>�û���: <?php echo $task['grouprequired'];?> <?php } elseif($task['applyperm'] == 'member') { ?>��ͨ��Ա<?php } elseif($task['applyperm'] == 'admin') { ?>������Ա<?php } ?></li>
<?php if($task['relatedtaskid']) { ?><li>�������ָ������: <a href="home.php?mod=task&amp;do=view&amp;id=<?php echo $task['relatedtaskid'];?>"><?php echo $_G['taskrequired'];?></a></li><?php } if($task['tasklimits']) { ?><li>�˴�����: <?php echo $task['tasklimits'];?></li><?php } if($taskvars['apply']) { if(is_array($taskvars['apply'])) foreach($taskvars['apply'] as $taskvar) { ?><li><?php echo $taskvar['name'];?>: <?php echo $taskvar['value'];?></li>
<?php } } ?>
</ul>
<?php } else { ?>
<p>����</p>
<?php } ?>
</td>
</tr>
</table>
</td>
</tr>
<tr>
<td>&nbsp;</td>
<td>
<?php if($allowapply == '-1') { ?>
<div class="pbg mtm mbm">
<div class="pbr" style="width: <?php if($task['csc']) { ?><?php echo $task['csc'];?>%<?php } else { ?>8px<?php } ?>;"></div>
<div class="xs0">����� <span id="csc_<?php echo $task['taskid'];?>"><?php echo $task['csc'];?></span>%</div>
</div>
<p class="mbw">
<a href="home.php?mod=task&amp;do=draw&amp;id=<?php echo $task['taskid'];?>"><img src="<?php echo STATICURL;?>image/task/<?php if($task['csc'] >=100) { ?>reward.gif<?php } else { ?>rewardless.gif<?php } ?>" /></a>
<?php if($task['csc'] < 100) { ?><a href="home.php?mod=task&amp;do=delete&amp;id=<?php echo $task['taskid'];?>"><img src="<?php echo STATICURL;?>image/task/cancel.gif" alt="��������" /></a><?php } ?>
</p>
<?php } elseif($allowapply == '-2') { ?>
<p class="xg2 mbn">�����ڵ��û����޷����������</p>
<a href="javascript:;" onclick="doane(event);showDialog('�����ڵ��û����޷����������')"><img src="<?php echo STATICURL;?>image/task/disallow.gif" title="�����ڵ��û����޷����������" alt="�����ڵ��û����޷����������" /></a>
<?php } elseif($allowapply == '-3') { ?>
<p class="xg2 mbn">��������</p>
<a href="javascript:;" onclick="doane(event);showDialog('��������')"><img src="<?php echo STATICURL;?>image/task/disallow.gif" title="��������" alt="��������" /></a>
<?php } elseif($allowapply == '-4') { ?>
<p class="xg2 mbn">ʧ����<?php echo $task['dateline'];?></p>
<?php } elseif($allowapply == '-5') { ?>
<p class="xg2 mbn">�����<?php echo $task['dateline'];?></p>
<?php } elseif($allowapply == '-6') { ?>
<p class="xg2 mbn">�����<?php echo $task['dateline'];?> &nbsp; <?php echo $task['t'];?> ������ٴ�����</p>
<a href="javascript:;" onclick="doane(event);showDialog('<?php echo $task['t'];?> ������ٴ�����')"><img src="<?php echo STATICURL;?>image/task/disallow.gif" title="<?php echo $task['t'];?> ������ٴ�����" alt="��������" /></a>
<?php } elseif($allowapply == '-7') { ?>
<p class="xg2 mbn">ʧ����<?php echo $task['dateline'];?> &nbsp; <?php echo $task['t'];?>�������������</p>
<a href="javascript:;" onclick="doane(event);showDialog('<?php echo $task['t'];?>�������������')"><img src="<?php echo STATICURL;?>image/task/disallow.gif" title="<?php echo $task['t'];?>�������������" alt="��������" /></a>
<?php } elseif($allowapply == '2') { ?>
<p class="xg2 mbn">�����<?php echo $task['dateline'];?> &nbsp; ���ڿ����ٴ�����</p>
<?php } elseif($allowapply == '3') { ?>
<p class="xg2 mbn">ʧ����<?php echo $task['dateline'];?> &nbsp; ���ڿ�����������</p>
<?php } if($allowapply > '0') { ?>
<a href="home.php?mod=task&amp;do=apply&amp;id=<?php echo $task['taskid'];?>"><img src="<?php echo STATICURL;?>image/task/apply.gif" alt="��������" /></a>
<?php } ?>
</td>
</tr>
<?php if($task['applicants']) { ?>
<tr>
<td>&nbsp;</td>
<td>
<a name="parter"></a>
<div class="mtm">
<h2 class="mbm">���� <?php echo $task['applicants'];?> λ��Ա���������</h2>
<div id="ajaxparter"></div>
</div>
<script type="text/javascript">ajaxget('home.php?mod=task&do=parter&id=<?php echo $task['taskid'];?>', 'ajaxparter');</script>
</td>
</tr>
<?php } ?>
</table>
</div><?php } ?>
</div>
</div>
<div class="appl">
<div class="tbn">
<h2 class="mt bbda">����</h2>
<ul>
<li<?php echo $actives['new'];?>><a href="home.php?mod=task&amp;item=new">������</a></li>
<li<?php echo $actives['doing'];?>><a href="home.php?mod=task&amp;item=doing">�����е�����</a></li>
<li<?php echo $actives['done'];?>><a href="home.php?mod=task&amp;item=done">����ɵ�����</a></li>
<li<?php echo $actives['failed'];?>><a href="home.php?mod=task&amp;item=failed">ʧ�ܵ�����</a></li>
</ul>
</div>
</div>
</div><?php include template('common/footer'); ?>