<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://ajaxzip3.github.io/ajaxzip3.js" charset="UTF-8"></script>
  <title>COACHTECH</title>
  <style>
   h1{
    font-size: 25px;
    font-weight: normal;
    text-align: center;
    margin-bottom:30px;
   }
   .form{
    width:80%;
    margin:20px auto;
    }
   .form-item{
    width:100%;
    display: flex;
    align-items: center;
    padding:10px 0;
   }
   .form-item-label {
    width: 40%;
    font-weight: bold;
    font-size: 14px;
    }
   .required{
    color:red;
    }
    .form-item-input {
    border: 1px solid #ddd;
    border-radius: 6px;
    margin-left: 20px;
    padding: 0 10px;
    height: 30px;
    width: 100%;
    font-size: 18px;
    }
    .form-item-input-name{
    border: 1px solid #ddd;
    border-radius: 6px;
    margin-left: 20px;
    padding: 0 10px;
    height: 30px;
    width: 45%;
    font-size: 18px;
    }
    .form-item-radio{
    height: 30px;
    width: 100px;
    margin:0;
    }
    .form-item-textarea {
    border: 1px solid #ddd;
    border-radius: 6px;
    margin-left: 20px;
    padding: 0 10px;
    height: 200px;
    width: 100%;
    font-size: 18px;
    }
    .confirm-btn {
    padding:5px 30px;
    background-color: black;
    color:white;
    border-radius: 3px;
    margin-top: 30px;
    }
    .confirm-btn:hover{
    opacity: 0.7;
    cursor: pointer;
    }
    .btn-wrap{
    text-align: center;
    }
    .example{
        display:inline-block;
        color: #cccccc;
        margin-left:160px;
        font-size:14px;
    }
    .post-icon{
        display: inline-block;
        margin-left:50px;
    }
    .error-message{
        color:red;
    }
  </style>
</head>

<body>
  <h1>お問い合わせ</h1>
  <form action="/confirm" method="post" class="form">
  @csrf
    <div class="form-item">
        <label class="form-item-label">お名前<span class="required">※</span></label>
        <input type="text" name="lastname" value="{{ old('lastname') }}" class="form-item-input-name" required>
        <input type="text" name="firstname" value="{{ old('firstname') }}" class="form-item-input-name" required>
        @if ($errors->has('name'))
        <p class="error-message">{{ $errors->first('name') }}</p>
        @endif
    </div>
    <span class="example"> 例）山田</span>  <span class="example">例）太郎</span>
        <div class="form-item">
            <label class="form-item-label">性別<span class="required">※</span></label>
            <input type="radio" name="gender" value="男性" class="form-item-radio" checked> 男性
            <input type="radio" name="gender" value="女性" class="form-item-radio"> 女性
            @if ($errors->has('gender'))
            <p class="error-message">{{ $errors->first('gender') }}</p>
            @endif
        </div>
        <div class="form-item">
            <label class="form-item-label">メールアドレス<span  class="required">※</span></label>
            <input type="email" name="email"  value="{{ old('email') }}" class="form-item-input" required>
            @if ($errors->has('email'))
            <p class="error-message">{{ $errors->first('email') }}</p>
            @endif
        </div>
        <span class="example">例）test@example.com</span>
        <div class="form-item">
            <label class="form-item-label">郵便番号<span  class="required">※</span><span class="post-icon">〒</span></label>
            <input type="text" onKeyUp="AjaxZip3.zip2addr(this,'','addr11','addr11');" name="zip11" value="{{ old('zip11') }}" class="form-item-input" required>
            @if ($errors->has('zip11'))
            <p class="error-message">{{ $errors->first('zip11') }}</p>
            @endif
        </div>
        <span class="example">例）123-4567</span>
        <div class="form-item">
            <label class="form-item-label">住所<span class="required">※</span></label>
            <input type="text" name="addr11" value="{{ old('addr11') }}" class="form-item-input" required>
            @if ($errors->has('addr11'))
            <p class="error-message">{{ $errors->first('addr11') }}</p>
            @endif
        </div>
        <span class="example">例）東京都渋谷区千駄ヶ谷1-2-3</span>
        <div class="form-item">
            <label class="form-item-label">建物名</label>
            <input type="text" name="building_name" value="{{ old('building_name') }}" class="form-item-input">
            @if ($errors->has('building_name'))
            <p class="error-message">{{ $errors->first('building_name') }}</p>
            @endif
        </div>
        <span class="example">例）千駄ヶ谷マンション101</span>
        <div class="form-item">
            <label class="form-item-label">ご意見<span  class="required">※</span></label>
            <textarea name="opinion" rows="5" value="{{ old('opinion') }}"  class="form-item-textarea" required></textarea>
            @if ($errors->has('opinion'))
            <p class="error-message">{{ $errors->first('opinion') }}</p>
            @endif
        </div>
        <div class="btn-wrap">
            <input type="submit" value="確認" class="confirm-btn">
        </div>
    </form>
</body>
</html>