<button type="button" class="form__btn__btnSend text-white" data-bs-toggle="modal" data-bs-target="#exampleModalApplication">@lang('lang.order')</button>
<div class="modal fade" id="exampleModalApplication" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen">
    <div class="modal-content">
            <div class="modal-header"><span aria-hidden="true" data-bs-dismiss="modal" aria-label="Close">&times;</span></div>
            <div class="modal-body">
              <div class="auth-body">
                <form class="form__body" action="{{auth()->user()->gender == 'male' ? route('male.application', auth()->user()->id): route('woman.application', auth()->user()->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                      <label class="form-label" for="exampleFormControlInput1">@lang('lang.name')*</label>
                      <input class="form-control" id="exampleFormControlInput1" type="text" name="name" required="" oninvalid="this.setCustomValidity('пожалуйста, заполните это поле')" oninput="this.setCustomValidity('')">
                    </div>
                    <div class="mb-3">
                      <label class="form-label" for="exampleFormControlInput2">@lang('lang.phone')* </label>
                      <input class="form-control" id="exampleFormControlInput2" type="text" name="phone_number" required="" oninvalid="this.setCustomValidity('пожалуйста, заполните это поле')" oninput="this.setCustomValidity('')">
                    </div>
                    <div class="mb-3">
                      <label class="form-label">@lang('lang.doc')* <a href="{{asset('ru.pdf')}}"  target="_blank">@lang('lang.inst')</a></label>
                      <input class="form-control" type="file" name="passport_image" required autofocus oninvalid="this.setCustomValidity('пожалуйста, загрузите документ')" oninput="this.setCustomValidity('')">
                    </div>
                 
                    <div class="mb-3">
                      <label class="form-label" for="exampleFormControlTextarea4">@lang('lang.message')*</label>
                      <textarea class="form-control" id="exampleFormControlTextarea4" rows="3" name="message" required autofocus oninvalid="this.setCustomValidity('пожалуйста, заполните это поле')" oninput="this.setCustomValidity('')"></textarea>
                    </div>
                    <div class="mb-3">
                        <select class="form-select" aria-label="Default select example" name="type_id" required="">
                          <option selected disabled>@lang('lang.educationlevel')</option>
                          @foreach ($types as $type)
                          <option value="{{$type->id}}">
                            {{$type->name}}
                          </option>
                          @endforeach
                        </select>
                      </div>
                      <div class="mb-3">
                        {!! NoCaptcha::renderJs() !!}
                        {!! NoCaptcha::renderJs('ru', true, 'recaptchaCallback') !!}
                        {!! NoCaptcha::display() !!}
                      </div>

                    <div class="form__btn">
                      <button type="submit" class="form__btn__btnSend text-white">@lang('lang.send')</button>
                    </div>
                </form>
              </div>
              </div>
            </div>
    </div>
    </div>
</div>
      @if(session('notification') == 'ErrorWithApplication')
    <button type="button" class="d-none" data-bs-toggle="modal" data-bs-target="#exampleModal9" id="applicationError"></button>
    <div class="modal fade" id="exampleModal9" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-fullscreen">
        <div class="modal-content">
            <div class="modal-header"><span aria-hidden="true" data-bs-dismiss="modal" aria-label="Close">&times;</span></div>
            <div class="modal-body">
            <div class="auth-body">
                <form class="form__body" action="{{auth()->user()->gender == 'male' ? route('male.application', auth()->user()->id): route('woman.application', auth()->user()->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                      <label class="form-label" for="exampleFormControlInput1">Имя*</label>
                      <input class="form-control @error('name') is-invalid @enderror" id="exampleFormControlInput1" type="text" name="name" required="" oninvalid="this.setCustomValidity('пожалуйста, заполните это поле')" oninput="this.setCustomValidity('')" value="{{old('name')}}">
                      @if(session('notification') !== "ErrorWithRegistration" && session('notification') !== "ErrorWithAuthentication")
                      @error('name')
                          <p class="text-danger">{{$message}}</p>
                      @enderror
                      @endif
                    </div>
                    <div class="mb-3">
                      <label class="form-label" for="exampleFormControlInput2">Ваш нимер телефона* </label>
                      <input class="form-control @error('phone_number') is-invalid @enderror" id="exampleFormControlInput2" type="text" name="phone_number" required="" oninvalid="this.setCustomValidity('пожалуйста, заполните это поле')" oninput="this.setCustomValidity('')" value="{{old('phone_number')}}">
                      @if(session('notification') !== "ErrorWithRegistration" && session('notification') !== "ErrorWithAuthentication")
                      @error('phone_number')
                          <p class="text-danger">{{$message}}</p>
                      @enderror
                      @endif
                    </div>
                    <div class="mb-3">
                      <label class="form-label">Фото паспорта*</label>
                      <input class="form-control @error('passport_image') is-invalid @enderror" type="file" name="passport_image" required autofocus oninvalid="this.setCustomValidity('пожалуйста, загружайте фото')" oninput="this.setCustomValidity('')" value="{{old('passport_image')}}">
                      @if(session('notification') == "ErrorWithApplication")
                      @error('passport_image')
                          <p class="text-danger">{{$message}}</p>
                      @enderror
                      @endif
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Фото атестата*</label>
                        <input class="form-control @error('certificate_image') is-invalid @enderror" type="file" name="certificate_image" required autofocus oninvalid="this.setCustomValidity('пожалуйста, загружайте фото')" oninput="this.setCustomValidity('')" value="{{old('certificate_image')}}">
                        @if(session('notification') == "ErrorWithApplication")
                        @error('certificate_image')
                            <p class="text-danger">{{$message}}</p>
                        @enderror
                        @endif
                      </div>
                    <div class="mb-3">
                      <label class="form-label" for="exampleFormControlTextarea4">Сообщение*</label>
                      <textarea class="form-control @error('message') is-invalid @enderror" id="exampleFormControlTextarea4" rows="3" name="message" required autofocus oninvalid="this.setCustomValidity('пожалуйста, заполните это поле')" oninput="this.setCustomValidity('')">{{old('message')}}</textarea>
                      @if(session('notification') == "ErrorWithApplication")
                      @error('message')
                          <p class="text-danger">{{$message}}</p>
                      @enderror
                      @endif
                    </div>
                    <div class="mb-3">
                        <select class="form-select @error('type_id') is-invalid @enderror" aria-label="Default select example" name="type_id" required="">
                          <option selected disabled>Форма обучение</option>
                          @foreach ($types as $type)
                          <option value="{{$type->id}}" {{old('type_id') === $type->id ? 'selected':''}}>
                            {{$type->name}}
                          </option>
                          @endforeach
                        </select>
                        @if(session('notification') == "ErrorWithApplication")
                      @error('type_id')
                          <p class="text-danger">{{$message}}</p>
                      @enderror
                      @endif
                    </div>
                    <div class="mb-4 mt-4">
                        {!! NoCaptcha::renderJs() !!}
                        {!! NoCaptcha::renderJs('ru', true, 'recaptchaCallback') !!}
                        {!! NoCaptcha::display() !!}
                        @if(session('notification') == "ErrorWithApplication")
                      @error('g-recaptcha-response')
                          <p class="text-danger">{{$message}}</p>
                      @enderror
                      @endif
                      </div>
                    <div class="form__btn">
                      <button type="submit" class="form__btn__btnSend text-white">Отправить</button>
                    </div>
                </form>
                <div class="d-none">
                    {{session()->forget('notification')}}
                </div>
            </div>
            </div>
            </div>
        </div>
        </div>
    </div>
      @endif
