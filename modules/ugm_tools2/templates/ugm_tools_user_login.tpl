
    <div class="d-flex justify-content-center mt-40">
      <div class="card" style="width: 30rem;">
        <div class="card-header">
          會員登入
        </div>
        <div class="card-body">
          <form action="<{xoAppUrl}>user.php" method="post" id="myForm">
            
            <!--帳號-->
            <div class="form-group">
              <label for="name">帳號<span class="text-danger"> *</span></label>
              <input type="text" name="uname" class="form-control" value="" id="uname">
            </div>
            <!--密碼-->
            <div class="form-group">
              <label for="name">密碼<span class="text-danger"> *</span></label>
              <input type="password" name="pass" class="form-control" value="" id="pass">
            </div>
            <input type="hidden" name="op" value="login">
            <input type="hidden" name="xoops_redirect" value="<{$xoops_requesturi}>">
            			
				    <button type="submit" class="btn btn-primary btn-block">會員登入</button>
          </form>

        </div>
      </div>
    </div>    
    <{*驗證*}>
    <style>
      .error{
        color:red;
      }
    </style>
    <script type="text/javascript" src="<{xoAppUrl}>modules/ugm_tools2/class/jquery.validate/jquery.validate.min.js"></script>
    <script type="text/javascript">
      $( document ).ready( function () {
        $( "#myForm" ).validate( {
          submitHandler: function(form) {
            //驗證成功之後就會進到這邊：
            //方法一：直接把表單 POST 或 GET 到你的 Action URL
            //方法二：讀取某些欄位的資料，ajax 給別的 API。
            //此處測試方法一的寫法如下：
            form.submit();
          },
          rules: {
            uname: "required", //必填
            pass: "required",
          },
          messages: {
            uname: "必填！",
            pass: "必填！",
          }
        });
      });
    </script>	