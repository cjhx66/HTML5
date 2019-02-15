<?php
function getGroupNameByUserId($id) {
    $RoleUser = M("Users");
    $roleIdList = $RoleUser->where("id=$id")->find();
	dump($roleIdList);die;
    $roleId = $roleIdList['rID'];
    if ($roleId == 0) {
        return '无权限组';
    } 
    $dao = D("Role");
    $list = $dao->findAll(array('field' => 'id,rname'));
    foreach ($list as $vo) {
        $nameList [$vo ['id']] = $vo ['rname'];
    }
    $name = $nameList [$roleId];
    return $name;
}
?>