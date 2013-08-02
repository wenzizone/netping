<form class="form-horizontal validate" method="post" action="/admin/api/add_server">
    <fieldset>
        <legend>添加测试机房服务器</legend>
        <div class="control-group">
            <label class="control-label" for="test_server_ip">测试服务器ip:</label>
            <div class="controls">
                <input type="text" name="test_server_ip" id="test_server_ip" class="required block left"/>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="test_server_login_name">测试服务器用户名:</label>
            <div class="controls">
                <input type="text" name="test_server_login_name" id="test_server_login_name" class="required block left"/>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="test_server_login_passwd">测试服务器登陆密码:</label>
            <div class="controls">
                <input type="password" name="test_server_login_passwd" id="test_server_login_passwd" class="required block left"/>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="test_server_sshport">测试服务器ssh端口号:</label>
            <div class="controls">
                <input type="text" name="test_server_sshport" id="test_server_sshport" class="required block left"/>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="idc_name">测试机房名称:</label>
            <div class="controls">
                <input type="text" name="idc_name" id="idc_name" class="required block left"/>
            </div>
        </div>
        <div class="deploy-btn">
            <button type="submit" id="submit" class="btn">部署程序</button>
        </div>
    </fieldset>
</form>