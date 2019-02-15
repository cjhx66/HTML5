<?php if (!defined('THINK_PATH')) exit(); $cid = dowith_include($classID); $w = dowith_include($web); $status = dowith_include($status); $keyword = dowith_include($keyword); $account = dowith_include($account); $authid = dowith_include($authid); $veri = dowith_include($_SESSION['veri']); $lieid = dowith_include($_SESSION['lieid']); $formstatus = dowith_include($_SESSION['formstatus']); ?>
<form id="pagerForm" action="/index.php/Admin/Mcenter/ShengJinglwbm" method="post">
	<input type="hidden" name="pageNum" value="1"/>
	<input type="hidden" name="numPerPage" value="15" />
	<input type="hidden" name="classID" value="<?php echo ($cid); ?>" />
	<input type="hidden" name="w" value="<?php echo ($w); ?>" />
	<input type="hidden" name="status" value="<?php echo ($status); ?>" />
	<input type="hidden" name="keyword" value="<?php echo ($keyword); ?>" />
	<input type="hidden" name="account" value="<?php echo ($account); ?>" />
	<input type="hidden" name="authid" value="<?php echo ($authid); ?>" />
	<input type="hidden" name="veri" value="<?php echo ($veri); ?>" />
	<input type="hidden" name="lie" value="<?php echo ($lieid); ?>" />
	<input type="hidden" name="formstatus" value="<?php echo ($formstatus); ?>" />
</form>
<div class="page">
    <div class="pageHeader">
        <form onsubmit="return navTabSearch(this);" action="/index.php/Admin/Mcenter/ShengJinglwbm/index" method="post">
            <input type="hidden" name="pageNum" value="1" />
            <input type="hidden" name="formstatus" value="<?php echo ($formstatus); ?>" />
            <div class="searchBar">
                <table class="searchContent">
                    <tr>
                        <td>
                            <b>搜索</b> &nbsp; [电话] ： <input type="text" name="keyword" size="10" value="<?php echo ($keyword); ?>" />
                        </td>
                        <!--查询必带参数-->
                        <input type="hidden" name="classID" value="<?php echo ($classID); ?>" />
                        <input type="hidden" name="w" value="<?php echo ($web); ?>" />
                        <!--查询必带参数-->
                        <td>
                            <div class="buttonActive"><div class="buttonContent"><button type="submit">检索</button></div></div>
                        </td>
                    </tr>
                </table>
            </div>
        </form>
    </div>

    <div class="pageContent">
        <div class="panelBar">
            <ul class="toolBar">
                <?php if(($lie["canadd"] == 1) OR ($_SESSION['adminuser']['username']== 'developer') OR ($_SESSION['adminuser']['username']== 'admin')): ?><li><a class="add" title="将数据导出为Excel表格" href="/index.php/Admin/Mcenter/ShengJinglwbm/excel"> <span>导出Excel</span></a></li><?php endif; ?>
                <?php if(($lie["candel"] == 1) OR ($_SESSION['adminuser']['username']== 'developer') OR ($_SESSION['adminuser']['username']== 'admin')): ?><li><a title="确实要删除这些记录吗?" target="selectedTodo" rel="id" postType="string" href="/index.php/Admin/Mcenter/ShengJinglwbm/delete" class="delete"><span>批量删除</span></a></li><?php endif; ?>
            </ul>
        </div>

        <table class="list" width="100%" layoutH="116">
            <thead>
            <tr>
                <th width="5%"><input type="checkbox"  group="id" class="checkboxCtrl"></th>
                <th width="5%">编号</th>
                <th width="15%">用户名</th>
                <!-- <th width="15%">来源</th>  -->
                <th width="15%">电话</th>
                <th width="15%">来源</th>
                <th width="20%">报名时间</th>
                <!-- <th width="20%">操作</th> -->
            </tr>
            </thead>
            <tbody>
            <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr target="sid_user" rel="<?php echo ($vo['id']); ?>">
                    <td><input name="id" value="<?php echo ($vo["id"]); ?>" type="checkbox"></td>
                    <td class="<?php echo ($vo["id"]); ?>"><?php echo ($vo['id']); ?></td>
                    <td><?php echo ($vo['name']); ?></td>

                    <td><?php echo ($vo['phone']); ?></td>
                    <td><?php echo ($vo['source']); ?></td>
                    <td><?php echo (date("Y-m-d H:i:s",$vo['writetime'])); ?></td>
                </tr><?php endforeach; endif; else: echo "" ;endif; ?>
            </tbody>
        </table>

        <div class="panelBar">
            <div class="pages">
                <span>显示</span>
                <select class="combox" name="numPerPage" onchange="navTabPageBreak({numPerPage:this.value})">
                    <option value="10" <?php if($numPerPage == 10): ?>selected<?php endif; ?> >10</option>
                    <option value="15" <?php if($numPerPage == 15): ?>selected<?php endif; ?> >15</option>
                    <option value="20" <?php if($numPerPage == 20): ?>selected<?php endif; ?> >20</option>
                    <option value="25" <?php if($numPerPage == 25): ?>selected<?php endif; ?> >25</option>
                    <option value="30" <?php if($numPerPage == 30): ?>selected<?php endif; ?> >30</option>
                </select>
                <span>共<?php echo ($totalCount); ?>条</span>
            </div>
            <div class="pagination" targetType="navTab" totalCount="<?php echo ($totalCount); ?>" numPerPage="<?php echo ($numPerPage); ?>" pageNumShown="10" currentPage="<?php echo ($currentPage); ?>"></div>
        </div>
    </div>
</div>