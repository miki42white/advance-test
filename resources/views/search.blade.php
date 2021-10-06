<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>COACHTECH</title>
  <style>
    h2{
      text-align: center;
    }
    .search-box{
      border:black 1px solid;
      width:90%;
      margin:0 auto;
      padding:30px;
    }
    .flex{
      display:flex;
    }
    .form-group{
    padding:20px 0;
   }
   .form-group-gender{
     margin-left:50px;
   }
    .form-item-label {
    width: 40%;
    font-weight: bold;
    font-size: 14px;
    }
    .form-item-input {
    border: 1px solid #ddd;
    border-radius: 6px;
    margin-left: 20px;
    padding: 0 10px;
    height: 30px;
    width: 200px;
    font-size: 18px;
    }
    .form-item-radio{
    height: 30px;
    width: 60px;
    margin:0;
    top:10px;
    }
    .search-btn,
    .delete-btn {
    padding:5px 30px;
    background-color: black;
    color:white;
    border-radius: 3px;
    margin-top: 30px;
    }
    .search-btn:hover,
    .delete-btn:hover{
    opacity: 0.7;
    cursor: pointer;
    }
    .btn-wrap{
    text-align: center;
    }
    .reset-btn{
      text-align: center;
    }
    .input-reset{
      border:none;
      background-color: white;
      text-decoration: underline;
    }
    .input-reset:hover{
      cursor: pointer;
      color:#808080;
    }
    .line{
      border-bottom: black 1px solid;
    }
    svg.w-5.h-5 {  
    width: 30px;
    height: 30px;
    }
    table{
      margin:0 auto;
    }
    th,
    td{
      padding-right: 50px;
    }
    .result-count{
      margin-left: 250px;
    }
  </style>
</head>
<body>
  <h2>管理システム</h2>
  <div class="search-box">
    <form action="/search" method="post">
      @csrf
      <div class="flex">
        <div class="form-group">
          <label class="form-item-label">お名前</label>
          <input type="text" class="form-item-input" name="name">
        </div>
        <div class="form-group-gender">
          <label class="form-item-label">性別</label>
          <input type="radio" name="gender" value="0" class="form-item-radio" checked> 全て
          <input type="radio" name="gender" value="1" class="form-item-radio"> 男性
          <input type="radio" name="gender" value="2" class="form-item-radio"> 女性
        </div>
      </div>
      <div class="form-group">
        <label class="form-item-label">登録日</label>
        <input type="date" name="date-start" class="form-item-input"><span> 〜</span><input type="date" name="date-end" class="form-item-input">
      </div>
      <div class="form-group">
        <label class="form-item-label">メールアドレス</label>
        <input type="email" name="email" class="form-item-input">
      </div>
      <div class="btn-wrap">
        <button type="submit" class="search-btn">検索</button>
      </div>
      <div class="reset-btn">
      <input type="reset" name="reset" value="リセット" class="input-reset" >
      </div>
    </form>
  </div>
    
  <div class="result"  style="margin-top:50px;">
  <div class="result-count">
  {{ $items->links() }}
  @if (count($items) >0)
  <p>全{{ $items->total() }}件中
  {{  ($items->currentPage() -1) * $items->perPage() + 1}} ~ 
  {{ (($items->currentPage() -1) * $items->perPage() + 1) + (count($items) -1)  }}件</p>
  @else
  <p>データがありません。</p>
  @endif
</div>

    <table class="table">
      <tr>
        <th>ID</th><th>お名前</th><th>性別</th><th>メールアドレス</th><th>ご意見</th>
      </tr>
      @foreach($items as $item)
      <tr>
      <td>{{$item['id']}}</td>
      <td>{{$item['name']}}</td>
      <td>{{$item['gender']}}</td>
      <td>{{$item['email']}}</td>
      <td>{{$item['opinion']}}</td>
      <td>
      <form action="/search/delete" method="POST">
        @csrf
        <input type="hidden" name="id" value={{$item['id']}}>
        <input type="submit" value="削除" class="delete-btn"></button>
        </form>
      </td>
      </tr>
     @endforeach
    </table>
  </div>
</body>
</html>