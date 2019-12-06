<?php
    session_start();
    $idd=$_GET['id']; 
    
    include_once("../DAO/DataProvider_PDO.php");
    if($idd=='del_all'){ 
        $xn1 =DataProvider_PDO::ExecuteQuery("DELETE FROM dbo_hoidap WHERE TraLoi!='0'");
        echo "<script> alert('Xóa thành công!'); location.reload();</script>";
    }
    else { $_SESSION['mmm']=$idd;
        echo "<form id='form_input_traloi'>
                <table>
                    <tr>
                        <td><textarea style='width:900px;margin-left:2%;'  name='traloi' placeholder='Ban nhap phan noi dung tai day...'></textarea></td>
                        <td><button  style='width:80px;background-color:red;color:white' id='btnTraloi'>Reply</button></td>
                    </tr>
                </table>
            </form>";
    ?>
    <script type="text/javascript">
        $(document).ready(function()
        { 
        var submit = $("button[id='btnTraloi']");

        submit.click(function()
          {
            var traloi = $("textarea[name='traloi']").val();

            //Kiểm tra xem trường đã được nhập hay chưa
            if(traloi==''){
                 alert('Bạn chưa trả lời câu hỏi');
                 return false;
            }
            var data_traloi = $('form#form_input_traloi').serialize();
          
          //Sử dụng phương thức Ajax.
          $.ajax({
                type : 'POST', //Sử dụng kiểu gửi dữ liệu POST
                url : '../dbo_hoidap/xuly.php', //gửi dữ liệu sang trang data.php
                data : data_traloi, //dữ liệu sẽ được gửi
                success : function(data)  // Hàm thực thi khi nhận dữ liệu được từ server
                          { 
                            if(data == 'false') 
                            {
                              alert('Không thể Trả Lời!');
                            }else{
                              $('#content12').html(data); 
                            }
                          }
                });
                return false;
        });
    });
    </script>
<?php } 
    echo "<div id='content12'></div>";
?>