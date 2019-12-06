<?php
if($_POST)
{
    $username = $_POST['username'];
    $password = $_POST['password'];
    //neu dang nhap dung
    if($username == '1' && $password == '1')
    {
?>
<table >
    <tr>
        <td colspan="2">Đăng nhập thành công</td>
    </tr>
    <tr>
        <td><strong>Xin chào:</strong> </td>
        <td><?php echo $username ?></td>
    </tr>
</table>
<?php
    }else{
        //neu dang nhap sai
        echo 'false';
    }
}
?>