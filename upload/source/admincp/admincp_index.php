<?php

/**
 *      [Discuz!] (C)2001-2099 Comsenz Inc.
 *      This is NOT a freeware, use is subject to license terms
 *
 *      $Id: admincp_index.php 35168 2014-12-25 02:29:36Z nemohou $
 */

if(!defined('IN_DISCUZ') || !defined('IN_ADMINCP')) {
	exit('Access Denied');
}

if(@file_exists(DISCUZ_ROOT.'./install/index.php') && !DISCUZ_DEBUG) {
	@unlink(DISCUZ_ROOT.'./install/index.php');
	if(@file_exists(DISCUZ_ROOT.'./install/index.php')) {
		dexit('Please delete install/index.php via FTP!');
	}
}

@include_once DISCUZ_ROOT.'./source/discuz_version.php';
require_once libfile('function/attachment');
$isfounder = isfounder();

$siteuniqueid = C::t('common_setting')->fetch('siteuniqueid');
if(empty($siteuniqueid) || strlen($siteuniqueid) < 16) {
	$chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789abcdefghijklmnopqrstuvwxyz';
	$siteuniqueid = 'DX'.$chars[date('y')%60].$chars[date('n')].$chars[date('j')].$chars[date('G')].$chars[date('i')].$chars[date('s')].substr(md5($_G['clientip'].$_G['username'].TIMESTAMP), 0, 4).random(4);
	C::t('common_setting')->update('siteuniqueid', $siteuniqueid);
	require_once libfile('function/cache');
	updatecache('setting');
}


if(submitcheck('notesubmit', 1)) {
	if(!empty($_GET['noteid']) && is_numeric($_GET['noteid'])) {
		C::t('common_adminnote')->delete($_GET['noteid'], ($isfounder ? '' : $_G['username']));
	}
	if(!empty($_GET['newmessage'])) {
		$newaccess = 0;
		$_GET['newexpiration'] = TIMESTAMP + (intval($_GET['newexpiration']) > 0 ? intval($_GET['newexpiration']) : 30) * 86400;
		$_GET['newmessage'] = nl2br(dhtmlspecialchars($_GET['newmessage']));
		$data = array(
			'admin' => $_G['username'],
			'access' => 0,
			'adminid' => $_G['adminid'],
			'dateline' => $_G['timestamp'],
			'expiration' => $_GET['newexpiration'],
			'message' => $_GET['newmessage'],
		);
		C::t('common_adminnote')->insert($data);
	}
}

$serverinfo = PHP_OS.' / PHP v'.PHP_VERSION;
$serverinfo .= @ini_get('safe_mode') ? ' Safe Mode' : NULL;
$serversoft = $_SERVER['SERVER_SOFTWARE'];
$dbversion = helper_dbtool::dbversion();

if(@ini_get('file_uploads')) {
	$fileupload = ini_get('upload_max_filesize');
} else {
	$fileupload = '<font color="red">'.$lang['no'].'</font>';
}


$dbsize = helper_dbtool::dbsize();
$dbsize = $dbsize ? sizecount($dbsize) : $lang['unknown'];

if(isset($_GET['attachsize'])) {
	$attachsize = C::t('forum_attachment_n')->get_total_filesize();
	$attachsize = is_numeric($attachsize) ? sizecount($attachsize) : $lang['unknown'];
} else {
	$attachsize = '<a href="'.ADMINSCRIPT.'?action=index&attachsize">[ '.$lang['detail'].' ]</a>';
}

$membersmod = C::t('common_member_validate')->count_by_status(0);
$threadsdel = C::t('forum_thread')->count_by_displayorder(-1);
$groupmod = C::t('forum_forum')->validate_level_num();

$modcount = array();
foreach(C::t('common_moderate')->count_group_idtype_by_status(0) as $value) {
	$modcount[$value['idtype']] = $value['count'];
}

$medalsmod = C::t('forum_medallog')->count_by_type(2);
$threadsmod = $modcount['tid'];
$postsmod = $modcount['pid'];
$blogsmod = $modcount['blogid'];
$doingsmod = $modcount['doid'];
$picturesmod = $modcount['picid'];
$sharesmod = $modcount['sid'];
$commentsmod = $modcount['uid_cid'] + $modcount['blogid_cid'] + $modcount['sid_cid'] + $modcount['picid_cid'];
$articlesmod = $modcount['aid'];
$articlecommentsmod = $modcount['aid_cid'];
$topiccommentsmod = $modcount['topicid_cid'];
$verify = '';
foreach(C::t('common_member_verify_info')->group_by_verifytype_count() as $value) {
	if($value['num']) {
		if($value['verifytype']) {
			$verifyinfo = !empty($_G['setting']['verify'][$value['verifytype']]) ? $_G['setting']['verify'][$value['verifytype']] : array();
			if($verifyinfo['available']) {
				$verify .= '<a href="'.ADMINSCRIPT.'?action=verify&operation=verify&do='.$value['verifytype'].'">'.cplang('home_mod_verify_prefix').$verifyinfo['title'].'</a>(<em class="lightnum">'.$value['num'].'</em>)';
			}
		} else {
			$verify .= '<a href="'.ADMINSCRIPT.'?action=verify&operation=verify&do=0">'.cplang('home_mod_verify_prefix').cplang('members_verify_profile').'</a>(<em class="lightnum">'.$value['num'].'</em>)';
		}
	}
}

cpheader();
shownav();

showsubmenu('home_welcome', array(), '', array('bbname' => $_G['setting']['bbname']));

