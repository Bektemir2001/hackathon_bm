<a class="btn btn-success" type="button" data-bs-toggle="modal" data-bs-target="#exampleModalChangeData">Редактировать</a>
<div class="modal fade" id="exampleModalChangeData" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen">
      <div class="modal-content">
        <div class="modal-header"><span aria-hidden="true" data-bs-dismiss="modal" aria-label="Close">&times;</span></div>
        <div class="modal-body">

            <form class="auth-form text-center" action="{{route('update.user', auth()->user()->id)}}" method="POST" enctype="multipart/form-data">
                @method('PATCH')
                @csrf
                
                <div class="auth-body">
                    <h5 class="mb-3">Изменение данных</h5>
                    <img class="img-fluid mb-3" src="{{asset($user->image)}}"  alt="image" style="width:200px;height:200px;">
                    <div class="mb-3">
                        <label class="form-lable">Изображение</label>
                        <input type="file" class="custom-file-input form-control" id="exampleInputFile" name="image">
                    </div>
                    <div class="mb-3">
                        <label class="form-lable">Имя</label>
                        <input class="form-control" id="exampleInputEmail1" name="name" type="text" value="{{auth()->user()->name}}">
                    </div>
                    <div class="mb-3">
                        <label class="form-lable">Фамилия</label>
                        <input class="form-control" id="exampleInputPassword3" name="surname" type="text" value="{{auth()->user()->surname}}">
                    </div>
                    <div class="mb-3">
                        <label class="form-lable">Возраст</label>
                        <input class="form-control" id="exampleInputEmail2" name="age" type="text" value="{{auth()->user()->age}}">
                    </div>
                    <div class="mb-3">
                        <label class="form-lable">Адрес</label>
                        <input class="form-control" id="exampleInputEmail3" name="address" type="text" value="{{auth()->user()->address}}">
                    </div>
                    <div class="mb-3">
                        <label class="form-lable">Email</label>
                        <input class="form-control" name="email" type="email" value="{{auth()->user()->email}}">
                    </div>
                    <div class="mb-3">
                        <label class="form-lable">Пол</label>
                        <select class="form-control" name="gender">
                            <option value="male"
                            {{auth()->user()->gender == 'male' ? 'selected' : ''}}>
                                Мужской
                            </option>
                            <option value="woman"
                            {{auth()->user()->gender == 'woman' ? 'selected' : ''}}>
                                Женский
                            </option>
                        </select>

                    </div>
                    <div class="mb-3">
                        <label class="form-lable">Контент</label>
                        <textarea class="form-control" name="content" type="text">{{auth()->user()->content}}</textarea>
                    </div>
                </div>
                <div class="d-none">
                    <input type="text" name="id" value="{{auth()->user()->id}}">
                </div>
          <div class="autBtn mb-4 mt-4">
            <button class="btnSignIn" type="submit">Отправить</button>
          </div>
        </form>
        </div>
      </div>
    </div>
  </div>
