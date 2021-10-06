<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>COACHTECH</title>
  <style>
    h2{
      text-align: center;
    }
    table{
      width:70%;
      margin:0 auto;
    }
    table th,
    table td{
      padding:20px;
      text-align: left;
    }
    .submit-btn {
    padding:5px 30px;
    background-color: black;
    color:white;
    border-radius: 3px;
    margin-top: 30px;
    }
    .submit-btn:hover{
    opacity: 0.7;
    cursor: pointer;
    }
    .btn-wrap{
    text-align: center;
    margin-bottom: 20px;
    }
    .back-btn{
      text-align: center;
    }
    .input-back{
      border:none;
      background-color: white;
      text-decoration: underline;
    }
    .input-back:hover{
      cursor: pointer;
      color:#808080;
    }
  </style>
</head>
<body>
<h2>内容確認</h2>
<form method="POST" action="/thanks">
    @csrf
<table>
  <tr>
    <th><label>お名前</label></th>
    <td> {{ $inputs['lastname'].$inputs['firstname'] }}</td>
    <input
    name="name"
    value="{{ $inputs['lastname'].$inputs['firstname'] }}"
    type="hidden">
  </tr>
  <tr>
    <th><label>性別</label></th>
    <td>{{ $inputs['gender'] }}</td>
      <input
      name="gender"
      value="{{$inputs['gender']}}"
      type="hidden">
  </tr>
      <input name="gender" type="hidden">
      <tr>
        <th><label>メールアドレス</label></th>
        <td>{{ $inputs['email'] }}</td>
      </tr>
      <input
      name="email"
      value="{{ $inputs['email'] }}"
      type="hidden">
      <tr>
        <th><label>郵便番号</label></th>
        <td> {{ $inputs['zip11'] }}</td>
      </tr>
      <input
      name="postcode"
      value="{{ $inputs['zip11'] }}"
      type="hidden">
      <tr>
        <th><label>住所</label></th>
        <td>{{ $inputs['addr11'] }}</td>
      </tr>
      <input
      name="address"
      value="{{ $inputs['addr11'] }}"
      type="hidden">
      <tr>
        <th><label>建物名</label></th>
        <td>{{ $inputs['building_name'] }}</td>
      </tr>
      <input
      name="building_name"
      value="{{ $inputs['building_name'] }}"
      type="hidden">
      <tr>
        <th><label>ご意見</label></th>
        <td>{!! nl2br(e($inputs['opinion'])) !!}</td>
      </tr>
      <input
      name="opinion"
      value="{{ $inputs['opinion'] }}"
      type="hidden">
    </table>
    <div class="btn-wrap">
      <button type="submit" name="action" value="submit" class="submit-btn">送信する</button>
    </div>
  </form>
  <form action="">
    <div class="back-btn">
      <button type="submit" name="action" value="back" class="input-back">修正する</button>
    </div>
  </form>
</body>
</html>