$save_master = C::t('common_setting')->fetch_all(array('mastermobile', 'masterqq', 'masteremail'));
$save_mastermobile = $save_master['mastermobile'];
$save_mastermobile = !empty($save_mastermobile) ? authcode($save_mastermobile, 'DECODE', $_G['config']['security']['authkey']) : '';
$save_masterqq = $save_master['masterqq'] ? $save_master['masterqq'] : '';
$save_masteremail = $save_master['masteremail'] ? $save_master['masteremail'] : '';

$securityadvise = '';
if($isfounder) {
	$securityadvise = $_G['setting']['cloud_status'] ? cplang('home_security_service_open_info') : cplang('home_security_service_close_info');
	$securityadvise .= !$_G['config']['admincp']['founder'] ? $lang['home_security_nofounder'] : '';
	$securityadvise .= !$_G['config']['admincp']['checkip'] ? $lang['home_security_checkip'] : '';
	$securityadvise .= $_G['config']['admincp']['runquery'] ? $lang['home_security_runquery'] : '';
	if(!empty($_GET['securyservice'])) {
		$_GET['new_mastermobile'] = trim($_GET['new_mastermobile']);
		$_GET['new_masterqq'] = trim($_GET['new_masterqq']);
		$_GET['new_masteremail'] = trim($_GET['new_masteremail']);
		if(empty($_GET['new_mastermobile'])) {
			$save_mastermobile = $_GET['new_mastermobile'];
		} elseif(strlen($_GET['new_mastermobile']) == 11 && is_numeric($_GET['new_mastermobile']) && in_array(substr($_GET['new_mastermobile'], 0, 2), array('13', '15', '18'))) {
			$save_mastermobile = $_GET['new_mastermobile'];
			$_GET['new_mastermobile'] = authcode($_GET['new_mastermobile'], 'ENCODE', $_G['config']['security']['authkey']);
		} else {
			$_GET['new_mastermobile'] = $save_master['mastermobile'];
		}
		if(empty($_GET['new_masterqq']) || is_numeric($_GET['new_masterqq'])) {
			$save_masterqq = $_GET['new_masterqq'];
		} else {
			$_GET['new_masterqq'] = $save_masterqq;
		}
		if(empty($_GET['new_masteremail']) || (strlen($_GET['new_masteremail']) > 6 && preg_match("/^[\w\-\.]+@[\w\-\.]+(\.\w+)+$/", $_GET['new_masteremail']))) {
			$save_masteremail = $_GET['new_masteremail'];
		} else {
			$_GET['new_masteremail'] = $save_masteremail;
		}

		C::t('common_setting')->update_batch(array('mastermobile' => $_GET['new_mastermobile'], 'masterqq' => $_GET['new_masterqq'], 'masteremail' => $_GET['new_masteremail']));
	}

	$view_mastermobile = !empty($save_mastermobile) ? substr($save_mastermobile, 0 , 3).'*****'.substr($save_mastermobile, -3) : '';
}


$onlines = '';
$admincp_session = C::t('common_admincp_session')->fetch_all_by_panel(1);
$members = C::t('common_member')->fetch_all(array_keys($admincp_session), false, 0);


foreach($admincp_session as $uid => $online) {
	$onlines .= '<a href="home.php?mod=space&uid='.$online['uid'].'" title="'.dgmdate($online['dateline']).'" target="_blank">'.$members[$uid]['username'].'</a>&nbsp;&nbsp;&nbsp;';
}


showtableheader('�˵����룬�ǲ����ս�ģ�����', 'nobottom fixpadding');
echo '<tr><td>'.'����ȥ���ȫ����������Ҫ��ϧ��Ϊ���������µ���ˮ������·��'.'</td></tr>';
echo '<tr><td>'.'�漣ֻ�ή���ڲ��Է����������ϣ���С���漣����������Ʒ�'.'</td></tr>';
echo '<tr><td>'.'���Ǿ���Ҫ��һ���޻ڵ�����������һ�죬����Ҫ̤����Ƭ���󣬰����Լ�������ȥ����������Ҫ���������ɵ�������������˹'.'</td></tr>';
echo '<tr><td>'.'����Ҫͣ������һ�졭����ʧȥʲ�ᶫ������ʹҪ�����˵���ӭ����������ҲҪ���ϵ���ȥ�����Ǻ���������������'.'</td></tr>';
echo '<tr><td>'.'��ν��������ͬʱӵ��ʵ�����˲ſ���̸����ʵ���������޿˴��'.'</td></tr>';
echo '<tr><td>'.'Ҫ������������������������Ϊ���˻���ʲô���塣�Ҿ��Բ������ҵ��������º�ڡ�������˹'.'</td></tr>';
echo '<tr><td>'.'��ν����������һ�����ν���룬ֻ��ͬʱӵ��ʵ�����˲���˵�ġ���ʵ��. ��������˴��'.'</td></tr>';
echo '<tr><td>'.'������ԹԵظ����ң������ҵĶ�������һ�����������������������ӡ���. '.'</td></tr>';
echo '<tr><td>'.'���ţ�·�ɣ�ʤ���Ͱܱ���ҪƷ�����������Ĵ��Ӵܵ����ᣬʹ�����ĵĻ��䣬���˲�����������һ�棬����ʹ������Ҳû��ϵ��һ��Ҫ������һ�أ��������˹. '.'</td></tr>';
echo '<tr><td>'.'�����磬û��һ��׷��������ƾѡ������磬����ÿ���˵���ǰ���޵����졣������ǵ��������������ķ���Ļ�����ȥ׷Ѱ�ɣ�����Ϊ���������֮�£�'.'</td></tr>';
showtablefooter();


showtablefooter();

showtableheader('home_onlines', 'nobottom fixpadding');
echo '<tr><td>'.$onlines.'</td></tr>';
showtablefooter();





echo '</div>';

?>