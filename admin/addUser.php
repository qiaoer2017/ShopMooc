<!doctype html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>添加用户</title>
</head>
<body>
<h3>添加用户</h3>
<form action="doAdminAction.php?act=addUser" method="post" enctype="multipart/form-data">
    <table width="70%" border="1" cellpadding="5" cellspacing="0" bgcolor="#cccccc">
        <tr>
            <td align="right">用户名</td>
            <td><input type="text" name="username" placeholder="请输入用户名"/></td>
        </tr>
        <tr>
            <td align="right">密码</td>
            <td><input type="password" name="password" placeholder="请输入密码"/></td>
        </tr>
        <tr>
            <td align="right">邮箱</td>
            <td><input type="text" name="email" placeholder="请输入邮箱"/></td>
        </tr>
        <tr>
            <td align="right">性别</td>
            <td><input type="radio" name="sex" value="1"/>男
                <input type="radio" name="sex" value="2"/>女
                <input type="radio" name="sex" value="3" checked/>保密
            </td>
        </tr>
        <tr>
            <td align="right">头像</td>
            <td><input type="file" name="myFace"/></td>
        </tr>
        <tr>
            <td colspan="2"><input type="submit" value="添加用户"/></td>
        </tr>

    </table>
</form>
</body>
</html>